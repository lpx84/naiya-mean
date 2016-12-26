<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeIndexController;
use DB;
class HomeHelpController extends Controller
{
	
    //帮助中心首页
	public function help($id=2)
	{
		
		$title = '玩转官网';
		$cate = DB::table('help_cate')
				-> where('pid',0)
				->get();
		
		$data = DB::table('help_cate as c1') 
                -> select('c1.*',DB::raw("concat(m_c1.path, ',', m_c1.id) as newPath"), 'c2.name as pname')
                -> leftJoin('help_cate as c2', 'c1.pid', '=', 'c2.id')
                -> orderBy('newPath', 'ASC')
				-> get();
		
		$help = DB::table('help')
				-> get();
		
		$content = DB::table('help as h')
				-> leftJoin('help_cate as c','h.hcid','=','c.id')
				-> leftJoin('help_cate as d','c.pid','=','d.id')
				-> select('h.*','c.name as cname','d.name as dname')
				-> where('h.id',$id)
				-> first();
		$content -> content = htmlspecialchars_decode($content -> content);
		
		
		
		return view('home.help',array_merge([
				'title' => $title,'cate' => $cate,
				'data' => $data,'help' => $help,
				'content' => $content
			],HomeIndexController::getData()));
		
	}
}
