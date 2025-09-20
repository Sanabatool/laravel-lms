<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateCourseProgressTableStructure extends Migration
{
    public function up()
    {
        Schema::table('course_progress', function (Blueprint $table) {
            // Safely drop foreign key only if it exists
            if (Schema::hasColumn('course_progress', 'course_content_id')) {
                // Try to drop the FK safely via raw SQL (fallback)
                try {
                    DB::statement('ALTER TABLE course_progress DROP FOREIGN KEY course_progress_course_content_id_foreign');
                } catch (\Exception $e) {
                    // Foreign key does not exist or already dropped; just ignore
                }

                // Now drop the column
                $table->dropColumn('course_content_id');
            }

            // Add new nullable foreign keys
            $table->unsignedBigInteger('video_id')->nullable()->after('enrollment_id');
            $table->unsignedBigInteger('document_id')->nullable()->after('video_id');
            $table->unsignedBigInteger('quiz_id')->nullable()->after('document_id');

            // Add progress columns
            $table->boolean('video_completed')->default(false)->after('quiz_id');
            $table->boolean('document_downloaded')->default(false)->after('video_completed');
            $table->boolean('quiz_attempted')->default(false)->after('document_downloaded');
        });
    }

    public function down()
    {
        Schema::table('course_progress', function (Blueprint $table) {
            $table->dropColumn(['video_id', 'document_id', 'quiz_id']);
            $table->dropColumn(['video_completed', 'document_downloaded', 'quiz_attempted']);

            $table->unsignedBigInteger('course_content_id')->nullable();
            // You can add back the foreign key here if needed
            // $table->foreign('course_content_id')->references('id')->on('course_contents')->onDelete('cascade');
        });
    }
}
