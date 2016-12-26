<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class CartController extends Controller
{
    private $uid;
    
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
    public function index(Request $request)
    {
        // dd(session() -> all());
        //从session中删除
        $request -> session() -> forget('user.cart');
        
        //购物车
        $title = '购物车';
        
        //获取数据
        $data = DB::table('cart as c')
                -> select('c.*',
                    'g.code', 
                    'g.name', 
                    'g.price', 
                    'g.img',
                    'g.nums as total',
                    'm.name as merchantName'
                    )
                -> leftJoin('goods as g', 'g.id', '=', 'c.gid')
                -> leftJoin('merchant as m', 'm.id', '=', 'c.mid')
                -> where('uid', $this -> uid)
                -> get();
                
        // dd($data);
        $items = [];
        foreach ($data as $v)
        {
            $items[$v->mid]['mid'] = $v -> mid; 
            $items[$v->mid]['merchantName'] = $v -> merchantName;
            $items[$v->mid]['sub'][] = $v;
        }
        // dd($items);
        
        return view('user.cart.index', 
                    [
                        'title' => $title,
                        'data' => $items
                    ]
                );
    }

    /**
     * 改变购物车中的商品的选中状态操作
     */
    public function changeSelect(Request $request)
    {
        // $request -> session() -> flush();
        $res = $request -> only(['row_id', 'select']);
        //商品 列表
        $items = $res['row_id'];
        //增加|减少
        $type = $res['select'];
        
        //获取购物车数据
        $data = DB::table('cart')
                -> select('gid')
                -> where('uid', $this -> uid)
                -> get();
                
        //构造数据
        if (!empty(session('user.cart')))
        {
            $goods = session('user.cart');
        }
        else
        {
            $goods = [];
        }
        
        // var_dump($type);
        //判断状态
        switch ($type)
        {
            //减
            case '0':
                if(empty(session('user.cart')))
                {
                    return response() -> json(['code' => 1, 'msg' => '没有可取消的商品']);;
                    break;
                }
                
                $goods = session('user.cart');
                foreach ($data as $v)
                {
                    if (in_array(md5($v -> gid), $items))
                    {
                        unset($goods[$v -> gid]);
                    }
                }
                break;
            //加
            case '1':
            default:
                foreach ($data as $v)
                {
                    if (in_array(md5($v -> gid), $items))
                    {
                        $goods[$v -> gid] = $v -> gid;
                    }
                }
                break;
        }
        //存入session
        session(['user.cart' => $goods]);
        // print_r(session() -> all());
        return response() -> json(['code' => 0]);
    }
    
    /**
     * 获取购物车中的商品的最新状态
     */
    public function getTotal(Request $request)
    {
        $res = $request -> only(['row_id']);
        //session商品 列表
        $gids = session('user.cart');
        
        //获取购物车数据
        $data = DB::table('cart as c')
                -> select('c.num', 'g.name', 'g.price')
                -> leftJoin('goods as g', 'g.id', '=', 'c.gid')
                -> where('uid', $this -> uid)
                -> whereIn('gid', $gids)
                -> get();
        
        // 商品信息
        $cart_msgs = [];
        
        // 商品总价
        $total = 0;
        
        // 商品数量
        $totalCount = 0;
        
        foreach ($data as $v)
        {
            //商品详情
            $tmp = [];
            $tmp['content'] = $v -> name;
            $tmp['name'] = $v -> name;
            $tmp['type'] = 'normal';
            
            //赋值
            $cart_msgs[] = $tmp;
            
            // 商品数量
            $totalCount += $v -> num;
            
            // 商品总价
            $total += ($v -> num * $v -> price);
        }
        
        // 构造数据
        $cartData = [
            'cart_msgs' => $cart_msgs,
            'cart_total' => [
                //'is_select_all' => 1,
                'select_quantity' => $totalCount,
                'settle_amount' => $total,
            ]
        ];
        
        return response() -> json(['code' => 1, 'cartData' => $cartData]);
    }

    /**
     * 获取购物车商品数量
     */
    public function getCartContents(Request $request)
    {
        //查询购物车里是否有商品
		$goodsCount = DB::table('cart')
				-> where('uid',$this -> uid)
				-> count();
		Session(['usergnum' => $goodsCount]);
		$res = ['row_id' => 1,'code' => 0,'count' => $goodsCount];
        return response() -> json($res);
    }
    
    /**
     * 添加到购物车
     */
    public function addToCart(Request $request)
    {
        //获取数据
        $data = $request -> all();
        //提取数据
        //print_r($data);
        $gid = $data['id'];
        $count = $data['count'];
        $num = $data['num'];
        $mid = $data['warehouse_id'];
        
        $res = DB::table('goods')
               -> where('id', $gid)
               -> first();
        if (!$res)
        {
            //构造
            $res = [
                'code' => 0,
                'msg' => "商品不存在"
            ];
        }
        
        //数量不足
        if (intval($res -> nums) < intval($num))
        {
            //构造
            $res = [
                'code' => 0,
                'msg' => "商品数量不足"
            ];
        }
        
        $construct = DB::table('cart')
               -> where('cart.uid', $this -> uid)
               -> where('cart.gid', $gid)
               -> where('cart.mid', $mid);
        // dd($construct -> get());
        //执行更新
        $res = $construct -> update(['num' => intval($num)]);
        
        if ($res)
        {
            //构造
            //获取更新后的数据
            $data = $construct 
                    -> select('cart.num','g.price') 
                    -> leftJoin('goods as g', 'g.id', '=', 'cart.gid')
                    -> first();
            // print_r($data);
            $res = [
                'code' => 1,
                'msg' => "商品已经加入购物车",
                'stock' => $data -> num,
                'subtotal' => ($data -> num * $data -> price),
                'total_qty' => null
            ];
        }
        else
        {
            //构造
            $res = [
                'code' => 0,
                'msg' => "商品加入购物车失败"
            ];
        }
        
        
        return response() -> json($res);
    }
    
    /**
     * 删除购物车中的商品
     *
     */
    public function removeItems(Request $request)
    {
        // dd(session() -> all());
        $res = $request -> only('row_id');
        //商品 列表
        $items = $res['row_id'];
        //获取购物车数据
        $data = DB::table('cart')
                -> select('gid')
                -> where('uid', $this -> uid)
                -> get();
                
        //构造数据
        $gid = [];
        foreach ($data as $v)
        {
            if (in_array(md5($v -> gid), $items))
            {
                $gid[] = $v -> gid;
            }
        }
        
        //判断商品是否存在
        if (empty($gid))
        {
            return response() -> json(['code' => 1, 'msg' => '商品不存在']);
        }
        
        //从session中删除
        $SCart = session('user.cart');
        if (!empty(session('user.cart')))
        {
            foreach ($gid as $g)
            {
                if(in_array($g, $SCart))
                {
                    unset($SCart[$g]);
                    session(['user.cart', $SCart]);
                }
            }
        }
        //执行删除
        DB::table('cart')
        -> where('uid', $this -> uid) 
        -> whereIn('gid', $gid) 
        -> delete();
        
        return response() -> json(['code' => 0, 'msg' => '删除成功']);
    }
    
    /**
     * 保存订单
     */
    public function saveCartContents(Request $request)
    {
        //未登录提交订单
        if (empty(session('user.uid')))
        {
            return response() -> json(['cod3' => 1]);
        }
        
        //获取session中用户选中的商品列表 ID
        $SCart = session('user.cart');
        
        $cart = DB::table('cart as c')
                -> select('c.gid', 'c.standard', 'c.mid', 'c.num', 'c.create_at as cartCreateAt', 'g.cid', 'g.bid', 'g.code', 'g.name as title', 'g.price', 'g.img')
                -> leftJoin('goods as g', 'g.id', '=', 'c.gid')
                -> where('c.uid', $this -> uid)
                -> whereIn('c.gid', $SCart)
                -> get();
        // dd($cart);
        
        $t = time();
        
        //总价
        $total = 0;
        $title = '';
        $desc = '';
        foreach ($cart as $v)
        {
            //计算总价
            $total += ($v -> price * $v -> num);
            $title .= $v -> title.'|';
            $desc .=  '['.$v -> title.'|'.$v -> price.'|'.$v -> num.']|';
        }
        
        //生成订单
        $order = [];
        $order['uid'] = $this -> uid;
        $order['order_no'] = $t.mt_rand(100000, 999999).'-'.mt_rand(100, 999);
        $order['title'] = $title;
        $order['desc'] = $desc;
        $order['total'] = $total;
        $order['create_at'] = $t;
        $order['update_at'] = $t;
        
        //开启事务
        DB::beginTransaction();
        
        //执行
        $oid = DB::table('order') -> insertGetId($order);
        if (!$oid)
        {
            DB::rollBack();
            return response() -> json(['code' => 1, 'msg' => '订单保存失败']);
        }
        
        //生成订单详情
        //订单详情数据
        $orderDetail = [];
        foreach ($cart as $v)
        {
            //构造数组
            $tmp = [];
            $tmp['uid'] = $this -> uid;
            $tmp['oid'] = $oid;
            $tmp['gid'] = $v -> gid;
            $tmp['mid'] = $v -> mid;
            $tmp['order_no'] = $order['order_no'];
            $tmp['price'] = $v -> price;
            $tmp['nums'] = $v -> num;
            $tmp['standard'] = $v -> standard;
            $tmp['create_at'] = $t;
            $tmp['update_at'] = $t;
            
            $orderDetail[] = $tmp;
        }
        
        //保存订单详情
        $res = DB::table('order_detail') -> insert($orderDetail);
        if (!$res)
        {
            DB::rollBack();
            return response() -> json(['code' => 2, 'msg' => '订单详情添加失败']);
        }
        
        //从session中删除
        $request -> session() -> forget('user.cart');
        
        //执行删除
        DB::table('cart')
        -> where('uid', $this -> uid) 
        -> whereIn('gid', $SCart) 
        -> delete();
        
        //提交
        DB::commit();
        
        //返回
        return response() -> json(['code' => 0, 'oid' => $oid]);
    }
}
