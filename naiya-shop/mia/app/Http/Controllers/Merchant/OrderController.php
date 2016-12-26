<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class OrderController extends Controller
{
    //商户 ID属性
    private $mid;
    //状态
    private $status = [
         1=> '待支付',
         2=>'已取消',
         3=>'交易关闭',
         4=>'已支付',
         5=>'待发货',
         6=>'已发货',
         7=>'已收货',
         8=>'已完成',
         9=>'退货中',
         10=>'已退货',
         11=>'已退款',
    ];
    
    //登录状态验证
    public function __construct()
    {
        //登录
        $this -> middleware('merchant.login');
        
        //商户ID
        $this -> mid = session('merchant.uid');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //订单列表
        $title = '订单列表';
        
        //获取数据
        $data = DB::table('order_detail as od')
                -> select('od.oid')
                -> where('od.mid', $this -> mid)
                -> where('od.order_no', 'like', $request -> input('keyWord', '').'%') 
                //-> orderBy('od.status', 'ASC')
                -> groupBy('od.order_no')
                -> orderBy('od.create_at', 'DESC')
                -> paginate( $request -> input('pageSize', 10));
        // dd($data);
        // 订单列表
        $oids = [];
        foreach ($data as $v)
        {
            $oids[] = $v -> oid;
        }
        
        $item = DB::table('order_detail as od')
                -> select('od.*', 'g.price', 'g.code as gcode', 'g.name as gname', 'g.img as gimg', 'u.username', 'u.phone as userphone', 'u.email as useremail')
                -> leftJoin('goods as g', 'g.id', '=', 'od.gid')
                -> leftJoin('user as u', 'u.id', '=', 'od.uid')
                -> whereIn('od.oid', $oids)
                -> orderBy('od.create_at', 'DESC')
                -> get();
        // dd($item);
        //重新构造
        $items = [];
        foreach ($item as $v)
        {
            $items[$v->oid][] = $v;
        }
        // dd($items);
        return view('merchant.order.index', 
                    [
                        'title' => $title, 
                        'data' => $data,
                        'items' => $items,
                        'status' => $this -> status,
                        'request' => $request -> all()
                    ]
                );
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
}
