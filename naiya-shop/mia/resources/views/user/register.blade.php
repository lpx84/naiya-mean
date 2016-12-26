@section('title',$title)
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.miaName') }} - @yield('title')</title>
        <meta name="Keywords" content="进口母婴,限时特卖,日本进口,正品行货,花王,纸尿裤,拉拉裤,moony,大王,保宁,贝亲,britax湿巾,奶牙,MIA,miababy">
        <meta name="Description" content="100%正品保障！奶牙为您精选全世界高品质、好口碑的母婴产品，以远低于市场价的折扣，在72 小时内限量出售。每天上午10点准时开抢！">
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
    </head>
    
    <body class="bknone">
        <!--六一特辑 注册引导 5.13~6.5 -->
        <div class="loginWrap w965 rel h582" style="background: url({{url('/mia/images/8d1c9afa99764981b5aba45aad77d990518959073.png')}}) no-repeat -20px 150px rgba(0, 0, 0, 0)">
            <a href="https://itunes.apple.com/cn/app/mi-ya-bao-bei-zhong-guo-zui/id973366293?mt=8" title="iPhone系列手机及ipad适用" target="_blank" style="display:block;left:385px;top:306px;width:136px;height:36px;position:absolute"></a>
            <a href="http://download.miabaobei.com/Miababy_localhost_V3.3.0.apk" target="_blank" title="三星小米索尼华为等android手机适用" style="display:block;left:385px;top:357px;width:136px;height:36px;position:absolute"></a>
            <div class="logo">
                <a href="/" class="logolink">奶牙</a></div>
            <div class="loginBord">
                <div class="loginTit">
                    <span class="l yahei pink">注册奶牙</span>
                    <span class="r">
                        <i class="pink">已有奶牙账号？</i>
                        <a href="{{url('/user/login')}}">登录</a></span>
                </div>
                <form method="post" id="register_form" action="{{ url('/user/doregister') }}">
				<!--<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Alert!</h4>
						Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.
				</div>-->
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
				@if(session('info'))
                    <div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> 提示</h4>
                            {{ session('info') }}
					</div>
                @endif
				<div id="myAlert" class="alert alert-danger alert-dismissable hide">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> 提示</h4>
					<p></p>
				</div>

					{{csrf_field()}}
                    <input type="hidden" id="url" name="url" value="?url=http%3A%2F%2Fmia.c%2F">
                    <div class="inputGroup ok">
                        <div class="inputWrap">
                            <div class="user-icon"></div>
                            <input type="email" placeholder="邮箱地址" id="email" name="email" value="{{ old('email') }}" class="input" validate="required|email">
                            <!--<span class="tooltip-inner" id="inputEmail_msg" style="display:;"></span>-->
                        </div>
                    </div>
                    <div id="verityGroup" class="inputGroup ok" style="height:56px">
                        <div class="verityWrap clearfix" style="width:300px;">
                            <div class="inputWrap l" style="margin-right:3px; height:48px; line-height:48px;">
                                <input type="text" placeholder="输入验证码" id="authcode" name="authcode"  value="{{ old('authcode') }}" class="input" ></div>
                            <img id="c2c98f0de5a04167a9e427d883690ff6" src="{{ URL('user/captcha/1') }}" />
							<script>  
							  function re_captcha() {
								$url = "{{ URL('user/captcha') }}";
									$url = $url + "/" + Math.random();
									document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
							  }
							</script>
                            <a href="javascript:re_captcha();">看不清</a></div>
                        <p class="registerNotice1  authcode tipauthcode" style="display:none;">
                            <span class="tipcon"></span>
                            <span class="rownotice">
                                <img src="{{url('/mia/images/tipmessagebg.png')}}"></span>
                        </p>
                        <p class="vcNotice"></p>
                    </div>
                    <div class="inputGroup">
                        <div class="phonecodeWrap clearfix">
                            <div class="inputWrap l">
                                <input type="text" placeholder="邮箱验证码" id="emailcode" name="emailcode" value="{{ old('emailcode') }}" class="input"></div>
                            <a class="phonecode" id="sendVerifyEmailCode" href="javascript:void(0)">获取邮箱验证码</a>
							
							</div>
                        <p class="registerNotice1  tipphonecode" style="display:none">
                            <span class="tipcon">邮箱验证码</span>
                            <span class="rownotice">
                                <img src="{{url('/mia/images/tipmessagebg.png')}}"></span>
                        </p>
                    </div>
                    <div class="inputGroup">
                        <div class="inputWrap">
                            <div class="pass-icon"></div>
                            <input type="password" placeholder="密码" id="login_password" name="password" class="input" validate="required"></div>
                        <p class="registerNotice1 password" style="display: none">
                            <span class="tipcon">密码提示内容</span>
                            <span class="rownotice">
                                <img src="{{url('/mia/images/tipnamebg.png')}}"></span>
                        </p>
                    </div>
                    <div class="inputGroup">
                        <div class="inputWrap">
                            <div class="pass-icon"></div>
                            <input type="password" placeholder="确认密码" id="confirm_password" name="confirm_password" class="input" validate="required"></div>
                        <p class="registerNotice1 registerErrorNotice" style="display: none">
                            <span class="tipcon">确认提示内容</span>
                            <span class="rownotice">
                                <img src="{{url('/mia/images/tipnamebg.png')}}"></span>
                        </p>
                    </div>
                    <div class="inputGroup" style="height:30px;">
                        <div class="ceckboxmy">
                            <input type="checkbox" id="isagree" checked name="isagree" />
                            <label for="isagree">我已阅读并接受</label>
                            <a href="/help/?aid=35" target="_blank" class="pink" title="奶牙服务条款">《奶牙服务条款》</a>
                            <p class="registerNotice1 agree" style="display:none;">
                                <span class="tipcon">您未阅读并接受奶牙服务条款</span>
                                <span class="rownotice">
                                    <img src="{{url('/mia/images/tipnamebg.png')}}"></span>
                            </p>
                        </div>
                    </div>
                    <p class="registerButton">
                        <!--<a id="register_submit" class="loginbtn shake-constant" style="width:85%">注册</a></p>-->
						<button class="loginbtn shake-constant" style="width:81%">注册</button></p>
                </form>
            </div>
        </div>
        <link rel="stylesheet" href="{{url('/mia/style/jquery-ui.css')}}" type="text/css">
        <script type="text/javascript" src="{{url('/mia/js/jquery-ui.js')}}"></script>
        <script type="text/javascript" src="{{url('/mia/js/validate.js')}}"></script>
        <script type="text/javascript" src="{{url('/mia/js/validate.en.js')}}"></script>
        <script type="text/javascript" src="{{url('/mia/js/account/register.js')}}"></script>
        <div class="simpleVersionFooter  gray2">Copyright &copy;2016 北京花旺在线商贸有限公司 miabaobei.com 保留一切权利。客服热线： 400-789-2000。京ICP证140430号 京ICP备14006215号</div>
        <script type="text/javascript" src="{{url('/mia/js/footer.js')}}"></script>
        <div style="display:none"></div>
		<script>
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
		});
		
		$('#sendVerifyEmailCode').click(function(){
			//验证邮箱
			//....
			
			//ajax提交
			$.ajax({
				url:'{{url("/user/sendemail")}}',
				type:'POST',
				dataType:'json',
				data:{email:$('#email').val()},
				success:function(data){
					console.log(data);
					if(data.code == 0){
						//提示
						$('#myAlert > p').html('验证码已发到邮箱');
						$('#myAlert').removeClass('hide');
						$('#myAlert').show();
					}else{
						//提示
						$('#myAlert > p').html('验证码失败');
						$('#myAlert').removeClass('hide');
						$('#myAlert').show();
					}
					
				}
			});
		});
		
		</script>
    </body>
</html>