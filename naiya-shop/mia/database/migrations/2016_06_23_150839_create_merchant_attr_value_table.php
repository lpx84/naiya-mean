<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantAttrValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_attr_value', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('mid')->unsigned()->comment('商户ID');
            $table->integer('anid')->unsigned()->comment('标准属性ID');
            $table->char('value', 64)->comment('商户扩展属性值');
            
            $table->comment = '商户扩展属性值表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('merchant_attr_value');
    }
}
