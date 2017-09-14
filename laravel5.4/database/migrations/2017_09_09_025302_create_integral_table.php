<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral', function (Blueprint $table) {
            $table->increments('id');
            $table->string('u_id',50)->comment('用户ID');
            $table->integer('nums')->comment('连续签到的次数，默认为0');
            $table->string('com',20)->comment('积分的来源');
            $table->string('add_time',20)->comment('签到的时间');
            $table->string('grade',10)->comment('分数 +代表加分 -代表减分');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integral');
    }
}
