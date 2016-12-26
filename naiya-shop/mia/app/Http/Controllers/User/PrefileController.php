<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeIndexController;
use DB;

class PrefileController extends Controller
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
        $title = '账户信息';
		$id = session('user.uid');
		//dd($id);
		$res = DB::table('user') 
				-> where('id', $id)
				-> first();
		//dd($res);
		return view('user.home.prefile.index',array_merge(['title' => $title,'res' => $res],HomeIndexController::getData()));
		
		
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
		$data = $request -> except(['_token','_method']);
		if(empty($data['username']))
		{
			return back() -> with(['info' => '修改用户名不能为空']);
		}
		$data['update_at'] = time();
		$id = $data['id'];
		//dd($data);
		$res = DB::table('user') 
				-> where('id',$id)
				-> update($data);
		 if($res){
			$request -> session() -> put('user.username',$data['username']);
            return redirect('/user/prefile') -> with(['info' => '更新成功']);
			
        }else{
            return back() -> with(['info' => '更新失败']);
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
