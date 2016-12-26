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
          <div class="title yahei f20 pink">
            发好了呢，再过一会儿就能看到了哈。          </div>
            <div class="icspblock">
                <table class="msctab sdtab sdtab1" width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tbody><tr>
                    <td class="mysp ptb0"><table class="tab04" width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                          <td class="borenone"><div class="mysp clearfix" style="width:780px;"><a href="{{ url('goods') }}/{{ $val -> id }}">
								<img src="{{ url(config('app.goodsUrl').$val -> img) }}" alt="" width="50" height="50">
						  </a>
						  <a href="{{ url('goods') }}/{{ $val -> id }}">{{ $val -> name }}</a>
						  <br>
                            <span class="gray size">
                            </span>
                            <p class="gray" style="padding-top:5px;">
							{{ date('Y-m-d H:i:s', $data -> create_at) }}
							</p>
                          </div></td>
                        </tr>
                      </tbody></table>                      <span class="r"></span></td>
                  </tr>
                </tbody></table>
              </div>
            <div class="splist p20 mysd rel">
                          <div class="ztit f14 pink blod pb15">{{ $data -> title }}　星级：{{ $data -> level }}星
						  <div class="value" style="padding-left:80px;"></div>
              </div>
                <div class="groupimg clearfix pb15">
					<img src="/uploads/{{ $res -> img }}" style="height:200px;width:200px;"/>
                </div>
                <p class="f14 lh22">{{ $data -> content }}</p>

          </div>
        </div>
	
@endsection('content')
