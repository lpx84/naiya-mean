<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeIndexController;
use DB;

class MybrandController extends Controller
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
        $title = '收藏品牌';
		$uid = session('user.uid');
		$num = DB::table('user_store')
				-> select(DB::raw("count(*) as count"))
				-> where ('uid',$uid)
				-> where('type','2')
				-> first();
		//dd($num);
		$data = DB::table('user_store')
				-> where('uid',$uid)
				-> where('type',2)
				-> get();
		//dd($data);
		//原始语句 查询已收藏的品牌
		//SELECT c1.*,c2.name as goodsname FROM m_user_store as c1 
		//LEFT JOIN m_brand as c2 on c1.typeid = c2.id 
		//where uid = 1 and type = 2
		$res = DB::table('user_store as c1')
				-> leftJoin('brand as c2', 'c1.typeid', '=', 'c2.id')
				-> select('c1.*', 'c2.name as goodsname', 'c1.*', 'c2.img as images', 'c1.typeid as brandid')
				-> where('uid', $uid)
				-> where('type', 2)
				-> get();
		//dd($res);
		return view('user.store.indexbrand',array_merge([
										'title' => $title,
										'num' => $num,
										'res' => $res
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

    
	
	public function brandlist()
	{
		$title = '品牌列表';
		//原始语句
		//第一种select b.*,c.name as cname from m_brand as b, m_cate as c where b.cid=c.id;
		//第二种
		//SELECT c1.*,c2.name as names  FROM m_brand as c1 LEFT JOIN m_cate as 
		
		//select * from m_cate where id in (select pid from m_cate where id in (select cid from m_brand));
		////////////////////////////////////////
		$data = DB::table('brand')
				-> orderBy('cid')
				-> get();
		
		$newData = [];
		foreach($data as $v)
		{
			$newData[$v -> cid]['cid'] = $v -> cid;
			$newData[$v -> cid]['sub'][] = $v;
			// $newData[$v -> cid][] = $v;
		}
		
		
		$data = DB::table('brand')
				-> select('cid')
				-> groupBy('cid')
				-> get();
		$cids = [];
		foreach($data as $v)
		{
			$cids[] = $v->cid;
		}
		
		//CID NAME
		$rel = DB::table('cate')
				-> whereIn('id', $cids)
				->get();
		foreach($rel as $v)
		{
			$newData[$v -> id]['cname'] = $v -> name;
			$newData[$v -> id]['pid'] = $v -> pid;
		}
		
		$pids = [];
		foreach($rel as $val)
		{
			$pids[] = $val -> pid;
		}
		//dd($pids);
		
		//PID NAME
		$name = DB::table('cate')
				-> select('id', 'name')
				-> whereIn('id', $pids)
				-> groupBy('id')
				-> get();
		$names = [];
		foreach($name as $v)
		{
			$names[$v -> id]['pid'] = $v -> id;
			$names[$v -> id]['pname'] = $v -> name;
		}
		//print_r($newData);
		//print_r($names);
		foreach($names as $key => $value)
		{
			foreach($newData as $v)
			{
				if($key == $v ['pid'])
				{
					$names[$key]['sub'][] = $v;
				}
			}
		}
		//print_r($names);
		$newArr = [];
		foreach($names as $v)
		{
			$tmp = [];
			$tmp['pid'] = $v['pid'];
			$tmp['pname'] = $v['pname'];
			
			if(array_key_exists('sub', $v))
			{
				foreach($v['sub'] as $value)
				{
					if(array_key_exists('sub', $value))
					{
						foreach($value['sub'] as $subvalue)
						{
							$tmp['sub'][] = $subvalue;
						}
					}
				}
			}
			
			$newArr[] = $tmp;
		}
		//print_r($newArr);
		
		//原始语句查询收藏的品牌
		//SELECT typeid from m_user_store where uid = 1 and type = 2
		$uid = session('user.uid');
		$arr = DB::table('user_store')
				-> select('typeid')
				-> where('uid',$uid)
				-> where('type',2)
				-> get();
		$array = [];
		foreach($arr as $v)
		{
			$array[] = $v -> typeid;
		}
		//dd($arr);
		return view('user.store.brandlist',array_merge([
											'title' => $title,
											'name' => $name,
											'newArr' => $newArr,
											'array' => $array
											],HomeIndexController::getData()));
	}
	
	//添加收藏品牌
	public function liststore($id)
	{
		//用户id
		$uid = session('user.uid');
		$data = [];
		$data['type'] = 2;
		$data['typeid'] = $id;
		$data['uid'] = $uid;
		$tt = time();
		$data['create_at'] = $tt;
		//dd($data);
		$res = DB::table('user_store') -> insert($data);
		if($res)
		{
			return redirect('/brand/list');
		}
		else
		{
			return redirect('/brand/list');
		}	
		
	}
	//在店铺中取消收藏
	public function listoff($id)
	{
		$uid = session('user.uid');
		$data = DB::table('user_store')
				-> where('uid',$uid)
				-> where('typeid',$id)
				-> delete();
		
		if($data)
		{
			return redirect('/brand/list');
		}
		else
		{
			return redirect('/brand/list');
		}	
	}
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	
	public function destroy($id)
    {
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
}
