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
<!-- 没有口碑 -->
@if(!count($data))
<div class="right l">
    <div class="title yahei f20 pink">
		我的口碑列表
	</div>
	<div class="hint">
		买回去的好东东，喜欢吗？快来发表点评，即可获得50奶豆。
	</div>
	<div class="splist p20">
		暂无商品口碑
					 
	</div>
</div>
@else
<div class="right l">
          <div class="title yahei f20 pink">我的口碑列表</div>
            <div class="hint">买回去的好东东，喜欢吗？快来发表点评，即可获得50奶豆。</div>
            <div class="splist p20">
			@foreach($data as $val)
				
             <div class="icspblock">
                <table class="msctab sdtab" width="100%" cellspacing="0" cellpadding="0" border="0" style="text-algin:center">
                  <tbody><tr>
                  <th width="55%" style="text-align:center;">商品信息</th>
                  <th width="15%" style="text-align:center;">购买时间</th>
                  <th width="15%" style="text-align:center;">口碑</th>
                </tr>
                                    <tr>
                    <td class="mysp ptb0" width="55%"><table class="tab04" width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                          <td class="borenone"><div class="mysp clearfix"><a href="{{ url('goods') }}/{{ $val -> goodsid }}">
						  <img src="{{ url(config('app.goodsUrl').$val -> images) }}" alt="" width="50" height="50">
						  </a><a href="{{ url('goods') }}/{{ $val -> goodsid }}">{{ $val -> goodsname }}</a></div></td>
                        </tr>
                      </tbody></table></td>
                    <td width="15%" align="center">
                                            <span>{{ date('Y-m-d',$val -> create_at) }}<br> {{ date('H:i:s',$val -> create_at) }}</span>
                                          </td>
                    <td class="btngroup" width="15%" align="center">
							@if(empty($val -> commentid))
								<a href="{{ url('/user/comment/publish') }}/{{ $val -> goodsid }}" class="pink">评价商品</a>
							@else
								<a href="{{ url('/user/comment') }}/{{ $val -> commentid }}" class="pink">{{ $arr[$val -> comstatus] }}</a>
							@endif
                    </td>
                  </tr>
                                    
                </tbody></table>
              </div>
			  
			  @endforeach
                                          <!--
                <div class="page tr"> <a href="javascript:void(0)">1</a> <a href="javascript:void(0)" class="curr">2</a> <a href="javascript:void(0)">3</a> <a href="javascript:void(0)">4</a> </div>
              -->
          </div>
        </div>
@endif
@endsection('content')
