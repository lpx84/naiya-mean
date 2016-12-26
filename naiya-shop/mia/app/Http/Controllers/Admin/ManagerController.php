<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdminManagerStoreRequest;
use App\Http\Requests\AdminManagerUpdateRequest;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class ManagerController extends Controller
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
        //管理员管理首页
		$title = '管理员管理页';
		$data = DB::table('admin')
				-> where('username','like','%'.$request -> input('keyWord').'%')
				-> paginate($request -> input('pageSize',10));
		return view('admin.manager.index',['title' => $title,'data' => $data,'request' => $request -> only(['keyWord','pageSize'])]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加管理员
		$title = '添加管理员';
		return view('admin.manager.create',['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminManagerStoreRequest $request)
    {
        //执行管理员添加
		$data = $request -> except(['_token']);
		unset($data['repassword']);
		$data['password'] = Hash::make($data['password']);
		
		//添加其它字段
        if($request -> hasFile('header'))
		{
            if($request -> file('header') -> isValid())
			{
                $suffix = $request -> file('header') -> getClientOriginalExtension();
                $fileName = time().mt_rand(100000,999999).'.'.$suffix;
				$t = date('Ymd').'/';
                $request -> file('header') -> move(config('app.managerDir').$t,$fileName);
				
                //添加header 字段
                $data['header'] = $t.$fileName;

            }
        }

		//添加创建时间
		$data['create_at'] = time();
		$data['token'] = str_random(50);
		$res = DB::table('admin') -> insert($data);
		if($res)
		{
			return redirect('admin/manager') -> with(['msg' => '添加成功']);
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
        //管理员编辑页
		$title = '管理员编辑';
		$data = DB::table('admin')
				-> where('id',$id)
				-> first();

		return view('admin.manager.edit',['title' => $title,'data' => $data]);
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminManagerUpdateRequest $request, $id)
    {
        //更新管理员信息
		$data = $request -> except(['_token','_method','oldHeader']);
		unset($data['repassword']);
		if($data['password'])
		{
			$data['password'] = Hash::make($data['password']);
		}
		else
		{
			unset($data['password']);
		}
		
		
		//添加其它字段
        if($request -> hasFile('header'))
		{
            if($request -> file('header') -> isValid())
			{
                $suffix = $request -> file('header') -> getClientOriginalExtension();
                $fileName = time().mt_rand(100000,999999).'.'.$suffix;
				$t = date('Ymd').'/';
                $request -> file('header') -> move(config('app.managerDir').$t,$fileName);
				
                //添加header 字段
                $data['header'] = $t.$fileName;
				$file = config('app.managerDir').$request -> input(['oldHeader']);
				//dd($file);
				if(file_exists($file))
				{
					if($request -> input('oldHeader') != 'default.jpg')
					{
						unlink($file);
					}
					
				}

            }
        }
		
		$res = DB::table('admin')
				-> where('id',$id)
				-> update($data);
		
		if($res)
		{
			return redirect('admin/manager') -> with(['msg' => '更新成功！']);
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
        //删除管理员
		$data = DB::table('admin')
				-> where('id',$id)
				-> first();
		$file = config('app.managerDir').$data -> header;
		if(file_exists($file))
		{	
			if($data -> header != 'default.jpg' )
			{
				unlink($file);
			}
		}
        
		$res = DB::table('admin') -> where('id','=',$id) -> delete();
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
