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
        Schema::table('course_content_progress', function (Blueprint $table) {
            $table->boolean('video_completed')->default(false);
            $table->boolean('document_downloaded')->default(false);
            $table->boolean('quiz_attempted')->default(false);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_content_progress', function (Blueprint $table) {
            //
        });
    }
};
