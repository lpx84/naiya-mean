@extends('user.homelayout')
@section('meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('style')
		<link rel="stylesheet" href="{{url('/mia/style/AdminLTE.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('/mia/style/bootstrap.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('/mia/style/main.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('/mia/style/add.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('/mia/style/account.css')}}" type="text/css">
        <script type="text/javascript" src="{{url('/mia/js/jQuery-2.1.4.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/mia/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{url('/mia/js/jquery-1.8.2.min.js')}}"></script>
		<style>
		* {
			-webkit-box-sizing: content-box;
			-moz-box-sizing: content-box;
			box-sizing: content-box;
		}
		</style>
		<script src="{{url('/distpicker/js/distpicker.data.js')}}"></script>
@endsection
@section('content')
	@if($num -> count == 0)
	<!-- 收藏成功之前 -->
	<div class="right l">
       	<div class="title yahei f20 pink">我收藏的商品</div>
        <div class="splist p20">
			<div class="f24 yahei pb15 tac">您还没有收藏的商品</div>
			<a href="/" class="btn_06 w138">马上去看看&gt;&gt;</a>
		</div>
	</div>
	@else
	<!-- 收藏成功之后 -->
	<div class="right l">
	@if(session('info'))
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> 提示</h4>
				{{ session('info') }}
			</div>
	@endif
	<div id="alert" class="alert alert-danger alert-dismissable hide">
		<p name="content"></p>
	</div>
  <div class="title yahei f20 pink">我收藏的商品</div>
  <div class="splist p20">
    <table class="collect_tab" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th class="collect_name">商品信息</th>
          <th class="collect_price">价格</th>
          <th class="collect_opera">操作</th></tr>
      </thead>
      <tbody>
	  @foreach($res as $val)
        <tr>
          <td class="coll_name">
            <div class="l coll_img">
              <a href="{{ url('goods') }}/{{ $val -> goodsid }}" target="_blank">
                <img src="{{ url(config('app.goodsUrl').$val -> images) }}" alt="" width="50"></a>
            </div>
            <div class="l coll_right">
              <p>
                <a href="{{ url('goods') }}/{{ $val -> goodsid }}" target="_blank">{{ $val -> goodsname }}</a></p>
              
            </div>
          </td>
          <td>¥{{ $val -> price }}</td>
          <td>
            <a class="coll_join" href="{{ url('/user/mygoods/insert') }}/{{ $val -> id }}">加入购物车</a>
            <!--<input value="SIZE" class="size_f" type="hidden">-->
            <a class="coll_del delete" style="cursor:pointer" data="{{$val -> id }}" action="delete">删除</a>
			
            <!--<input value="1218145" class="coll_id" type="hidden">
            <input value="11755390" class="collectId" type="hidden">--></td>
        </tr>
		@endforeach
        
      </tbody>
    </table>
  </div>
</div>
@endif
@endsection('content')
@section('extendJS')
<script>
    //alert($);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var myAlert = $('#alert');
    setTimeout(function(){
        $("#info").slideUp(500);
    }, 3000);

    $('a[action="delete"]').on('click',function(){
        var id = $(this).attr('data');
        var me = $(this).parent().parent();

        $.ajax({
            url:'{{asset("/user/mygoods")}}/'+id,
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