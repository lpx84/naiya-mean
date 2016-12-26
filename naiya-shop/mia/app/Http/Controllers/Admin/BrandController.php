<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdminBrandRequest;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class BrandController extends Controller
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
        //品牌的首页
		$title = '品牌管理';
		$brand = DB::table('brand')
				-> leftjoin('cate','brand.cid','=','cate.id')
				-> select('brand.*','cate.name as cateName')
				-> where('cate.name','like','%'.$request -> input('keyWord').'%')
				-> paginate($request -> input('pageSize', 20));
		//dd($brand);
       
		return view('admin.brand.index',[
				'title' => $title,'brand' => $brand,
				'request' => $request-> only(['keyWord','pageSize']),
				]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //品牌添加页
		$title = '品牌添加';
		$data = DB::table('cate') 
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
		
		return view('admin/brand/create',[
				'title' => $title,'data' => $data,
			]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminBrandRequest $request)
    {
        //执行添加
		$data = $request -> except('_token');
		if($request -> hasFile('img'))
		{
            if($request -> file('img') -> isValid())
			{
                $suffix = $request -> file('img') -> getClientOriginalExtension();
                $fileName = time().mt_rand(100000,999999).'.'.$suffix;
				$t = date('Ymd').'/';
                $request -> file('img') -> move(config('app.brandDir').$t,$fileName);
				
                //添加header 字段
                $data['img'] = $t.$fileName;

            }
        }
		$data['desc'] = htmlspecialchars($request -> input('desc'));
		$res = DB::table('brand') -> insert($data);
		if($res)
		{
			return redirect('admin/brand') -> with(['msg' => '添加成功']);
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
        //品牌的描述
		$title = '品牌描述';
		$brand = DB::table('brand')
				-> where('id',$id)
				-> first();
		$brand -> desc = htmlspecialchars_decode($brand -> desc);
		return view('admin.brand.show',['title' => $title,'brand' => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //品牌编辑
		$title = '品牌编辑';
		$brand = DB::table('brand')
				-> where('id',$id)
				-> first();
		$data = DB::table('cate') 
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
		
		$brand -> desc = htmlspecialchars_decode($brand -> desc);
		
		return view('admin.brand.edit',[
				'title' => $title,'brand' => $brand,
				'data' => $data,
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
        //更新品牌
		$data = $request -> except(['_token','_method','oldImg']);
		$this -> validate($request,
				[
					'img' => 'image'
				],[
					'img.image' => '只能上传图片(图片格式jpeg、png、bmp、gif、或 svg )'
				]);
		if($request -> hasFile('img'))
		{
			if($request -> file('img') -> isvalid())
			{
				$suffix = $request -> file('img') -> getClientOriginalExtension();
                $fileName = time().mt_rand(100000,999999).'.'.$suffix;
				$t = date('Ymd').'/';
                $request -> file('img') -> move(config('app.brandDir').$t,$fileName);
				
                //添加header 字段
                $data['img'] = $t.$fileName;
				$file = config('app.brandDir').$request -> input('oldImg');
				if(file_exists($file))
				{
					if($request -> input('oldImg') != 'default.jpg')
					{
						unlink($file);
					}
				}
			}
		}
		
		$data['desc'] = htmlspecialchars($request -> input('desc'));
		$res = DB::table('brand')
				-> where('id',$id)
				-> update($data);
		if($res)
		{
			return redirect('admin/brand') -> with(['msg' => '品牌更新成功']);
		}
		else
		{
			return back() -> with(['msg' => '品牌更新失败']);
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
        //删除品牌
		$data = DB::table('brand')
				-> where('id',$id)
				-> first();
		$oldImg = $data -> img;
		$file = config('app.brandDir').$oldImg;
		//dd($file);
		$res = DB::table('brand')
				-> where('id',$id)
				-> delete();
		if($res)
		{
			if(file_exists($file))
			{
				if($oldImg!= 'default.jpg')
				{
					unlink($file);
				}	
			}
			
			return redirect('admin/brand') -> with(['msg' => '删除成功']);
		}
		else
		{
			return back() -> with(['msg' => '删除失败']);
		}
    }
}
