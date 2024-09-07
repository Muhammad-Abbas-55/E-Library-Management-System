<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('instructure')->nullable();
            $table->string('edition')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->date('p_date')->nullable();
            $table->string('inst')->nullable();
            $table->string('pdfbook')->nullable();
            $table->string('audiobook')->nullable();
            $table->string('magazine')->nullable();
            $table->string('videobook')->nullable();
            $table->string('papers')->nullable();
            $table->timestamps();

            
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ebooks');
    }
}
