@extends('user.cartlayout')
@section('title',$title)
@section('content')
<script src="{{url('/distpicker/js/distpicker.data.js')}}"></script>
<script src="{{url('/distpicker/js/distpicker.js')}}"></script>
<script src="{{url('/distpicker/js/main.js')}}"></script>
<link rel="stylesheet" href="{{url('/mia/style/cart_new.css')}}" type="text/css">
<link rel="stylesheet" href="{{url('/mia/style/cart.css')}}" type="text/css">
<link rel="stylesheet" href="{{url('/mia/style/cartAdd.css')}}" type="text/css">
<!-- 2015.10.22修改 -->
<style type="text/css">
body{background:#fff;}
.bknone .w1004 .right{background:#fff;}
.mscStep2 .rim{border-color: #ededed;}
.mscStep2 .title{background: #fafafa;height:50px;line-height:50px;color:#555;}
.conBlock{margin:0 20px;}
.conBlock .tit a{color:#f53294}
.sureaddress{padding-left:0;}
.border{border-top:none;}
.adressall{color:#333;width:960px;height: auto;}
.adressall ul{width:975px;}
.adressall ul li{height:160px;width:310px;margin-right: 15px;margin-top: 15px;}
.addnewadress{color:#fa4b9b;padding-left: 20px;display: block;padding-bottom:40px;float:left;}
.showAlladress,.hideAlladress{display:block;padding-right:34px;float:right;cursor:pointer;background:url(http://file02.miabaobei.com/resources/images/shArrow.png) no-repeat 76px 5px;color:#999;}
.hideAlladress{background-position: 76px -11px;}
.adress{border:1px solid #eee;background:none;height:131px;width:270px;padding:16px 19px 11px 19px;}
.f2{width:270px;height:133px;background:url(http://file02.miabaobei.com/resources/images/borderbg-310.png) no-repeat;border:none;padding:17px 20px 12px 20px;}
.adressover{ border:1px solid #fa4b9b;}
.f2.adressover{border: none;}
.szmr{float:right;display:none;}
.adressover .szmr{ display: block;}
.span1{font-weight: bold;}
.area{border-top:1px solid #eeeeee;}
.Consignee{padding-bottom:8px;}
.tplNameN1,.phone,.span1{float:none;display: inline;}
.editor a{float:none;color:#999;}
.area{padding:10px 0 5px 0;}
.adress .adr1{height:auto;line-height:18px;padding-bottom: 5px;}
table.msctab th{background:#fbfbfb;}
.freight .span1{font-weight: normal;}
.tjdd{background: none;}
.coupons{border-top: none;}
.pink{color:#666;}
.payTotol{float:right;padding-top:12px;}
.tjdd .pink{float:right;font-size: 24px;color:#fa4b9b;padding-right:140px;}
.taxrate{ position:relative;}
.taxrate .span1 {height:26px; line-height:26px;font-weight: normal;}
.taxrateip{ padding:4px 8px; text-align:left; border:1px solid #ffbdbf; background:#fffafa; display:none; border-radius:4px; position:absolute; z-index:10;right:95px; top:0px;line-height:20px;}
.taxrateimg{ position:absolute; z-index:102; right:-7px; top:7px;}
a.gotoSettlement{background:#fa4b9b;height: 42px;line-height: 40px;margin-left:15px;padding:3px 40px;margin-left: 19px;position: absolute;bottom:20px;right:20px;}
.p20{padding:20px 0;}
.sureaddress{padding-right:0;margin:0 20px;}
.gift{color: #fa4b9b}
.balance .cont{width:270px;}
.coupons {
    position: relative;
    clear: both;
    background: #fff;
    height: auto;
    min-height: 136px;
    padding: 10px 5px;
    padding-top: 20px;
    margin: 15px 15px 0;
    border-top: 1px solid #dbd7d8;
}
.numlabel{
  color: #f53294;
  font-size:14px;
    font-weight: bold;
}
/* 20160113新增 begin lz */
.Ntit1{font-size: 14px;font-weight: bold;margin:30px 20px 0px 20px;}
.p14{padding-top:14px;}
.table_bottom{border-bottom:1px solid #eeeeee;padding-top:20px;padding-bottom:24px;}
.table_bottom tr{height:24px;}
.table_bottom tr td {padding-top: 0;padding-bottom: 0;}
.last_table{padding-right:20px;}

.proimg{position: relative;top:4px}

.redIcoSp1 {position:relative;left:8px;display:inline-block;padding:2px 5px;border-radius:2px;border:1px #fa4b9b solid;color: #fa4b9b;}
.redIcoSp2 {position:relative;left:8px;display:inline-block;padding:2px 5px;border:1px #ffffff solid;color: #fff;}
.redIcoSp1:before, .redIcoSp1:after {
content: ' ';
height: 0;
position: absolute;
width: 0;
border: 4px solid transparent; 
}
.redIcoSp1:before {
border-right-color: #fff; 
position: absolute;
top: 50%;
margin-top:-4px;
left: -8px;
z-index: 2;
}
.redIcoSp1:after {
border-right-color: #fa4b9b; 
position: absolute;
top: 50%;
margin-top:-4px;
left: -9px;
z-index: 1;
}




/* 20160113新增 end lz */
</style>
<style>
.coupons .left {
    display: none;
}
.ext-tip {
    color: red;
    text-align: left;
    text-indent: 2em;
    font-size: 14px;
    padding: 20px 0;
    margin: 10px;
    font-weight: bold;
    border: 2px dashed #444;
    box-sizing: border-box;
}
</style>
<div class="mainHeader bknone">
  <div class="w1004">
    <div class="logo"><a href="{{url('/')}}" class="logolink">奶牙宝贝</a></div>
    <div class="right">
		<ul class="schedule songti step2">
	        <li class="actived_f">1.我的购物车</li>
            <li class="current">2.填写核对订单信息</li>
            <li>3.成功提交订单</li>
        </ul>
    </div>
  </div>
</div>
<!--/.mainHeader-->
<div id="tplAddr" style="display:none;">
    <!-- 地址 -->
    <li rowid="">
        <div class="adress adressover">
            <p class="Consignee">
                 <strong class="tplName"></strong>
                 <span class="span1">收</span>
                 <a href="javascript:void(0)" class="szmr setDefault">设为默认</a>     
                 <span class="moren" style="display:">默认地址</span>
            </p>
            <p class="tplArea area"></p>
            <p class="adr1"></p>
            <span class="phone tplPhone"></span>
            <div class="editor" style="">
                <!--a href="javascript:void(0)" class="bianji">修改</a-->
                <a href="javascript:void(0)" class="newdelete">删除</a>
            </div>
            <!--设为默认-->
            <!-- 2015.10.22 -->
            <!-- <div class="moren"><img src="http://file04.miabaobei.com/resources/images/morenicon.png')}}" alt=""></div> -->
            <input name="defaultRad" class="defaultRad" type="radio">
            <!--选中当前项-->
            <div class="adresssure"><img src="{{url('/mia/images/select-46.png')}}" alt=""></div>
            <input name="curRadio" class="curRadio" type="radio">
        </div>
    </li>
</div>

<div id="checkout" class="myShoppingCart w1004 mscStep2">
	<div class="rim">
    	<div class="title yahei">填写并核对订单信息</div>
        
        <div class="conBlock con01 border" id="ckstep1" data-ok="1" data-ck="{{$oid}}">
        
        
<!-- last chg by ouyangyu @20150311 v1 -->
        <div class="titnew">收货人信息&nbsp;&nbsp;&nbsp;&nbsp;<span class="checkerr" style="display: ;">请确认收货地址</span></div>
        @if(session('msg'))
        <div class="ext-tip">{{session('msg')}}</div>
        @endif
        <!--左边箭头-->
        
		<!-- 2015.10.22 start-->
		<div style="position:relative; width:979px;float:left; overflow:hidden;padding-bottom:22px;">
        <!-- <a href="javascript:void(0);" class="prev disabled" id="prev-01" style="display:none; position:absolute; left:0px; top:0px;">
        	<div class="leftsrow"> <img src="http://file04.miabaobei.com/resources/images/leftsrow.png')}}" alt=""/></div>
        </a> --><!-- 2015.10.22 end-->
		<div class="jCarouselLite adressall" id="demo-01">
            <ul>
                <!--选择地址-->
                <!-- default -->
                @foreach($address as $v)
                <li rowid="{{$v -> id}}">
                    <div class="adress {{$v -> id == $caid ? 'f2' : ''}}">
                        <p class="Consignee">
                            <strong class="tplNameN1">{{$v -> name}}</strong>
                            <span class="span1">收</span>
                            @if ($v -> is_default == 1)
                            <span class="moren" style="display:block">默认地址</span>
                            @endif
                            </p>
                        <p class="area">
                        <script>
                            var ext_province = ChineseDistricts[{{$v -> country}}][{{$v -> province}}];
                            var ext_city = ChineseDistricts[{{$v -> province}}][{{$v -> city}}];
                            var ext_area = ChineseDistricts[{{$v -> city}}][{{$v -> area}}];
                            document.write(ext_province);
                            document.write(' '+ext_city);
                            document.write(' '+ext_area);
                            document.write('<input type="hidden" value="'+ext_province+ext_city+ext_area+'">');
                        </script>
                        </p>
                        <p class="adr1">{{$v -> detail}}</p>
                        <span class="phone">{{$v -> phone}}</span>
                        <div class="editor" style="color: rgb(250, 75, 155);">
                            <!--a href="javascript:void(0)" class="bianji">修改</a-->
                            <a href="javascript:void(0)" class="newdelete">删除</a>
                            <!-- <a href="javascript:void(0)" class="szmr isDefault setDefault">设为默认</a> --></div>
                        <input name="defaultRad" class="defaultRad" {{$v -> is_default == 1 ? 'checked="checked"' : ''}} type="radio">
                        <div class="adresssure">
                            <img src="{{url('/mia/images/select-46.png')}}" alt=""></div>
                        <input name="curRadio" class="curRadio" {{$v -> id == $caid ? 'checked="checked"' : ''}} type="radio"></div>
                </li>
                @endforeach
                <!-- end default -->
            </ul>
            <div class="clear"></div>
		</div>        </div>
        <!-- 2015.10.22 start -->
        <span class="addnewadress" style="font-size:12px; font-weight:normal; cursor:pointer">+新增收货地址</span>
        <span class="addres" style="display: none"><span class="showAlladress hideAlladress">收起全部地址</span></span>
		<div class="clear"></div>
        <script type="text/javascript" language="javascript">
        $(document).ready(function(){
        	//reloadCarouselLite();	
        				showAddress();
			         });
        </script>
        <script type="text/javascript" language="javascript">
        $(document).ready(function(){
            $('.showAlladress').click(function() {
                
                if($(this).hasClass('hideAlladress')) {
                    $('.jCarouselLite').parent().css('height','187px');
                    $(this).removeClass('hideAlladress').text('显示全部地址');
                } else {
                    $('.jCarouselLite').parent().css('height','auto');
                    $(this).addClass('hideAlladress').text('收起全部地址');    
                }
            });
        });
        </script>

         <!--新地址，编辑地址 2-->
         <div class="newadress" style="display:none;">
          	<div class="tit">收货人信息</div>
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
					 <input id="new_id" name="new_id" type="hidden">
                                         <input id="new_address_id" name="new_id" type="hidden">
                     <input id="new_address_type" name="new_address_type" value="add" type="hidden">
                      <tbody><tr id="new_name">
                        <td width="10%" align="right"><span class="pink">*</span> 收货人：</td>
                        <td width="90%"><input id="ship_name" class="inp w138" onblur="check_shipping('name')" type="text">&nbsp;<span id="new_name_error" class="pink"></span></td>
                      </tr>
                      <tr>
                        <td align="right"><span class="pink">*</span> 所在地区：</td>
                        <td id="address_area">
                            <span id="span_town" style="display:none"></span><span id="new_area_error" class="pink"></span>
                            <div data-toggle="distpicker">
                            <select class="form-control" id="ship_province" name="province" style="height:23px;"></select>
                            <select class="form-control" id="ship_city" name="city" style="height:23px;"></select>
                            <select name="area" class="form-control" id="ship_area" style="height:23px;"></select>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="right"><span class="pink">*</span> 详细地址：</td>
                        <td><span></span><input class="inp w308" id="ship_address_detail" onblur="check_shipping('address')" type="text">&nbsp;<span id="new_address_error" class="pink"></span></td>
                      </tr>
                      <tr>
                        <td align="right"><span class="pink">*</span> 手机号码：</td>
                        <td><input class="inp w138" id="ship_mobile" onblur="check_shipping('mobile')" type="text">&nbsp;&nbsp;或&nbsp;&nbsp;&nbsp;&nbsp;
                            固定电话：<input id="ship_phone" class="inp w138" onblur="check_shipping('phone')" type="text">&nbsp;<span id="new_mobile_error" class="pink"></span></td>
                      </tr>

                       <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">
                        	<div class="btn_02 save01" id="saveAddress" data-addid="0">保存收货人信息</div>
                        	<div class="btn_02b save01" id="cancelAddress">取消</div>
                        </td>
                      </tr>
                    </tbody></table>
                    
         </div>
         <!-- 2015.10.22 -->
         
         <!--新地址，编辑地址结束-->  
        <div class="clearfix"></div>
<!-- last chg by ouyangyu @20150311 v1 end -->       
        

            <!--地址编辑-->

        </div>
                <!--发票信息-->
                
        <!--发票信息 end-->            
        <input id="itemType" data-ck="1" data-warehouse="0" type="hidden">
        <!-- 20160113修改 begin lz -->
        <div class="Ntit1">商品清单</div>
            <!-- 商品 -->
            <div class="conBlock con01 p14 border" id="ckContent">
                <div class="tit"></div>
                <!-- 20160113修改 end lz -->
                <table class="msctab tab03 msctabf" width="100%" cellspacing="0" cellpadding="0" border="0">
                    <thead>
                        <tr>
                            <th width="40%">商品</th>
                            <th width="18%">商户</th>
                            <th width="8%">单价</th>
                            <th width="12%">数量</th>
                            <th width="8%">小计</th>
                        </tr>
                    </thead>
                    <tbody class="table-suit">
                        @foreach($data as $value)
                        <tr>
                            <td>
                                <div class="mysp clearfix">
                                    <a href="{{url('/goods/'.$value -> gid)}}" target="_blank">
                                        <img src="{{url(config('app.goodsUrl').$value->img)}}" alt="{{$value -> name}}" width="50" height="50"></a>
                                    <div class="single-row">
                                        <div class="txt">{{$value -> name}}</div>
                                        <b>
                                        </b>
                                    </div>
                                </div>
                            </td>
                            <td align="left">{{$value -> merchantName}}</td>
                            <td align="left">¥{{$value -> price}}</td>
                            <td align="left">{{$value -> nums}}</td>
                            <td align="left">¥{{$value -> nums * $value -> price}}</td>
                        </tr>
                        @endforeach
                        <!-- 赠品 start -->
                        <!-- 赠品 end -->
                    </tbody>
                </table>
                <!-- 20160113新增 begin lz -->
            </div>
        <!-- 20160113新增 end lz -->
		<div class="coupons">
            <div class="left 1">
                <!-- 代金券 -->
                <div style="cursor: pointer;float:left;" id="getcouponlist">
                	<strong>+点击使用代金券</strong>
                </div>
                <div id="coupon_line" style="display:none;"></div>
                <div class="clearfix"></div>
                <div class="couponcon" style="display: none;border:0px solid #fff;">
                </div>  
                <div id="couponDiv" class="ajaxcoupon" style=" position:relative; display:none; margin-top:20px;">
                    <div style="height:34px; overflow:hidden;">
                    <input name="couponCode" placeholder="填写代金券兑换码" class="inp w138" style="float:left;" type="text"> 
                    <a href="javascript:void(0)" id="useCoupon" style="float:left; margin-left:5px;">使用</a>
                    
                    <span class="useCouErr"><img src="{{url('/mia/images/tipnamebg2.png')}}" class="useCouErrImg"><span class="useCouErrHtm"></span></span>
                    </div>
                  
					<p style="line-height: 30px">小贴士：</p>
                    <p>每个订单只能使用一张代金券，订单取消或退货后，代金券不能恢复使用。</p>
                </div>
                <div class="couponsucess" style="display: none;">
                    <span>代金券减免<strong>0</strong><b>元</b></span>
                    <a href="javascript:void(0)" class="delCoupon">取消</a>					
                </div>
                <!---------------红包------------------>
                                <input id="redbag_spec" value="" type="hidden">
                <div style="display:none; else block;;cursor: pointer; clear:both; margin-top:25px;" id="getRedPaperList">
                    <strong>+使用红包抵消部分总额（您有<font color="red">0</font>个红包可用）</strong>
                </div>
                <div class="redPapercon" style="display:none;">
                   <div class="usertip2"><span class="usertipcon2"></span>
                       <span class="usertipimg2"> <img src="{{url('/mia/images/icon2.png')}}" alt=""></span>
                   </div>
                   <div class="redThead">
                    <table style="position:relative; z-index:2" width="100%" cellspacing="0" cellpadding="0" border="0">
                     <tbody><tr bgcolor="f5f5f5" height="35">
                     	<td width="60">面额</td>
                        <td width="200">有效期</td>
                        <td width="200">来源</td>
                        <td width="">&nbsp;</td></tr>
                     </tbody>
                   </table>
                   </div>
                   <div class="redBody">
                   <table style="position:relative; z-index:2" width="100%" cellspacing="0" cellpadding="0" border="0">
                     <tbody>
                                         </tbody>
                   </table>
                   </div>
                </div>                
                <div class="redbagsucess" style="display: none;">
                    <span>红包减免<strong>0</strong><b>元</b></span>
                    <a href="javascript:void(0)" class="delCoupon1">取消</a>					
                </div>
                                <!-- 账户余额 -->
          
                <div class="balance" id="balance">
                    <h5>+点击使用账户余额</h5>
                    <div class="cont" style="display: none">
                        <label for="c1"><input class="checkbox" id="c1" name="balance" disabled="disabled" type="checkbox"> 使用余额（账户当前可用余额：<font color="red">0</font>元）</label>
                        <i><b></b></i>
                    </div>
                </div>
              
            </div>
                                
            <div class="right l">
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    
                  <tbody><tr>
                    <td width="81%" align="right"><span class="pink"><label class="numlabel">{{$totalCount}}</label></span> 件商品，总商品金额：</td>
                    <td width="19%" align="right"><span class="pink" id="deal_price" data-price="{{$total}}">¥{{$total}}</span></td>
                  </tr>
                                    <!--<tr>
                    <td align="right">活动优惠：</td>
                    <td align="right" id="coupon_price" class="pink" data-price="0">&yen;<span>0</span></td>
                  </tr>-->
                  <tr id="coupon_td" style="display:none;">
                    <td align="right">代金券：</td>
                    <td id="coupon_price" class="pink" data-price="0" align="right">-¥<span>0</span></td>
                  </tr>
                   <tr id="redbag_td" style="display:none;">
                    <td align="right">红包：</td>
                    <td id="redbag_price" class="pink" data-price="0" align="right">-¥<span>0</span></td>
                  </tr>
                  
                  
                  
                  <tr>
                    <td align="right"><div class="freight">
                     
                     <div class="freightip shipping_a">
                         支付商品快递费用
                          <div class="freighimg"><img src="{{url('/mia/images/payicon.png')}}" alt=""></div>
                     </div>
                          
                    <span class="span1">运费：</span> <span class="problemicon"><img src="{{url('/mia/images/problem.png')}}" alt=""></span>  
                    
                    </div></td>
                    <td id="total_shipping_fee" data-price="{{$shipping}}" align="right"><span class="pink">¥{{$shipping}}</span></td>
                  </tr>
                  
                  <!-- 2015.10.22 start-->
                                    <tr>
                  </tr><tr id="balance_td" style="display:none;">
                      <td align="right">账户余额：</td>
                      <td id="balance_price" class="pink" data-price="0" align="right">-¥<span>0</span></td>
                  </tr>
                    <tr><td align="right" height="24">应付总额：</td>
                    <td id="pay_total" data-price="{{$total}}" align="right" height="24">
                        
                        <span class="pink">¥<span>{{$commTotal}}</span></span>
                    </td>
                  </tr><!-- 2015.10.22 end-->
                </tbody></table>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('.taxrate').find('.problemicon').mouseenter(function() {
                            $('.taxrateip').show();
                        }).mouseleave(function() {
                            $('.taxrateip').hide();
                        });
                    });
                </script>
                <!--                <p class="f12 pink" style="margin-top:8px;text-align:right;">此订单中包含预售商品，预计在1970-01-01日发货</p>-->
                                
        	</div>
        	<div class="clearfix"></div>
        </div>
        <!--地址-->
        <div class="payway sureaddress"></div>
         <!--地结束-->
        <div class="clearfix tjdd" id="lastPart">
            <span id="loading" style="display: none;">载入中，请稍等...</span>
            <a href="{{url('/user/cartOrder/backcart/'.$oid)}}" class="ContinueToBuy">返回修改购物车</a>
            <a href="javascript:void(0)" class="gotoSettlement yahei r" id="placeOrder" data-w="0">结算</a><span class="pink yahei">¥<span>{{$commTotal}}</span></span><span class="payTotol">应付总额：</span>
            <!-- 海关提醒 -->
			<div class="custWarning" style="display: none;">
	            <i></i>
	            <h5>温馨提示：</h5>
	            <p>订单中 <span class="skus"></span></p>
	        </div>
	        <!-- /海关提醒 -->
        </div>
  </div>
</div>
<link rel="stylesheet" href="{{url('/mia/style/jquery-ui.css')}}" type="text/css">
<script type="text/javascript" src="{{url('/mia/js/jquery-dialog-min.js')}}"></script>
<script type="text/javascript" src="{{url('/mia/js/jquery-confirm.js')}}"></script>

<script type="text/javascript" src="{{url('/mia/js/order_coupon.js')}}"></script>
<script type="text/javascript" src="{{url('/mia/js/orderxg.js')}}"></script>
<script type="text/javascript" src="{{url('/mia/js/jcarousellite.js')}}"></script>
<script type="text/javascript">
    $('.proimg').hover(function(){
      $('.freightip.shui').css({display:'block',right:'80px'});
    },function(){
         $('.freightip.shui').hide();
    })    
    </script>
<script type="text/javascript">// <![CDATA[
var google_tag_params = {
//BFD商品页参数开始
	bfd_sid : getcookie('sid'),
    bfd_cart_listgoods : "1126659,1126659 ",
    bfd_freight : "",
    //晶赞
	jz_productId_list : "1126659,",
	jz_totalPrice : 14.5,
	jz_totalNum: 1,
//criteo购物车商品列表
    cr_cart_items :  [{id:1126659,price:{{$total}},quantity:1},],
    p_type :'d'
  };
</script>

<script type="text/javascript">
//聚效DSP
var _mvq = window._mvq || [];window._mvq = _mvq;
_mvq.push(['$setAccount', 'm-113955-0']);
_mvq.push(['$setGeneral', 'goodsdetail', '', /*用户名*/ '', /*用户id*/ '']);
_mvq.push(['$logConversion']);
_mvq.push(['setPageUrl', /*单品着陆页url*/google_tag_params.mvq_setPageUrl]); //如果不需要特意指定单品着陆页url请将此语句删掉
_mvq.push(['$addGoods',/*分类id*/ google_tag_params.mvq_category_id, /*品牌id*/ google_tag_params.mvq_brand_id, /*商品名称*/ google_tag_params.mvq_name ,/*商品ID*/ google_tag_params.mvq_id,/*商品售价*/ google_tag_params.mvq_sale_price, /*商品图片url*/ google_tag_params.mvq_imgurl, /*分类名*/ google_tag_params.mvq_category_name, /*品牌名*/ google_tag_params.mvq_brand_name, /*商品库存状态1或是0*/ google_tag_params.mvq_status, /*网络价*/ google_tag_params.mvq_market_price,/*收藏人数*/ '', /*商品下架时间*/ '']);
_mvq.push(['$logData'])
</script>

@endsection('content')