<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="csrf-token" content="{{csrf_token()}}">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<title>{{ config('app.miaName') }} - @yield('title')</title>
<meta name="Keywords" content="进口母婴,限时特卖,日本进口,正品行货,花王,纸尿裤,拉拉裤,moony,大王,保宁,贝亲,britax湿巾,奶牙,MIA,miababy">
<meta name="Description" content="100%正品保障！奶牙为您精选全世界高品质、好口碑的母婴产品，以远低于市场价的折扣，在72 小时内限量出售。每天上午10点准时开抢！">
<link rel="stylesheet" type="text/css" href="{{url('/mia/style/newPub.css')}}">
<link rel="stylesheet" href="{{url('/mia/style/main.css')}}" type="text/css">
<link rel="stylesheet" href="{{url('/mia/style/add.css')}}" type="text/css">
<link rel="stylesheet" href="{{url('/mia/style/headerFooter.css')}}" type="text/css">
<script async type="text/javascript" src="{{url('/mia/js/event.js')}}" data-owner="criteo-tag"></script>
<script type="text/javascript" async src="{{url('/mia/js/mba_ka.js')}}"></script>
<script type="text/javascript" src="{{url('/mia/js/jquery-1.js')}}"></script>
<!--script type="text/javascript" src="{{url('/mia/js/header.js')}}"></script-->
<script src="{{url('/mia/js/newmiaPub.js')}}" type="text/javascript"></script>
<script src="{{url('/mia/js/newHeader.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{url('/mia/js/lwt.js')}}"></script>
</head>
<body>
<div class="header-topbar" style="z-index:301">
        <div class="w1100 clearfix">
            <div class="l">
                <a href="http://local.naiya.cc/app.html" title="手机奶牙" class="m"><i class="mia-icon icon-mobile"></i>手机奶牙</a>
                <a href="javascript:void(0)" title="客服电话" class="t"><i class="mia-icon icon-tel"></i>400-789-2000</a>
            </div>
            <!-- 登录前 -->
            <!--div class="r" style="display:none" id="unloginBox">
                <span class="welcome">你好，欢迎来到奶牙！</span><a href="http://local.naiya.cc/login?url=http%3A%2F%2Flocal.naiya.cc%2Fcart" title="点击登录" rel="nofollow">登录</a><em>|</em><a href="http://local.naiya.cc/register?url=http%3A%2F%2Flocal.naiya.cc%2Fcart" title="点击注册" rel="nofollow">免费注册</a><a href="http://local.naiya.cc/help.html">帮助中心</a>
            </div-->
            <!-- 登录后 -->
            <div class="r" id="extloginedBox" style="display:block">
                <span class="welcome">你好，<span id="logined_username">{{ session('user.username') }}</span></span><em>|</em>
                <div class="my-mia"><a href="{{asset('/user/index')}}" rel="nofollow">我的奶牙</a><i class="mia-icon icon-angle-down"></i>
                    <ul>
                        <li><a href="{{ url('/user/order') }}" rel="nofollow">我的订单</a></li>
                        <!--li><a href="http://local.naiya.cc/my_getredbag" rel="nofollow">我的红包</a></li>
                        <li><a href="http://local.naiya.cc/my_coupon" rel="nofollow">我的代金券</a></li-->
                        <li><a href="{{ url('/user/mybrand') }}" rel="nofollow">我收藏的品牌</a></li>
                        <li><a href="{{ url('/user/mygoods') }}" rel="nofollow">我收藏的商品</a></li>
                    </ul>
                </div><em>|</em>
                <a href="{{ url('/help') }}">帮助中心</a><em>|</em>
                <a href="{{ url('/user/logout') }}">退出</a>
            </div>
        </div>
    </div><!--需要引入的文件-->

    @yield('content')
<script type="text/javascript">// <![CDATA[
var google_tag_params = {
//BFD商品页参数开始
    bfd_sid : getcookie('sid'),
    bfd_cart_items : "[1126659,14.50,4],",
    bfd_cart_listgoods : "1126659,4 ",
//BFD商品页参数结束
//聚效统计变量
    mvq_addItem : '1126659',
//晶赞
    jz_productId_list : "1126659",
    jz_totalPrice : 58,
    jz_totalNum : 1,
//criteo购物车商品列表
    cr_cart_items :  [{id:1126659,price:14.50,quantity:4},],
    p_type :'d',
};
// ]]>
</script>
<script type="text/javascript" src="{{url('/mia/js/ld.js')}}" async></script>
<script type="text/javascript">
window.criteo_q = window.criteo_q || [];
window.criteo_q.push( 
        { event: "setAccount", account: 19577 },
        { event: "setCustomerId", id: getcookie('sid') },
        { event: "setSiteType", type: google_tag_params.p_type },
        { event: "viewBasket", item: google_tag_params.cr_cart_items});
</script>
<script type="text/javascript">
//聚效DSP
    var _mvq = _mvq || [];
    _mvq.push(['$setAccount', 'm-113955-0']);
    _mvq.push(['$setGeneral', 'cartview', '', /*用户名*/ '', /*用户id*/ '']);
    _mvq.push(['$logConversion']);
    _mvq.push(['$addItem', '', /*商品id*/google_tag_params.mvq_addItem, '','']);
    _mvq.push(['$logData']);
</script>
<div class="Nfooter">
    <div class="Genuine">
        <div class="w1100">
            <a href="http://local.naiya.cc/guarantee" rel="nofollow" target="_blank"><i class="icon-g1"></i><b>可信赖</b>进口母婴特卖</a>
            <a href="http://local.naiya.cc/guarantee#area3" rel="nofollow" target="_blank"><i class="icon-g2"></i><b>无忧</b>正品保证</a>
            <a href="http://local.naiya.cc/guarantee#area7" rel="nofollow" target="_blank"><i class="icon-g3"></i><b>14天</b>无理由退货</a>
            <a href="http://local.naiya.cc/guarantee#area6" rel="nofollow" target="_blank"><i class="icon-g4"></i><b>恒温仓</b>完善的货物仓储</a>
            <a href="http://local.naiya.cc/guarantee#area5" rel="nofollow" target="_blank"><i class="icon-g5"></i><b>24小时</b>快速发货</a>
            <a href="http://local.naiya.cc/guarantee#area8" rel="nofollow" target="_blank"><i class="icon-g6"></i><b>100万</b>妈妈口碑信赖</a>
        </div>
    </div>
    <div class="Nhelp">
        <div class="w1000 clearfix">
            <div class="r" style="margin-right: 40px;">
                <ul class="EWM">
                    <li class="strong">关注奶牙</li>
                    <li> <img src="{{url('/mia/images/index_fd_sj.gif')}}" alt="手机奶牙">
                        <div class="right"> <a href="http://weibo.com/miabaobei2014" target="_blank"><img src="{{url('/mia/images/index_fd_wb.gif')}}" alt="官方微博"></a>
                            <div class="PubBtnHover"> <img src="{{url('/mia/images/index_fd_wx.gif')}}" alt="官方微信"> <img src="{{url('/mia/images/index_fd_wx_more.gif')}}" class="wxmore" alt=""> </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="l" style="margin-left:15px;">
                <ul>
                    <li class="strong">使用帮助</li>
                    <li><a href="http://local.naiya.cc/help-9.html" rel="nofollow">会员等级</a></li>
                    <li><a href="http://local.naiya.cc/help-10.html" rel="nofollow">会员积分</a></li>
                    <li><a href="http://local.naiya.cc/help-147.html" rel="nofollow">常见问题</a></li>
                    <li><a href="http://local.naiya.cc/help.html" rel="nofollow">帮助中心</a></li>
                </ul>
                <ul>
                    <li class="strong">支付方式</li>
                    <li><a href="http://local.naiya.cc/help-11.html" rel="nofollow">在线支付</a></li>
                    <li><a href="http://local.naiya.cc/help-13.html" rel="nofollow">代金券支付</a></li>
                </ul>
                <ul>
                    <li class="strong">配送方式</li>
                    <li><a href="http://local.naiya.cc/help-15.html" rel="nofollow">包邮政策</a></li>
                    <li><a href="http://local.naiya.cc/help-16.html" rel="nofollow">配送说明</a></li>
                    <li><a href="http://local.naiya.cc/help-17.html" rel="nofollow">发货时间</a></li>
                    <li><a href="http://local.naiya.cc/help-20.html" rel="nofollow">验货签收</a></li>
                </ul>
                <ul>
                    <li class="strong">售后服务</li>
                    <li><a href="http://local.naiya.cc/help-21.html" rel="nofollow">正品承诺</a></li>
                    <li><a href="http://local.naiya.cc/help-22.html" rel="nofollow">售后咨询</a></li>
                    <li><a href="http://local.naiya.cc/help-22.html" rel="nofollow">退货政策</a></li>
                    <li><a href="http://local.naiya.cc/help-23.html" rel="nofollow">退货流程</a></li>
                    <li><a href="http://local.naiya.cc/help-24.html" rel="nofollow">退款方式</a></li>
                </ul>
                <ul class="NContact" style="width:196px;">
                    <li class="strong">联系方式</li>
                    <li>总裁邮箱 ceo@mia.com</li>
                    <li>商务合作 bd@mia.com</li>
                    <li>媒体合作 pr@mia.com</li>
                    <li>采购中心 cx@mia.com</li>
                    <li>企业采购 qiye@mia.com</li>
                </ul>
            </div>
        </div>
            </div>
    <div class="Nlink">
        <div class="w1000">
            <p><a href="http://local.naiya.cc/help-34.html" rel="nofollow">关于奶牙</a> | <a href="http://local.naiya.cc/help-43.html" rel="nofollow">加入奶牙</a> | <a href="http://local.naiya.cc/help-42.html" rel="nofollow">商务合作</a> | <a href="http://local.naiya.cc/help.html" rel="nofollow">帮助中心</a> | <a href="http://local.naiya.cc/help-44.html" rel="nofollow">联系我们</a> | <a href="http://local.naiya.cc/links.html" target="_blank">友情链接</a> | <a href="javascript:void(0)" id="backToMobile" target="_blank" rel="nofollow" data-domain="mia.com">触屏版</a> | <a href="http://local.naiya.cc/media.html" target="_blank" rel="nofollow">媒体报道</a> | <a href="http://www.mmjihua.com/" rel="nofollow">妈米计划</a></p>
            京公网安备：11010502027270 | 营业执照：91110105585582599307U | 食品流通许可证：SP1101051410296669 | 京ICP证140430号 | 京ICP备14006215号<br>
            Copyright © 2016 北京花旺在线商贸有限公司 Mia.com 保留一切权利。 客服热线： 400-789-2000<br>
            <!--地址：北京市朝阳区朝外大街10号（A1区）7层704单元 &emsp;&emsp;&emsp;电话：010-56733456-->
            <p class="cert"> <a target="_blank" href="http://www.ectrustprc.org.cn/certificate.id/certificateb.php?id=20035358"><img src="{{url('/mia/images/bluelogo.gif')}}" width="105" border="0"></a> <span style="display:inline-block;position:relative;width:auto;"><a style="display:inline-block;" kx_type="图标式" target="_blank" tabindex="-1" id="kx_verify" href="https://ss.knet.cn/verifyseal.dll?sn=e1410211101055522320bq000000&amp;ct=df&amp;a=1&amp;pa=0.9654322788119316"><img alt="可信网站" oncontextmenu="return false;" style="border:none;" src="{{url('/mia/images/cnnic.png')}}" width="80"></a></span> <a id="___szfw_logo___" href="https://credit.szfw.org/CX20151203012507100435.html" target="_blank"><img src="{{url('/mia/images/chengxin.jpg')}}" border="0"></a>
                <img src="{{url('/mia/images/alipay.jpg')}}" width="105"></p>
        </div>
    </div>
</div>
<div class="sideBar leftSide " style="display: none;">
    <img src="{{url('/mia/images/c28f17d15a13149cfa89f18dc32efb87.png')}}">
</div>
<div class="sideBar rightSide " style="display: none;">
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
</body>
</html>