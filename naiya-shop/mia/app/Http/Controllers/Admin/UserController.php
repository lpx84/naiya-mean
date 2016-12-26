<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserStoreRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use DB;
use Hash;

class UserController extends Controller
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
        //用户列表页面
        $data = DB::table('user') 
        -> where('username','like','%'.$request -> input('keyWord').'%') 
        -> paginate($request -> input('pageSize', 10));
        $title = '用户列表';
        return view('admin.user.index', [
				'title' => $title, 'data' => $data,
				'request' => $request-> only(['keyWord','pageSize']) 
			]);
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
        return view('admin.user.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserStoreRequest $request)
    {
        //用户添加操作
        $data = $request -> except(['_token','create_at','update_at']);

        //排除无用字段
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
                $request -> file('header') -> move(config('app.userDir').$t,$fileName);
				
                //添加header 字段
                $data['header'] = $t.$fileName;

            }
        }
		
		// dd($data);
        //ctime
        $data['create_at'] = time();
		$data['update_at'] = time();
        //token
        $data['token'] = str_random(50);
		// dd($data);
        $res = DB::table('user') -> insert($data);
		
        if($res)
		{
            return redirect('/admin/user') -> with(['msg' => '添加成功']);
        }
		else
		{
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
        //用户详情
		$title = '用户详情';
		$data = DB::table('user')
				-> where('id',$id)
				-> first();
				
		$address = DB::table('user_address')
				-> where('uid',$id)
				-> get();
				
		$detail = DB::table('user_detail')
				-> where('uid',$id)
				-> first();
		
		$cash = DB::table('user_cash')
				-> where('uid',$id)
				-> first();
		
		$store = DB::table('user_store as s')
				-> leftJoin('goods as g','s.typeid','=','g.id')
				-> select('s.*','g.name')
				-> where('uid',$id)
				-> get();
		
		$storeBrand = DB::table('user_store as s')
				-> leftJoin('brand as b','s.typeid','=','b.id')
				-> select('s.*','b.name','b.id as brandId')
				-> where('uid',$id)
				-> get();
			
		$grade = grade($data -> max_score);

		//dd($detail);
		return view('admin.user.show',[
				'title' => $title,'data' => $data,
				'address' => $address,'detail' => $detail,
				'cash' => $cash,'store' => $store,
				'storeBrand' => $storeBrand,'grade' => $grade
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
        //用户编辑页面
        $title = '用户编辑';
        $data = DB::table('user') -> where('id',$id) -> first();
		$grade = grade($data -> max_score);
        return view('admin.user.edit', ['title' => $title, 'data' => $data,'grade' => $grade]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserUpdateRequest $request, $id)
    {
        //用户编辑操作
        $data = $request -> except(['_token','_method', 'oldHeader']);
		
        //添加其它字段
        // if($request -> hasFile('header'))
		// {
            // if($request -> file('header') -> isValid())
			// {
                // $suffix = $request -> file('header') -> getClientOriginalExtension();
                // $fileName = time().mt_rand(100000,999999).'.'.$suffix;
				// $t = 'user/'.date('Ymd').'/';
                // $request -> file('header') -> move('./uploads/'.$t, $fileName);

                // //图片缩放
                // $newFile = './uploads/'.$t.$fileName;
                // imageZoom($newFile,100,100);

                // //添加header 字段
                // $data['header'] = $t.$fileName;

                // $file = './uploads/'.$request -> input('oldHeader');
                
				// // dd($request -> input('oldHeader'));
                // //删除旧图片
                // if(file_exists($file))
				// {
                    
					// if($request -> input('oldHeader') != 'default.jpg' )
					// {
						// unlink($file);
					// }
					
                // }
            // }
        // }
		
		$data['update_at'] = time();
        $res = DB::table('user') -> where('id', $id) -> update($data);
        if($res)
		{
            return redirect('/admin/user') -> with(['msg' => '更新成功']);
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
        //删除用户
       // return json_encode(['id'=>$id]);
		
		$data = DB::table('user')
				-> where('id',$id)
				-> first();
		$file = config('app.userDir').$data -> header;
		if(file_exists($file))
		{	
			if($data -> header != 'default.jpg' )
			{
				unlink($file);
			}
		}
		$res = DB::table('user') -> where('id','=',$id) -> delete();
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
