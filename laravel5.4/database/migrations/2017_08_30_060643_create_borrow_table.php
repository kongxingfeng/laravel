<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bor_name',10)->comment('申请人');
            $table->integer('bor_money')->comment('借款金额(万元)');
            $table->char('bor_month')->comment('借款期限(月)')->nullable();
            $table->char('id_card')->comment('身份证号')->nullable();
            $table->string('goods_num',20)->comment('担保方式')->nullable();
            $table->char('money',10)->comment('价值(元)')->nullable();
            $table->string('text',50)->comment('借款用途')->nullable();
            $table->string('bor_text')->comment('借款描述')->nullable();
            $table->tinyInteger('status')->comment('审核状态 0未审核 1 已审核')->default('0');
            $table->string('tel')->comment('手机号')->nullable();
            $table->string('case',50)->comment('借款情况')->nullable();
            $table->char('bor_type')->comment('借款方式 房子或者车')->nullable();
            $table->string('user_id',50)->comment('用户id');
            $table->string('bor_time',30)->comment('审核通过时间')->nullable();
            $table->string('bor_etime',30)->comment('到期还款时间')->nullable();
            $table->integer('bor_qian')->comment('到期还款金额(万元)')->nullable();
<<<<<<< HEAD
=======
            $table->tinyInteger('bor_status')->comment('还钱状态 0未还钱 1 已还钱')->default('0');
>>>>>>> 段新宇
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow');
    }
}
