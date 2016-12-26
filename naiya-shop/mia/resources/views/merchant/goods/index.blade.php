@extends('merchant.layout')
@section('meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('title',$title)
@section('content')
<style>
    #example1 > tbody > tr > td{
        vertical-align: middle;
    }
    td[name]:hover{
        background-color:#eee;
    }
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                商品管理
                <small>在这里进行商品管理</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">商品列表</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @if(session('msg'))
                    <div id="info" class="callout callout-info">
                        <p>{{session('msg')}}</p>
                    </div>
                    @endif
                    <div id="alert" class="callout hide">
                        <p name="content"></p>
                    </div>
                    
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">商品列表</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{url('/merchant/goods')}}" method="get">
                            <div class="row">
                                <div class="col-xs-2">
                                    <!-- select -->
                                    <div class="form-group">
                                        <select name="pageSize" class="form-control">
                                            <option {{isset($request['pageSize']) && $request['pageSize'] == 10 ? 'selected=selected':''}}>10</option>
                                            <option {{isset($request['pageSize']) && $request['pageSize'] == 20 ? 'selected=selected':''}}>20</option>
                                            <option {{isset($request['pageSize']) && $request['pageSize'] == 50 ? 'selected=selected':''}}>50</option>
                                            <option {{isset($request['pageSize']) && $request['pageSize'] == 100 ? 'selected=selected':''}}>100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-offset-7">
                                    <div class="input-group input-group">
                                        <input type="text" name="keyWord" value="{{$request['keyWord'] or ''}}" class="form-control">
                                        <span class="input-group-btn">
                                          <button class="btn btn-info btn-flat">搜索</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                            </form>
                            <form id="goodsForm" method="post">
                            {{csrf_field()}}
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>ID</th>
                                    <th>商品名称</th>
                                    <th>商品图片</th>
                                    <th>分类</th>
                                    <th>品牌</th>
                                    <th>商品编码</th>
                                    <th>单价</th>
                                    <th>数量</th>
                                    <th>状态</th>
                                    <th>创建时间</th>
                                    <th>更新时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $v)
                                <tr data-id="{{$v -> id}}">
                                    <td><input type="checkbox" name="goods[]" value="{{$v -> id}}" /></td>
                                    <td>{{$v -> id}}</td>
                                    <td name="name">{{$v -> name}}</td>
                                    <td><img src="{{url(config('app.goodsUrl')).'/'.$v -> img.'80x80.'.pathinfo($v->img)['extension']}}" width="50" height="50"/></td>
                                    <td>{{$v -> cname}}</td>
                                    <td name="bid" data-cid="{{ $v->cid }}" data-bid="{{ $v -> bid }}">{{$v -> bname}}</td>
                                    <td>{{$v -> code}}</td>
                                    <td name="price">{{$v -> price}}</td>
                                    <td name="nums">{{$v -> nums}}</td>
                                    <td>{{$v -> status === 1 ? '已下架' : ($v->status === 2 ? '已上架' : '已删除')}}</td>
                                    <td>{{date('Y-m-d',$v -> create_at)}}</td>
                                    <td>{{date('Y-m-d',$v -> update_at)}}</td>
                                    <td>
                                    <a class="btn btn-primary btn-xs" href="{{ url('/merchant/goods'.'/'.$v->id) }}">详情</a>

                                    <a class="btn btn-danger btn-xs" data="{{$v -> id}}" action="delete">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                                <tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="13">
                                            <div class="row">
                                                <div class="col-md-6" id="btn-group">
                                                    <a class="btn btn-primary btn-sm" href="javascript:void(0);" action="all">全选</a>
                                                    <a class="btn btn-primary btn-sm" href="javascript:void(0);" action="none">全不选</a>
                                                    <a class="btn btn-primary btn-sm"  href="javascript:void(0);" action="reverse">反选</a>
                                                    <button type="button" action="{{url('/merchant/goods/line/2')}}" class="btn btn-success btn-sm">批量上架</button>
                                                    <button type="button" action="{{url('/merchant/goods/line/1')}}" class="btn btn-danger btn-sm">批量下架</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            </form>
                            {{$data ->appends($request) -> render()}}
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection
@section('extendJS')
<!--script type="text/javascript" src="{{ url('/mia/js/jquery-1.8.3.min.js') }}"></script-->
<script>
    //csrf
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    //提示
    var myAlert = $('#alert');
    setTimeout(function(){
        $("#info").slideUp(500);
    }, 3000);
    
    //全选、全不选、反选
    $('#btn-group > a').click(function(){
        // alert($(this).attr('action'));
        switch ($(this).attr('action')){
            case 'all':
                $('#example1 input:checkbox').attr('checked', true);
                break;
            case 'none':
                $('#example1 input:checkbox').attr('checked', false);
                break;
            case 'reverse':
                var list = $('#example1 input:checked');
                $('#example1 input:not(:checked)').attr('checked',true);
                list.attr('checked',false);
                break;
        }
    });
    
    //提交
    $('#btn-group > button').click(function(){
        if($('#example1 input:checked').length <= 0){
            return false;
        }
        $('#goodsForm').attr('action',$(this).attr('action'));
        $('#goodsForm').submit();
    });
    
    //防止重复
    var isClick = false;
    //单击编辑
    $("td[name]").click(function(){
        if(isClick){
            return false;
        }
        isClick = true;
        var me = $(this);
        var id = me.parent().attr('data-id');
        var field = me.attr('name');
        var oldValue = me.html();
        
        switch (field)
        {
            case 'bid':
                //品牌
                var cid = me.attr('data-cid');
                var oldBid = me.attr('data-bid');
                
                //请求数据
                $.ajax({
                    url:'{{url("/merchant/goods/brand")}}/'+cid,
                    type:'post',
                    dataType:'json',
                    success:function(data){
                        console.log(data);                        
                        //变为下拉框
                        var select = $('<select name="cate"></select>');
                        
                        var html = '';
                        $.each(data, function(i, n){
                            html += '<option value="'+(n.id)+'">'+(n.name)+'</option>';
                        });
                        //添加到select
                        select.html(html);
                        //替换字段
                        me.html(select);
                        select.focus();
                        
                        //change事件
                        select.blur(function(){
                            // alert($(this).val());
                            var newBid = $(this).val();
                            var newValue = $(this).find('option[value="'+newBid+'"]').html();
                            if(newBid == oldBid){
                                isClick = false;
                                me.html(oldValue);
                                return false;
                            }
                            
                            //ajax请求
                            $.ajax({
                                url:'{{ url("/merchant/goods/updatefield") }}/'+id,
                                type:'post',
                                dataType:'json',
                                data:{field:field, value:newBid},
                                success:function(data){
                                    isClick = false;
                                    if(data.code === 0){
                                        me.html(newValue);
                                    }else{
                                        me.html(oldValue);
                                    }
                                }
                            });
                            
                        });
                        
                    }
                });
                
                break;
            default:
                //其它字段
                
                //变为输入框
                var input = $('<input type="text" value="'+oldValue+'"/>');
                me.html(input);
                input.focus();
                
                //失去焦点
                input.blur(function(){
                    //获取新值
                    var newValue = $(this).val();
                    
                    if(newValue == oldValue){
                        me.html(oldValue);
                        isClick = false;
                        return false;
                    }
                    
                    //ajax请求
                    $.ajax({
                        url:'{{ url("/merchant/goods/updatefield") }}/'+id,
                        type:'post',
                        dataType:'json',
                        data:{field:field, value:newValue},
                        success:function(data){
                            isClick = false;
                            if(data.code === 0){
                                me.html(newValue);
                            }else{
                                me.html(oldValue);
                            }
                        }
                    });
                });
                break;
        }
    }).css({'cursor':'pointer'});
    
    //删除
    $('a[action="delete"]').on('click',function(){
        var id = $(this).attr('data');
        var me = $(this).parent().parent();

        $.ajax({
            url:'{{asset("/merchant/goods")}}/'+id,
            type:'delete',
            dataType: 'json',
            success:function(data){
                console.log(typeof(data.code));
                switch(data.code){
                    case 0:
                        me.remove();
                        myAlert.removeClass('callout-danger');
                        myAlert.addClass('callout-success');
                        myAlert.find('p[name="content"]').html('删除成功');
                    break;
                    case 1:
                        myAlert.removeClass('callout-success');
                        myAlert.addClass('callout-danger');
                        myAlert.find('p[name="content"]').html('删除失败');
                    break;
                }
                myAlert.removeClass('hide');
                myAlert.stop(true,true).slideDown();
                setTimeout(function(){
                    myAlert.stop(true,true).slideUp(500);
                },1000);
            },
            error:function(){

            }
        });
    });
</script>
@endsection