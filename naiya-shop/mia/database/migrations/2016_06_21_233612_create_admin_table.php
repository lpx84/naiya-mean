<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table -> increments('id')->unsigned()->comment('主键ID');
            $table -> char('username', 64)->unique()->comment('用户名');
            $table -> char('password', 255)->comment('密码');
            $table -> char('header', 255)->default('default.jpg')->comment('头像');
            $table -> tinyInteger('status')->unsigned()->default(1)->comment('状态 默认：1、正常 0、禁用');
            $table -> integer('create_at')->unsigned()->comment('创建时间');
            $table -> char('token', 50)->comment('用户token');
            
            $table->comment = '管理员表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin');
    }
}
