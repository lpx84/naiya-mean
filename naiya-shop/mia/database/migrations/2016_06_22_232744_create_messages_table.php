<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->char('title', 255)->comment('标题');
            $table->string('content', 1024)->comment('内容');
            $table->integer('create_at')->unsigned()->comment('创建时间');
            
            $table->comment = '站内消息表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('messages');
    }
}
