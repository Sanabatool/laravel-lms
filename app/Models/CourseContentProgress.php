<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseContentProgress extends Model
{
    protected $fillable = ['enrollment_id', 'course_content_id', 'is_completed'];

    public function enrollment() {
        return $this->belongsTo(Enrollment::class);
    }

    public function courseContent() {
        return $this->belongsTo(CourseContent::class);
    }
}

