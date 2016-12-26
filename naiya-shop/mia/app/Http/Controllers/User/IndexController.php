<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeIndexController;
use DB;

class IndexController extends Controller
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
						);
						
	//登录验证
	public function __construct()
	{
		$this -> middleware(['user.login']);
	}
	
    public function index()
	{
		$title = '个人中心';
		$id = session('user.uid');
		$res = DB::table('user') 
				-> where('id', $id)
				-> first();
		//dd($res);
		$data = DB::table('order_detail as c2')
				-> leftJoin('order as c1' , 'c1.id', '=', 'c2.oid')
				-> leftJoin('goods as c3' , 'c2.gid', '=', 'c3.id')
				-> select('c1.*', 'c2.nums AS num' , 'c1.*', 'c2.price as pri' , 'c2.*', 'c3.img AS images','c3.id as goodsid', 'c3.name as goodsname')
				-> orderBy('c1.id','desc')
				-> where('c1.uid',$id)
				-> get();
		//dd($data);
		$uid = session('user.uid');
		$val = DB::table('order_detail as c1')
				-> leftJoin('goods as c2', 'c1.gid', '=', 'c2.id')
				-> leftJoin('order as c3', 'c1.oid', '=', 'c3.id')
				-> select('c1.*', 'c2.name as goodsname',
						  'c3.total as amount'
						)
				-> where('c1.uid',$uid)
				-> where('c1.status',6)
				-> get();
				
		$score = DB::table('user_score')
					-> where('uid',$uid)
					-> get();
		//dd($res);
		//计算总积分
		$count = [];
		foreach($score as $value)
		{
			$count[] = $value -> value;
		}
		$sum = array_sum($count);
		// $nowsum['score'] = $sum + 50;
		// DB::table('user') -> where('id',$uid) -> update($nowsum);
		//查询购物车里是否有商品
		$usergoods = DB::table('cart')
				-> select(DB::raw("count(*) as count"))
				-> where('uid',$id)
				->first();
		$usergnum = $usergoods -> count;
		Session(['usergnum' => $usergnum]);
		$score = DB::table('user')
					-> select('score','max_score')
					-> where('id',$uid)
					-> first();
		//dd($score);
		$grade = grade($score -> max_score);
		return view('user.index.index',array_merge([
									'title' => $title,
									'res' => $res,
									'data' => $data, 
									'arr' => $this -> arr,
									'val' => $val,
									'sum' => $sum,
									'grade' => $grade,
									'score' => $score -> score
									],HomeIndexController::getData()));
	}
	
	public function logout(Request $request)
	{
		$request -> session() -> forget('user');
		//return redirect('/user/login');
		return back();
	}
}
