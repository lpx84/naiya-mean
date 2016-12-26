<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help', function (Blueprint $table) {
            $table -> increments('id')->unsigned()->comment('主键ID');
            $table -> integer('hcid')->unsigned()->comment('帮助分类ID');
            $table -> char('title', 64)->unique()->comment('标题');
            $table -> text('content')->comment('内容');
            $table -> integer('ctime')->unsigned()->comment('创建时间');
            $table -> integer('utime')->unsigned()->comment('修改时间');
            
            $table->comment = '帮助文章表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('help');
    }
}
