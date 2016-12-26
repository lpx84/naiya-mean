<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPaywayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payway', function (Blueprint $table) {
            $table->integer('oid')->unsigned()->unique()->comment('订单ID');
            $table->tinyInteger('payid')->unsigned()->default(1)->comment('支付方式ID');
            $table->char('order_no', 24)->comment('订单编号');
            
            $table->comment = '订单支付关联表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_payway');
    }
}
