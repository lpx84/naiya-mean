<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeIndexController;
use DB;

class OrderController extends Controller
{
	public $arr = array('1' => '待支付',
						'2' => '已取消',
						'3' => '交易关闭',
						'4' => '已支付',
						'5' => '待发货',
						'6' => '已发货',
						'7' => '已收货',
						'8' => '已完成',
						'9' => '退货中',
						'10' => '已退货',
						'11' => '已退款',
						'12' => '未付款取消订单',
						'13' => '已付款取消订单'
						);
	//登录验证
	public function __construct()
	{
		$this -> middleware(['user.login']);
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '我的订单';
		$uid = session('user.uid');
		//原始语句
		// SELECT c1.*,c2.nums AS num , c1.*,c2.price as pri , c2.*,c3.img AS images 
		// from m_order_detail as c2
		// LEFT JOIN m_order as c1 on c1.id = c2.oid 
		// LEFT JOIN m_goods as c3 on c2.gid = c3.id
		$data = DB::table('order_detail as c2')
				-> leftJoin('order as c1' , 'c1.id', '=', 'c2.oid')
				-> leftJoin('goods as c3' , 'c2.gid', '=', 'c3.id')
				-> select('c1.*', 'c2.nums AS num' , 'c2.price as pri' , 'c2.*', 'c3.img AS images','c3.name as name','c3.id as goodsid', 'c3.price as stdprice')
				-> orderBy('c1.id','desc')
				-> where('c1.uid',$uid)
				-> get();
		//dd($data);
		//dd($this -> arr);
		$items = [];
		foreach($data as $v)
		{
			$items[$v->oid]['id'] = $v -> id;
			$items[$v->oid]['uid'] = $v -> uid;
			$items[$v->oid]['status'] = $v -> status;
			$items[$v->oid]['create_at'] = $v -> create_at;
			$items[$v->oid]['order_no'] = $v -> order_no;
			
			$items[$v->oid]['sub'][] = $v;
		}
		// dd($items);
		//代付款的订单数
		$paymentNum = DB::table('order_detail')
				-> select(DB::raw("count(*) as count"))
				-> where('uid',$uid)
				-> where('status',1)
				-> first();
				
		//待发货的订单数
		$shipmentsNum = DB::table('order_detail')
				-> select(DB::raw("count(*) as count"))
				-> where('uid',$uid)
				-> where('status',5)
				-> first();
				
		//已发货的订单数
		$doshipmentsNum = DB::table('order_detail')
				-> select(DB::raw("count(*) as count"))
				-> where('uid',$uid)
				-> where('status',6)
				-> first();
		return view('user.order.index',array_merge([
										'title' => $title, 
										'data' => $data, 
										'items' => $items, 
										'arr' => $this -> arr, 
										'paymentNum' => $paymentNum,
										'shipmentsNum' => $shipmentsNum,
										'doshipmentsNum' => $doshipmentsNum
										],HomeIndexController::getData()));
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
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
	public function editUpdate($id)
	{
		$tt = time();
        $data['update_at'] = $tt;
		$data['status'] = '2';
		//dd($data);
		$res = DB::table('order_detail')
				-> where('oid',$id)
				-> update($data);
		$resOrder = DB::table('order')
				-> where('id',$id)
				-> update($data);
		if($res && $resOrder)
		{
			return redirect('/user/order') -> with(['info' => '取消成功']);
		}
		else
		{
			return redirect('/user/order') -> with(['info' => '取消失败']);
		}
	}
	public function details($id)
	{
		$uid = session('user.uid');
		$title = '订单详情';
		$data = DB::table('order')
				-> where('id',$id)
				-> first();
		//dd($data);
		$aid = DB::table('order_address')
				-> select('aid')
				-> where('oid',$id)
				-> first();
		//地址id
		//dd($aid);
		$res = null;
		if($aid)
		{
			$ressid = $aid -> aid;
			$res = DB::table('user_address')
					-> where('id',$ressid)
					-> first();
		}
		//dd($res);
		//原始语句
		//select c1.*,c2.name as goodsname, c1.*,c2.price as pri from m_order_detail as c1 LEFT JOIN m_goods as c2 on c1.gid = c2.cid where oid = 2
		$showres = DB::table('order_detail as c1')
				->leftJoin('goods as c2','c1.gid','=','c2.id')
				-> select('c1.*', 'c2.name AS goodsname','c2.price as pri','c2.img as images','c2.id as goodsid')
				-> where('oid',$id)
				-> get();
		// dd($showres);
        return view('user.order.show',array_merge([
									'title' => $title, 
									'data' => $data,
									'arr' => $this -> arr,
									'res' => $res,
									'showres' => $showres
									],HomeIndexController::getData()));
	}
}
