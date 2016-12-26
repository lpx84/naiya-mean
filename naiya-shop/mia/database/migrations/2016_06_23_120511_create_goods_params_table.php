<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_params', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('mid')->unsigned()->comment('商户ID');
            $table->integer('gid')->unsigned()->comment('商品ID');
            $table->char('name', 64)->comment('参数名');
            $table->char('value', 255)->comment('参数值');
            
            $table->comment = '商品详细参数表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goods_params');
    }
}
