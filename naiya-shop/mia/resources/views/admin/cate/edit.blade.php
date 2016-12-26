@extends('admin.layout')
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
            <li><a href="#">分类修改</a></li>
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
                        <h3 class="box-title">分类修改</h3>
                    </div><!-- /.box-header -->
                    <div class="row">
                    <div class="col-md-6">
                    
                    <!-- form start -->
                    <form role="form" action="{{asset('/admin/cate')}}/{{$data -> id}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="box-body">
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
                                <input type="text" class="form-control" id="name" name="name" value="{{$data -> name}}"
                                       placeholder="请输入分类名">
                            </div>
                            <!-- select -->
                            <div class="form-group">
                                <label>父分类</label>
                                <select name="pid" class="form-control">
                                    <option value="0" {{$data -> pid == 0 ? "selected='selected'" : ""}}>根分类</option>
                                    @foreach($allData as $v)
                                    <option value="{{$v -> id}}" 
                                    {{$v -> id == $data -> pid ? "selected='selected'" : ""}}
                                    
                                    {{$v -> id == $data -> id ? "disabled" : ""}}
                                    
                                    >{{$v -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
							<div class="form-group">
                                <label for="status">状态</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{$data -> status == 1 ? "selected='selected'" : ""}}>启用</option>
									<option value="0" {{$data -> status == 2 ? "selected='selected'" : ""}}>禁用</option>
                                   
                                </select>
                            </div>
							<div class="form-group col-md-12">
                                <label for="attr_name">分类的属性</label>
								<div class="row"></div>
								<table  style="border:2px solid #ccc; width:80%; " >
								@foreach($attr as $a => $t)
								<tr>
								<td>
                                <input type="checkbox"  id="attr_name" name="attr_name[]" value="{{$t -> id}}" 
								@foreach($cate_attr as $ca => $c)
								{{$t -> id == $c -> anid ? 'checked="checked"' : ''}}
								@endforeach
								 style="margin-left:30px;"/> {{$t -> name}}</td></tr>
								@endforeach
								
								</table>
                            </div>
							
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">更新</button>
                                <button type="reset" class="btn btn-danger">重置</button>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
					
                    </div>
					
                    </div>
					<div class="row">
						<div class="box-footer col-md-offset-10" >
						<a href="{{url('admin/cate')}}">
						<button type="submit" class="">返回</button>
						</a>
						</div>
					</div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection