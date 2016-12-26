<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdminMerchantStoreRequest;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class MerchantController extends Controller
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
		//商户管理首页
		$title = '商户管理';
		$data = DB::table('merchant')
				-> where('status','!=','2')
				-> where('name','like','%'.$request -> input('keyWord').'%')
				-> paginate($request -> input('pageSize',10));
		return view('admin.merchant.index',['title' => $title,'data' => $data,'request' => $request -> only(['keyWord','pageSize'])]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加商户页
		$title = '添加商户';
		return view('admin.merchant.create',['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminMerchantStoreRequest $request)
    {
		//执行商户添加
		$data = $request -> except(['_token','_method']);
		unset($data['repassword']);
		$data['password'] = Hash::make($data['password']);
		
		//添加其它字段
        if($request -> hasFile('logo'))
		{
            if($request -> file('logo') -> isValid())
			{
                $suffix = $request -> file('logo') -> getClientOriginalExtension();
                $fileName = time().mt_rand(100000,999999).'.'.$suffix;
                $request -> move(config('app.merchantLogoDir'), $filename);
				
                //添加header 字段
                $data['logo'] = $t.$fileName;

            }
        }
		
		//添加创建时间
		$data['desc'] = htmlspecialchars($data['desc']);
		$data['create_at'] = time();
		$data['update_at'] = time();
		$data['token'] = str_random(50);
		$res = DB::table('merchant') -> insert($data);
		if($res)
		{
			return redirect('admin/merchant') -> with(['msg' => '添加成功']);
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
        //查看商户详情
		$title = '商户详情';
		$data = DB::table('merchant')
				-> where('id',$id)
				-> first();
		$data -> desc = htmlspecialchars_decode($data -> desc);
		
		$detail = DB::table('merchant_detail')
				-> where('mid',$id)
				-> first();
				
		return view('admin.merchant.show',[
				'title' => $title,'data' => $data,
				'detail' => $detail,
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
        //商户编辑页
		$title = '商户编辑';
		$data = DB::table('merchant')
				-> where('id',$id)
				-> first();
		return view('admin.merchant.edit',['title' => $title,'data' => $data]);
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
		
       //修改商户信息
		$data = $request -> except([
				'_token','_method','oldLogo',
				'username','name','logo'
			]);
		
		//添加其它字段
        // if($request -> hasFile('logo'))
		// {
            // if($request -> file('logo') -> isValid())
			// {
                // $suffix = $request -> file('logo') -> getClientOriginalExtension();
                // $fileName = time().mt_rand(100000,999999).'.'.$suffix;
				
                // $request -> move(config('app.merchantLogoDir'), $filename);
				
                // //添加header 字段
                // $data['logo'] = $t.$fileName;

            // }
        // }
		
		//添加创建时间

		$data['update_at'] = time();
		$data['token'] = str_random(50);
		$res = DB::table('merchant')
				-> where('id',$id)
				-> update($data);
		if($res)
		{
			return redirect('admin/merchant') -> with(['msg' => '更新成功']);
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
        //软删除，隐藏删除的商户
		$data['status'] = 2;
		$res = DB::table('merchant')
				-> where('id',$id)
				-> update($data);
		if($res)
		{
			return redirect('admin/merchant') -> with(['msg' => '删除属危险操作，已放入回收站，待确认！！！']);
			
		}
		else
		{
			return back() -> with(['msg' => '删除操作失败']);
		}
    }
}
