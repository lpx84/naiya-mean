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
                <div class="title yahei f20 pink">修改密码</div>
                <div class="splist" id="changePasswordDiv">
                <p class="errorNotice"></p>
                    <form method="post" action="{{asset('/user/prefile/password')}}/{{$res -> id}}">
						{{csrf_field()}}
						{{method_field('put')}}
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
						<input type="hidden" value="{{$res -> id}}" name="id">
                    <table class="mt25" width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
					<tr class="inputGroup">
                        <td width="24%" align="right"><span class="pink">*</span>当前密码：</td>
                        <td width="76%">
                            <input id="formerPassword" name="password" class="inp w188" value="" validate="required" type="password">
                            <p></p>
                        </td>
                    </tr>                    
                    <tr class="inputGroup">
                        <td width="24%" align="right"><span class="pink">*</span>新密码：</td>
                        <td width="76%">
                            <input id="newPassword" name="newPassword" class="inp w188" validate="required|length_between,6,14" type="password">
                            <p></p>
                        </td>
                    </tr>
                    <tr class="inputGroup">
                        <td align="right"><span class="pink">*</span>确认新密码：</td>
                        <td>
                            <input id="confirmNewPassword" name="confirmNewPassword" class="inp w188" validate="required|pass_eq" type="password">
                            <p></p>
                        </td>
                    </tr>
                    <tr class="inputGroup">
                        <td align="right"><span class="pink">*</span>验证码：</td>
                        <td>
                            <div id="verityGroup" style="height: 43px;" class="inputGroup ok">
                        <div class="verityWrap clearfix" style="width:300px;">
                            <div class="inputWrap l">
                               <input type="text" placeholder="输入验证码" id="authcode" name="authcode"  value="{{ old('authcode') }}" class="input" ></div>
                            <img id="c2c98f0de5a04167a9e427d883690ff6" src="{{ URL('user/captcha/1') }}" />
							<script>  
							  function re_captcha() {
								$url = "{{ URL('user/captcha') }}";
									$url = $url + "/" + Math.random();
									document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
							  }
							</script>
                            <a href="javascript:re_captcha();">看不清</a>
                            <p class="loginNotice loginErrorNotice cd"></p>
                        </div>
                        <p class="registerNotice1  authcode tipauthcode" style="display:none;">
                            <span class="tipcon"></span>
                            <span class="rownotice">
                                <img src="./images/tipmessagebg.png"></span>
                        </p>
                        <p class="vcNotice"></p>
                    </div>
                        </td>
                    </tr>
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