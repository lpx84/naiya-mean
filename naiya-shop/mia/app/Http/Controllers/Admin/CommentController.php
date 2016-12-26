<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class CommentController extends Controller
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
        //评论表首页
		$title = '评论管理';
		$data = DB::table('comment as c')
				-> leftJoin('goods as g','c.gid','=','g.id')
				-> leftJoin('merchant as m','m.id','=','g.mid')
				-> select('c.*','g.code','g.name','g.img','m.name as mname')
				-> where('g.name','like','%'.$request -> input('keyWord').'%')
				-> paginate($request -> input('pageSize',10));
		
		
		
		return view('admin.comment.index',[
				'title' => $title,'data' => $data,
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
        //评论详情
		$title = '评论详情';
		$data = DB::table('comment as c')
				-> leftJoin('goods as g','c.gid','=','g.id')
				-> select('c.*','g.name')
				-> where('c.id',$id)
				-> first();
				
		$img = DB::table('comment_img')
				-> where('cmid',$id)
				-> first();
				
		$user = DB::table('user')
				-> where('id',$data -> uid)
				->first();
		
		$data -> content = htmlspecialchars_decode($data -> content);
		
		return view('admin.comment.show',[
				'title' => $title,'data' => $data,
				'user' => $user,'img' => $img,
			]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //评论状态管理
		$title = '评论审核';
		$data = DB::table('comment as c')
				-> leftJoin('goods as g','c.gid','=','g.id')
				-> select('c.*','g.name')
				-> where('c.id',$id)
				-> first();

		
		//dd($data);
		return view('admin.comment.edit',[
				'title' => $title,'data' => $data,
				
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
        //更新
		// dd($request -> all());
		$data = $request -> except(['_token','_method']);
		$res = DB::table('comment')
				-> where('id',$id)
				-> update($data);
		
		if($res)
		{
			return redirect('admin/comment') -> with(['msg' => '更新成功']);
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
        //删除评论
		$img = DB::table('comment_img')
				-> where('cmid',$id)
				-> first();
		$file = '/uploads/'.$img -> img;
		
		//dd($file);
		$res = DB::table('comment')
				-> where('id',$id)
				-> delete();
		
		if($res)
		{
			$res_img = DB::table('comment_img')
					-> where('cmid',$img -> cmid)
					-> delete();
			if($res_img)
			{
				unlink($file);
			}
			
			return redirect('admin/comment') -> with(['msg' => '删除成功']);
		}
		else
		{
			return back() -> with(['msg' => '删除失败']);
		}
		
    }
}
