<?php

namespace App\Http\Controllers;

use App\Models\Course;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('welcome', compact('courses'));
    }
    public function about()
    {
        return view('about'); // make sure you have resources/views/about.blade.php
    }
    public function Contactus()
    {
        return view('Contactus'); // make sure you have resources/views/Contactus.blade.php
    }
    public function marketplace()
    {
        return view('marketplace'); // make sure you have resources/views/marketplace.blade.php
    }
    public function coursedetails($id)
    {
        $course = Course::findOrFail($id);

        $reviews = $course->reviews ?? collect();
        $enrolledCount = $course->enrollments()->count() ?? 0;

        return view('course-details', compact('course', 'reviews', 'enrolledCount'));
    }
}
