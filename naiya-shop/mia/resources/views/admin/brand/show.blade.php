@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            品牌管理
            <small>在这里进行品牌的描述查看</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">品牌描述</a></li>
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
                        <h3 class="box-title">品牌描述</h3>
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
                                <label for="name">品牌名</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$brand -> name}}"
                                       placeholder="请输入品牌名" disabled>
                            </div>
							<div class="row"></div>
							<div class="form-group" style="margin-left:20px;">
                                <label for="img">品牌图像</label>
                                <img src="{{url(config('app.brandUrl'))}}/{{$brand->img}}" width="200" />
                            </div>
							<div class="form-group " style="margin-left:20px;">
                                <label for="desc">品牌描述</label>
								<div style="border 2px solid #ccc;">
									{!! $brand -> desc !!}
								</div>
                                
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
							<a href="{{url('admin/brand')}}">
                            <button type="submit" class="btn btn-primary">返回</button>
							</a>
                        </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


@endsection