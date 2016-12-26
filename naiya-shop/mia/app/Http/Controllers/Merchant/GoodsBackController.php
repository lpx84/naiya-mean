<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class GoodsBackController extends Controller
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
        //退货列表
        $title = '退货列表';
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
        $data = DB::table('goods_back as gb')
                -> select('gb.*', 'u.username as uname', 'g.name as gname', 'g.img as gimg', 'g.code as gcode')
                -> leftJoin('user as u', 'u.id', '=', 'gb.uid')
                -> leftJoin('goods as g', 'g.id', '=', 'gb.gid')
                -> whereIn('gb.gid', $gids)
                -> where('gb.order_no', 'like', $request -> input('keyWord', '').'%') 
                -> paginate( $request -> input('pageSize', 10));
        
        // dd($data);
        //状态
        $status = [
             1=>'退货中',
             2=>'已退货',
             3=>'已退款'
        ];
        
        return view('merchant.goodsback.index', 
                    [
                        'title' => $title, 
                        'data' => $data,
                        'status' => $status,
                        'request' => $request -> all()
                    ]
                );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doGoodsBack($id, $uid, $oid, $gid)
    {
        //确认退货
        $t = time();
        
        //开启事务
        DB::beginTransaction();
        
        //修改退货状态
        $res = DB::table('goods_back')
                     -> where('id', $id)
                     -> where('uid', $uid)
                     -> where('oid', $oid)
                     -> where('gid', $gid)
                     -> update(['update_at' => $t,'status' => 2]);
        if (!$res)
        {
            DB::rollBack();
            return back() -> with(['msg' => '修改退货状态失败']);
        }
        
        //订单详情状态改变
        $res = DB::table('order_detail')
                       -> where('mid', $this -> mid)
                       -> where('gid', $gid)
                       -> where('uid', $uid)
                       -> where('oid', $oid)
                       -> update(['status' => 10]);
        if (!$res)
        {
            DB::rollBack();
            return back() -> with(['msg' => '修改订单详情状态失败']);
        }
        //提交
        DB::commit();
        
        return redirect('/merchant/goodsback') -> with(['msg' => '操作成功']);
        
        // 后续管理员操作
        //退款操作 --管理员操作
        // 调用退款接口
        //总额
        // $total = $orderDetail -> price * $orderDetail -> nums;
    }

}
