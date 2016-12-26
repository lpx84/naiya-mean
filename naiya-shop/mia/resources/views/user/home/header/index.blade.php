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
          <div class="title yahei f20 pink">上传头像</div>
          <div class="splist p20 upphotoo">
            <div class="choosephoto" style="width:210px;height:22px;line-height:22px;">
			<div id="id_upload_img_index" style="float:right;width:70px;height:22px;">
			<object id="SWFUpload_0" type="application/x-shockwave-flash" data="../js/swfupload.swf" class="swfupload" width="80" height="22"><param name="wmode" value="window"><param name="movie" value="http://uploads.miabaobei.com/flash/swfupload.swf"><param name="quality" value="high"><param name="menu" value="false"><param name="allowScriptAccess" value="always"><param name="flashvars" value=""></object>
			<div id="id_upload_img_index_fc">
			
			
			
			<!--<input type="submit" class="btn_07 btnup" value="上传图片" style="float-left"/>-->
			
			</div></div>从您的电脑上选择图片：
            </div>
            <p class="pb20 gray3">仅支持JPG、GIF、PNG格式，文件小于4M。（使用高质量图片，可生成高清头像）</p>
           @if(session('info'))
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> 提示</h4>
						{{ session('info') }}
					</div>
			@endif
			<form method="post" action="{{asset('/user/prefile/photo')}}/{{$res -> id}}" enctype="multipart/form-data">
				{{csrf_field()}}
				{{method_field('put')}}
				<input type="hidden" value="{{$res -> header}}" name="oldImg">
				<img src="{{url(config('app.userUrl').$res -> header)}}" style="height:200px; width:200px; border:1px solid #ccc; padding:2px;">
				<p style="height:8px;"></p>
				<input type="file" name="img">
				<p style="height:8px;"></p>
				<button>保存</button>
            </form>
          
        </div>
@endsection('content')