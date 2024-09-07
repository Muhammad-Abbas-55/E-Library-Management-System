<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookSerialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_serials', function (Blueprint $table) {
            $table->id();
            $table->string('serial_no')->nullable();
            $table->unsignedBigInteger('book_id')->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
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
        Schema::dropIfExists('book_serials');
    }
}
