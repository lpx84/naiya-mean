<?php

namespace App\Http\Controllers\Merchant;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CateController extends Controller
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
    public function index()
    {
        //分类列表页面
        $title = '分类列表';
        // select *,CONCAT(path,',',id) as newPath from m_cate ORDER BY newPath ASC;

        //使用 as 别名 时，在DB::raw(中使用，必须加表前缀)
        $data = DB::table('cate as c1') 
                -> select('c1.*',DB::raw("concat(m_c1.path, ',', m_c1.id) as newPath"), 'c2.name as pname')
                -> leftJoin('cate as c2', 'c1.pid', '=', 'c2.id')
                -> orderBy('newPath', 'ASC')
                -> get();
        //格式化
        foreach($data as &$v){
            $count = substr_count($v -> path, ',') + 1;
            $str = str_repeat('|----', $count);
            $v -> name = $str.'&nbsp;'.$v -> name;
        }
        return view('merchant.cate.index',['title' => $title, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //分类列表页面
        $title = '分类列表';
        // select *,CONCAT(path,',',id) as newPath from m_cate ORDER BY newPath ASC;

        $data = DB::table('cate') 
                -> select('*',DB::raw("concat(path, ',', id) as newPath"))
                -> orderBy('newPath', 'ASC')
                -> get();
        //格式化
        foreach($data as &$v){
            $count = substr_count($v -> path, ',') + 1;
            $str = str_repeat('|----', $count);
            $v -> name = $str.'&nbsp;'.$v -> name;
        }
        return view('merchant.cate.create',['title' => $title, 'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //分类添加操作
        // dd($request -> all());
        $data = $request -> except(['_token']);
        
        //加入验证
        $this -> validate($request, [
            'name' => 'required',
        ], [
            'name.required' => '分类名不能为空',
        ]);
        $p_path = '0';
        if($data['pid']){
            $p_path = DB::table('cate') -> select('path') -> where('id', $data['pid']) -> first() -> path;
            $p_path .= ','.$data['pid'];
        }
        //设置其它字段
        $data['path'] = $p_path;
        $data['status'] = 1;
        
        //执行添加
        $res = DB::table('cate') -> insert($data);
        if($res){
            return redirect('/merchant/cate') -> with(['msg' => '添加成功']);
        }else{
            return back() -> with();
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
        //分类编辑页面
        $title = '分类编辑';
        $data = DB::table('cate') -> where('id', $id) -> first();
        $allData = DB::table('cate') 
                    -> select('*', DB::raw("concat(path, ',', id) as newPath")) 
                    -> orderBy('newPath', 'ASC') 
                    -> get();
        
        //格式化
        foreach($allData as &$v){
            $count = substr_count($v -> path, ',') + 1;
            $str = str_repeat('|----', $count);
            $v -> name = $str.'&nbsp;'.$v -> name;
        }
        
        return view('merchant.cate.edit',['title' => $title, 'data' => $data, 'allData' => $allData]);
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
        //分类编辑操作
        // dd($request -> all());
        
        //排除无用数据
        $data = $request -> except(['_token', '_method']);
        
        //验证
        $this -> validate($request, [
            'name' => 'required',
        ], [
            'name.required' => '分类名不能为空'
        ]);
        
        //设置 path
        $p_path = '0';
        if($data['pid']){
            $p_path = DB::table('cate') -> select('path') -> where('id',$data['pid']) -> first() -> path;
            $p_path .= ','.$data['pid'];
        }
        $data['path'] = $p_path;
        
        //执行
        $res = DB::table('cate') -> where('id', $id) -> update($data);
        if($res){
            return redirect('/merchant/cate') -> with(['msg' => '更新成功']);
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
        //删除分类
        $title = '删除分类';
        $data = DB::table('cate') -> where('pid', $id) -> get();
        if(!$data){
            $res = DB::table('cate') -> where('id', $id) -> delete();
            if($res){
                return response() -> json(['code' => 0]);
            }else{
                return response() -> json(['code' => 1]);
            }
        }else{
            return response() -> json(['code' => 2]);
        }
    }
    
    public function getAllData()
    {
        return DB::table('cate') -> get();
    }
    
    public function getSubCate($arr, $pid)
    {
        $data = [];
        foreach($arr as $v){
            // var_dump($v -> pid == $pid);
            if($v -> pid == $pid){
                $v -> sub = $this -> getSubCate($arr, $v -> id);
                $data[] = $v;
            }
        }
        return $data;
    }
    
    public function getOne($arr)
    {
        $data = [];
        foreach($arr as $v){
            // var_dump($v -> pid == $pid);
            $str = $this -> getOne($v -> sub);
            $data[] = $str->name;
            
        }
        return $data;
    }
    
    public function test()
    {
        $data = $this -> getAllData();
        // print_r($data);
        $res = $this -> getSubCate($data, 0);
        
        print_r($res);
        $res = $this -> getOne($res);
        
        print_r($res);
    }
}
