@extends('user.homelayout')
@section('meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('style')
		<link rel="stylesheet" href="{{url('/mia/style/AdminLTE.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('/mia/style/bootstrap.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('/mia/style/main.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('/mia/style/add.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('/mia/style/koubei.css')}}" type="text/css">
		<link rel="stylesheet" type="text/css" href="{{url('/mia/style/zzsc.css')}}">
		<link rel="stylesheet" type="text/css" href="{{url('/mia/style/starability-all.min.css')}}">
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
		<script src="{{url('/distpicker/js/distpicker.data.js')}}"></script>
@endsection
@section('content')
<div class="right l">
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
        	<div class="title yahei f20 pink">发表口碑</div>
            <div id="c_k" class="splist p10">
            <form name="myform" id="myform" action="{{ url('/user/comment') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<input type="hidden" name="gid" value="{{ $array['goodsid'] }}">
                  <table width="100%" cellspacing="0" cellpadding="5" border="0">
                <tbody><tr>
                  <td width="16%" align="right" height="30">点评商品 <span class="pink">*</span></td>
                  <td width="84%">{{ $array['goodsname'] }}</td>
                </tr>
                <tr>
                  <td align="right" height="30">评分 <span class="pink">*</span></td>
                  <td>
				  <section style="height:42px;">
					<fieldset class="starability-basic">
						  <input id="rate5-1" name="level" value="5" type="radio">
						  <label for="rate5-1" title="Amazing">5 stars</label>

						  <input id="rate4-1" name="level" value="4" type="radio">
						  <label for="rate4-1" title="Very good">4 stars</label>

						  <input id="rate3-1" name="level" value="3" type="radio">
						  <label for="rate3-1" title="Average">3 stars</label>

						  <input id="rate2-1" name="level" value="2" type="radio">
						  <label for="rate2-1" title="Not good">2 stars</label>

						  <input id="rate1-1" name="level" value="1" type="radio">
						  <label for="rate1-1" title="Terrible">1 star</label>
					</fieldset>
				</section>
				<div class="description">当前您的评价为：堪称完美，不仅自己用的好，我还要推荐给别人</div>
                  </td>
                </tr>
                <tr>
                  <td align="right" height="30">标题 <span class="pink">*</span></td>
                  <td><input id="title" name="title" class="inp w308" value="{{ $array['goodsname'] }}" type="text"></td>
                </tr>
                <tr>
                  <td valign="top" align="right" height="30">内容 <span class="pink">*</span></td>
                  <td><textarea id="content" name="content" class="inp w308" style="resize:none;"></textarea></td>
                </tr>
                <tr style="margin-top:10px;">
                  <td align="right" height="30">上传图片 </td>
                  <td>
                    <input type="file" value="上传图片" name="img" />
                    </td>
                </tr>
                <tr style="display:none;" id="up_p">
                  <td height="30">&nbsp;</td>
                  <td class="upphoto" id="image_index"></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;</td>
                  <td><span class="gray2">请上传图片，图片不超过4M，支持的图片格式为jpg，png，gif； <br>
               </span></td>
                </tr>
                <tr>
                  <td height="80">&nbsp;</td>
                  <td><input name="commit" class="commitButton" value="发布" id="commit" type="submit"></td>
                </tr>
              </tbody></table>
            </form>
          </div>
        </div>
	
@endsection('content')
