@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            订单及物流详情
            <small>在这里进行订单及物流的信息查看</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">订单及物流详情信息查看</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">用户信息</h3>
                    </div><!-- /.box-header -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- form start -->
                    
                        <div class="box-body">
                            <div class="form-group col-md-3">
                                <label for="username">昵称</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{$user -> username}}"
                                       placeholder="请输入昵称" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="email">邮箱账号</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user -> email}}"
                                       placeholder="请输入一个有效邮箱" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="phone">联系方式</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$user -> phone}}"
                                       placeholder="请输入一个有效手机号" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="account">账户金额</label>
                                <input type="text" class="form-control" id="account" name="account" value="{{$user -> account}}"
                                       placeholder="请输入一个有效金额" disabled>
                            </div>
							<div class="row"></div>
							<div class="row">
                            <div class="form-group col-md-3">
                                <label for="header">用户头像</label>
                                <img src="{{url(config('app.userUrl'))}}/{{$user->header}}" width="80" />
                            </div>
							</div>
							@if($address)
							<div class="box-header with-border ">
								<h3 class="box-title">收货地址信息</h3>
							</div>
							<div class="row" style="margin-bottom:10px;"></div>
                            <div class="form-group col-md-3">
								<table class="msctab tab09" width="100%" cellspacing="0" cellpadding="0"  style="border:2px solid #ccc;" >
									<tbody>
										<tr class="first_tr">
											<th colspan="2" class="ddtit addir" align="left">
												<label for="is_default">{{$address -> is_default == 1 ? '默认地址' : '地址'}}</label>
											</th>
										</tr>
										<tr>
											<td class="gray3" width="40%" align="center">收货人：</td>
											<td width="60%">{{ $address -> name }}</td>
										</tr>
										<tr>
											<td class="gray3" align="center">详细地址：</td>
											<td>
											<script src="{{url('/distpicker/js/distpicker.data.js')}}"></script>
											<script>
											
												var province = ChineseDistricts['86']['{{ $address -> province }}'];
												var city = ChineseDistricts['{{ $address -> province }}']['{{ $address -> city }}'];
												var area = ChineseDistricts['{{ $address -> city }}']['{{ $address -> area }}'];
												
												document.write(province);
												document.write(city);
												document.write(area);
											</script>
											{{ $address -> detail }}
											</td>
										</tr>
										<tr>
											<td class="gray3" align="center">到货联系手机：</td>
											<td>{{ $address -> phone }} </td>
										</tr>
										
									</tbody>
								</table>
							</div>
							@endif
							
							<div class = "row"></div>
							<div class="box-header with-border ">
								<h3 class="box-title">订单信息</h3>
							</div>
							<div class="row" style="margin-bottom:10px;"></div>
								<div data-example-id="contextual-table" class="bs-example">
									<table class="table">
									  
									  <tbody>
									  
									  @foreach($goods as $g => $s)
									  <thead>
										<tr>
										  <th>#</th>
										  <th>名称</th>
										  <th>详细信息</th>
										</tr>
									  </thead>
										<tr class="active">
										  <th></th>
										  <td>订单编号</td>
										  <td>{{$s -> order_no}}</td>
										</tr>
										
										<tr >
										  <th></th>
										  <td>订单状态</td>
										  <td style="color:red">
											@if($s -> status == 1)
												待支付
											@elseif($s -> status == 2)
												已取消
											@elseif($s -> status == 3)
												交易关闭
											@elseif($s -> status == 4)
												已支付
											@elseif($s -> status == 5)
												代发货
											@elseif($s -> status == 6)
												已发货
											@elseif($s -> status == 7)
												已收货
											@elseif($s -> status == 8)
												已完成
											@elseif($s -> status == 9)
												退货中
											@elseif($s -> status == 10)
												已退货
											@elseif($s -> status == 11)
												已退款
											@elseif($s -> status == 12)
												未付款取消订单
											@elseif($s -> status == 13)
												已付款取消订单
											@endif
										  </td>
										</tr>
										
										<tr class="info">
										  <th></th>
										  <td>商品名称</td>
										  <td>{{$s -> name}}</td>
										  
										</tr>
										<tr>
										  <th></th>
										  <td>商家</td>
										  <td>{{$s -> username}}</td>
										  
										</tr>
										<tr class="success">
										 <th></th>
										  <td>商品单价</td>
										  <td>{{$s -> price}}</td>
										  
										</tr>
										<tr >
										  <th></th>
										  <td>购买商品数量</td>
										  <td>{{$s -> nums}}</td>
										 
										</tr>
										@endforeach
										<tr class="danger">
										  <th>#</th>
										  <th>公共详情</th>
										  <th>详细信息</th>
										</tr>
										<tr class="danger">
										  <th></th>
										  <td>订单名称</td>
										  <td>{{$order -> title}}</td>
										 
										</tr>
										<tr class="danger">
										 <th></th>
										  <td>订单描述</td>
										  <td>{{$order -> desc}}</td>
										  
										</tr>
										<tr class="danger">
										  <th></th>
										  <td>订单总金额</td>
										  <td style="color:red">{{$order -> total}}</td>
										  
										</tr>
										<tr class="danger">
										  <th></th>
										  <td>支付方式</td>
										  <td>类型：{{isset($pay) && $pay -> type == 1 ? '平台支付' : '网银支付' }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;方式：{{isset($pay) && $pay -> way != 1 ?  '微信': '支付宝' }}</td>
									
										  
										</tr>
										<tr class="active">
										  <th></th>
										  <td>时间</td>
										  <td>创建时间：{{date('Y-m-d H:i:s',$order -> create_at)}}</td>
										  <td>更新时间：{{date('Y-m-d H:i:s',$order -> update_at)}}</td>
										  
										</tr>
										
									  </tbody>
									</table>
								  </div>
							<div class = "row"></div>
							@if($logistics)
							<div class="box-header with-border ">
								<h3 class="box-title">物流信息</h3>
							</div>
							<div class="row" style="margin-bottom:10px;"></div>
							<div data-example-id="contextual-table" class="bs-example">
								
									<table class="table">
									  <thead>
										<tr>
										  <th>#</th>
										  <th>名称</th>
										  <th>详细信息</th>
										</tr>
									  </thead>
									  <tbody>
										<tr class="active">
										  <th scope="row">1</th>
										  <td>订单编号</td>
										  <td>{{$logistics -> order_no}}</td>
										  
										</tr>
										<tr>
										  <th scope="row">2</th>
										  <td>物流公司名称</td>
										  <td>{{$logistics -> company}}</td>
										 
										</tr>
										<tr class="success">
										  <th scope="row">3</th>
										  <td>物流单号</td>
										  <td>{{$logistics -> logi_no}}</td>
										  
										</tr>
										<tr>
										  <th scope="row">4</th>
										  <td>物流信息</td>
										  <td>
										  <?php 
										  if($logistics -> content)
										  {
										  $arr = json_decode($logistics -> content, 1);
											foreach ($arr as $v)
											{
												echo $v['time'].' => '.$v['context'].'<br />';
											}
										  }
										  ?>
										  </td>
										</tr>
										<tr class="info">
										  <th scope="row">5</th>
										  <td>状态</td>
										  <td style="color:red;">@if($logistics -> status == 1)
												已发货
											@elseif($logistics -> status == 2)
												在途中
											@elseif($logistics -> status == 3)
												已送达
											
											@endif</td>
										  
										</tr>
										<tr>
										  <th scope="row">6</th>
										  <td>创建时间</td>
										  <td>{{date('Y-m-d H:i:s',$logistics -> create_at)}}</td>
										  
										</tr>
										<tr class="warning">
										  <th scope="row">7</th>
										  <td>更新时间</td>
										  <td>{{date('Y-m-d H:i:s',$logistics -> update_at)}}</td>
										 
										</tr>
									  </tbody>
									</table>
								  </div>
								  @endif
                        </div><!-- /.box-body -->

                        <div class="box-footer">
							<a href="{{url('/admin/order')}}">
                            <button type="submit" class="btn btn-primary">返回</button>
							</a>
                        </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection
