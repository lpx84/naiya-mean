@extends('merchant.layout')
@section('title',$title)
@section('content')

<script src="{{url('/distpicker/js/distpicker.data.js')}}"></script>

<div class="content-wrapper">
    <!-- Content img (Page img) -->
    <section class="content-header">
        <h1>
            物流管理
            <small>物流添加</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">物流添加</a></li>
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
                        <h3 class="box-title">物流添加</h3>
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
                    <form role="form" action="{{asset('/merchant/logistics')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="oid" value="{{$oid}}" />
                        <input type="hidden" name="mid" value="{{$mid}}" />
                        <input type="hidden" name="order_no" value="{{$order_no}}" />
                        <div class="box-body">
                            @if($address)
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>收货人</b> <a class="pull-right">{{$address->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>联系方式</b> <a class="pull-right">{{$address->phone}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>地址</b> <a class="pull-right">
                                    <script type="text/javascript">
                                    var p = ChineseDistricts[{{$address->country}}][{{$address->province}}];
                                    
                                    var c = ChineseDistricts[{{$address->province}}][{{$address->city}}];
                                    
                                    var a = ChineseDistricts[{{$address->city}}][{{$address->area}}];
                                    
                                    document.write(p);
                                    document.write(' ');
                                    document.write(c);
                                    document.write(' ');
                                    document.write(a);
                                    </script>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>详细地址</b> <a class="pull-right">{{$address->detail}}</a>
                                </li>
                            </ul>
                            @endif
                            <div class="form-group">
                                <label for="company">快递公司</label>
                                <input type="text" class="form-control" id="company" name="company" value="{{old('company')}}"
                                       placeholder="请输入快递公司">
                            </div>
                            <div class="form-group">
                                <label for="logi_no">快递单号</label>
                                <input type="text" class="form-control" id="logi_no" name="logi_no" value="{{old('logi_no')}}"
                                       placeholder="请输入快递单号">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">添加</button>
                            <button type="reset" class="btn btn-danger">重置</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/ueditor.all.min.js')}}"> </script>
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script>


@endsection
