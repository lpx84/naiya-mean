<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class HelpCateController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin.login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //分类列表页面
        $title = '帮助分类列表';
        // select *,CONCAT(path,',',id) as newPath from m_cate ORDER BY newPath ASC;

        //使用 as 别名 时，在DB::raw(中使用，必须加表前缀)
        $data = DB::table('help_cate as c1') 
                -> select('c1.*',DB::raw("concat(m_c1.path, ',', m_c1.id) as newPath"), 'c2.name as pname')
                -> leftJoin('help_cate as c2', 'c1.pid', '=', 'c2.id')
                -> orderBy('newPath', 'ASC')
				-> paginate($request -> input('pageSize', 10));
                // -> get();
		
        //格式化
        foreach($data as &$v){
            $count = substr_count($v -> path, ',') + 1;
            $str = str_repeat('|----', $count);
            $v -> name = $str.'&nbsp;'.$v -> name;
        }
        return view('admin.helpcate.index',[
				'title' => $title, 'data' => $data,
				'request' => $request -> only(['keyWord','pageSize']),
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //分类列表页面
        $title = '帮助分类添加页';
        // select *,CONCAT(path,',',id) as newPath from m_cate ORDER BY newPath ASC;

        $data = DB::table('help_cate') 
                -> select('*',DB::raw("concat(path, ',', id) as newPath"))
                -> orderBy('newPath', 'ASC')
                -> get();
        //格式化
        foreach( $data as &$v )
		{
            $count = substr_count($v -> path, ',') + 1;
            $str = str_repeat('|----', $count);
            $v -> name = $str.'&nbsp;'.$v -> name;
        }
		
        return view('admin.helpcate.create',[
				'title' => $title, 'data' => $data,
			]);
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
        $data = $request -> except(['_token']);
        
        //加入验证
        $this -> validate($request, [
				'name' => 'required',
			], [
				'name.required' => '分类名不能为空',
			]);
        $p_path = '0';
        if($data['pid'])
		{
            $p_path = DB::table('help_cate')
					-> select('path')
					-> where('id', $data['pid'])
					-> first() -> path;
            $p_path .= ','.$data['pid'];
        }
        //设置其它字段
        $data['path'] = $p_path;
        $data['status'] = 1;
        
        //执行添加
        $res = DB::table('help_cate') -> insert($data);
		
		
	
        if($res)
		{
            return redirect('/admin/helpcate') -> with(['msg' => '添加成功']);
        }
		else
		{
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
        //分类编辑页面
        $title = '帮助分类编辑';
        $data = DB::table('help_cate') -> where('id', $id) -> first();
        $allData = DB::table('help_cate') 
                    -> select('*', DB::raw("concat(path, ',', id) as newPath")) 
                    -> orderBy('newPath', 'ASC') 
                    -> get();
        
        //格式化
        foreach( $allData as &$v )
		{
            $count = substr_count($v -> path, ',') + 1;
            $str = str_repeat('|----', $count);
            $v -> name = $str.'&nbsp;'.$v -> name;
        }
        
		
        return view('admin.helpcate.edit',[
				'title' => $title, 'data' => $data,
				'allData' => $allData,
			]);
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
        $data = $request -> except(['_token', '_method']);
        
        //验证
        $this -> validate($request, [
            'name' => 'required',
        ], [
            'name.required' => '分类名不能为空'
        ]);
        
        //设置 path
        $p_path = '0';
        if($data['pid'])
		{
            $p_path = DB::table('help_cate')
					-> select('path')
					-> where('id',$data['pid'])
					-> first() -> path;
            $p_path .= ','.$data['pid'];
        }
        $data['path'] = $p_path;
        
        $res = DB::table('help_cate') -> where('id', $id) -> update($data);
        if($res)
		{
            return redirect('/admin/helpcate') -> with(['msg' => '更新成功']);
        }
		else
		{
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
        $data = DB::table('help_cate') -> where('pid', $id) -> get();
        if(!$data)
		{
            $res = DB::table('help_cate') -> where('id', $id) -> delete();
            if($res)
			{
                return response() -> json(['code' => 0]);
            }
			else
			{
                return response() -> json(['code' => 1]);
            }
        }
		else
		{
            return response() -> json(['code' => 2]);
        }
    }
}
