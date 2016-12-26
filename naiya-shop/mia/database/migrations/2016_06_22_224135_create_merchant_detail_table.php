<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_detail', function (Blueprint $table) {
            $table->integer('mid')->unique()->unsigned()->comment('商户ID');
            $table->char('name', 64)->comment('负责人真实姓名');
            $table->char('email', 128)->comment('负责人Email');
            $table->char('phone', 11)->comment('负责人手机');
            $table->tinyInteger('sex')->unsigned()->default(0)->comment('性别 0:女,1:男');
            $table->char('cid_no', 18)->comment('身份证号码');
            $table->char('cid_img', 255)->comment('手持证件照片');
            $table->integer('create_at')->unsigned()->comment('创建时间');
            $table->integer('update_at')->unsigned()->comment('更新时间');
            
            $table->comment = '商户详情表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('merchant_detail');
    }
}
