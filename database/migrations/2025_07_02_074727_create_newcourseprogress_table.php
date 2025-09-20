<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('newcourseprogress', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('enrollment_id');
        $table->unsignedBigInteger('video_id')->nullable();
        $table->unsignedBigInteger('document_id')->nullable();
        $table->unsignedBigInteger('quiz_id')->nullable();

        $table->boolean('video_completed')->default(false);
        $table->boolean('document_downloaded')->default(false);
        $table->boolean('quiz_attempted')->default(false);

        $table->timestamps();

        $table->foreign('enrollment_id')->references('id')->on('enrollments')->onDelete('cascade');
        $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
        $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
        $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
    });
}

public function down()
{
   
}

};
