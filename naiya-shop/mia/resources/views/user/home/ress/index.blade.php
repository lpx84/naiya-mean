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
	<div class="right l">
		
				{{csrf_field()}}
                <div class="title yahei f20 pink">地址管理</div>
                    <div class="pt20" id="homeAddress">
					
					@if(session('info'))
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-ban"></i> 提示</h4>
									{{ session('info') }}
								</div>
						@endif
						@if(count($errors) > 0)
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-ban"></i> 警告</h4>
									<ol>
										@foreach($errors -> all() as $error)
											<li  style="list-style:decimal;">{{ $error }}</li>
										@endforeach
									</ol>
							</div>
						@endif
					
					
					
					<form method="get" action="{{asset('/user/prefile/ress/create')}}">
						@if($num -> count == 10)
                        <button class="btn_07 vam" disabled="disabled" >新增</button>
						@else
							<button class="btn_07 vam" >新增</button>
						@endif
					</form>
                            &nbsp;&nbsp;&nbsp;&nbsp;已有地址<span class="pink alreadyAddress">{{ $num -> count }}</span>
                            个,还可添加<span class="pink remainAddress"> {{ 10 - $num -> count }}</span>个地址
                    </div>
				
                    <p class="errorNotice" style="display:none"></p>
                    
                    <div id="my_address_list" class="splist p20 address">
                   <!-- default address -->
                    <div class="icspblock" id="address_7988834">
                        @if($num -> count == 0)
							<table class="msctab tab09" width="100%" cellspacing="0" cellpadding="0" border="0">
						</table>
						@else
						@foreach($res as $data)
						<table class="msctab tab09" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody><tr class="first_tr">
                                <th colspan="2" class="ddtit addir" align="left">
							@if($data -> is_default != 1)
                             <a href="{{ url('/user/prefile/tolerant') }}/{{$data -> id}}" class="pink r setdefault isdefault">设为默认</a>
							@endif
                            <!--<a href="javascript:;" id="7988834" class="pink r delete">删除</a>-->
							<a class="pink r delete" style="cursor:pointer" data="{{$data -> id}}" action="delete">删除</a>
							<a href="{{ url('/user/prefile/ress')}}/{{$data -> id}}/edit" class="pink r modify">编辑</a>
                                    <strong>地址<span class="d">
									@if($data -> is_default == 1)
									(默认地址)
									@endif
									</span>   
									{{ $data -> name }}</strong>
                                </th>
                            </tr>
                            <tr>
                            <td class="gray3" width="11%" align="right">收货人：</td>
                            <td width="89%">{{ $data -> name }}</td>
                            </tr>
                            <tr>
                            <td class="gray3" align="right">详细地址：</td>
                            <td>
							<script>
							
								var province = ChineseDistricts['86']['{{ $data -> province }}'];
								var city = ChineseDistricts['{{ $data -> province }}']['{{ $data -> city }}'];
								var area = ChineseDistricts['{{ $data -> city }}']['{{ $data -> area }}'];
								
								document.write(province);
								document.write(city);
								document.write(area);
							</script>
							{{ $data -> detail }}
							</td>
                            </tr>
                            <tr>
                            <td class="gray3" align="right">手机：</td>
                            <td>{{ $data -> phone }} </td>
                            </tr>
                        </tbody>
						</table>
						<p style="height:10px;"></p>
						@endforeach
						
						@endif
						
                        </div>  
                                                            
                    
                    <!-- other address -->
                                                                                                    </div>
																								
                </div>
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
        var me = $(this).parent().parent().parent().parent();

        $.ajax({
            url:'{{asset("/user/prefile/ress")}}/'+id,
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