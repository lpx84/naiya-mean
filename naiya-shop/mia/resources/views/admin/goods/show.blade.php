@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            商品详情
            <small>在这里进行商品的详情查看</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">商品详情查看</a></li>
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
                        <h3 class="box-title">商户信息</h3>
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
                                <label for="name">所属商户</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$data -> mm}}"
                                       placeholder="请输入所属商户" disabled>
                            </div>
							@if($data -> is_real_check)
                            <div class="form-group col-md-3">
                                <label for="trueName">真实姓名</label>
                                <input type="text" class="form-control" id="trueName" name="trueName" value="{{$data -> dm}}"
                                       placeholder="请输入一个有效邮箱" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="sex">性别</label>
                                <input type="text" class="form-control" id="sex" name="sex" value="{{$data -> sex == 1 ? '男':'女'}}"
                                       placeholder="请输入一个有效金额" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="phone">联系方式</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$data -> phone}}"
                                       placeholder="请输入一个有效手机号" disabled>
                            </div>
							@endif

							<div class = "row"></div>
							<div class="box-header with-border ">
								<h3 class="box-title">商品信息</h3>
							</div>
							<div class="row" style="margin-bottom:10px;"></div>
								<div data-example-id="contextual-table" class="bs-example">
									<table class="table">
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
										  <td>商品编号</td>
										  <td>{{$data -> code}}</td>
										 
										</tr>
										<tr class="success">
										  <th scope="row">3</th>
										  <td>商品图片</td>
										  <td> <img src="{{url(config('app.goodsUrl'))}}/{{$data -> img}}" width="80"/></td>
										  
										</tr>
										<tr>
										  <th scope="row">4</th>
										  <td>商品描述</td>
										  <td>
										  {!! $data -> desc !!}
										  </td>
										</tr>
										<tr class="info">
										  <th scope="row">5</th>
										  <td>商品单价</td>
										  <td>{{$data -> price}}</td>
										  
										</tr>
										<tr>
										  <th scope="row">6</th>
										  <td>库存数量</td>
										  <td>{{$data -> nums}}</td>
										  
										</tr>
										<tr class="warning">
										  <th scope="row">7</th>
										  <td>状态</td>
										  <td>
											@if($data -> status == 1)
												已下架
											@elseif($data -> status == 2)
												已上架
											@endif
										</td>
										  
										</tr>
										<tr >
										  <th scope="row">8</th>
										  <td>创建时间</td>
										  <td>{{date('Y-m-d H:i:s',$data -> create_at)}}</td>
										 
										</tr>
										<tr class="danger">
										  <th scope="row">9</th>
										  <td>更新时间</td>
										  <td>{{date('Y-m-d H:i:s',$data -> update_at)}}</td>
										  
										</tr>
									  </tbody>
									</table>
								  </div>
							<div class = "row"></div>
							
                        </div><!-- /.box-body -->

                        <div class="box-footer">
							<a href="{{url('/admin/goods')}}">
                            <button type="submit" class="btn btn-primary">返回</button>
							</a>
                        </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection
