<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Controllers\Controller;

//引用验证码命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use DB;
use Hash;

class BaseController extends Controller
{
    //login
    public function login(Request $request)
    {
		
		//验证Cookie
        if($request -> cookie('username'))
        {
            return redirect('/admin/index');
        }
        //登录页面
        $title = '登录';
        
        return view('admin.login', ['title' => $title]);
    }
    
    //doLogin
    public function doLogin(AdminLoginRequest $request)
    {
        //处理登录
        $request -> flash();
        // dd($request -> all());
        
        $data = $request -> except(['_token']);
        if($data['code'] != session('code'))
        {
            return back() -> with(['msg' => '验证码不正确']);
        }
        
        $res = DB::table('admin') 
                -> where('username', $data['username']) 
                -> first();
		if($res -> status == 0)
		{
			return back() -> with(['msg' => '账号已被禁用']);
		}
        if($res)
		{
            $password = $res -> password;
            if(Hash::check($data['password'], $password))
			{
				$array = [
					'id' => $res -> id,
					'username' => $res -> username,
					'header' => $res -> header,
				];
				session(['admin' => $array]);
				
                if($request -> has('remme'))
				{
                    return redirect('/admin/index') -> withCookie('username', $data['username'], 10);
                }
                else
                {
                    return redirect('/admin/index');
                }
            }
			else
			{
                return back() -> with(['msg' => '密码错误']);
            }
        }
		else
		{
            return back() -> with(['msg' => '用户名不存在']);
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function captcha($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 115, $height = 35, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash('code', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

	public function loginout(Request $request)
	{
		$request -> session()-> forget('admin.id');
		return redirect('admin/login');
	}

}
