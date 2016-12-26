<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MerchantGoodsStoreRequest;
use App\Http\Requests\MerchantGoodsUpdateRequest;
use App\Http\Requests\MerchantSelectCateRequest;
use App\Http\Controllers\Controller;

use DB;

class GoodsController extends Controller
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
        //商品列表
        $title = '商品列表';
        
        //获取商品
        $data = DB::table('goods') 
                -> select('goods.*', 'b.name as bname', 'c.name as cname', DB::raw('concat(m_c.id,",",m_c.path) as cates'))
                -> leftJoin('brand as b', 'goods.bid', '=', 'b.id')
                -> leftJoin('cate as c', 'goods.cid', '=', 'c.id')
                -> where('goods.mid', $this -> mid) 
                -> where('goods.name', 'like', '%'.$request -> input('keyWord', '').'%') 
                -> orderBy('cates', 'Desc')
                -> orderBy('goods.create_at', 'Desc')
                -> paginate( $request -> input('pageSize', 10));
        // dd($data -> all());
        return view('merchant.goods.index', ['title' => $title, 'data' => $data, 'request' => $request -> all()]);
    }

    /**
     * 发布商品第一步：选择分类
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //发布商品第一步：选择分类
        $title = '选择分类';
        
        $data = DB::table('cate')
                -> select('id','name')
                -> where('pid', '0')
                -> get();
        
        return view('merchant.goods.create', ['title' => $title, 'data' => $data]);
    }
    
    /**
     * 修改商品：ajax获取品牌
     *
     * @return \Illuminate\Http\Response
     */
    public function line(Request $request, $stu)
    {
        $stu = (intval($stu) == 2 ? 2 : 1);
        $ids = $request -> input('goods');
        $data = DB::table('goods')
                -> whereIn('id', $ids)
                -> update(['status' => $stu]);
        return back() -> with(['msg' => '更新成功']);
    }
    
    /**
     * 修改商品：ajax获取品牌
     *
     * @return \Illuminate\Http\Response
     */
    public function brand($cid)
    {
        $data = DB::table('brand')
                -> select('id','name')
                -> where('cid', $cid)
                -> get();
        return response() -> json($data);
    }

    /**
     * 发布商品第一步：ajax获取分类
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        $pid = intval($request -> input('pid'));
        if (!$pid)
        {
            return response() -> json([]);
        }
        
        $data = DB::table('cate')
                -> select('id','name')
                -> where('pid', $pid)
                -> get();
        return response() -> json($data);
    }

    /**
     * 发布商品第二步：添加商品
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(MerchantSelectCateRequest $request)
    {
        // dd(session() -> all());
        $data = $request -> except(['_token']);

        //分类
        $cates = DB::table('cate')
                -> select('id', 'name')
                -> whereIn('id', array_values($data))
                -> get();
        $cateId = $request -> input('threeId');
        
        //分类属性
        $resAttr = DB::table('cate_attr as ca')
                -> select('ca.anid', 'an.name', 'av.id as avid', 'av.value')
                -> leftJoin('attr_name as an', 'ca.anid', '=', 'an.id')
                -> leftJoin('attr_value as av', 'an.id', '=', 'av.anid')
                -> where('ca.cid', $cateId)
                -> get();
        
        //分类拓展属性
        // select mav.anid as mavid, mav.value as mavvalue from m_cate_attr as ca
        // left join m_merchant_attr_value as mav
        // on mav.anid = ca.anid
        // where mav.mid = 1;
        $resExtAttr = DB::table('cate_attr as ca')
                -> select('ca.anid', 'mav.id as mavid', 'mav.value as mavValue')
                -> leftJoin('merchant_attr_value as mav', 'mav.anid', '=', 'ca.anid')
                -> where('ca.cid', $cateId)
                -> where('mav.mid', $this -> mid)
                -> get();
        $attrs = [];
        foreach ($resAttr as $v)
        {
            $attrs[$v -> anid]['anid'] = $v -> anid;
            $attrs[$v -> anid]['name'] = $v -> name;
            
            if($v -> avid)
            {
                $tmp = [];
                $tmp['avid'] = $v -> avid;
                $tmp['value'] = $v -> value;
                
                $attrs[$v -> anid]['sub'][] = $tmp;
            }
        }
        
        foreach ($resExtAttr as $v)
        {
            $tmp = [];
            $tmp['mavid'] = $v -> mavid;
            $tmp['mavValue'] = $v -> mavValue;
            $attrs[$v -> anid]['extSub'][] = $tmp;
        }
        // print_r($resExtAttr);
        // print_r($attrs);
        // dd($attrs);
        //品牌
        $brands = DB::table('brand')
                -> select('id', 'name')
                -> where('cid', $cateId)
                -> get();
        
        //标题
        $title = '添加商品';
        
        return view('merchant.goods.createsteptwo', 
                    [
                        'title' => $title, 
                        'cateId' => $cateId,
                        'brands' => $brands,
                        'cates' => $cates,
                        'attrs' => $attrs,
                        'oneId' => $data['oneId'],
                        'twoId' => $data['twoId'],
                        'threeId' => $data['threeId'],
                    ]
                );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploads(Request $request)
    {
        //图片上传操作
        // dd($request -> all());
        
        $file = '';
        if($request -> hasFile('img'))
        {
            if($request -> file('img') -> isValid())
            {
                $t = time();
                $dir = date('Ymd').'/';
                $suffix = $request -> file('img') -> getClientOriginalExtension();
                $filename = time().mt_rand(100000, 999999).'.'.$suffix;
                $request -> file('img') -> move(config('app.goodsDir').$dir, $filename);
                $file = $dir.$filename;
            }
        }
        
        return response() -> json(['filename' => $file]);
    }

    /**
     * 更新商品图片
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateUploads(Request $request, $id)
    {
        //图片上传操作
        // dd($request -> all());
        
        $file = '';
        if($request -> hasFile('img'))
        {
            if($request -> file('img') -> isValid())
            {
                $t = time();
                $dir = date('Ymd').'/';
                $suffix = $request -> file('img') -> getClientOriginalExtension();
                $filename = time().mt_rand(100000, 999999).'.'.$suffix;
                $request -> file('img') -> move(config('app.goodsDir').$dir, $filename);
                $file = $dir.$filename;
            }
        }
        $data = [
            'gid' => $id,
            'title' => '商品配图',
            'img' => $file,
        ];
        
        $res = DB::table('goods_img') -> insert($data);
        if($res)
        {
            return response() -> json(['code' => 0]);
        }
        else
        {
            return response() -> json(['code' => 1]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delUploads(Request $request)
    {
        //图片删除操作
        // dd($request -> all());
        $key = $request -> input('key');
        list($gid, $img) = explode(',', $key);
        
        //执行删除数据
        DB::table('goods_img')
            -> where('gid', $gid)
            -> where('img', $img)
            -> delete();
        
        // 执行删除配图
        $file = config('app.goodsDir').$img;
        if(file_exists($file))
        {
            unlink($file);
        }
        
        return response() -> json(['code' => 0]);
    }

    /**
     * 添加扩展属性值ajax
     */
    public function insertExtAttr(Request $request)
    {
        $data = $request -> all();
        $data['mid'] = $this -> mid;
        
        //执行添加
        $extId = DB::table('merchant_attr_value') -> insertGetId($data);
        
        //判断结果
        if ($extId)
        {
            return response() -> json(['code' => 0, 'extid' => $extId]);
        }
        else
        {
            return response() -> json(['code' => 1]);
        }
    }
    
    /**
     * 发布商品
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MerchantGoodsStoreRequest $request)
    {
        //闪存
        $request -> flash();
        
        $t = time();
        
        //使用事务
        DB::beginTransaction();
        
        //商品信息
        $good = $request -> only(['cid','bid','code','name','price','nums','desc']);
        $good['desc'] = htmlspecialchars($good['desc']);
        $good['mid'] = $this -> mid;
        $good['create_at'] = $t;
        $good['update_at'] = $t;
        
        //商品缩略图
        if ($request -> hasFile('smallImg'))
        {
            if ($request -> file('smallImg') -> isValid())
            {
                //扩展名
                $suffix = $request -> file('smallImg') -> getClientOriginalExtension();
                //文件名
                $filename = 'img_'.$t.mt_rand(100000, 999999).'.'.$suffix;
                //目录
                $dir = date('Ymd',$t).'/';
                //移动存储
                $request -> file('smallImg') -> move(config('app.goodsDir').$dir, $filename);
                //等比例缩放
                $file = config('app.goodsDir').$dir.$filename;
                imageZoom($file, 240, 240, $filename);
                imageZoom($file, 200, 200, $filename.'200x200.'.$suffix);
                imageZoom($file, 160, 160, $filename.'160x160.'.$suffix);
                imageZoom($file, 80, 80, $filename.'80x80.'.$suffix);
                
                //添加数据字段
                $good['img'] = $dir.$filename;
            }
        }
        
        //添加商品操作
        $gid = DB::table('goods') -> insertGetId($good);
        if (!$gid)
        {
            DB::rollBack();
            return back() -> with(['msg' => '商品添加失败']);
        }
        
        //商品参数
        $param = $request -> only(['paramsName', 'paramsValue']);
        $paramsName = $param['paramsName'];
        $paramsValue = $param['paramsValue'];
        
        //检查是否添加了参数
        if (!empty($paramsName))
        {
            //构造商品参数数据
            $params = [];
            foreach ($paramsName as $k => $v)
            {
                if (empty($v))
                {
                    continue;
                }
                
                $tmp = [];
                $tmp['name'] = $paramsName[$k];
                $tmp['value'] = $paramsValue[$k];
                $tmp['mid'] = $this -> mid;
                $tmp['gid'] = $gid;
                $params[] = $tmp;
            }
            
            //检查是否添加了参数
            if (!empty($params))
            {
                //添加商品参数操作
                $res = DB::table('goods_params') -> insert($params);
                if (!$res)
                {
                    DB::rollBack();
                    return back() -> with(['msg' => '商品参数添加失败']);
                }
            }
        }
        
        //商品属性
        $attr = $request -> only(['attrName', 'attrValue', 'attrExtValue']);
        
        $attrName = $attr['attrName'];
        $attrValue = $attr['attrValue'];
        $attrExtValue = $attr['attrExtValue'];
        
        //判断商品属性数据
        if ($attrName && ($attrValue || $attrExtValue))
        {
            //构造商品属性数据
            $attrs = [];
            foreach ($attrName as $v)
            {
                if ($attrValue && array_key_exists($v, $attrValue))
                {
                    foreach ($attrValue[$v] as $value)
                    {
                        $tmp = [];
                        $tmp['gid'] = $gid;
                        $tmp['mid'] = $this -> mid;
                        $tmp['anid'] = $v;
                        $tmp['avid'] = $value;
                        $tmp['mavid'] = 0;
                        $attrs[] = $tmp;
                    }
                }
                
                if ($attrExtValue && array_key_exists($v, $attrExtValue))
                {
                    foreach ($attrExtValue[$v] as $value)
                    {
                        $tmp = [];
                        $tmp['gid'] = $gid;
                        $tmp['mid'] = $this -> mid;
                        $tmp['anid'] = $v;
                        $tmp['avid'] = 0;
                        $tmp['mavid'] = $value;
                        $attrs[] = $tmp;
                    }
                }
            }
            
            //添加商品属性操作
            $res = DB::table('goods_attr') -> insert($attrs);
            if (!$res)
            {
                DB::rollBack();
                return back() -> with(['msg' => '商品属性添加失败']);
            }
            
        }
        //商品配图
        $img = $request -> only(['imgs']);
        $imgs = [];
        foreach ($img['imgs'] as $v)
        {
            $tmp = [];
            $tmp['gid'] = $gid;
            $tmp['title'] = '商品配图';
            $tmp['img'] = $v;
            $imgs[] = $tmp;
        }
        //添加商品配图操作
        $res = DB::table('goods_img') -> insert($imgs);
        if (!$res)
        {
            DB::rollBack();
            return back() -> with(['msg' => '商品配图添加失败']);
        }
        
        //执行提交
        DB::commit();
        
        // dd($request -> all());
        return redirect('/merchant/goods') -> with(['msg' => '添加成功，不要忘记【商品上架】哦']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //标题
        $title = '商品详情';
        
        //商品详情
        $goods = DB::table('goods')
                 -> where('id', $id)
                 -> where('mid', $this -> mid)
                 -> first();
        
        $cateId = $goods -> cid;
        
        //分类
        $cate = DB::table('cate')
                -> select('path')
                -> where('id', $cateId)
                -> first();
        $cateIds = explode(',', $cateId.','.$cate -> path);
        
        $cates = DB::table('cate')
                -> select('id', 'name')
                -> whereIn('id', $cateIds)
                -> get();
        
        //分类属性
        $resAttr = DB::table('cate_attr as ca')
                -> select('ca.anid', 'an.name', 'av.id as avid', 'av.value')
                -> leftJoin('attr_name as an', 'ca.anid', '=', 'an.id')
                -> leftJoin('attr_value as av', 'an.id', '=', 'av.anid')
                -> where('ca.cid', $cateId)
                -> get();
        
        //分类拓展属性
        // select mav.anid as mavid, mav.value as mavvalue from m_cate_attr as ca
        // left join m_merchant_attr_value as mav
        // on mav.anid = ca.anid
        // where mav.mid = 1;
        $resExtAttr = DB::table('cate_attr as ca')
                -> select('ca.anid', 'mav.id as mavid', 'mav.value as mavValue')
                -> leftJoin('merchant_attr_value as mav', 'mav.anid', '=', 'ca.anid')
                -> where('ca.cid', $cateId)
                -> where('mav.mid', $this -> mid)
                -> get();
        $attrs = [];
        foreach ($resAttr as $v)
        {
            $attrs[$v -> anid]['anid'] = $v -> anid;
            $attrs[$v -> anid]['name'] = $v -> name;
            
            if($v -> avid)
            {
                $tmp = [];
                $tmp['avid'] = $v -> avid;
                $tmp['value'] = $v -> value;
                
                $attrs[$v -> anid]['sub'][$v -> avid] = $tmp;
            }
        }
        
        foreach ($resExtAttr as $v)
        {
            $tmp = [];
            $tmp['mavid'] = $v -> mavid;
            $tmp['mavValue'] = $v -> mavValue;
            $attrs[$v -> anid]['extSub'][$v -> mavid] = $tmp;
        }
        // print_r($resExtAttr);
        // print_r($attrs);
        // dd($attrs);
        //品牌
        $brands = DB::table('brand')
                -> select('id', 'name')
                -> where('cid', $cateId)
                -> get();
        
        //商品参数
        $params = DB::table('goods_params')
                -> select('id','name','value')
                -> where('mid', $this -> mid)
                -> where('gid', $goods -> id)
                -> get();
        
        //商品配图
        $imgs = DB::table('goods_img')
                -> where('gid', $goods -> id)
                -> get();
        
        //获取已选择属性
        $goodsAttrs = DB::table('goods_attr')
                      -> select('anid', 'avid', 'mavid')
                      -> where('mid', $this -> mid)
                      -> where('gid', $goods -> id)
                      -> get();
        //选中已选择属性
        foreach ($goodsAttrs as $v)
        {
            if($v -> avid)
            {
                $attrs[$v -> anid]['sub'][$v -> avid]['checked'] = 'checked';
            }
            
            if($v -> mavid)
            {
                $attrs[$v -> anid]['extSub'][$v -> mavid]['checked'] = 'checked';
            }
        }
        
        return view('merchant.goods.show', 
                    [
                        'title' => $title, 
                        'cateId' => $cateId,
                        'brands' => $brands,
                        'cates' => $cates,
                        'attrs' => $attrs,
                        'goodsAttrs' => $goodsAttrs,
                        'goods' => $goods,
                        'params' => $params,
                        'imgs' => $imgs,
                    ]
                );
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
    public function update(MerchantGoodsUpdateRequest $request, $gid)
    {
        //商品更新
        
        //闪存
        $request -> flash();
        
        $t = time();
        
        //使用事务
        DB::beginTransaction();
        
        //构造商品
        $construct = DB::table('goods') 
            -> where('mid', $this -> mid) 
            -> where('id', $gid);
        //获取
        $oldGoods = $construct -> first();
        //配置商品信息
        $good = $request -> only(['bid','name','price','nums','desc']);
        $good['desc'] = htmlspecialchars($good['desc']);
        $good['update_at'] = $t;
        
        //商品缩略图
        if ($request -> hasFile('smallImg'))
        {
            if ($request -> file('smallImg') -> isValid())
            {
                //删除原商品封面图片
                if ($oldGoods)
                {
                    $files = ['200x200', '160x160', '80x80'];
                    $file = config('app.goodsDir').$oldGoods -> img;
                    $fileInfo = pathinfo($file);
                    $suffix = $fileInfo['extension'];
                    
                    if (file_exists($file))
                    {
                        unlink($file);
                        unlink($file.$files[0].'.'.$suffix);
                        unlink($file.$files[1].'.'.$suffix);
                        unlink($file.$files[2].'.'.$suffix);
                    }
                }
                
                //扩展名
                $suffix = $request -> file('smallImg') -> getClientOriginalExtension();
                //文件名
                $filename = 'img_'.$t.mt_rand(100000, 999999).'.'.$suffix;
                //目录
                $dir = date('Ymd',$t).'/';
                //移动存储
                $request -> file('smallImg') -> move(config('app.goodsDir').$dir, $filename);
                //等比例缩放
                $file = config('app.goodsDir').$dir.$filename;
                imageZoom($file, 240, 240, $filename);
                imageZoom($file, 200, 200, $filename.'200x200.'.$suffix);
                imageZoom($file, 160, 160, $filename.'160x160.'.$suffix);
                imageZoom($file, 80, 80, $filename.'80x80.'.$suffix);
                
                //添加数据字段
                $good['img'] = $dir.$filename;
            }
        }
        
        //更新商品操作
        $res = $construct -> update($good);
        if (!$res)
        {
            DB::rollBack();
            return back() -> with(['msg' => '商品添加失败']);
        }
        
        //商品参数
        $param = $request -> only(['paramsName', 'paramsValue']);
        $paramsName = $param['paramsName'];
        $paramsValue = $param['paramsValue'];
        
        //检查是否添加了参数
        if (!empty($paramsName))
        {
            //构造商品参数数据
            $params = [];
            foreach ($paramsName as $k => $v)
            {
                if (empty($v))
                {
                    continue;
                }
                
                $tmp = [];
                $tmp['name'] = $paramsName[$k];
                $tmp['value'] = $paramsValue[$k];
                $tmp['mid'] = $this -> mid;
                $tmp['gid'] = $gid;
                $params[] = $tmp;
            }
            
            //检查是否添加了参数
            if (!empty($params))
            {
                //删除商品旧参数
                DB::table('goods_params') 
                -> where('mid', $this -> mid)
                -> where('gid', $gid)
                -> delete();
                
                //添加商品参数操作
                $res = DB::table('goods_params') -> insert($params);
                if (!$res)
                {
                    DB::rollBack();
                    return back() -> with(['msg' => '商品参数添加失败']);
                }
            }
        }
        
        //商品属性
        $attr = $request -> only(['attrName', 'attrValue', 'attrExtValue']);
        
        $attrName = $attr['attrName'];
        $attrValue = $attr['attrValue'];
        $attrExtValue = $attr['attrExtValue'];
        // print_r($attrName);
        // print_r($attrValue);
        // print_r($attrExtValue);
        // dd($attr);
        //判断商品属性数据
        if ($attrName)
        {
            //构造商品属性数据
            $attrs = [];
            foreach ($attrName as $v)
            {
                if ($attrValue && array_key_exists($v, $attrValue))
                {
                    foreach ($attrValue[$v] as $value)
                    {
                        $tmp = [];
                        $tmp['gid'] = $gid;
                        $tmp['mid'] = $this -> mid;
                        $tmp['anid'] = $v;
                        $tmp['avid'] = $value;
                        $tmp['mavid'] = 0;
                        $attrs[] = $tmp;
                    }
                }
                
                if ($attrExtValue && array_key_exists($v, $attrExtValue))
                {
                    foreach ($attrExtValue[$v] as $value)
                    {
                        $tmp = [];
                        $tmp['gid'] = $gid;
                        $tmp['mid'] = $this -> mid;
                        $tmp['anid'] = $v;
                        $tmp['avid'] = 0;
                        $tmp['mavid'] = $value;
                        $attrs[] = $tmp;
                    }
                }
            }
            
            //删除商品旧属性操作
            DB::table('goods_attr')
            -> where('mid', $this -> mid)
            -> where('gid', $gid)
            -> delete();
            
            //添加商品属性操作
            if(!empty($attrs))
            {
                $res = DB::table('goods_attr') -> insert($attrs);
                if (!$res)
                {
                    DB::rollBack();
                    return back() -> with(['msg' => '商品属性添加失败']);
                }
            }
        }
        
        //执行提交
        DB::commit();
        
        // dd($request -> all());
        return redirect('/merchant/goods') -> with(['msg' => '修改成功']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateField(Request $request, $id)
    {
        //ajax更新字段值
        $data = [];
        $data[$request -> input('field')] = $request -> input('value');
        $res = DB::table('goods')
               -> where('mid', $this -> mid)
               -> where('id', $id)
               -> update($data);
        if ($res)
        {
            return response() -> json(['code' => 0]);
        }
        else
        {
            return response() -> json(['code' => 1]);
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
        //删除商品属性值
        DB::table('goods_attr') 
            -> where('mid', $this -> mid) 
            -> where('gid', $id) 
            -> delete();
    
        //删除商品参数
        DB::table('goods_params')
            -> where('mid', $this -> mid) 
            -> where('gid', $id) 
            -> delete();
        
        //删除商品配图
        $construct = DB::table('goods_img')
            -> where('gid', $id);
        $res = $construct -> get();
        $construct -> delete();
        if ($res)
        {
            foreach ($res as $v)
            {
                $file = config('app.goodsDir').$v -> img;
                if (file_exists($file))
                {
                    unlink($file);
                }
            }
        }
        
        
        //删除商品
        $construct = DB::table('goods') 
            -> where('mid', $this -> mid) 
            -> where('id', $id);
        $res = $construct -> first();
        $construct -> delete();
        //删除商品封面图片
        if ($res)
        {
            $files = ['200x200', '160x160', '80x80'];
            $file = config('app.goodsDir').$res -> img;
            $fileInfo = pathinfo($file);
            $suffix = $fileInfo['extension'];
            
            if (file_exists($file))
            {
                unlink($file);
                unlink($file.$files[0].'.'.$suffix);
                unlink($file.$files[1].'.'.$suffix);
                unlink($file.$files[2].'.'.$suffix);
            }
        }
        return response() -> json(['code' => 0]);
    }
}
