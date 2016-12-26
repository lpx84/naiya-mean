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
<!-- 没有退货的时候 -->
	<!--<div class="right l">
          <div class="title yahei f20 pink">
            <a href="#" class="btn-th" target="_blank">申请退货</a>
            <ul class="tab-tit clearfix">
              <li class="cur">退 货</li>
              
            </ul>
          </div>
          
          <div class="splist p20">
            <style>
                table.msctab th{ border: 1px solid #e4e4e4; border-bottom: none; background: #f7f7f7;}
                .icspblock table.tab04 td{ border-right: 1px solid #e4e4e4; border-bottom: none;}
            </style>
            <div class="icspblock">
                              <div class="tac">您没有可以申请退货的订单！</div>
              </div>
            </div>
        </div>-->
<!-- 有退货时 --> 
		<div class="right l">
  <div class="title yahei f20 pink">
    <a href="{{ url('/help/19') }}" target="_blank" class="btn-zc">退款政策</a>
    <ul class="tab-tit clearfix">
      <li class="cur">退 货</li>
  </div>
  <style>table.msctab th{ border: 1px solid #e4e4e4; border-bottom: none; background: #f7f7f7;} table.msctab td{ padding: 0;} .icspblock table.tab04{ border-collapse: collapse; border: none;margin: -1px;} .icspblock table.tab04 td{border: 1px solid #e4e4e4;}</style>
  <div class="splist p20">
    <div class="icspblock">
      <table class="msctab" style="border-bottom:none;" width="100%" cellspacing="0" cellpadding="0" border="0">
		@if(session('info'))
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> 提示</h4>
					{{ session('info') }}
			</div>
		@endif
        <tbody>
          <tr style="text-algin:center;">
            <th width="120">订单号</th>
            <th width="99">订单商品</th>
            <th width="160">申请时间</th>
            <th width="100">实付金额</th>
            <th width="100">商品状态</th>
            <th>操作</th></tr>
        </tbody>
      </table>
	  @foreach($data as $val)
      <table class="msctab" width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
          <tr>
            <td style="padding: 15px 10px;" width="100" align="center">
              <div style="width:120px;word-break:break-all;">{{ $val -> order_no }}</div></td>
            <td colspan="5" class="mysp ptb0">
              <table class="tab04" width="646" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                  <tr>
                    <td width="119" align="center">
                      <a href="{{ url('goods') }}/{{ $val -> goodsid }}" target="_blank" title="{{ $val -> goodsname }}">
                        <img src="{{ url(config('app.goodsUrl').$val -> images) }}" style="margin:0;float:none;" alt="" width="50" height="50"></a>
                    </td>
                    <td width="180" align="center">{{ date('Y-m-d H:i:s',$val -> create_at) }}</td>
                    <td width="120" align="center">￥{{ $val -> total }}</td>
                    <td width="120" align="center">
                      <span class="">{{ $arr[$val -> destatus] }}</span></td>
                    <td style="border-right:none;" align="center">
					@if($val -> destatus == 6)
						<a href="{{ url('/user/return/add') }}/{{ $val -> id }}" target="_blank" class="pink">退货</a>
					@else
						@if(in_array( $val -> oid ,$backarr))
						<a href="{{ url('/user/return/reshow') }}/{{ $val -> id }}/{{$val -> goodsid}}" target="_blank" class="pink">查看</a>
						@endif
					@endif
                      <br></td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
	  @endforeach
		<!--<div class="page tr">
        <a href="http://local.naiya.cc/home/returns/lists?t=tk&amp;page=1">上一页</a>
        <a href="http://local.naiya.cc/home/returns/lists?t=tk&amp;page=1" class="curr">1</a>
        <a href="http://local.naiya.cc/home/returns/lists.html?t=tk&amp;page=1">下一页</a>
		</div>-->
    </div>
  </div>
</div>
@endsection('content')