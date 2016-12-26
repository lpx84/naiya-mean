<!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
		<meta name="csrf-token" content="{{csrf_token()}}">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <meta http-equiv="Cache-Control" content="no-transform">
        <meta http-equiv="Cache-Control" content="no-siteapp">
        <title>{{$k}}-奶牙</title>
        <meta name="Keywords" content="{{$k}},价格,图片,奶牙">
        <meta name="Description" content="奶牙Mia.com为您提供{{$k}}，折扣、价格、图片等促销信息。">
        <link rel="stylesheet" type="text/css" href="{{url('/mia/style/newPub.css')}}">
        <link rel="stylesheet" href="{{url('/mia/style/headerFooter.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('/mia/style/main.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('/mia/style/add.css')}}" type="text/css">
        <style>
            #ext-page li{
                display: inline;
            }
            #ext-page li.disabled, 
            #ext-page li.active{
                padding:10px;
            }
        </style>
        <script src="{{url('/mia/js/jquery-1.js')}}" type="text/javascript"></script>
        <script src="{{url('/mia/js/newmiaPub.js')}}" type="text/javascript"></script>
    </head>
    
    <body>
        <div class="header">
			<div class="header-topbar">
                <div class="w1100 clearfix">
                    <div class="l">
                        <a href="{{url('/app')}}" target="_blank" title="手机奶牙" class="m">
                            <i class="mia-icon icon-mobile"></i>手机奶牙</a></div>
                    <!-- 登录前 -->
					@if(session('user.uid'))
                    <div class="r" id="">
                        <span class="welcome">你好，
                            <span id="logined_username">{{ session('user.username') }}</span></span>
                        <em>|</em>
                        <div class="my-mia">
                            <a href="{{asset('/user/index')}}" rel="nofollow">我的奶牙</a>
                            <i class="mia-icon icon-angle-down"></i>
                            <ul>
                                <li>
                                    <a href="{{ url('/user/order') }}" rel="nofollow">我的订单</a></li>
                                <!--<li>
                                    <a href="http://local.naiya.cc/my_getredbag" rel="nofollow">我的红包</a></li>
                                <li>
                                    <a href="http://local.naiya.cc/my_coupon" rel="nofollow">我的代金券</a>
									</li>-->
                                <li>
                                    <a href="{{ url('/user/mybrand') }}" rel="nofollow">我收藏的品牌</a></li>
                                <li>
                                    <a href="{{ url('/user/mygoods') }}" rel="nofollow">我收藏的商品</a></li>
                            </ul>
                        </div>
                        <em>|</em>
                        <a href="{{url('/help')}}" target="_blank">帮助中心</a>
                        <em>|</em>
                        <a href="{{ url('/user/logout') }}">退出</a>
					</div>
                    <!-- 登录后 -->
					@else
                    <div class="r" id="unloginBox">
                        <span class="welcome">你好，欢迎来到奶牙！</span>
                        <a href="{{asset('/user/login')}}" title="点击登录" rel="nofollow">登录</a>
                        <em>|</em>
                        <a href="{{url('/user/register')}}" title="点击注册" rel="nofollow">免费注册</a>
                        <a href="{{url('/help')}}" target="_blank">帮助中心</a>
					</div>
				@endif
                </div>
            </div>
            <div class="header-func w1100 clearfix">
                <a class="l logo" href="/">
                    <img src="{{url('mia/images/c214f662de890a6a0052a02fbc3d53ad.jpg')}}" width="100%" alt=""></a>
                <div class="r">
                    <div class="func-search">
                        <div class="clearfix Nsearch">
                            <input type="text" class="form-search text" id="productWord" placeholder="{{$K or ''}}" data-url="">
                            <input id="searchButton" type="button" value="搜索" class="form-search-btn button">
                            <div class="lenovoWord">
                            </div>
                        </div>
                        <p class="hot">
                            <a href="/s/k/%E9%98%B2%E6%99%92%E9%9C%9C%E5%AE%9D%E5%AE%9D" target="_blank">防晒霜宝宝</a>
                            <a class="h" href="/s/k/%E9%92%99%E7%89%87" target="_blank">钙片</a>
                            <a href="/s/k/%E7%88%BD%E8%82%A4%E6%B0%B4" target="_blank">爽肤水</a>
                            <a href="/s/k/%E5%87%89%E9%9E%8B" target="_blank">凉鞋</a>
                            <a href="/s/k/%E6%9B%BC%E5%93%88%E9%A1%BF" target="_blank">曼哈顿</a>
                            <a class="h" href="/s/k/%E6%A0%B8%E6%A1%83%E6%B2%B9" target="_blank">核桃油</a>
                            <a href="/s/k/%E8%BD%BB%E4%BE%BF%E5%A9%B4%E5%84%BF%E8%BD%A6" target="_blank">轻便婴儿车</a>
                            <a href="/s/k/%E5%A4%8F%E5%87%89%E5%B8%BD" target="_blank">夏凉帽</a>
                            <a href="/s/k/%E8%80%B3%E6%B8%A9%E6%9E%AA" target="_blank">耳温枪</a></p>
                    </div>
                    <div class="func-cart" id="cart_num_box">
                        <a class="cart-item" href="{{url('/user/cart')}}">
                            <span class="mia-icon icon-cart">&#xe80a;
                                <b></b>
                            </span>购物车
							@if(empty(session('user.uid')))
                            <em style="display: none;" id="cart_num">{{ session('user.usergoods') }}</em>
                            <s class="mia-icon icon-angle-up">&#xe803;</s></a>
                        <div class="cart-more" id="shop_cart">
                            <p class="empty">购物车还没有商品，快去选购吧！</p></div>
						@else
							<em style="display: inline-block;" id="cart_num">{{ Session('usergnum') }}</em>
                            <s class="mia-icon icon-angle-up">&#xe803;</s></a>
							<div class="cart-more" id="shop_cart">
								<p class="empty">购物车有未付款的商品，快去看看吧！</p></div>
						@endif
                    </div>
                </div>
            </div>
            <div class="header-nav">
                <div class="w1100">
                    <ul class="navs clearfix">
                        <li class="active">
                            <a href="/">首页</a></li>
                        <li>
                            <a target="_blank" href="/s/k/纸尿裤">纸尿裤</a></li>
                        <li>
                            <a target="_blank" href="/s/k/奶粉">奶粉</a></li>
                        <li class="nav-guarantee ">
                            <a target="_blank" href="{{url('/guarantee')}}">正品保证
                                <i class="mia-icon icon-angle-down">&#xe803;</i></a>
                            <div class="list">
                                <a target="_blank" href="{{url('/guarantee')}}">
                                    <span>正品保证</span></a>
                                <a target="_blank" href="{{url('/help/19')}}">
                                    <span>退货政策</span></a>
                                <a target="_blank" href="{{url('/help')}}">
                                    <span>帮助中心</span></a>
                            </div>
                        </li>
                    </ul>
                    <div class="menus" id="navMenus">
                        <div class="tit">
                            <h3>全部商品分类</h3>
                            <i class="mia-icon icon-down-open-big">&#xe807;</i></div>
                        <div class="dls">
							@foreach($m_data as $d => $a)
                            <dl>
                                <dt>
                                    <div class="inner">
                                        <strong>
                                            <a href="javascript:void(0)">{{$a -> name}}</a></strong>
                                        <p>
											@foreach($m_res2 as $r2 => $s2)
												@if($s2 -> pid == $a -> id)
												@foreach($m_res3 as $r3 => $s3)
													@if($s3 -> pid == $s2 -> id)
													
                                            <a href="{{url('/s/k')}}/{{$s3 -> name}}" target="_blank">{{$s3 -> name}}</a>
													@endif
												@endforeach
												@endif
											@endforeach
                                            
                                            
                                            <i class="mia-icon icon-right-open-big">&#xe806;</i></p>
                                    </div>
                                </dt>
                                <dd>
                                    <div class="colums">
										@foreach($m_res2 as $r2 => $s2)
											@if($s2 -> pid == $a -> id)
                                        <div class="colum">
                                            <h3>{{$s2 -> name}}</h3>
                                            <p>
	
												@foreach($m_res3 as $r3 => $s3)
													@if($s3 -> pid == $s2 -> id)
                                                <a href="{{url('/s/k')}}/{{$s3 -> name}}" target="_blank">{{$s3 -> name}}</a>
													@endif
												@endforeach
												
											
                                            </p>
                                        </div>
											@endif
										@endforeach
                                        
                                    </div>
									@foreach($m_hot as $h => $ot )
									@endforeach
									@if($ot -> c2d == $a -> id)
										
                                    <div class="brands">
                                        <h3>热卖大牌</h3>
                                        <div class="clearfix">
											@foreach($m_hot as $h => $ot )
												@if($a -> id == $ot -> c2d)
                                            <a href="{{url('/s/k')}}/{{$ot -> name}}" target="_blank">
                                                <div class="table">
                                                    <p>
                                                        <img class="lazyload" src="{{url(config('app.brandUrl'))}}/{{$ot -> img}}" alt=""></p>
                                                </div>
                                            </a>
												@endif
                                            @endforeach
                                        </div>
                                    </div>
									@endif
									
                                </dd>
                            </dl>
							@endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
       <style type="text/css"></style>
        <link rel="stylesheet" href="{{url('/mia/style/style.css')}}" type="text/css">
        <style>.icoAr,.listsoldout { display:none;}</style>
        <script type="text/javascript">
            $(function() {

                var suanwidth = function(obj) {
                    var allwidth = 0;
                    obj.each(function(index, element) {
                        var width = parseInt($(this).outerWidth()) + 5;
                        allwidth += width;
                    });
                    return allwidth;
                }

                $('.screening .kcon').each(function(index, element) {
                    var $this = $(this),
                    $span = $this.find('a'),
                    allwidth = suanwidth($span);
                    if (allwidth > 840) {
                        $(this).prev('.smore').show();
                    } else {
                        $(this).prev('.smore').hide();
                        $(this).css({
                            width: '897px',
                            display: 'block'
                        });
                    }
                    /*$span.click(function(){//点击刷新

var $curName = $(this).attr('name');
if($curName == '1'){
$('.screening .kcon:eq(' + index + ') a').removeClass('current').removeAttr('name');
}else{
$('.screening .kcon:eq(' + index + ') a').removeClass('current').removeAttr('name');
$(this).addClass('current').attr({name:'1'});
}

});*/
                });
                /*$('.kcon a').hover(
function(){
$(this).addClass('hovercur');
},
function(){
$(this).removeClass('hovercur');
}
);*/
                $('.selector div.smore').click(function() {
                    var myclass = $(this).attr('class'),
                    num = $('.selector div.smore').index(this);
                    if ($.trim(myclass) == 'smore') {
                        $('.selector').eq(num).css({
                            height: 'auto',
                            overflow: 'none'
                        });
                        $(this).addClass('more2');
                    } else {
                        $('.selector').eq(num).css({
                            height: '23px',
                            overflow: 'hidden'
                        });
                        $(this).removeClass('more2');
                    }
                });
                var b = $('.bmtitle');
                $('.bmtitle span').bind('mouseenter',
                function() {
                    $(this).parent().find('span.listhover').removeClass('listhover');
                    $(this).addClass('listhover');
                });
                $('.bmtitle span').bind('mouseleave',
                function() {
                    if (!$(this).hasClass('current')) $(this).removeClass('listhover');
                });

                $('.bmtitle span').click(function(e) {
                    e.preventDefault();
                    var url = ($(this).attr('dhref'));
                    if ('' != url) {
                        window.location.href = url;
                    }
                });

                $('.showSoldOut').click(function() {
                    /*var s = 0;
if($(this).attr('checked')){
s = 1;
}*/
                    window.location.href = $(this).attr('dhref');
                });
            });</script>
        <!--/.mainNav-->
        <div class="warp">
            <div class="content detail ">
                <div class="w1004">
                    <div class="crumbs">全部结果 &gt; "{{$k}}"</div>
                    <div class="screening clearfix jsspec">
                        <!-- start spec -->
                        <div class="selector clearfix" style="">
                            <div class="key">品牌：</div>
                            <div class="contenter">
                                <div class="smore "></div>
                                <div class="kcon k0">
                                    <a class="{{$bid==0 ? 'current' : ''}}" href="/s/k/{{urlencode($k)}}?b=0" title="全部品牌">全部品牌</a>
                                    @foreach($brands as $value)
                                    <a href="/s/k/{{$k}}?b={{$value->id}}" class="{{$value->id==$bid ? 'current' : ''}}" title="{{$value->name}}">{{$value->name}}</a>
                                    @endforeach
                                    </div>
                            </div>
                        </div>
                        <div class="sline"></div>
                        @foreach($attrs as $v)
                        <div class="selector clearfix" style="">
                            <div class="key" data-value="{{$v['anid']}}">{{$v['name']}}：</div>
                            <div class="contenter">
                                <div class="smore "></div>
                                <div class="kcon k2">
                                    <a class="{{!isset($search[$v['anid']]) || $search[$v['anid']]==0 ? 'current k2' : ''}}" href="/s/k/{{urlencode($k)}}?anid={{$v['anid']}}&value=0" title="全部">全部</a>
                                    
                                    @if(!empty($v['sub']))
                                    @foreach($v['sub'] as $key=>$value)
                                    
                                    <a href="/s/k/{{urlencode($k)}}?anid={{$v['anid']}}&value={{$value['avid']}}" title="{{$value['value']}}" class="{{isset($search[$v['anid']]) && $search[$v['anid']]==$value['avid'] ? 'current k2' : ''}}">{{$value['value']}}</a>
                                    @endforeach
                                    @endif
                                    <?php 
                                    /*
                                    @if(!empty($v['extSub']))
                                    @foreach($v['extSub'] as $key=>$value)
                                    <a href="/s/k/{{urlencode($k)}}?anid={{$v['anid']}}&mavValue={{$value['mavid']}}" title="{{$value['mavValue']}}" class="{{isset($search[$v['anid']]) && $search[$v['anid']]==$value['mavid'] ? 'current k2' : ''}}">{{$value['mavValue']}}</a>
                                    @endforeach
                                    @endif
                                    */
                                    ?>
                                    </div>
                            </div>
                        </div>
                        <div class="sline"></div>
                        @endforeach
                        <!-- end spec -->
                    </div>
                    <div class="reputation clearfix bmod channelList" style="padding-top:0px;">
                        <!--主题状态-->
                        <!--默认状态-->
                        <div class="content clearfix">
                            <a name="mainList" class="maoDian">&nbsp;</a>
                            <div class="right l">
                                <div class="opic"></div>
                                <div class="bmtitle">
                                    <div class="r" style="line-height:32px;">
                                        <!--<span class="bdjs">剩余:<span id="counter"></span></span> -->共计
                                        <em class="pink">{{$goods -> total()}}</em>个商品</div>
                                    <div class="l">排序：
                                        <!--span dhref="/s/k/{{$k}}&amp;order=normal" class="current">
                                            <em>人气</em></span>
                                        <span dhref="/s/k/{{$k}}&amp;order=sales">
                                            <em style="padding-right:15px;">销量</em></span-->
                                        <span class="{{isset($sortprice) && $sortprice==1 ? 'current' : ''}}" dhref="/s/k/{{$k}}?sortprice={{intval(!$sortprice)}}">
                                            <em style="padding-right:15px;" >价格</em></span>
                                        <label>
                                            <em>
                                                <input dhref="/s/k/{{$k}}?so={{intval(!$so)}}" {{isset($so) && $so==1 ? 'checked="checked"' : ''}} class="showSoldOut wTG" type="checkbox">只显示有货商品</em></label>
                                    </div>
                                </div>
                                <div class="Lcon content clearfix">
                                    @foreach($goods as $k => $v)
                                    <div class="block" style="{{($k+1)%4==0? 'margin-right:0' :''}}" id="item_{{$v->gcode}}" data-sku="{{$v->gcode}}">
                                        <div class="mark_wrap_x46">
                                            <span class="mark_item mark_text mark_jian">减</span>
                                            <!--span class="mark_item mark_dutyfree"></span-->
                                        </div>
                                        <div class="mark_custom_120" data-url="http://file04.miabaobei.com/"></div>
                                        <div class="icoAr" style="display: block;">
                                            <!-- <div class="actIcoOff">满赠</div> --></div>
                                        <div class="listsoldout pos"></div>
                                        <a href="{{url('/goods/'.$v->gid)}}" title="{{$v->gname}}" target="_blank">
                                            <img src="{{url(config('app.goodsUrl').$v->gimg)}}" alt="{{$v->gname}}" height="232" width="232"></a>
                                        <div class="bmfo" id="item_k_{{$v->gcode}}">
                                            <p>
                                                <!--span class="pink tahoma" id="discount_{{$v->gcode}}">6.9折/</span-->
                                                <a href="{{$v->gcode}}" target="_blank" title="{{$v->gname}}">{{$v->gname}}</a></p>
                                            <div class="saled">
                                                <span class="r">
                                                    <!--已售:12457--></span>
                                                <div class="l">
                                                    <em class="pink">¥</em>
                                                    <span class="Tahoma f20 pink" bid="{{$v->gcode}}" id="sale_price_{{$v->gcode}}">{{$v->gprice}}</span>
                                                    <span class="originalPrice">¥{{round($v->gprice*1.1,2)}}</span></div>
                                            </div>
                                        </div>
                                        <!--div class="suit_jt">
                                            <dl>
                                                <dt>
                                                    <span>
                                                        <em>￥25</em></span>/件</dt>
                                                <dd>
                                                    <em>2</em>件装</dd></dl>
                                        </div-->
                                    </div>
                                    @endforeach
                                </div>
                                <div id="ext-page" class="Lpage page tr">
                                    {!! $goods->appends($request)->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.warper-->
        <script type="text/javascript">
            $(function() {
                $('.jsspec a').click(function(e) {
                    var ts = $(this);
                    if (ts.hasClass('current')) {
                        e.preventDefault();
                        var s = ts.parent().find('a').eq(0).attr('href');
                        window.location.href = s;
                    }
                });

            });

            var BRANDlove = "";

            function addMine(obj, b) {

                var act = BRANDlove == 1 ? 'ajaxRmMine': 'ajaxAddMine';
                $.ajax({
                    'url': '/instant/brand/' + act + '/',
                    'dataType': 'json',
                    'type': 'post',
                    data: {
                        brand_id: b
                    },
                    success: function(c) {
                        if (c.res == false) {
                            if (c.data == "haved") {
                                return false;
                            } else {
                                if (c.data == "not_login") {
                                    alert("请登录后添加喜欢的品牌！");
                                    var g = encodeURIComponent(window.location.href);
                                    window.location.href = "/login?url=" + g;
                                }
                            }
                        } else if (c.res == true) {
                            var p = obj.parent();
                            var s = p.find('span').eq(1);
                            var num = parseInt(s.attr('num'));

                            if (act == 'ajaxRmMine') {
                                BRANDlove = 0;
                                obj.attr('src', obj.attr('pre_src') + 'gz.gif');
                                s.attr('num', num - 1);
                                s.text((num - 1) + ' 人收藏该品牌');
                            } else {
                                BRANDlove = 1;
                                obj.attr('src', obj.attr('pre_src') + 'qx.gif');
                                s.attr('num', num + 1);
                                s.text((num + 1) + ' 人收藏该品牌');

                            }

                        }
                    }
                });

            }

            ﻿ //window["_BFD"] = window["_BFD"] || {};
            //    _BFD.BFD_INFO = {
            //        "search_word" : "{{$k}}",   //搜索词
            //    //        "search_result" : "1",
            //                
            //        "page_type" : "search" //当前页面全称，请勿修改
            //    };
            var google_tag_params = {
                //BFD商品页参数开始
                bfd_sid: getcookie('sid'),
                bfd_search_word: "{{$k}}",
                bfd_search_result: "1",
                bfd_page_type: "search",
            };</script>
        <div class="Nfooter">
            <div class="Genuine">
                <div class="w1100">
                    <a href="http://local.naiya.cc/guarantee" rel="nofollow" target="_blank">
                        <i class="icon-g1"></i>
                        <b>可信赖</b>进口母婴特卖</a>
                    <a href="http://local.naiya.cc/guarantee#area3" rel="nofollow" target="_blank">
                        <i class="icon-g2"></i>
                        <b>无忧</b>正品保证</a>
                    <a href="http://local.naiya.cc/guarantee#area7" rel="nofollow" target="_blank">
                        <i class="icon-g3"></i>
                        <b>14天</b>无理由退货</a>
                    <a href="http://local.naiya.cc/guarantee#area6" rel="nofollow" target="_blank">
                        <i class="icon-g4"></i>
                        <b>恒温仓</b>完善的货物仓储</a>
                    <a href="http://local.naiya.cc/guarantee#area5" rel="nofollow" target="_blank">
                        <i class="icon-g5"></i>
                        <b>24小时</b>快速发货</a>
                    <a href="http://local.naiya.cc/guarantee#area8" rel="nofollow" target="_blank">
                        <i class="icon-g6"></i>
                        <b>100万</b>妈妈口碑信赖</a>
                </div>
            </div>
            <div class="Nhelp">
                <div class="w1000 clearfix">
                    <div class="r" style="margin-right: 40px;">
                        <ul class="EWM">
                            <li class="strong">关注奶牙</li>
                            <li>
                                <img src="{{url('/mia/images/index_fd_sj.gif')}}" alt="手机奶牙">
                                <div class="right">
                                    <a href="http://weibo.com/miabaobei2014" target="_blank">
                                        <img src="{{url('/mia/images/index_fd_wb.gif')}}" alt="官方微博"></a>
                                    <div class="PubBtnHover">
                                        <img src="{{url('/mia/images/index_fd_wx.gif')}}" alt="官方微信">
                                        <img src="{{url('/mia/images/index_fd_wx_more.gif')}}" class="wxmore" alt=""></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="l" style="margin-left:15px;">
                        <ul>
                            <li class="strong">使用帮助</li>
                            <li>
                                <a href="http://local.naiya.cc/help-9.html" rel="nofollow">会员等级</a></li>
                            <li>
                                <a href="http://local.naiya.cc/help-10.html" rel="nofollow">会员积分</a></li>
                            <li>
                                <a href="http://local.naiya.cc/help-147.html" rel="nofollow">常见问题</a></li>
                            <li>
                                <a href="http://local.naiya.cc/help.html" rel="nofollow">帮助中心</a></li>
                        </ul>
                        <ul>
                            <li class="strong">支付方式</li>
                            <li>
                                <a href="http://local.naiya.cc/help-11.html" rel="nofollow">在线支付</a></li>
                            <li>
                                <a href="http://local.naiya.cc/help-13.html" rel="nofollow">代金券支付</a></li>
                        </ul>
                        <ul>
                            <li class="strong">配送方式</li>
                            <li>
                                <a href="http://local.naiya.cc/help-15.html" rel="nofollow">包邮政策</a></li>
                            <li>
                                <a href="http://local.naiya.cc/help-16.html" rel="nofollow">配送说明</a></li>
                            <li>
                                <a href="http://local.naiya.cc/help-17.html" rel="nofollow">发货时间</a></li>
                            <li>
                                <a href="http://local.naiya.cc/help-20.html" rel="nofollow">验货签收</a></li>
                        </ul>
                        <ul>
                            <li class="strong">售后服务</li>
                            <li>
                                <a href="http://local.naiya.cc/help-21.html" rel="nofollow">正品承诺</a></li>
                            <li>
                                <a href="http://local.naiya.cc/help-22.html" rel="nofollow">售后咨询</a></li>
                            <li>
                                <a href="http://local.naiya.cc/help-22.html" rel="nofollow">退货政策</a></li>
                            <li>
                                <a href="http://local.naiya.cc/help-23.html" rel="nofollow">退货流程</a></li>
                            <li>
                                <a href="http://local.naiya.cc/help-24.html" rel="nofollow">退款方式</a></li>
                        </ul>
                        <ul class="NContact" style="width:196px;">
                            <li class="strong">联系方式</li>
                            <li>总裁邮箱 ceo@mia.com</li>
                            <li>商务合作 bd@mia.com</li>
                            <li>媒体合作 pr@mia.com</li>
                            <li>采购中心 cx@mia.com</li>
                            <li>企业采购 qiye@mia.com</li></ul>
                    </div>
                </div>
            </div>
            <div class="Nlink">
                <div class="w1000">
                    <p>
                        <a href="http://local.naiya.cc/help-34.html" rel="nofollow">关于奶牙</a>|
                        <a href="http://local.naiya.cc/help-43.html" rel="nofollow">加入奶牙</a>|
                        <a href="http://local.naiya.cc/help-42.html" rel="nofollow">商务合作</a>|
                        <a href="http://local.naiya.cc/help.html" rel="nofollow">帮助中心</a>|
                        <a href="http://local.naiya.cc/help-44.html" rel="nofollow">联系我们</a>|
                        <a href="http://local.naiya.cc/links.html" target="_blank">友情链接</a>|
                        <a href="javascript:void(0)" id="backToMobile" target="_blank" rel="nofollow" data-domain="mia.com">触屏版</a>|
                        <a href="http://local.naiya.cc/media.html" target="_blank" rel="nofollow">媒体报道</a>|
                        <a href="http://www.mmjihua.com/" rel="nofollow">妈米计划</a></p>京公网安备：11010502027270 | 营业执照：91110105585582599307U | 食品流通许可证：SP1101051410296669 | 京ICP证140430号 | 京ICP备14006215号
                    <br>Copyright © 2016 北京花旺在线商贸有限公司 Mia.com 保留一切权利。 客服热线： 400-789-2000
                    <br>
                    <!--地址：北京市朝阳区朝外大街10号（A1区）7层704单元 &emsp;&emsp;&emsp;电话：010-56733456-->
                    <p class="cert">
                        <a target="_blank" href="http://www.ectrustprc.org.cn/certificate.id/certificateb.php?id=20035358">
                            <img src="{{url('/mia/images/bluelogo.gif')}}" width="105" border="0"></a>
                        <span style="display:inline-block;position:relative;width:auto;">
                            <a style="display:inline-block;" kx_type="图标式" target="_blank" tabindex="-1" id="kx_verify" href="https://ss.knet.cn/verifyseal.dll?sn=e1410211101055522320bq000000&amp;ct=df&amp;a=1&amp;pa=0.9654322788119316">
                                <img alt="可信网站" oncontextmenu="return false;" style="border:none;" src="{{url('/mia/images/cnnic.png')}}" width="80"></a>
                        </span>
                        <a id="___szfw_logo___" href="https://credit.szfw.org/CX20151203012507100435.html" target="_blank">
                            <img src="{{url('/mia/images/chengxin.jpg')}}" border="0"></a>
                        <img src="{{url('/mia/images/alipay.jpg')}}" width="105"></p>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{url('/mia/js/footer.js')}}"></script>
        <div class="sideBar leftSide " style="display: none;">
            <img src="{{url('/mia/images/c28f17d15a13149cfa89f18dc32efb87.png')}}"></div>
        <div class="sideBar rightSide " style="display: none;">
            <div class="list">
                <ul>
                    <li class="side-cart">
                        <a href="{{url('/user/cart')}}">
                            <i class="mia-icon icon-cart"></i>购物车</a></li>
                    <li class="side-mia service_mia_0">
                        <i class="mia-icon icon-zixun"></i>咨询</li>
                    <li class="side-tel">
                        <i class="mia-icon icon-tel"></i>客服
                        <div class="item-float item-tel">400-789-2000</div></li>
                    <li class="side-app">
                        <i class="mia-icon icon-wx"></i>微信
                        <div class="item-float item-app"></div></li>
                </ul>
                <div class="side-top">
                    <i>
                    </i>
                </div>
            </div>
        </div>
    </body>

</html>