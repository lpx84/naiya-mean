<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_address', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('uid')->unsigned()->comment('用户ID');
            $table->char('name', 64)->comment('联系人');
            $table->char('phone', 20)->comment('联系方式');
            $table->char('country', 32)->default('86')->comment('国家');
            $table->char('province', 32)->default('110000')->comment('省');
            $table->char('city', 32)->default('110100')->comment('市');
            $table->char('area', 32)->default('110101')->comment('区域');
            $table->char('detail', 255)->comment('详细地址');
            $table->tinyInteger('is_default')->unsigned()->default(0)->comment('是否为默认地址 0：否 1：是');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态 0：禁用 1：正常');
            $table->integer('create_at')->unsigned()->comment('创建时间');
            $table->integer('update_at')->unsigned()->comment('修改时间');
            
            $table->comment = '用户收藏表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_address');
    }
}
