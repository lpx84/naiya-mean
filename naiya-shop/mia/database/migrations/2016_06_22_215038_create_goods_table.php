<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('cid')->unsigned()->comment('分类ID');
            $table->integer('bid')->unsigned()->comment('品牌ID');
            $table->integer('mid')->unsigned()->comment('商户ID');
            $table->char('code', 24)->comment('商品编号');
            $table->char('name', 255)->comment('商品名');
            $table->char('img', 255)->default('default.jpg')->comment('商品图片');
            $table->text('desc')->comment('商品描述');
            $table->decimal('price', 10, 2)->default(0.00)->comment('单价');
            $table->integer('nums')->unsigned()->default(0)->comment('数量');
            $table->integer('create_at')->unsigned()->comment('创建时间');
            $table->integer('update_at')->unsigned()->comment('更新时间');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态 1:下架 2:正常(上架) 3:已删除');
            $table->tinyInteger('recomm')->unsigned()->default(0)->comment('是否推荐 0:不推荐 1：推荐');
            
            $table->comment = '商品表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goods');
    }
}
