<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',  // Foreign key to associate with courses
        'user_id',    // Foreign key to associate with users
        'progress',     // <-- add this
        'completed',
        // 'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function progressLogs()
    {
        return $this->hasMany(CourseContentProgress::class);
    }

    public function contentProgress()
    {
        return $this->hasMany(CourseContentProgress::class);
    }
}
