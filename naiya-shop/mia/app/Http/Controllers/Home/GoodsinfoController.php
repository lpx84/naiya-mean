<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeIndexController;
use DB;

class GoodsinfoController extends Controller
{
    public function info($id)
	{	
		$title = '商品详情';
		$uid = session('user.uid');
		//查询购物车里是否有商品
		$usergoods = DB::table('cart')
				-> select(DB::raw("count(*) as count"))
				-> where('uid',$uid)
				->first();
		$usergnum = $usergoods -> count;
		Session(['usergnum' => $usergnum]);
		$isStore = false;
		if($uid)
		{
			$ustore = DB::table('user_store')
						-> where('uid',$uid)
						-> where('type',1)
						-> where('typeid',$id)
						-> count();
			//dd($ustore);
			if($ustore)
			{
				$isStore = true;
			}
			else
			{
				$isStore = false;
			}
		}
		$tate = DB::table('goods as c1')
				-> leftJoin('brand as c2', 'c1.bid', '=', 'c2.id')
				-> leftJoin('cate as c3', 'c1.cid', '=', 'c3.id')
				-> leftJoin('merchant as c4', 'c1.mid', '=', 'c4.id')
				-> select('c1.*','c2.name as brandname',
						  'c3.name as catename', 'c4.name as merchantname'
							)
				-> where('c1.id',$id)
				-> first();
		//dd($tate);
		$cont = htmlspecialchars_decode($tate -> desc);
		//dd($tate);
		$smallimg = DB::table('goods_img')
				-> where('gid',$id)
				-> limit(4)
				-> get();
		//dd($smallimg);
		$param = DB::table('goods_params')
				-> where('gid',$id)
				-> get();
		//dd($param);
		//属性
		$data = DB::table('goods_attr as c1')
				-> leftJoin('attr_name as c2','c1.anid', '=', 'c2.id')
				-> leftJoin('attr_value as c3','c1.avid', '=', 'c3.id')
				-> leftJoin('merchant_attr_value as c4','c1.mavid', '=','c4.id')
				-> select(
						  'c1.anid',
						  'c1.avid',
						  'c1.mavid',
						  'c2.name as attrname', 
						  'c3.value as attrvalue',
						  'c4.value as mervalue'
						  )
				-> where('c1.gid',$id)
				-> get();
		

		
		$items = [];
		foreach($data as $v)
		{
			$items[$v->anid]['anid'] = $v -> anid;
			$items[$v->anid]['attrname'] = $v -> attrname;
		
			$tmp = [];
			$tmp['avid'] = $v -> avid;
			$tmp['attrvalue'] = $v -> attrvalue;
			$tmp['mavid'] = $v -> mavid;
			$tmp['mervalue'] = $v -> mervalue;
			
			$items[$v->anid]['sub'][] = $tmp;
			
		}
		
		$look = DB::table('goods')
			->limit(10)
			-> get();
		//dd($items);
		
		//查询评论
		$coment = DB::table('comment as c1')
				-> leftJoin('user as c2', 'c1.uid', '=', 'c2.id')
				-> select('c1.*', 'c1.title as title', 'c1.content', 'c2.username')
				-> where('c1.gid',$id)
				-> first();
		//dd($coment);
		return view('home.diapers_info',array_merge(['title' => $title,
										 'tate' => $tate,
										 'cont' => $cont,
										 'smallimg' => $smallimg,
										 'param' => $param,
										 'data' => $data,
										 'isStore' => $isStore,
										 'items' => $items,
										 'look' => $look,
										 'coment' => $coment
										 ],HomeIndexController::getData()));
	}
	public function add(Request $request)
	{
		$tate = $request -> all();
		
		$uid = session('user.uid');
		if($uid)
		{
			
			$gid = $tate['id'];
			$num = $tate['num'];
			$arr = [];
			$arr['uid'] = $uid;
			$arr['gid'] = $gid;
			$arr['num']  = $num;
			$arr['create_at'] = time();
			$data = DB::table('goods')
					-> where('id',$gid)
					-> first();
			$mid = $data -> mid;
			$money = $data -> price;
			$arr['mid'] = $mid;
			$arr['money'] = $money;
			
			/* $attrs = [];
			if(!empty($tate['str']))
			{
				foreach(json_decode($tate['str'], true) as $k)
				{
					//var_dump($k);
					$tmp = [];
					$tmp[$k['vId']] = $k['vVal'];
					$tmp['anid']= $k['anid'];
					$attrs[] = $tmp;
					
				}
			} */
			//$arr['standard'] = json_encode($attrs);
			
			$cartGoods = DB::table('cart')
						-> where('uid',$uid)
						-> where('gid',$gid)
						-> where('mid',$mid)
						-> orderBy('create_at', 'DESC')
						-> first();
			// if($cartGoods && (md5($cartGoods -> standard) == md5($arr['standard'])))
			if($cartGoods)
			{
				$nums = $cartGoods -> num + $arr['num'];
				$res = DB::table('cart')
						-> where('uid',$uid)
						-> where('gid',$gid)
						-> where('mid',$mid)
						//-> where(DB::raw('md5(standard)'),md5($arr['standard']))
						-> update(['num' => $nums]);
			}
			else
			{
				$res = DB::table('cart') -> insert($arr);
			}
			
			if ($res)
			{
				return response() -> json(['code' => 0]);
			}
			else
			{
				return response() -> json(['code' => 1]);
			}
			
		}
		else
		{
			return response() -> json(['code' => -1]);
		}
		
	
	
	}
	  
}
