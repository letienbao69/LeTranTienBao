<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class books extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // id (Mã sách, primary key)
            $table->string('title'); // Tên sách
            $table->string('author'); // Tác giả
            $table->integer('publication_year'); // Năm xuất bản
            $table->string('genre'); // Thể loại
            $table->foreignId('library_id')->constrained('libraries')->onDelete('cascade'); // Khóa ngoại
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}