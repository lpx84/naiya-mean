@extends('merchant.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            分类管理
            <small>在这里进行分类管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">分类添加</a></li>
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
                        <h3 class="box-title">分类添加</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{asset('/merchant/cate')}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body col-md-6">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="name">分类名</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"
                                       placeholder="请输入分类名">
                            </div>
                            <!-- select -->
                            <div class="form-group">
                                <label>父分类</label>
                                <select name="pid" class="form-control">
                                    <option value="0">根分类</option>
                                    @foreach($data as $v)
                                    <option value="{{$v -> id}}">{{$v -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">添加</button>
                                <button type="reset" class="btn btn-danger">重置</button>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection