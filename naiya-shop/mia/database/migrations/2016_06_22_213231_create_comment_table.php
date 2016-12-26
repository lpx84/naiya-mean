<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('uid')->unsigned()->comment('用户ID');
            $table->integer('gid')->unsigned()->comment('商品ID');
            $table->tinyInteger('level')->unsigned()->default(0)->comment('星级：1：1个星星...');
            $table->char('title', 255)->comment('标题');
            $table->string('content', 512)->comment('内容');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态 1:审核中 2:正常显示 3:已屏蔽');
            $table->integer('create_at')->unsigned()->comment('创建时间');
            
            $table->comment = '评论表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comment');
    }
}
