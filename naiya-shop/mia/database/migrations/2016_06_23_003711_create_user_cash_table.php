<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cash', function (Blueprint $table) {
            $table->integer('uid')->unsigned()->comment('用户ID');
            $table->integer('cashid')->unsigned()->comment('代金券ID');
            
            $table->integer('expires_in')->unsigned()->default(7*24*3600)->comment('有效时间:秒');
            $table->integer('get_time')->unsigned()->comment('获取时间');
            $table->integer('use_time')->unsigned()->comment('使用时间');
            $table->integer('end_time')->unsigned()->comment('结束时间');
            
            $table->comment = '用户代金券表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_cash');
    }
}
