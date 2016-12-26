@extends('homelayout')
@section('title',$title)

@section('content')

		<style>.mysgwrap{width: 998px;margin:0 auto;background: #fff;border-left: 1px solid #EFEFEF;border-right: 1px solid #EFEFEF; border-top: 1px solid #fff;} .mysgroll{width: 850px;height: 550px;position: relative;margin: 20px auto;} .mysgroll a.sl_left,.mysgroll a.sl_right{display: block;height: 103px;width: 103px;background-repeat: no-repeat;position: absolute;} .mysgroll a.sl_left{background: url({{url('mia/images/sl_left.png')}});left:5px;top:160px;} .mysgroll a.sl_right{background: url({{url('mia/images/sl_right.png')}});right:5px;top:160px;} .mysgroll a.sl_left:hover{background: url({{url('mia/images/sl_left1.png')}});} .mysgroll a.sl_right:hover{background: url({{url('mia/images/sl_right1.png')}})} .mysgcon{width: 300px;height: 410px;margin: 0 auto;overflow: hidden} .mysgitem{width: 300px;height: 410px} .mysgitem img{width: 300px;height: 410px} .mysgdeswrap{position: relative;overflow: hidden;margin-top: 20px;height: 62px} .mysgdes{width: 100%;overflow: hidden;position: absolute;top:0;left:0;table-layout:fixed;} .mysgdes tr{} .mysgdes td {width: 130px;height: 62px;background-color: #ddd;vertical-align:middle; padding: 0 15px; text-align: center;font-size: 16px;border-left:5px solid #fff;border-right:5px solid #fff;} .mysgdes td.sel{background-color: #ff7167;color: #fff!important} .mysgTitle{margin-bottom: 20px} .mysgTitle h1{text-align: center;font-size: 32px;color: #333} .mysgTitle p{font-size: 14px;color: #999;text-align: center;} /*修改*/ .genuineSecurity .moFixed li span { background: url({{url('mia/images/d1e19cac05bfb0f1d82333a3f8f51e71.png')}}); } .scrollitem h1{font-size: 42px!important;} .genuineImg ul{} .genuineImg li {position: relative;vertical-align:bottom} .genuineImg li.curr .img00A { display:none;} .genuineImg li.curr .img00B { display:block;} .genuineImg li .zzc{width: 228px;height: 311px;background-color:#000;filter:alpha(opacity=30); /*IE滤镜，透明度50%*/-moz-opacity:0.3; /*Firefox私有，透明度50%*/ opacity:0.3;/*其他，透明度50%*/;text-align: center;position: absolute;top:0;left:0;z-index: 2} .genuineImg li img.zzcimg{position: absolute;top:62px;left:22px;z-index: 3}</style>
        <!--/.mainNav-->
        <div class="warp" style="padding-bottom:0;">
            <div class="content genuineSecurity">
                <div class="qone">
                    <img src="{{url('mia/images/gs01.png')}}" alt=""></div>
                <div class="moduleFixed">
                    <div class="moFixed">
                        <ul>
                            <li>
                                <span class="qnav1"></span>
                            </li>
                            <li>
                                <span class="qnav2"></span>
                            </li>
                            <li>
                                <span class="qnav3"></span>
                            </li>
                            <li>
                                <span class="qnav4"></span>
                            </li>
                            <li>
                                <span class="qnav6"></span>
                            </li>
                            <li>
                                <span class="qnav5"></span>
                            </li>
                            <li>
                                <span class="qnav7"></span>
                            </li>
                            
                            <li>
                                <span class="qnav9"></span>
                            </li>
                            <li>
                                <span class="qnav10"></span>
                            </li>
                            <li>
                                <span class="qnav11"></span>
                            </li>
                            <li>
                                <span class="qnav12"></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="datacon area001" id="area1" name="area1" style="height:2922px;">
                    <div class="dn"></div>
                    <div class="title">
                        <img src="{{url('mia/images/902110d23f39ae7a9fc9354ef536ecab.png')}}" alt=""></div>
                    <div class="w1004">
                        <img class="lazyload" src="{{url('mia/images/a01.jpg')}}"  alt="">
                        <img class="lazyload" src="{{url('mia/images/a02.jpg')}}"  alt="">
                        <img class="lazyload" src="{{url('mia/images/a0405a.jpg')}}"  alt="">
                        <img class="lazyload" src="{{url('mia/images/a0405b.jpg')}}"  alt="">
                        <div class="mysgTitle yahei">
                            <h1>全球知名品牌官方授权</h1>
                            <p>因版面有限 下图展示仅为部分品牌授权书</p>
                        </div>
                        <div class="mysgwrap" id="authscroll">
                            <div class="mysgroll">
                                <a href="javascript:;" class="sl_left"></a>
                                <a href="javascript:;" class="sl_right"></a>
                                <div class="mysgcon" id="mysgimg">
                                    <div class="mysgitem">
                                        <img src="{{url('mia/images/Benecos.png')}}"></div>
                                </div>
                                <div class="mysgdeswrap">
                                    <table class="mysgdes" id="mysgtab">
                                        <tbody>
                                            <tr>
                                                <td class="sel">Benecos</td>
                                                <td>Biodermis</td>
                                                <td>Derma</td>
                                                <td>DEWY TREE</td>
                                                <td>Farmer's Snack</td>
                                                <td>Gifthing</td>
                                                <td>Hero Baby</td>
                                                <td>JELLYCAT</td>
                                                <td>Manhattan Toy</td>
                                                <td>NICHIGAN</td>
                                                <td>NoseFrida</td>
                                                <td>Nursery</td>
                                                <td>Primomo</td>
                                                <td>Stephen Joseph</td>
                                                <td>Triple Beans</td>
                                                <td>Wink</td>
                                                <td>我的心机</td>
                                                <td>犬印本铺</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="datacon area002" id="area2" name="area2" style="height:1677px;">
                    <div class="dn"></div>
                    <div class="title">
                        <img src="{{url('mia/images/tit02.jpg')}}" alt=""></div>
                    <div class="w1004">
                        <img class="lazyload" src="{{url('mia/images/b01.jpg')}}"  alt="">
                        <img class="lazyload" src="{{url('mia/images/141021105028975.jpg')}}"  alt="">
                        <img class="lazyload" src="{{url('mia/images/141021105043286.jpg')}}"  alt="">
                        <img class="lazyload" src="{{url('mia/images/141021105057479.jpg')}}"  alt=""></div>
                </div>
                <div class="datacon area7" id="area3" name="area3" style="height:1410;">
                    <div class="dn">
                        <h3>发力跨境电商 海关监管仓库直发</h3>
                        <p>100%正品 购买更放心</p>
                    </div>
                    <div class="title">
                        <img src="{{url('mia/images/tit03.jpg')}}" alt=""></div>
                    <div class="w1004">
                        <img class="lazyload" src="{{url('mia/images/mianshui01.jpg')}}"  alt="">
                        <img class="lazyload" src="{{url('mia/images/mianshui02.jpg')}}"  alt="">
                        <img class="lazyload" src="{{url('mia/images/mianshui03.jpg')}}"  alt=""></div>
                </div>
                <div class="datacon area1" id="area4" name="area4" style="height:1218px;">
                    <div class="dn">
                        <h3>只甄选真正的进口品牌</h3>
                        <p>历史积淀，原产国畅销，拥有一定口碑</p>
                    </div>
                    <div class="title">
                        <img class="lazyload" src="{{url('mia/images/genuineSecurity_1_2.gif')}}"  alt="" width="652px"></div>
                    <div class="w1004">
                        <img class="lazyload" src="{{url('mia/images/14825061911416.jpg')}}"  alt="" width="1000">
                        <img class="lazyload" src="{{url('mia/images/14825061914646.jpg')}}"  alt="" width="1000">
                        <img class="lazyload" src="{{url('mia/images/14825061918862.jpg')}}"  alt="" width="1000"></div>
                </div>
                <div class="datacon area2" id="area5" name="area5" style="height:980px">
                    <div class="dn">
                        <h3>24小时快速发货</h3>
                        <p>我们在为缩短发货的每一秒而努力</p>
                    </div>
                    <div class="title">
                        <img class="lazyload" src="{{url('mia/images/genuineSecurity_2_2.gif')}}"  alt="" width="652px"></div>
                    <div class="w1004">
                        <img class="lazyload" src="{{url('mia/images/fahuo01.jpg')}}"  alt="" width="1000">
                        <img class="lazyload" src="{{url('mia/images/fahuo02.jpg')}}"  alt="" width="1000"></div>
                </div>
                <div class="datacon area3" id="area6" name="area6" style="height:1990;">
                    <div class="dn">
                        <h3>专业仓储给母婴用品最好的呵护</h3>
                        <p>做纸尿裤出身的奶牙，太了解仓库的重要性了</p>
                    </div>
                    <div class="title">
                        <img class="lazyload" src="{{url('mia/images/tit06.jpg')}}"  alt="" width="674"></div>
                    <div class="w1004">
                        <img class="lazyload" src="{{url('mia/images/cangchu01.jpg')}}"  alt="" width="1000">
                        <img class="lazyload" src="{{url('mia/images/c9479a200b6114376f0a310163832ea1.png')}}"  alt="" width="1000">
                        <img class="lazyload" src="{{url('mia/images/cangchu03.jpg')}}"  alt="" width="1000">
                        <img class="lazyload" src="{{url('mia/images/cangchu04.jpg')}}"  alt="" width="1000"></div>
                </div>
                <div class="datacon area4" id="area7" name="area7" style="height:913px">
                    <div class="dn">
                        <h3>14天便捷退货</h3>
                        <p>我们采用最高服务标准力争为每位妈妈带来全方位优质体验</p>
                    </div>
                    <div class="title">
                        <img class="lazyload" src="{{url('mia/images/genuineSecurity_4_2.gif')}}"  alt="" width="652px"></div>
                    <div class="w1004">
                        <img class="lazyload" src="{{url('mia/images/area04_01.jpg')}}"  alt=""></div>
                </div>

                <div class="datacon area9" id="area8" name="area8" style="height:1336px">
                    <div class="dn">
                        <h3>媒体报道</h3>
                        <p>上线刚满一年的奶牙宝贝不仅是跑在前列的创业公司，更已成为垂直母婴电商的领先者，获得了越来越多媒体的注视和肯定。</p>
                    </div>
                    <div class="title">
                        <img src="{{url('mia/images/tit05.jpg')}}" alt=""></div>
                    <div class="w1004">
                        <div id="scroller" class="scroller">
                            <div class="scrollout">
                                <div class="scrollwidth" style="width: 3320px;">

                                    <div class="scrollitem">
                                        <h1>3天破3亿 奶牙宝贝刷新垂直母婴电商记录</h1>
                                        <a href="#" target="_blank">
                                            <div class="logo">
                                                <img src="{{url('mia/images/s01.png')}}" alt=""></div>
                                            <p>“一片纸尿裤”引发的价格战成了母婴乃至整个电商行业的热议话题，进口母婴电商 奶牙宝贝已悄然成为3月母婴市场的最大赢家。据奶牙宝贝官方透露，为期3天的进口纸尿裤节带动了以纸尿裤、奶粉乃至全品类母婴人群商品的销售高峰，3天 GMV(成交总额)已突破3亿元，刷新了垂直母婴电商的销售记录。</p>
                                        </a>
                                    </div>
                                    <div class="scrollitem">
                                        <h1>欧洲传统零售药房HCP登陆奶牙宝贝</h1>
                                        <a href="#" target="_blank">
                                            <div class="logo">
                                                <img src="{{url('mia/images/s02.png')}}" alt=""></div>
                                            <p>继与欧洲时尚电商Zalando达成合作后，进口母婴电商奶牙宝贝又引进一家欧 洲线下知名连锁药房机构HCP登录限时特卖平台，届时将通过海外直邮以及跨境保税模式，将德国本土最具口碑的母婴用品，营养保健品、药妆个护等产品以最优 惠的价格更方便快捷地传递到奶牙宝贝的中国用户手上。</p>
                                        </a>
                                    </div>
                                    <div class="scrollitem">
                                        <h1>奶牙宝贝荣获“2014年度最具成长性企业”</h1>
                                        <a href="#" target="_blank">
                                            <div class="logo">
                                                <img src="{{url('mia/images/s03.png')}}" alt=""></div>
                                            <p>5月7日，被誉为中国电子商务行业的“奥斯卡”盛典的2015中国电子商务创新 发展峰会暨2014年度电子商务颁奖盛典在贵州贵阳举行。进口母婴电商奶牙宝贝被评选为“2014年度最具成长性企业奖”。奶牙宝贝是中国首家进口母婴品 牌限时特卖商城，2014年3月网站正式上线，便取得了突破千万的月销售，自此一路高速发展，在当年内获得两轮共计近亿美元的融资。</p>
                                        </a>
                                    </div>
                                    <div class="scrollitem">
                                        <h1>刘楠：满足人群的需求，风就一定会来</h1>
                                        <a href="#" target="_blank">
                                            <div class="logo">
                                                <img src="{{url('mia/images/s04.png')}}" alt=""></div>
                                            <p>在Bang Class第四期新电商时代公开课上，奶牙宝贝创始人刘楠分享了自己的创业历程。刘楠表示：平台越大，垂直更有机会，实际就是移动端和社会化这两个关键的 因素在起作用。她还说：“创业者不要做追风少年，要等风来，只要满足人群的需求，然后你站在原地，风一定会来的。”</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn prev" style="display: none;"></a>
                            <a href="#" class="btn next"></a>
                        </div>
                        <div class="genuineImg">
                            <ul>
                                <li>
                                    <img src="{{url('mia/images/img01A.jpg')}}" class="img00A">
                                    <img src="{{url('mia/images/img01B.jpg')}}" class="img00B"></li>
                                <li>
                                    <img src="{{url('mia/images/img02A.jpg')}}" class="img00A">
                                    <img src="{{url('mia/images/img02B.jpg')}}" class="img00B">
                                    <div class="zzc"></div>
                                    <img src="{{url('mia/images/02zz.png')}}" class="zzcimg"></li>
                                <li>
                                    <img src="{{url('mia/images/img03A.jpg')}}" class="img00A">
                                    <img src="{{url('mia/images/img03B.jpg')}}" class="img00B"></li>
                                <li>
                                    <img src="{{url('mia/images/img04A.jpg')}}" class="img00A">
                                    <img src="{{url('mia/images/img04B.jpg')}}" class="img00B">
                                    <div class="zzc"></div>
                                    <img src="{{url('mia/images/04zz.png')}}" class="zzcimg"></li>
                                <li>
                                    <img src="{{url('mia/images/img05A.jpg')}}" class="img00A">
                                    <img src="{{url('mia/images/img05B.jpg')}}" class="img00B"></li>
                                <li>
                                    <img src="{{url('mia/images/img06A.jpg')}}" class="img00A">
                                    <img src="{{url('mia/images/img06B.jpg')}}" class="img00B">
                                    <div class="zzc"></div>
                                    <img src="{{url('mia/images/06zz.png')}}" class="zzcimg"></li>
                                <li>
                                    <img src="{{url('mia/images/img07A.jpg')}}" class="img00A">
                                    <img src="{{url('mia/images/img07B.jpg')}}" class="img00B"></li>
                                <li>
                                    <img src="{{url('mia/images/img08A.jpg')}}" class="img00A">
                                    <img src="{{url('mia/images/img08B.jpg')}}" class="img00B">
                                    <div class="zzc"></div>
                                    <img src="{{url('mia/images/08zz.png')}}" class="zzcimg"></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="datacon area5b" id="area9" name="area9" style="height: 1100px;">
                    <div class="dn">
                        <h3>奶牙荣誉</h3>
                        <p>荣誉见证了奶牙宝贝的点滴成长，是对成绩的肯定，更是激励我们不断进取的动力。</p>
                    </div>
                    <div class="title">
                        <img src="{{url('mia/images/genuineSecurity_5_7.gif')}}" alt=""></div>
                    <div class="w1004">
                        <img class="lazyload" src="{{url('mia/images/zhengs1.jpg')}}" ></div>
                </div>
                <div class="datacon area5" id="area10" name="area10" style="height:1680px">
                    <div class="dn">
                        <h3>百万妈妈口碑相传</h3>
                        <p>我们立志创造一个安全、可靠、放心的网购环境，在这里，让我们和宝宝一起健康成长。</p>
                    </div>
                    <div class="title">
                        <img class="lazyload" src="{{url('mia/images/genuineSecurity_5_2.gif')}}"  alt="" width="652px"></div>
                    <div class="w1004">
                        <img class="lazyload" src="{{url('mia/images/koubei01.jpg')}}"  alt="" width="1000">
                        <img class="lazyload" src="{{url('mia/images/koubei02.jpg')}}"  alt="" width="1000">
                        <img class="lazyload" src="{{url('mia/images/koubei03.jpg')}}"  alt="" width="1000">
                        <img class="lazyload" src="{{url('mia/images/koubei04.jpg')}}"  alt="" width="1000"></div>
                </div>
                <div class="datacon area6" id="area11" name="area11" style="height:1520px">
                    <div class="dn">
                        <h3>贴心服务，让中国妈妈购物零焦虑</h3>
                        <p>奶牙团队近80%都是孩爸孩妈，我们懂你。</p>
                    </div>
                    <div class="title">
                        <img class="lazyload" src="{{url('mia/images/14825071628112.jpg')}}"  alt=""></div>
                    <div class="w1004">
                        <img class="lazyload" src="{{url('mia/images/tiexin01.jpg')}}"  alt="" width="1000">
                        <img class="lazyload" src="{{url('mia/images/tiexin02.jpg')}}"  alt="" width="1000">
                        <img class="lazyload" src="{{url('mia/images/tiexin03.jpg')}}"  alt="" width="1000"></div>
                </div>
            </div>
            <script type="text/javascript" src="{{url('mia/js/main.js')}}"></script>
            <script type="text/javascript" src="{{url('mia/js/guarantee.js')}}"></script>
            <script>$(function() {
                    //正品保证滚动
                    var imgarr = ['Benecos.png', 'biodermis.png', 'Derma.png', 'DEWYTREE.png', 'Farmer\'sSnack.png', 'Gifthing.png', 'herobaby.png', 'JELLYCAT.png', 'ManhattanToy.png', 'NICHIGAN.png', 'NoseFrida.png', 'Nursery.png', 'primomo.png', 'StephenJoseph.png', 'TripleBeans.png', 'Wink.png', 'wodexinji.png', 'quanyinbenpu.png'];
                    var desarr = ['Benecos', 'Biodermis', 'Derma', 'DEWY TREE', 'Farmer\'s Snack', 'Gifthing', 'Hero Baby', 'JELLYCAT', 'Manhattan Toy', 'NICHIGAN', 'NoseFrida', 'Nursery', 'Primomo', 'Stephen Joseph', 'Triple Beans', 'Wink', '我的心机', '犬印本铺'];
                    $('#authscroll').mysgroll({
                        imgarr: imgarr,
                        desarr: desarr,
                        imgdomain: '/mia/images/'
                    });

                    $('.genuineImg li').mouseover(function() {
                        $(this).addClass('curr');
                    });
                    $('.genuineImg li').mouseout(function() {
                        $(this).removeClass('curr');
                    });
                    $('#myElement_logo').remove();

                    $('.area5b').css('height', '1100px'); //兼容火狐的诡异bug
                });</script>
@endsection
