<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShelfbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelfbooks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shelf_id')->nullable();
            $table->unsignedBigInteger('book_id');
            $table->timestamps();
            $table->foreign('shelf_id')->references('id')->on('shelves')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shelfbooks');
    }
}
