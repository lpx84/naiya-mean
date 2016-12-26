<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('cid')->unsigned()->comment('分类ID');
            $table->char('name', 255)->comment('品牌名');
            $table->string('desc', 512)->comment('品牌描述');
            $table->char('img', 255)->default('default.jpg')->comment('品牌图片');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态：1：正常 2：热门');
            
            $table->comment = '品牌表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('brand');
    }
}
