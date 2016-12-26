@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            商户管理
            <small>在这里进行商户的详情查看</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">商户详情</a></li>
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
                        <h3 class="box-title">商户详情</h3>
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
                                <label for="username">商户登录名</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{$data -> username}}"
                                       placeholder="请输入登录名" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="name">商户名称</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$data -> name}}"
                                       placeholder="请输入登录名" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="name">保证金</label>
                                <input type="text" class="form-control" id="account" name="account" value="{{$data -> account}}"
                                       placeholder="请输入保证金" disabled>
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
							<div class="form-group col-md-3">
                                <label for="status">状态</label>
                                <input type="text" class="form-control" id="status" name="status" value="{{$data -> status == 1 ? '已激活':'已禁用'}}" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="is_real_check">实名认证</label>
                                <input type="text" class="form-control" id="is_real_check" name="is_real_check" value="{{$data -> is_real_check == 1 ? '已认证' :'未认证'}}" disabled>
                            </div>
							<div class="form-group col-md-3">
								<label for="create_at">首次创建时间</label>
								<input type="text" class="form-control" id="create_at" name="create_at" value="{{date('Y-m-d',$data -> create_at)}}"
										   placeholder="请输入创建时间" disabled>
								</div>
							<div class="form-group col-md-3">
								<label for="update_at">最近更新时间</label>
								<input type="text" class="form-control" id="update_at" name="update_at" value="{{date('Y-m-d',$data -> update_at)}}"
										   placeholder="请输入更新时间" disabled>
							</div>
							<div class="form-group col-md-3">
								<label for="logo">商户Logo</label>
								<img src="{{url(config('app.merchantLogoUrl'))}}/{{$data->logo}}" width="80" />
							</div>
							<div class="row"></div>
							@if($data -> is_real_check == 1)
								<div class="box-header with-border ">
									<h3 class="box-title">身份信息</h3>
								</div>
								<div class="row" style="margin-bottom:10px;"></div>
								<div class="form-group col-md-3">
									<label for="name">真实姓名</label>
									<input type="text" class="form-control" id="name" name="name" value="{{$detail -> name}}"
										   placeholder="请输入真实姓名" disabled>
								</div> 
								<div class="form-group col-md-3">
									<label for="sex">性别</label>
									<input type="text" class="form-control" id="sex" name="sex" value="{{$detail -> sex == 1 ? '男' : '女'}}"
										   placeholder="请输入性别" disabled>
								</div>
								<div class="form-group col-md-3">
									<label for="email">邮箱-email</label>
									<input type="text" class="form-control" id="email" name="email" value="{{$detail -> email}}"
										   placeholder="请输入年龄" disabled>
								</div>
								<div class="form-group col-md-3">
									<label for="phone">联系方式</label>
									<input type="text" class="form-control" id="phone" name="phone" value="{{$detail -> phone}}"
										   placeholder="请输入phone" disabled>
								</div>
								<div class="form-group col-md-3">
									<label for="cid_no">身份证号码</label>
									<input type="text" class="form-control" id="cid_no" name="cid_no" value="{{$detail -> cid_no}}"
										   placeholder="请输入身份证号码" disabled>
								</div>
								<div class="form-group col-md-3">
									<label for="cid_img">身份证正面照片</label>
									<img src="{{url(config('app.merchantCidUrl'))}}/{{$detail -> cid_img}}"
										   placeholder="请输入身份证正面照片" width="80" />
								</div>
								
							
							@endif
							<div class="row"></div>
							<div class="box-header with-border ">
								<h3 class="box-title">商铺描述</h3>
							</div>
							<div class="row" style="margin-bottom:10px;"></div>
							<div class="form-group col-md-12">
                                <label for="desc">商铺具体描述信息</label>
                                <div id="heditor"  style="width:100%;height:100%;border:1px solid #ccc;" >{!! $data -> desc !!}</header>
                            </div>
							
							
                        </div><!-- /.box-body -->

                        <div class="box-footer">
							<a href="{{url('/admin/merchant')}}">
                            <button type="submit" class="btn btn-primary" value="返回">返回</button></a>
                            <!--<button type="reset" class="btn btn-danger">重置</button>-->
                        </div>
                   
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


@endsection