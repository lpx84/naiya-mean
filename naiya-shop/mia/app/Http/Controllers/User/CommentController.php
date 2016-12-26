<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Home\HomeIndexController;
use App\Http\Controllers\Controller;
use DB;

class CommentController extends Controller
{
	public $arr = array('1' => '审核中',
						'2' => '正常显示',
						'3' => '已屏蔽',
						);
	
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
        $title = '商品口碑';
		//原始语句
		//SELECT c2.*,c1.gid as goodsid , c2.*,c3.name as goodsname , c2.create_at as createtime 
		//FROM m_order_detail as c1 
		//LEFT JOIN m_order as c2 on c1.oid = c2.id
		//LEFT JOIN m_goods as c3 on c1.gid = c3.id
		//where c2.uid = 1
		$uid = session('user.uid');
		$data = DB::table('order_detail as c1')
						-> leftJoin('order as c2', 'c1.oid', '=', 'c2.id')
						-> leftJoin('goods as c3', 'c1.gid', '=', 'c3.id')
						-> leftJoin('comment as c', 'c.gid','=', 'c1.gid')
						
						-> select('c2.*','c1.gid as goodsid', 
								  'c2.*', 'c3.name as goodsname', 'c2.create_at as createtime',
								  'c3.img as images',
								  //'c3.id as goodsid',
								  'c.id as commentid', 'c.status as comstatus'
								  )
						-> where('c2.uid', $uid)
						-> where('c1.status', 6)
						-> orderBy('desc')
						-> get();
		// dd($data);
		$res = DB::table('comment')
						-> select('gid')
						-> where('uid',$uid)
						-> get();
		//dd($res);
		//注：：以订单详情表为主，查询订单详情表里的gid=
		//select od.uid,od.gid as goodsid,c.id as commentid
		//from m_order_detail as od
		//left join m_comment as c on c.gid = od.gid
		//where od.uid=1;
		
		$comval = DB::table('order_detail as od')
						-> leftJoin('comment as c', 'c.gid','=', 'od.gid')
						-> select('od.uid','od.gid as goodsid','c.id as commentid', 'c.status as comstatus', 'od.oid as orderid')
						-> where('od.uid',$uid)
						-> get();
		//print_r($comval);
		
		//查询是否有口碑
		$comcount = DB::table('order')
					-> select(DB::raw('count(*) as count'))
					-> where('uid',$uid)
					-> where('status',6)
					-> first();
		//dd($comcount);
		return view('user.comment.index',array_merge([
									'title' => $title,
									'data' => $data,
									'comval' => $comval,
									'arr' => $this -> arr,
									'comcount' => $comcount
									],HomeIndexController::getData()));
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
    public function store(CommentRequest $request)
    {
		//dd($request -> all());
		$data = $request -> except(['_token', 'commit']);
		$gid = $data['gid'];
		
		$uid = session('user.uid');
		$data['uid'] = $uid;
		$data['create_at'] = time();
		//dd($data);
		unset($data['img']);
		$res = DB::table('comment') -> insertGetId($data);
		$comimg = $request -> only(['img']);
		//dd($request -> img);
		if($request -> hasFile('img')){
            if($request -> file('img') ->isValid()){
                //获取扩展名
                $suffix = $request -> file('img') -> getClientOriginalExtension();
				//dd($suffix);
				//生成文件名称
				$fileName = time() . mt_rand(100000,999999).'.'.$suffix; 
				//移动文件
				$t = 'user/'.date('Ymd').'/';
				$request -> file('img') -> move('./uploads/'.$t,$fileName);
				//处理字段
				$comimg['img'] = $t.$fileName;
            }
        }
		$comimg['cmid'] = $res;
		//dd($gid);
		//dd($comimg);
		$rel = DB::table('comment_img') -> insert($comimg);
		if($rel)
		{
			return redirect("/user/comment/{$res}");
		}
		else
		{ 
			return redirect('/user/comment');
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
		//dd($id);
		$title = '口碑详情';
		$data = DB::table('comment') 
				-> where('id',$id)
				-> first();
		//dd($data);
		$res = DB::table('comment_img') 
				-> where('cmid',$id)
				-> first(); 
		//dd($res);
		$val = DB::table('goods')
				-> where('id',$data -> gid)
				-> first();
		//dd($val);
        return view('user.comment.show',array_merge([
										'title' => $title, 
										'data' => $data,
										'res' => $res,
										'val' => $val
										],HomeIndexController::getData()));
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
        //
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
	
	//发表口碑
	public function publish($id)
	{
		$title = '发表口碑';
		$uid = session('user.uid');
		$data = DB::table('order_detail as c1')
						-> leftJoin('order as c2', 'c1.oid', '=', 'c2.id')
						-> leftJoin('goods as c3', 'c1.gid', '=', 'c3.id')
						-> select('c2.*','c1.gid as goodsid', 
								  'c2.*', 'c3.name as goodsname'
								  )
						-> where('c2.uid', $uid)
						-> where('c3.id',$id)
						-> get();
		//dd($data);
		$array = [];
		foreach($data as $res)
		{
			$array['goodsname'] = $res -> goodsname;
			$array['id'] = $res -> id;
			$array['goodsid'] = $res -> goodsid;
		}
		//dd($array);
		return view('user.comment.create',array_merge(['title' => $title, 'array' => $array],HomeIndexController::getData()));
	}
}
