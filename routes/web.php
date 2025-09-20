<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Student\EnrollmentController;


Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/about', [WelcomeController::class, 'about'])->name('about');
Route::get('/Contactus', [WelcomeController::class, 'Contactus'])->name('Contactus');
Route::get('/marketplace', [WelcomeController::class, 'marketplace'])->name('marketplace');
Route::get('/course-details/{id}', [WelcomeController::class, 'coursedetails'])->name('course-details');


// Course viewing and payment
Route::get('/course/{course}', [PaymentController::class, 'show'])->name('user.course.show');
Route::get('/course/{course}/payment', [PaymentController::class, 'paymentForm'])->name('user.course.payment');
Route::post('/course/{course}/payment', [PaymentController::class, 'process'])->name('payment.process');


Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');

Route::get('login', function () {
    if (session()->has('user_role')) {
        $role = session('user_role');
        if ($role == 1) return redirect()->route('admin.dashboard');
        if ($role == 2) return redirect()->route('teacher.dashboard');
        if ($role == 3) return redirect()->route('student.dashboard');
    }
    return view('auth.login');
})->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');


Route::middleware('auth')->group(function () {

    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware(\App\Http\Middleware\RoleMiddleware::class . ':1'); // Admin role middleware
    // Admin User Route
    Route::get('admin/user', [AdminController::class, 'index'])->name('admin.user');
    Route::delete('admin/user/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('admin/user/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('admin/user/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('admin/packages', PackageController::class)->names([
        'index' => 'admin.packages.index',
        'create' => 'admin.packages.create',
        'store' => 'admin.packages.store',
        'show' => 'packages.view',
        'edit' => 'packages.modify',
        'update' => 'packages.update',
        'destroy' => 'packages.delete',
    ]);
    Route::resource('admin/courses', CourseController::class)->names([
        'index' => 'admin.courses.index',
        'create' => 'admin.courses.create',
        'store' => 'admin.courses.store',
        'show' => 'courses.view',
        'edit' => 'courses.modify',
        'update' => 'admin.courses.update',
        'destroy' => 'courses.delete',
    ]);
    // User Routes (for course pages and enrollment)
    Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');



    // Review and Rating Routes
    Route::post('/courses/{course}/review', [PaymentController::class, 'submitReview'])->name('courses.review');


    // Payment Routes
    Route::get('/payment/{course}', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/payment/{course}', [PaymentController::class, 'process'])->name('payment.process');



Route::prefix('teacher')->middleware(\App\Http\Middleware\RoleMiddleware::class . ':2')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Teacher\TeacherController::class, 'index'])
        ->name('teacher.dashboard');

    Route::get('/courses/create', [TeacherController::class, 'create'])->name('teacher.courses.create');
    Route::post('/courses', [TeacherController::class, 'store'])->name('teacher.courses.store');
    Route::get('/courses/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.courses_edit');
    Route::put('/courses/{id}', [TeacherController::class, 'update'])->name('teacher.courses_update');

    Route::delete('courses/{id}', [TeacherController::class, 'destroy'])->name('teacher.courses-delete');

   

   
});



// --------------------------------------------------------------------------
   Route::get('student/dashboard', [StudentController::class, 'dashboard'])
    ->name('student.dashboard')
    ->middleware(\App\Http\Middleware\RoleMiddleware::class . ':3');
    
    // Enroll in a course
Route::post('student/enroll/{course}', [EnrollmentController::class, 'store'])
    ->name('enroll')
    ->middleware('auth'); // optional: also use role middleware

  // Mark content as completed
Route::post('/complete-content/{enrollment}/{content}', [StudentController::class, 'markContentComplete'])
    ->name('content.complete')
    ->middleware('auth');
    

    // Learn course (dashboard → course)
Route::get('student/learn/{enrollment}', [StudentController::class, 'learn'])
    ->name('student.learn')
    ->middleware('auth');

    // View specific content (like a lesson or video)
Route::get('/learn/{enrollment}/content/{content}', [StudentController::class, 'learnContent'])
    ->name('student.learn.content')
    ->middleware('auth');

Route::get('/student/learn/{enrollment}/module/{module}', [StudentController::class, 'learnModule'])->name('student.learn.module');

//==============================
Route::post('progress/video/{enrollment}/{video}', [StudentController::class, 'markVideoComplete'])->name('student.mark.video');
    Route::post('progress/document/{enrollment}/{document}', [StudentController::class, 'markDocumentDownloaded'])->name('student.mark.document');

    Route::get('student/download/{enrollment}/{doc}', [StudentController::class, 'downloadDocument'])
    ->name('student.download.doc')
    ->middleware(['auth']);


Route::post('/student/finish-course/{enrollment}', [StudentController::class, 'finishCourse'])->name('student.finishCourse');

Route::get('/student/enrollment/{enrollment}/quiz/{quiz}/start', [StudentController::class, 'startQuiz'])->name('quiz.start');
Route::post('/student/enrollment/{enrollment}/quiz/{quiz}/submit', [StudentController::class, 'submitQuiz'])->name('quiz.submit');

// Student Voice Assistant Page
Route::get('/student/voiceassistant', [StudentController::class, 'voiceassistant'])->name('student.voiceassistant');
Route::get('/student/voicetoassignment', [StudentController::class, 'voicetoassignment'])->name('student.voicetoassignment');


});

use App\Http\Controllers\CertificateController;

Route::get('/certificate/{enrollment}', [CertificateController::class, 'generate'])
    ->name('certificate.generate')
    ->middleware('auth');



Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//Route::post('/chatbot', [PythonController::class, 'handleQuery']);


// chatbot route
// Route::get('/chatbot', function () {
//     return redirect('http://localhost:5000');
// })->name('chatbot');

Route::get('/chatbot', function () {
    return view('chatbot');
})->name('chatbot');

// voice


