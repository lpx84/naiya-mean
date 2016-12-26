<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商户{{$title.'-'.config('app.webName')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('/admin/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/admin/bootstrap/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/admin/bootstrap/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/admin/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/iCheck/square/blue.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/merchant/login') }}"><b>Merchant</b>login</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">商户登录</p>
        @if (session('msg'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ session('msg') }}</li>
                </ul>
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
        <form action="{{url('/merchant/dologin')}}" method="post">
            {{csrf_field()}}
            <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" value="{{{
                Cookie::has('merchant_username')? '*****' : old('username') 
                }}}" placeholder="Username">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" value="{{{
                    Cookie::has('merchant_password') ? '**********' : old('password') 
                }}}" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group">
                <div class="row">
                <div class="col-md-5">
                <input type="text" name="code" class="form-control" placeholder="验证码">
                </div>
                <div class="col-md-5 col-md-offset-2">
                <a onclick="javascript:re_captcha();" >
                <img src="{{ URL('merchant/captcha/1') }}"  alt="验证码" title="刷新图片" id="c2c98f0de5a04167a9e427d883690ff6" border="0">
                </a>
                </div>
                </div>
                <script>  
                  function re_captcha() {
                    $url = "{{ URL('merchant/captcha') }}";
                        $url = $url + "/" + Math.random();
                        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
                  }
                </script>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remme" value="1" {{ Cookie::has('merchant_username') ? 'checked=checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    <a href="{{url('/merchant/forgetpassword')}}" class="text-center">忘记密码？</a>
                </div><!-- /.col -->
            </div>
        </form>

        <!--a href="#">I forgot my password</a><br-->
        <a href="{{url('/merchant/register')}}" class="text-center">没有帐号？申请商户</a>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="{{asset('/admin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('/admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('/admin/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
