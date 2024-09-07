<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('e_title');
            $table->text('e_description');
            $table->string('slider1_image')->nullable();
            $table->string('slider2_image')->nullable();
            $table->string('slider3_image')->nullable();
            $table->string('e_date');
            $table->string('e_stime');
            $table->string('e_etime');
            $table->string('e_location');

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
        Schema::dropIfExists('news');
    }
}
