<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class LogisticsController extends Controller
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
        //物流列表
        $title = '物流列表';
        
        //获取数据
        $data = DB::table('logistics')
                -> where('mid', $this -> mid)
                -> where('order_no', 'like', $request -> input('keyWord', '').'%') 
                -> paginate( $request -> input('pageSize', 10));
        //状态
        $status = [
             1=>'已发货',
             2=>'在途中',
             3=>'已送达'
        ];
        
        return view('merchant.logistics.index', 
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
    public function add($oid, $mid, $order_no)
    {
        //添加物流
        $title = '添加物流';
        
        $items = DB::table('order_detail as od')
                -> select('od.*', 'g.price', 'g.code as gcode', 'g.name as gname', 'g.img as gimg')
                -> leftJoin('goods as g', 'g.id', '=', 'od.gid')
                -> where('od.oid', $oid)
                -> where('od.mid', $mid)
                -> orderBy('od.create_at', 'DESC')
                -> get();
        // dd($item);
        $address = DB::table('order_address as oa')
                   -> select('ua.*')
                   -> leftJoin('user_address as ua', 'oa.aid', '=', 'ua.id')
                   -> where('oa.oid', $oid)
                   -> first();
        // dd($address);
        if (!$address)
        {
            return back() -> with(['msg' => '用户已将收获地址删除，请联系用户进行地址确认！']);
        }
        return view('merchant.logistics.add', 
                    [
                        'title' => $title,
                        'oid' => $oid,
                        'mid' => $mid,
                        'order_no' => $order_no,
                        'items' => $items,
                        'address' => $address,
                    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request -> all());
        //验证
        $this -> validate($request, [
            'oid' => 'required',
            'mid' => 'required',
            'order_no' => 'required',
            'company' => 'required',
            'logi_no' => 'required',
        ], [
            'oid.required' => '订单ID参数非法',
            'mid.required' => '商户参数非法',
            'order_no.required' => '订单号参数非法',
            'company.required' => '快递公司不能为空',
            'logi_no.required' => '快递单号不能为空',
        ]);
        
        //添加快递信息
        $data = $request -> except(['_token']);
        $data['content'] = '已发快递';
        $t = time();
        $data['create_at'] = $t;
        $data['update_at'] = $t;
        
        //开启事务
        DB::beginTransaction();
        
        $res = DB::table('logistics') -> insert($data);
        if (!$res)
        {
            DB::rollBack();
            return back() -> with(['msg' => '添加物流信息失败']);
        }
        
        //改变订单详情状态
        $res = DB::table('order_detail')
               -> where('oid', $request -> input('oid'))
               -> where('mid', $request -> input('mid'))
               -> update(['status' => 6]);
        if (!$res)
        {
            DB::rollBack();
            return back() -> with(['msg' => '改变订单详情状态失败']);
        }
        
        //提交
        DB::commit();
        
        return redirect('/merchant/logistics') -> with(['msg' => '添加物流信息成功']);
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
        /**
         * state	快递单当前的状态 ：　 
            0：在途，即货物处于运输过程中；
            1：揽件，货物已由快递公司揽收并且产生了第一条跟踪信息；
            2：疑难，货物寄送过程出了问题；
            3：签收，收件人已签收；
            4：退签，即货物由于用户拒签、超区等原因退回，而且发件人已经签收；
            5：派件，即快递正在进行同城派件；
            6：退回，货物正处于退回发件人的途中；
         */
        $no = $id;
        //更新物流状态
        $content = file_get_contents('https://www.kuaidi100.com/autonumber/autoComNum?text='.$no);
        
        $data = json_decode($content, true);
        $company = $data['auto'][0]['comCode'];
        
        $res = file_get_contents('https://www.kuaidi100.com/query?type='.$company.'&postid='.$no.'&id=1&valicode=&temp=0.'.time());
        
        $data = json_decode($res, true);
        // print_r($data);
        
        $state = [
            0 => 2,
            1 => 2,
            2 => 2,
            4 => 2,
            5 => 2,
            6 => 2,
            3 => 3,
        ];
        
        $result = DB::table('logistics')
                  -> where('mid', $this -> mid)
                  -> where('logi_no', $id)
                  -> update([
                                'content' => json_encode($data['data']),
                                'status' => $state[$data['state']]
                            ]);
        if ($result)
        {
            return back() -> with(['msg' => '物流信息获取成功']);
        }
        else
        {
            return back() -> with(['msg' => '物流信息获取失败']);
        }
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
        //更新物流状态
        $content = file_get_contents('https://www.kuaidi100.com/autonumber/autoComNum?text=531478209627');
        
        echo $content;
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
