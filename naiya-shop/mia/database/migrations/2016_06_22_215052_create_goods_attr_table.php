<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_attr', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('mid')->unsigned()->comment('商户ID');
            $table->integer('gid')->unsigned()->comment('商品ID');
            $table->integer('anid')->unsigned()->comment('属性名ID');
            $table->integer('avid')->unsigned()->default(0)->comment('属性值ID');
            $table->integer('mavid')->unsigned()->default(0)->comment('扩展商品属性值ID');
            
            $table->comment = '商品属性表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goods_attr');
    }
}
