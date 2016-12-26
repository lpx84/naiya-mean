<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_value', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('主键ID');
            $table->integer('anid')->unsigned()->comment('属性名ID');
            $table->char('value', 64)->comment('属性值');
            
            $table->comment = '属性值表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attr_value');
    }
}
