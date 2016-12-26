@extends('merchant.layout')
@section('title',$title)
@section('content')
<style>
    .profile-user-img {
        width: 150px;
    }
</style>
<div class="content-wrapper" style="min-height: 1096px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            商户信息
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">商户信息</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{url(config('app.merchantLogoUrl').$data -> logo)}}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{$data -> merchantName}}</h3>
                        <p class="text-muted text-center">商户信息</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>登录用户名</b> <a class="pull-right">{{$data -> username}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>保证金</b> <a class="pull-right">{{$data -> account}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>商户申请时间</b> <a class="pull-right">{{date('Y-m-d H:i:s',$data -> create_at)}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>商户更新时间</b> <a class="pull-right">{{date('Y-m-d H:i:s',$data -> update_at)}}</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>实名认证</b></a>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-6">
                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">商户负责人信息</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-user margin-r-5"></i> 姓名</strong>
                        <a class="pull-right">{{$data -> realname}}</a>
                        <hr>
                        
                        <strong><i class="fa fa-genderless margin-r-5"></i> 性别</strong>
                        <a class="pull-right"><?php $sex = [0=>'女', 1=> '女'];?>{{$sex[$data -> sex]}}</a>
                        <hr>

                        <strong><i class="fa fa-mobile-phone margin-r-5"></i> 手机号</strong>
                        <a class="pull-right">{{$data -> phone}}</a>
                        <hr>

                        <strong><i class="fa fa-mail-forward margin-r-5"></i> Email</strong>
                        <a class="pull-right">{{$data -> email}}</a>
                        <hr>
                        
                        <strong><i class="fa fa-barcode margin-r-5"></i> 身份证</strong>
                        <a class="pull-right">{{$data -> cid_no}}</a>

                        <hr>
                        
                        <strong><i class="fa fa-photo margin-r-5"></i> 手持证件照片</strong>
                        <p class="text-muted"><img src="{{url(config('app.merchantCidUrl').$data -> cid_img)}}" /></p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> 描述</strong>
                        <p>{{htmlspecialchars_decode($data -> desc)}}</p>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            
            </div>
        </div><!-- /.row -->

    </section><!-- /.content -->
</div>
@endsection