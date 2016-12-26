<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class MessagesController extends Controller
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
        //站内信列表页面
        $title = '站内信列表';
        
        $data = DB::table('messages')
                -> where('title', 'like', '%'.$request->input('keyWord').'%')
                -> orderBy('id', 'DESC')
                -> paginate($request -> input('pageSize', 10));
		
        return view('admin.messages.index', [
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
        //添加站内信页
		$title = "站内信添加";
		return view('admin.messages.create',['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加
		$data = $request -> except(['_token']);
		$this -> validate($request,[
					'title' => 'required',
					'content' => 'required'
				],[
					'title.required' => '标题不能为空！',
					'content.required' => '内容不能为空'
		
				]);
		
		$data['create_at'] = time();
		$data['content'] = htmlspecialchars($request -> input('content'));
		$res = DB::table('messages') -> insert($data);
		if($res)
		{
			return redirect('admin/messages') -> with(['msg' => '添加成功']);
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
        //站内信详情
		$title = 'title';
		$data = DB::table('messages')
				-> where('id',$id)
				-> first();
		$data -> content = htmlspecialchars_decode($data -> content);
		return view('admin.messages.show',['title' => $title, 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //编辑站内信
		$title = '编辑站内信';
		$data = DB::table('messages')
				-> where('id',$id)
				-> first();
		return view('admin.messages.edit',['title' => $title,'data' => $data]);
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
        //更新站内信
		$data = $request -> except(['_token','_method']);
		$this -> validate($request,[
				'title' => 'required',
				'content' => 'required'
			],[
				'title.required' => '标题不能为空',
				'content.required' => '内容不能为空' 
		]);
		
		$data['content'] = htmlspecialchars($request -> input('content'));
		$data['create_at'] = time();
		$res = DB::table('messages') 
				-> where('id',$id)
				->update($data);
		
		
		if($res)
		{
			return redirect('admin/messages') -> with(['msg' => '更新成功']);
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
        //删除站内信
		$res = DB::table('messages') -> where('id','=',$id) -> delete();
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
