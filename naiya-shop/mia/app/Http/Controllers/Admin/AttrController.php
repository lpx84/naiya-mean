<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\AdminAttrRequest;

class AttrController extends Controller
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
        //属性首页
		$title = '属性列表';
		$data = DB::table('attr_name as n')
				-> join('attr_value as v', 'n.id', '=', 'v.anid')
				-> where('name','like','%'.$request -> input('keyWord').'%') 
				-> orderBy('v.anid')
				-> paginate($request -> input('pageSize', 10));
		return view('admin.attr.index',['title' => $title,'request' => $request-> only(['keyWord','pageSize']),'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加属性页面
        $title = '添加属性';
        
        return view('admin.attr.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminAttrRequest $request)
    {
        //执行添加
		$name = $request -> input('name');
		$value = $request -> input('value');
		
		//判断属性名是否存在
		$isname = DB::table('attr_name')
				->where('name',$name)
				->first();
		if($isname)
		{
			$anid = $isname -> id;
			$data['anid'] = $anid;
			$data['value'] = $value;
			$resv = DB::table('attr_value')->insert($data);
			if($resv)
			{
				return redirect('/admin/attr') -> with(['msg' => '属性添加成功！']);
			}
			else
			{
				return back() -> with(['msg' => '属性添加失败！']);
			}
			
		}
		else
		{
		$resn = DB::table('attr_name') -> insertGetId(['name' => $name]);
			$anid = $resn;
			$data['anid'] = $anid;
			$data['value'] = $value;
			$resv = DB::table('attr_value')-> insert($data);
			if($resv)
			{
				return redirect('/admin/attr') -> with(['msg' => '属性添加成功！']);
			}
			else
			{
				return back() -> with(['msg' => '属性添加失败！']);
			}
	
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
        //编辑页面
		$title = "属性编辑";
		$resv = DB::table('attr_value')
				-> where('id',$id)
				-> first();
		$resn = DB::table('attr_name')
				-> where('id',$resv -> anid)
				-> first();
		$data['id'] = $resv -> id;
		$data['anid'] = $resv -> anid;
		$data['value'] = $resv -> value;
		$data['name'] = $resn -> name;
		
		return view('admin.attr.edit',['title' => $title,'data' => $data]);
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
        //更新属性值
		$data = $request -> except(['_token','_method','anid']);
		$res = DB::table('attr_value')
				-> where('id',$id)
				-> update($data);
		if($res)
		{
			return redirect('admin/attr') -> with(['msg' => '更新成功！']);
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
		$data = DB::table('attr_value')
				-> where('id',$id)
				-> first();
		//删除属性值
		$resv = DB::table('attr_value')
				-> where('id',$id)
				-> delete();
				
		//判断属性名下是否存在属性值
		$isresv = DB::table('attr_value')
				-> where('anid',$data->anid)
				-> get();
		
		if($resv)
		{
			if(!$isresv)
			{
				$resn = DB::table('attr_name')
						-> where('id',$data -> anid)
						-> delete();
			}
            return response() -> json(['code' => 0]);
        }
		else
		{
            return response() -> json(['code' => 1]);
        }
		
    }
}
