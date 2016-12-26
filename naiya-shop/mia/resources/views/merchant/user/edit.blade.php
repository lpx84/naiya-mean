@extends('merchant.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户管理
            <small>在这里进行用户的管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">用户编辑</a></li>
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
                        <h3 class="box-title">用户编辑</h3>
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
                    <form role="form" action="{{asset('/merchant/user')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" name="oldHeader" value="{{$data -> header}}"/>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username">用户名</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{$data -> username}}"
                                       placeholder="请输入用户名" disabled>
                            </div>
                            <div class="form-group">
                                <label for="phone">手机号</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$data -> phone}}" placeholder="请输入手机号码">
                            </div>
                            <div class="form-group">
                                <label for="email">邮箱</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$data -> email}}"
                                       placeholder="请输入一个有效邮箱">
                            </div>
                            <div class="form-group">
                                <label for="header">用户头像</label>
                                <img src="{{url('/uploads')}}/{{$data->header}}" width="80" />
                            </div>
                            <div class="form-group">
                                <label for="header">头像</label>
                                <input type="file" id="header" name="header">
                                <p class="help-block">请选择一张头像</p>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection