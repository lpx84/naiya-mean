<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table -> integer('uid')->comment('用户ID');
            $table -> integer('gid')->unsigned()->comment('商品ID');
            $table -> integer('mid')->unsigned()->comment('商户ID');
            $table -> decimal('money', 10, 2)->comment('单价');
            $table -> text('standard')->nullable()->comment('规格详细信息 json数据');
            $table -> integer('num')->unsigned()->comment('数量');
            $table -> integer('create_at')->unsigned()->comment('创建时间');
            
            $table->comment = '购物车表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cart');
    }
}
