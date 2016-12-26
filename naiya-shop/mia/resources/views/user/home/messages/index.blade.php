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
                <div class="title yahei f20 pink">奶牙消息</div>
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
					
					
					
					
                    </div>
				
                    <p class="errorNotice" style="display:none"></p>
                    
                    <div id="my_address_list" class="splist p20 address">
                   <!-- default address -->
                    <div class="icspblock" id="address_7988834">
					@foreach($res as $data)
						<table class="msctab tab09" width="100%" cellspacing="0" cellpadding="0" border="1">
						
							<tbody><tr class="first_tr">
                                <th colspan="2" class="ddtit addir" align="left">
								<span class="pink r delete" data="" action="delete">时间：{{ date('Y-d-m',$data -> create_at) }}</span>
                                    <strong>标题:　<span class="d"></span>{{ $data -> title }}</strong>
                                </th>
                            </tr>
                            <tr>
								<td><p style="text-indent:2em">{!! htmlspecialchars_decode($data -> content) !!}</p></td>
                            </tr>
                           
                        </tbody>

						</table>
						<p style="height:10px;"></p>
						@endforeach
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