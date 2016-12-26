@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            评论管理
            <small>在这里进行商品的评论审核</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">评论审核</a></li>
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
                        <h3 class="box-title">审核编辑</h3>
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
                    <form role="form" action="{{asset('/admin/comment')}}/{{$data->id}}" method="post" >
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                       
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">商品名称</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$data -> name}}"
                                       placeholder="请输入账户名" disabled>
                            </div>
							<div class="form-group">
                                <label for="status">状态</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{$data -> status == 1 ? "selected='selected'" : ""}}>审核中</option>
									<option value="2" {{$data -> status == 2 ? "selected='selected'" : ""}}>正常显示</option>
									<option value="3" {{$data -> status == 3 ? "selected='selected'" : ""}}>屏蔽</option>
                                   
                                </select>
                            </div>
                            
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">更新</button>
                            <button type="reset" class="btn btn-danger">重置</button>
                        </div>
                    </form>
					<div class="box-footer col-md-offset-10" >
					<a href="{{url('admin/comment')}}">
					<button type="submit" class="">返回</button>
					</a>
				</div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection