<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuizScoreAndPassedToNewcourseprogressTable extends Migration
{
    public function up()
    {
        Schema::table('newcourseprogress', function (Blueprint $table) {
            $table->integer('quiz_score')->nullable()->after('quiz_attempted');
            $table->boolean('passed')->default(false)->after('quiz_score');
        });
    }

    public function down()
    {
        Schema::table('newcourseprogress', function (Blueprint $table) {
            $table->dropColumn('quiz_score');
            $table->dropColumn('passed');
        });
    }
}
