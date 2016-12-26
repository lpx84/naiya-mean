@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content img (Page img) -->
    <section class="content-header">
        <h1>
            文章管理
            <small>文章编辑</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">文章编辑</a></li>
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
                        <h3 class="box-title">文章编辑</h3>
                    </div><!-- /.box-img -->
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
                    <form role="form" action="{{asset('/admin/messages')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="title">标题</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$data -> title}}"
                                       placeholder="请输入标题">
                            </div>
                            <div class="form-group">
                                <label for="content">内容</label>
                                <textarea id="editor" name="content" type="text/plain" style="width:100%;height:300px;" >{!!$data -> content!!}</textarea>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">更新</button>
                            <button type="reset" class="btn btn-danger">重置</button>
                        </div>
                    </form>
					<div class="box-footer col-md-offset-10" >
						<a href="{{url('admin/messages')}}">
						<button type="submit" class="">返回</button>
						</a>
					</div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/ueditor.all.min.js')}}"> </script>
<!--这里加载的语言文件会覆盖你在配置项目里编辑的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script>


@endsection
