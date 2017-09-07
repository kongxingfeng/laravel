<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invest', function (Blueprint $table) {
            $table->increments('id')->comment('编号');
            $table->string('u_id',50)->comment('投资人id');
            $table->integer('in_id')->comment('提交订单的那条数据库的id');
            $table->string('interest',10)->comment('利息(1%)')->unllable();
            $table->string('start_time',10)->comment('添加时间')->unllable();
            $table->string('long',10)->comment('期限')->unllable();
            $table->string('money',10)->comment('本金')->unllable();
            $table->string('total_money',10)->comment('本金加总利息')->unllable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invest');
    }
}
