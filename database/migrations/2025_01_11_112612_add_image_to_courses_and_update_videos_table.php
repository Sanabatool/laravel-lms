<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('image')->nullable()->after('description'); // Add image column
        });
    
        Schema::table('videos', function (Blueprint $table) {
            $table->string('file_path')->nullable()->after('module_id'); // Add file_path for videos
            $table->dropColumn('url'); // Optional: Drop the URL column if no longer needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('file_path');
            $table->string('url')->nullable(); // Revert to URL column if needed
        });
    }
};
