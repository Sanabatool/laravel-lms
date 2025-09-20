<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            // Drop old fields
            $table->dropColumn(['objectives', 'target_audience', 'price']);

            // Add new fields
            $table->string('trainer')->after('description');
            $table->string('duration')->after('trainer');
            $table->string('content_type')->after('duration');
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            // Revert changes: Add dropped fields back
            $table->text('objectives')->nullable();
            $table->string('target_audience')->nullable();
            $table->decimal('price', 8, 2)->nullable();

            // Drop newly added fields
            $table->dropColumn(['trainer', 'duration', 'content_type']);
        });
    }
}
