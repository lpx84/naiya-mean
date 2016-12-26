@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户管理
            <small>在这里进行用户的编辑管理</small>
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
                    <form role="form" action="{{asset('/admin/user')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" name="oldHeader" value="{{$data -> header}}"/>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username">昵称</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{$data -> username}}"
                                       placeholder="请输入昵称" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">邮箱账号</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$data -> email}}"
                                       placeholder="请输入一个有效邮箱" disabled>
                            </div>
							<div class="form-group">
                                <label for="account">金额</label>
                                <input type="text" class="form-control" id="account" name="account" value="{{$data -> account}}"
                                       placeholder="请输入金额" >
                            </div>
                            <div class="form-group">
                                <label for="phone">手机号</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$data -> phone}}" placeholder="请输入手机号码" disabled>
                            </div>
							<div class="form-group">
                                <label for="score">积分</label>
                                <input type="text" class="form-control" id="score" name="score" value="{{$data -> score}}"
                                       placeholder="请输入积分" disabled>
                            </div>
							<div class="form-group">
                                <label for="max_score">调整等级</label>
                                <input type="text" class="form-control" id="max_score" name="max_score" value="{{$data -> max_score}}"
                                       placeholder="请输入最大积分" ><span>请输入用户最大积分,以此来改变用户级别</span>
                            </div>
							<div class="form-group">
                                <label for="level">级别</label>
                                <input type="text" class="form-control" id="level" name="level" value="{{$grade}}"
                                       placeholder="请输入级别" disabled>
                            </div>
							<div class="form-group">
                                <label for="status">状态</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{$data -> status == 1 ? "selected='selected'" : ""}}>已激活</option>
									<option value="0" {{$data -> status == 0 ? "selected='selected'" : ""}}>已禁用</option>
                                   
                                </select>
                            </div>
							<!--<div class="form-group">
                                <label for="is_real_check">是否实名认证</label>
                                <select name="is_real_check" class="form-control">
                                    <option value="1" {{$data -> is_real_check == 1 ? "selected='selected'" : ""}}>已认证</option>
									<option value="0" {{$data -> is_real_check == 0 ? "selected='selected'" : ""}}>未认证</option>
                                   
                                </select>
                            </div>-->
                            <div class="form-group">
                                <label for="header">用户头像</label>
                                <img src="{{url(config('app.userUrl'))}}/{{$data->header}}" width="80" />
                            </div>
                            <!--<div class="form-group">
                                <label for="header">头像</label>
                                <input type="file" id="header" name="header">
                                <p class="help-block">请选择一张头像</p>
                            </div>-->
							<div class="form-group">
                                <label for="create_at">创建时间</label>
                                <input type="text" class="form-control" id="create_at" name="create_at" value="{{date('Y-m-d',$data -> create_at)}}"
                                       placeholder="请输入创建时间" disabled>
                            </div>
							<div class="form-group">
                                <label for="update_at">上次更新时间</label>
                                <input type="text" class="form-control" id="update_at" name="updat_at" value="{{date('Y-m-d',$data -> update_at)}}"
                                       placeholder="上次更新时间" disabled>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">更新</button>
                            <button type="reset" class="btn btn-danger">重置</button>
                        </div>
                    </form>
					<div class="box-footer col-md-offset-10" >
					<a href="{{url('admin/user')}}">
					<button type="submit" class="">返回</button>
					</a>
				</div>
                </div><!-- /.box -->
				
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection