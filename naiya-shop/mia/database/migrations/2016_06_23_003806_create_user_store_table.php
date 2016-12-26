<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_store', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('uid')->unsigned()->comment('用户ID');
            $table->tinyInteger('type')->unsigned()->default(1)->comment('类型：1：商品 2：品牌');
            $table->integer('typeid')->unsigned()->comment('商品|品牌ID');
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
        Schema::drop('user_store');
    }
}
