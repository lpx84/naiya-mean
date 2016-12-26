@extends('user.cartlayout')
@section('title',$title)
@section('content')
<link rel="stylesheet" href="{{url('/mia/style/cart.css')}}" type="text/css">
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
    <div class="myShoppingCart w1004 mscStep2">
      <div class="rim">
        <div class="cartNoticehint" style="height:40px;">
          <h4 class="pay_success_f">{{$msg}}</h4></div>
        <div class="weixinQRImg">
          <img src="{{url('/mia/images/weixinQR.jpg')}}"></div>
        <!-- 20150319 begin -->
        <!-- 300元代金券 -->
        <!-- end -->
        <!-- 20150319 end -->
        <div class="cartRealSuccess ddcg">
          <div class="clearfix ddcg_tab">
            <table class="realSuccess" width="100%" cellspacing="0" cellpadding="0" border="0">
              <tbody>
                <tr>
                  <th style="text-align:left;" width="63%">订单号
                    <b>{{$order_no}}</b>&nbsp;&nbsp;&nbsp;商品将在24小时内发货</th>
                  <th width="15%">商户</th>
                  <th width="10">数量</th>
                  <th width="12%">单价</th>
                </tr>
                @foreach($data as $v)
                <tr>
                  <td width="63%">
                    <div style="text-align:left;padding:3px 0;">
                      <span class="l product_imgf">
                        <img src="{{url(config('app.goodsUrl').$v->img)}}"></span>
                      <span class="l product_desf">
                        <a href="{{url('/goods/'.$v->gid)}}" target="_blank" title="{{$v->name}}">{{$v->name}}</a></span>
                    </div>
                  </td>
                  <td width="15%">{{$v->merchantName}}</td>
                  <td width="10">{{$v->nums}}</td>
                  <td width="12%">¥ {{$v->price}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <p id="orderSuccessInfo">
            <span>支付金额：¥{{$commTotal}}</span>
            <span>支付方式：{{$way}}</span>
            <span>配送方式：普通快递</span>
            <span>
              <a href="{{url('/user/order')}}" class="blue">[查看订单]</a></span>
          </p>
          <div id="orderSuccessNotice">
            <p style="color:#666;">温馨提示：
              <span style="color:red">（奶牙不会发送链接让您进行退货或退款，如遇此种情况为保障安全请马上修改密码。）</span></p>
            <p style="color:#666;">1、【防诈骗警示】近期有不法分子冒充各大电商工作人员通过办理VIP打折卡、交易失败退款等理由行骗，请您提高警惕谨防受骗，详情请查看官网帮助中心《售后服务-
              <a href="http://www.miabaobei.com/help/511">特别声明</a>》。</p>
            <p style="color:#666;">2、此订单确认信息，仅表示我们已成功收到了您的订单，只有当我们使用短信或电子邮件通知您已经将商品发出时，我们和您之间的订购合同才成立。</p>
            <p style="color:#666;">3、商品送达时，请您务必验货并检查包装是否完整，确认商品为您在奶牙宝贝实际订购商品后再进行签收，一经签收，即表示您对订单内商品的认可。</p>
            <!-- <p>4、“奶牙狂欢节”期间，订单量较大，您的订单发送时间请以上述承诺的发货时间为准，请您谅解。</p> -->
            <p style="color:#666;">4、包含预售商品的订单，将在预售商品全部到货后订单才能发货，届时将有短信通知，暂不支持拆分订单发货，敬请谅解。</p>
            <p style="color:#666;">5、如需开具发票请参考
              <a href="http://local.naiya.cc/help/249">如何开具发票？</a>。</p></div>
        </div>
      </div>
    </div>
    
    
@endsection