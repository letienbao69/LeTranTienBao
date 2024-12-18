<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id(); // id (Primary Key)
            $table->enum('grade_level', ['Pre-K', 'Kindergarten']); // grade_level
            $table->string('room_number', 10); // room_number
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
