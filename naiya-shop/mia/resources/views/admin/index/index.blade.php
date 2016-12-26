@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                后台主页
                <small>后台主页</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">后台主页</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style="background-color:white;margin-top:45px;">
			
			<div style="align:center;margin-bottom:45;">
				<img src="{{url('admin/hello.jpg')}}" />
				
			</div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


@endsection