@extends('user.cartlayout')
@section('title',$title)
@section('content')
<style>
    div.it_img {
        height: auto;
    }
</style>
<link rel="stylesheet" href="{{url('/mia/style/cart_new.css')}}" type="text/css">
<link rel="stylesheet" href="{{url('/mia/style/cart.css')}}" type="text/css">
<link rel="stylesheet" href="{{url('/mia/style/jqwin.css')}}">
<style>
#confirmDiv .ok { display:inline-block; zoom:1; *display:inline; border:1px #ff69b3 solid; margin:0 5px;
 background:#ff69b3;width:63px; height:24px; line-height:24px; text-align:center; color:#fff; border-radius:3px;
}
#confirmDiv .cancel { display:inline-block; zoom:1; *display:inline; border:1px #d6d6d6 solid; margin:0 5px;
 background:#fcfcfc;width:63px; height:24px; line-height:24px; text-align:center; color:#000; border-radius:3px;
}
.fixed_c_count{position: fixed;background-color: #fff;z-index: 9;bottom: 0;width: 970px}
/*
#confirmDiv { position:absolute; top:50%; left:50%; margin:-87px 0 0 -183px; width:367px; height:174px;}
*/
.dpyushou{margin-top: 5px;color:#999;}
.tzyushou{float:left;margin-top: 10px;margin-left:-44px;color:#999;}/* 20151021购物车修改-lz */
body,.bknone .w1004 .right,.c_title,.cl_tit_Newbg{background: #fff;}
.cl_items .gooditem,.c_list{overflow:inherit;}
.it_operate{width:48px;}
.cl_0{background: #fafafa;}
.c_title{border-bottom:2px solid #eaeaea;border-top:none;padding: 10px 0px;margin-left: 10px;margin-right: 10px;}
.c_title span{border-bottom: 2px solid #fa4b9b;padding-bottom: 10px;padding-right: 10px;color: #333;}.cl_wordsNew{margin-left: 5px;margin-top: 4px!important;font-size:18px;color:#333;font-family: 'Microsoft YaHei';}
.c_list .cl_con{margin-bottom:0px;border:1px solid #ededed;}
.c_count{background: #f8f8f8;border-left:1px solid #ededed;border-right:1px solid #ededed;margin: 0 15px; padding-bottom: 15px;}
.c_count .funcs,.c_count .statistics{border-top:none;font-size:12px;color: #999;}
.c_count .statistics{float: right;padding-right: 18px;}
.funcs label{font-size:14px;font-weight: bold;padding-right:15px;}
.newCart_ze{margin-top: 28px;margin-bottom: 8px;}
.newCart_ze,.newCart_yh,.newCart_sf{float: right;width:100%;}
.newCart_zespan,.newCart_yhspan{width: 383px;float: left;}
.newCart_jies{float: right;}
.c_count .statistics .totals1{margin-top: 8px;}
.c_count .statistics .totals0{width: 320px;margin-top: 11px;}
.newCart_jies{margin-top: 10px;}
.submitloading{float: right;}
.schedule{background: url({{url('/mia/images/cart_step_fN.png')}}) no-repeat;clear: both;}
.cl_tag.disabled_h span{background: #fb5b71;}
.cl_tag.disabled{background: none;width:58px;height:28px;margin-left:19px;margin-right:10px;}
.cl_tag.disabled span{background: #fb5b71;color: #fff;text-align: center;height:28px;width:58px;padding: 0;line-height: 28px;font-size: 14px;}
.goodno_sl{position:relative;*zoom:1;}
.goodno_sl span{background: url({{url('/mia/images/cart_sl_up.png')}}) no-repeat right center;width: 46px;display: inline-block;cursor: pointer;}
.it_des .goodno{margin-top: 6px;}
.it_des .goodno.goodno_color{color: #fa4b9b}
.cart_sl_over{background: url({{url('/mia/images/cart_sl_over.png')}}) no-repeat;width: 212px;height:44px;line-height:2;position: absolute;top: 17px;color: #fb5b71;padding: 12px;left:0;display: none;}
    /* 满减---如果不是高亮，在span的父级增加.disabled_h */    /* 满减---.cl_words里加颜色加.cl_wordsc, */
.cl_wordsc{color: #999999;}
    /* 选中状态---.gooditem里加颜色加.newCart_xz, */
.cl_words em{font-size: 12px;font-family: Verdana, Geneva, sans-serif;color: #666;}
.newCart_xz{background-color: #fffaf3;}
.cl_tit{padding: 14px 26px;}
.cl_words{margin-top: 8px!important;}
.cl_words_new{margin-top: 4px!important;}
.cl_words a{color:#fb5b71;font-size: 14px;margin-left: 17px;}
.cl_words a:hover{text-decoration: underline;}/*"奶牙广州保税仓发货"失效版块样式*/
.cl_items_SX{background: #fafafa;border-bottom: 1px dashed #e6e6e6;border-top: 1px dashed #e6e6e6;}
.it_mck .mck{margin-left: 12px;}
.it_mck_SX{margin-top: 34px;width: 41px;height: 22px;margin-right: 9px;background: url({{url('/mia/images/cart_sx_f.png')}}) no-repeat;}
.cl_items .gooditem{margin:0;padding-left: 14px;}
.c_count_gz{background: #fff;}
.c_count_gz  .statistics{color: #333333}
.c_count_gz .funcs,.c_count_gz .statistics{height: 209px;}
.newCart_sf{position: relative;margin-top: 10px;}
.cart_sf_bg{background: url({{url('/mia/images/cart_sx_sf.png')}}) no-repeat;display: block;width: 153px;height: 24px;color: #fa4b9b;text-align: center;line-height: 24px;position: absolute;top:-5px;left:166px;}
/*"奶牙重庆保税仓赠品样式*/
a.cart_zp_btn{background: url({{url('/mia/images/cart_zp.png')}}) no-repeat;display: inline-block;width: 68px;height:28px;font-size: 12px;text-align: center;line-height: 28px;cursor: pointer;}
a.cart_zp_btn:hover{text-decoration: none;}
/*"奶牙宁波保税仓赠品样式*/
.cl_words_zp em{font-size: 12px;}
.cl_words_zp{color: #999999;display: block;}/*展示大图样式*/
.viewpic_block{width: 320px;background: #fff;padding:10px;box-shadow: 2px 2px 5px #999;-webkit-box-shadow: 2px 2px 5px #999;display: block;position: absolute;z-index: 100000; display: none;border:1px solid #f3f3f3;}.viewpic_con{background:#fff;width: 100%;min-height: 200px;margin:0;padding: 0}
.viewpic_con img{width:100%;}
.viewpic_arrow{position: absolute;left: -10px;top:45%;display: block;width: 10px;height:15px;background: url({{url('/mia/images/cart_viewpic_arrow.png')}}) no-repeat;}
/*无货异常*/
.tzlist{overflow: hidden;}
/* 20160112增加 lz */
.it_img{position:relative;}
.Integrated{color:#fb5b71;font-size:14px;margin-left:14px;}
.HongKong{width:100%;height:26px;display: inline-block;position: absolute;bottom:0;left:0;background: url(http://img.miabaobei.com/d1/p2/2016/01/13/e2/93/e293103bcb2428cbd56daa42616beff1.png')}}) no-repeat;color:#fff;text-align: center;line-height: 26px;font-size:14px;}
.Nactivity{width:100%;height:100%;display: block;position:absolute;top:0;left:0;background: url(http://img.miabaobei.com/d1/p2/2016/01/13/11/4d/114d8d57cf6a0c410ad8cbeb9704072d.png')}}) no-repeat;color:#fff;text-align: center;line-height: 80px;font-size:14px;}
.Nexplain{position:relative;background:#fff7c9;clear: both;width: 807px;padding:22px 20px 12px 20px;line-height:24px;font-size: 18px; margin-top: 25px; margin-bottom: 6px;margin-left:50px;color:#a69464;}
.Nexplain span{color:#bc0a47;margin-right:17px;}
.Newborn{position:absolute;top:-18px;left:50%;margin-left:-112px;background: url(http://img.miabaobei.com/d1/p3/2016/04/27/7c/0b/7c0b805b404c71a4d5519d58f4ed13ba.png')}}) no-repeat;width:224px;height:36px;}
.full_diff_money{color:#fb5b71;}
/* 20160219增加 lz */
.bay{color:#fc62af;display: block;margin-top: 7px;font-size: 14px;}
.cl_items .gooditem_shd{border-bottom: 1px dashed #e6e6e6;}
.failed0 {background:none;}</style>
<div class="mainHeader bknone">
  <div class="w1004">
    <div class="logo"><a href="/" class="logolink">奶牙宝贝</a></div>
    <div class="right">
        <ul class="schedule songti step1">
            <li class="current">1.我的购物车</li>
            <li>2.填写核对订单信息</li>
            <li>3.成功提交订单</li>
        </ul>
    </div>  </div>
</div>

@if(!empty($data))
<div class="c_wrap w1004" id="shopping_cart">
    <div class="c_title yahei">
        <span>我的购物车</span>
        <!-- <span class="nums">(<span><em>30</em>/99</span>)</span> --></div>
    <div class="c_menu">
        <div class="ci ci0 ">
            <div class="inputwarp nocheck">
                <input class="mckall" value="0" data-checktype="0" type="checkbox"></div>
            <label>全选</label></div>
        <div class="ci ci1">商品</div>
        <div class="ci ci2">规格</div>
        <div class="ci ci3">单价</div>
        <div class="ci ci4">数量</div>
        <div class="ci ci5">小计</div>
        <div class="ci ci6">操作</div>
    </div>
    
    <!-- 商户 -->
    @foreach($data as $value)
    <div class="c_list store_0">
        <div class="cl_con">
            <div class="cl_tit cl_">
                <div class="inputwarp nocheck">
                    <input class="mckall" value="0" data-checktype="1" type="checkbox"></div>
                <!-- 20151021修改 lz begin -->
                <div class="cl_wordsNew">
                    <!-- <span>0</span>件商品</span> -->
                    <span>{{$value['merchantName']}}</span></div>
                <!-- 20151021修改 lz end --></div>
            <div class="cl_promotion promotion_12297">
                <div class="cl_items promotion ">
                    <!-- 商品 -->
                    @if(!empty($value['sub']))
                    @foreach($value['sub'] as $v)
                    <div class="gooditem gooditems_{{md5($v->gid)}}  clearfix " style="border-bottom: medium none;">
                        <div class="it_mck nocheck">
                            <input gf="0" name="productcheck" class="mck" data-checktype="3" cart-sku="{{$v->gid}}" value="{{md5($v->gid)}}" data-standard="{{md5($v->standard)}}" type="checkbox"></div>
                        <!-- 20160113增加活动区域 begin lz -->
                        <div class="it_img">
                            <a href="{{url('/goods/'.$v->gid)}}" title="{{$v->name}}" target="_blank">
                                <img src="{{url(config('app.goodsUrl').$v->img)}}" alt="{{$v->name}}"></a>
                        </div>
                        <!-- 20160113增加活动区域 end lz -->
                        <div class="it_des">
                            <p class="goodname N_h">
                                <a href="{{url('/goods/'.$v->gid)}}" title="{{$v->name}}" target="_blank">{{$v->name}}</a></p>
                            <p class="goodno">商品编号：{{$v->code}}</p></div>
                        <div class="it_size"></div>
                        <div class="it_price">
                            <p class="goodsp">{{$v->price}}</p>
                            <!--p class="goodmp">14.80</p-->
                        </div>
                        <div class="it_num">
                            <div class="dp_bt">
                                <span class="dpcom dp_jian" id="cart_deduct"></span>
                                <input autocomplete="off" name="count" class="dp_num" maxlength="2" value="{{$v->num}}" rowid="{{$v->gid}}" warehouse_id="{{$v->mid}}" data-standard="{{md5($v->standard)}}" readonly type="text">
                                <span class="dpcom dp_jia" id="cart_add" data-max="{{$v->total}}"></span>
                            </div>
                        </div>
                        <div class="it_total subTotal">
                            <span class="item_fee">¥{{$v->price * $v->num}}</span>
                            <br>
                            <span class="tax"></span>
                        </div>
                        <div class="it_operate">
                            <p class="sc">
                                <a href="javascript:;" class="delete">删除</a></p>
                            <p class="xgyh">
                                <!--参加的活动--></p>
                            <div style="display: none;" class="hidden_promotion_list_e34804640b3ed5dcbfe6b4c6824d2e95"></div>
                            <p>
                            </p>
                        </div>
                        <div class="line" style="height: 80px;"></div>
                    </div>
                    @endforeach
                    @endif
                    <!--end loop-->
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="c_countn cashier_part" id="cashier_part">
        <div class="funcs">
            <div class="inputwarp nocheck">
                <input class="mckall" value="0" id="mckall" data-checktype="0" type="checkbox"></div>
            <label>全选</label>
            <a href="javascript:;" id="removeAll" class="removeAll">删除选择商品</a>
            <a href="javascript:;" class="removeFail">清除无效商品</a>
            <a href="javascript:;" id="batchAddMine" class="batchAddMine">移入收藏夹</a></div>
        <div class="newCart">
            <div class="ze" style="margin-top: 15px;">
                <span>已选择商品
                    <label class="newCart_select_quantity">0</label>件</span>
                <span>合计（不含运费）：
                    <label class="newCart_settle_amount">￥0</label></span>
            </div>
            <div class="yh">
                <span class="bracket" style="display: none;"></span>
                <span class="thrift_price" style="display:none;">已减：￥</span>
                <span class="dot" style="display: none;">，</span>
                <span class="taxes_price" style="display:none;">：￥</span>
                <span class="bracket" style="display: none;"></span>
            </div>
        </div>
        <a class="newCart_jies btnJieSuan  disabled">去结算</a></div>
</div>
@else
<div class="myShoppingCart w1004 bacfff">
	<div class="empty">
    	<p class="yahei f30 gray2 pb20">您还没有为您可爱的宝宝挑选任何商品哦~</p>
        <p>您可以去 <a href="{{url('/')}}" class="pink f14 blod">首页</a> 挑选宝宝喜欢的商品</p>
    </div>
</div>
@endif
<div style="margin-top:20px;"></div>
    <!--还购买的列表-->
    <!-- 弹层阴影 -->
<div class="popBg"></div>
<!-- 温馨提示弹层 start -->
<div class="popCart" style="margin-top:-170px;">
    <span class="pop_closeBtn"></span>
    <img src="{{url('/mia/images/pop_rbsmaile.png')}}" alt="">
    <h3 class="pop_tit">温馨提示</h3>
    <div class="pop_txt">
        <p>免税店和直邮商品需要办理清关手续，请您配合实名认证，以确保您购买的商品顺利通过海关检查。</p>
        <p>如有疑问，请您随时拨打奶牙客服热线400-789-2000咨询。</p>
    </div>
    <a class="popGo" href="http://local.naiya.cc/my_identification.html" target="_blank" title=""></a>
</div><!-- 实名认证 start -->
<div class="popCart_name" style="margin-top:-110px;display:none;">
    <span class="pop_closeBtn"></span>
    <img class="popImg" src="{{url('/mia/images/pop_rb.png')}}" alt="">
    <h3 class="pop_tit">温馨提示</h3>
    <div class="pop_txt">免税店和直邮商品需要办理清关手续，请您配合<a href="http://local.naiya.cc/my_identification.html" target="_blank" title="">实名认证</a>以确保您购买的商品顺利通过海关检查。</div>
    <a class="popGo" href="http://local.naiya.cc/my_identification.html" target="_blank" title=""></a>
</div><script type="text/javascript">
$(function() {
	$('span.pop_closeBtn').mouseover(function() {
		$(this).addClass('pop_closeBtnH');
	}).mouseleave(function() {
		$(this).removeClass('pop_closeBtnH');
	}).click(function() {
		$(this).parent().hide();
		$('.popBg').hide();
	});
	$('.popGo').mouseover(function() {
		$(this).addClass('popGoH');
	}).mouseleave(function() {
		$(this).removeClass('popGoH');
	});
});
</script>
<!-- 实名认证 end -->
<!-- 温馨提示弹层 end -->
<script type="text/javascript" src="{{url('/mia/js/jquery-dialog-min.js')}}"></script> 
<script type="text/javascript" src="{{url('/mia/js/jquery-confirmCart.js')}}"></script> 
<script type="text/javascript" src="{{url('/mia/js/cart.js')}}"></script><!--展示大图-->
<script type="text/javascript" src="{{url('/mia/js/viewpic.js')}}"></script>
<script>
    (function(){
        $('.it_img').viewPic();
    })();
</script>
<div id="viewpic_block" class="viewpic_block">
    <i class="viewpic_arrow"></i>
    <div class="viewpic_con"></div>
</div>
 <script>
 function changeWarpClass(that) {
  if (that.prop('checked')) {
    that.parent().removeClass('nocheck').addClass('checked');
  } else {
    that.parent().removeClass('checked').addClass('nocheck');
  }
}$(function() {
  //初始化
  
  if(!$('#shopping_cart :input:checked')){
    $('.newCart_jies').addClass('disabled');
  }  
  checkAll();  
  $('#shopping_cart').find(':checkbox').each(function() {
    changeWarpClass($(this));
  });
  $('#shopping_cart').on('change', ':checkbox', function() {
    var checktype = $(this).data('checktype');
    var that = $(this);
    console.log(that);
    //data(checktype) 0:全选 1:店铺选中　2：活动选中 3：单选  //todo: 4：礼物选中 
    switch (checktype) {
      case 0:
        changeAllItem(that);
        break;
      case 1:
        changeShopItem(that);
        break;
      case 2:
        changeActivItem(that);
      case 3:
        changeSignItem(that);
        break;
      case 4:
        changegiftItem(that);
        break;
      default:
        //console.log(checktype);
        break;
    }
    checkAll();
    //不考虑性能的监听全局改变 
    setTimeout(function() {
      $('#shopping_cart').find(':checkbox').each(function() {
        changeWarpClass($(this));
      });
    }, 0);  })
  //设置组内最后的样式
  $('.cl_items.promotion .line').last().css('height', '80px');
});
/*data(checktype) 0:全选 1:店铺选中　2：活动选中 3：单选  //todo: 4：礼物选中 
 * 店铺层 1 .c_list store_   活动层 2 .cl_promotion  商品层3 .gooditem   
 * select 选中为1 取消为0  opid 好像没什么用
 * 
 * */function initSelectInfo(that) {
  var ischeck  = that.prop('checked')
  var select = ischeck ? 1 : 0;
  var row_ids = [];
  var standard = [];
  var selectInfo = { row_id: row_ids, standard: standard, select: select, opid: [] };
  var parent = that.parentDom;
  parent.find(':checkbox').filter(function(){
   return !$(this).prop("disabled");
  }).each(function() {
    //need exclude that ?? 
   
    $(this).prop('checked', ischeck);
    var checktype = $(this).data('checktype');
    if (checktype == '3') {
      row_ids.push($(this).val());
      standard.push($(this).attr('data-standard'));
    }
  })
  that.parentDom = null;
  return selectInfo;
}function changeAllItem(that) {
  that.parentDom = $('#shopping_cart');
  var selectInfo = initSelectInfo(that);
 batchChangeSelect(selectInfo);
}
function changeShopItem(that) {
  that.parentDom = that.closest('.c_list');
  var selectInfo = initSelectInfo(that);
  batchChangeSelect(selectInfo);}
function changeActivItem(that) {
  that.parentDom = that.closest('.cl_promotion');
  var selectInfo = initSelectInfo(that);
  batchChangeSelect(selectInfo);
}
function changeSignItem(that) {
  that.parentDom = that.parent();
  var selectInfo = initSelectInfo(that);
  changeSelect(selectInfo);
}
  function checkAll (){
  var allCheckflag=true, noCheckFlag=true, checkAllPromotion = true, checkAllItem = true, itemLen =[];
    $('.c_list').each(function() {
    var $shop = $(this);
    var activflag = true;
    //查找每个cl_promotion 下的item是否都选中
    $shop.find('.cl_promotion').each(function() {
      var $activ = $(this);
      var itemflag = true;
      $activ.find('.cl_items :checkbox').filter(function(){ 
          return !$(this).prop("disabled");
      }).each(function() {
        var $item = $(this);
        if (!$item.prop('checked')) {
          itemflag = false;
          activflag =false;
          allCheckflag = false;
          checkAllItem = false;
        }else{
           itemLen.push(1);
          noCheckFlag = false;
        }
      })/*单选层end*/
      $activ.find('input[data-checktype="2"]').prop('checked', itemflag);
    })/*活动层end*/
    if(!activflag)checkAllPromotion = false;
    $shop.find('input[data-checktype="1"]').prop('checked', activflag);
  })
  /*商铺层end*/
  $('#shopping_cart').find('input[data-checktype="0"]').prop('checked', (checkAllPromotion && checkAllItem && itemLen.length > 0) ?  true : false);if(noCheckFlag){
  $('.newCart_jies').addClass('disabled');
}else{
  $('.newCart_jies').removeClass('disabled');
}
} </script>
<!-- 优惠活动列表 -->
<div class="promotionLists" id="promotionLists"> </div>
<!-- 优惠活动列表 -->
<div id="dialog"></div>

@endsection('content')