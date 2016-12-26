@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            商户管理
            <small>在这里进行商户的编辑管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">商户编辑</a></li>
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
                        <h3 class="box-title">商户编辑</h3>
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
                    <form role="form" action="{{asset('/admin/merchant')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" name="oldLogo" value="{{$data -> logo}}"/>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username">商户登录名</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{$data -> username}}"
                                       placeholder="请输入登录名" disabled>
                            </div>
							<div class="form-group">
                                <label for="name">商户名称</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$data -> name}}"
                                       placeholder="请输入登录名" disabled>
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
							<div class="form-group">
                                <label for="status">状态</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{$data -> status == 1 ? "selected='selected'" : ""}}>已激活</option>
									<option value="0" {{$data -> status == 0 ? "selected='selected'" : ""}}>已禁用</option>
                                   
                                </select>
                            </div>
							<div class="form-group">
                                <label for="is_real_check">实名认证</label>
								 <input type="text" class="form-control" id="is_real_check" name="is_real_check" value="{{$data -> is_real_check == 1 ? '已认证' : '未认证'}}"
                                       placeholder="请输入登录名" disabled>
								
                                <!--<select name="is_real_check" class="form-control">
                                    <option value="1" {{$data -> is_real_check == 1 ? "selected='selected'" : ""}}>已认证</option>
									<option value="0" {{$data -> is_real_check == 0 ? "selected='selected'" : ""}}>未认证</option>
                                   
                                </select>-->
                            </div>
                            <div class="form-group">
                                <label for="logo">商户Logo</label>
                                <img src="{{url(config('app.merchantLogoUrl'))}}/{{$data -> logo}}" width="80" />
                            </div>
                            <!--<div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" id="logo" name="logo">
                                <p class="help-block">请选择一张Logo图像</p>
                            </div>-->
							<div class="form-group">
                                <label for="create_at">创建时间</label>
                                <input type="text" class="form-control" id="create_at" name="create_at" value="{{date('Y-m-d',$data -> create_at)}}"
                                       placeholder="请输入创建时间" disabled>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">更新</button>
                            <button type="reset" class="btn btn-danger">重置</button>
                        </div>
                    </form>
					<div class="box-footer col-md-offset-10" >
					<a href="{{url('admin/merchant')}}">
					<button type="submit" class="">返回</button>
					</a>
				</div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection