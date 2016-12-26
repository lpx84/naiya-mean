<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table -> increments('id')->unsigned()->comment('主键ID');
            $table -> char('title', 64)->unique()->comment('标题');
            $table -> text('content')->comment('内容');
            $table -> char('author', 64)->comment('作者');
            $table -> char('img', 255)->comment('封面图');
            $table -> integer('ctime')->unsigned()->comment('创建时间');
            $table -> integer('utime')->unsigned()->comment('修改时间');
            
            $table->comment = '文章表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article');
    }
}
