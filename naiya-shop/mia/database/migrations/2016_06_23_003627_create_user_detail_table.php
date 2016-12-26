<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_detail', function (Blueprint $table) {
            $table->integer('uid')->unique()->unsigned()->comment('用户ID');
            $table->char('name', 64)->comment('真实姓名');
            $table->tinyInteger('age')->unsigned()->default(0)->comment('年龄');
            $table->tinyInteger('sex')->unsigned()->default(0)->comment('性别 0:女,1:男');
            $table->char('qq', 64)->comment('QQ');
            $table->char('cid_no', 18)->comment('身份证号码');
            $table->char('cid_prev_img', 255)->comment('身份证正面照片');
            $table->char('cid_reverse_img', 255)->comment('身份证反面照片');
            $table->integer('create_at')->unsigned()->comment('创建时间');
            $table->integer('update_at')->unsigned()->comment('更新时间');
            
            $table->comment = '用户详情表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_detail');
    }
}
