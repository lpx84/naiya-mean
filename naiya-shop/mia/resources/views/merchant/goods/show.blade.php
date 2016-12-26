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
            编辑商品
            <small>商品编辑</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">商品编辑</a></li>
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
            <form role="form" id="goodsForm" action="{{asset('/merchant/goods/'.$goods->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h5 class="box-title">当前分类:</h5>
                            @foreach($cates as $v)
                             　>　{{$v -> name}}
                            @endforeach
                        </div><!-- /.box-img -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label>品牌</label>
                                    <select name="bid" class="form-control">
                                        <option>请选择品牌</option>
                                        @foreach($brands as $v)
                                        <option value="{{$v -> id}}" {{$goods->bid == $v -> id ? 'selected="selected"' : ''}}>{{$v -> name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="code">商品编号</label>
                                    <input disabled="disabled" type="text" class="form-control" id="code" name="code" value="{{$goods->code}}"
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
                                                <label class="btn btn-primary {{isset($value['checked']) ? 'active' : ''}}">
                                                    <input type="radio" {{isset($value['checked']) ? 'checked="checked"' : ''}} name="attrValue[{{ $v['anid'] }}][]" value="{{ $value['avid'] }}" autocomplete="off"> {{ $value['value'] }}
                                                </label>
                                        @endforeach
                                        @endif
                                        @if(isset($v['extSub']))
                                            @foreach($v['extSub'] as $key => $value)
                                                <label class="btn btn-primary {{isset($value['checked']) ? 'active' : ''}}">
                                                    <input type="radio" {{isset($value['checked']) ? 'checked="checked"' : ''}} name="attrExtValue[{{ $v['anid'] }}][]" value="{{ $value['mavid'] }}" autocomplete="off"> {{ $value['mavValue'] }}
                                                </label>
                                        @endforeach
                                        @endif
                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:void(0);" data="{{ $v['anid'] }}" isInput="false" class="btn btn-info" onclick="addAttrs(this)"><i class="fa fa-fw fa-plus-square"></i>编辑</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                <div class="form-group">
                                    <label for="name">商品名称</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$goods->name}}"
                                           placeholder="请输入名称">
                                </div>
                                <div class="form-group">
                                    <label for="smallImg">商品缩略图</label>
                                    <input type="file" class="form-control" id="smallImg" name="smallImg" placeholder="商品缩略图">
                                    <img src="{{ url(config('app.goodsUrl').'/'.$goods->img) }}" width="150" />
                                </div>
                                <div class="form-group">
                                    <label for="desc">商品内容</label>
                                    <textarea id="editor" name="desc" style="width:100%;height:200px;">{!!($goods -> desc)!!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">单价</label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{$goods -> price}}"
                                           placeholder="请输入单价">
                                </div>
                                <div class="form-group">
                                    <label for="nums">数量</label>
                                    <input type="text" class="form-control" id="nums" name="nums" value="{{$goods -> nums}}"
                                           placeholder="请输入数量">
                                </div>
                                <div class="form-group">
                                    <label for="paramsName">商品参数</label>
                                    @foreach($params as $k => $v)
                                    <div class="form-group" name="params">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="paramsName[{{$k}}]" value="{{$v->name}}" placeholder="参数名">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="paramsValue[{{$k}}]" value="{{$v->value}}" placeholder="参数值">
                                            </div>
                                            <a class="btn btn-small btn-primary" href="javascript:void(0);" onclick="delParams(this)"><i class="fa fa-fw fa-minus-square"></i>删除</a>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-md btn-primary btn-block" href="javascript:void(0);" onclick="addParams(this)"><i class="fa fa-fw fa-plus-square"></i>添加</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">更新</button>
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
<!--这里加载的语言文件会覆盖你在配置项目里编辑的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
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
    
    var totalImg = {{count($imgs)}};
    //多图上传
    //参考地址 http://plugins.krajee.com/file-advanced-usage-demo
    $("#img").fileinput({
        uploadUrl: '{{ url("/merchant/goods/updateuploads/".$goods->id) }}', // you must set a valid URL here else you will get an error
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
        maxFileCount: 5-totalImg,
        resizeImage: true,
        ///////////////////////////
        initialPreview: [
            @foreach($imgs as $k => $v)
            @if(file_exists(config('app.goodsDir').$v->img))
            '{{url(config("app.goodsUrl").$v->img)}}',
            @endif
            @endforeach
        ],
        initialPreviewAsData: true,
        initialPreviewConfig: [
            @foreach($imgs as $k => $v)
            {caption: "{{$v->title}}", size: {{file_exists(config('app.goodsDir').$v->img) ? filesize(config('app.goodsDir').$v->img) : 10}}, width: "120px", key: "{{$v->gid.','.$v->img}}"},
            @endforeach
        ],
        deleteUrl: "{{url('/merchant/goods/deluploads')}}",
        overwriteInitial: false,
        initialCaption: "商品配图",
        showUploadedThumbs:true
        
    }).on('filedeleted', function(event, key) {
        console.log('Key = ' + key);
        // totalImg = totalImg - 1;
        // if(5 - totalImg <= 0){
            // $('#img').attr('disabled', 'disabled');
        // }else{
            // $('#img').removeAttr('disabled')
        // }
    }).on('fileuploaded', function(event, data) {
        console.log('fileuploaded');
        console.log(data);
        // totalImg = totalImg + 1;
        // if(5 - totalImg <= 0){
            // $('#img').attr('disabled', 'disabled');
        // }else{
            // $('#img').removeAttr('disabled')
        // }
    });
    
    // totalImg = totalImg + 1;
    // if(5 - totalImg <= 0){
        // $('#img').attr('disabled', 'disabled');
    // }else{
        // $('#img').removeAttr('disabled')
    // }
    
    var nums = $('div[name="params"]').length;
    //编辑参数
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
    
    //编辑属性值
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
                        //编辑成功
                        newRow.remove();
                        //把新值加到label中
                        var html = '<label class="btn btn-primary">';
                        html += '<input type="radio" name="attrExtValue['+anid+'][]" value="'+data.extid+'" autocomplete="off"> '+value;
                        html += '</label>';
                        $(btn).parent().parent().find('.col-md-6 .btn-group').append($(html));
                        //修改编辑按钮状态
                        $(btn).attr("isInput", 'false');
                    }else{
                        //编辑失败
                        alert('编辑失败');
                        newRow.remove();
                        $(btn).attr("isInput", 'false');
                    }
                }
            });
        });
    }
</script>
@endsection
