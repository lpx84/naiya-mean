@extends('user.homelayout')
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
@endsection
@section('content')
		<div class="right l">
                <div class="title yahei f20 pink">退货物流信息</div>
                <div class="splist" id="changePasswordDiv">
                <p class="errorNotice"></p>
                    <form method="post" action="{{ url('/user/order/doshipments') }}">
						{{csrf_field()}}
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
						<input type="hidden" value="{{ $id }}" name="id">
                    <table class="mt25" width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
					<tr class="inputGroup">
                        <td width="24%" align="right"><span class="pink">*</span>物流公司名：</td>
                        <td width="76%">
                            <input id="formerPassword" name="company" class="inp w188" value="{{ old('company') }}" validate="required" type="text">
                            <p></p>
                        </td>
                    </tr>                    
                    <tr class="inputGroup">
                        <td width="24%" align="right"><span class="pink">*</span>物流单号：</td>
                        <td width="76%">
                            <input id="newPassword" name="logi_no" class="inp w188" value="{{ old('logi_no') }}" validate="required|length_between,6,14" type="text">
                            <p></p>
                        </td>
                    </tr>
                    <!--<tr class="inputGroup">
                        <td align="right"><span class="pink">*</span>物流信息：</td>
                        <td>
                            <input id="confirmNewPassword" name="content" class="inp w188" validate="required|pass_eq" value="{{ old('content') }}" type="text">
                            <p></p>
                        </td>
                    </tr>-->
                    
                    <tr>
                    <td align="right">&nbsp;</td>
                    <td><button class="btn_07">提 交</button></td>
                    </tr>
                    </tbody></table>
                    </form>
                </div>
            </div>
    <script type="text/javascript" src="{{url('/mia/js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="{{url('/mia/js/validate.js')}}"></script>
        <script type="text/javascript" src="{{url('/mia/js/login.js')}}"></script>
        <script type="text/javascript">var login = {
                'qq': '/oauth/member/qq',
                'weibo': '/oauth/member/weibo',
                'weixin': '/oauth/member/weixin'
            };

            $(document).ready(function() {
                $('.third_login a').bind('click',
                function(e) {
                    e.preventDefault();
                    window.location.href = login[$(this).attr('data-tag')];
                });

            });</script>
   
   
   
   
   
   
   
   
@endsection('content')