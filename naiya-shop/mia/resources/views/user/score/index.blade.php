@extends('user.homelayout')
@section('meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
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
		<script src="{{url('/distpicker/js/distpicker.data.js')}}"></script>
@endsection
@section('content')

<div class="right l">
	<div class="title yahei f20 pink">积分管理</div>
	<div class="hint">哇！土豪！有这么多积分了呢！快去把它们兑换成代金券吧。</div>
	<div class="splist p20 clearfix rel exchange">
		<!--<a href="#" class="btn_07 pos exbtn">积分兑换</a>-->
		<div class="pb15">总积分：
		  <span class="pink">{{ $score }}</span>&nbsp;&nbsp;
		  <a href="{{ url('help/5') }}" class=" gray ">使用说明</a>
		</div>
		<div class="pb10">
			积分获取记录:
		</div>
		<table class="tab07" width="100%" cellspacing="0" cellpadding="0" border="0">
		  <tbody>
			<tr>
			  <th width="32%">日期</th>
			  <th width="35%">分值</th>
			  <th width="33%">说明</th>
			</tr>
			@foreach($res as $key)
			<tr>
				<td>{{ date('Y-m-d H:i:s',$key -> create_at) }}</td>
				<td>{{ intval($key -> value) }}</td>
				<td>成功购买商品</td>
			</tr>
			@endforeach
		  </tbody>
		</table>
  </div>
</div>
@endsection