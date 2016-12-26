@section('title',$title)
<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    
	<meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{url('mia/style/newPub.css')}}">
    <link rel="stylesheet" href="{{url('mia/style/headerFooter.css')}}" type="text/css"> 
	<link rel="stylesheet" href="{{url('mia/style/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('mia/style/add.css')}}" type="text/css">
    <script src="{{url('mia/js/jquery-1.js')}}" type="text/javascript"></script>
    <script src="{{url('mia/js/newmiaPub.js')}}" type="text/javascript"></script>

    
     <script type="text/javascript" src="{{url('mia/js/lwt.js')}}"></script>
    
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
<link rel="stylesheet" href="{{url('mia/style/jqwin.css')}}">
<link rel="stylesheet" href="{{url('mia/style/iteminfo.css')}}">
<style type="text/css">
    .Ex_main{width:750px;background: #fff;text-align: center;overflow: hidden;}
    .Ex_main .p20{padding:20px;}
    /* nav */
    .Ex_main .Ex_nav{padding-top:30px;height:1px;margin-bottom:40px;}
    .Ex_main .Ex_nav div{border-top:1px solid #e1e1e1;width:380px;margin:0 auto;}
    .Ex_main .Ex_nav div span{padding-left:10px;padding-right:10px;font-size:19px;position: relative;top: -14px;background: #fff;color:#5b5b5b;;font-weight:bold;font-family:"\5FAE\8F6F\96C5\9ED1";}
    /* Ex_h3 */
    .Ex_main .Ex_h3{font-size:16px;line-height: 28px;color:#5b5b5b;text-align: left;padding-bottom:10px;font-family:"\5FAE\8F6F\96C5\9ED1";}
    /* img */
    .Ex_main img{width:710px;margin-bottom:10px;} 
</style>
<div class="warp">
    <div class="breadCrumbs">
        <div class="w1004 songti">
            <a href="http://www.miabaobei.hk/">奶牙首页</a> &gt;
<!--            --><!--                <a href="/transnational.html" title="奶牙宝贝跨境专区">奶牙宝贝跨境专区</a> &gt;-->
<!--            --><!--                <a href="/diapers.html" title="奶牙宝贝纸尿裤频道">纸尿裤频道</a> &gt;-->
<!--            --><!--                --><!--                    --><!--                        <a href="/list---><!--.html" title="--><!--">-->
<!--                            --><!--                        </a> &gt;-->
<!--                    --><!--                        <a href="/transnational.html" title="奶牙宝贝跨境专区">-->
<!--                            --><!--                        </a> &gt;-->
<!--                    --><!--                --><!--            -->            <a target="_blank"  title="分类：{{ $tate -> catename }}">{{ $tate -> catename }}</a> &gt;
            <a target="_blank"  title="品牌：{{ $tate -> brandname }}">{{ $tate -> brandname }}</a>
				{{ $tate -> name }}
           </div>
    </div>
    <div class="content detail">
        <div class="w1004">
            <div class="titlecon clearfix">
                <div class="left yahei l">
                    
					{{ $tate -> name }}                    
				</div>
                <div class="right l">
                                    </div>
            </div>
            <!--/.title-->
            <div class="show clearfix">
                <div class="left l rel">
                    <div class="mark_wrap_x60">
                                                                                            </div>
                <div class="big rel">
                    <img src="{{ url(config('app.goodsUrl').$tate -> img) }}" alt="{{ $tate ->name }}" width="447" height="447">
                    </div>
                    <div class="small">
						<img style="width:75px;" src="{{ url(config('app.goodsUrl').$tate -> img) }}" alt="" class="change_pic select_small_img ">
						@foreach($smallimg as $images)
                        <img style="width:75px;" src="{{ url(config('app.goodsUrl').$images -> img) }}" alt="" class="change_pic select_small_img ">
						@endforeach
                        
                                                    </div>
                                    </div>
                <div class="right l">
                    <div class="M_productInfo">
                        <div class="pi_price_box">
                            <span class="pbox_price"><i class="pbox_yen">¥</i><em id="item_price">{{ $tate -> price }}</em></span>
																											<!--<span class="pbox_off">3.1折</span>
                                                        <span class="pbox_market">¥<del id="mprice">289.00</del></span>-->
                         </div>
                                                                                                 <div class="pi_attr_box">
                            <div class="clearfix discount_f">

                            </div>
                            <input value="add" name="act" type="hidden">
                            <input value="" name="client_time" type="hidden">
                            <!-- 20150915 -->
                             <dl id="i_youhui" class="i_youhui clearfix" style="">
                                
                                <dt>

                                </dt>
                            </dl>
                             <!-- 20150814 -->
                                                        
                            <dl class="color">
                                <dt class="color_name">可选：</dt>
                                <dd class="color_list">
                                    <ul>
									<li class="color_list_item">
                                            <a class="" title="{{ $tate -> name }}" href="{{ url('goods') }}/{{ $tate -> id }}">
                                            <img alt="{{ $tate -> name }}" src="{{ url(config('app.goodsUrl').$tate -> img) }}" class="fl" width="42" height="43">
																														</a>
										</li>
                                        <!--@foreach($smallimg as $images) 
                                        <li class="color_list_item">
                                            <a class="" title="{{ $tate -> name }}" href="{{ url('goods') }}/{{ $tate -> id }}">
                                            <img alt="{{ $tate -> name }}" src="{{ url(config('app.goodsUrl').$images -> img) }}" class="fl" width="42" height="43">
																														</a>
										</li>
                                        @endforeach-->
									</ul>
                                </dd>
                            </dl>
							@foreach($items as $key)
                            <dl id="detail_size" style="">
								<dt class="">
								{{ $key['attrname'] }}
								</dt>
								<dd id="detail_size_list">
								<!--<p class="size_text">
								<span class="outOfStock" title="该规格商品已售罄">
								<b></b><span>M码</span></span>
								</p>-->
								@foreach($key['sub'] as $k => $value)
								<p class="size_text">
									<a class="item_size_list" data-anid="{{$key['anid']}}" <?php
									echo $value['avid'] != 0 
									? 
									'data-id="avid"'.' data-value="'.$value['avid'].'"' 
									: 
									'data-id="mavid"'.' data-value="'.$value['mervalue'].'"' 
									?> data-show="no" title="" href="javascript:void(0)">
										<b></b>
										<span>
									@if(empty($value['attrvalue']))
										{{ $value['mervalue'] }}
									@else
										{{ $value['attrvalue'] }}
									@endif
										</span>
									</a>
								</p>
								@endforeach
								</dd>
								<!--<dd id="ui_new_lz">查看尺码表&gt;</dd>-->
							</dl>
							@endforeach
                            <input value="" id="item_size" name="size" readonly="readonly" type="hidden">
                            <dl id="J_num_select" class="i_num clearfix">
                                <dt class="num_name">数量：</dt>
                                <dd class="i_notice_msg J_num_tips"></dd>
                                <dd class="num_box">
                                    <span class="num_reduce num_reduce_disabled J_num_act_reduce"></span>
                                    <em class="num_input" id="buyAmount" >1</em>
                                    <span class="num_add J_num_act_add"></span>
                                </dd>
                                <dd id="stockTips" class="num_msg f12">还剩<span id="stock"><span>0</span><span>0</span><span>f</span><span>f</span></span>件</dd>
                            </dl>
                            <dl class="other">
                                <dt class="other_name">编码：</dt>
                                <dd class="other_box">{{ $tate -> code }}</dd>
                            </dl>                                   
    <div class="clearfix">
		<div class="service_mia" style="position: relative;">

    <a class="" style="position:absolute;top:0; left:0; width: 60px; height: 36px; z-index: 9;" href="" target="_blank" id="live800"><img src="{{url('mia/images/14115121348833.jpg')}}">
    </a>
    <!-- Live800在线客服图标:勿删[固定型] 开始 -->
    <div id="live7">

    </div>
    <script type="text/JavaScript" language="javascript">
        /*var live_c = getcookie('live_info');
        if(live_c) {
            document.write("<scr"+"ipt language=\"javascript\" src=\"http://chat800.mia.com/live800/chatClient/staticButton.js?companyID=424726&configID=7&skillId=22&codeType=custom&info=" + getcookie('live_info') + "\" charset=\"UTF-8\"></scr"+"ipt>");
        } else {
            document.write("<scr"+"ipt language=\"javascript\" src=\"http://chat800.mia.com/live800/chatClient/staticButton.js?companyID=424726&configID=7&skillId=22&codeType=custom\" charset=\"UTF-8\"></scr"+"ipt>");
        }*/
    </script>
    <!-- Live800在线客服功能代码  开始 -->
    <!-- <script language="javascript" src="http://chat800.mia.com/live800/chatClient/monitor.js?companyID=424726&configID=3&skillId=22&codeType=custom" charset="UTF-8"></script> -->
    <!-- Live800在线客服功能代码 结束 -->
</div>

<!--<div class="service_mia">-->
<!--    <!-- Live800在线客服图标:测试固定图标[固定图标] 开始-->
<!--    <!-- Live800在线客服图标:测试固定图标[固定图标] 开始-->
<!--    <div style='display:none;'><a href='http://www.live800.com'>在线聊天</a></div><script language="javascript" src="http://care.live800.com/live800/chatClient/staticButton.js?jid=2787005984&companyID=424726&configID=115162&codeType=custom"></script><div style='display:none;'><a href='http://en.live800.com'>live chat</a></div>-->
<!--    <!--在线客服图标:测试固定图标 结束-->
<!--    <!-- Live800默认跟踪代码: 开始-->
<!--    <script language="javascript" src="http://chat10.live800.com/live800/chatClient/monitor.js?jid=2787005984&companyID=424726&configID=220898&codeType=custom"></script>-->
<!--    <!-- Live800默认跟踪代码: 结束-->
<!--</div>-->
<script>
    var localhref = window.location.href;
    document.getElementById('live800').href = 'http://bdxst.bjtu.edu.cn:3000/?toUsername={{ $tate -> merchantname }}&toName={{ $tate -> merchantname }}&username={{ session('user.username') }}&name={{ session('user.username') }}&type=customer';
</script>                                </div>
                                                        <!-- <div class="clearfix">
                                <div class="button_f">
                                    <a href="javascript:void(0)" class="btn_suit" disabled>本商品尽可通过套装购买</a>
                                    <p id="sepcailNotice"></p>
                                </div>
                                <div class="button_f" id="itemAttention">
                                    <a href="javascript:void(0)" class="btn_07_f" id="attend_submit">收藏</a>
                                    <p id="sepcailNotice1"></p>
                                </div>
                            </div>-->
                                                            <dl class="other">
                                    <dt style="background-color: #FDE5EB;float: left;font-size: 12px;line-height: inherit;padding: 4px 0;text-align: center;width: 60px;">&nbsp;</dt>
                                    <dd style="background-color: #FDE5EB;color: #F43499;float: left;padding: 4px 80px 4px 10px;">
                                        此商品由{{ $tate -> merchantname }}进行发货                                    </dd>
                                </dl>
                                                        <!-- 20150423 -->
                                
                                                           

                            <div class="suitType">

                            
                            	                                
                            </div>
                            <!-- /20150423 -->

                            <!-- 20150424 -->
                            <div class="clearfix">
                                <div class="button_f" id="itemProcess">
                                	<!--<a href="javascript:void(0)" class="btn_07" id="J_cartAdd_submit" data="{{ $tate -> id }}">加入购物车</a>-->
									<a href="javascript:void(0)" class="btn_07" id="DJ_cartAdd_submit" data-login="{{session('user.uid') ? 'yes' : 'no'}}" data="{{ $tate -> id }}">加入购物车</a>
								<p id="sepcailNotice"></p>
                                </div>
                                <div class="button_f" id="itemAttention">
                                    <!--<a href="javascript:void(0)" class="btn_07_f" id="attend_submit">收藏</a>-->
									@if(!$isStore)
									<a href="{{url('user/mygoods/add/')}}/{{ $tate -> id }}" class="btn_07_f" id="">收藏</a>
									@else
										<a class="btn_07_f" id="">已收藏</a>
									@endif
                                    <p id="sepcailNotice1"></p>
                                </div>
                            </div>
                                                        <!-- /20150424 -->

                                                            <div class="pbox_pms">
                                    <dl>
                                        <dt>包邮</dt>
                                                                        
                                                                        
                                                            <dd>全场包邮</dd>
                                                                                   <!--<dd>不含纸尿裤、拉拉裤及直邮奶粉的单笔订单满88免运费</dd>-->
                                    </dl>
                                </div>
                                                        <!--添加提示是否支持无理由退货 -->
                            <div class="pbox_pms">
                                <dl>
                                    <dt>提示</dt>
                                    <dd>支持14天无理由退货</dd>
                                    </dl>
                                </div>
                            <!--添加提示是否支持无理由退货 -->
                                                        <div id="J_detailShare_wrap" class="pi_share_box">
                                <span class="share_tit widget_share_txt">告诉小伙伴：</span>
                                <span class="jiaaa jiathis_style_24x24">
                                    <a href="javascript:void(0)" class="jiathis_button_weixin" title="分享到微信"><span class="jiathis_txt jtico jtico_weixin"></span></a>
                                    <a href="javascript:void(0)" mars_sead="m_account_invite_sina" class="share_button_tsina"></a>
                                    <a href="javascript:void(0)" mars_sead="m_account_invite_tweibo" class="share_button_tqq"></a>
                                    <a href="javascript:void(0)" mars_sead="m_account_invite_qzone" class="share_button_qzone"></a>
                                    <a href="javascript:void(0)" mars_sead="m_account_invite_renren" class="share_button_renren"></a>
                                    <a href="javascript:void(0)" mars_sead="m_account_invite_douban" class="share_button_douban"></a>
                                    <a href="javascript:void(0)" class="jiathis_button_meilishuo" title="分享到美丽说"><span class="jiathis_txt jtico jtico_meilishuo"></span></a>
                                </span>
                            </div>
                           <input id="share_pic" value="http://img04.miabaobei.com/d1/p3/item/12/1218/1218146_topic_1.jpg" type="hidden">
                            <input id="share_name" value="刚刚在奶牙宝贝上发现了这个#叮唛 DING MA 夏季阿狸亲子装情侣装全家装外出服爸爸款# 好喜欢，求特卖求好价!" type="hidden">
                        </div>
						<script>
							//alert($);
							$.ajaxSetup({
								headers: {
									'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
								}
							});
							$(document).ready(function(){
								var inputCount = 0;
								var totalAttr = new Array();
								var totalCount = {{count($items)}};
								//var 
								//alert(totalAttr);
								//验证
								$('a.item_size_list').click(function(){
									var anid = $(this).attr('data-anid');
									var vId = $(this).attr('data-id');
									var vVal = $(this).attr('data-value');
									
									$(this).parent().parent().find('p > a').removeClass('selected');
									$(this).addClass('selected');
									var tmp = new Array();
									tmp['anid'] = anid;
									tmp['vId'] = vId;
									tmp['vVal'] = vVal;
									totalAttr[anid] = tmp;
									inputCount++;
									console.log(totalAttr);
									
								});
								
								$('#DJ_cartAdd_submit').on('click',function(){
									if($(this).attr('data-login') == 'no'){
										window.location.href='{{url("/user/login")}}';
										return false;
									}
									
									if(totalAttr.length < totalCount || inputCount < totalCount){
										alert('请选择商品属性');
										return false;
									}
									
									// $.each(totalAttr, function(i, n){
										// console.log(i+'-'+n[0]['anid']);
									// });
									var str = '[';
									for(var i in totalAttr){
										// console.log(i);
										// console.log(totalAttr[i]['anid']);
										// console.log(totalAttr[i]['vId']);
										// console.log(totalAttr[i]['vVal']);
										
										str += '{"anid":"'+totalAttr[i]['anid']+'","vId":"'+totalAttr[i]['vId']+'","vVal":"'+totalAttr[i]['vVal']+'"},';
									}
									//console.log(str);
									str = str.substring(0, str.length-1);
									//console.log(str);
									str += ']';
									// console.log(str);
									var id = $(this).attr('data');
									var num = $('#buyAmount').text();
									var _this = $(this);
									//alert(num);
									$.ajax({
										type:'post',
										data: {id:id,num:num,str:str},
										dataType: 'json',
										url:'{{url("/goods/add")}}',
										beforeSend:function(){
											_this.html('正在加入购物车...');
										},
										success:function(data)
										{
											console.log(data);
											if(data.code == -1){
												window.location.href='{{url("/user/login")}}';
											}else if(data.code == 0)
											{
												_this.html('已加入购物车');
											}else{
												alert('失败');
											}
										},
										error:function (XMLHttpRequest, textStatus, errorThrown) {
											// 通常 textStatus 和 errorThrown 之中
											// 只有一个会包含信息
											// this; // 调用本次AJAX请求时传递的options参数
											_this.html('系统繁忙');
										}
									});
								});
							
							});
							
						
						</script>
                    </div>
                </div>
            </div>
            <!--/.show-->

			<!-- spuScroll -->
						<!-- end spuScroll -->
                  
                        <div class="introduction clearfix">
                <div class="left l">
                    <div class="moduleFixed">
                        <div class="moFixed navFix" style="left: 131.5px; z-index: 5;">
                            <ul class="title yahei">
                                <li class="">商品参数</li>
                                <li class="">商品详情</li>
                                <li class="current">奶牙口碑(1)</li>
                                <li class="">奶牙优势</li>
                            </ul>
                        </div>
                    </div>
                    <div class="p10">
                        <div class="datacon clearfix cs rel" style="padding-bottom:12px;">
                            <!-- <div class="dtit"><img src="images/sp02.gif')}}" alt="商品详情"/></div>-->
                            <ul class="clearfix">
                                <li class="width"><b >商品名称:</b>{{ $tate -> name }}</li>
                                <li><b>品牌:</b>{{ $tate -> brandname }}</li>
                                <li>
									<b>分类:</b>{{ $tate -> catename }}
								</li>
                                <li><b>商品条码:</b>{{ $tate -> code }}</li>
							@foreach($param as $par)
								<li><b>{{ $par -> name }}:</b>{{ $par -> value }}</li>
							@endforeach
                                                                                                </ul>
                            <div class="clearfix">
                                <!-- <img src="http://file03.miabaobei.com/resources/images/pingan.jpg?v=111" /> -->
                            </div>
                            <!--<div class="pointOfView clearfix">
																											<img src="{{url('/mia/images/1064652_normal_5.jpg')}}" width="113" height="130">
                                                                        <div class="l">
                                        <h4>推荐理由：</h4>
                                        <p>汤普森葡萄籽精华含量高，每粒葡萄籽含量
19000mg！150mg原花青素（OPC），有助于清除体内的自由基、抗紫外线、淡化斑点、维持毛细血管健康从而增强肌肤的弹性，增强皮肤抵抗力，改
善和缓解各种过敏症状、对抗花粉症，抗衰老、帮助排除毒素，具有抗氧化功效，有效抵抗自由基对皮肤及组织细胞的侵害，延缓机体衰老，被称为是“扫除自由基
的清道夫”。</p>
                                    </div>
                                </div>-->
                                
                                                    </div>
                        <div class="clearfix datacon">
                            <div class="dtit"><img src="{{url('mia/images/sp02.gif')}}" alt="商品详情"></div>
                            <!--商品详情添加视频 03-02 -->
                                                                                                                            <!--香港仓特定下展图开始-->
                                                                        <!--香港仓特定下展图结束-->
{!! $cont !!}
																		                                                                                              <div style="clear:both;"></div>
                        </div>
                        <div class="area1 clearfix">
                                                    </div>
                        <div>
                        <img  src="{{url('mia/images/950a4e005ca0c755e06100520440d451.jpg')}}" class="lazyload" alt="loading" width="750px">
                                                                                        <img  src="{{url('mia/images/ad83daf96337a692f99ea48508cc2aab.jpg')}}" class="lazyload" alt="loading" width="750px">
                                                    </div>
                                                <div class="area2 clearfix wordOfMouth datacon" id="test">
                            <div class="dtit"><img src="{{url('/mia/images/sp03.gif')}}" alt="奶牙口碑"></div>
                                <!--<div class="inSummary clearfix">
                                    <div class="l left">
                                        <div class="top pink">5/5</div>
                                        <div class="value" style="width:75px"></div>
                                        <p><span class="pink">1</span>口碑</p>
                                    </div>
                                    <div class="l middle"><div id="container" style="height:100px" data-highcharts-chart="0"><div class="highcharts-container" id="highcharts-0" style="position: relative; overflow: hidden; width: 390px; height: 100px; text-align: left; line-height: normal; z-index: 0; font-family: &quot;Lucida Grande&quot;,&quot;Lucida Sans Unicode&quot;,Verdana,Arial,Helvetica,sans-serif; font-size: 12px; left: 0.5px; top: 0px;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="390" height="100"><desc>Created with Highcharts 3.0.7</desc><defs><clipPath id="highcharts-1"><rect fill="none" x="0" y="0" width="320" height="100"></rect></clipPath></defs><rect rx="5" ry="5" fill="#FFFFFF" x="0" y="0" width="390" height="100"></rect><g class="highcharts-series-group" zIndex="3"><g class="highcharts-series highcharts-tracker" visibility="visible" zIndex="0.1" transform="translate(70,0) scale(1 1)" style="cursor:pointer;"><path fill="#85dcf0" d="M 159.99063103263003 4.000000954103811 A 46 46 0 0 1 159.94463104593527 4.000033323067221 L 159.98916694376996 41.00000651973055 A 9 9 0 0 0 159.99816694116674 41.00000018667248 Z" stroke="#FFFFFF" stroke-width="1" stroke-linejoin="round" transform="translate(0,0)"></path><path fill="#fce285" d="M 159.99063103263003 4.000000954103811 A 46 46 0 0 1 159.94463104593527 4.000033323067221 L 159.98916694376996 41.00000651973055 A 9 9 0 0 0 159.99816694116674 41.00000018667248 Z" stroke="#FFFFFF" stroke-width="1" stroke-linejoin="round" transform="translate(0,0)"></path><path fill="#f9a2c2" d="M 159.99063103263003 4.000000954103811 A 46 46 0 0 1 159.94463104593527 4.000033323067221 L 159.98916694376996 41.00000651973055 A 9 9 0 0 0 159.99816694116674 41.00000018667248 Z" stroke="#FFFFFF" stroke-width="1" stroke-linejoin="round" transform="translate(0,0)"></path><path fill="#90cda3" d="M 159.99063103263003 4.000000954103811 A 46 46 0 0 1 159.94463104593527 4.000033323067221 L 159.98916694376996 41.00000651973055 A 9 9 0 0 0 159.99816694116674 41.00000018667248 Z" stroke="#FFFFFF" stroke-width="1" stroke-linejoin="round" transform="translate(0,0)"></path><path fill="#ff7a75" d="M 159.99063103263003 4.000000954103811 A 46 46 0 0 1 159.94463104593527 4.000033323067221 L 159.98916694376996 41.00000651973055 A 9 9 0 0 0 159.99816694116674 41.00000018667248 Z" stroke="#FFFFFF" stroke-width="1" stroke-linejoin="round" transform="translate(0,0)"></path></g><g class="highcharts-markers" visibility="visible" zIndex="0.1" transform="translate(70,0) scale(1 1)"></g></g><g class="highcharts-legend" zIndex="7" transform="translate(10,10)"><g zIndex="1"><g><g class="highcharts-legend-item" zIndex="1" transform="translate(0,-5)"><text x="21" y="15" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;cursor:pointer;color:#274b6d;line-height:14px;fill:#274b6d;" text-anchor="start" zIndex="2"><tspan x="21">预产期</tspan></text><rect rx="2" ry="2" fill="#85dcf0" x="0" y="4" width="16" height="12" zIndex="3"></rect></g><g class="highcharts-legend-item" zIndex="1" transform="translate(0,13)"><text x="21" y="15" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;cursor:pointer;color:#274b6d;line-height:14px;fill:#274b6d;" text-anchor="start" zIndex="2"><tspan x="21">0-3个月</tspan></text><rect rx="2" ry="2" fill="#fce285" x="0" y="4" width="16" height="12" zIndex="3"></rect></g><g class="highcharts-legend-item" zIndex="1" transform="translate(0,31)"><text x="21" y="15" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;cursor:pointer;color:#274b6d;line-height:14px;fill:#274b6d;" text-anchor="start" zIndex="2"><tspan x="21">3-6个月</tspan></text><rect rx="2" ry="2" fill="#f9a2c2" x="0" y="4" width="16" height="12" zIndex="3"></rect></g><g class="highcharts-legend-item" zIndex="1" transform="translate(0,49)"><text x="21" y="15" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;cursor:pointer;color:#274b6d;line-height:14px;fill:#274b6d;" text-anchor="start" zIndex="2"><tspan x="21">6-12个月</tspan></text><rect rx="2" ry="2" fill="#90cda3" x="0" y="4" width="16" height="12" zIndex="3"></rect></g><g class="highcharts-legend-item" zIndex="1" transform="translate(0,67)"><text x="21" y="15" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;cursor:pointer;color:#274b6d;line-height:14px;fill:#274b6d;" text-anchor="start" zIndex="2"><tspan x="21">一年以上</tspan></text><rect rx="2" ry="2" fill="#ff7a75" x="0" y="4" width="16" height="12" zIndex="3"></rect></g></g></g></g><g class="highcharts-tooltip" zIndex="8" style="cursor:default;padding:0;white-space:nowrap;" transform="translate(0,-999)"><rect rx="3" ry="3" fill="none" x="0.5" y="0.5" width="16" height="16" fill-opacity="0.85" isShadow="true" stroke="black" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></rect><rect rx="3" ry="3" fill="none" x="0.5" y="0.5" width="16" height="16" fill-opacity="0.85" isShadow="true" stroke="black" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></rect><rect rx="3" ry="3" fill="none" x="0.5" y="0.5" width="16" height="16" fill-opacity="0.85" isShadow="true" stroke="black" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></rect><rect rx="3" ry="3" fill="rgb(255,255,255)" x="0.5" y="0.5" width="16" height="16" fill-opacity="0.85"></rect><text x="8" y="21" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;color:#333333;fill:#333333;" zIndex="1"></text></g><text x="380" y="95" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:9px;cursor:pointer;color:#909090;fill:#909090;" text-anchor="end" zIndex="8"></text></svg></div></div></div>
                                    <div class="l right">该商品使用起来好用吗？<br>
                                        与更多奶牙用户分享<br>
                                        你的独家心得<br>
                                        <a class="pink_mid_btn">口碑心得</a></div>
                                </div>-->
                                                                    <div class="pblock clearfix"> <img src="{{url('/mia/images/icon_none.gif')}}" class="name" width="45" height="45">
                                        @if(empty($coment))
										<div class="rim rel l"> <span class="arrow pos"></span>                                             <div class="mytit">
                                                <div class="value" style="width:75px;margin-right:0px!important;"></div>
                                                <span class="pink">暂无口碑</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                            
                                                                                        <!--<div class="myfoot">30天前</div>-->
                                            
                                        </div>
										@else
										<div class="rim rel l"> <span class="arrow pos"></span>                                             <div class="mytit">
                                                <div class="value" style="width:75px;margin-right:0px!important;"></div>
                                                <span class="pink">{{ $coment -> username }}</span> <img src="{{url('/mia/images/level_01.gif')}}" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                            <div class="mycontent">
                                                <h4><span class="pink">
												{{ $coment -> title }}
												</span></h4>
                                                 <p>{{ $coment -> content }}</p>
                                            </div>
                                                                                        <!--<div class="myfoot">30天前</div>-->
                                            <div class="inf">
                                                <a href="javascript:void(0)" title="赞一下" class="zan" data-id="229888">{{ $coment -> level }}</a>
                                                <a href="http://www.miabaobei.hk/koubei-229888.html" target="_blank" title="查看此口碑详情">
                                                    <!--<span class="reply">0</span>-->
                                                </a>
                                            </div>
                                        </div>
										@endif
                                    </div>
                                                                <div id="big"><div></div></div>
                                                                <input id="koubei_page" value="" type="hidden">
                                                    </div>
                        <div class="area3 clearfix datacon">
                            <div class="dtit"><img src="{{url('mia/images/sp04.gif')}}" alt="奶牙优势"></div>
                            <ul class="mia_advantage" id="advantageTitle">
                                <li class="mia_current"><span class="myys1"></span></li>
                                <li><span class="myys2"></span></li>
                                <li class=""><span class="myys3"></span></li>
                                <li><span class="myys4"></span></li>
                                <li class=""><span class="myys5"></span></li>
                                <li><span class="myys6"></span></li>
                                <li><span class="myys7"></span></li>
                                <li><span class="myys8"></span></li>
                            </ul>
                            <div class="imgblock" id="imgBlock">
                                <div class="mia_advant1" style="display: block;">
                                  <img src="{{url('/mia/images/zhengpin01.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                  <img src="{{url('/mia/images/zhengpin02.jpg')}}"  alt="奶牙优势" class="lazyload" width="750" height="300">
                                  <a href="/guarantee#area1" target="_blank" title="" class="advantage_more">点击这里 解密奶牙何以成为千万妈妈喜爱的母婴电商</a>
                                </div>
                                <div class="mia_advant2" style="display: none;">
                                   <img src="{{url('/mia/images/haiwai01.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                   <img src="{{url('/mia/images/haiwai02.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                   <a href="/guarantee#area2" target="_blank" title="" class="advantage_more">点击这里 解密奶牙何以成为千万妈妈喜爱的母婴电商</a>
                                </div>
                                <div class="mia_advant3" style="display: none;">
                                    <img src="{{url('/mia/images/mianshui01.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                    <img src="{{url('/mia/images/mianshui02.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                    <a href="/guarantee#area3" target="_blank" title="" class="advantage_more">点击这里 解密奶牙何以成为千万妈妈喜爱的母婴电商</a>
                                </div>
                                <div class="mia_advant4" style="display: none;">
                                    <img src="{{url('/mia/images/fahuo01.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                    <img src="{{url('/mia/images/fahuo02.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                    <a href="/guarantee#area5" target="_blank" title="" class="advantage_more">点击这里 解密奶牙何以成为千万妈妈喜爱的母婴电商</a>
                                </div>
                                <div class="mia_advant5" style="display: none;">
                                    <img src="{{url('/mia/images/zhuanye01.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                    <img src="{{url('/mia/images/zhuanye02.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                    <a href="/guarantee#area6" target="_blank" title="" class="advantage_more">点击这里 解密奶牙何以成为千万妈妈喜爱的母婴电商</a>
                                </div>
                                <div class="mia_advant6" style="display: none;">
                                    <img src="{{url('/mia/images/bianjie01.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                    <img src="{{url('/mia/images/bianjie02.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                    <a href="/guarantee#area7" target="_blank" title="" class="advantage_more">点击这里 解密奶牙何以成为千万妈妈喜爱的母婴电商</a>
                                </div>
                                <div class="mia_advant7" style="display: none;">
                                    <img src="{{url('/mia/images/mama01.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                    <img src="{{url('/mia/images/mama02.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                    <a href="/guarantee#area10" target="_blank" title="" class="advantage_more">点击这里 解密奶牙何以成为千万妈妈喜爱的母婴电商</a>
                                </div>
                                <div class="mia_advant8" style="display: none;">
                                    <img src="{{url('/mia/images/kefu01.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                    <img src="{{url('/mia/images/kefu02.jpg')}}"  alt="奶牙优势" class="lazyload" width="750">
                                    <a href="/guarantee#area11" target="_blank" title="" class="advantage_more">点击这里 解密奶牙何以成为千万妈妈喜爱的母婴电商</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="right l" id="seeing">  <div class="pubtitle yahei">看了又看</div><div class="pubcon cp">
					
					@foreach($look as $lookval)
					<div class="block clearfix"><a href="{{ url('goods') }}/{{ $lookval -> id }}" target="_blank"><img src="{{ url(config('app.goodsUrl').$lookval -> img) }}" alt="{{ $lookval -> name }}" width="80" height="80"></a><p class="tit"><a href="{{ url('goods') }}/{{ $lookval -> id }}" target="_blank" title="{{ $lookval -> name }}">"{{ $lookval -> name }}"</a></p><span class="pink">¥{{ $lookval -> price }}</span><br></div>
					
					@endforeach
					
</div></div>
            </div>
        </div>
    </div>
    <!--/.content-->
</div>

<!-- dialog -->
<div class="dialogAddTelW" style="display:none">
    <div class="dialogAddTel">
        <h3 class="tit2">免费订阅<span class="close" onclick="closeAddTelW()"></span></h3>
        <div class="covDiv1">喜欢的宝贝卖光了，想买怎么办？快快订阅免费开售通知，商品参加特卖时会通知你哦~</div>
        <div class="covDiv2">
            <span class="spa1">手机短信：</span>
            <input class="inp1" onblur="yTel()" id="telInp" placeholder="请输入手机" type="text">
            <p class="erro pink">请输入正确的手机号码</p>
        </div>
        <div class="covDiv3"><input value="确定" class="sub1" id="telSub" onclick="telSub()" type="submit"></div>
    </div>
</div>
<div class="dialogAddTelWoverlay" style="display:none"></div>

<!-- 增加查看尺码表 2015111 begin lz -->
<div class="size_mask" id="size_mask">123</div>
<div class="size_sheet" id="size_sheet">
    <h3>尺码对照表</h3>
     <table ;="" cellspacing="0" cellpadding="0" border="0">
		 <thead>
		  <tr>
			<th>尺码表-上衣</th>
			<th>参考身高</th></tr>
		</thead>
		<tbody>
		  <tr>
			<td>80</td>
			<td>80码(65-75cm)</td></tr>
		  <tr>
			<td>90</td>
			<td>90码(75-85cm)</td></tr>
		  <tr>
			<td>100</td>
			<td>100码(85-95cm)</td></tr>
		  <tr>
			<td>110</td>
			<td>110码(95-105cm)</td></tr>
		  <tr>
			<td>120</td>
			<td>120码(105-115cm)</td></tr>
		  <tr>
			<td>130</td>
			<td>130码(115-125cm)</td></tr>
		  <tr>
			<td>140</td>
			<td>140码(125-135cm)</td></tr>
		  <tr>
			<td>150</td>
			<td>150码(135-145cm)</td></tr>
		</tbody>
    </table>
    <div class="Table_close" id="Table_close"></div>
</div>
<!-- 增加查看尺码表 2015111 end lz -->

<!-- /dialog -->
<script type="text/javascript" src="{{url('/mia/js/main.js')}}"></script>
<script type="text/javascript" src="{{url('/mia/js/jquery-dialog-min.js')}}"></script>
<script type="text/javascript" src="{{url('/mia/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{url('/mia/js/jquery_share.js')}}"></script>
<script type="text/javascript" src="{{url('/mia/js/share_detail.js')}}"></script>
<script type="text/javascript" src="{{url('/mia/js/zan.js')}}"></script>
<script type="text/javascript" src="{{url('/mia/js/koubei_pic.js')}}"></script>
<script type="text/javascript" src="{{url('/mia/js/detail.js')}}"></script>
<script src="{{url('/mia/js/iteminfo.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{url('/mia/js/tabs.js')}}"></script>
<script>
    //奶牙优势切换
    $("#advantageTitle").tabs({
        cntSelect: "#imgBlock",
        tabEvent: "click",
        tabStyle: "normal",
        onStyle : "mia_current"
    });
    $("#kjghelp-button").mouseover(function(){
        $("#kjghelp").show();
    });
    $("#kjghelp-button").mouseout(function(){
        $("#kjghelp").hide();
    });
   

    $('.ewmhover').hover(function() {
        $(this).find('img').attr('src','http://file03.miabaobei.com/resources/images/ewm1.png');
        $('.smewm').show();
    }, function() {
        $(this).find('img').attr('src','http://file03.miabaobei.com/resources/images/ewm.png');
        $('.smewm').hide();
    });

    //口碑跳转
    $('#review_num_f').click(function(){
        var scrollTop_f=$('#test').offset().top;
        //alert(scrollTop_f);
        $('html,body').animate({
            scrollTop:scrollTop_f-50
        },1000);
    });
    //阶梯满赠js
    $('.relevant .itemlist').eq(0).removeClass('hidden');
    $('.taghead .tag').click(function(){
         if($(this).hasClass('active')){
             return;
         }
         var $parent=  $(this).closest('.relevant')
         $parent.find('.tag').removeClass('active');
         $(this).addClass('active');
         var tagtype  = $(this).data('tag');
         $parent.find('ul.itemlist').addClass('hidden');
         $parent.find('ul.itemlist').filter(function(){
             return $(this).data('tag')==tagtype;
         }).removeClass('hidden');
    })
    //阶梯满赠js结束
</script>

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
<script type="text/javascript" src="{{url('/mia/js/footer.js')}}"></script>
<div class="sideBar leftSide " style="display: block;">
    <img src="{{url('/mia/images/c28f17d15a13149cfa89f18dc32efb87.png')}}">
</div>
<div class="sideBar rightSide " style="display: block;">
    <div class="list">
        <ul>
            <li class="side-cart"><a href="{{url('/user/cart')}}"><i class="mia-icon icon-cart"></i>购物车</a></li>
            <li class="side-mia service_mia_0">
                <i class="mia-icon icon-zixun"></i>
                咨询
            </li>
            <li class="side-tel">
                <i class="mia-icon icon-tel"></i>客服
                <div class="item-float item-tel">400-789-2000</div>
            </li>
            <li class="side-app">
                <i class="mia-icon icon-wx"></i>微信
                <div class="item-float item-app"></div>
            </li>
        </ul>
        <div class="side-top"><i></i> </div>
    </div>
</div>

</div></body></html>