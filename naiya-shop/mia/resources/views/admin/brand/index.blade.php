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
                品牌管理
                <small>在这里进行品牌的管理</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">品牌列表</a></li>
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
                            <h3 class="box-title">品牌列表</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{url('/admin/brand')}}" method="get">
                            <div class="row">
                                <div class="col-xs-2">
                                    <!-- select -->
                                    <div class="form-group">
                                        <select name="pageSize" class="form-control">
                                            <option {{$request['pageSize'] && $request['pageSize'] == 20 ? 'selected=selected':''}}>20</option>
                                            <option {{$request['pageSize'] && $request['pageSize'] == 50 ? 'selected=selected':''}}>50</option>
                                            <option {{$request['pageSize'] && $request['pageSize'] == 100 ? 'selected=selected':''}}>100</option>
                                            <option {{$request['pageSize'] && $request['pageSize'] == 200 ? 'selected=selected':''}}>200</option>
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
                                    <th>品牌名</th>
                                    <th>所属分类</th>
									<th>品牌图像</th>
									<th>品牌描述</th>
									<th>热门品牌</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brand as $v)
                                <tr>
                                    <td style="vertical-align:middle">{{$v -> id}}</td>
                                    <td style="vertical-align:middle">{{$v -> name}}</td>
                                    <td style="vertical-align:middle">{{$v -> cateName}}</td>
									<td align="center"><img src="{{url(config('app.brandUrl'))}}/{{$v -> img}}" width="120" height="80"/></td>
                                    <td align="center" style="vertical-align:middle"><a class="btn btn-primary btn-xs" href="{{url('/admin/brand')}}/{{$v->id}}">查看详情</a></td>
									<td align="center" style="vertical-align:middle">{{$v -> status == 2 ? '推荐' : '不推荐'}}</a></td>
                                    <td style="vertical-align:middle">
									<div style="float:left;margin-right:5px;">
                                    <a class="btn btn-primary btn-xs" href="{{url('/admin/brand')}}/{{$v->id}}/edit">编辑</a>
									</div>
									<div>
									<form action="{{url('/admin/brand')}}/{{$v->id}}" method="post" >
										{{csrf_field()}}
										{{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-xs" action="">删除</button>
									</form>
									</div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            {{$brand -> appends($request) -> render()}}
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
