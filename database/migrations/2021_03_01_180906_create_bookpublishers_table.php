<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookpublishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookpublishers', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->unsignedBigInteger('book_id')->nullable();
            $table->unsignedBigInteger('ebook_id')->nullable();
            $table->timestamps();
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
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
        Schema::dropIfExists('bookpublishers');
    }
}
