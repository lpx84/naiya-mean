@extends('homelayout')
@section('title',$title)
@section('content')

            <!--/.breadCrumbs-->
            <div class="content detail myhelp">
                <div class="w1004">
                    <div class="helptitle clearfix">
                        <h3 class="yahei f20 pink l">帮助中心</h3>
                        <span>Hi~，我是小奶奶，欢迎您来到帮助中心。</span></div>
                    <div class="ic clearfix">
                        <div class="left l">
							@foreach($cate as $key => $k)
                            <div class="title">{{$k -> name}}</div>
                            <ul>
                                <li class="clearfix">
									@foreach($data as $d => $t)
									@if($k -> id == $t -> pid)
                                    <div class="clix">
                                        <span class="fold unfold"></span>
                                        <a href="javascript:void(0)" class="blod">
										
											{{$t -> name}}
									
										</a></div>
									
                                    <ul style="display:block;">
                                        @foreach($help as $h => $p)
											@if($p -> hcid == $t -> id)
										<li>
                                            <a href="{{url('/help')}}/{{$p -> id }}">{{$p -> title}}</a>
										</li>
											@endif
										@endforeach
                                    </ul>
									@endif
									@endforeach
                                </li>
                            </ul>
							
							@endforeach
                        </div>
                        <div class="right l">
                            <div class="title pt20 pb20">

							{{$content -> dname}}&gt;&gt;
							{{$content -> cname}}&gt;&gt;
							{{$content -> title}}
							
							</div>
                            <div class="hint">
                                <div class="myohelp">
							
								{!!$content -> content!!}
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
								
							
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.title-->
                    <!--/.show--></div>
            </div>
@endsection
           
	
 