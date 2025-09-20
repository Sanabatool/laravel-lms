<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Review;



class PaymentController extends Controller
{

   public function show(Course $course)
{
    // Refresh the model instance and eager load relationships
    $course = Course::with(['reviews.user', 'enrollments'])->find($course->id);
    //dd($course);
    
    // Debug the loaded data
    logger()->debug('Course Data', [
        'course_id' => $course->id,
        'reviews' => $course->reviews->toArray(),
        'enrollments' => $course->enrollments->count()
    ]);
    
    return view('coursedetail', [
        'course' => $course,
        'enrolledCount' => $course->enrollments->count(),
        'reviews' => $course->reviews
    ]);
}



    public function paymentForm(Course $course)
    {
        $user = Auth::user();

        return view('payment.form', compact('course', 'user'));
    }

    public function process(Request $request, Course $course)
    {
        $user = Auth::user();

        // Prevent duplicate enrollments
        if ($course->enrollments()->where('user_id', $user->id)->exists()) {
            return redirect()->route('student.dashboard')->with('info', 'You are already enrolled in this course.');
        }

        // ✅ Placeholder for real payment validation
        // For now, assume payment is successful
        // Later: verify via Stripe/PayPal API

        // Save enrollment only after payment
        Enrollment::create([
            'course_id' => $course->id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Payment successful. You are now enrolled in ' . $course->name);
    }

    public function submitReview(Request $request, $courseId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to submit a review.');
        }
        //one user can submit only one review
        $existing = Review::where('user_id', Auth::id())->where('course_id', $courseId)->first();

        if ($existing) {
            return back()->with('info', 'You have already reviewed this course.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'course_id' => $courseId,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }
}
