@extends('admin.layout')
@section('title',$title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户管理
            <small>在这里进行用户的信息查看</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">用户信息查看</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">用户信息</h3>
                    </div><!-- /.box-header -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- form start -->
                    
                        <div class="box-body">
                            <div class="form-group col-md-3">
                                <label for="username">昵称</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{$data -> username}}"
                                       placeholder="请输入昵称" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="email">邮箱账号</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$data -> email}}"
                                       placeholder="请输入一个有效邮箱" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="account">金额</label>
                                <input type="text" class="form-control" id="account" name="account" value="{{$data -> account}}"
                                       placeholder="请输入金额" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="phone">手机号</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$data -> phone}}" placeholder="请输入手机号码" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="score">积分</label>
                                <input type="text" class="form-control" id="score" name="score" value="{{$data -> score}}"
                                       placeholder="请输入积分" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="level">级别</label>
								
                                <input type="text" class="form-control" id="level" name="level" value="{{$grade}}"
                                       placeholder="请输入级别" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="status">状态</label>
                                <input type="text" class="form-control" id="status" name="status" value="{{$data -> status == 1 ? '已激活' : '未激活'}}"
                                       placeholder="请输入状态" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="is_real_check">是否实名认证</label>
								<input type="text" class="form-control" id="is_real_check" name="is_real_check" value="{{$data -> is_real_check == 1 ? '已认证' : '未认证'}}"
                                       placeholder="请输入状态" disabled>
                            </div>
							<div class="row">
                            <div class="form-group col-md-3">
                                <label for="header">用户头像</label>
                                <img src="{{url(config('app.userUrl'))}}/{{$data->header}}" width="80" />
                            </div>
							<div class="form-group col-md-3">
                                <label for="create_at">账号创建时间</label>
                                <input type="text" class="form-control" id="create_at" name="create_at" value="{{date('Y-m-d H:i:s',$data -> create_at)}}"
                                       placeholder="请输入创建时间" disabled>
                            </div>
							<div class="form-group col-md-3">
                                <label for="update_at">账号上次更新时间</label>
                                <input type="text" class="form-control" id="update_at" name="updat_at" value="{{date('Y-m-d H:i:s',$data -> update_at)}}"
                                       placeholder="上次更新时间" disabled>
                            </div>
							</div>
							@if($address)
							<div class="box-header with-border ">
								<h3 class="box-title">地址信息</h3>
							</div>
							<div class="row" style="margin-bottom:10px;"></div>
							@endif
							@foreach($address as $k => $v )
							
                            <div class="form-group col-md-3">
								<table class="msctab tab09" width="100%" cellspacing="0" cellpadding="0"  style="border:2px solid #ccc;" >
									<tbody>
										<tr class="first_tr">
											<th colspan="2" class="ddtit addir" align="left">
												<label for="is_default">{{$v -> is_default == 1 ? '默认地址' : '地址'}}</label>
											</th>
										</tr>
										<tr>
											<td class="gray3" width="40%" align="center">收货人：</td>
											<td width="60%">{{ $v -> name }}</td>
										</tr>
										<tr>
											<td class="gray3" align="center">详细地址：</td>
											<td>
											<script src="{{url('/distpicker/js/distpicker.data.js')}}"></script>
											<script>
											
												var province = ChineseDistricts['86']['{{ $v -> province }}'];
												var city = ChineseDistricts['{{ $v -> province }}']['{{ $v -> city }}'];
												var area = ChineseDistricts['{{ $v -> city }}']['{{ $v -> area }}'];
												
												document.write(province);
												document.write(city);
												document.write(area);
											</script>
											{{ $v -> detail }}
											</td>
										</tr>
										<tr>
											<td class="gray3" align="center">到货联系手机：</td>
											<td>{{ $v -> phone }} </td>
										</tr>
										<tr>
											<td class="gray3" align="center">创建时间：</td>
											<td>{{ date('Y-m-d H:i:s',$v -> create_at) }} </td>
										</tr>
										<tr>
											<td class="gray3" align="center">更新时间：</td>
											<td>{{ date('Y-m-d H:i:s',$v -> update_at) }} </td>
										</tr>
									</tbody>
								</table>
							</div>
							@endforeach
							<div class = "row"></div>
							@if($data -> is_real_check == 1)
								<div class="box-header with-border ">
									<h3 class="box-title">真实的信息</h3>
								</div>
								<div class="row" style="margin-bottom:10px;"></div>
								<div class="form-group col-md-3">
									<label for="name">真实姓名</label>
									<input type="text" class="form-control" id="name" name="name" value="{{$detail -> name}}"
										   placeholder="请输入真实姓名" disabled>
								</div> 
								<div class="form-group col-md-3">
									<label for="age">年龄</label>
									<input type="text" class="form-control" id="age" name="age" value="{{$detail -> age}}"
										   placeholder="请输入年龄" disabled>
								</div>
								 <div class="form-group col-md-3">
									<label for="sex">性别</label>
									<input type="text" class="form-control" id="sex" name="sex" value="{{$detail -> sex == 1 ? '男' : '女'}}"
										   placeholder="请输入性别" disabled>
								</div>
								 <div class="form-group col-md-3">
									<label for="qq">QQ</label>
									<input type="text" class="form-control" id="qq" name="qq" value="{{$detail -> qq}}"
										   placeholder="请输入QQ" disabled>
								</div>
								 <div class="form-group col-md-3">
									<label for="cid_no">身份证号码</label>
									<input type="text" class="form-control" id="cid_no" name="cid_no" value="{{$detail -> cid_no}}"
										   placeholder="请输入身份证号码" disabled>
								</div>
								<div class="form-group col-md-3">
									<label for="cid_prev_img">身份证正面照片</label>
									<img src="{{url(config('app.userUrl'))}}/{{$detail -> cid_prev_img}}"
										   placeholder="请输入身份证正面照片" width="80" />
								</div>
								<div class="form-group col-md-3">
									<label for="cid_reverse_img">身份证反面照片</label>
									<img src="{{url(config('app.userUrl'))}}/{{$detail -> cid_reverse_img}}"
										   placeholder="请输入身份证正面照片" width="80" />
									
								</div>
							
							@endif
							<div class="row"></div>
							@if($cash)
								<div class="box-header with-border ">
									<h3 class="box-title">代金券的信息</h3>
								</div>
								<div class="row" style="margin-bottom:10px;"></div>
								<div class="form-group col-md-3">
									<label for="expires_in">有效时间：秒</label>
									<input type="text" class="form-control" id="expires_in" name="expires_in" value="{{$cash -> expires_in}}"
										   placeholder="请输入有效时间" disabled>
								</div> 
								<div class="form-group col-md-3">
									<label for="get_time">获取时间</label>
									<input type="text" class="form-control" id="get_time" name="get_time" value="{{date('Y-m-d H:i:s',$cash -> get_time)}}"
										   placeholder="请输入获取时间" disabled>
								</div>
								 <div class="form-group col-md-3">
									<label for="end_time">结束时间</label>
									<input type="text" class="form-control" id="end_time" name="end_time" value="{{date('Y-m-d H:i:s',$cash -> end_time)}}"
										   placeholder="请输入结束时间" disabled>
								</div>
							@endif
							<div class="row"></div>
							@if($store)
								<div class="box-header with-border ">
									<h3 class="box-title">用户的收藏信息</h3>
								</div>
								<div class="row" style="margin-bottom:10px;"></div>
							
							@foreach($store as $key => $value)
								<div class="form-group col-md-3">
									<label for="type">类型：</label>
									<input type="text" class="form-control" id="type" name="type" value="{{$value -> type ==1 ? '商品' : '品牌'}}"
										   placeholder="请输入类型：商品或品牌" disabled>
								</div> 
								<div class="form-group col-md-6">
									<label for="typeid">{{$value -> type == 1 ? '商品名称' : '品牌名称'}}</label>
									<input type="text" class="form-control" id="typeid" name="typeid" 
									@if($value -> type == 1)
										value="{{$value -> name}}"
									@elseif($value -> type == 2)
										@foreach($storeBrand as $s => $b)
											@if($value -> typeid == $b -> brandId)
												value="{{$b -> name}}"
											@endif
										@endforeach
									@endif
										   placeholder="请输入商品或品牌的名称" disabled >
									
								</div>
								 <div class="form-group col-md-3">
									<label for="create_at">创建时间</label>
									<input type="text" class="form-control" id="create_at" name="create_at" value="{{date('Y-m-d H:i:s',$value -> create_at)}}"
										   placeholder="请输入创建时间" disabled>
								</div>
							@endforeach
							@endif
                        </div><!-- /.box-body -->

                        <div class="box-footer">
							<a href="{{url('/admin/user')}}">
                            <button type="submit" class="btn btn-primary">返回</button>
							</a>
                        </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection
