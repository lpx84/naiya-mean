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
                <div class="title yahei f20 pink">
                    <ul class="tab-tit clearfix">
                        <li class=" dhref" dhref="/order_lists"><a href="{{ url('/user/order') }} " >全部订单</li>
                        <li class=" dhref"><a href="{{ url('/user/order/payment') }} " >待付款<em>（{{ $paymentNum -> count }}）</em></a></li>
                        <li class=" dhref" dhref="/order_lists?s=nosend"><a href="{{ url('/user/order/shipments') }} " >待发货<em>（{{ $shipmentsNum -> count }}）</em></a></li>
                        <li class="cur dhref" dhref="/order_lists?s=hassend"><a href="{{ url('/user/order/doshipments') }}" style="color: #fff;">已发货<em>（{{ $doshipmentsNum -> count }}）</em></a></li>
                    </ul>
                </div>
                <link rel="stylesheet" href="{{url('/mia/style/account.css')}}" type="text/css">
<style type="text/css">
.changeAddressBtn{margin-right: 2px;display: inline-block;font-size: 12px;height: 18px;line-height: 18px;padding: 3px 6px;text-align: center;color: #000;text-decoration: none;border-radius: 3px;border: 1px solid #e393bb;

}
.orderListHead span a:hover{color:#000;}

.changeAddress{width:360px;height:425px;background-color:#fff;border:4px solid #a9a9a7;font-size:12px;overflow:auto;display: none;display: none;z-index: 111001;position: absolute;left: 50%;top: 50%;margin-left: -180px;margin-top: -212px;position: fixed!important;}
.changeAddTit{height:31px;background-color:#f7f7f7;border-bottom:1px solid #eaeaea;color:#666666;line-height: 31px;font-weight: bold;position: relative;padding-left:14px;}
.changeAddTit img{position:absolute;right:12px;top:6px;cursor:pointer;}
.changeAddress .changeAddh3{color:#999999;line-height:31px;padding-left:14px;margin-top:11px;}
.changeAddmake{width:330px;border:1px solid #eaeaea;background-color:#fcfcfc;margin:0 auto;margin-bottom:13px;position: relative;}
.changeAddmake ul{padding-top:14px;padding-left:13px;padding-right:54px;}
.changeAddmake ul li{color:#a9a9a7;list-style-type: none;line-height:20px;}
.changeAddmake ul li.changeSecondLi{margin-bottom:8px;}
.changeAddmake a{color:#f450a2;font-weight: bold;text-decoration:underline;position: absolute;top:36px;right:15px;}
.changeSecondH3{margin-top:8px;}
.changeSecondBox{background-color:#fff;cursor:pointer;position: relative;}
.changeSecondBox ul{padding-right:54px;}
.changeSecondBox img{position:absolute;right:0px;bottom: 0px;display: none;}    /* 选择增加的img */
.changeSecondBox ul li{color:#666666;}
.changeSecondBox ul li.changeFirstLi{color:#333333;}

.changeAddressForm{width:598px;border:4px solid #a9a9a7;font-size:12px;background-color:#fff;display: none;z-index: 111001;position: absolute;left: 50%;top: 50%;margin-left: -299px;margin-top: -139px;position: fixed!important;}
.changeAddUl{margin-top:21px;padding-left: 0px;color:#999999;line-height:31px;padding-left:26px;}
.changeAddUl ul li{list-style-type: none;margin-bottom:12px;float: left;margin-right:21px;}
.changeAddUl ul li input{margin-left:10px;border:1px solid #cccccc;color:#333333;padding-left: 4px;}
.changeAddUl .goodsMan{padding-left:13px;width:517px;}
#changeAddUl_but1{width:126px;height:24px;line-height: 24px;}
#changeAddUl_but2 label{padding-right:5px;}
#changeAddUl_but2 .select1{width:132px;height:17px;}
#changeAddUl_but2 .select2{width:79px;height:17px;}
#changeAddUl_but2 .select3{width:79px;height:17px;}
#changeAddUl_but2 .select4{width:119px;height:17px;}
#changeAddUl_but3{width:356px;height:24px;color:#333333;line-height: 24px;}
#changeAddUl_but4{width:194px;height:24px;color:#333333;line-height: 24px;}
#changeAddUl_but5{width:194px;height:24px;color:#333333;line-height: 24px;}
.changeAddressForm .Operation{margin-left: 63px;}
.Operation{margin:0 auto;clear: both;color:#fff;font-size: 14px;font-weight: bold;text-align: center;width:225px;line-height: 30px;}
.Operation .Determine{width:104px;height:30px;background-color:#f450a2;float: left;margin-right:17px;cursor: pointer;margin-bottom: 15px;}  /* 确定 */
.Operation .Cancel{width:104px;height:30px;background-color:#f450a2;float: left;cursor: pointer;margin-bottom: 15px;}  /* 取消*/

.changeAddressCon{width:367px;border:4px solid #a9a9a7;font-size:12px;background-color:#fff;display: none;z-index: 111001;position: absolute;left: 50%;top: 50%;margin-left: -183px;margin-top: -98px;position: fixed!important;}
.changeAddressCon .changeAddh3{color:#f450a2;font-weight: bold;line-height:31px;padding-left:20px;margin-top:8px;}
.changeAddressCon p{color:#666666;line-height:24px;padding-left:20px;padding-right:20px;}
.changeAddressCon .Operation{padding-top: 11px;}
.Operation .Determine.change_sur{background-color:#ff69b3;font-weight:normal;}
.Operation .Cancel.change_qx{background-color:#f9f9f9;color:#000000;font-weight:normal;border:1px solid #d5d5d5;width: 102px;height:28px;}


.changeAddressSF{width:367px;height:196px;border:4px solid #a9a9a7;font-size:12px;background-color:#fff;display: none;z-index: 111001;position: absolute;left: 50%;top: 50%;margin-left: -183px;margin-top: -98px;position: fixed!important;}
.changeAddZt{width:299px;height:60px;margin:0 auto;margin-top:14px;font-size:14px;}
.changeAddZt img{vertical-align: middle;margin-right:9px;color:#333333;font-size: 14px;}
.changeAddressSucD{width:100px;height:30px;background-color:#f450a2;cursor: pointer;line-height: 30px;color:#fff;font-size: 14px;font-weight: bold;text-align: center;margin:0 auto;margin-top:20px;}


/*遮罩*/
.popup_mask{display:none;width:100%;height: 100%;z-index: 111000;position: fixed;top:0;left:0;  background-color: #000;
 filter:alpha(opacity=50);/*IE*/opacity:0.5;/*FF*/position:fixed!important;/*FF IE7*/position:absolute;/*IE6*/}
 .popup_notice{display: none;z-index: 111001;height: 423px;position: absolute;left:50%;top:50%;margin-left: -260px;margin-top: -211px;position:fixed!important;/*FF IE7*/positiabsolute;/*IE6*/}
 .popup_notice a#close_mia_popup{display: block;position: absolute;width: 50px;height: 50px;top:14px;right:12px;background:url(about:blank)}

 /* 新增 */
.add_messages {
vertical-align: middle;
color: #F67649;
width:148px;
height:22px;
border: 1px solid #FEDBB1;
background: #FFFDE7;
margin: 15px 0 16px 0px;
padding: 0px 4px;
font-size: 12px;
font-family: Verdana, Geneva, sans-serif;
line-height: 22px;
font-weight: normal;
}
 </style>
<div class="splist p20" id="orderList">
            <table class="msctab tab05" width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody><tr>
                <th width="55%">商品</th>
                <th width="15%">实付金额</th>
                <th width="15%">交易状态</th>
                <th width="15%">操作</th>
            </tr>
			@if(session('info'))
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> 提示</h4>
						{{ session('info') }}
				</div>
			@endif
        </tbody></table>
            @foreach($data as $key) 
			@if($key -> status == 6)
            <div class="icspblock">
                <table class="msctab outer" width="100%" cellspacing="0" cellpadding="0" border="0">
                   <tbody>
				   <tr class="orderListHead">
					<th colspan="4" class="ddtit" align="left">
						<span>订单号：<a href="">{{ $key -> order_no }}</a></span>
					<span>下单时间：{{ date('Y-m-d H:i:s',$key -> create_at) }}</span>
                        </th>
                    </tr>
					<tr class="orderList_tr">
                        <td colspan="4">
                    <table class="msctab" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tbody><tr class="order_child">
                                    <th colspan="4" align="left">
                                                                            </th>
                                </tr>
                                <tr class="orderList_tr">
                                    <td class="mysp ptb0" width="55%">
            <table class="tab04" width="100%" cellspacing="0" cellpadding="0" border="0">
             <tbody><tr>
             <td class="o_child borenone">
             <div class="corder_childtd clearfix">
                <a href="{{ url('goods') }}/{{ $key -> goodsid }}" target="_blank">
                <img src="{{ url(config('app.goodsUrl').$key -> images) }}" alt="{{ $key -> name }}" title="{{ $key -> name }}" width="50" height="50">
                                                        </a>
                 <a href="{{ url('goods') }}/{{ $key -> goodsid }}" target="_blank">{{ $key -> name }}</a>
                 <p class="orderin">
                <span class="gray listNum">数量：{{ $key -> num }}</span>
             </p>
			</div>
                                                </td>
                                            </tr>
                                                                                    </tbody></table>
                                    </td>
                                    <td class="f14 pink" width="15%" align="center">¥ {{ $key -> total }}</td>
                                    <td width="15%" align="center" style="color: #666;">
									{{ $arr[$key -> status] }}
									<br>
                                        <p style="margin-top:5px;"><a href="{{ url('/user/details') }}/{{ $key -> id }}" target="_blank" class="pink">订单详情</a></p>
                                    </td>
                                    <td class="btngroup" width="15%" align="center">
                                                                            </td>
                                </tr>
                            </tbody></table>
                                                    </td>
                    </tr>
                </tbody></table>
            </div>
			@endif
			@endforeach
           
       



<!-- 遮罩 -->
<div id="mia_popup_mask" class="popup_mask" style="display: none;"></div>
<script>
var provinceJsonList = {};
var orderAddrInfo = {};

function change_province(obj,name){
	
	var selectId = obj.val();
	var ele = $('.changeAddressForm');
	
	switch(name){
		case 'province':
			ele.find('.city option[value!="0"]').remove();
			ele.find('.area option[value!="0"]').remove();
			ele.find('.street option[value!="0"]').remove();

		 	getAddrJsonList({act:'get_cities_json', 
				data:{province_id:selectId}, 
				'assign_ele' : ele.find('.city'),
				}); 
			
			break;
		case 'city':
			ele.find('.area option[value!="0"]').remove();
			ele.find('.street option[value!="0"]').remove();
			 getAddrJsonList({act:'get_areas_json', 
				data:{city_id:selectId}, 
				'assign_ele' : ele.find('.area'),
				}); 
			
			break;
		case 'area':
			ele.find('.street option[value!="0"]').remove();
			getAddrJsonList({act:'get_towns_json', 
					data:{area_id:selectId}, 
					'assign_ele' : ele.find('.street'),
					}); 		
			break;
	}
}

function getAddrJsonList(argData){
	//argData.act = get_cities_json
	var selectId = false;
	
	$.ajax({
		url:'/instant/order/' + argData.act,
		type:'post',
		data:argData.data,
		//async:false,
		dataType:'json',
		success:function(res){
			var plen = res.length;
			var pstr = '';
			for(var i = 0; i< plen; i++){
				var select = '';
				if(selectId === false){
					select = res[i].name == argData.selectName ? ' selected="selected"' : '';
					if(select != '')selectId = res[i].id;
				}
				pstr += '<option value="'+res[i].id+'" '+ ( select ) +'>'+res[i].name+'</option>';
			}
			argData.assign_ele.find('option[value!="0"]').remove();
			argData.assign_ele.append(pstr);
			if(selectId){
				if(argData.act == 'get_cities_json'){
					assign_addr_list(selectId,'city');
				}else if(argData.act == 'get_areas_json'){
					assign_addr_list(selectId,'area');	
				}
			}
		}
	});

	return selectId;
	
}

function getAddrList(obj){
 var par_code = obj.attr('data-oc');
	$.ajax({
		url:'/instant/order/getEditOrderAddressList',
		type:'post',
		data:{'par_code':par_code},
		dataType:'json',
		success:function(res){
			$('#mia_popup_mask').show();
           
			var ele = $('.changeAddress');
			ele.find('.changeSecondBox').remove();
			ele.find('.changeSecondH3').hide();
			if(!res.code){
				tip_fail(res.msg);
				obj.parent().remove();
				return false;
			}
			ele.show();
			ele.find('.changeSecondH3').show();
			provinceJsonList = res.province_json;
			orderAddrInfo = res.orderAddrInfo;
			
			ele.find('.addr1 li').eq(0).html(res.orderAddrInfo.name +' '+ res.orderAddrInfo.cell);
			ele.find('.addr1 .changeSecondLi').html(res.orderAddrInfo.province + res.orderAddrInfo.city + res.orderAddrInfo.area + res.orderAddrInfo.street + res.orderAddrInfo.address);
			ele.find('.xgnew').attr('data-oc', par_code);
			var str = '';
			var len = res.addressList.length;
			 if(len){
				for(var i = 0; i < len; i++){
					str += '<div class="changeAddmake changeSecondBox">';
	            	str += '<ul>';
	                str += '<li class="changeFirstLi">'+res.addressList[i].name+'  '+res.addressList[i].cell+'</li>';
	                str += '<li class="changeSecondLi">'+ (res.addressList[i].is_default == 1 ? '[默认]' : '')+ res.addressList[i].provname + res.addressList[i].cityname+ res.addressList[i].areaname+ res.addressList[i].townname+ res.addressList[i].address + '</li>';
	                str += '<a href="#" class="changeAddress_xg xgodd" order_code="'+par_code+'" data-addrId="'+res.addressList[i].id+'">选择</a>';
	            	str += '</ul>';
	        		str += '</div>';
	        		
				}
				if(str){
					$('.changeAddress .changeSecondBox').remove();
					$(str).insertAfter($('.changeAddress .changeSecondH3'));
				}	
				
			} 
				


		}
	});
	
}



function submitAddr(){

	var prev_ele = $('.changeAddressForm');
	var con = $('.changeAddressCon');
	var data = {};
	if(con.attr('from') == 'edit'){
		var ck = check_form();
		if(!ck.pass){
			alert(ck.msg);
			return false;
		}
		
		  	/*data.province = prev_ele.find('.province option:selected').text();
		    data.city = prev_ele.find('.city option:selected').text();
		    data.area = prev_ele.find('.area option:selected').text();
		    data.street = prev_ele.find('.street option:selected').text();
		    data.address = prev_ele.find('#changeAddUl_but3').val();
		    data.name = prev_ele.find('.name').val();
		    data.cell = prev_ele.find('.cell').val();
		    data.phone = prev_ele.find('.phone').val();
		    */
		 	data.province = ck.data.province;
		    data.city = ck.data.city;
		    data.area = ck.data.area;
		    data.street = ck.data.street;
		    data.address = ck.data.address;
		    data.name = ck.data.name;
		    data.cell = ck.data.cell;
		    data.phone = ck.data.phone;
		    
		    data.order_code = prev_ele.attr('order_code');
	}else{
			data.address_id = con.attr('addrid');
			data.order_code = con.attr('order_code');
	}

	
    $.ajax({
		url:'/instant/order/change_order_addr',
		type:'post',
		data:data,
		//data:{'newAddrInfo':data,'order_code' : order_code},
		dataType:'json',
		success:function(res){
             if(res.status){                         //成功
                  $('.changeAddressCon').hide();
                  $('.changeAddressCG').show();
              }else{                             //失败
                  $('.changeAddressCon').hide();
                  tip_fail(res.msg);
              } 
            
		}
    });
    
    
}

function tip_fail(msg){
	 $('.changeAddressSB .msg').text(msg);
     $('.changeAddressSB').show();
}


function showEdit(order_code){
	var ele = $('.changeAddressForm');
	ele.attr('order_code',order_code);
	ele.find('.name').val(orderAddrInfo.name);
	ele.find('.address').val(orderAddrInfo.address);
	ele.find('.cell').val(orderAddrInfo.cell);
	ele.find('.phone').val(orderAddrInfo.phone);
	ele.find('.province option[value!="0"]').remove();
	var plen = provinceJsonList.length;
	var pstr = '';
	var selectPro = false;
	var	selectCity = false;
	var selectArea = false;
	for(var i = 0; i< plen; i++){
		var select = '';
		if(selectPro === false){
			select = provinceJsonList[i].name == orderAddrInfo.province ? ' selected="selected"' : '';
			if(select != ''){
				selectPro = provinceJsonList[i].id;
			}
		}
		pstr += '<option value="'+provinceJsonList[i].id+'"'+ ( select ) +'>'+provinceJsonList[i].name+'</option>';
	}
	
	ele.find('.province').append(pstr);
	return selectPro;
	if(selectPro){
		/*var cityId = getAddrJsonList({act:'get_cities_json', 
				data:{province_id:selectPro}, 
				'assign_ele' : ele.find('.city'),
				'selectName' : orderAddrInfo.city
				}); 

		var areaId = getAddrJsonList({act:'get_areas_json', 
				data:{city_id:cityId}, 
				'assign_ele' : ele.find('.area'),
				'selectName' : orderAddrInfo.area
				}); 

		 getAddrJsonList({act:'get_towns_json', 
				data:{area_id:areaId}, 
				'assign_ele' : ele.find('.street'),
				'selectName' : orderAddrInfo.street
				}); */
		
	}
}

function assign_addr_list(id,from){
	
	var ele = $('.changeAddressForm');
	var select_id = 0;
	switch(from){
	case 'province':
		select_id = getAddrJsonList({act:'get_cities_json', 
			data:{province_id:id}, 
			'assign_ele' : ele.find('.city'),
			'selectName' : orderAddrInfo.city
			});
		//assign_addr_list(select_id,'city');
		break;

	case 'city':
		select_id = getAddrJsonList({act:'get_areas_json', 
			data:{city_id:id}, 
			'assign_ele' : ele.find('.area'),
			'selectName' : orderAddrInfo.area
			}); 
		//assign_addr_list(select_id,'area');
		break;	

	case 'area':
		 getAddrJsonList({act:'get_towns_json', 
				data:{area_id:id}, 
				'assign_ele' : ele.find('.street'),
				'selectName' : orderAddrInfo.street
				}); 
			
		break;
	}
	return select_id;
}


(function(){

         function changeAddress(){
        this.changeAddressBtn='.changeAddressBtn';  //弹出层1
        this.closes='.changeAddTit img,.Operation .Cancel';
        this.xgnew='.xgnew'; //修改
        this.xgodd='.xgodd'; //选择    
        this.Determine='.changeAddressForm .Determine';  //修改地址下的确定
        this.changeAddressCon='.changeAddressCon .Determine';    //点修改地址确认的确定 
        this.changeAddressSF='.changeAddressSF .changeAddressSucD';   //最后取消
    }
    changeAddress.prototype={
        AddressBtn:function(){
            $(this.changeAddressBtn).click(function(){ //弹出层1
            	$('.changeAddress .changeSecondBox').remove();
            	getAddrList($(this));
               // $('#mia_popup_mask').show();
               // $('.changeAddress').show(); 
                
            })
            $(this.closes).click(function(){    //弹出层1关闭  //弹出层所有的取消按钮
                $('#mia_popup_mask').hide();
                $('.changeAddress').hide();
                $('.changeAddressForm').hide();
                $('.changeAddressCon').hide();
                $('.changeAddressCG').hide();
                $('.changeAddressSB').hide();
            })
            $(this.xgnew).click(function(){   //点修改
            	
                $('.changeAddress').hide();
                $('.changeAddressForm').show();
                var select_id = showEdit($(this).attr('data-oc')); //edit
                assign_addr_list(select_id,'province');
            })
            $('.changeAddress').delegate('.xgodd','click',function(){   //点选择
                $('.changeAddress').hide();
                $('.changeAddressCon').show();
                $('.changeAddressCon').attr('from','select');
                $('.changeAddressCon').attr('order_code',  $(this).attr('order_code'));
                $('.changeAddressCon').attr('addrId', $(this).attr('data-addrId'));
                $('#newAddress').text($(this).siblings('.changeSecondLi').text()+' '+$(this).siblings('.changeFirstLi').text());
            })
            $(this.Determine).click(function(){   //点修改地址下的确定

            	var result = check_form();
            	if(!result.pass){
                	var tipEle = $(this).prev('.add_messages');
                	tipEle.text(result.msg).fadeIn();
                	setTimeout(function(){
                    	$('.changeAddressForm .add_messages').text('').fadeOut();
                    	},2000);
					return false;	
                }
            	
                $('.changeAddressForm').hide();
                $('.changeAddressCon').show();
                $('.changeAddressCon').attr('order_code', $('.changeAddressForm').attr('order_code'));
                $('.changeAddressCon').attr('from','edit');
                //修改html
                var str ='';
                var prev_ele = $('.changeAddressForm');
                str += prev_ele.find('.province option:selected').text();
                str += prev_ele.find('.city option:selected').text();
                str += prev_ele.find('.area option:selected').text();
                str += prev_ele.find('.street option:selected').text();
                str += prev_ele.find('#changeAddUl_but3').val();
                str += ' ' + prev_ele.find('.name').val();
                str += ' ' + prev_ele.find('.cell').val();
                str += ' ' + prev_ele.find('.phone').val();
                $('#newAddress').text(str);
            }) 
            //点修改地址确认的确定   可能显示成功也可能显示失败
            $(this.changeAddressCon).click(function(){

                //提交修改后的地址
                submitAddr();
                
              /*   if(true){                         //成功
                    $('.changeAddressCon').hide();
                    $('.changeAddressCG').show();
                }else{                             //失败
                    $('.changeAddressCon').hide();
                    $('.changeAddressSB').show();
                } */
            })
            //最后的点击取消
            $(this.changeAddressSF).click(function(){
                $('#mia_popup_mask').hide();
                $('.changeAddressSF').hide();
            })
        }
    }
new changeAddress().AddressBtn()
})()


</script>            
</div>
            </div>
@endsection('content')