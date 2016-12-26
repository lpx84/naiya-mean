@section('title',$title)
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
		<meta name="csrf-token" content="{{csrf_token()}}">
        <meta name="Keywords" content="奶牙,母婴商城,进口母婴,纸尿裤,奶粉,辅食,母婴用品,儿童玩具,童装,童鞋,母婴特卖" />
        <meta name="Description" content="奶牙专业进口母婴特卖商城，为亿万中国妈妈提供进口奶粉、纸尿裤、儿童玩具、服饰等品牌母婴用品。100%正品，安全放心，让您享受轻松愉悦的 网上购物体验！" />
		@yield('meta')
        <link rel="stylesheet" type="text/css" href="{{url('mia/style/newPub.css')}}">
        <link rel="stylesheet" href="{{url('mia/style/headerFooter.css')}}" type="text/css">
        <script src="{{url('mia/js/jquery-1.js')}}" type="text/javascript"></script>
        <script src="{{url('mia/js/newmiaPub.js')}}" type="text/javascript"></script>
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
                    <div class="menus menus-home" id="navMenus">
                        <div class="tit">
                            <h3>全部商品分类</h3>
                            <i class="mia-icon icon-down-open-big">&#xe807;</i></div>
                        <div class="dls">
							@foreach($data as $d => $a)
                            <dl>
                                <dt>
                                    <div class="inner">
                                        <strong>
                                            <a href="javascript:void(0)">{{$a -> name}}</a></strong>
                                        <p>
											@foreach($res2 as $r2 => $s2)
												@if($s2 -> pid == $a -> id)
												@foreach($res3 as $r3 => $s3)
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
										@foreach($res2 as $r2 => $s2)
											@if($s2 -> pid == $a -> id)
                                        <div class="colum">
                                            <h3>{{$s2 -> name}}</h3>
                                            <p>
	
												@foreach($res3 as $r3 => $s3)
													@if($s3 -> pid == $s2 -> id)
                                                <a href="{{url('/s/k')}}/{{$s3 -> name}}" target="_blank">{{$s3 -> name}}</a>
													@endif
												@endforeach
												
											
                                            </p>
                                        </div>
											@endif
										@endforeach
                                        
                                    </div>
									@foreach($hot as $h => $ot )
									@endforeach
									@if($ot -> c2d == $a -> id)
										
                                    <div class="brands">
                                        <h3>热卖大牌</h3>
                                        <div class="clearfix">
											@foreach($hot as $h => $ot )
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
        <style>/*! compiled by gulp-sass */ @charset "UTF-8";.mod-qhh .btn:hover,.mod-qqcm .btn:hover{background:#f9197f} .index-outlet .layout,.mod-col-1-7 .layout,.mod-qhh .layout,.mod-qqcm .layout{margin-top:20px} .price{font-family:'\5FAE\8F6F\96C5\9ED1',Arial} .price .new{color:#fa4b9b} .price .old{text-decoration:line-through;color:#999} .gds-img img{width:100%} .gds-img img:hover{opacity:.88;filter:alpha(opacity=88)} body{font:14px/1.5 Tahoma,Arial,"Hiragino Sans GB","微软雅黑",sans-serif} .w1100{margin:0 auto;width:1100px} .mainSlide{height:480px;position:relative;background:#fff url({{url('mia/images/loading.gif')}}) no-repeat center center} .mainSlide .cell{position:absolute;top:0;left:0;width:100%;z-index:1;display:none;height:480px} .mainSlide .cell .w1100{height:480px;position:relative;top:-480px;z-index:2} .mainSlide .cur{display:block;z-index:3} .mainSlide .cell .prom{background-position:center;background-repeat:no-repeat;height:480px;width:100%;text-align:center;position:relative} .mainSlide .cell .promLink{width:1000px;height:480px;display:block} .mainSlide .slideNumBox{position:absolute;bottom:15px;left:50%;margin-left:-550px;width:1100px;text-align:right;z-index:10} .mainSlide .slideNum{-webkit-border-radius:20px;-moz-border-radius:20px;-ms-border-radius:20px;border-radius:20px;display:inline-block;vertical-align:middle;*display:inline;*zoom:1;background-color:rgba(255,255,255,.2);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#33FFFFFF, endColorstr=#33FFFFFF);height:16px;padding:4px 9px;z-index:6;line-height:1} :root .mainSlide .slideNum{filter:none} .mainSlide .slideNum i{-webkit-border-radius:50%;-moz-border-radius:50%;-ms-border-radius:50%;border-radius:50%;display:inline-block;vertical-align:middle;*display:inline;*zoom:1;margin:0 3px;width:10px;height:10px;font-size:0;line-height:0;cursor:pointer;background-color:#fff} .mainSlide .slideNum .cur{background-color:#fa4b9b} .mainSlide .leftAr:link,.mainSlide .rightAr:link{display:none;position:absolute;top:50%;width:33px;height:54px;margin-top:-27px;cursor:pointer;background:url({{url('mia/images/index_j_btn.png')}}) no-repeat;z-index:4} .mainSlide .leftAr:link{left:0} .mainSlide .rightAr:link{right:0;background-position:right 0} .promSeciton{position:relative;margin-top:-97px;z-index:4} .mainSlide .arNav{position:absolute;top:0;left:50%;width:1100px;margin-left:-550px;z-index:4;height:100%} .mainSlide .arNav .w1004{position:relative;margin:0 auto;width:1100px;height:100%} .mainSlide .cell .singlePd{width:415px;height:192px;padding:18px 20px 20px 20px;position:absolute;top:20px;right:0;background-color:rgba(255,255,255,.3);border-radius:3px} .mainSlide .cell .singlePd .tim{margin-bottom:15px;color:#666;font-size:14px} .mainSlide .cell .singlePd .tt{font-size:18px;font-family:'Microsoft Yahei';line-height:26px;color:#010101} .mainSlide .cell .singlePd .price{color:#f34fa1;font-size:32px;font-family:Arial;position:absolute;left:20px;bottom:12px} .mainSlide .cell .price .y{color:#f34fa1;font-size:32px} .mainSlide .cell .price .mp{color:#999;font-size:14px;text-decoration:line-through} .mainSlide .cell .price .mp .y{color:#999;font-size:14px;text-decoration:none} .mainSlide .cell .singlePd .num{color:#999;font-size:14px;font-family:Arial;position:absolute;right:20px;bottom:12px} .index-brand{margin:10px 0 0 240px;width:860px;height:105px;background:#fff} .index-brand>*{display:inline-block;vertical-align:middle;*display:inline;*zoom:1} .index-brand h3{padding:0 27px;zoom:1;font-size:14px;color:#444} .index-brand .brands img{margin:0 12px;width:94px} .index-brand i{width:1px;height:100%;zoom:1} .mod-col-3-3{margin:17px -20px 0 0;width:1120px} .mod-col-3-3>a{float:left;width:360px;height:168px;margin-right:10px;overflow:hidden;background-color:#f0f0f0} .mod-col-3-3>a img{width:100%;vertical-align:top} .mod-col-2-2{margin:10px -20px 0 0;width:1120px} .mod-col-2-2>a{float:left;width:545px;height:254px;margin-right:10px;overflow:hidden;background-color:#f0f0f0} .mod-col-2-2>a img{width:100%;vertical-align:top} .mod-h3{font-size:24px;color:#222} .mod-h3 span{margin-left:18px;vertical-align:-1px;font-weight:400;font-size:18px;color:#999} .mod-qhh,.mod-qqcm{margin-top:25px} .mod-qhh .layout>a,.mod-qqcm .layout>a{float:left;margin-right:-1px;width:219px;border:1px solid #e5e5e5;background-color:#fff;margin-top:-1px} .mod-qhh .layout>a:hover .tit,.mod-qqcm .layout>a:hover .tit{color:#fa4b9b} .mod-qhh .rim,.mod-qqcm .rim{position:relative;padding:15px} .mod-qhh .gds-img,.mod-qqcm .gds-img{position:relative} .mod-qhh .tit,.mod-qqcm .tit{white-space:nowrap;text-overflow:ellipsis;overflow:hidden;color:#222;font-size:12px;font-weight:700} .mod-qhh .tit img,.mod-qqcm .tit img{margin-right:7px;vertical-align:-1px} .mod-qhh .tit.has-nodesc,.mod-qqcm .tit.has-nodesc{white-space:normal;position:relative;line-height:1.5em;height:3em;overflow:hidden} .mod-qhh .desc,.mod-qqcm .desc{font-size:12px;color:#555} .mod-qhh .price,.mod-qqcm .price{line-height:1.2;margin-top:8px} .mod-qhh .new,.mod-qqcm .new{font-size:14px} .mod-qhh .new em,.mod-qqcm .new em{font-size:20px} .mod-qhh .old,.mod-qqcm .old{font-size:12px} .mod-qhh .buy,.mod-qqcm .buy{font-size:12px;color:#666} .mod-qhh .btn,.mod-qqcm .btn{-webkit-border-radius:15px;-moz-border-radius:15px;-ms-border-radius:15px;border-radius:15px;position:absolute;right:15px;bottom:18px;padding:0 15px;height:28px;line-height:28px;background-color:#fa4b9b;font-size:12px;color:#fff} .mod-qqcm .rim{padding:15px 15px 10px 15px} .mod-qqcm .desc{margin-top:2px;color:#fa4b9b} .mod-qqcm .price span{display:block} .mod-qqcm .btn{bottom:12px} .mod-col-1-7{margin-top:25px} .mod-col-1-7 .layout>a{float:left;width:275px;height:170px;overflow:hidden} .mod-col-1-7 .layout>a img{width:100%} .mod-col-1-7 .layout>a.first{width:275px;height:340px} .mark-qfl{position:absolute;top:10px;left:8px;width:70px;height:30px;overflow:hidden;background:url({{url('mia/images/8ef13b2c0f24cc47f6078ae9c46a3a56.png')}}) no-repeat;font-size:0;text-indent:-999em;color:#fd3e62;display:none} .index-outlet{margin-top:25px} .index-outlet .block{*zoom:1;margin-bottom:15px;padding:6px 0;border:1px solid #e5e5e5;background-color:#fff} .index-outlet .block:after,.index-outlet .block:before{content:"";display:table} .index-outlet .block:after{clear:both;overflow:hidden} .index-outlet .bigban{position:relative;float:left;margin-left:6px;width:750px;height:350px;overflow:hidden;background:#f0f0f0} .index-outlet .bigban i{position:absolute;top:14px;right:0;width:0;height:0;border-top:10px solid transparent;border-right:12px solid #fff;border-bottom:10px solid transparent} .index-outlet .rank{float:right;padding:0 18px;width:306px;height:350px;overflow:hidden} .index-outlet .rank>a{*zoom:1;display:block;margin-top:-1px;padding:18px 15px;border-top:1px dashed #c4c4c4;cursor:pointer} .index-outlet .rank>a:after,.index-outlet .rank>a:before{content:"";display:table} .index-outlet .rank>a:after{clear:both;overflow:hidden} .index-outlet .rank .l{position:relative;float:left;margin-right:12px;width:78px;height:78px;border:1px
            solid #efefef;overflow:hidden} .index-outlet .rank .l i{position:absolute;top:0;left:0;width:45px;height:18px;line-height:18px;background:url({{url('mia/images/e99fc1aca9854637d941aba2dc58c28c.png')}});font-size:11px;color:#fff;font-family:Verdana,Geneva,sans-serif} .index-outlet .rank .l i.r1{background-position:0 0} .index-outlet .rank .l i.r2{background-position:0 -20px} .index-outlet .rank .l i.r3{background-position:0 -40px} .index-outlet .rank .r{float:none;display:block;overflow:hidden;font-size:13px} .index-outlet .rank .tit{margin-top:5px;height:38px;overflow:hidden} .index-outlet .rank .price{margin-top:15px;line-height:1} .index-outlet .rank .price .new{margin-right:5px;font-size:14px} .index-outlet .rank .price .new em{font-size:18px} .index-outlet .rank .price .old{font-size:12px} /*备案信息*/ /*备案信息*/ .record{background: url({{url('mia/images/71e0be0874270b883d358a16974a4d3c.jpg')}}) no-repeat center center;height: 155px;width: 1100px;margin-bottom: 40px;font-size: 16px;text-align: center;color:#666;padding-top:35px; }</style>
        <div class="index-focus">
            <div class="mainSlide" id="mainSlide">
                <div id="topslide">
                    <div class="cell cur">
                        <div class="prom" style="background-image:url({{url('mia/images/e1195891a68f22c4d05a25a3bcc7bf58536828521.jpg')}});"></div>
                        <div class="w1100">
                            <a target="_blank" href="/" id="__AD_focus0" title="" class="promLink" data-ref="0"></a>
                        </div>
                    </div>
                    <div class="cell ">
                        <div class="prom" style="background-image:url({{url('mia/images/b00660c45d94903aa2fd86a43f10cfaa925875269.jpg')}});"></div>
                        <div class="w1100">
                            <a target="_blank" href="/" id="__AD_focus0" title="" class="promLink" data-ref="0"></a>
                        </div>
                    </div>
                    <div class="cell ">
                        <div class="prom" style="background-image:url({{url('mia/images/935de8790c8231226a2041adae9ce259474317203.jpg')}});"></div>
                        <div class="w1100">
                            <a target="_blank" href="/" id="__AD_focus0" title="" class="promLink" data-ref="0"></a>
                        </div>
                    </div>
                    <div class="cell ">
                        <div class="prom" style="background-image:url({{url('mia/images/f218c1355cd494b0384f5b2f5a9d88ef476879722.jpg')}});"></div>
                        <div class="w1100">
                            <a target="_blank" href="/" id="__AD_focus0" title="" class="promLink" data-ref="0"></a>
                        </div>
                    </div>
                    <div class="cell ">
                        <div class="prom" style="background-image:url({{url('mia/images/25519010e136aab2c0133c9707671dee479616604.jpg')}});"></div>
                        <div class="w1100">
                            <a target="_blank" href="/" id="__AD_focus0" title="" class="promLink" data-ref="0"></a>
                        </div>
                    </div>
                    <div class="cell ">
                        <div class="prom" style="background-image:url({{url('mia/images/0b7c1145bad73db9f32063086e61a3bd583157626.jpg')}});"></div>
                        <div class="w1100">
                            <a target="_blank" href="/" id="__AD_focus0" title="" class="promLink" data-ref="0"></a>
                        </div>
                    </div>
                </div>
                <div class="slideNumBox">
                    <span class="slideNum" id="slideNum">
                        <i class="cur"></i>
                        <i>
                        </i>
                        <i>
                        </i>
                        <i>
                        </i>
                        <i>
                        </i>
                        <i>
                        </i>
                    </span>
                </div>
            </div>
        </div>
        <div class="w1100">
            <div class="index-brand">
                <h3>热卖品牌</h3>
                <div class="brands">
					@foreach($sale as $sa => $le)
                    <a href="{{url('/s/k')}}/{{$le -> name}}" target="_blank" title="">
                        <img src="{{url(config('app.brandUrl'))}}/{{$le -> img}}" alt=""></a>
					@endforeach
                    
                </div>
                <i>
                </i>
            </div>
			@if($recomm)
            <div class="mod-col-5-5 mod-qhh" style="">
                <h3 class="mod-h3">为你推荐
                    <span>千万妈妈 精明之选</span></h3>
                <div class="layout clearfix">
					@foreach($recomm as $re => $mm)
                    <a href="{{url('goods')}}/{{$mm -> id}}" target="_blank" >
                        <div class="gds-img">
                            <img src="{{url(config('app.goodsUrl'))}}/{{$mm -> img}}" onclick="this.src='{{url(config('app.goodsUrl'))}}/{{$mm -> img}}'" alt="{{$mm -> name}}" width="240" height="220">
                            <i class="mia-icon mark-qfl"></i></div>
                        <div class="rim">
                            <div class="tit has-nodesc">
                               {{$mm -> name}}</div>
                            <p class="desc"></p>
                            <div class="price">
                                <span class="new">¥
                                    <em>{{$mm -> price}}</em></span>
                                <span class="old">¥
                                    <em>{{$mm -> price + ($mm -> price)*0.2}}</em></span>
                            </div>
                            <p class="buy">{{$mm -> nums}}人已购买</p>
                            <span class="btn">立即抢</span></div>
                    </a>
                    @endforeach
                    
                </div>
            </div>
			@endif
			@if($sell)
            <div class="index-outlet">
                <h3 class="mod-h3">今日特卖
                    <span>每天10点上新</span></h3>
                <div class="layout">
					@foreach($sell as $rec => $om)
                    <div class="block">
                        <a class="bigban" href="{{url('/goods')}}/{{$om -> id}}" target="_blank" title="{{$om -> name}}" >
                            <img class="lazyload" src="{{url(config('app.goodsUrl'))}}/{{$om -> img}}" style="width:320px;height:240px;margin-top:50px;margin-left:40px;"   class="lazyload" alt="{{$om -> name}}">
							<img class="lazyload" src="{{url(config('app.goodsUrl'))}}/{{$om -> img}}" style="width:320px;height:240px;margin-top:50px;"   class="lazyload" alt="{{$om -> name}}">
                            <i>
                            </i>
                        </a>
						
                        <div class="rank">
							@foreach($top as $s => $l)
								@if($om -> cid == $l -> cid)
                            <a href="{{url('/goods')}}/{{$l -> id}}" target="_blank">
                                <div class="l gds-img">
                                    <img class="lazyload" src="{{url(config('app.goodsUrl'))}}/{{$l -> img}}" >
                                    <i class="r1"></i>
                                </div>
                                <div class="r">
                                    <p class="tit">{{$l -> name}}</p>
                                    <div class="price">
                                        <span class="new">¥
                                            <em>{{$l -> price}}</em></span>
                                        <span class="old">¥
                                            <em>{{$l -> price + ($l -> price)*0.98}}</em></span>
                                    </div>
                                </div>
                            </a>
								@endif
							@endforeach
                           
                        </div>
                    </div>
					@endforeach

                </div>
            </div>
			@endif
            <!-- 备案信息 start-->
            <div class="record">
                <p>公司名称：北京花旺在线商贸有限公司</p>
                <p>公司地址：北京市朝阳区太阳宫中路8号冠捷大厦15层</p>
                <p>公司电话：010-56733456</p>
                <p>社会信用代码：91110105582599307U</p>
                <p>食品经营许可证：SP1101051410296669</p>
            </div>
            <!-- 备案信息 end--></div>
        </div>
        <div class="Nfooter">
            <div class="Genuine">
                <div class="w1100">
                    <a href="{{url('/guarantee')}}" rel="nofollow" target="_blank">
                        <i class="icon-g1"></i>
                        <b>可信赖</b>进口母婴特卖</a>
                    <a href="{{url('/guarantee#area3')}}" rel="nofollow" target="_blank">
                        <i class="icon-g2"></i>
                        <b>无忧</b>正品保证</a>
                    <a href="{{url('/guarantee#area7')}}" rel="nofollow" target="_blank">
                        <i class="icon-g3"></i>
                        <b>14天</b>无理由退货</a>
                    <a href="{{url('/guarantee#area6')}}" rel="nofollow" target="_blank">
                        <i class="icon-g4"></i>
                        <b>恒温仓</b>完善的货物仓储</a>
                    <a href="{{url('/guarantee#area5')}}" rel="nofollow" target="_blank">
                        <i class="icon-g5"></i>
                        <b>24小时</b>快速发货</a>
                    <a href="{{url('/guarantee#area8')}}" rel="nofollow" target="_blank">
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
                                <img src="{{url('mia/images/index_fd_sj.gif')}}" alt="手机奶牙" />
                                <div class="right">
                                    <a href="/" target="_blank">
                                        <img src="{{url('mia/images/index_fd_wb.gif')}}" alt="官方微博" /></a>
                                    <div class="PubBtnHover">
                                        <img src="{{url('mia/images/index_fd_wx.gif')}}" alt="官方微信" />
                                        <img src="{{url('mia/images/index_fd_wx_more.gif')}}" class="wxmore" alt="" /></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="l" style="margin-left:15px;">
                        <ul>
                            <li class="strong">使用帮助</li>
                            <li>
                                <a href="{{url('/help/4')}}" rel="nofollow">会员等级</a></li>
                            <li>
                                <a href="{{url('/help/5')}}" rel="nofollow">会员积分</a></li>
                            <li>
                                <a href="{{url('/help/24')}}" rel="nofollow">常见问题</a></li>
                            <li>
                                <a href="{{url('/help')}}" rel="nofollow">帮助中心</a></li>
                        </ul>
                        <ul>
                            <li class="strong">支付方式</li>
                            <li>
                                <a href="{{url('/help/8')}}" rel="nofollow">在线支付</a></li>
                            <li>
                                <a href="{{url('/help/10')}}" rel="nofollow">代金券支付</a></li>
                        </ul>
                        <ul>
                            <li class="strong">配送方式</li>
                            <li>
                                <a href="{{url('/help/12')}}" rel="nofollow">包邮政策</a></li>
                            <li>
                                <a href="{{url('/help/13')}}" rel="nofollow">配送说明</a></li>
                            <li>
                                <a href="{{url('/help/14')}}" rel="nofollow">发货时间</a></li>
                            <li>
                                <a href="{{url('/help/16')}}" rel="nofollow">验货签收</a></li>
                        </ul>
                        <ul>
                            <li class="strong">售后服务</li>
                            <li>
                                <a href="{{url('/help/18')}}" rel="nofollow">正品承诺</a></li>
                            <li>
                                <a href="{{url('/help/19')}}" rel="nofollow">售后咨询</a></li>
                            <li>
                                <a href="{{url('/help/19')}}" rel="nofollow">退货政策</a></li>
                            <li>
                                <a href="{{url('/help/20')}}" rel="nofollow">退货流程</a></li>
                            <li>
                                <a href="{{url('/help/21')}}" rel="nofollow">退款方式</a></li>
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
                        <a href="{{url('/help/31')}}" rel="nofollow">关于奶牙</a>|
                        <a href="{{url('/help/33')}}" rel="nofollow">加入奶牙</a>|
                        <a href="{{url('/help/32')}}" rel="nofollow">商务合作</a>|
                        <a href="{{url('/help')}}" rel="nofollow">帮助中心</a>|
                        <a href="{{url('/help/34')}}" rel="nofollow">联系我们</a>|
                        <a href="{{url('/help/35')}}" target="_blank">友情链接</a>|
                        <a href="/" id="backToMobile" target="_blank" rel="nofollow" data-domain="mia.com">触屏版</a>|
                        <a href="{{url('/help/36')}}" target="_blank" rel="nofollow">媒体报道</a>|
                        <a href="/" rel="nofollow">妈米计划</a></p>京公网安备：11010502027270 | 营业执照：91110105585582599307U | 食品流通许可证：SP1101051410296669 | 京ICP证140430号 | 京ICP备14006215号
                    <br/>Copyright &copy; 2016 北京花旺在线商贸有限公司 Mia.com 保留一切权利。 客服热线： 400-789-2000
                    <br/>
                    <!--地址：北京市朝阳区朝外大街10号（A1区）7层704单元 &emsp;&emsp;&emsp;电话：010-56733456-->
                    <p class="cert">
                        <a target="_blank" href="/">
                            <img width="105" border="0" src="
							{{url('mia/images/bluelogo.gif')}}"></a>
                        <span style="display:inline-block;position:relative;width:auto;">
                            <a style="display:inline-block;" kx_type="图标式" target="_blank" tabindex="-1" id="kx_verify" href="/">
                                <img width="80" alt="可信网站" oncontextmenu="return false;" style="border:none;" src="{{url('mia/images/cnnic.png')}}"></a>
                        </span>
                        <a id='___szfw_logo___' href='/' target='_blank'>
                            <img src="{{url('mia/images/chengxin.jpg')}}" border='0' /></a>
                        <img width="105" src="{{url('mia/images/alipay.jpg')}}"></p>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{url('mia/js/footer.js')}}"></script>
        <div class="sideBar leftSide ">
            <img src="{{url('mia/images/c28f17d15a13149cfa89f18dc32efb87.png')}}"></div>
        <div class="sideBar rightSide ">
            <div class="list">
                <ul>
                    <li class="side-cart">
                        <a href="{{url('/user/cart')}}">
                            <i class="mia-icon icon-cart">&#xe80a;</i>购物车</a></li>
                    <li class="side-mia service_mia_0">
                        <i class="mia-icon icon-zixun">&#xe809;</i>咨询</li>
                    <li class="side-tel">
                        <i class="mia-icon icon-tel">&#xe80b;</i>客服
                        <div class="item-float item-tel">400-789-2000</div></li>
                    <li class="side-app">
                        <i class="mia-icon icon-wx">&#xe80c;</i>微信
                        <div class="item-float item-app"></div></li>
                </ul>
                <div class="side-top">
                    <i>
                    </i>
                </div>
            </div>
        </div>
        <script>
