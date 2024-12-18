<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class cinemas extends Migration
{
    public function up()
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id(); // id (Mã rạp chiếu, primary key)
            $table->string('name'); // Tên rạp chiếu
            $table->string('location'); // Địa chỉ
            $table->integer('total_seats'); // Tổng số ghế ngồi
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cinemas');
    }
}
