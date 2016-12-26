<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_img', function (Blueprint $table) {
            $table->integer('gid')->unsigned()->comment('商品ID');
            $table->char('title', 128)->comment('图片描述');
            $table->char('img', 255)->comment('图片路径');
            $table->tinyInteger('sq')->default(0)->comment('排序');
            
            $table->comment = '商品配图表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goods_img');
    }
}
