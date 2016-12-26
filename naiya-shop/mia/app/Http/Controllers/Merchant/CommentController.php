<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class CommentController extends Controller
{
    // 获取商户ID
    private $mid;
    
    //构造方法
    public function __construct()
    {
        //登录状态验证
        $this -> middleware('merchant.login');
        
        //获取商户ID
        $this -> mid = session('merchant.uid');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //评论列表
        $title = '评论列表';
        
        $goods = DB::table('goods')
                 -> select('id')
                 -> where('mid', $this -> mid)
                 -> get();
        $gids = [];
        foreach ($goods as $v)
        {
            $gids[] = $v -> id;
        }
        //获取数据
        $data = DB::table('comment as c')
                -> select('c.*', 'ci.img', 'g.name as gname', 'g.img as gimg', 'g.code as gcode', 'u.username as uname')
                -> leftJoin('comment_img as ci', 'ci.cmid', '=', 'c.id')
                -> leftJoin('user as u', 'u.id', '=', 'c.uid')
                -> leftJoin('goods as g', 'g.id', '=', 'c.gid')
                -> whereIn('c.gid', $gids)
                -> where('c.title', 'like', $request -> input('keyWord', '').'%') 
                -> paginate( $request -> input('pageSize', 10));
        
        $level = [
            0 => '',
            1 => '一星',
            2 => '二星',
            3 => '三星',
            4 => '四星',
            5 => '五星',
        ];
        // dd($data);
        return view('merchant.comment.index', 
                    [
                        'title' => $title, 
                        'data' => $data,
                        'level' => $level,
                        'request' => $request -> all()
                    ]
                );
    }
}
