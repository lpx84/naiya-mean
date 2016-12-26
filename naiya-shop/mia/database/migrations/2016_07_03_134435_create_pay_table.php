<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            
            $table->char('order_no', 24)->unique()->comment('订单编号');
            $table->char('trade_no', 64)->comment('支付平台流水号');
            $table->tinyInteger('trade_status')->default(1)->unsigned()->comment('交易状态 1:处理中 2:交易成功 3:交易失败');
            $table->char('subject', 255)->comment('商品名称');
            $table->string('body', 3064)->comment('商品描述');
            $table->char('buyer_email', 255)->comment('买家支付宝账号，可以是Email或手机号码');
            $table->char('buyer_id', 32)->comment('买家支付宝账户号买家支付宝账号对应的支付宝唯一用户号');
            $table->decimal('total_fee', 10, 2)->default(0.00)->unsigned()->comment('该笔订单的总金额');
            $table->tinyInteger('is_total_fee_adjust')->default(0)->unsigned()->comment('是否调整总价 0:没有 1:调整过');
            $table->tinyInteger('use_coupon')->default(0)->unsigned()->comment('是否在交易过程中使用了红包 0:未使用 1:已使用');
            $table->char('extra_common_param', 255)->comment('用于商户回传参数，该值不能包含“=”、“&”等特殊字符。如果用户请求时传递了该参数，则返回给商户时会回传该参数。');
            
            $table->integer('create_at')->unsigned()->comment('创建时间');
            $table->integer('update_at')->unsigned()->comment('修改时间');
            
            $table->comment = '支付表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pay');
    }
}
