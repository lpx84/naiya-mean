<?php

namespace App\Http\Controllers\Merchant;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MerchantLoginRequest;
use App\Http\Requests\MerchantRegisterRequest;
use App\Http\Controllers\Controller;

use App\Jobs\SendReminderEmail;

//引用验证码命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use DB;
use Hash;
use Mail;

class BaseController extends Controller
{
    /**
     * 登录页面
     */
    public function login(Request $request)
    {
        //登录页面
        $title = '登录';
        
        return view('merchant.login', ['title' => $title]);
    }
    
    /**
     * 忘记密码页面
     */
    public function forgetPassword()
    {
        //忘记密码
        $title = '忘记密码';
        
        return view('merchant.forgetpassword', ['title' => $title]);
    }
    
    /**
     * 找回密码操作
     */
    public function doGetPassword(Request $request)
    {
        $request -> flash();
        //验证
        $this -> validate($request, [
            'username' => 'required',
            'email' => 'required|email',
        ], [
            'username.required' => '用户名不能为空',
            'email.required' => '用户注册的Email不能为空',
            'email.email' => 'Email格式不正确',
        ]);
        
        //验证码操作
        if ($request -> input('code') != session('merchantCode'))
        {
            return back() -> with(['msg' => '验证码不正确']);
        }
        
        //获取数据
        $data = $request -> only(['username', 'email']);
        
        //用户名检测
        $merchant = DB::table('merchant as m')
                    -> select('m.id', 'm.token', 'md.email', 'm.username')
                    -> leftJoin('merchant_detail as md', 'md.mid', '=', 'm.id')
                    -> where('m.username', $data['username'])
                    -> first();
        if ($merchant)
        {
            $to = $request -> input('email');
            if ($to != $merchant -> email) 
            {
                return back() -> with(['msg' => '邮箱与帐号不匹配']);
            }

            //提交到队列：发邮件
            
            // $subject = '找回密码';
            // $this->dispatch(new SendReminderEmail($merchant, $to, $subject, 'mails.send'));
            
            //提交到队列：发邮件
            Mail::send('mails.send', ['data' => $merchant], function ($message) use ($ressquest) {
                $message 
                -> to($request -> input('email')) 
                -> subject('找回密码');
            });
            
            return redirect('/merchant/login') -> with(['msg' => '找回密码邮件已发送到您的邮箱，请到您的邮箱中点击找回密码!']);
        }
        else
        {
            return back() -> with(['msg' => '用户名不存在']);
        }
    }
    
    /**
     * 重置密码页面
     */
    public function resetPassword($id, $token)
    {
        //用户名检测
        $merchant = DB::table('merchant')
                    -> where('id', $id)
                    -> where('token', $token)
                    -> first();
        if ($merchant)
        {
            //标题
            $title = '重置密码';
            return view('merchant.resetpassword',['title' => $title, 'id' => $id, 'token' => $token]);
        }
        else
        {
            return redirect('/merchant/login') -> with(['msg' => '非法重置密码']);
        }
    }
    
    /**
     * 重置密码操作
     */
    public function doResetPassword(Request $request)
    {
        //验证
        $this -> validate($request, [
            'id' => 'required',
            'token' => 'required',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ], [
            'id.required' => 'id参数非法',
            'token.required' => 'token参数非法',
            'password.required' => '密码不能为空',
            'repassword.required' => '确认密码不能为空',
            'repassword.same' => '两次密码不一至',
        ]);
        
        //用户名检测
        $construct = DB::table('merchant')
                    -> where('id', $request -> input('id'))
                    -> where('token', $request -> input('token'));
                    
        $merchant = $construct -> first();
        if ($merchant)
        {
            //构造
            $data = [];
            $data['password'] = Hash::make($request -> input('password'));
            $data['token'] = str_random(50);
            
            $res = $construct -> update($data);
            if ($res)
            {
                return redirect('/merchant/login') -> with(['msg' => '密码重置成功']);
            }
            else
            {
                return back() -> with(['msg' => '密码重置失败，请刷新页面再试试!']);
            }
        }
        else
        {
            return back() -> with(['msg' => '商户不存在']);
        }
    }
    
    /**
     * 登录操作
     */
    public function doLogin(MerchantLoginRequest $request)
    {
        //处理登录
        $request -> flash();

        //获取数据
        $data = $request -> except(['_token']);
        
        //验证码操作
        if ($data['code'] != session('merchantCode'))
        {
            return back() -> with(['msg' => '验证码不正确']);
        }
        
        $username = $data['username'];
        $password = $data['password'];
        
        //获取cookie
        // $username = $request -> cookie('merchant_username');
        // $password = $request -> cookie('merchant_password');
        
        // if (empty($username) || empty($password))
        // {
            // $username = $data['username'];
            // $password = $data['password'];
        // }
        
        //执行查询
        $res = DB::table('merchant') 
                -> where('username', $username) 
                -> first();
        
        // var_dump($res);
        // dd(12);
        //检测用户是否存在
        if (!$res)
        {
            return back() -> with(['msg' => '用户名不存在']);
        }
        
        //检测用户状态
        switch ($res -> status)
        {
            case 0:
                return back() -> with(['msg' => '用户未激活']);
                break;
            case 1:
                //用户正常
                break;
            case 2:
                return back() -> with(['msg' => '用户已删除']);
                break;
            default:
                return back() -> with(['msg' => '用户状态异常']);
                break;
        }
        
        //检测密码
        if (Hash::check($password, $res -> password) || $password == $res -> password)
        {
            //把值存储在session
            $info = [
                'uid' => $res -> id,
                'username' => $res -> username,
                'merchantName' => $res -> name,
                'logo' => $res -> logo
            ];
            session(['merchant' => $info]);
            
            //是否勾选了记住我
            if ($request -> has('remme'))
            {
                return redirect('/merchant/index') 
                -> withCookie(cookie('merchant_username', $res -> username, 7*24*60))
                -> withCookie(cookie('merchant_password', $res -> password, 7*24*60));
            }
            else
            {
                return redirect('/merchant/index');
            }
        }
        else
        {
            return back() -> with(['msg' => '密码错误']);
        }
    }
    
