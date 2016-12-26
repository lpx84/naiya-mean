@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            评论详情
            <small>在这里进行评论的内容查看</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">评论内容查看</a></li>
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
                        <h3 class="box-title">评论信息</h3>
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
						
							<div class="row" style="margin-bottom:10px;"></div>
							<div data-example-id="contextual-table" class="bs-example" >
								
									<table class="table" >
									  <thead>
										<tr>
										  <th>#</th>
										  <th>名称</th>
										  <th>详细信息</th>
										</tr>
									  </thead>
									  <tbody>
										<tr class="active">
										  <th scope="row">1</th>
										  <td>商品名称</td>
										  <td>{{$data -> name}}</td>
										  
										</tr>
										<tr>
										  <th scope="row">2</th>
										  <td>用户名称</td>
										  <td>{{$user -> username}}</td>
										 
										</tr>
										<tr class="success">
										  <th scope="row">3</th>
										  <td>标题</td>
										  <td>{{$data -> title}}</td>
										  
										</tr>
										<tr>
										  <th scope="row">4</th>
										  <td>内容</td>
										  <td>{{$data -> content}}</td>
										</tr>
										<tr class="info">
										  <th scope="row">5</th>
										  <td>评论图片</td>
										  <td><img src="{{url('/uploads')}}/{{$img -> img}}" width = "80" /></td>
										  
										</tr>
										<tr>
										  <th scope="row">6</th>
										  <td>创建时间</td>
										  <td>{{date('Y-m-d H:i:s',$data -> create_at)}}</td>
										  
										</tr>
									  </tbody>
									</table>
								  </div>
                        <div class="box-footer">
							<a href="{{url('/admin/comment')}}">
                            <button type="submit" class="btn btn-primary">返回</button>
							</a>
                        </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection
