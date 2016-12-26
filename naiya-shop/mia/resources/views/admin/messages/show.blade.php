@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            站内信管理
            <small>在这里进行站内信的详情查看</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">站内信详情</a></li>
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
                        <h3 class="box-title">站内信详情</h3>
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
                                <label for="title">标题</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$data -> title}}"
                                       placeholder="请输入标题" disabled>
                            </div>
							<div class="row"></div>
							<div class="col-md-12">
                                <label for="content">内容详情</label>
                                <div style="border:2px solid #ccc;">
									{!!$data -> content!!}
								</div>
                            </div>
							<div class="row"></div>
							<div class="form-group col-md-3">
                                <label for="create_at">创建日期</label>
                                <input type="text" class="form-control" id="create_at" name="create_at" value="{{date('Y-d-m H:i:s',$data -> create_at)}}"
                                       placeholder="请输入创建日期" disabled>
                            </div>
							<!-- 以下为修改密码所用 -->
                            <!--<div class="form-group">
                                <label for="password">密码</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="请输入密码">
                            </div>
                            <div class="form-group">
                                <label for="repassword">确认密码</label>
                                <input type="password" class="form-control" id="repassword" name="repassword"
                                       placeholder="请再输入一次密码">
                            </div>-->
							<!-- 修改密码所用结束-->
						
                        </div><!-- /.box-body -->

                        <div class="box-footer">
							<a href="{{url('/admin/messages')}}">
                            <button type="submit" class="btn btn-primary" value="返回">返回</button></a>
                            <!--<button type="reset" class="btn btn-danger">重置</button>-->
                        </div>
                   
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


@endsection