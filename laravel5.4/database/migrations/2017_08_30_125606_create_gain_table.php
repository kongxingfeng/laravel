<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gain', function (Blueprint $table) {
            $table->increments('id')->comment('编号');
            $table->integer('min_money')->comment('最小金额');
            $table->integer('month')->comment('期限');
            $table->string('inter',4)->comment('利息的百分比')->nullable();
            $table->string('g_name',50)->comment('产品名称')->nullable();
            $table->string('note',100)->comment('描述')->nullable();
            $table->integer('status')->comment('分类')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gain');
    }
}
