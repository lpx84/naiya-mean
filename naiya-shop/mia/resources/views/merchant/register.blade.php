<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title.'-'.config('app.webName')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{csrf_token()}}">
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
    <link href="{{asset('/html5upload/css/default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/html5upload/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css" />

    <style>
        .login-box, .register-box {
            width: 50%;
            margin: 2% auto;
        }
    </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="javascript:void(0)"><b>Merchant</b>Register</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">{{$title}}</p>
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
        <form id="registerForm" action="{{ url('/merchant/doregister') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" value="{{old('username')}}" placeholder="用户名">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="repassword" class="form-control" placeholder="再输一次密码">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            
            <hr class="box box-info" />
            <h4 style="text-align:center;">商户信息</h4>
            <div class="form-group has-feedback">
                <label for="name">商户名称</label>
                <input type="text" name="name" class="form-control"  value="{{old('name')}}" placeholder="商户名称">
                <span class="glyphicon glyphicon-home form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label class="control-label">商户LOGO</label>
                <input id="logo" name="logo" type="file" accept="image/*" class="file-loading">
                <div id="errorBlock" class="help-block"></div>
            </div>
            <div class="form-group has-feedback">
                <label for="desc">商户描述</label>
                <textarea name="desc" class="form-control" value="{{old('desc')}}" placeholder="商户描述"></textarea>
            </div>
            
            <hr class="box box-info" />
            <h4 style="text-align:center;">商户负责人信息</h4>
            <div class="form-group has-feedback">
                <label for="desc">真实姓名</label>
                <input type="text" name="realname" value="{{old('realname')}}" class="form-control" placeholder="真实姓名">
            </div>
            <div class="form-group">
                <label for="desc">性别</label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="sex" value="0" {{old('sex') == 0 ? 'checked="checked"' : ''}} class="form-control"> &nbsp;女
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="sex" value="1" {{old('sex') == 1 ? 'checked="checked"' : ''}}class="form-control"> &nbsp;男
            </div>
            <div class="form-group has-feedback">
                <label for="phone">手机号码</label>
                <input type="text" id="phone" name="phone" value="{{old('phone')}}" class="form-control" placeholder="phone">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="phone">邮箱</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="cid_no">身份证号码</label>
                <input type="text" id="cid_no" name="cid_no" value="{{old('cid_no')}}" class="form-control" placeholder="身份证号码">
                <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label class="control-label">手持证件照片</label>
                <input id="cid_img" name="cid_img" type="file" accept="image/*" class="file-loading">
                <div id="errorBlock" class="help-block"></div>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="agree" value="1" checked="checked"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div><!-- /.col -->
            </div>
        </form>

        <a href="{{url('/merchant/login')}}" class="text-center">已有帐号？登录</a>
    </div><!-- /.form-box -->
</div><!-- /.register-box -->

<!-- jQuery 2.1.4 -->
<script src="{{asset('/admin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<script src="{{asset('/html5upload/js/fileinput.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/html5upload/js/fileinput_locale_zh.js')}}" type="text/javascript"></script>
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
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).on('ready', function() {
        var config = {
            uploadUrl: '#', // you must set a valid URL here else you will get an error
            allowedFileExtensions : ['jpg', 'png','gif'],
            maxFileSize: 10240,
            maxFilePreviewSize: 10240,
            allowedFileTypes: ['image'],
            allowedPreviewTypes:['image'],
            previewSettings:{
                image: {width: "auto", height: "auto"}
            },
            layoutTemplates:{
                main1: '{preview}\n' +
                    '<div class="kv-upload-progress hide"></div>\n' +
                    '<div class="input-group {class}">\n' +
                    '   {caption}\n' +
                    '   <div class="input-group-btn">\n' +
                    '       {remove}\n' +
                    '       {cancel}\n' +
                    '       {upload}\n' +
                    '       {browse}\n' +
                    '   </div>\n' +
                    '</div>',
                main2: '{preview}\n<div class="kv-upload-progress hide"></div>\n{remove}\n{cancel}\n{upload}\n{browse}\n',
                preview: '<div class="file-preview {class}">\n' +
                    '    {close}\n' +
                    '    <div class="close fileinput-remove">×</div>\n' +
                    '    <div class="{dropClass}">\n' +
                    '    <div class="file-preview-thumbnails">\n' +
                    '    </div>\n' +
                    '    <div class="clearfix"></div>' +
                    '    <div class="file-preview-status text-center text-success"></div>\n' +
                    '    <div class="kv-fileinput-error"></div>\n' +
                    '    </div>\n' +
                    '</div>',
                icon: '<span class="glyphicon glyphicon-file kv-caption-icon"></span>',
                caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' +
                    '   <div class="file-caption-name"></div>\n' +
                    '</div>',
                btnDefault: '<button type="{type}" tabindex="500" title="{title}" class="{css}"{status}>{icon}{label}</button>',
                btnLink: '<a href="{href}" tabindex="500" title="{title}" class="{css}"{status}>{icon}{label}</a>',
                btnBrowse: '<div tabindex="500" class="{css}"{status}>{icon}{label}</div>',
                modalMain: '<div id="kvFileinputModal" class="file-zoom-dialog modal fade" tabindex="-1" aria-labelledby="kvFileinputModalLabel"></div>',
                modal: '<div class="modal-dialog modal-lg" role="document">\n' +
                    '  <div class="modal-content">\n' +
                    '    <div class="modal-header">\n' +
                    '      <div class="kv-zoom-actions pull-right">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
                    '      <h3 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h3>\n' +
                    '    </div>\n' +
                    '    <div class="modal-body">\n' +
                    '      <div class="floating-buttons"></div>\n' +
                    '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
                    '    </div>\n' +
                    '  </div>\n' +
                    '</div>\n',
                progress: '<div class="progress">\n' +
                    '    <div class="progress-bar progress-bar-success progress-bar-striped text-center" role="progressbar" aria-valuenow="{percent}" aria-valuemin="0" aria-valuemax="100" style="width:{percent}%;">\n' +
                    '        {percent}%\n' +
                    '     </div>\n' +
                    '</div>',
                footer: '<div class="file-thumbnail-footer">\n' +
                    '    <div class="file-caption-name" style="width:{width}">{caption}</div>\n' +
                    '    {progress} {actions}\n' +
                    '</div>',
                actions: '<div class="file-actions">\n' +
                    '    <div class="file-footer-buttons">\n' +
                    '        {delete} {zoom} {other}' +
                    '    </div>\n' +
                    '    {drag}\n' +
                    '    <div class="file-upload-indicator" title="{indicatorTitle}">{indicator}</div>\n' +
                    '    <div class="clearfix"></div>\n' +
                    '</div>',
                actionDelete: '<button type="button" class="kv-file-remove {removeClass}" title="{removeTitle}"{dataUrl}{dataKey}>{removeIcon}</button>\n',
                actionZoom: '<button type="button" class="kv-file-zoom {zoomClass}" title="{zoomTitle}">{zoomIcon}</button>',
                actionDrag: '<span class="file-drag-handle {dragClass}" title="{dragTitle}">{dragIcon}</span>'
             
            },
            maxFileCount: 1,
            showUpload:false
        };
        
        
        $("#logo").fileinput(config);
        
        $("#cid_img").fileinput(config);
        
    });
</script>
</body>
</html>
