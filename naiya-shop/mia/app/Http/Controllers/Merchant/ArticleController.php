<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Controllers\Controller;
use DB;

class ArticleController extends Controller
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
        //文章列表页面
        $title = '文章列表';
        
        $data = DB::table('article')
                -> where('title', 'like', '%'.$request->input('keyWord').'%')
                -> orderBy('id', 'DESC')
                -> paginate($request -> input('pageSize', 10));
        return view('merchant.article.index', 
                    [
                        'title' => $title, 
                        'data' => $data, 
                        'request' => $request -> all()
                    ]
                );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //文章添加页面
        $title = '文章添加';
        
        return view('merchant.article.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        //文章添加操作
        // dd($request -> all());
        $data = $request -> except(['_token']);
        
        //处理图片
        if($request -> hasFile('img')){
            if($request -> file('img') -> isValid()){
                $suffix = $request -> file('img') -> getClientOriginalExtension();
                $t = time();
                
                $fileName = $t.'_'.mt_rand(100000,999999).'.'.$suffix;
                
                $dir = date('Ymd',$t).'/';
                $request -> file('img') -> move('./uploads/'.$dir, $fileName);
                
                //存储img
                $data['img'] = $dir.$fileName;
                
                //图片缩放
                $newFile = './uploads/'.$dir.$fileName;
                imageZoom($newFile,200,200);
            }
        }
        
        $data['content'] = htmlspecialchars($data['content']);
        //设置添加时间
        $data['ctime'] = time(); 
        $data['utime'] = time(); 
        
        //执行添加
        $res = DB::table('article') -> insert($data);
        if($res){
            return redirect('/merchant/article') -> with(['msg' => '添加成功']);
        }else{
            return back() -> with(['msg' => '添加失败']);
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
        //文章编辑页面
        $title = '文章编辑';
        $data = DB::table('article') -> where('id', $id) -> first();
        
        return view('merchant.article.edit', ['title' => $title, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticleRequest $request, $id)
    {
        //文章编辑操作
        // dd($request -> all());
        $data = $request -> except(['_token', '_method', 'oldImg']);
        
        //处理图片
        if($request -> hasFile('img')){
            if($request -> file('img') -> isValid()){
                $suffix = $request -> file('img') -> getClientOriginalExtension();
                $t = time();
                $fileName = $t.mt_rand(100000, 999999).'.'.$suffix;
                
                $dir = date('Ymd', $t).'/';
                
                //移动图片
                $request -> file('img') -> move('./uploads/'.$dir, $fileName);
                
                //存储
                $data['img'] = $dir.$fileName;
                
                //图片缩放
                $newFile = './uploads/'.$dir.$fileName;
                imageZoom($newFile,200,200);
                
                //删除旧图
                $oldImg = $request -> input('oldImg');
                $oldFile = './uploads/'.$oldImg;
                if(file_exists($oldFile)){
                    unlink($oldFile);
                }
            }
        }
        
        $data['content'] = htmlspecialchars($data['content']);
        
        //执行
        $res = DB::table('article') -> where('id', $id) -> update($data);
        if($res){
            return redirect('/merchant/article') -> with(['msg' => '修改成功']);
        }else{
            return back() -> with(['msg' => '修改失败']);
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
        //删除文章
        $construct = DB::table('article') -> where('id', $id);
        $img = $construct -> first() -> img;
        $res = $construct -> delete();
        if($res){
            $file = './uploads/'.$img;
            if(file_exists($file)){
                unlink($file);
            }
            return response() -> json(['code' => 0]);
        }else{
            return response() -> json(['code' => 1]);
        }
    }
}