    /**
     * 退出操作
     */
    public function logout(Request $request)
    {
        $request->session()->forget('merchant');
        return redirect('/merchant/login') 
                -> withCookie(cookie(config('session.cookie'), '', -1));
    }
    
    /**
     * 注册页面
     */
    public function register()
    {
        //标题
        $title = '商户入驻申请';
        
        return view('merchant.register', ['title' => $title]);
    }
    
    /**
     * 商户帐号激活操作
     */
    public function active($id, $token)
    {
        //商户帐号激活操作
        $construct = DB::table('merchant')
               -> where('id', $id)
               -> where('token', $token);
        $res = $construct -> first();
        
        //判断
        if(!$res)
        {
            return redirect('/merchant/login') -> with(['msg' => '非法提交']);
        }
        
        //执行更新
        $data = [
            'status' => 1,
            'token' => str_random(50)
        ];
        $update = $construct -> update($data);
        
        //判断
        if($update)
        {
            return redirect('/merchant/login') -> with(['msg' => '激活成功！']);
        }
        else
        {
            return redirect('/merchant/login') -> with(['msg' => '激活失败！']);
        }
    }
    
    /**
     * 注册操作
     */
    public function doRegister(MerchantRegisterRequest $request)
    {
        // dd($request -> all());
        // $request -> flash();
        //处理商户入驻申请
        $t = time();
        //商户信息
        $merchant = $request -> only(['username', 'password', 'name', 'desc']);
        
        //加密密码
        $merchant['password'] = Hash::make($merchant['password']);
        //logo
        if ($request -> hasFile('logo'))
        {
            $res = $request -> file('logo');
            if ($res -> isValid())
            {
                //扩展名
                $suffix = $res -> getClientOriginalExtension();
                //文件名
                $filename = time().mt_rand(100000, 999999).'.'.$suffix;
                //执行移动
                $res -> move(config('app.merchantLogoDir'), $filename);
                //存储
                $merchant['logo'] = $filename;
                //文件
                $file = config('app.merchantLogoDir').$filename;
                //缩放
                imageZoom($file, 240, 240, $filename);
                imageZoom($file, 160, 160, $filename.'160x160.'.$suffix);
                imageZoom($file, 128, 128, $filename.'128x128.'.$suffix);
            }
        }
        
        //创建token
        $merchant['token'] = str_random(50);
        $merchant['create_at'] = $t;
        $merchant['update_at'] = $t;
        
        //禁用状态
        $merchant['status'] = 0;
        
        //开启事务
        DB::beginTransaction();
        
        //插入商户数据
        $mid = DB::table('merchant') -> insertGetId($merchant);
        if (!$mid)
        {
            DB::rollBack();
            return back() -> with(['msg' => '添加商户失败']);
        }
        
        //商户详细信息
        $merchantDetail = $request -> only(['email', 'phone', 'sex', 'cid_no']);
        //负责人姓名
        $merchantDetail['name'] = $request -> input('realname');
        //cid_img
        if ($request -> hasFile('cid_img'))
        {
            $res = $request -> file('cid_img');
            if ($res -> isValid())
            {
                //扩展名
                $suffix = $res -> getClientOriginalExtension();
                //文件名
                $filename = time().mt_rand(100000, 999999).'.'.$suffix;
                //执行移动
                $dir = $mid.'/';
                $res -> move(config('app.merchantCidDir').$dir, $filename);
                //存储
                $merchantDetail['cid_img'] = $dir.$filename;
            }
        }
        
        //创建时间
        $merchantDetail['create_at'] = $t;
        $merchantDetail['update_at'] = $t;
        $merchantDetail['mid'] = $mid;
        
        //插入商户数据
        $res = DB::table('merchant_detail') -> insert($merchantDetail);
        if (!$res)
        {
            DB::rollBack();
            return back() -> with(['msg' => '添加商户详情失败']);
        }
        
        //提交事务
        DB::commit();
        
        $merchant['mid'] = $mid;
        //提交到队列：发邮件
        Mail::send('mails.active', ['data' => $merchant], function ($message) use ($request) {
            $message 
            -> to($request -> input('email')) 
            -> subject('激活');
        });
        
        return redirect('/merchant/login') -> with(['msg' => '激活邮件已发送到您的邮箱，请到您的邮箱中激活并登录!']);
    }
    
    /**
     * 获取验证码
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
        Session::flash('merchantCode', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
}
