<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Omnipay;
use DB;

class CartOrderController extends Controller
{
    private $uid;
    // private $oid;
    
    //登录验证
	public function __construct()
	{
		$this -> middleware(['user.login']);
        
        //获取用户 ID
        $this -> uid = session('user.uid');
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($oid)
    {
        // dd(session() -> all());
        //商品清单
        $title = '商品清单';
        $res = DB::table('order')
               -> where('uid', $this -> uid)
               -> where('id', $oid)
               -> where('status', 1)
               -> first();
        if (!$res)
        {
            return redirect('/user/order') -> with(['msg'=>'非法请求']);
        }
        
        //判断订单过期
        $t = time();
        if (($res -> expires_in + $res -> update_at) < $t)
        {
            $res = DB::table('order')
               -> where('uid', $this -> uid)
               -> where('id', $oid)
               -> update(['status' => 3]);
               
            $res = DB::table('order_detail')
               -> where('uid', $this -> uid)
               -> where('oid', $oid)
               -> update(['status' => 3]);

               return redirect('/user/order') -> with(['msg'=>'订单已过期', 'oid' => $oid]);
        }
        
        // 存入订单ID
        session(['user.currentOid' => $oid]);
        
        //当前订单的地址
        $currAddress = DB::table('order_address')
                          -> select('aid')
                          -> where('oid', $oid)
                          -> first();
        $caid = 0;
        if ($currAddress)
        {
            $caid = $currAddress -> aid;
        }
        // print_r($currAddress);
        // echo $caid;
        //地址列表
        $address = DB::table('user_address')
                   -> where('uid', $this -> uid)
                   -> get();
        // print_r($address);
        
        //如果未选择就使用默认地址
        if ($caid == 0 && $address)
        {
            //选择默认-如果设置了默认地址
            foreach ($address as $addr)
            {
                if ($addr -> is_default == 1)
                {
                    $caid = $addr -> id;
                    break;
                }
            }
            
            //存入选择地址
            if ($caid)
            {
                DB::table('order_address') -> insert(['oid' => $oid, 'aid' => $caid]);
            }
        }
        //获取数据
        $data = DB::table('order_detail as od')
                -> select('od.*',
                    'g.code', 
                    'g.name', 
                    'g.price', 
                    'g.img',
                    'm.name as merchantName')
                //-> leftJoin('order as o', 'o.id', '=', 'od.oid')
                -> leftJoin('goods as g', 'g.id', '=', 'od.gid')
                -> leftJoin('merchant as m', 'm.id', '=', 'od.mid')
                -> where('od.oid', $oid)
                -> where('od.uid', $this -> uid)
                -> get();
        //运费
        $shipping = 0;
        //dd($data);
        // print_r($data);
        
        //总费用（不含运费）
        $total = 0;
        //商品总数量
        $totalCount = 0;
        foreach ($data as $v)
        {
            $total += ($v -> price * $v -> nums);
            $totalCount += $v -> nums;
        }
        
        //共计
        $commTotal = $total + $shipping;
        
        //print_r($items);
        
        return view('user.cartorder.index', 
                    [
                        'title' => $title,
                        'data' => $data,
                        'address' => $address,
                        'caid' => $caid,
                        'oid' => $oid,
                        'commTotal' => $commTotal,
                        'total' => $total,
                        'totalCount' => $totalCount,
                        'shipping' => $shipping,
                    ]
                );
    }

    /**
     * 订单退回购物车
     *
     */
    public function backCart($oid)
    {
        $t = time();
        
        //读取订单信息
        $order = DB::table('order_detail as od')
                 -> select('od.*', 'g.price as gprice')
                 -> leftJoin('goods as g', 'g.id', '=', 'od.gid')
                 -> where('od.uid', $this -> uid)
                 -> where('od.oid', $oid)
                 -> get();
        if (!$order)
        {
            return redirect('/user/order') -> with(['msg' => '订单不存在']);
        }
        
        //插入购物车
        $carts = [];
        foreach ($order as $v)
        {
            $tmp = [];
            $tmp['uid'] = $v -> uid;
            $tmp['gid'] = $v -> gid;
            $tmp['mid'] = $v -> mid;
            $tmp['standard'] = $v -> standard;
            $tmp['num'] = $v -> nums;
            $tmp['money'] = $v -> gprice * $v -> nums;
            $tmp['create_at'] = $t;
            
            $carts[] = $tmp;
        }
        
        //开启事务
        DB::beginTransaction();
        
        $res = DB::table('cart') -> insert($carts);
        if (!$res)
        {
            DB::rollBack();
            return redirect('/user/order') -> with(['msg' => '回填购物车数据失败']);
        }
        
        //删除订单信息
        $res = DB::table('order')
               -> where('uid', $this -> uid)
               -> where('id', $oid)
               -> delete();
        if (!$res)
        {
            DB::rollBack();
            return redirect('/user/order') -> with(['msg' => '删除订单失败']);
        }
        
        //删除订单详情
        $res = DB::table('order_detail')
               -> where('uid', $this -> uid)
               -> where('oid', $oid)
               -> delete();
        if (!$res)
        {
            DB::rollBack();
            return redirect('/user/order') -> with(['msg' => '删除订单详情失败']);
        }
        
        //提交
        DB::commit();
        
        //重定向到购物车页面
        return redirect('/user/cart');
    }
    
    /**
     * 订单修改地址
     *
     */
    public function changeAddr($id)
    {
        // dd($id);
        $id = intval($id);
        
        $aids = DB::table('user_address')
                -> select('id')
                -> where('uid', $this -> uid)
                -> get();
        // dd($aids);
        //验证
        $res = false;
        foreach ($aids as $v)
        {
            if ($v -> id == $id)
            {
                $res = true;
                break;
            }
        }
        
        if (!$res)
        {
            return back() -> with(['msg' => '选择地址失败']);
        }
        
        //订单ID
        $oid = session('user.currentOid');
        
        //构造查询语句
        $cons = DB::table('order_address')
            -> where('oid', $oid);
        
        $res = $cons -> first();
        
        if ($res)
        {
            //存在修改
            $res = $cons -> update(['aid' => $id]);
        }
        else
        {
            //不存在添加
            $data = [];
            $data['oid'] = $oid;
            $data['aid'] = $id;
            $res = DB::table('order_address') -> insert($data);
        }
        
        return back();
    }

    /**
     * 获取地址
     * {code: 1, num: 1, remain: 9}
     */
    public function getAddressInfo()
    {
        $nums = DB::table('user_address')
                -> where('uid', $this -> uid)
                -> count();
        $data = [
            'code' => 1,
            'num' => $nums,
            'remain' => config('app.addressMaxCount') - $nums,
        ];
        
        return response() -> json($data);
    }

    /**
     * 添加地址
     * {code: 0}
     */
    public function saveAddress(Request $request)
    {
        $type = $request -> input('type');
        
        $t = time();
        $data = [];
        $data['uid'] = $this -> uid;
        $data['name'] = $request -> input('truename');
        $data['phone'] = $request -> input('mobile') or $request -> input('phone');
        $data['detail'] = $request -> input('address');
        $data['province'] = $request -> input('prov');
        $data['city'] = $request -> input('city');
        $data['area'] = $request -> input('area');
        $data['country'] = 86;
        $data['create_at'] = $t;
        $data['update_at'] = $t;
        
        $res = DB::table('user_address') -> insert($data);

        if ($res)
        {
            return response() -> json(['code' => 0]);
        }
        else
        {
            return response() -> json(['code' => 1, 'msg' => '添加地址失败']);
        }
    }

    /**
     * 删除地址
     * {code: 0}
     */
    public function removeAddress(Request $request)
    {
        $id = $request -> input('id');
        $res = DB::table('user_address')
               -> where('uid', $this -> uid)
               -> where('id', $id)
               -> delete();

        if ($res)
        {
            DB::table('order_address')
               -> where('aid', $id)
               -> delete();
               
            return response() -> json(['code' => 0]);
        }
        else
        {
            return response() -> json(['code' => 1, 'msg' => '删除地址失败']);
        }
    }

    /**
     * 生成订单
     *
     */
    public function makeOrder()
    {
        $t = time();
        //订单ID
        $oid = session('user.currentOid');
        
        //获取订单数量进行判断
        // select od.nums as reqNums, g.nums as totalNums
        // from m_order_detail as od
        // left join m_goods as  g on g.id=od.gid
        // where od.uid=1 and od.oid = 2;
        $goods = DB::table('order_detail as od')
                 -> select('g.id','od.nums as num', 'g.name', 'g.nums as total')
                 -> leftJoin('goods as g', 'g.id', '=', 'od.gid')
                 -> where('od.oid', $oid)
                 -> where('od.uid', $this -> uid)
                 -> where('od.status', 1)
                 -> get();
        if (!$goods)
        {
            return response() -> json(['code' => 2, 'msg' => '商品不存在']);
        }
        $msg = '';
        foreach ($goods as $g)
        {
            if ($g -> num > $g -> total)
            {
                $msg .= '商品'.$g->name.'数量不足|';
            }
        }
        
        if (!empty($msg)){
            return response() -> json(['code' => 3, 'msg' => $msg.'请返回购物车修改']);
        }
        
        //修改订单更新时间
        $res = DB::table('order')
               -> where('id', $oid)
               -> where('uid', $this -> uid)
               -> where('status', 1)
               -> update(['update_at' => $t]);
               
        $res = DB::table('order_detail')
               -> where('oid', $oid)
               -> where('uid', $this -> uid)
               -> where('status', 1)
               -> update(['update_at' => $t]);
        if ($res)
        {
            foreach ($goods as $g)
            {
                $newNums = intval($g->total) - ($g->num);
                $data = [];
                $data['nums'] = $newNums;
                if ($newNums == 0)
                {
                    $data['status'] = 2;
                }
                //修改商品数量
                DB::table('goods')
                     -> where('id', $g->id)
                     -> update($data);
            }
            return response() -> json(['code' => 0, 'oid' => $oid]);
        }
        else
        {
            return response() -> json(['code' => 1, 'msg' => '订单修改失败']);
        }
    }
    
    /**
     * 订单结算
     *
     */
    public function pay($oid)
    {
        //订单ID
        $oid = session('user.currentOid');
        $address = DB::table('order_address')
                   -> where('oid', $oid)
                   -> first();
        if (!$address)
        {
            return redirect('/user/cartOrder/oid/'.$oid) -> with(['msg' => '请选择或填写收货地址！']);
        }
        //标题
        $title = '支付订单';
        
        //订单信息
        $order = DB::table('order as o')
                 -> select('o.*',
                    'ua.name',
                    'ua.phone',
                    'ua.country',
                    'ua.province',
                    'ua.city',
                    'ua.area',
                    'ua.detail',
                    'p.id as payId'
                 )
                 -> leftJoin('order_address as oa', 'oa.oid', '=', 'o.id')
                 -> leftJoin('user_address as ua', 'ua.id', '=', 'oa.aid')
                 -> leftJoin('order_payway as op', 'op.oid', '=', 'o.id')
                 -> leftJoin('payway as p', 'p.id', '=', 'op.payid')
                 -> where('o.uid', $this -> uid)
                 -> where('o.id', $oid)
                 -> where('o.status', 1)
                 -> groupBy('o.id')
                 -> first();
        // dd($order);
        if (!$order)
        {
            return redirect('/user/order') -> with(['msg' => '非法提交']);
        }
        
        //运费
        $shipping = 0;
        $order -> total += $shipping;
        $t = time();
        $order -> crrectTime = $order -> expires_in - ($t - $order -> update_at);
        
        $time = $order -> crrectTime;
        $h = 3600;
        $m = 60;
        
        $last_h = floor($time / $h);
        $last_m = floor(($time - ($last_h*$h)) / $m);
        $last_s = $time - ($last_h * $h) - ($last_m * $m);
        
        //支付方式
        $payway = DB::table('payway') -> get();
        
        $payways = [];
        foreach ($payway as $v)
        {
            $payways[$v->type][] = $v;
        }
        // dd($payways);
        
        return view('user.cartorder.pay', [
                    'title' => $title,
                    'order' => $order,
                    'payways' => $payways,
                    'time' => $time,
                    't' => $t,
                    'oid' => $oid,
                    'last_h' => $last_h,
                    'last_m' => $last_m,
                    'last_s' => $last_s,
                ]);
    }

    
    
    /**
     * 选择支付方式
     */
    public function selectPayway(Request $request)
    {
        //二次验证
        $oid = $request -> input('oid');
        $order_no = $request -> input('order_no');
        $payway = $request -> input('payway');
        
        if (empty($oid) || empty($order_no) || empty($payway))
        {
            return response() -> json(['code' => 1, 'msg' => '参数错误']);
        }
        
        if (!(DB::table('payway') -> where('id', $payway) -> first()))
        {
            return response() -> json(['code' => 2, 'msg' => '支付方式错误']);
        }
        
        $cons = DB::table('order_payway')
                -> where('oid', $oid)
                -> where('order_no', $order_no);
        $data = $cons -> first();
        if ($data)
        {
            //更新
            $res = $cons -> update(['payid' => $payway]);
        }
        else
        {
            //添加
            $data = [];
            $data['oid'] = $oid;
            $data['order_no'] = $order_no;
            $data['payid'] = $payway;
            $res = DB::table('order_payway') -> insert($data);
        }
        
        if ($res)
        {
            return response() -> json(['code' => 0]);
        }
        else
        {
            return response() -> json(['code' => 3, 'msg' => '选择支付方式失败']);
        }
        // dd($request -> all());
    }
    
    /**
     * 支付宝支付
     */
    public function alipay($oid)
    {
        //订单ID
        // $oid = session('user.currentOid');
        
        //订单信息
        $order = DB::table('order as o')
                 -> select('o.*', 'op.payid')
                 -> leftJoin('order_payway as op', 'op.oid', '=', 'o.id')
                 -> where('o.uid', $this -> uid)
                 -> where('o.id', $oid)
                 -> first();
        // dd($order);
        if (!$order)
        {
            return back() -> with(['msg' => '非法提交']);
        }
        
        if (empty($order -> payid))
        {
            return back() -> with(['msg' => '没有选择支付方式']);
        }
        
        //运费
        $shipping = 0;
        $order -> total += $shipping;
        // dd($order);
        $gateway = Omnipay::gateway();

        $options = [
            'service' => 'create_direct_pay_by_user',
            'out_trade_no' => $order -> order_no,
            'subject' => $order -> title,
            'body' => $order -> desc,
            'total_fee' => $order -> total,
            'extra_common_param' => 'scort',
        ];

        $response = $gateway->purchase($options)->send();
        $response->redirect();
    }
    
    /**
     * 支付宝支付结果返回页面
     * 方式：同步
     */
    public function alipayResult()
    {
        //标题
        $title = '支付结果';
        
        /**
            notify_time //通知时间
            out_trade_no //商户网站唯一订单号 64
            subject  //255商品名称
            trade_no //该交易在支付宝系统中的交易流水号。最长64位。
            trade_status //交易状态
            gmt_create //交易创建时间
            gmt_payment //交易付款时间
            gmt_close //交易关闭时间
            buyer_email //100 买家支付宝账号 买家支付宝账号，可以是Email或手机号码
            buyer_id //买家支付宝账户号买家支付宝账号对应的支付宝唯一用户号。 30
            total_fee  //该笔订单的总金额
            is_total_fee_adjust //是否调整总价
            use_coupon //是否在交易过程中使用了红包
            extra_common_param //用于商户回传参数，该值不能包含“=”、“&”等特殊字符。如果用户请求时传递了该参数，则返回给商户时会回传该参数。
            business_scene //是否扫码支付
            回传给商户此标识为qrpay时，表示对应交易为扫码支付。目前只有qrpay一种回传值。非扫码支付方式下，目前不会返回该参数。
        *    
            支付宝是用POST方式发送通知信息
            程序执行完后必须打印输出“success”（不包含引号）。如果商户反馈给支付宝的字符不是success这7个字符，支付宝服务器会不断重发通知，直到超过24小时22分钟
            
            通知触发条件
            TRADE_FINISHED 交易完成 true（触发通知）

            TRADE_SUCCESS 支付成功 true（触发通知）
        */
        $gateway = Omnipay::gateway();

        $options = [
            'request_params'=> $_REQUEST,
        ];

        $response = $gateway->completePurchase($options)->send();

        //获取返回数据
        $req = $options['request_params'];
         
        //订单信息
        $order_no = $req['out_trade_no'];
        
        //获取数据
        $data = DB::table('order_detail as od')
                -> select('od.*',
                    'g.code', 
                    'g.name', 
                    'g.price', 
                    'g.img',
                    'm.name as merchantName')
                //-> leftJoin('order as o', 'o.id', '=', 'od.oid')
                -> leftJoin('goods as g', 'g.id', '=', 'od.gid')
                -> leftJoin('merchant as m', 'm.id', '=', 'od.mid')
                -> where('od.order_no', $order_no)
                -> get();
        // dd($data);
        
        //商品总数量
        $totalCount = 0;
        foreach ($data as $v)
        {
            $totalCount += $v -> nums;
        }
        
        $order = DB::table('order as o')
                 -> select('o.total','p.type', 'p.way')
                 -> leftJoin('order_payway as op', 'op.oid', '=', 'o.id')
                 -> leftJoin('payway as p', 'op.payid', '=', 'p.id')
                 -> where('o.order_no', $order_no)
                 -> first();
        //共计
        $commTotal = $order -> total;
        // $ways = [1=>'支付宝',2=>'微信支付'];
        // $way = $ways[$order -> way];
        $way = $order -> way;
        // $way = '支付宝';
        // dd($order);
        
        $result = [
            'title' => $title,
            'data' => $data,
            'commTotal' => $commTotal,
            'way' => $way,
            'order_no' => $order_no,
        ];
        
        if ($response->isSuccessful() && $response->isTradeStatusOk())
        {
            //支付成功后操作
           
            
            //构造数据
            $data = [];
            $data['order_no'] = $req['out_trade_no'];
            $data['subject'] = $req['subject'];
            $data['body'] = $req['body'];
            $data['trade_no'] = $req['trade_no'];
            $data['buyer_email'] = $req['buyer_email'];
            $data['buyer_id'] = $req['buyer_id'];
            $data['total_fee'] = $req['total_fee'];
            $data['extra_common_param'] = $req['extra_common_param'];
            $data['trade_status'] = 2;
            $data['create_at'] = strtotime($req['notify_time']);
            $data['update_at'] = strtotime($req['notify_time']);
            
            
            //执行插入数据
            $res = DB::table('pay') -> insert($data);
            if (!$res)
            {
                $result['code'] = 1;
                $result['msg'] = '支付成功，支付数据插入失败';
                return view('user.cartorder.result', $result);
            }
            
            //开启事务
            DB::beginTransaction();
            
            //更新订单状态
            $res = DB::table('order')
                //-> where('uid', $this -> uid)
                -> where('order_no', $data['order_no'])
                -> update(['status' => 4]);
            if (!$res)
            {
                DB::rollBack();
                $result['code'] = 2;
                $result['msg'] = '支付成功，订单状态更新失败';
                return view('user.cartorder.result', $result);
            }
            
            //更新订单详情状态
            $res = DB::table('order_detail')
               // -> where('uid', $this -> uid)
                -> where('order_no', $data['order_no'])
                -> update(['status' => 4]);
            if (!$res)
            {
                DB::rollBack();
                $result['code'] = 3;
                $result['msg'] = '支付成功，订单详情更新失败';
                return view('user.cartorder.result', $result);
            }
            
            //用户收到货后由总帐户给商户反钱
            
            //提交
            DB::commit();
            
            $result['code'] = 0;
            $result['msg'] = '支付成功';
            return view('user.cartorder.result', $result);
        }
        else
        {
            //支付失败通知.
            $result['code'] = 9;
            $result['msg'] = '支付失败';
            return view('user.cartorder.result', $result);
        }

    }
    
}
