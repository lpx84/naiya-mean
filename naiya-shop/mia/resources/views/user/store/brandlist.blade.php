@extends('homelayout')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection('meta')
@section('style')
<link rel="stylesheet" href="{{url('mia/style/brand.css')}}" type="text/css">
@endsection('style')
@section('script')
	
	<script type="text/javascript" src="{{url('mia/js/brand.js')}}"></script>
	<script type="text/javascript" src="{{url('mia/js/brandSide.js')}}"></script>
@endsection('script')
@section('content')
<div class="w1000 brand-banner">
	<img src="{{url('mia/images/brand01.jpg')}}" alt="">
</div>
<div class="clearfix w1000">
	<div class="brand_nav">
		<div class="brand_nav_title">
			<a class="brand_active" href="#">按分类排序</a>
			<!--<a href="http://local.naiya.cc/brand/letter">按字母排序</a>-->
		</div>
		<div class="clearfix nav_content">
						<ul class="nav_big_label">
							@foreach($name as $key)
								<li><a href="javascript:void(0);">{{ $key -> name }}</a></li>
							@endforeach
							</ul>
			
						<!--<div class="nav_collapse"></div>-->
		 </div>
	</div>
	<div class="brand_content">
		<?php 
			$num = 1;
		?>
		@foreach($newArr as $key)
		<h1 class="brand_floor"><span><?php echo $num++ ?>F</span><em>{{ $key['pname'] }}</em></h1>
		<div class="clearfix brand_list" data-id="" name="cate">
			<ul class="floor_ul brand_index">
				@foreach($key['sub'] as $value)
				<li class="">
					<div class="goods_img">
						<a href="http://local.naiya.cc/brand-4414.html" target="_blank">
							<img src="{{ url(config('app.brandUrl').$value -> img) }}" alt="" style="height:158px;width:233px;">
							<div class="brand_guan">
								<span class="l">
								{{ $value -> name }}
								</span>
								<span class="r brand_like">
									<i class="brand_none"></i>
									<em>7</em>人喜欢
								</span>
							</div>
						</a>
					</div>
					<div class="brand_attend">
						<div class="attend_bg"></div>
						<div class="attend_center">
							<a class="attend_link" href="http://local.naiya.cc/brand-4414.html" target="_blank"></a>
							<p>
								<a href="http://local.naiya.cc/brand-4414.html" target="_blank">
									{{ $value -> name }}
								</a>
							</p>
							@if(in_array($value -> id,$array))
								<a href="{{ url('/brand/list/off')  }}/{{ $value -> id }}" class="do_attend  no_attend" style="position:relative;z-index:6;">取消收藏<input value="4414" type="hidden"></a>
							@else
							<a href="{{ url('/brand/list/store')  }}/{{ $value -> id }}" class="do_attend " style="position:relative;z-index:6;">收藏该品牌<input value="4414" type="hidden"></a>
							@endif
						</div>
					</div>
				</li>
				@endforeach
				
				<div class="more_none_f more_none">				
				
				<!--<li>
					<div class="goods_img">
						<a href="http://local.naiya.cc/brand-45.html" target="_blank">
							<img src="{{url('mia/images/45_middle.gif')}}" alt="">
							<div class="brand_guan">
								<span class="l">
								Mellin 美林																</span>
								<span class="r brand_like">
									<i class="brand_none"></i>
									<em>7649</em>人喜欢
								</span>
							</div>
						</a>
					</div>
					<div class="brand_attend">
						<div class="attend_bg"></div>
						<div class="attend_center">
							<a class="attend_link" href="http://local.naiya.cc/brand-45.html" target="_blank"></a>
							<p>
								<a href="http://local.naiya.cc/brand-45.html" target="_blank">
								Mellin美林是意大利家喻户晓的婴幼儿食品生产商，拥有自己的天然优质农庄和牧场。严苛选用优质的自然原料投入生产，为宝宝提供营养丰								...								</a>
							</p>
							<a class="do_attend " style="position:relative;z-index:6;">收藏该品牌<input value="45" type="hidden"></a>
						</div>
					</div>
											<div class="temai_label">特卖中</div>						
				</li>-->
												</div>			</ul>
			<div class="display_more">
				<div class="dis_more_btn"><a href="javascript:void(0);"><span></span><em>更多品牌</em></a></div>
			</div>
		</div>
		@endforeach

	</div>
	<!--<input id="categoryOutlet" value="宝宝食品-68,宝宝奶粉-47,屁屁护理-72,宝宝营养-25,母乳喂养-43,喂养用品-126,宝宝洗护-63,童装童鞋-110,玩具乐器-133,出行装备-147,清洁消毒-61,家居生活-124,进口食品-50,孕产待产-94,宝宝用品-102,面部护肤-161,营养健康-41,身体护理-165,亲子服务-1,亲子旅游-0,游乐-1,早教游泳-0,演出展览-1,孕产医疗-1,摄影-1,图书绘本-9,熟女轻奢-24,宝宝寝居-79" type="hidden">-->

