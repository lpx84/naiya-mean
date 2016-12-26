@extends('merchant.layout')
@section('meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('title',$title)
@section('content')
<style>
    .table-bordered>tbody>tr>td{
        vertical-align: middle;
    }
    .btn-app {
        padding: 5px;
        margin: 0;
        min-width: 80px;
        height: auto;
    }
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                订单管理
                <small>在这里进行订单管理</small>
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
                            <form action="{{url('/merchant/order')}}" method="get">
                            <div class="row">
                                <div class="col-xs-2">
                                    <!-- select -->
                                    <div class="form-group">
                                        <select name="pageSize" class="form-control">
                                            <option {{isset($request['pageSize']) && $request['pageSize'] == 10 ? 'selected=selected':''}}>10</option>
                                            <option {{isset($request['pageSize']) && $request['pageSize'] == 20 ? 'selected=selected':''}}>20</option>
                                            <option {{isset($request['pageSize']) && $request['pageSize'] == 50 ? 'selected=selected':''}}>50</option>
                                            <option {{isset($request['pageSize']) && $request['pageSize'] == 100 ? 'selected=selected':''}}>100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-offset-7">
                                    <div class="input-group input-group">
                                        <input type="text" name="keyWord" value="{{$request['keyWord'] or ''}}" class="form-control">
                                        <span class="input-group-btn">
                                          <button class="btn btn-info btn-flat">搜索</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                            </form>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>订单号</th>
                                    <th>商品</th>
                                    <th>单价</th>
                                    <th>小计</th>
                                    <th>状态</th>
                                    <th>用户</th>
                                    <th>创建时间</th>
                                    <th>更新时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $value)
                                
                                @foreach($value as $k=>$v)
                                <tr>
                                    @if($k==0)
                                    <td rowspan="{{count($value)}}">{{$v -> oid}}</td>
                                    
                                    <td rowspan="{{count($value)}}">{{$v -> order_no}}</td>
                                    @endif
                                    <td>
                                    <img src="{{url(config('app.goodsUrl').$v->gimg)}}" width="50" height="50"/>
                                    {{$v->gname}}</td>
                                    <td>
                                    <a class="btn btn-app"><span class="badge bg-aqua">{{$v->nums}}</span>{{$v->price}}</a>
                                    </td>
                                    <td>
                                    {{$v->price * $v->nums}}
                                    </td>
                                    
                                    @if($k==0)
                                    <td rowspan="{{count($value)}}">
                                    @if($v -> status == 4)
                                        <span class="label label-success">{{$status[$v -> status]}}</span>
                                    @else
                                        <span class="label label-warning">{{$status[$v -> status]}}</span>
                                    @endif
                                    </td>
                                    <td rowspan="{{count($value)}}">
                                    {{$v -> username}}
                                    <br />
                                    【{{$v -> userphone}}】
                                    <br />
                                    【{{$v -> useremail}}】
                                    </td>
                                    
                                    <td rowspan="{{count($value)}}" width="90">{{date('Y-m-d H:i:s',$v -> create_at)}}</td>
                                    <td rowspan="{{count($value)}}" width="90">{{date('Y-m-d H:i:s',$v -> update_at)}}</td>
                                    
                                    <td rowspan="{{count($value)}}">
                                    @if($v -> status == 4)
                                    <a class="btn btn-primary btn-xs" href="{{url('/merchant/logistics/add/oid/'.$v->oid.'/mid/'.$v->mid.'/order_no/'.$v->order_no)}}">发物流【快递】</a>
                                    @endif
                                    </td>
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