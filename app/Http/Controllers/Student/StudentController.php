<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\CourseContent;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\CourseProgress;


class StudentController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $enrollments = $user->enrollments()->with('course')->get();

        $inProgress = [];
        $completed = [];

        foreach ($enrollments as $enrollment) {
            if ($enrollment->completed) {
                $completed[] = [
                    'course' => $enrollment->course,
                    'enrollment_id' => $enrollment->id,
                ];
            } else {
                $inProgress[] = [
                    'course' => $enrollment->course,
                    'progress' => $enrollment->progress,
                    'enrollment_id' => $enrollment->id,
                ];
            }
        }


        return view('student.dashboard', [
            'inProgress' => $inProgress,
            'completed' => $completed,
        ]);
    }

    public function learn($enrollmentId)
    {
        $enrollment = Enrollment::with('course.modules')->findOrFail($enrollmentId);

        if ($enrollment->user_id != Auth::id()) {
            abort(403, 'Unauthorized.');
        }

        return view('student.learncourse', [
            'enrollment' => $enrollment,
            'modules' => $enrollment->course->modules,
            'activeModule' => null
        ]);
    }


    public function learnContent($enrollmentId, $contentId)
    {
        $enrollment = Enrollment::with(['course.contents' => function ($query) {
            $query->orderBy('order');
        }])->findOrFail($enrollmentId);

        // Verify ownership
        if ($enrollment->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Verify course exists
        if (!$enrollment->course) {
            abort(404, 'Course not found.');
        }

        $activeContent = CourseContent::with(['videos', 'documents', 'quizzes'])
            ->where('id', $contentId)
            ->where('course_id', $enrollment->course_id)
            ->firstOrFail();


        // Get all contents with completion status
        $contents = $enrollment->course->contents->map(function ($content) use ($enrollmentId) {
            $videoIds = $content->videos->pluck('id')->toArray();
            $docIds = $content->documents->pluck('id')->toArray();
            $quizIds = $content->quizzes->pluck('id')->toArray();

            $completedVideos = \App\Models\CourseProgress::where('enrollment_id', $enrollmentId)
                ->whereIn('video_id', $videoIds)
                ->where('video_completed', true)
                ->count();

            $downloadedDocs = \App\Models\CourseProgress::where('enrollment_id', $enrollmentId)
                ->whereIn('document_id', $docIds)
                ->where('document_downloaded', true)
                ->count();

            $attemptedQuizzes = \App\Models\CourseProgress::where('enrollment_id', $enrollmentId)
                ->whereIn('quiz_id', $quizIds)
                ->where('quiz_attempted', true)
                ->count();

            $totalItems = count($videoIds) + count($docIds) + count($quizIds);
            $completedItems = $completedVideos + $downloadedDocs + $attemptedQuizzes;

            $content->completed = $totalItems > 0 && $completedItems == $totalItems;
            return $content;
        });


        // Find current index
        $currentIndex = $contents->search(function ($item) use ($contentId) {
            return $item->id == $contentId;
        });

        // Handle cases where content might not be found
        if ($currentIndex === false) {
            abort(404, 'Content not found in this course.');
        }

        $previousContent = ($currentIndex > 0) ? $contents[$currentIndex - 1] : null;
        $nextContent = ($currentIndex < $contents->count() - 1) ? $contents[$currentIndex + 1] : null;

        // If next content is completed, find the first incomplete content after current
        if ($nextContent && $nextContent->completed) {
            $nextContent = $contents->slice($currentIndex + 1)->firstWhere('completed', false);
        }

        if ($contents->isEmpty()) {
            return view('student.learncourse', [
                'enrollment' => $enrollment,
                'contents' => $contents,
                'activeContent' => null,
                'previousContent' => null,
                'nextContent' => null
            ])->with('info', 'This course has no content yet.');
        }

        return view('student.learncourse', [
            'enrollment' => $enrollment,
            'contents' => $contents,
            'activeContent' => $activeContent,
            'previousContent' => $previousContent,
            'nextContent' => $nextContent
        ]);
    }

    public function learnModule($enrollmentId, $moduleId)
    {
        $enrollment = Enrollment::with('course.modules')->findOrFail($enrollmentId);

        if ($enrollment->user_id != Auth::id()) {
            abort(403, 'Unauthorized.');
        }

        $module = Module::with(['videos', 'documents', 'quizzes'])
            ->where('id', $moduleId)
            ->where('course_id', $enrollment->course_id)
            ->firstOrFail();

        return view('student.learncourse', [
            'enrollment' => $enrollment,
            'modules' => $enrollment->course->modules,
            'activeModule' => $module
        ]);
    }

    public function markVideoComplete($enrollmentId, $videoId)
    {
        $enrollment = Enrollment::findOrFail($enrollmentId);
        $this->authorizeEnrollment($enrollment);

        \App\Models\CourseProgress::updateOrCreate(
            ['enrollment_id' => $enrollmentId, 'video_id' => $videoId],
            ['video_completed' => true]
        );

        $this->updateEnrollmentProgress($enrollmentId);

        return response()->json(['message' => 'Video marked as completed']);
    }

    public function markDocumentDownloaded($enrollmentId, $documentId)
    {
        $enrollment = Enrollment::findOrFail($enrollmentId);
        $this->authorizeEnrollment($enrollment);

        \App\Models\CourseProgress::updateOrCreate(
            ['enrollment_id' => $enrollmentId, 'document_id' => $documentId],
            ['document_downloaded' => true]
        );

        $this->updateEnrollmentProgress($enrollmentId);

        return response()->json(['message' => 'Document marked as downloaded']);
    }

    private function authorizeEnrollment($enrollment)
    {
        if ($enrollment->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }

    private function updateEnrollmentProgress($enrollmentId)
    {
        $enrollment = Enrollment::with('course.modules.videos', 'course.modules.documents', 'course.modules.quizzes')->findOrFail($enrollmentId);
        $course = $enrollment->course;

        $totalVideos = $course->modules->flatMap(function ($module) {
            return $module->videos;
        })->count();

        $totalDocs = $course->modules->flatMap(function ($module) {
            return $module->documents;
        })->count();

        $totalQuizzes = $course->modules->flatMap(function ($module) {
            return $module->quizzes;
        })->count();

        $totalItems = $totalVideos + $totalDocs + $totalQuizzes;

        $completedVideos = \App\Models\CourseProgress::where('enrollment_id', $enrollmentId)
            ->where('video_completed', true)
            ->count();

        $downloadedDocs = \App\Models\CourseProgress::where('enrollment_id', $enrollmentId)
            ->where('document_downloaded', true)
            ->count();

        $attemptedQuizzes = \App\Models\CourseProgress::where('enrollment_id', $enrollmentId)
            ->where('quiz_attempted', true)
            ->count();

        $completedItems = $completedVideos + $downloadedDocs + $attemptedQuizzes;

        $progress = $totalItems > 0 ? round(($completedItems / $totalItems) * 100) : 0;

        $enrollment->update([
            'progress' => $progress,
            'completed' => $progress == 100
        ]);
    }


    public function downloadDocument($enrollmentId, $docId)
    {
        $enrollment = Enrollment::findOrFail($enrollmentId);

        if ($enrollment->user_id != Auth::id()) {
            abort(403);
        }

        $document = \App\Models\Document::findOrFail($docId);

        return response()->download(storage_path('app/public/' . $document->file_path));
    }

    public function finishCourse($enrollmentId)
    {
        $enrollment = Enrollment::findOrFail($enrollmentId);

        if ($enrollment->user_id !== Auth::id()) {
            abort(403);
        }

        if ($enrollment->progress < 100) {
            return back()->with('error', 'Please complete all content before finishing the course.');
        }

        $enrollment->update([
            'completed' => 1,
            'completed_at' => now(), // saves exact completion date
        ]);


        return redirect()->route('student.dashboard')->with('success', 'Course marked as completed!');
    }


    public function startQuiz($enrollmentId, $quizId)
    {
        $enrollment = Enrollment::findOrFail($enrollmentId);
        $this->authorizeEnrollment($enrollment);

        $quiz = Quiz::with('questions')->findOrFail($quizId);

        return view('student.quiz', compact('quiz', 'enrollment'));
    }

    public function submitQuiz(Request $request, $enrollmentId, $quizId)
    {
        $quiz = Quiz::with('questions.options')->findOrFail($quizId);
        $enrollment = Enrollment::findOrFail($enrollmentId);
        $this->authorizeEnrollment($enrollment);

        $correct = 0;
        $total = $quiz->questions->count();

        foreach ($quiz->questions as $question) {
            $selectedOptionId = $request->input('question_' . $question->id);

            if ($selectedOptionId) {
                $selectedOption = $question->options->where('id', $selectedOptionId)->first();
                if ($selectedOption && $selectedOption->is_correct) {
                    $correct++;
                }
            }
        }

        $score = round(($correct / max($total, 1)) * 100);
        $passed = $score >= 75;

        \App\Models\CourseProgress::updateOrCreate(
            ['enrollment_id' => $enrollment->id, 'quiz_id' => $quiz->id],
            [
                'quiz_attempted' => true,
                'quiz_score' => $score,
                'passed' => $passed
            ]
        );

        $this->updateEnrollmentProgress($enrollmentId);

        return redirect()->route('student.learn.module', [
            'enrollment' => $enrollmentId,
            'module' => $quiz->module_id
        ])->with('success', "Quiz submitted. You scored {$score}% " . ($passed ? "(Passed)" : "(Failed. Try again)"));
    }

// voice assistant
    public function voiceassistant()
    {
        return view('student.voiceassistant');
    }
    
      public function voicetoassignment()
    {
        return view('student.voicetoassignment');
    }
}
