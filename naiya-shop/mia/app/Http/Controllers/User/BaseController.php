<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

//引用验证码命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use DB;
use Hash;
use Mail;

class BaseController extends Controller
{
	//注册页面
	public function register()
	{
		$title = '注册页面';
		return view('user.register',['title' => $title]);
	}
	
	//发邮箱验证码
	public function sendEmail(Request $request)
	{
		//验证邮箱
		if (!filter_var($request -> input('email'), FILTER_VALIDATE_EMAIL))
		{
			return response() -> json(['code' => 1]);
		}
		
		//验证码
		$code = str_random(6);
		Session(['userEmailCode' => $code]);
		//提交到队列：发邮件
		Mail::raw("奶牙註冊驗證碼 : ".$code." from Bjtu Front-End Group！", function ($message) use($request) {
			$message 
            -> to($request -> input('email')) 
            -> subject('邮箱验证码');
		});
		
		return response() -> json(['code' => 0]);
	}
	
	//注册操作
	public function doRegister(RegisterRequest $request)
	{
		$request -> flash();
		// dd($request -> all());
		$data = $request -> except(['_token','url','isagree','confirm_password']);
		//dd($data);
		//检测是否存在邮箱
		$isemail = DB::table('user')
				-> where('email',$data['email'])
				-> count();
		if($isemail)
		{
			return back() -> with(['info' => '邮箱已存在']);
		}
		//检测验证码
		if($data['authcode'] != session('code'))
		{
			return back() -> with(['info' => '验证码不正确']);
		}
		
		unset($data['authcode']);
		
		//检测邮箱验证
		if($data['emailcode'] != session('userEmailCode'))
		{
			return back() -> with(['info' => '邮箱验证码不正确']);
		}
		unset($data['emailcode']);
		$data['token'] = str_random(50);
		$data['username'] = 'naiya-'.$data['email'];
		$data['phone'] = 0;
		$data['password'] = Hash::make($data['password']);
		//$data['email'] = $data['emailcode'];
		//处理时间
        $tt = time();
        $data['create_at'] = $tt;
        $data['update_at'] = $tt;
		//dd($data);
		$res = DB::table('user') -> insert($data);
		if($res)
		{
			return redirect('user/login') -> with(['info' => '注册成功，请登录']);
		}
		else
		{
			return back() -> with(['info' => '注册失败']);
		}
	}
	
    //login
    public function login(Request $request)
    {
        // if($request -> cookie('email'))
        // {
            // return redirect('/user/index');
        // }
        //登录页面
        $title = '登录';
        return view('user.login', ['title' => $title]);
    }
    
    //doLogin
    public function doLogin(LoginRequest $request)
    {
        //处理登录
        $request -> flash();
        // dd($request -> all());
        
        $data = $request -> except(['_token']);
        //检测验证码
		if($data['authcode'] != session('code'))
		{
			return back() -> with(['info' => '验证码不正确']);
		}
        
        $res = DB::table('user') 
                -> where('email', $data['email'])
                -> first();
        if($res){
			//判断状态
			$status = $res -> status;
			if($status == 1)
			{
				 $password = $res -> password;
				if(Hash::check($data['password'], $password)){
					session(['user' => ['uid' => $res -> id, 'username' => $res -> username]]);
					if($request -> has('remme')){
						return redirect('user/index') -> withCookie('email', $data['email'], 24*60);
					}
					else
					{
						return redirect('/user/index');
					}
				}else{
					return back() -> with(['info' => '密码错误']);
				}
			}else
			{
				return back() -> with(['info' => '该用户已被禁用，请联系管理员']);
			}
           
        }else{
            return back() -> with(['info' => '用户名不存在']);
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
        $builder->build($width = 130, $height = 50, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        // Session::flash('code', $phrase);
        session(['code'=> $phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
}
