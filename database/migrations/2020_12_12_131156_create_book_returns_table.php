<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_returns', function (Blueprint $table) {
            $table->id();
            $table->date('return_date')->nullable();
            $table->string('status')->nullable();
            $table->string('lose')->nullable();
            $table->unsignedBigInteger('issue_id');
            $table->unsignedBigInteger('fine_id')->nullable();
            $table->string('fine')->nullable();
            
            $table->timestamps();

            $table->foreign('issue_id')->references('id')->on('book_issues')->onDelete('cascade');
            $table->foreign('fine_id')->references('id')->on('fines')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_returns');
    }
}
