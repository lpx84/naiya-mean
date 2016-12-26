@extends('merchant.layout')
@section('meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            发布商品
            <small>第一步：选择分类</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">选择分类</a></li>
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
                        <h3 class="box-title">选择分类</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{asset('/merchant/goods/createsteptwo')}}" method="get">
                        {{csrf_field()}}
                        <div class="box-body col-md-6">
                            @if(session('msg'))
                            <div id="info" class="callout callout-info">
                                <p>{{session('msg')}}</p>
                            </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- select -->
                            <div class="form-group">
                                <label>一级分类</label>
                                <select name="oneId" class="form-control">
                                    <option>请选择分类</option>
                                    @foreach($data as $v)
                                    <option value="{{$v -> id}}">{{$v -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>二级分类</label>
                                <select name="twoId" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>三级分类</label>
                                <select name="threeId" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">选择</button>
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
@section('extendJS')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    setTimeout(function(){
        $("#info").slideUp(500);
    }, 3000);

    $('select').change(function(){
        var id = $(this).attr('name');
        var pid = $(this).val();
        // console.log(id);
        // console.log(pid);
        switch (id)
        {
            case 'oneId':
                $('select[name="twoId"]').html('');
                $('select[name="threeId"]').html('');
                changeSelect('twoId', pid);
                break;
            case 'twoId':
                $('select[name="threeId"]').html('');
                changeSelect('threeId', pid);
                break;
            default:
                break;
        }
    });
    
    function changeSelect(name, pid){
        var me = $('select[name="'+name+'"]');
        
        $.ajax({
            url:"{{url('/merchant/goods/getdata')}}",
            type:'post',
            data:{pid:pid},
            dataType:'json',
            success:function(data){
                // console.log(data);
                if(data.length > 0)
                {
                    var html = '<option>请选择分类</option>';
                    $.each(data, function(i, n){
                        html += '<option value="'+(n.id)+'">'+(n.name)+'</option>';
                    });
                    me.html(html);
                }
            }
        });
    }
</script>
@endsection