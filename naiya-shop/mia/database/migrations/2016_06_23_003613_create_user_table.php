<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->char('username', 64)->unique()->comment('登录名');
            $table->char('password', 255)->comment('登录密码');
            $table->decimal('account', 10, 2)->unsigned()->default(0.00)->comment('金额');
            $table->char('header', 255)->default('default.jpg')->comment('头像');
            $table->char('email', 128)->comment('Email');
            $table->char('phone', 11)->comment('手机号码');
            $table->integer('score')->unsigned()->default(50)->comment('积分');
            $table->integer('max_score')->unsigned()->default(50)->comment('最高积分');
            $table->tinyInteger('level')->unsigned()->default(1)->comment('等级');
            $table->string('token', 50)->comment('密码重置token');
            $table->integer('create_at')->unsigned()->comment('创建时间');
            $table->integer('update_at')->unsigned()->comment('更新时间');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态:1、正常 0、禁用');
            $table->tinyInteger('is_real_check')->unsigned()->default(0)->comment('是否已实名认证:1、已认证 0、未认证');
            
            $table->comment = '用户表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
