@section('title',$title)
<!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
		<meta name="csrf-token" content="{{csrf_token()}}">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <meta http-equiv="Cache-Control" content="no-transform">
        <meta http-equiv="Cache-Control" content="no-siteapp">
        <title>{{ config('app.miaName') }} - @yield('title')</title>
        <meta name="Keywords" content="玩转官网,奶牙,帮助中心">
        <meta name="Description" content="玩转官网，奶牙，帮助中心">
        <link rel="stylesheet" type="text/css" href="{{url('mia/style/newPub.css')}}">
        <link rel="stylesheet" href="{{url('mia/style/headerFooter.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('mia/style/main.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('mia/style/add.css')}}" type="text/css">
		@yield('style')
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
                        <li class="nav-guarantee">
                            <a target="_blank" href="{{url('/guarantee')}}">正品保证<i class="mia-icon icon-angle-down">&#xe803;</i></a>
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
                            <i class="mia-icon icon-down-open-big">&#xe807;</i>
						</div>
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
       <!--/.mainNav-->
        <div class="warp">
            <!--/.breadCrumbs-->
            <!--content-->
				@yield('content')
			<!--content -->
            <!--/.content-->
        </div>
        <!--/.warper-->
        <script type="text/javascript" src="{{url('mia/js/main.js')}}"></script>
        <script type="text/javascript">$(function() {
                $(document).gotop();

                $('.clix').click(function() {
                    var $this = $(this);
                    var zt = $this.children("span").attr('class');
                    if (zt == "fold") {
                        $this.children("span").addClass('unfold');
                        $this.children("a").addClass('blod');
                    } else {
                        $this.children("span").removeClass('unfold');
                        $this.children("a").removeClass('blod');
                    }
                    $this.next("ul").slideToggle();
                });

            });</script>
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
                            <img src="{{ url('mia/images/chengxin.jpg') }}" border='0' /></a>
                        <img width="105" src="{{ url('mia/images/alipay.jpg') }}"></p>
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
		@yield('script')
    </body>

</html>