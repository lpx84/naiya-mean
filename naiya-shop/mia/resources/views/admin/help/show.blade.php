@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            帮助中心详情
            <small>在这里进行帮助中心详情的查看</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">帮助中心详情查看</a></li>
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
                        <h3 class="box-title">帮助中心详情</h3>
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

							<div class = "row"></div>
								<div data-example-id="contextual-table" class="bs-example">
									<table class="table">
									  <thead>
										<tr>
										  <th>#</th>
										  <th>标题</th>
										  <th>详细信息</th>
										</tr>
									  </thead>
									  <tbody>
										<tr class="active">
										  <th scope="row">1</th>
										  <td>标题</td>
										  <td>{{$data -> title}}</td>
										  
										</tr>
										<tr>
										  <th scope="row">2</th>
										  <td>内容</td>
										  <td>{!!$data -> content!!}</td>
										 
										</tr>
									  </tbody>
									</table>
								  </div>
						
                        </div><!-- /.box-body -->

                        <div class="box-footer">
							<a href="{{url('/admin/help')}}">
                            <button type="submit" class="btn btn-primary">返回</button>
							</a>
                        </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection
