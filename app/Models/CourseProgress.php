<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseProgress extends Model
{
    protected $table = 'newcourseprogress';
    protected $fillable = [
        'enrollment_id',
        'video_id',
        'document_id',
        'quiz_id',
        'video_completed',
        'document_downloaded',
        'quiz_attempted',
        'quiz_score',
        'passed' // boolean: if quiz score ≥ 75%
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}
