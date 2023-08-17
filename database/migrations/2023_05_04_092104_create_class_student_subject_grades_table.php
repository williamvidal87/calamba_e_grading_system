<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassStudentSubjectGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_student_subject_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('class_student_id')->nullable();
            $table->unsignedBigInteger('class_subject_id')->nullable();
            $table->string('first_quarter')->nullable();
            $table->string('second_quarter')->nullable();
            $table->string('third_quarter')->nullable();
            $table->string('fourth_quarter')->nullable();
            
            $table->foreign('class_id')->references('id')->on('myclasses');
            $table->foreign('class_student_id')->references('id')->on('class_students');
            $table->foreign('class_subject_id')->references('id')->on('class_subjects');
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
        Schema::dropIfExists('class_student_subject_grades');
    }
}
