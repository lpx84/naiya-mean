@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            管理员管理
            <small>管理员添加</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">管理员添加</a></li>
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
                        <h3 class="box-title">管理员添加</h3>
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
                    <form role="form" action="{{asset('/admin/manager')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username">账户名</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}"
                                       placeholder="请输入账户名">
                            </div>
                            <div class="form-group">
                                <label for="password">密码</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="请输入密码">
                            </div>
                            <div class="form-group">
                                <label for="repassword">确认密码</label>
                                <input type="password" class="form-control" id="repassword" name="repassword"
                                       placeholder="请再输入一次密码">
                            </div>
                            <div class="form-group">
                                <label for="header">头像</label>
                                <input type="file" id="header" name="header">
                                <p class="help-block">请选择一张头像</p>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">添加</button>
                            <button type="reset" class="btn btn-danger">重置</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection