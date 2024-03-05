<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name')->unique('courses','course_name');
            $table->enum('course_schedule',['morning','evening','afternoon']);
            $table->longText('course_desc');
            $table->string('course_logo');
            $table->string('course_slug')->unique('course_slug');
            $table->date('course_startdate');
            $table->date('course_enddate');
            $table->unsignedBigInteger('coursecategory_id');
            $table->foreign('coursecategory_id')->references('id')->on('coursecategories');
            $table->integer('course_fee');
            $table->string('course_pdf');
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams');
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
        Schema::dropIfExists('courses');
    }
};
