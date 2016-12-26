<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class SearchController extends Controller
{
    //搜索页面
    public function search(Request $request, $k = 'pre')
    {
        // $mavValue = $request -> input('mavValue');
        // echo $mavValue;
        // echo $k;
        // var_dump(session('k'));
        // print_r(session() -> all());
        // session() -> flush();
        //标题
        $title = '搜索';
        // print_r(session() -> all());
        $cid = 18;
        if (!empty($k))
        {   
            $cid = DB::table('cate')
                   -> where('name', 'like', '%'.$k.'%')
                   -> first();
            if ($cid)
            {
                $cid = $cid -> id;
            }
            else
            {
                $cid = 18;
            }
        }
        
        //分类属性
        $resAttr = DB::table('cate_attr as ca')
                -> select('ca.anid', 'an.name', 'av.id as avid', 'av.value')
                -> leftJoin('attr_name as an', 'ca.anid', '=', 'an.id')
                -> leftJoin('attr_value as av', 'an.id', '=', 'av.anid')
                -> where('ca.cid', $cid)
                -> get();
        // dd($resAttr);
        //分类拓展属性
        // select mav.anid as mavid, mav.value as mavvalue from m_cate_attr as ca
        // left join m_merchant_attr_value as mav
        // on mav.anid = ca.anid
        // where mav.mid = 1;
        $resExtAttr = DB::table('cate_attr as ca')
                -> select('ca.anid', 'mav.id as mavid', 'mav.value as mavValue')
                -> leftJoin('merchant_attr_value as mav', 'mav.anid', '=', 'ca.anid')
                -> where('ca.cid', $cid)
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
        
        // 从session中获取
        $search = [];
        if (session('search'))
        {
            $search = session('search');
        }
        
        //查询参数
        $anid = $request -> input('anid');
        $value = $request -> input('value');
        
        if ($anid)
        {
            if ($search)
            {
                // 存在则覆盖
                foreach ($search as $key => $v)
                {
                    //方式一：不排除0
                    // $search[$anid] = $value;
                    
                    //方式二：排除0
                    if ($value == 0)
                    {
                        unset($search[$anid]);
                    }
                    else
                    {
                        $search[$anid] = $value;
                    }
                    
                }    
            }
            else
            {
                
                //方式一：不排除0
                // $search[$anid] = $value;
                
                //方式二：排除0
                if ($value != 0)
                {
                    // 不存在则加入
                    $search[$anid] = $value;
                }
            }
            //更新
            session(['search'=>$search]);
        }
        
        // print_r($search);
        // var_dump(session('search'));
        
        //构造查询数组
        $anids = 0;
        $avids = 0;
        if (is_array($search))
        {
            $anids = array_keys($search);
            $avids = array_values($search);
        }
        
        // print_r($anids);
        // print_r($avids);
        //构造商品列表查询语句
        $construct = DB::table('goods as g')
                 -> select('g.id as gid', 'g.code as gcode', 'g.bid as gbid', 'g.name as gname', 'g.price as gprice', 'g.img as gimg', 'ga.anid', 'ga.avid', 'ga.mavid')
                 -> leftJoin('goods_attr as ga', 'ga.gid', '=', 'g.id')
                 -> where('g.status', 2)
                 -> where('g.cid', $cid);
                 
        //指定属性查询
        if ($search)
        {
            $construct -> where(function ($query) use($search) {
                foreach ($search as $x => $v)
                {
                    $query
                        -> orWhere(function ($q) use($x,$v) {
                            $q -> where('ga.anid', $x)
                               -> where('ga.avid', $v);
                        });
                }
            });
        }
        
        $so = 0;
        //只查有货的商品
        if ($request -> has('so'))
        {
            if ($request -> input('so') == 1)
            {
                session(['so' => 1]);
            }
            else
            {
                session(['so' => 0]);
            }
            
            $so = session('so');
        }
        if (session('so') && session('so') == 1)
        {
            $so = session('so');
            $construct -> where('g.nums', '>', 0);
        }
        // var_dump($so);
        
        $bid = 0;
        //查询品牌
        if ($request -> has('b'))
        {
            $bid = $request -> input('b');
            session(['bid' => $bid]);
        }
        if (session('bid') && session('bid') != 0)
        {
            $bid = session('bid');
            $construct -> where('g.bid', $bid);
        }
        
        $sortprice = 0;
        //商品排序
        if ($request -> has('sortprice'))
        {
            if ($request -> input('sortprice') == 1)
            {
                session(['sortprice' => 1]);
            }
            else
            {
                session(['sortprice' => 0]);
            }
            
            $sortprice = session('sortprice');
        }
        if (session('sortprice'))
        {
            $sortprice = session('sortprice');
            if (session('sortprice') == 1)
            {
                $construct -> orderBy('g.price', 'DESC');
            }
            else
            {
                $construct -> orderBy('g.price', 'ASC');
            }
        }
        else
        {
            $construct -> orderBy('g.price', 'ASC');
        }
        
        // var_dump($sortprice);
        
        $goods = $construct
                -> orderBy('g.update_at', 'DESC')
                -> groupBy('g.id')
                -> paginate(config('app.pageNums'));
        
        // print_r($goods -> all());
        
        
        //品牌
        $brands = DB::table('brand')
                -> select('id', 'name')
                -> where('cid', $cid)
                -> get();
        // dd($brands);
        
        return view('home.search',
                    array_merge([
                        'title' => $title,
                        'goods' => $goods,
                        'brands' => $brands,
                        'attrs' => $attrs,
                        'k' => $k,
                        'so' => $so,
                        'sortprice' => $sortprice,
                        'bid' => $bid,
                        'search' => $search,
                        'request' => $request -> all()
                    ],getData()));
    }
    
    //ajax关键词
    public function ajaxProductWordName(Request $request)
    {
        //分类
        $cate = $request -> input('lenovoWord');
        
        //获取所有的分类
        $prefix = config('database.connections.mysql.prefix');
        $sql = "select * from {$prefix}cate where pid in (select id from {$prefix}cate where pid in (select id from {$prefix}cate)) and name like '%{$cate}%'";
        
        $res = DB::select($sql);
        $data = [];
        foreach ($res as $v)
        {
            $tmp = [];
            $tmp['name'] = $v->name;
            $tmp['search_type'] = 0;
            $tmp['type_id'] = $v->id;
            $tmp['type_pid'] = $v->pid;
            $data[] = $tmp;
        }
        
        $result = ['data' => $data, 'res' => false, 'wd'=>$cate];
        
        return response() -> json($result);
    }
}
