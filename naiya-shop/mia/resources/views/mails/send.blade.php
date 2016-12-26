<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>找回密码</title>
        <style>
            #ext-feng-div{
                margin:5% auto;
                width:500px;
            }
        </style>
    </head>
    <body>
        <div id="ext-feng-div">
            <p><strong>{{$data->username}}</strong>，您好！</p>
            <p>以下是找回密码的链接：
            <a href="{{url('/merchant/resetpassword/id/'.$data -> id.'/token/'.$data -> token)}}">点击这里找回密码</a>
            </p>
        </div>
    </body>
</html>