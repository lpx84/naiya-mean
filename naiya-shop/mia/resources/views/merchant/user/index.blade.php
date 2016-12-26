@extends('merchant.layout')
@section('meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('title',$title)
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户管理
                <small>在这里进行用户管理</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">用户列表</a></li>
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
                            <h3 class="box-title">用户列表</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{url('/merchant/user')}}" method="get">
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
                                    <th>用户名</th>
                                    <th>头像</th>
                                    <th>状态</th>
                                    <th>金额</th>
                                    <th>邮箱</th>
                                    <th>手机号</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $v)
                                <tr>
                                    <td>{{$v -> id}}</td>
                                    <td>{{$v -> username}}</td>
                                    <td><img src="{{asset('/uploads')}}/{{$v -> header}}" width="50" height="50"/></td>
                                    <td>{{$v -> status == 1 ? '已激活' : '已禁用'}}</td>
                                    <td>{{$v -> account}}</td>
                                    <td>{{$v -> email}}</td>
                                    <td>{{$v -> phone}}</td>
                                    <td>
                                    <a class="btn btn-primary btn-xs" href="{{url('/merchant/user')}}/{{$v->id}}/edit">编辑</a>

                                    <a class="btn btn-danger btn-xs" data="{{$v -> id}}" action="delete">删除</a>
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

    $('a[action="delete"]').on('click',function(){
        var id = $(this).attr('data');
        var me = $(this).parent().parent();

        $.ajax({
            url:'{{asset("/merchant/user")}}/'+id,
            type:'delete',
            dataType: 'json',
            success:function(data){
                console.log(typeof(data.code));
                switch(data.code){
                    case 0:
                        me.remove();
                        myAlert.removeClass('callout-danger');
                        myAlert.addClass('callout-success');
                        myAlert.find('p[name="content"]').html('删除成功');
                    break;
                    case 1:
                        myAlert.removeClass('callout-success');
                        myAlert.addClass('callout-danger');
                        myAlert.find('p[name="content"]').html('删除失败');
                    break;
                }
                myAlert.removeClass('hide');
                myAlert.stop(true,true).slideDown();
                setTimeout(function(){
                    myAlert.stop(true,true).slideUp(500);
                },1000);
            },
            error:function(){

            }
        });
    });
</script>
@endsection