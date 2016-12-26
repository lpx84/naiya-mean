@extends('user.homelayout')
@section('meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('style')
		<link rel="stylesheet" href="{{url('/mia/style/AdminLTE.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('/mia/style/bootstrap.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('/mia/style/main.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('/mia/style/add.css')}}" type="text/css">
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

	<!-- 收藏成功之前 -->
	@if($num -> count == 0)
	<div class<div class="right l">
		<div class="title yahei f20 pink">我收藏的品牌</div>
			<div class="hint">我收藏这些品牌，无论是设计、功能、材质。这是我的品牌趣味，也是我的意见和主张。</div>
			<div class="splist p20 brand grzx clearfix">
				<div class="f24 yahei pb15 tac">看看有没有您收藏的品牌</div>
			<p class="pb15 tac">点我，数百个一线孕婴童进口品牌，收藏哪个告诉奶牙吧！</p>
			<a href="{{ url('/brand/list')}}" class="btn_06 w138">马上去看看&gt;&gt;</a>
			</div>
    </div>
	@else
	<!-- 收藏之后 -->
	<div class="right l">
	@if(session('info'))
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> 提示</h4>
				{{ session('info') }}
			</div>
	@endif
	
        <div class="title yahei f20 pink">我收藏的品牌</div>
			<div class="hint">我收藏这些品牌，无论是设计、功能、材质。这是我的品牌趣味，也是我的意见和主张。
			</div>
          	<div class="splist p20 brand grzx clearfix">
            	<div>
                	<div class="ztit f22 yahei pink">收藏品牌的列表</div>
                		<div>
						@foreach($res as $value)
                  			<div class="l block_wrap_f">
                  				<div class="block current">
                      				<div id="unLike" class="ver f14 pos pink dn" param="2592" style="display: block;">
											<a action="delete" data="{{ $value -> id }}" alt="取消收藏" >×</a>
									</div>
                    				<div class="pic">
                    					
                    					<img src="{{ url(config('app.brandUrl').$value -> images) }}" alt="" style="height:158px;width:233px;">
                    					
                    				</div>
									<div class="tit">
										<span class="ver">爱思贝 EARTH'S BEST</span>
									</div>
																												<div class="temai_name temai_none">
																													<p>
																														<a href="http://local.naiya.cc/list-74945.html" target="_blank">爱思贝特卖</a></p>																													</div>
																											</div>
                  			</div>
						@endforeach
                 		</div>
					</div>
            </div>
			
			<div class="splist p20 brand grzx clearfix">
				
			<p class="pb15 tac">点我，数百个一线孕婴童进口品牌，收藏哪个告诉奶牙吧！</p>
			<a href="{{ url('/brand/list')}}" class="btn_06 w138">马上去看看&gt;&gt;</a>
			</div>
																						</div>
	@endif
@endsection('content')
@section('extendJS')
<script>
    // alert($);
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
        var me = $(this).parent().parent().parent();

        $.ajax({
            url:'{{asset("/user/mybrand")}}/'+id,
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