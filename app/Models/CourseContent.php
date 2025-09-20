<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    protected $fillable = ['course_id', 'title', 'video_url', 'order'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    public function progress()
    {
        return $this->hasMany(CourseContentProgress::class);
    }

    // CourseContent.php
    public function videos()
    {
        return $this->hasMany(Video::class, 'course_content_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'course_content_id');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'course_content_id');
    }
}
