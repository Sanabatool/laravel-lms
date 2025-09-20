<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['course_id', 'name'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function isCompletedBy($enrollmentId)
    {
        $totalItems = $this->videos->count() + $this->documents->count() + $this->quizzes->count();

        $completedVideos = \App\Models\CourseProgress::where('enrollment_id', $enrollmentId)
            ->whereIn('video_id', $this->videos->pluck('id'))
            ->where('video_completed', true)
            ->count();

        $downloadedDocs = \App\Models\CourseProgress::where('enrollment_id', $enrollmentId)
            ->whereIn('document_id', $this->documents->pluck('id'))
            ->where('document_downloaded', true)
            ->count();

        $attemptedQuizzes = \App\Models\CourseProgress::where('enrollment_id', $enrollmentId)
            ->whereIn('quiz_id', $this->quizzes->pluck('id'))
            ->where('quiz_attempted', true)
            ->where('passed', true) // ✅ only if passed!
            ->count();

        $completedItems = $completedVideos + $downloadedDocs + $attemptedQuizzes;

        return $totalItems > 0 && $totalItems == $completedItems;
    }

    public function progress($enrollmentId)
    {
        $totalItems = $this->videos->count() + $this->documents->count() + $this->quizzes->count();
        if ($totalItems === 0) {
            return 0;
        }

        $completedVideos = \App\Models\CourseProgress::where('enrollment_id', $enrollmentId)
            ->whereIn('video_id', $this->videos->pluck('id'))
            ->where('video_completed', true)
            ->count();

        $downloadedDocs = \App\Models\CourseProgress::where('enrollment_id', $enrollmentId)
            ->whereIn('document_id', $this->documents->pluck('id'))
            ->where('document_downloaded', true)
            ->count();

        $attemptedQuizzes = \App\Models\CourseProgress::where('enrollment_id', $enrollmentId)
            ->whereIn('quiz_id', $this->quizzes->pluck('id'))
            ->where('quiz_attempted', true)
            ->where('passed', true)
            ->count();

        $completedItems = $completedVideos + $downloadedDocs + $attemptedQuizzes;

        return round(($completedItems / $totalItems) * 100);
    }
}
