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
                商品管理
                <small>在这里进行商品的审核</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">商品列表</a></li>
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
                            <h3 class="box-title">商品审核列表</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{url('/admin/goods')}}" method="get">
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>所属商户</th>
                                    <th>商品编号</th>
                                    <th>商品名称</th>
                                    <th>图片</th>
                                    <th>单价</th>
									<th>数量</th>
									<th>状态</th>
									<th>创建时间</th>
									<th>商品详情</th>
									<th>首页展示</th>
									<th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $v)
                                <tr>
                                    <td align="center">{{$v -> id}}</td>
                                    <td align="center">
									{{$v -> mm}}
									</td>
                                    <td align="center" style="color:blue">{{$v -> code}}</td>
                                    <td align="">{{$v -> name}}</td>
									<td><img src="{{url(config('app.goodsUrl'))}}/{{$v -> img}}" width="30" height="30"/></td>
									
									<td>{{$v -> price}}</td>
									<td>{{$v -> nums}}</td>
                                    <td style="color:red;">
									@if($v -> status == 1)
										已下架
									@elseif($v -> status == 2)
										已上架
									@elseif($v -> status == 3)
										已删除
									@endif
									</td>
                                    
                                    <td>{{date('Y-m-d H:i:s',$v -> create_at)}}</td>
									
									
									<td><a class="btn btn-default btn-sm" href="{{url('/admin/goods')}}/{{$v->id}}">查看详情</a></td>
									<td align="center">{{$v -> recomm == 1 ? '推荐' : '不推荐'}}</td>
									<td>
                                    <a class="btn btn-primary btn-xs" href="{{url('/admin/goods')}}/{{$v->id}}/edit">编辑</a>
									<form action="{{url('/admin/goods')}}/{{$v -> id}}" method="post" >
										{{csrf_field()}}
										{{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-xs"  >删除</button>
									</form>
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