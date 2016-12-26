<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpCateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_cate', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->char('name', 64)->comment('分类名');
            $table->integer('pid')->unsigned()->default(0)->comment('父分类ID');
            $table->char('path', 255)->default('0')->comment('路径');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态 1:正常 2:禁用');
            
            $table->comment = '帮助分类表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('help_cate');
    }
}
