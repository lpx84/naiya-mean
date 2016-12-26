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
        	<div class="title yahei f20 pink">账户信息</div>
            <div class="splist p20">
<form action="{{asset('/user/prefile/{$res -> id}')}}" method="post">
{{csrf_field()}}
{{method_field('put')}}
    <table class="tab08" width="100%" cellspacing="0" cellpadding="0" border="0">
	@if(session('info'))
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> 提示</h4>
				{{ session('info') }}
			</div>
	@endif

  <tbody>
  <tr>
    <td width="19%" align="right">昵称：</td>
    <td width="56%">{{ $res -> username }}</td>
    <td rowspan="6" width="25%" valign="top"><div class="photo"><img src="{{url(config('app.userUrl').$res -> header)}}" alt="" width="120" height="120"> <a href="{{ url('/user/prefile/photo') }}">修改头像</a></div></td>
  </tr>
  <tr>
    <td align="right">修改昵称：</td>
    <td>
		
		<input type="hidden" name="id" value="{{ $res -> id }}"> 
		<input class="inp w188" name="username" type="text"><span class="err_nickname" style="color: red;margin: 0 0 0 10px;"></span></td>
    </tr>
  <!--<tr>
    <td align="right">手机号码：</td>
    <td>
              13784000717&nbsp;&nbsp;<span class="gray2">已验证</span>          </td>
    </tr>
  <tr>-->
    <td align="right">邮箱：</td>
    <td width="56%">{{ $res -> email }}</td>
    </tr>
    <!--<tr>
      <td align="right">实名认证：</td>
      <td>
                <a href="http://local.naiya.cc/home/account/identification">去认证</a>
              </td>
    </tr>-->

    <tr><td align="right">&nbsp;</td>
    <td>
	<!--<a href="javascript:void(0)" class="btn_07" id="upateUserInfo">提 交</a>-->
		<button class="btn_07">提 交</button>
	</td>
    <td valign="top">&nbsp;</td>
  </tr>
            </tbody>
			</table>
</form>
          </div>
        </div>
@endsection('content')