<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>邮箱激活</title>
        <style>
            #ext-feng-div{
                margin:5% auto;
                width:500px;
            }
        </style>
    </head>
    <body>
        <div id="ext-feng-div">
            <p><strong>{{$data['username']}}</strong>，您好！</p>
            <p>感谢您申请奶牙商户：
            <a href='{{url('/merchant/active/id')}}/{{$data['mid']}}/token/{{$data['token']}}'">点击这里激活帐号</a></p>
            <p><strong>北京交通大学前端小组</strong>，为您服务！</p>
        </div>
    </body>
</html>