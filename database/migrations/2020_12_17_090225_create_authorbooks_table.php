<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorbooks', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('auther_id')->nullable();
            $table->unsignedBigInteger('book_id')->nullable();
            $table->unsignedBigInteger('ebook_id')->nullable();
            $table->timestamps();
            $table->foreign('auther_id')->references('id')->on('authers')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('ebook_id')->references('id')->on('ebooks')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authorbooks');
    }
}
