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
                商户管理
                <small>在这里进行商户的管理</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">商户列表</a></li>
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
                            <h3 class="box-title">商户列表</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{url('/admin/merchant')}}" method="get">
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
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat">确定</button>
                                    </span>
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>商户登录名</th>
                                    <th>商户名称</th>
									<th>Logo</th>
                                    <th>状态</th>
                                    <th>实名认证</th>
                                    <th>保证金</th>
									<th>描述信息</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $v)
                                <tr>
                                    <td>{{$v -> id}}</td>
                                    <td>{{$v -> username}}</td>
                                    <td>{{$v -> name}}</td>
									<td align="center"><img src="{{url(config('app.merchantLogoUrl'))}}/{{$v -> logo}}" width="30" height="30"/></td>
									<td>{{$v -> status == 1 ? '已激活' : '已禁用'}}</td>
									<td>{{$v -> is_real_check == 1 ? '已认证' : '未认证'}}</td>
                                    <td>{{$v -> account}}</td>
                                    <td><a class="btn btn-primary btn-xs" href="{{url('/admin/merchant')}}/{{$v->id}}">查看详情</a></td>
                                    <td>
									<div style="float:left;margin-right:5px;">
                                    <a class="btn btn-primary btn-xs" href="{{url('/admin/merchant')}}/{{$v->id}}/edit">编辑</a>
									</div>
									<div>
									<form action="{{url('/admin/merchant')}}/{{$v->id}}" method="post" >
										{{csrf_field()}}
										{{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-xs" action="delete">删除</button>
									</form>
									</div>
                                    </td>
                                </tr>
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
