<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdminHelpRequest;
use App\Http\Controllers\Controller;
use DB;

class HelpController extends Controller
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
        //文章列表页面
        $title = '帮助中心列表';
        
        $data = DB::table('help as h')
				-> leftJoin('help_cate as c','h.hcid','=','c.id')
				-> select('h.*','c.name')
                -> where('title', 'like', '%'.$request->input('keyWord').'%')
                -> orderBy('id', 'DESC')
                -> paginate($request -> input('pageSize', 10));
        return view('admin.help.index', [
                        'title' => $title, 
                        'data' => $data, 
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
        //帮助内容添加页面
        $title = '帮助内容添加';
        
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
		//dd($data);
        return view('admin.help.create', ['title' => $title,'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminHelpRequest $request)
    {
        //执行添加操作
        //dd($request -> all());
        $data = $request -> except(['_token']);	
		$data['content'] = htmlspecialchars($data['content']);
        //设置添加时间
        $data['ctime'] = time(); 
        $data['utime'] = time(); 
        
        //执行添加
        $res = DB::table('help') -> insert($data);
        if($res)
		{
            return redirect('/admin/help') -> with(['msg' => '添加成功']);
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
        //详细内容
		$title = '详细帮助内容';
		$data = DB::table('help')
				-> where('id',$id)
				-> first();
		$data -> content = htmlspecialchars_decode($data -> content);
		return view('admin.help.show',['title' => $title,'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //帮助内容编辑页面
        $title = '帮助内容编辑';
        $data = DB::table('help') 
				-> where('id', $id)
				-> first();
        $data -> content = htmlspecialchars_decode($data -> content);
		
		$cate = DB::table('help_cate') 
                -> select('*',DB::raw("concat(path, ',', id) as newPath"))
                -> orderBy('newPath', 'ASC')
                -> get();
        //格式化
        foreach( $cate as &$v )
		{
            $count = substr_count($v -> path, ',') + 1;
            $str = str_repeat('|----', $count);
            $v -> name = $str.'&nbsp;'.$v -> name;
        }
		
		// dd($cate);
        return view('admin.help.edit', [
				'title' => $title, 'data' => $data,
				'cate' => $cate,
			]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminHelpRequest $request, $id)
    {
        //帮助编辑操作
        //dd($request -> all());
        $data = $request -> except(['_token', '_method']);
        
        $data['content'] = htmlspecialchars($data['content']);
        
        //执行
        $res = DB::table('help') -> where('id', $id) -> update($data);
        if($res)
		{
            return redirect('/admin/help') -> with(['msg' => '修改成功']);
        }
		else
		{
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
        $res = DB::table('help')
				-> where('id', $id)
				->delete();
        if($res)
		{
            return response() -> json(['code' => 0]);
        }
		else
		{
            return response() -> json(['code' => 1]);
        }
    }
}
