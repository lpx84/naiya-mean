<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeIndexController;
use DB;
class PaymentController extends Controller
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
				-> select('c1.*', 'c2.nums AS num' , 'c1.*', 'c2.price as pri' , 'c2.*', 'c3.img AS images','c2.*','c3.name as name','c3.id as goodsid')
				-> orderBy('c1.id','desc')
				-> get();
		//dd($data);
		
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
				
		//dd($num);
		//dd($this -> arr);
		return view('user.order.payment',array_merge([
											'title' => $title, 
											'data' => $data, 
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
        //
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
		$data['status'] = '12';
		//dd($data);
		$res = DB::table('order_detail')
				-> where('oid',$id)
				-> update($data);
		$resOrder = DB::table('order')
				-> where('id',$id)
				-> update($data);
		if($res && $resOrder)
		{
			return redirect('/user/order/payment') -> with(['info' => '取消成功']);
		}
		else
		{
			return redirect('/user/order/payment') -> with(['info' => '取消失败']);
		}
	}
}
