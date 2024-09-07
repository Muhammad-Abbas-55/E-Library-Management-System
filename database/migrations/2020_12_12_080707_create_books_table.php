<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('b_title');
            $table->string('b_edition');
            $table->string('b_price');
            $table->string('b_isbn');
            $table->text('description');
            $table->string('length');
            $table->string('p_date');
            $table->string('total_copies');
            $table->string('avalible_copies');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('b_image')->nullable();
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
        Schema::dropIfExists('books');
    }
}
