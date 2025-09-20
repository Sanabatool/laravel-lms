<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Review
 *
 * @property int $id
 * @property int $user_id
 * @property int $course_id
 * @property int $rating
 * @property string|null $comment
 * @property \App\Models\User $user
 * @property \App\Models\Course $course
 */
class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'course_id', 'rating', 'comment'];

    // Review.php
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
