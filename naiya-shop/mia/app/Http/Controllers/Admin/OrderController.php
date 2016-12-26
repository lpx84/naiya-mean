<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Omnipay;

class OrderController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin.login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // //订单首页
		// $title = '订单查看';
		// $data = DB::table('order_detail as o')
				// -> leftJoin('user as u','o.uid','=','u.id')
				// -> leftJoin('order as d','o.oid','=','d.id')
				// -> select('o.*','u.username','d.status as ds','d.id' )
				// -> where('d.order_no','like','%'.$request -> input('keyWord').'%')
				// -> paginate($request -> input('pageSize',10));
		
		// //dd($data);
		// return view('admin.order.index',[
				// 'title' => $title,'data' => $data,
				// 'request' => $request -> only(['keyWord','pageSize']),
				// ]);
				
				
		//订单列表
        $title = '订单列表';
        
        //获取数据
        $data = DB::table('order_detail as od')
                -> select('od.oid')
               
                -> where('od.order_no', 'like', $request -> input('keyWord', '').'%') 
                //-> orderBy('od.status', 'ASC')
                -> groupBy('od.order_no')
                -> orderBy('od.create_at', 'DESC')
                -> paginate( $request -> input('pageSize', 10));
        // dd($data);
        // 订单列表
        $oids = [];
        foreach ($data as $v)
        {
            $oids[] = $v -> oid;
        }
        
        $item = DB::table('order_detail as od')
                -> select('od.*', 'g.price', 'g.code as gcode', 'g.name as gname', 'g.img as gimg','u.username','o.desc')
                -> leftJoin('goods as g', 'g.id', '=', 'od.gid')
                -> leftJoin('user as u', 'u.id', '=', 'od.uid')
                -> leftJoin('order as o', 'o.id', '=', 'od.oid')
                -> whereIn('od.oid', $oids)
                -> orderBy('od.create_at', 'DESC')
                -> get();
        // dd($item);
        //重新构造
        $items = [];
        foreach ($item as $v)
        {
            $items[$v->oid][] = $v;
        }
       //dd($items);
		return view('admin.order.index',[
				'title' => $title,'data' => $data,
				'items' => $items,
				'request' => $request -> only(['keyWord','pageSize']),
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //订单及物流详情
		$title = '订单及物流详情';
		$order = DB::table('order')
				-> where('id',$id)
				-> first();
		
		// $order_detail = DB::table('order_detail')
				// -> where('oid',$id)
				// -> get();
				
		$user = DB::table('user')
				-> where('id',$order -> uid)
				-> first();
		
		$order_address = DB::table('order_address')
				-> where('oid',$id)
				-> first();
		if($order_address)
		{
			$address = DB::table('user_address')
					-> where('id',$order_address -> aid)
					-> first();
		}
		else{
			$address = '';
		}
		
		// $arr = [];
		
		// foreach($order_detail as $k => $v)
		// {
			// $arr[] = $v -> gid;
		// }
		
		// $mer = [];
		// foreach($order_detail as $b => $c)
		// {
			// $mer[] = $c -> mid;
		// }
		
		$goods = DB::table('order_detail as o')
				-> select('o.*','g.name','m.username','m.name as mname')
				->leftJoin('goods as g','o.gid','=','g.id')
				-> leftJoin('merchant as m','g.mid','=','m.id')
				-> where('o.oid',$id)
				-> get();
		// dd($goods);
		$logistics = DB::table('logistics')
				-> where('oid',$id)
				-> first();
		
		// $merchant = DB::table('merchant')
				// -> whereIn('id',$mer)
				// -> get();
		// dd($merchant);
		// $payway = DB::table('order_payway')
				// -> where('oid',$id)
				// -> first();
		
		// $pay = DB::table('payway')
				// -> where('id',$payway -> payid)
				// -> first();
		if ($logistics)
		{
			$logistics -> content = htmlspecialchars_decode($logistics -> content);
		}
		return view('admin.order.show',[
				'title' => $title,'order' => $order,
				// 'order_detail' => $order_detail,
				'user' => $user,'address' => $address,
				'goods' => $goods,'logistics' => $logistics,
				// 'merchant' => $merchant,
				//'pay' => $pay,
			]);
			
			

			
			
			
			
			
    }

    /**
     * 支付宝退款
     */
    public function alipayRefund($oid, $gid, $uid, $mid)
    {
        //订单ID
        // $oid = session('user.currentOid');
        
        //订单信息
        $order = DB::table('order_detail as od')
                 -> select('od.*', 'op.payid', 'p.way as pay_way', 'p.name as pay_name', 'pay.buyer_id')
                 -> leftJoin('order_payway as op', 'op.oid', '=', 'od.oid')
                 -> leftJoin('payway as p', 'p.id', '=', 'op.payid')
                 -> leftJoin('pay', 'pay.order_no', '=', 'od.order_no')
                 -> where('od.uid', $uid)
                 -> where('od.oid', $oid)
                 -> where('od.gid', $gid)
                 -> where('od.mid', $mid)
                 -> where('od.status', 10)
                 -> first();
        // dd($order);
        if (!$order)
        {
            return back() -> with(['msg' => '订单不存在']);
        }
        
        if (empty($order -> payid))
        {
            return back() -> with(['msg' => '订单没有支付方式']);
        }
        
        if (empty($order -> buyer_id))
        {
            return back() -> with(['msg' => '订单没有支付，不能退款']);
        }
        
        //运费
        $shipping = 0;
        $total = ($order->nums * $order->price)+ $shipping;
        // dd($order);
        $gateway = Omnipay::gateway();

        $options = [
            'service' => 'refund_fastpay_by_platform_pwd',
            'seller_email' => config('laravel-omnipay.gateways.alipay.options.partner'),
            
            'refund_date' => date('Y-m-d H:i:s'),
            'batch_no' => date('YmdHis').str_random(6),
            'batch_num' => 1,
            //原付款支付宝交易号^退款总金额^退款理由
            'detail_data' => $order -> buyer_id.'^'.$total.'退货退款',
        ];

        $response = $gateway->purchase($options)->send();
        $response->redirect();
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$gid,$uid)
    {
        // //退款确认
		// $title = '退款确认';
		// $data = DB::table('order_detail')
				// -> where('oid',$id)
				// -> first();
		// return view('admin.order.edit',['title' => $title,'data' => $data]);
		
		//$status = $request -> only(['status']);
		
		//更改订单详情的状态
		$d = DB::table('order_detail')
				-> where('oid',$id)
				-> where('gid',$gid)
				-> where('uid',$uid)
				-> update(['status' => 11]);
				
		
		
		//退款货物的状态
		$g = DB::table('goods_back')
				-> where('oid',$id)
				-> where('gid',$gid)
				-> where('uid',$uid)
				-> update(['status'=>3]);
		
		if($d && $g)
		{
			
			return redirect('admin/order') -> with(['msg' => '退款成功']);
		}
		else
		{
			return back() -> with(['msg' => '退款失败']);
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		//dd($request -> all());
		$status = $request -> only(['status']);
		
		//更改订单详情的状态
		$d = DB::table('order_detail')
				-> where('oid',$id)
				-> update($status);
				
		//更改订单状态
		$o = DB::table('order')
				-> where('id',$id)
				-> update($status);
		
		//退款货物的状态
		$g = DB::table('goods_back')
				-> where('oid',$id)
				-> update($status);
		
		if($d && $o && $g)
		{
			
			return redirect('admin/order') -> with(['msg' => '退款成功']);
		}
		else
		{
			return back() -> with(['msg' => '退款失败']);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
