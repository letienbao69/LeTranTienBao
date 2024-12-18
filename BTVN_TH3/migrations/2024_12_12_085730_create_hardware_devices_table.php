<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwareDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id(); // id (Mã thiết bị, primary key)
            $table->string('device_name'); // Tên thiết bị
            $table->string('type'); // Loại thiết bị
            $table->boolean('status')->default(true); // Trạng thái hoạt động
            $table->foreignId('center_id')->constrained('it_centers')->onDelete('cascade'); // Khóa ngoại
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hardware_devices');
    }
}
