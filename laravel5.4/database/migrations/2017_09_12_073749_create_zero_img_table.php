<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZeroImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zero_img', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bor_id')->comment('借款操作id');
            $table->string('img',250)->comment('借款身份证正面证件')->nullable();
            $table->string('img2',250)->comment('借款身份证背面证件')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zero_img');
    }
}
