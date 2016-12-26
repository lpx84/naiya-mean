<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class UserController extends Controller
{
    //登录状态验证
    public function __construct()
    {
        $this -> middleware('merchant.login');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //用户列表 页面
        $data = DB::table('user') 
        -> where('username','like','%'.$request -> input('keyWord').'%') 
        -> paginate($request -> input('pageSize', 10));
        $title = '后台首页';
        return view('merchant.user.index', ['title' => $title, 'data' => $data,'request' => $request-> only(['keyWord','pageSize']) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加用户页面
        $title = '添加用户';
        return view('merchant.user.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //用户添加操作
        $data = $request -> except(['_token']);

        //添加验证 针对request
        $this -> validate($request, [
                'username' => 'unique:user,username|required|min:6',
                'password' => 'required|min:6',
                'repassword' => 'required|same:password',
                'phone' => 'required|size:11',
                'email' => 'required|email',
                'header' => 'image',
            ], [
                'username.unique' => '用户名已存在',
                'username.required' => '用户名不能为空',
                'username.min' => '用户名最少为6位',
                'password.required' => '密码不能为空',
                'password.min' => '密码最少为6位',
                'repassword.required' => '确认密码不能为空',
                'repassword.same' => '两次密码不一至',
                'phone.required' => '手机号码不能为空',
                'phone.size' => '手机号码长度为11位',
                //'phone.numeric' => '手机号码必须为数字',
                'email.required' => '邮箱不能为空',
                'email.email' => '请输入正确的邮箱格式',
                'header.image' => '只能上传图片(图片格式jpeg、png、bmp、gif、 或 svg )',
            ]);
        //排除无用字段
        unset($data['repassword']);

        $data['password'] = encrypt($data['password']);
        
        //添加其它字段
        if($request -> hasFile('header')){
            if($request -> file('header') -> isValid()){
                $suffix = $request -> file('header') -> getClientOriginalExtension();
                $fileName = time().rand(100000,999999).'.'.$suffix;

                $request -> file('header') -> move('./uploads', $fileName);

                //添加header 字段
                $data['header'] = $fileName;

                //图片缩放
                $newFile = './uploads/'.$fileName;
                imageZoom($newFile,100,100);
            }
        }

        //ctime
        $data['ctime'] = time();

        //token
        $data['token'] = str_random(50);

        $res = DB::table('user') -> insert($data);
        if($res){
            return redirect('/merchant/user') -> with(['msg' => '添加成功']);
        }else{
            return back() -> width(['msg' => '添加失败']);
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
        //用户编辑页面
        $title = '编辑用户';
        $data = DB::table('user') -> where('id',$id) -> first();

        return view('merchant.user.edit', ['title' => $title, 'data' => $data]);
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
        //用户编辑操作
        $data = $request -> except(['_token','_method', 'oldHeader']);
        
        //添加验证 针对request
        $this -> validate($request, [
                'phone' => 'required|size:11',
                'email' => 'required|email',
                'header' => 'image',
            ], [
                'phone.required' => '手机号码不能为空',
                'phone.size' => '手机号码长度为11位',
                //'phone.numeric' => '手机号码必须为数字',
                'email.required' => '邮箱不能为空',
                'email.email' => '请输入正确的邮箱格式',
                'header.image' => '只能上传图片(图片格式jpeg、png、bmp、gif、 或 svg )',
            ]);
        //添加其它字段
        if($request -> hasFile('header')){
            if($request -> file('header') -> isValid()){
                $suffix = $request -> file('header') -> getClientOriginalExtension();
                $fileName = time().rand(100000,999999).'.'.$suffix;

                $request -> file('header') -> move('./uploads', $fileName);

                //图片缩放
                $newFile = './uploads/'.$fileName;
                imageZoom($newFile,100,100);

                //添加header 字段
                $data['header'] = $fileName;

                $file = './uploads/'.$request -> input('oldHeader');
                
                //删除旧图片
                if(file_exists($file)){
                    unlink($file);
                }
            }
        }

        $res = DB::table('user') -> where('id', $id) -> update($data);
        if($res){
            return redirect('/merchant/user') -> with(['msg' => '更新成功']);
        }else{
            return back() -> with(['msg' => '更新失败']);
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
        //删除用户
        // return json_encode(['id'=>$id]);
        $res = DB::table('user') -> where('id','=',$id) -> delete();
        if($res){
            return response() -> json(['code' => 0]);
        }else{
            return response() -> json(['code' => 1]);
        }
    }
}
