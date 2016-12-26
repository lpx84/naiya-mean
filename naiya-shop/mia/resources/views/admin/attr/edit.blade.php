@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            属性管理
            <small>在这里进行属性的管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">属性编辑</a></li>
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
                        <h3 class="box-title">属性编辑</h3>
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
                    <form role="form" action="{{asset('/admin/attr')}}/{{$data['id']}}" method="post" >
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" name="anid" value="{{$data['anid']}}"/>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">属性名</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$data['name']}}" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="value">属性值</label>
                                <input type="text" class="form-control" id="value" name="value" value="{{$data['value']}}" placeholder="">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">更新</button>
							<button type="resete" class="btn btn-danger">重置</button>
                        </div>
                    </form>
					<div class="box-footer col-md-offset-10" >
					<a href="{{url('admin/attr')}}">
					<button type="submit" class="">返回</button>
					</a>
				</div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection