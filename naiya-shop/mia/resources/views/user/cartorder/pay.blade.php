@extends('user.cartlayout')
@section('title',$title)
@section('content')
<link rel="stylesheet" href="{{url('/mia/style/cart.css')}}" type="text/css">

<script src="{{url('/distpicker/js/distpicker.data.js')}}"></script>
    <style type="text/css">
    body,.bknone .w1004 .right{background: #fff;}
    .w1004 {
        margin-bottom: 50px;
    }
    .TheCountdown {
        width: 130px;
    }
    </style>
    <div class="mainHeader bknone">
      <div class="w1004">
        <div class="logo">
          <a href="/" class="logolink">奶牙宝贝</a></div>
        <div class="right">
          <ul class="schedule songti step3">
            <li class="actived_f">1.我的购物车</li>
            <li class="actived_f">2.填写核对订单信息</li>
            <li class="current">3.成功提交订单</li></ul>
        </div>
      </div>
    </div>
    <!--/.mainHeader-->
    <div class="myShoppingCart w1004 mscStep2">
      <div class="rim" id="successPay">
        <div class="cartNoticehint">
          <h4 class="yahei">订单提交成功，仅差一步完成购物，请尽快支付！</h4>
          <div class="tomorrow_timer"></div>
          <div class="spvm">
            <span>请在
              <span class="TheCountdown">
                <span id="timerTitleColumn">距结束：</span>
                <span id="counterColumn">
                  <span class="appw t0"></span>
                  <span class="cntSeparator" style="display: none;">天</span>
                  <span class="appw t1">{{$last_h}}</span>
                  <span class="cntSeparator">时</span>
                  <span class="appw t2">{{$last_m}}</span>
                  <span class="cntSeparator">分</span>
                  <span class="appw t3">{{$last_s}}</span>
                  <span class="cntSeparator">秒</span>
                  <span class="appw t4"></span>
                  <span class="cntSeparator"></span>
                </span>
              </span>内完成支付。</span>
            <b>待支付：
              <em>￥{{$order->total}}</em></b>
          </div>
          <div class="spvm_f">到期未付款订单将会被取消。</div></div>
        <div class="cartNotice">
          <div class="paytype">
            <div class="tit">选择支付方式</div>
            <input id="success_ordercode" value="20160620591306792" type="hidden">
            <div class="otherbc rel">
              <span class="toparrow">
                <span></span>
              </span>
              @foreach($payways as $key => $value)
              @if($key == 1)
              <div class="cblock">
                <div class="tit">平台支付</div>
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                    @foreach($value as $k=>$v)
                    @if($k%2 == 0)
                    <tr>
                    @endif
                    <td width="45%" height="120">
                        <input data-payway="{{$v->id}}" {{$v->id == $order->payId ? 'checked=checked' : ''}} name="payway" value="{{$v->way}}" id="bank_{{$v->way}}" type="radio">
                        <label for="bank_{{$v->way}}" class="bankCards {{$v->id == $order->payId ? 'bcurrent' : ''}}">
                          <img src="{{url(config('app.paywayUrl').$v->img)}}" alt="{{$v->name}}"></label>
                      </td>
                      
                    @if(($k+1)%2 == 0)
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              @endif
              @if($key == 2)
                  @continue
              <div class="cblock cblock-f" id="payTab">
                <!--这里是付款的方式Tab-->
                <div class="tabLi">
                  <ul class="tab">
                    <li class="curr" onclick="tabs('#payTab',0)">网银支付</li>
                    <!--li onclick="tabs('#payTab',1)">快捷支付</li--></ul>
                  <!--p class="ico0A2">不需要开通网银，有卡就能付哦<img src="http://img.miabaobei.com/d1/p2/2015/11/17/54/6a/546a181df6eae17d1e7b54076926f17d.png" class="ico0A2Img"></p--></div>
                <div class="tabcon">
                  <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    @foreach($value as $k=>$v)
                    @if($k%4 == 0)
                    <tr>
                    @endif
                        
                        <td>
                          <input name="payway" value="{{$v->way}}" id="bank_{{$v->way}}" type="radio">
                          <label for="bank_{{$v->way}}" class="bankCards">
                            <img src="{{url(config('app.paywayUrl').$v->img)}}" alt="{{$v->name}}"></label>
                        </td>
                        
                    @if(($k+1)%4 == 0)
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              @endif
              @endforeach
              <!--<p class="f12 pink" style="margin-top:8px;">目前金额500元以上订单，暂不支持信用卡的网银支付，请您使用支付宝或储蓄卡的网银付款。敬请谅解！</p>-->
            </div>
            <div class="ddxx">收货信息：{{$order->name}} 
           <script type="text/javascript">
            var p = ChineseDistricts[{{$order->country}}][{{$order->province}}];
            
            var c = ChineseDistricts[{{$order->province}}][{{$order->city}}];
            
            var a = ChineseDistricts[{{$order->city}}][{{$order->area}}];
            
            document.write(p);
            document.write(' ');
            document.write(c);
            document.write(' ');
            document.write(a);
            </script>
            {{$order->detail}} {{$order->phone}}
              <br>支付配送：在线支付 - 普通快递
              <br>应付金额：
              <span class="pink ver f20">{{$order->total}}</span>元
              <br>您还可以：
              <a href="{{url('/user/order')}}" class="pink" target="_blank">查看订单&gt;&gt;</a>&nbsp;&nbsp;&nbsp;
              <a href="{{url('/user/index')}}" class="pink" target="_blank">个人中心&gt;&gt;</a>
              <br></div>
            <div class="btn_04 clearfix">
              您已选择:
              @if(session('msg'))
              {{session('msg')}}
              @endif
              <span id="paywayimg" style="display: block;"></span>
              <a href="javascript:void(0);" data-def="#" class="gotoSettlement yahei l" id="checkPay" style="background:#f450a2;">立即付款</a></div>
          </div>
        </div>
      </div>
    </div>
    <div id="dialog" style="display:none">
      <div class="cart_dialog">
        <p class="txt">请您在新打开的网上银行页面进行支付，支付完成前请不要关闭该窗口。</p>
        <input name="pay_sign" value="" type="hidden">
        <p class="info" style="position: relative;">
          <a class="dia_btn dia_btn2 refs" href="javascript:void(0)">已完成支付</a>
          <!-- <a href="#" class="dia_btn refs ">支付遇到问题</a> --></p>
        <p class="link">
          <a href="javascript:void(0)" class="refs">&lt;&lt;返回重新选择银行</a></p>
      </div>
    </div>
    <link rel="stylesheet" href="{{url('/mia/style/jquery-ui.css')}}" type="text/css">
    <script type="text/javascript" src="{{url('/mia/js/main.js')}}"></script>
    <script type="text/javascript">
        //服务器时间
        var t = {{$t}};
        //倒计时时长 秒
        var time = {{$time}};
        setInterval(function(){
            //小时
            var last_h = parseInt(time / 3600);
            var last_m = parseInt((time - (last_h * 3600))/60);
            var last_s = time - (last_h*3600) - (last_m*60);
            $('#counterColumn .t1').html(last_h);
            $('#counterColumn .t2').html(last_m);
            $('#counterColumn .t3').html(last_s);
            time--;
            // console.log(last_h+':'+last_m+':'+last_s);
        },1000);
        
        var alreadyChecked = $('<img id="alreadyChecked">');
        
        $(document).ready(function(){
            var p = $('input[name="payway"]:checked');
            var c = p.val();
            if(c != undefined){
                alreadyChecked.attr('src', p.parent().find('label > img').attr('src'));
                $('#paywayimg').html(alreadyChecked);
            }
                
        });
        
        //选择支付方式
        $('input[name="payway"]').on('click', function(){
            // alert($(this).val());
            var me = $(this);
            var payway = me.attr('data-payway');
            //var alreadyChecked = $('<img id="alreadyChecked">');
            
            $.ajax({
                url:'{{url("/user/cartOrder/selectPayway")}}',
                data:{oid:'{{$oid}}', order_no:'{{$order -> order_no}}', payway:payway},
                type:'POST',
                dataType:'json',
                beforeSend:function(r){
                    $('#paywayimg').html('正在选择支付方式...');
                    $('#checkPay').html('正在选择支付方式...');
                },
                success:function(data){
                    //操作
                    me.attr('checked', true);
                    $('label.bankCards').removeClass('bcurrent');
                    me.parent().find('label').addClass('bcurrent');
                    var src = me.parent().find('label > img').attr('src');
                    alreadyChecked.attr('src', src);
                    $('#paywayimg').html(alreadyChecked);
                    $('#checkPay').html('立即支付');
            
                },
                error:function (r, s, e) {
                    $('#paywayimg').html('系统繁忙，稍后再试');
                    $('#checkPay').html('系统繁忙，稍后再试');
                }
            });
            
        });
        
        //提交支付
        $('#checkPay').on('click', function(){
            //验证
            var c = $('input[name="payway"]:checked').val();
            console.log(c);
            
            if(c == undefined){
                alert('请选择支付方式');
                return false;
            }
            
            //执行跳转
            window.location.href = "{{url('/user/cartOrder/alipay/oid/'.$oid)}}";
        });
    </script>
@endsection