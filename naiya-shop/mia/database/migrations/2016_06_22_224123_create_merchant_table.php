<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->char('username', 64)->unique()->comment('商户登录名');
            $table->char('password', 255)->comment('商户登录密码');
            $table->char('name', 128)->comment('商户名称');
            $table->decimal('account', 10, 2)->unsigned()->default(0.00)->comment('保证金');
            $table->char('logo', 255)->default('default.jpg')->comment('LOGO');
            $table->string('desc', 512)->comment('描述信息');
            $table->string('token', 50)->comment('密码重置token');
            $table->integer('create_at')->unsigned()->comment('创建时间');
            $table->integer('update_at')->unsigned()->comment('更新时间');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态:1、正常 0、禁用');
            $table->tinyInteger('is_real_check')->unsigned()->default(0)->comment('是否已实名认证:1、已认证 0、未认证');
            
            $table->comment = '商户表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('merchant');
    }
}
