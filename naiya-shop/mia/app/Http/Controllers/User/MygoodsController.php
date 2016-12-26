<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeIndexController;
use DB;

class MygoodsController extends Controller
{
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
		$uid = session('user.uid');
        $title = '我收藏的商品';
		$res = DB::table('user_store as c1')
				-> leftJoin('brand as c2', 'c1.typeid', '=', 'c2.id')
				-> leftJoin('goods as c3', 'c1.typeid', '=', 'c3.id')
				-> select('c1.*', 'c3.name as goodsname', 'c1.*', 'c3.img as images', 'c3.price', 'c3.id as goodsid')
				-> where('uid', $uid)
				-> where('type', 1)
				-> get();
		//dd($res);
		$num = DB::table('user_store')
				-> select(DB::raw("count(*) as count"))
				-> where ('uid',$uid)
				-> where('type','1')
				-> first();
		//dd($num);
        return view('user.store.goodslist',array_merge([
											'title' => $title,
											'res' => $res,
											'num' => $num
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
		//dd($id);
        $res = DB::table('user_store') -> where('id','=',$id) -> delete();
        if($res)
		{
            return response() -> json(['code' => 0]);
        }
		else
		{
            return response() -> json(['code' => 1]);
        }
    }
	
	//添加到购物车
	public function insert($id)
	{
		$uid = session('user.uid');
		$res = DB::table('user_store as c1')
				-> leftJoin('goods as c2','c2.id', '=', 'c1.typeid')
				-> select('c1.*','c2.mid as mid', 'c2.price as money')
				-> where('c1.id',$id)
				-> where('c1.uid',$uid)
				-> first();
		//dd($res);
				
		$arr = [];
		$arr['uid'] = $res -> uid;
		$arr['gid'] = $res -> typeid;
		$arr['mid'] = $res -> mid;
		$arr['create_at'] = $res -> create_at;
		$arr['money'] = $res -> money;
		$arr['num'] = 1;
		
		$gid = $res -> typeid;
		$mid = $res -> mid;
		//dd($arr);
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
			$data = DB::table('cart')
					-> where('uid',$uid)
					-> where('gid',$gid)
					-> where('mid',$mid)
					//-> where(DB::raw('md5(standard)'),md5($arr['standard']))
					-> update(['num' => $nums]);
		}
		else
		{
			$data = DB::table('cart') -> insert($arr);
		}
		
		
		//dd($res);
		if($data)
		{
			return redirect('user/mygoods') -> with(['info' => '添加成功']);
		}
		else
		{
			return redirect('user/mygoods');
		}
	}
	public function add($id)
	{
		$uid = session('user.uid');
		$ustore = DB::table('user_store')
					-> where('uid',$uid)
					-> where('type',1)
					-> where('typeid',$id)
					-> count();
		//dd($ustore);
		if($ustore <= 0)
		{
			$data = [];
			$data['uid'] = $uid;
			$data['type'] = 1;
			$data['typeid'] = $id;
			$data['create_at'] = time();
			//dd($data);
			$res = DB::table('user_store') -> insert($data);
			if($res)
			{
				return redirect("/goods/{$id}") -> with(['info' => '收藏成功', 'code' => 0]);
			}
		}
		else
		{
			return redirect("/goods/{$id}") -> with(['code' => 1]);
		}
		
	}
}
