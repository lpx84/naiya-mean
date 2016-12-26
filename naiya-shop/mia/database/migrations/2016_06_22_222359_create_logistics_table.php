<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistics', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('oid')->unsigned()->comment('订单ID');
            $table->integer('mid')->unsigned()->comment('商户ID');
            $table->char('order_no', 24)->comment('订单编号');
            $table->char('company', 64)->comment('物流公司名');
            $table->char('logi_no', 64)->comment('物流单号');
            $table->text('content')->comment('物流信息');
            $table->integer('create_at')->unsigned()->comment('创建时间');
            $table->integer('update_at')->unsigned()->comment('更新时间');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态:不为空  1：已发货 2：在途中 3：已送达');
            
            $table->comment = '物流表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('logistics');
    }
}
