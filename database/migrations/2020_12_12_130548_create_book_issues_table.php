<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_issues', function (Blueprint $table) {
            $table->id();
            $table->date('issue_date');
            $table->date('return_date');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->unsignedBigInteger('serial_id')->nullable();
            $table->unsignedBigInteger('book_id');
            $table->string('return_status')->default('0');
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('serial_id')->references('id')->on('book_serials')->onDelete('cascade');
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_issues');
    }
}
