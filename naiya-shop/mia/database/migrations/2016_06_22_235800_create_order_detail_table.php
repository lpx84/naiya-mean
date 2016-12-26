<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->integer('uid')->unsigned()->comment('用户ID');
            $table->integer('oid')->unsigned()->comment('订单ID');
            $table->integer('gid')->unsigned()->comment('商品ID');
            $table->integer('mid')->unsigned()->comment('商户ID');
            $table->char('order_no', 24)->comment('订单编号');
            $table->decimal('price', 10, 2)->unsigned()->default(0.00)->comment('单价');
            $table -> text('standard')->nullable()->comment('规格详细信息 json数据');
            $table->integer('nums')->unsigned()->default(0)->comment('数量');
            $table->integer('create_at')->unsigned()->comment('创建时间');
            $table->integer('update_at')->unsigned()->comment('修改时间');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态 1:待支付 2:已取消 3:交易关闭 4:已支付 5:待发货 6:已发货 7:已收货 8:已完成 9:退货中 10:已退货 11:已退款 ');
            
            $table->comment = '订单详情表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_detail');
    }
}
