<?php

namespace App\Http\Controllers\Merchant;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class IndexController extends Controller
{
    //商户 ID属性
    private $mid;
    
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
    public function index()
    {
        //标题
        $title = '首页';
        
        //商户信息
        $data = DB::table('merchant as m')
                -> select('m.id', 'm.username', 'm.name as merchantName', 'm.account', 'm.logo', 'm.desc', 'm.create_at', 'm.update_at', 'md.name as realname', 'md.email', 'md.phone', 'md.sex', 'md.cid_no', 'md.cid_img')
                -> leftJoin('merchant_detail as md', 'md.mid', '=', 'm.id')
                -> where('id', $this -> mid)
                -> first();
        // dd($data);
        //返回
        return view('merchant.index.index', 
                    [
                        'title' => $title,
                        'data' => $data
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
