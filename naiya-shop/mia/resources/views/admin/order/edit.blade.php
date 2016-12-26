@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            退款管理
            <small>在这里进行订单的退款管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">退款管理</a></li>
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
                        <h3 class="box-title">退款确认</h3>
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
                    <form role="form" action="{{asset('/admin/order')}}/{{$data -> oid}}" method="post" >
                        {{csrf_field()}}
							{{method_field('PUT')}}
                        <div class="box-body">
                            <div class="form-group">
                                
                                <h3>请确认退款？你真的要退款吗？</h3>
								<p>一旦确认将无法修改,如未确认，请返回！</p>
                            </div>
                           <input type="hidden" name="status" value="11" />
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger">确认</button>
							
                        </div>
                    </form>
					<div class="box-footer">
						<a href="{{url('/admin/order')}}">
                            <button type="submit" class="btn btn-primary">返回</button>
						</a>
					</div>
					
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection