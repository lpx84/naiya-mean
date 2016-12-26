@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            品牌管理
            <small>在这里进行品牌的编辑管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">品牌编辑</a></li>
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
                        <h3 class="box-title">品牌编辑</h3>
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
                    <form role="form" action="{{asset('/admin/brand')}}/{{$brand->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" name="oldImg" value="{{$brand -> img}}"/>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">品牌名</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$brand -> name}}"
                                       placeholder="请输入品牌名">
                            </div>
							<div class="form-group">
                                <label>所属分类</label>
                                <select name="cid" class="form-control">
                                    <option value="0">根分类</option>
                                    @foreach($data as $v)
                                    <option value="{{$v -> id}}"  {{$v -> id == $brand -> cid ? "selected='selected'" : ""}}>{{$v -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
							<div class="form-group">
                                <label>推荐品牌</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{$brand -> status == 1 ? "selected='selected'" : ""}}>不推荐，正常显示</option>
									<option value="2" {{$brand -> status == 2 ? "selected='selected'" : ""}}>推荐为热门品牌</option>
									
                                </select>
                            </div>
							<div class="form-group">
                                <label for="img">当前品牌图像</label>
                                <img src="{{url(config('app.brandUrl'))}}/{{$brand->img}}" width="80" />
                            </div>
                            <div class="form-group">
                                <label for="img">品牌图像</label>
                                <input type="file" id="img" name="img">
                                <p class="help-block">请选择一张品牌图像上传</p>
                            </div>
							<div class="form-group">
                                <label for="desc">品牌描述</label>
                                <script id="editor" name="desc" type="text/plain" style="width:100%;height:300px;" value="">{!! $brand -> desc !!}</script>
                            </div>
							<!-- 以下为修改密码所用 -->
                            <!--<div class="form-group">
                                <label for="password">密码</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="请输入密码">
                            </div>
                            <div class="form-group">
                                <label for="repassword">确认密码</label>
                                <input type="password" class="form-control" id="repassword" name="repassword"
                                       placeholder="请再输入一次密码">
                            </div>-->
							<!-- 修改密码所用结束-->

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">更新</button>
                            <button type="reset" class="btn btn-danger">重置</button>
                        </div>
                    </form>
					<div class="box-footer col-md-offset-10" >
						<a href="{{url('admin/brand')}}">
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