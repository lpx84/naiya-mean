<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\GoodsbackRequst;
use App\Http\Controllers\Home\HomeIndexController;
use App\Http\Controllers\Controller;
use DB;

class DoShipmentsController extends Controller
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
				-> select('c1.*', 'c2.nums AS num' , 'c1.*', 'c2.price as pri' , 'c2.*', 'c3.img AS images','c2.*','c3.name as name', 'c3.id as goodsid')
				-> orderBy('c1.id','desc')
				-> get();
		//dd($data);
		//dd($this -> arr);
		
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
		return view('user.order.doshipments',array_merge([
											'title' => $title, 
											'data' => $data, 
											'arr' => $this -> arr, 
											'paymentNum' => $paymentNum, 'shipmentsNum' => $shipmentsNum,
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
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsbackRequst $request)
    {
		$uid = session('user.uid');
		$data = $request -> except('_token');
		$oid = $request -> input(['id']);
		//dd($oid);
		unset($data['id']);
		$res = DB::table('order_detail')
				-> where('oid',$oid)
				-> where('uid',$uid)
				-> first();
		//dd($res);
		$data['uid'] = $uid;
		$data['oid'] = $res -> oid;
		$data['order_no'] = $res -> order_no;
		$data['create_at'] = $res -> create_at;
		$data['update_at'] = time();
		$data['status'] = 1;
		$data['gid'] = $res -> gid;
		$data['content'] = '已退货';
		//dd($data);
		$value = DB::table('goods_back') -> insert($data);
		$arr = [];
		$arr['status'] = 9;
		$order = DB::table('order') 
				-> where('id',$oid)
				-> where('uid',$uid)
				-> update($arr);
		$ordetail = DB::table('order_detail') 
				-> where('oid',$oid)
				-> where('uid',$uid)
				-> update($arr);
		if($value && $order && $ordetail)
		{
			return redirect('/user/return/list') -> with(['info' => '退货信息填写成功，正在进行退货，请耐心等待']);
		}
		else
		{
			return back() -> with(['info' => '退货信息填写失败']) ;
		}
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
	public function relist()
	{
		$title = '退货退款';
		$uid = session('user.uid');
		$data = DB::table('order_detail as c1')
				-> leftJoin('order as c2','c2.id', '=', 'c1.oid')
				-> leftJoin('goods as c3','c1.gid', '=', 'c3.id')
				-> select('c2.*','c1.price','c3.name as goodsname','c3.img as images','c3.id as goodsid','c1.oid','c1.status as destatus')
				-> where('c2.uid',$uid)
				-> whereIn('c1.status',[6,7,8,9,10,11])
				-> get();
		// dd($data);
		$gbackid = DB::table('goods_back')
				-> select('oid')
				-> where('uid',$uid)
				-> get();
		
		//dd($gbackid);
		$backarr = [];
		foreach($gbackid as $value)
		{
			$backarr[] = $value -> oid;
		}
		
		return view('user.order.relist',array_merge(['title' => $title,
										 'data' => $data,
										 'arr' => $this -> arr,
										 'backarr' => $backarr
											],HomeIndexController::getData()));
	}
	
	public function reshow($id,$gid)
	{
		$uid = session('user.uid');
		$title = '订单详情';
		$data = DB::table('order')
				-> where('id',$id)
				-> where('uid',$uid)
				-> first();
		//dd($data);
		$aid = DB::table('order_address')
				-> select('aid')
				-> where('oid',$id)
				-> first();
		//地址id
		//dd($aid);
		$ressid = $aid -> aid;
		$res = DB::table('user_address')
				-> where('id',$ressid)
				-> first();
		//dd($res);
		//原始语句
		//select c1.*,c2.name as goodsname, c1.*,c2.price as pri from m_order_detail as c1 LEFT JOIN m_goods as c2 on c1.gid = c2.cid where oid = 2
		$showres = DB::table('order_detail as c1')
				-> leftJoin('goods as c2','c1.gid','=','c2.id')
				-> select('c1.*', 'c2.name AS goodsname','c2.price as pri','c2.img as images','c2.id as goodsid')
				-> where('oid',$id)
				-> where('gid',$gid)
				-> where('c1.uid',$uid)
				-> first();
		// dd($showres);
		
		//退货表中信息
		$gback = DB::table('goods_back')
				-> where('uid',$uid)
				-> where('oid',$id)
				-> first();
		
        return view('user.order.reshow',array_merge([
									'title' => $title, 
									'data' => $data,
									'arr' => $this -> arr,
									'res' => $res,
									'showres' => $showres,
									'gback' => $gback
									],HomeIndexController::getData()));
	}
	
	//填写退货物流信息
	public function add($id)
	{
		//dd($id);
		$title = '填写退货信息';
		return view('user.order.reback',array_merge(['title' => $title,'id' => $id],HomeIndexController::getData()));
	}
}