(function() {
    function topslide(parm) {
        this.target = parm.target;
        this.cell = $(this.target + ' .cell');
        this.alli = $(this.target + ' .slideNum i');
        this.delay = parm.delay || 300;
        this.slideDelay = parm.slideDelay || 3000;
        this.slideTrans = parm.slideTrans || 3000;
        this.controller = parm.controller || false;
        this.controllerFix = parm.controllerFix || false;
        this.effect = parm.effect || 'blink';
        this.timeCycle = null;
        this.timeMsi = null;
    }

    topslide.prototype.init = function() {
        // console.log(this.slideDelay)
        //console.log(this)
        //length = this.cell.length;
        var topslide = this;
        if (this.controller) {
            $('<div class="arNav"><div class="w1004"></div></div>').appendTo(this.target);
            $('<a href="#" class="leftAr" ></a><a href="#" class="rightAr" ></a>').appendTo($(this.target + ' .arNav .w1004'));
            $(this.target).hover(function() {

                $(topslide.target + ' .leftAr').fadeIn();
                $(topslide.target + ' .rightAr').fadeIn();
            }, function() {
                $(topslide.target + ' .leftAr').fadeOut();
                $(topslide.target + ' .rightAr').fadeOut();
            });
            $(this.target + ' .leftAr').click(function(e) {
                e.preventDefault();
                //if (topslide.curIndex()!=0) {
                //console.log(topslide.curIndex())
                clearInterval(topslide.timeCycle);
                topslide.showCell(topslide.curIndex() < 1 ? topslide.curIndex() + $('.slideNum i').length - 1 : topslide.curIndex() - 1);
                topslide.cycleSlide(); //恢复轮播
                // };
            })
            $(this.target + ' .rightAr').click(function(e) {
                e.preventDefault();
                //if (topslide.curIndex() < (topslide.alli.length-1) ) {
                clearInterval(topslide.timeCycle);
                topslide.showCell(topslide.curIndex() > $('.slideNum i').length - 2 ? 0 : topslide.curIndex() + 1);
                topslide.cycleSlide(); //恢复轮播
                // };
            })
            $(window).resize(function() {
                topslide.showcontroll();
            })
        };

        this.alli.hover(function() {
            clearInterval(topslide.timeCycle); //停止轮播   
            var _this = $(this);
            var index = _this.prevAll('i').length;
            if (!_this.hasClass('cur')) {
                topslide.timeMsi = setTimeout(function() {
                    topslide.showCell(index);
                }, topslide.delay)
            };
        }, function() {
            topslide.cycleSlide(); //恢复轮播
            clearTimeout(topslide.timeMsi);
        });

        this.cell.hover(function() {
            topslide.cell.stop(true, true);
            clearInterval(topslide.timeCycle); //停止轮播 
            var _this = $(this);
            var index = _this.prevAll('.cell').length;
            if (!_this.hasClass('cur')) {
                topslide.timeMsi = setTimeout(function() {
                    topslide.showCell(index);
                }, topslide.delay)
            };
        }, function() {
            topslide.cycleSlide(); //恢复轮播
            clearTimeout(topslide.timeMsi);
        })
        //初始化翻页控制按钮
        topslide.showcontroll();
        //轮播启动
        topslide.cycleSlide();
    }
    topslide.prototype.showCell = function(index) {
        var topslide = this;
        var target = topslide.alli.eq(index);
        var curCell = topslide.cell.eq(index);
        if (topslide.cell.filter('.easing').length > 0) {
            var preCell = topslide.cell.filter('.easing');
        } else {
            var preCell = topslide.cell.filter('.cur');
        };
        //console.log(preCell)
        curCell.find('img').each(function() {
            if ($(this).attr('original')) {
                $(this).attr('src', $(this).attr('original'));
                $(this).removeAttr('original');
            };
        })
        if (curCell.find('.prom').length > 0) {
            curCell.find('.prom').each(function() {
                if ($(this).attr('original')) {
                    $(this).css({
                        'background-image': 'url(' + $(this).attr('original') + ')'
                    });
                    $(this).removeAttr('original');
                };
            })
        };
        topslide.cell.removeClass('cur').stop().clearQueue().removeClass('easing').removeAttr('style');
        topslide.alli.removeClass('cur');
        topslide.alli.each(function() {
            if ($(this).hasClass('new')) {
                $(this).removeClass('newcur')
            };
        })
        //
        target.addClass('cur');
        if (target.hasClass('new')) {
            target.addClass('newcur');
        };
        switch (topslide.effect) {
            case 'blink':
                topslide.cell.removeClass('cur').removeAttr('style');
                preCell.hide();
                curCell.show();
                break;
            case 'fade':
                preCell.css({
                    'display': 'block'
                }).animate({
                    'opacity': 0
                }, topslide.slideTrans, function() {
                    topslide.cell.removeClass('easing').removeAttr('style');
                });
                curCell.addClass('easing');
                //console.log($('.easing'))
                curCell.css({
                    'display': 'block',
                    'opacity': 0
                }).animate({
                    'opacity': 1
                }, topslide.slideTrans, function() {
                    curCell.addClass('cur').removeClass('easing').removeAttr('style')
                });
                break;
            case 'slide':
                //
                var totalDiv = topslide.cell.parent();
                var width = topslide.cell.width();
                var totalWidth = topslide.cell.length() * width;
                totalDiv.css({
                    width: totalWidth
                });
                totalDiv.animate({
                    left: width * index
                })
                break;
            default:
                preCell.hide();
                curCell.show();
        }
        return this;
    }
    topslide.prototype.curIndex = function() {
        return $(this.target + ' .slideNum .cur').prevAll('i').length;
    }
    topslide.prototype.cycleSlide = function() {
        // console.log(this.target)
        var topslide = this;
        // console.log(topslide.target);
        setCycle = true;
        var flag;
        topslide.timeCycle = setInterval(function() {
            //console.log(parm)
            if (topslide.curIndex() < (topslide.alli.length - 1)) {
                flag = topslide.curIndex() + 1;
            } else {
                flag = 0
            };
            topslide.showCell(flag);
        }, topslide.slideDelay)
        return this;
    }
    topslide.prototype.showcontroll = function() {
        if (!this.controllerFix) {
            if ($(window).width() > 1680) {
                $(this.target + ' .leftAr').show();
                $(this.target + ' .rightAr').show();
            } else {
                $(this.target + ' .leftAr').hide();
                $(this.target + ' .rightAr').hide();
            };
        };
        return this;
    }
    var t = new topslide({
        target: '#mainSlide',
        slideDelay: 4000,
        slideTrans: 1000,
        controller: false,
        controllerFix: true,
        effect: 'fade'
    })
    t.init();
})();
</script>
    </body>

</html>