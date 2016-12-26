@extends('merchant.layout')
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
                评论管理
                <small>在这里进行评论管理</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">评论列表</a></li>
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
                            <h3 class="box-title">评论列表</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{url('/merchant/comment')}}" method="get">
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
                                    <th>星级</th>
                                    <th>标题</th>
                                    <th>内容</th>
                                    <th>晒图</th>
                                    <th>商品</th>
                                    <th>用户名</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $v)
                                <tr>
                                    <td>{{$v -> id}}</td>
                                    <td>{{$level[$v -> level]}}</td>
                                    <td>{{$v -> title}}</td>
                                    <td><span title="{{$v -> content}}">{{iconv_substr($v -> content,0,10,'utf-8')}}...</span></td>
                                    <td>
                                    <img src="{{asset('/uploads')}}/{{$v -> img}}" width="50" height="50"/>
                                    </td>
                                    <td>
                                    <img src="{{url(config('app.goodsUrl').$v -> gimg)}}" width="50" height="50"/>
                                        {{$v->gname}}
                                    </td>
                                    <td>{{$v -> uname}}</td>
                                    <td>{{date('Y-m-d',$v -> create_at)}}</td>
                                    <td>
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