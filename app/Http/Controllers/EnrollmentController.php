<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{

    // Enroll in a course
    public function store(Course $course)
    {
        $user = Auth::user();

        if (!$user->courses->contains($course->id)) {
            $user->courses()->attach($course->id); // creates enrollment
        }

        return redirect()->route('dashboard')->with('success', 'Enrolled successfully!');
    }

    // Mark course as completed
    public function markComplete(Course $course)
    {
        $enrollment = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->first();

        if ($enrollment) {
            $enrollment->update([
                'progress' => 100,
                'completed' => true,
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Course marked as complete!');
    }
}