<script type="text/javascript">// <![CDATA[
var google_tag_params = {
        item_ids : [ 7,10,3,],
        bfd_sid : getcookie('sid'),
        p_type : 'd',
};
</script>




<script type="text/javascript" src="{{url('/mia/js/footer.js')}}"></script>
<div class="sideBar leftSide " style="display: block;">
    <img src="{{url('mia/images/c28f17d15a13149cfa89f18dc32efb87.png')}}">
</div>

<script type="text/javascript" src="{{url('/miajs/gdt.php')}}" charset="UTF-8"></script>



<script type="text/javascript">
    (function(w,d,s,l,a){
        w[l]=w[l]||function(){w._CommandName_=l;w[l].q=w[l].q||[];var r = arguments;r.length&&w[l].q.push(r)&&w[l]._r&&w[l].$.e(r);
            w[l].track = function(a){if(a){var m = w[l].q[w[l].q.length-1];(m['t']=a)&&w[l]._r&&w[l].$.t(m)}};return w[l]},w[l](),w[l].a=a,w[l].l=1*new Date();
        var f = 'https:' == d.location.protocol;var c = d.createElement(s);c.type='text/javascript';c.async=1;
        c.src=(f ? 'https' : 'http') + '://'+(f?'fm.ipinyou.com':'fm.p0y.cn')+'/j/t/a.js';
        var h = d.getElementsByTagName("script")[0];h.parentNode.insertBefore(c, h);
    })(window,document,'script','py','8U..1RrmfUooC7Xc23cZd7LxxP');
</script>


    <script type="text/javascript">
        py('event','viewPage');
    </script>




<!--<div class="gtDiv" style="left: 1141.5px; bottom: 10%; position: fixed;">
<div class="indextmNvMini currentObj" style="display: block;">
	<a href="#" class="current" >宝宝食品<span>68</span></a>
	<a href="#">宝宝奶粉<span>47</span></a>
	<a href="#">屁屁护理<span>72</span></a>
	<a href="#">宝宝营养<span>25</span></a>
	<a href="#">母乳喂养<span>43</span></a>
	<a href="#">喂养用品<span>126</span></a>
	<a href="#">宝宝洗护<span>63</span></a>
	<a href="#">童装童鞋<span>110</span></a>
	<a href="#">玩具乐器<span>133</span></a>
	<a href="#">出行装备<span>147</span></a>
	<a href="#">清洁消毒<span>61</span></a>
	<a href="#">家居生活<span>124</span></a>
	<a href="#">进口食品<span>50</span></a>
	<a href="#">孕产待产<span>94</span></a>
	<a href="#">宝宝用品<span>102</span></a>
	<a href="#">面部护肤<span>161</span></a>
	<a href="#">营养健康<span>41</span></a>
	<a href="#">身体护理<span>165</span></a>
	<a href="#">亲子服务<span>1</span></a>
	<a href="#">亲子旅游</a>
	<a href="#">游乐<span>1</span></a>
	<a href="#">早教游泳</a>
	<a href="#">演出展览<span>1</span></a>
	<a href="#">孕产医疗<span>1</span></a>
	<a href="#">摄影<span>1</span></a>
	<a href="#">图书绘本<span>9</span></a>
	<a href="#">熟女轻奢<span>24</span></a>
	<a href="#">宝宝寝居<span>79</span></a>
</div>
<a class="gotop off" href="javascript:void(0)" rel="nofollow" style="display: block;"><img src="{{url('mia/images/bg08.gif')}}" class="topbottom"></a></div>-->


<iframe style="width: 1px; border: 0px none; position: absolute; left: -100px; top: -100px; height: 1px;" src="../js/b.htm" id="mv_cm"></iframe><img src="{{url('mia/images/pv.gif')}}" style="display: none; width: 0px; height: 0px;">
</div>
<script>
	$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	});
	$('div[name="cate"]').ready(function(){
		var id = $(this).attr('data-id');
		//ajax提交
		$.ajax({
			url:'{{url("/brand/list")}}',
			type:'POST',
			dataType:'json',
			data:{email:$('#email').val()},
			success:function(data){
				console.log(data);
				if(data.code == 0){
					//提示
					$('#myAlert > p').html('验证码已发到邮箱');
					$('#myAlert').removeClass('hide');
					$('#myAlert').show();
				}else{
					//提示
					$('#myAlert > p').html('验证码失败');
					$('#myAlert').removeClass('hide');
					$('#myAlert').show();
				}
				
			}
		});
	});
</script>
@endsection('content')