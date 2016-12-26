@extends('merchant.layout')
@section('meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('title',$title)
@section('content')
<!--link href="{{asset('/html5upload/css/bootstrap.min.css')}}" rel="stylesheet"-->
<link href="{{asset('/html5upload/css/default.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/html5upload/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css" />

<div class="content-wrapper">
    <!-- Content img (Page img) -->
    <section class="content-header">
        <h1>
            发布商品
            <small>第二步：商品添加</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">商品添加</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
            @if(session('msg'))
            <div id="info" class="callout callout-info">
                <p>{{session('msg')}}</p>
            </div>
            @endif
            @if (count($errors) > 0)
                <div class="callout callout-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            </div>
        </div>
        <div class="row">
            <!-- form start -->
            <form role="form" id="goodsForm" action="{{asset('/merchant/goods')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="cid" value="{{$cateId}}" />
                <input type="hidden" name="oneId" value="{{$oneId}}" />
                <input type="hidden" name="twoId" value="{{$twoId}}" />
                <input type="hidden" name="threeId" value="{{$threeId}}" />
                
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h5 class="box-title">当前分类:</h5>
                            @foreach($cates as $v)
                             　>　{{$v -> name}}
                            @endforeach
                            <a href="{{url('/merchant/goods/create')}}" title="修改当前分类"><i class="fa fa-fw fa-edit"></i></a>
                        </div><!-- /.box-img -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label>品牌</label>
                                    <select name="bid" class="form-control">
                                        <option>请选择品牌</option>
                                        @foreach($brands as $v)
                                        <option value="{{$v -> id}}">{{$v -> name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="code">商品编号</label>
                                    <input type="text" class="form-control" id="code" name="code" value="{{time().'-'.str_random(4)}}"
                                           placeholder="请输入商品编号">
                                </div>
                                <div class="form-group">
                                    <label for="paramsName">商品属性</label>
                                </div>
                                @foreach($attrs as $k => $v)
                                <div name="attrs" class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="hidden" name="attrName[{{ $v['anid'] }}]" value="{{ $v['anid'] }}" />
                                            <label>{{ $v ['name'] }}</label>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="btn-group" data-toggle="buttons">
                                        @if(isset($v['sub']))
                                            @foreach($v['sub'] as $key => $value)
                                                <label class="btn btn-primary">
                                                    <input type="radio" name="attrValue[{{ $v['anid'] }}][]" value="{{ $value['avid'] }}" autocomplete="off"> {{ $value['value'] }}
                                                </label>
                                        @endforeach
                                        @endif
                                        @if(isset($v['extSub']))
                                            @foreach($v['extSub'] as $key => $value)
                                                <label class="btn btn-primary">
                                                    <input type="radio" name="attrExtValue[{{ $v['anid'] }}][]" value="{{ $value['mavid'] }}" autocomplete="off"> {{ $value['mavValue'] }}
                                                </label>
                                        @endforeach
                                        @endif
                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:void(0);" data="{{ $v['anid'] }}" isInput="false" class="btn btn-info" onclick="addAttrs(this)"><i class="fa fa-fw fa-plus-square"></i>添加</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                <div class="form-group">
                                    <label for="name">商品名称</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"
                                           placeholder="请输入名称">
                                </div>
                                <div class="form-group">
                                    <label for="smallImg">商品缩略图</label>
                                    <input type="file" class="form-control" id="smallImg" name="smallImg" placeholder="商品缩略图">
                                </div>
                                <div class="form-group">
                                    <label for="desc">商品内容</label>
                                    <script id="editor" name="desc" type="text/plain" style="width:100%;height:200px;"></script>
                                </div>
                                <div class="form-group">
                                    <label for="price">单价</label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}"
                                           placeholder="请输入单价">
                                </div>
                                <div class="form-group">
                                    <label for="nums">数量</label>
                                    <input type="text" class="form-control" id="nums" name="nums" value="{{old('nums')}}"
                                           placeholder="请输入数量">
                                </div>
                                <div class="form-group">
                                    <label for="paramsName">商品参数</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-lg btn-primary btn-block" href="javascript:void(0);" onclick="addParams(this)"><i class="fa fa-fw fa-plus-square"></i>添加</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加</button>
                                <button type="reset" class="btn btn-danger">重置</button>
                            </div>
                    </div><!-- /.box -->
                </div><!--/.col (left) -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h5 class="box-title">商品配图(最多5张)</h5>
                        </div><!-- /.box-img -->
                        <div class="box-body">
                            <div class="form-group">
                                <form enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input id="img" type="file" name="img" multiple class="file-loading" accept="image/*">
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                </div>
            </form>
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/ueditor.all.min.js')}}"> </script>
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
<script type="text/javascript">
    //实例化编辑器
    var ue = UE.getEditor('editor');
</script>

<div id="params" class="form-group hide">
    <div class="row">
        <div class="col-md-4">
            <input type="text" class="form-control" name="name" placeholder="参数名">
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="value" placeholder="参数值">
        </div>
        <a class="btn btn-small btn-primary" href="javascript:void(0);" onclick="delParams(this)"><i class="fa fa-fw fa-minus-square"></i>删除</a>
    </div>
</div>
@endsection
@section('extendJS')
<!--script src="{{asset('/html5upload/js/jquery.min.js')}}"></script-->
<script src="{{asset('/html5upload/js/fileinput.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/html5upload/js/fileinput_locale_zh.js')}}" type="text/javascript"></script>
<!--script src="{{asset('/html5upload/js/bootstrap.min.js')}}" type="text/javascript"></script-->

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    setTimeout(function(){
        $("#info").slideUp(500);
    }, 3000);
    
    //上传图片
    //参考地址 http://plugins.krajee.com/file-advanced-usage-demo
    $("#img").fileinput({
        uploadUrl: '{{ url("/merchant/goods/uploads") }}', // you must set a valid URL here else you will get an error
        allowedFileExtensions : ['jpg', 'png','gif'],
        maxFileSize: 1000,
        allowedFileTypes: ['image'],
        allowedPreviewTypes:['image'],
        previewSettings:{
            image: {width: "auto", height: "140px"}
        },
        maxImageWidth: 200,
        maxImageHeight: 120,
        resizePreference: 'height',
        maxFileCount: 5,
        resizeImage: true,
        overwriteInitial: false,
        initialCaption: "商品配图",
        showUploadedThumbs:true
    }).on('fileuploaded', function(event, data) {
        console.log(event);
        console.log(data.response.filename);
        var img = $('<input type="hidden" name="imgs[]" value="'+(data.response.filename)+'" />');
        $("#goodsForm").prepend(img);
    });
    
    var nums = $('div[name="params"]').length;
    //添加参数
    function addParams(btn){
        var newRow = $('#params').clone();
        
        newRow.attr('id', '');
        newRow.attr('name', 'params');
        newRow.find('input[name="name"]').attr('name','paramsName['+(nums)+']');
        newRow.find('input[name="value"]').attr('name','paramsValue['+(nums)+']');
        newRow.removeClass('hide');
        newRow.show();
        
        $(btn).parent().parent().before(newRow);
        nums++;
    }
    
    //删除参数
    function delParams(btn){
        $(btn).parent().parent().remove();
    }
    
    //添加属性值
    function addAttrs(btn){
        if($(btn).attr("isInput") == "true"){
            return false;
        }
        $(btn).attr("isInput", 'true');
        //标准属性名ID
        var anid = $(btn).attr("data");
        
        var nums = $(btn).parent().parent().find('.col-md-6 > .btn-group > label').length;
        
        var newRow = $('<input type="text" class="form-control" name="attrValue['+anid+']['+(nums)+'][]" placeholder="属性值">');
        
        $(btn).parent().parent().find('.col-md-6').prepend(newRow);
        newRow.focus();
        newRow.blur(function(){
            //获取新值
            var value = newRow.val();
            if(value == ''){
                newRow.remove();
                $(btn).attr("isInput", 'false');
                return false;
            }
            
            $.ajax({
                url:'{{ url("/merchant/goods/insertextattr") }}',
                type:'POST',
                dataType:'json',
                data:{value:value,anid:anid},
                success:function(data){
                    console.log(data);
                    if(data.code === 0){
                        //添加成功
                        newRow.remove();
                        //把新值加到label中
                        var html = '<label class="btn btn-primary">';
                        html += '<input type="radio" name="attrExtValue['+anid+'][]" value="'+data.extid+'" autocomplete="off"> '+value;
                        html += '</label>';
                        $(btn).parent().parent().find('.col-md-6 .btn-group').append($(html));
                        //修改添加按钮状态
                        $(btn).attr("isInput", 'false');
                    }else{
                        //添加失败
                        alert('添加失败');
                        newRow.remove();
                        $(btn).attr("isInput", 'false');
                    }
                }
            });
        });
    }
</script>
@endsection
