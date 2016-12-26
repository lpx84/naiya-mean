<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsBackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_back', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('uid')->unsigned()->comment('用户ID');
            $table->integer('oid')->unsigned()->comment('订单ID');
            $table->integer('gid')->unsigned()->comment('商品ID');
            $table->char('order_no', 24)->comment('订单编号');
            $table->char('company', 64)->comment('物流公司名');
            $table->char('logi_no', 64)->comment('物流单号');
            $table->text('content')->comment('物流信息');
            $table->integer('create_at')->unsigned()->comment('下单时间');
            $table->integer('update_at')->unsigned()->comment('更新时间');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态:不为空  1:退货中 2:已退货 3:已退款');
            
            $table->comment = '退货表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goods_back');
    }
}
