<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_score', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('uid')->unsigned()->comment('用户ID');
            
            $table->tinyInteger('action')->unsigned()->default(1)->comment('动作：0：减 1：加');
            $table->integer('value')->unsigned()->comment('数值');
            $table->integer('create_at')->unsigned()->comment('创建时间');
            
            $table->comment = '用户积分表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_score');
    }
}
