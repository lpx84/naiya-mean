<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('uid')->unsigned()->comment('用户ID');
            $table->char('order_no', 24)->comment('订单编号');
            $table->char('title', 255)->comment('订单名称');
            $table->string('desc', 512)->comment('订单描述');
            $table->decimal('total', 10, 2)->unsigned()->comment('订单总金额');
            $table->integer('expires_in')->unsigned()->default(7200)->comment('有效时间:秒 默认2*3600');
            $table->integer('create_at')->unsigned()->comment('创建时间');
            $table->integer('update_at')->unsigned()->comment('修改时间');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态 1:待支付 2:已取消 3:交易关闭 4:已支付 5:待发货 6:已发货 7:已收货 8:已完成 9:退货中 10:已退货 11:已退款 ');
            
            $table->comment = '订单表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order');
    }
}
