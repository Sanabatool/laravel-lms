<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCourseContentProgressTable extends Migration
{
    public function up()
{
    // Rename table
    Schema::rename('course_content_progress', 'course_progress');

    // Modify columns AFTER removing foreign key
    Schema::table('course_progress', function (Blueprint $table) {
        // Drop foreign key constraint before dropping the column
        $table->dropForeign(['course_content_id']);

        // Now drop the column
        $table->dropColumn('course_content_id');

        // Add new structure
        $table->boolean('completed')->default(false)->change();
        $table->unsignedBigInteger('video_id')->nullable()->after('enrollment_id');
        $table->unsignedBigInteger('document_id')->nullable()->after('video_id');
        $table->unsignedBigInteger('quiz_id')->nullable()->after('document_id');
    });
}


    public function down()
    {
        // Revert changes if needed
        Schema::table('course_progress', function (Blueprint $table) {
            $table->dropColumn(['video_id', 'document_id', 'quiz_id']);
            $table->unsignedBigInteger('course_content_id')->nullable();
        });

        Schema::rename('course_progress', 'course_content_progress');
    }
}

