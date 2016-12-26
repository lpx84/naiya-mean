<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RessRequest;
use App\Http\Controllers\Home\HomeIndexController;
use App\Http\Controllers\Controller;
use DB;

class RessController extends Controller
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
        $title = '地址管理';
		$uid = session('user.uid');
		$res = DB::table('user_address')
				-> where('uid',$uid)
				-> orderBy('is_default','desc')
				-> get();
		
		$num = DB::table('user_address')
				-> select(DB::raw("count(*) as count"))
				-> where('uid',$uid)
				-> first();
		return view('user.home.ress.index',array_merge([
										'title' => $title, 
										'res' => $res, 
										'num' => $num,
										],HomeIndexController::getData()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$title = '添加地址';
		$uid = session('user.uid');
		$num = DB::table('user_address')
				-> select(DB::raw("count(*) as count"))
				-> where('uid',$uid)
				-> first();
		return view('user.home.ress.create',array_merge(['title' => $title,'num' => $num],HomeIndexController::getData()));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RessRequest $request)
    {
        //dd($request -> all());
		$uid = session('user.uid');
		$data = $request -> except(['_token']);
		$data['uid'] = $uid;
		$data['country'] = 86;
		$tt = time();
		//$data['status'] = 1;
        $data['create_at'] = $tt;
        $data['update_at'] = $tt;
		$value = DB::table('user_address')
				-> select(DB::raw("count(*) as count"))
				-> where('uid',$uid)
				-> first();
		//dd($value);
		if($value -> count == 0)
		{
			$data['is_default'] = 1;
		}
		
		//dd($data);
		$res = DB::table('user_address') -> insert($data);
		if($res)
		{
			return redirect('/user/prefile/ress') -> with(['info' => '添加成功']);
		}
		else
		{
			return back() -> with(['info' => '添加失败']);
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
		$title = '编辑地址';
		$uid = session('user.uid');
		$res = DB::table('user_address')
				-> where('id',$id)
				-> first();
        $num = DB::table('user_address')
				-> select(DB::raw("count(*) as count"))
				-> where('uid',$uid)
				-> first();
		
		return view('user.home.ress.edit',array_merge(['title' => $title, 'res' => $res, 'num' => $num],HomeIndexController::getData()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RessRequest $request, $id)
    {
		//dd($id);
        //dd($request -> all());
		$data = $request -> except(['_token','_method',]);
		$tt = time();
        $data['update_at'] = $tt;
		$id = $id;
		//dd($data);
		$res = DB::table('user_address')
				-> where('id',$id)
				-> update($data);
		
		if($res)
		{
			return redirect('/user/prefile/ress') -> with(['info' => '修改成功']);
		}
		else
		{
			return  redirect('user/home/ress/edit') -> with(['info' => '修改失败']);
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
        $res = DB::table('user_address') -> where('id','=',$id) -> delete();
        if($res)
		{
            DB::table('order_address')
               -> where('aid', $id)
               -> delete();
            return response() -> json(['code' => 0]);
        }
		else
		{
            return response() -> json(['code' => 1]);
        }

    }
	//设为默认地址
	public function tolerant($id)
	{
		$uid = session('user.uid');
		$data['is_default'] = 1;
		$default['is_default'] = 0;
		//设为默认地址时全部初始化为状态0
		DB::table('user_address')
				-> where('uid',$uid)
				-> update($default);
		//设为默认地址时这个地址的状态为1
		$ress = DB::table('user_address')
				-> where('id',$id)
				-> update($data);
				
		if($ress)
		{
			return redirect('/user/prefile/ress') -> with(['info' => '修改成功']);
		}
		else
		{
			return  redirect('/user/home/ress/edit') -> with(['info' => '修改失败']);
		}
		
		
		
	}
	
}
