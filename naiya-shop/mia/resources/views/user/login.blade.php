@section('title',$title)
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
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
        <div class="loginWrap w965 rel">
            <a href="https://itunes.apple.com/cn/app/mi-ya-bao-bei-zhong-guo-zui/id973366293?mt=8" title="iPhone系列手机及ipad适用" target="_blank" style="display:block;left:385px;top:306px;width:136px;height:36px;position:absolute"></a>
            <a href="http://download.miabaobei.com/Miababy_localhost_V3.3.0.apk" target="_blank" title="三星小米索尼华为等android手机适用" style="display:block;left:385px;top:357px;width:136px;height:36px;position:absolute"></a>
            <div class="logo">
                <a href="/" class="logolink">奶牙</a></div>
            <div class="loginBord">
                <div class="loginTit">
                    <span class="l yahei pink">登录奶牙</span>
                    <span class="r">
                        <i class="pink">还没有奶牙账号？</i>
                        <a href="{{ url('/user/register') }}">30秒注册</a></span>
                </div>
                <form method="post" id="login_form" action="{{ url('/user/dologin') }}">
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

					{{csrf_field()}}
                    
                    <div class="inputGroup ok ">
                        <div class="inputWrap">
                            <div class="user-icon"></div>
                            <input type="text" placeholder="邮箱" id="email" name="email" class="input" validate="required" tabIndex=1 value="{{ old('email') }}"></div>
                        <p class="loginNotice"></p>
                    </div>
                    <div class="inputGroup">
                        <div class="inputWrap">
                            <div class="pass-icon"></div>
                            <input type="password" placeholder="密码" id="password" name="password" class="input" validate="required" tabIndex=2></div>
                        <p class="loginNotice loginErrorNotice mm"></p>
                    </div>
					<div id="verityGroup" style="height: 43px;" class="inputGroup ok">
                        <div class="verityWrap clearfix" style="width:300px;">
                            <div class="inputWrap l" style="height:48px; line-height:48px;">
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
                                <img src="{{url('mia/images/tipmessagebg.png')}}"></span>
                        </p>
                        <p class="vcNotice"></p>
                    </div>
                    <div class="formLine clearfix">
                        <div class="check_radio l">
                            <label for="agree_userterm">
                                <input type="checkbox" checked="" id="agree_userterm" name="remme">记住我</label></div>
                        <!--<a class="r" href="/account/findpwd" target="_blank">忘记密码?</a>-->
						
					</div>
                    
                    <!-- <div class="inputGroup" style="height: 43px;">
                    <div class="phonecodeWrap clearfix">
                    <div class="inputWrap l">
                    <input type="text" placeholder="短信验证码" id="phonecode" name="phonecode" class="input"></div>
                    <a class="phonecode" id="sendVerifyCodeLogin" href="javascript:void(0)">获取短信验证码</a>
                    <p class="loginNotice loginErrorNotice mb" style='top:-1px;'></p></div>
                    <p class="registerNotice1  tipphonecode" style="display:none">
                    <span  class="tipcon">短信验证码</span>
                    <span class="rownotice" ><img   src="http://file02.miabaobei.com/resources/images/tipmessagebg.png"></span></p>
                    </div> -->
                    <p class="loginButton">
                        <button class="loginbtn">登 录</button></p>
                </form>
            </div>
        </div>
        <!--<script type="text/javascript" src="./js/bootstrap.js"></script>
        <script type="text/javascript" src="./js/validate.js"></script>
        <script type="text/javascript" src="./js/login.js"></script>-->
        <!--<script type="text/javascript">var login = {
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

            });</script>-->
        <div class="simpleVersionFooter  gray2">Copyright &copy;2016 北京花旺在线商贸有限公司 miabaobei.com 保留一切权利。客服热线： 400-789-2000。京ICP证140430号 京ICP备14006215号</div>
        <div style="display:none"></div>
    </body>

</html>