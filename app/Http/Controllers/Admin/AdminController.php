<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();

        // Pass the data to the view
        return view('admin.user', compact('users'));
    }

    public function destroy($id)
    {
        // Find the user by ID and delete it
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect back to the dashboard with a success message
        return redirect()->route('admin.user')->with('success', 'User deleted successfully!');
    }

    public function edit($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Pass the user data to the edit view
        return view('admin.user_edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Redirect back to the dashboard with a success message
        return redirect()->route('admin.user')->with('success', 'User updated successfully!');
    }


    public function dashboard()
    {
        // Course enrollments for existing chart
        $courseEnrollments = Course::withCount('enrollments')->get();
        $courseNames = $courseEnrollments->pluck('name');
        $enrollmentCounts = $courseEnrollments->pluck('enrollments_count');

        // Ratings and reviews data
        $ratingData = Course::withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->get(['id', 'name']);

        $ratingCourseNames = $ratingData->pluck('name');
        $averageRatings = $ratingData->pluck('reviews_avg_rating')->map(fn($rating) => round($rating, 2));
        $reviewCounts = $ratingData->pluck('reviews_count');

        // 🔹 Trainers and their course counts
        $trainerCourses = Course::select('trainer', DB::raw('COUNT(*) as total_courses'))
            ->groupBy('trainer')
            ->get();

        $trainerNames = $trainerCourses->pluck('trainer');
        $trainerCounts = $trainerCourses->pluck('total_courses');

        return view('admin.dashboard', compact(
            'courseNames',
            'enrollmentCounts',
            'ratingCourseNames',
            'averageRatings',
            'reviewCounts',
            'trainerNames',
            'trainerCounts'
        ));
    }
}
