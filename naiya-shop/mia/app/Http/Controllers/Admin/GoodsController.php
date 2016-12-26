<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class GoodsController extends Controller
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
        //商品列表
		$title = '商品审核';
		$data = DB::table('goods as g')
				-> leftJoin('merchant as m','g.mid','=','m.id' )
				-> select('g.*','m.name as mm')
				-> where('g.status','!=','3')
				-> where('g.name','like','%'.$request -> input('keyWord').'%')
				-> paginate($request -> input('pageSize',10));
		
		//dd($data);
		return view('admin.goods.index',[
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
        //商品详情
		$title = '详情页';
		$data = DB::table('goods as g')
				-> leftJoin('merchant as m','g.mid','=','m.id' )
				-> leftJoin('merchant_detail as d','d.mid','=','m.id')
				-> select('g.*','m.name as mm','m.is_real_check','d.name as dm','d.phone','d.sex')
				-> where('g.id',$id)
				-> first();
		$data -> desc = htmlspecialchars_decode($data -> desc);
		
		// dd($data);
		return view('admin.goods.show',['title' => $title,'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //商品审核编辑
		$title = '商品审核';
		$data = DB::table('goods')
				-> where('id',$id)
				-> first();
		return view('admin.goods.edit',['title' => $title,'data' => $data]);
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
        //改变状态 status 1：下架 2：上架
		$data = $request -> except(['_token','_method']);
		$res = DB::table('goods')
				-> where('id',$id)
				-> update($data);
		if($res)
		{
			return redirect('admin/goods') -> with(['msg' => '更新成功']);
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
        //软删除，隐藏  条件status = 3
		$res = DB::table('goods')
				-> where('id',$id)
				-> update(['status' => '3']);
				
		if($res)
		{
			return redirect('admin/goods') -> with(['msg' => '删除成功']);
		}
		else
		{
			return back() -> with(['msg' => '删除失败']);
		}
    }
}
