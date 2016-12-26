<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PasswordRequest;
use App\Http\Controllers\Home\HomeIndexController;
use App\Http\Controllers\Controller;
use DB;
//引用验证码命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use Hash;

class PasswordController extends Controller
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
        $title = '修改密码';
		$id = session('user.uid');
		//dd($id);
		$res = DB::table('user') 
				-> where('id', $id)
				-> first();
		return view('user.home.repassword.index',array_merge(['title' => $title,'res' => $res],HomeIndexController::getData()));
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
    public function update(PasswordRequest $request, $id)
    {
        //dd($request -> all());
		$data = $request -> except(['_token','_method','confirmNewPassword','oldImg']);
		//dd($data);
		if($data['authcode'] != session('code'))
		{
			return back() -> with(['info' => '验证码不正确']);
		}
		unset($data['authcode']);
		//dd($data);
		$data['update_at'] = time();
		$id = $data['id'];
		$result = DB::table('user')
				-> where('id',$id)
				-> first();
		//dd($result);
		if(Hash::check($data['password'],$result -> password))
		{
			$data['password'] = Hash::make($data['newPassword']);
			unset($data['newPassword']);
			//dd($data);
			$res = DB::table('user') 
				-> where('id',$id)
				-> update($data);
			if($res)
			{
				return redirect('user/login') -> with(['info' => '修改密码成功']);
			
			}
			else
			{
				return back() -> with(['info' => '更新失败']);
			}
		}
		else
		{
			return back() -> with(['info' => '当前密码不正确']);
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
