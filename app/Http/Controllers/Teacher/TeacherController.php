<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $trainerName = Auth::user()->name;
        $courses = Course::where('trainer', $trainerName)->get();
        return view('teacher.dashboard', compact('courses'));
    }

    public function create()
    {
        $packages = Package::all();
        // Only pass trainer name, teachers don’t need to pick package like admins
        $trainerName = Auth::user()->name;
        return view('teacher.courses_create', compact('packages','trainerName'));
    }

    public function store(Request $request)
    {
        // \Log::info('Request all:', $request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'package_id' => 'required|exists:packages,id',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'required|string|max:255',
            'price' => 'required|numeric',
            'modules' => 'sometimes|array',
            'modules.*.videos' => 'sometimes|array',
             'modules.*.videos.*.file' => 'sometimes|file|mimes:mp4,avi,mkv|max:102400',  //equals 100 MB
            'modules.*.documents.*.file' => 'sometimes|file|mimes:pdf,docx,pptx|max:5120', // 5 MB max
            'modules.*.quizzes' => 'sometimes|array',
            'modules.*.quizzes.*.title' => 'sometimes|string|max:255',
        ]);

        try {
            // Store course image
            $imagePath = $request->file('image')->store('course_images', 'public');

            // Create course
            $course = Course::create([
                'name' => $validated['name'],
                'package_id' => $validated['package_id'],
                'description' => $validated['description'],
                'image' => $imagePath,
                'trainer' => Auth::user()->name,
                'trainer_id' => Auth::id(),
                'duration' => $validated['duration'],
                'price' => $validated['price'],
            ]);

            // Handle modules if they exist
            if ($request->has('modules')) {
                foreach ($request->modules as $moduleIndex => $moduleData) {
                    $module = $course->modules()->create([
                        'name' => 'Module ' . ($moduleIndex + 1),
                    ]);

                    // Handle videos
                    if (!empty($moduleData['videos'])) {
                        foreach ($moduleData['videos'] as $videoData) {
                            if (!empty($videoData['file'])) {
                                $videoPath = $videoData['file']->store('course_videos', 'public');
                                $module->videos()->create(['file_path' => $videoPath]);
                            }
                        }
                    }

                    // Handle documents
                    if (!empty($moduleData['documents'])) {
                        foreach ($moduleData['documents'] as $documentData) {
                            if (isset($documentData['file'])) {
                                $path = $documentData['file']->store("documents/course_{$course->id}/module_{$module->id}", 'public');
                                $module->documents()->create([
                                    'file_path' => $path,
                                    'title' => $documentData['file']->getClientOriginalName()
                                ]);
                            }
                        }
                    }

                    // Handle quizzes
                    if (!empty($moduleData['quizzes'])) {
                        foreach ($moduleData['quizzes'] as $quizData) {
                            $quiz = $module->quizzes()->create([
                                'title' => $quizData['title'] ?? ''
                            ]);

                            if (isset($quizData['questions']) && is_array($quizData['questions'])) {
                                foreach ($quizData['questions'] as $questionData) {
                                    $question = $quiz->questions()->updateOrCreate(
                                        ['id' => $questionData['id'] ?? null],
                                        ['title' => $questionData['title'] ?? '']
                                    );

                                    if (isset($questionData['options']) && is_array($questionData['options'])) {
                                        foreach ($questionData['options'] as $optionData) {
                                            $question->options()->updateOrCreate(
                                                ['id' => $optionData['id'] ?? null],
                                                [
                                                    'text' => $optionData['text'] ?? '',
                                                    'is_correct' => isset($optionData['is_correct'])
                                                ]
                                            );
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            return redirect()->route('teacher.dashboard')->with('success', 'Course created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error creating course: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $course = Course::with(['modules.videos', 'modules.documents', 'modules.quizzes'])
                ->findOrFail($id);
            $packages = Package::all();
            return view('teacher.courses_edit', compact('course', 'packages'));
        } catch (\Exception $e) {
            return redirect()->route('teacher.dashboard')->with('error', 'Course not found.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $course = Course::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'package_id' => 'required|exists:packages,id',
                'description' => 'required|string',
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
                'trainer' => 'required|string|max:255',
                'duration' => 'required|string|max:255',
                'price' => 'required|numeric',
                'modules' => 'sometimes|array',
                'modules.*.id' => 'sometimes|exists:modules,id',
                'modules.*.videos' => 'sometimes|array',
                'modules.*.videos.*.id' => 'sometimes|exists:videos,id',
                'modules.*.videos.*.file' => 'sometimes|file|mimes:mp4,avi,mkv|max:102400',
                'modules.*.documents' => 'sometimes|array',
                'modules.*.documents.*.id' => 'sometimes|exists:documents,id',
                'modules.*.quizzes' => 'sometimes|array',
                'modules.*.quizzes.*.id' => 'sometimes|exists:quizzes,id',
                'modules.*.quizzes.*.title' => 'sometimes|string|max:255',
                'deleted_modules' => 'sometimes|array',
                'deleted_modules.*' => 'sometimes|exists:modules,id',
            ]);

            // Update basic course info
            $course->update([
                'name' => $validated['name'],
                'package_id' => $validated['package_id'],
                'description' => $validated['description'],
                'trainer' => $validated['trainer'],
                'duration' => $validated['duration'],
                'price' => $validated['price'],
            ]);

            // Update image if provided
            if ($request->hasFile('image')) {
                // Delete old image
                if (Storage::exists('public/' . $course->image)) {
                    Storage::delete('public/' . $course->image);
                }
                $imagePath = $request->file('image')->store('course_images', 'public');
                $course->update(['image' => $imagePath]);
            }

            // Handle modules
            if ($request->has('modules')) {
                foreach ($request->modules as $moduleIndex => $moduleData) {
                    $module = $course->modules()->updateOrCreate(
                        ['id' => $moduleData['id'] ?? null],
                        ['name' => 'Module ' . ($moduleIndex + 1)]
                    );

                    // Handle videos
                    if (isset($moduleData['videos'])) {
                        foreach ($moduleData['videos'] as $videoData) {
                            $video = $module->videos()->updateOrCreate(
                                ['id' => $videoData['id'] ?? null],
                                []
                            );

                            if (isset($videoData['file'])) {
                                // Delete old video if exists
                                if ($video->file_path && Storage::exists('public/' . $video->file_path)) {
                                    Storage::delete('public/' . $video->file_path);
                                }
                                $videoPath = $videoData['file']->store('course_videos', 'public');
                                $video->update(['file_path' => $videoPath]);
                            }
                        }
                    }

                    // Handle documents
                    if (isset($moduleData['documents'])) {
                        foreach ($moduleData['documents'] as $docData) {
                            $document = $module->documents()->updateOrCreate(
                                ['id' => $docData['id'] ?? null],
                                [
                                    'title' => isset($docData['file']) ? $docData['file']->getClientOriginalName() : ($docData['title'] ?? '')
                                ]
                            );

                            if (isset($docData['file'])) {
                                // Delete old file if exists
                                if ($document->file_path && Storage::exists('public/' . $document->file_path)) {
                                    Storage::delete('public/' . $document->file_path);
                                }


                                $path = $docData['file']->store("documents/course_{$course->id}/module_{$module->id}", 'public');
                                $document->update(['file_path' => $path]);
                            }
                        }
                    }

                    // Handle quizzes
                    if (isset($moduleData['quizzes'])) {
                        foreach ($moduleData['quizzes'] as $quizData) {
                            $quiz = $module->quizzes()->updateOrCreate(
                                ['id' => $quizData['id'] ?? null],
                                ['title' => $quizData['title'] ?? '']
                            );

                            if (!empty($quizData['questions'])) {
                                foreach ($quizData['questions'] as $questionData) {
                                    $question = $quiz->questions()->updateOrCreate(
                                        ['id' => $questionData['id'] ?? null],
                                        ['title' => $questionData['title'] ?? '']
                                    );

                                    if (!empty($questionData['options'])) {
                                        foreach ($questionData['options'] as $optionData) {
                                            $question->options()->updateOrCreate(
                                                ['id' => $optionData['id'] ?? null],
                                                [
                                                    'text' => $optionData['text'],
                                                    'is_correct' => isset($optionData['is_correct'])
                                                ]
                                            );
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            // Handle module deletions
            if ($request->filled('deleted_modules')) {
                $deleted = explode(',', $request->input('deleted_modules'));
                foreach ($deleted as $moduleId) {
                    $module = $course->modules()->find($moduleId);
                    if ($module) {
                        foreach ($module->videos as $video) {
                            if (Storage::exists('public/' . $video->file_path)) {
                                Storage::delete('public/' . $video->file_path);
                            }
                        }
                        foreach ($module->documents as $doc) {
                            if (Storage::exists('public/' . $doc->file_path)) {
                                Storage::delete('public/' . $doc->file_path);
                            }
                        }
                        $module->delete();
                    }
                }
            }


            return redirect()->route('teacher.dashboard')->with('success', 'Course updated successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error updating course: ' . $e->getMessage());
        }
    }

     public function destroy($id)
    {
        try {
            $course = Course::findOrFail($id);

            // Delete associated files
            if (Storage::exists('public/' . $course->image)) {
                Storage::delete('public/' . $course->image);
            }

            foreach ($course->modules as $module) {
                foreach ($module->videos as $video) {
                    if (Storage::exists('public/' . $video->file_path)) {
                        Storage::delete('public/' . $video->file_path);
                    }
                }
                foreach ($module->documents as $doc) {
                    if (Storage::exists('public/' . $doc->file_path)) {
                        Storage::delete('public/' . $doc->file_path);
                    }
                }
                $module->delete();
            }

            $course->delete();

            return redirect()->route('teacher.dashboard')->with('success', 'Course deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('teacher.dashboard')->with('error', 'Error deleting course: ' . $e->getMessage());
        }
    }
}
