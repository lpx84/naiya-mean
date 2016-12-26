<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaywayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payway', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->tinyInteger('type')->unsigned()->default(1)->comment('类型 1:平台支付 2:网银支付');
            $table->char('way', 64)->default('alipay')->comment('方式代码 alipay:支付宝 weixin:微信');
            $table->char('img', 255)->comment('支付方式图片');
            $table->char('name', 64)->comment('支付方式名称');
            
            $table->comment = '支付方式表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payway');
    }
}
