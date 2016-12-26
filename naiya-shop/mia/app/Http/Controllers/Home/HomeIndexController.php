<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class HomeIndexController extends Controller
{
    //
	public function index()
	{
		$title = '奶牙首页';
		
		$data = DB::table('cate')
				-> where('pid',0)
				-> get();
				
				
		$cate = DB::table('cate as c1') 
                -> select('c1.*',DB::raw("concat(m_c1.path, ',', m_c1.id) as newPath"), 'c2.name as pname')
                -> leftJoin('cate as c2', 'c1.pid', '=', 'c2.id')
                -> orderBy('newPath', 'ASC')
				-> get();
		
		//二级分类
		$prefix = config('database.connections.mysql.prefix');
		$sql2 = 'select * from '.$prefix.'cate where pid in (select id from '.$prefix.'cate where pid = 0)';
		
		$res2 = DB::select($sql2);
		
		//三级分类
		$sql3 = 'select * from '.$prefix.'cate where pid in (select id from '.$prefix.'cate where pid in (select id from '.$prefix.'cate where pid = 0))';
		
		$res3 = DB::select($sql3);
		
		//热卖大牌
		$hot = DB::table('brand as b')
				-> leftJoin('cate as c','b.cid','=','c.id')
				-> leftJoin('cate as c2','c.pid','=','c2.id')
				-> select('b.*','c2.pid as c2d','c.name as cname')
				-> where('b.status','2')
				-> limit(9)
				-> get();
		// dd($hot);

		//热卖品牌
		$sale = DB::table('brand')
				-> where('status','=','2')
				-> orderby('id','asc')
				-> limit(6)
				-> get();
		
		//dd($res);
		
		//为你推荐
		$recomm = DB::table('goods')
				-> where('recomm','1')
				-> where('status','!=','1')
				-> where('status','!=','3')
				-> limit(10)
				-> get();

		//每日特卖
		$sell = DB::table('goods')
				-> where('recomm','=','1')
				-> where('status','!=','1')
				-> where('status','!=','3')
				-> limit(10)
				-> get();
		
		$top = DB::table('goods')
				-> where('status','=','2')
				-> get();


		return view('home.index',[
				'title' => $title,'data' => $data,
				'cate' => $cate,'res2' => $res2,
				'res3' => $res3,'sale' => $sale,
				'hot' => $hot,'recomm' => $recomm,
				'sell' => $sell,'top' => $top
			]);
	}
	
	
	public function app()
	{
		$title = '奶牙APP、客户端下载平台-奶牙';
		return view('home.app',array_merge(['title'=>$title],HomeIndexController::getData()));
	}
	
	public static function getData()
	{
		$data = DB::table('cate')
				-> where('pid',0)
				-> get();
				
				
		$cate = DB::table('cate as c1') 
                -> select('c1.*',DB::raw("concat(m_c1.path, ',', m_c1.id) as newPath"), 'c2.name as pname')
                -> leftJoin('cate as c2', 'c1.pid', '=', 'c2.id')
                -> orderBy('newPath', 'ASC')
				-> get();
		
		//二级分类
		$prefix = config('database.connections.mysql.prefix');
		$sql2 = 'select * from '.$prefix.'cate where pid in (select id from '.$prefix.'cate where pid = 0)';
		
		$res2 = DB::select($sql2);
		
		//三级分类
		$sql3 = 'select * from '.$prefix.'cate where pid in (select id from '.$prefix.'cate where pid in (select id from '.$prefix.'cate where pid = 0))';
		
		$res3 = DB::select($sql3);
		
		//热卖大牌
		$hot = DB::table('brand as b')
				-> leftJoin('cate as c','b.cid','=','c.id')
				-> leftJoin('cate as c2','c.pid','=','c2.id')
				-> select('b.*','c2.pid as c2d','c.name as cname')
				-> where('b.status','2')
				-> limit(9)
				-> get();
		$frefix = 'm_';		
		return [
				$frefix.'data' => $data,
				$frefix.'cate' => $cate,
				$frefix.'res2' => $res2,
				$frefix.'res3' => $res3,
				$frefix.'hot' => $hot
				
			];
	}
	
	public function guarantee()
	{
		$title = '正品保证-奶牙';
		return view('home.guarantee',array_merge(['title'=>$title],HomeIndexController::getData()));
	}
	
}
