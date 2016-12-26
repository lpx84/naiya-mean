<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashcouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashcoupon', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->char('code', 64)->comment('代金券码');
            $table->decimal('amount', 10, 2)->unsigned()->default(10.00)->comment('面额');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态:1：未下发未使用 2：已下发未使用 3：已下发已使用 4：已下发已过期');
            
            $table->comment = '代金券表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cashcoupon');
    }
}
