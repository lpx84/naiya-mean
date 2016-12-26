<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeIndexController;
use DB;

class PrefilePhotoController extends Controller
{
	//登录验证
	public function __construct()
	{
		$this -> middleware(['user.login']);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '修改头像';
		$id = session('user.uid');
		//dd($id);
		$res = DB::table('user') 
				-> where('id', $id)
				-> first();
		//dd($res);
		return view('user.home.header.index',array_merge(['title' => $title,'res' => $res],HomeIndexController::getData()));
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
        //
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
        //dd($request -> all());
		//dd($id);
        $data = $request -> except(['_token','_method','img','oldImg']);
		//dd($data);
        //处理图片
        if($request -> hasFile('img')){
            if($request -> file('img')){
                //获取扩展名
                $suffix = $request -> file('img') -> getClientOriginalExtension();
              // dd($suffix);
               //生成文件名称
               $fileName = time() . mt_rand(100000,999999).'.'.$suffix; 
               //移动文件
               $t = date('Ymd').'/';
               $request -> file('img') -> move(config('app.userDir').$t,$fileName);
               //处理字段
               $data['header'] = $t.$fileName;
               //获取老图片
                $oldImg = $request -> input('oldImg');
				//dd($oldImg);
                //图片路径
                if(file_exists(config('app.userDir').$oldImg))
                {
					if($oldImg != 'default.jpg')
					{
						unlink(config('app.userDir').$oldImg);
					}
                }

            }
        }
        //处理时间
        
        $data['update_at'] = time();
		//$data['header'] = $data['img'];
		//dd($data);

        //dd($data);

        $res = DB::table('user') -> where('id',$id) -> update($data);
        if($res){
            return redirect('/user/prefile') -> with(['info' => '上传成功']);
        }else{
            return back() -> with(['info' => '上传失败']);
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
        //
    }
}
