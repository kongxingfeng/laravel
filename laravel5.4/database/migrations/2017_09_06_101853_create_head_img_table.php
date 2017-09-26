<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_img', function (Blueprint $table) {
            $table->increments('id');
            $table->string('u_id',40)->comment('用户id');
            $table->string('head_img',50)->comment('图片路径');
            $table->string('up_time')->comment('添加时间');
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
        Schema::dropIfExists('head_img');
    }
}
