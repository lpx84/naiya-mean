@extends('admin.layout')
@section('meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('title',$title)
@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                订单物流
                <small>在这里进行订单与物流的查看</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">订单列表</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @if(session('msg'))
                    <div id="info" class="callout callout-info">
                        <p>{{session('msg')}}</p>
                    </div>
                    @endif
                    <div id="alert" class="callout hide">
                        <p name="content"></p>
                    </div>
                    
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">订单列表</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{url('/admin/order')}}" method="get">
                            <div class="row">
                                <div class="col-xs-2">
                                    <!-- select -->
                                    <div class="form-group">
                                        <select name="pageSize" class="form-control">
                                            <option {{$request['pageSize'] && $request['pageSize'] == 10 ? 'selected=selected':''}}>10</option>
                                            <option {{$request['pageSize'] && $request['pageSize'] == 20 ? 'selected=selected':''}}>20</option>
                                            <option {{$request['pageSize'] && $request['pageSize'] == 50 ? 'selected=selected':''}}>50</option>
                                            <option {{$request['pageSize'] && $request['pageSize'] == 100 ? 'selected=selected':''}}>100</option>
                                        </select>
                                    </div>
                                </div>
								<div class="col-md-2 ">
                                    <div class="input-group input-group">
                                        <span class="input-group-btn">
                                          <button class="btn btn-info btn-flat">确定</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                                <div class="col-md-3 col-md-offset-5">
                                    <div class="input-group input-group">
                                        <input type="text" name="keyWord" value="{{$request['keyWord'] or ''}}" class="form-control">
                                        <span class="input-group-btn">
                                          <button class="btn btn-info btn-flat">搜索</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                            </form>
							<style>
								td{
									vertical-align: middle;
								}
								</style>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>用户</th>
                                    <th>订单编号</th>
                                    <th>名称</th>
                                    <th>单价</th>
                                    <th>数量</th>
                                    <th>状态</th>
									<th>应付金额</th>
									<th>创建时间</th>
									<th>订单详情</th>
									<th>退款</th>
								
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $value)
                                @foreach($value as $k=>$v)
                                <tr>
									@if($k == 0)
                                    <td rowspan="{{count($value)}}"  style="vertical-align:middle;">{{$v -> oid}}</td>
									
                                    <td rowspan="{{count($value)}}" style="vertical-align:middle;">
									{{$v -> username}}
									</td>
									
                                    <td rowspan="{{count($value)}}" style="vertical-align:middle;color:blue;" >{{$v -> order_no}}</td>
									
									@endif
                                    <td>{{$v -> gname}}</td>
									<td>{{$v -> price}}</td>
									<td>{{$v -> nums}}</td>
                                    <td style="color:red;">
									@if($v -> status == 1)
										待支付
									@elseif($v -> status == 2)
										已取消
									@elseif($v -> status == 3)
										交易关闭
									@elseif($v -> status == 4)
										已支付
									@elseif($v -> status == 5)
										代发货
									@elseif($v -> status == 6)
										已发货
									@elseif($v -> status == 7)
										已收货
									@elseif($v -> status == 8)
										已完成
									@elseif($v -> status == 9)
										退货中
									@elseif($v -> status == 10)
										已退货
									@elseif($v -> status == 11)
										已退款
									@elseif($v -> status == 12)
										未付款取消订单
									@elseif($v -> status == 13)
										已付款取消订单
									@endif
									</td>
                                    <td style="color:red">{{$v -> price * ($v -> nums)}}/元</td>
                                    <td>{{date('Y-m-d H:i:s',$v -> create_at)}}</td>
									
									@if($k == 0)
									<td rowspan="{{count($value)}}" style="vertical-align:middle;" ><a class="btn btn-default btn-sm" href="{{url('/admin/order')}}/{{$v->oid}}">查看详情</a></td>
									@endif
									@if($v -> status == 10)
									<td><a style="margin-top:3px;" class="btn btn-warning btn-xs" href="{{url('/admin/order')}}/alipayRefund/{{$v->oid}}/{{$v -> gid}}/{{$v -> uid}}/{{$v -> mid}}">去支付宝退款</a><a style="margin-top:3px;" class="btn btn-warning btn-xs" href="{{url('/admin/order')}}/edit/{{$v->oid}}/{{$v -> gid}}/{{$v -> uid}}">确认退款</a></td>
									@endif
                                </tr>
                                @endforeach
                                @endforeach
                            </table>
                            {{$data ->appends($request) -> render()}}
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection
@section('extendJS')
<script>
    // alert($);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var myAlert = $('#alert');
    setTimeout(function(){
        $("#info").slideUp(500);
    }, 3000);

   
</script>
@endsection