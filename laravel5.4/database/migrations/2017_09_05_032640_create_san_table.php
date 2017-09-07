<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san', function (Blueprint $table) {
            $table->increments('id');
            $table->string('qid',50)->comment('第三方qid');
            $table->string('name',80)->comment('用户名');
            $table->string('username',80)->comment('实名')->default('0');
            $table->char('idcard',18)->comment('身份证')->default('0');
            $table->string('money',50)->comment('账户余额')->default('0');
            $table->string('date',30)->comment('添加时间');
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
        Schema::dropIfExists('san');
    }
}
