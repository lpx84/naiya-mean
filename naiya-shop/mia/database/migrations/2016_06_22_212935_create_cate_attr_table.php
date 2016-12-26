<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cate_attr', function (Blueprint $table) {
            $table->integer('cid')->unsigned()->comment('分类ID');
            $table->integer('anid')->unsigned()->comment('属性名ID');
            //$table->integer('avid')->unsigned()->comment('属性值ID');
            
            $table->comment = '分类表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cate_attr');
    }
}
