<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_img', function (Blueprint $table) {
            $table->integer('cmid')->unsigned()->comment('评论ID');
            $table->char('img', 255)->comment('图片');
            
            $table->comment = '评论配图表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comment_img');
    }
}
