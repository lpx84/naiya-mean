<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_name', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('主键ID');
            $table->char('name', 64)->unique()->comment('属性名');
            $table->tinyInteger('type')->unsigned()->default(1)->comment('字段类型 1:input 2:select 3:checkbox 4:radio 5:file 6:address ');
            
            $table->comment = '属性名表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attr_name');
    }
}
