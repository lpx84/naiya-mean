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
		<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="{{url('/distpicker/js/distpicker.data.js')}}"></script>
	  <script src="{{url('/distpicker/js/distpicker.js')}}"></script>
	  <script src="{{url('/distpicker/js/main.js')}}"></script>
@endsection
@section('content')
	<div class="right l">
                <div class="title yahei f20 pink">地址管理</div>
                    <div class="pt20" id="homeAddress">
				<form method="get" action="{{asset('/user/prefile/ress/create')}}">
						@if($num -> count == 10)
                        <button class="btn_07 vam" disabled="disabled" >新增</button>
						@else
							<button class="btn_07 vam" >新增</button>
						@endif
						</form>
                            &nbsp;&nbsp;&nbsp;&nbsp;已有地址<span class="pink alreadyAddress">{{ $num -> count }}</span>
                            个,还可添加<span class="pink remainAddress">{{ 10 - $num -> count }}</span>个地址
                    </div>
                    <p class="errorNotice" style="display:none"></p>
                    <div class="splist p20" id="new_edit" style="margin-top: 0px;">
					
					@if(session('info'))
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-ban"></i> 提示</h4>
									{{ session('info') }}
								</div>
						@endif
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
					
					
                        <div class="icspblock">
						<form method="post" action="{{asset('/user/prefile/ress')}}/{{ $res -> id }}">
							{{csrf_field()}}
							{{ method_field('put') }}
                          <table class="msctab tab09" style="border:0px;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tbody><tr>
                                <td class="gray3" width="11%" align="right">收货人：</td>
                                <td width="89%">
                                    <!--<input id="new_address_id" value="7988834" type="hidden">
                                    <input id="new_address_type" value="edit" type="hidden">-->
                                    <input id="name" class="inp w120" onblur="check_shipping('name')" name="name" value="{{ $res -> name }}" type="text">
                                    <span id="new_name_error"></span>
                                </td>
                                </tr>
                                <tr>
                                <td class="gray3" align="right">所在地区：</td>
                                <td id="address_area">
								<div data-toggle="distpicker">
									<div class="row">
										<div class="form-group col-md-3">
										  <label class="sr-only" for="province1">Province</label>
										  <select class="form-control" id="provcince1" name="province" style="height:23px;" data-value="{{ $res -> province }}"></select>
										</div>
										<div class="form-group  col-md-3">
										  <label class="sr-only" for="city1">City</label>
										  <select class="form-control" id="city1" name="city" style="height:23px;"></select>
										</div>
										<div class="form-group  col-md-3">
										  <label class="sr-only" for="district1">District</label>
										  <select name="area" class="form-control" id="district1" style="height:23px;"></select>
										</div>
									</div>
								</div>
								</td>
                                </tr>
								<tr>
                                <td class="gray3" width="11%" align="right">详细地址：</td>
                                <td width="89%"> 
                                    <input id="detail" class="inp w120" name="detail" onblur="check_shipping('name')" value="{{ $res -> detail }}" type="text" style="width:50%">
                                    <span id="new_name_error"></span>
                                </td>
                                </tr>
                                <tr>
                                <td class="gray3" align="right">手机号码：</td>
                                <td>
                                    <input id="ship_mobile" name="phone" class="inp w188" onblur="check_shipping('mobile')" value="{{ $res -> phone }}" type="text">
                                    
                                    <span id="new_mobile_error"></span><span id="new_phone_error"></span>
                                </td>
                                </tr>
                                <tr>
                                <td class="gray3" align="right">&nbsp;</td>
                                <td>
                                    <input type="submit" id="saveAddressHome" class="home_button" value="修改">
                                    <input type="reset" id="cancelAddressHome" class="home_button" value="重置">
                                </td>
                                </tr>
                            </tbody></table>
							<form>
                        </div>
						<form>
                    </div>
                </div>
@endsection('content')