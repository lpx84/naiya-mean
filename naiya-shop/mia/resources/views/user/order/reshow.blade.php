@extends('user.homelayout')
@section('style')
		<link rel="stylesheet" href="{{url('/mia/style/AdminLTE.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('/mia/style/bootstrap.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('/mia/style/main.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('/mia/style/add.css')}}" type="text/css">
        <script type="text/javascript" src="{{url('/mia/js/jQuery-2.1.4.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/mia/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{url('/mia/js/jquery-1.8.2.min.js')}}"></script>
		<style>
		* {
			-webkit-box-sizing: content-box;
			-moz-box-sizing: content-box;
			box-sizing: content-box;
		}
		</style>
		<script src="{{url('/distpicker/js/distpicker.data.js')}}"></script>
@endsection
@section('content')
	<div class="right l">
				
                <div class="title yahei f20 pink">订单详情</div>
				
                <div class="splist p20 xqinfo orderDetail" id="orderDetail" style="margin-top:0;">
					<div style="clear:both;"></div>

                    <div class="orderState">
                        <h3 class="f16">当前订单状态：<span style="color:red;">{{ $arr[$data -> status] }}</span></h3>
                        <div class="xinx clearfix" id="orderDetailInfo">
                            <p>订单编号：{{ $data -> order_no }}</p>
                            <p>下单时间：{{ date('Y-m-d H:i:s',$data -> create_at) }}</p>
							@if($data -> status == 4)
								<p>付款时间：{{ date('Y-m-d H:i:s',$data -> update_at) }}</p>
							@endif
							<p>取消时间：
							{{ date('Y-m-d H:i:s',$gback -> update_at + 7200) }}
							
							</p>
                        </div>
                    </div>
					@if($res)
                    <h4 class="f14">配送信息</h4>
                    <div class="xinx">
                        <p>联系电话：{{ $res -> phone }}</p>
                        <p>收货人：{{ $res -> name }}</p> 
						<p>收货地址：
						<script>
							
								var province = ChineseDistricts['86']['{{ $res -> province }}'];
								var city = ChineseDistricts['{{ $res -> province }}']['{{ $res -> city }}'];
								var area = ChineseDistricts['{{ $res -> city }}']['{{ $res -> area }}'];
								
								document.write(province);
								document.write(city);
								document.write(area);
							</script>
							{{ $res -> detail }}
						</p><p>
                    </p></div>
					@endif
                </div>
                <!-- start express -->
                <div class="splist p20 xqinfo orderDetail">
                    <h4 class="f14">物流信息</h4>
                    <div class="xinx logistionBasic">
                        <p class="extra">
                            <span class="company">快递公司：
								<span class="f14">{{ $gback -> company }}</span>
							</span>
                            <span>物流单号：
								<span class="f14">{{ $gback -> logi_no }}</span>
							</span>
							<span style="margin-left:40px;">
								<a href="http://www.kuaidi100.com/?from=openv"><span class="f14" style="color:red;">点击查询详细信息</span></a>
							</span>
                        </p>
                    </div>
                </div>
       <!-- end express -->
                
                <div class="splist p20 xqinfo orderDetail">
                	<h4 class="f14" style="border-bottom:0; display: inline-block;">订单信息</h4>
                    <!-- 售后客服 -->
                   <a href="http://chat800.mia.com/live800/chatClient/chatbox.jsp?companyID=928321961&amp;configID=49&amp;skillId=48" class="shouhou" target="_blank"><img src="{{url('mia/images/c3738db8f6f96356451e3f505d317b2e.png')}}"></a>

                    <style>
                        table.msctab th, .icspblock table.msctab td{border: 1px solid #ddd;}
                        table.msctab th{ background: #efefef;}
                        
                    </style>
                     
                    <div class="icspblock" style="border-bottom: none;">
                        <div class="shangjia">奶牙自营</div>
                        <table class="msctab" border="0" cellpadding="0" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                    <th class="ddtit" align="center" width="432">商品信息</th>
                                    <th class="ddtit" align="center" width="138">单价</th>
                                    <th class="ddtit" align="center" width="78">数量</th>
                                    <th class="ddtit" align="center" width="138">成交价格</th>
                                </tr>
                              </thead>
                                                            <tbody>
                              <tr>
                                <td class="mysp ptb0">
                                    <table class="tab04" border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tbody><tr>
                                            <td class="borenone">
                                                <div class="mysp clearfix">
                                                    <a href="{{ url('goods') }}/{{ $showres -> goodsid }}" target="_blank" title="">
                                                        <img src="{{ url(config('app.goodsUrl').$showres -> images) }}" alt="{{ $showres -> goodsname }}" height="50" width="50">
                                                    </a>
                                                    <div class="orderDetailList">
                                                        <span class="orderDetailName">
                                                            <a href="{{ url('goods') }}/{{ $showres -> goodsid }}" target="_blank" title="{{ $showres -> goodsname }}">
                                                            {{ $showres -> goodsname }}                                                   
     </a>
                                                        </span>
                                                                                                                <span class="orderDetailSize">&nbsp;</span>
                                                                                                            </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                                    <td align="center">¥{{ $showres -> pri }}</td>
                                    <td align="center">{{ $showres -> nums }}</td>
                                    <td align="center">¥{{ $data -> total }}</td>
                                </tr>
                            </tbody>
                            <!--<tbody>
                                <td colspan="4"  class="manjian"><span>满减</span>活动商品消费满100元立减20元</td>
                            </tbody>-->
                                                    </table>
                    </div>
                    <div class="clearfix" style="line-height:26px;">
                        <div class="r" style="width: 400px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody><tr>
                                    <td align="right" width="78%">总商品金额：</td>
                                    <td align="right" width="22%"><span class="pink">¥{{ $data -> total }}</span></td>
                                </tr>
                                
                                                                <tr>
                                    <td align="right">+ 运费金额：</td>
                                    <td class="pink" align="right">¥<span>0.00</span></td>
                                </tr>
                                                                                                                                <tr>
                                 	<td align="right">- 优惠减免：</td>
                                	<td class="pink" align="right">¥<span>0.00</span></td>
                            	</tr>
                            	                            	
                            	<!--<tr>
                                	<td align="right">- 代金券：</td>
                                	<td class="pink" align="right">¥<span>0.00</span></td>
                            	</tr>
                            	                            	                            	<tr>
                                	<td align="right">- 红包：</td>
                                	<td class="pink" align="right">¥<span>0.00</span></td>
                            	</tr>
                            	                            	                                <tr>
                                	<td align="right">- 余额：</td>
                                	<td class="pink" align="right">¥<span>0.00</span></td>
                            	</tr>-->
                            	                            	<tr>
	                                <td class="f14" align="right" height="50">实际支付：</td>
	                                <td align="right" height="50">
	                                    <span class="pink" style="font-size:25px;">¥<span style="font-size:25px;">{{ $data -> total }}</span></span>
	                                </td>
                            	</tr>
                            </tbody></table>
                        </div>
               			<!-- 虚拟验证 -->
						 
							本订单由奶牙北京仓发货
												<br>至少可获得积分：<span class="pink">{{ intval($data -> total) }}</span>
                    </div>
                </div>
            </div>
@endsection('content')