<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/stylead.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  
</head>
@push('styles')
<style>
.learning-container {
    display: flex;
    flex-direction: column;
    min-height: calc(100vh - 80px);
    background: linear-gradient(135deg, #f8f9fa, #eef3f8);
    padding: 10px;
    transition: background 0.5s ease-in-out;
}

/* -------- Course Header -------- */
.course-header {
    background: linear-gradient(90deg, #2c3e50, #34495e);
    color: white;
    padding: 25px;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    animation: fadeInDown 0.6s ease-in-out;
}

.course-header h1 {
    margin: 0;
    font-size: 28px;
    font-weight: bold;
    letter-spacing: 1px;
}

.progress-container {
    display: flex;
    align-items: center;
    margin-top: 15px;
}

.progress-bar {
    flex-grow: 1;
    height: 12px;
    background-color: #e9ecef;
    border-radius: 20px;
    margin-right: 10px;
    overflow: hidden;
    box-shadow: inset 0 2px 5px rgba(0,0,0,0.1);
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #28a745, #5cd85c);
    border-radius: 20px;
    transition: width 0.6s ease-in-out;
}

.progress-text {
    font-weight: bold;
    min-width: 80px;
    color: #f1f1f1;
    text-shadow: 0 1px 2px rgba(0,0,0,0.3);
}

/* -------- Layout -------- */
.learning-content {
    display: flex;
    gap: 20px;
    animation: fadeIn 0.8s ease-in-out;
}

.content-sidebar {
    width: 300px;
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.content-sidebar:hover {
    transform: translateY(-3px);
}

.content-main {
    flex-grow: 1;
    background: white;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

/* Tabs */
.tabs {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
}
.tab-btn {
    flex: 1;
    padding: 10px;
    background: #f1f1f1;
    border: none;
    cursor: pointer;
    font-weight: 600;
    border-radius: 8px;
    transition: background 0.3s;
}
.tab-btn.active {
    background: #3490dc;
    color: white;
}
.tab-content { display: none; }
.tab-content.active { display: block; }

/* Module progress + badge */
.module-progress {
    margin-top: 20px;
    font-weight: bold;
}
.completed-badge {
    margin-left: 10px;
    color: #28a745;
}

/* Sticky Next Button */
.sticky-next {
    position: fixed;
    bottom: 20px;
    right: 20px;
}
.sticky-next .btn-next {
    padding: 12px 20px;
    border-radius: 30px;
    font-size: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}


/* -------- Sidebar Items -------- */
.content-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.content-item {
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.content-item:hover {
    background-color: #f1f7ff;
    transform: translateX(5px);
}

.content-item.active {
    background-color: #e9f7fe;
    border-left: 4px solid #3490dc;
    font-weight: bold;
}

.content-item.completed .content-title {
    color: #28a745;
}

.content-item a {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #333;
}

.content-icon {
    margin-right: 10px;
    color: #6c757d;
    font-size: 16px;
    transition: transform 0.3s ease;
}

.content-item:hover .content-icon {
    transform: rotate(10deg);
}

.content-title {
    flex-grow: 1;
}

/* -------- Video & PDF -------- */
.video-container iframe,
video {
    border-radius: 10px;
    box-shadow: 0 3px 12px rgba(240, 234, 234, 0.15);
    transition: transform 0.3s ease;
}

video:hover {
    transform: scale(1.01);
}

.video-list {
    display: flex;
    flex-direction: column;
    gap: 25px; /* space between multiple videos */
    margin-bottom: 20px;
    margin-left: 20%;
}

.video-container {
    width: 380px;
    height: 140px;
    aspect-ratio: 16 / 9; /* keeps a good balance for all videos */
    background: #ffffff; /* softer than pure black */
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(0,0,0,0.2);
}

.video-container video,
.video-container iframe {
    
    max-height: 540px;
    height: 140px;
    width: 480
    object-fit: contain; /* keep correct aspect ratio */
    background: #c5c0c0; /* fallback bg for letterbox areas */
}


.pdf-viewer {
    width: 100%;
    height: 600px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

/* -------- Documents Tab -------- */
.documents-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-top: 15px;
}

.document-card {
    display: flex;
    align-items: center;
    padding: 15px 20px;
    background: #f9f9ff;
    border-radius: 12px;
    border: 1px solid #e3e6f0;
    transition: all 0.3s ease;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    cursor: pointer;
}

.document-card:hover {
    background: #eef6ff;
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}

.doc-icon {
    font-size: 28px;
    color: #3490dc;
    margin-right: 15px;
    transition: transform 0.3s ease;
}

.document-card:hover .doc-icon {
    transform: scale(1.2) rotate(-5deg);
}

.doc-info {
    flex-grow: 1;
}

.doc-title {
    font-size: 16px;
    font-weight: bold;
    color: #2c3e50;
    margin: 0;
}

.doc-meta {
    font-size: 13px;
    color: #6c757d;
}

.download-badge {
    background: linear-gradient(90deg, #3490dc, #1d75bd);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.download-badge:hover {
    background: linear-gradient(90deg, #227dc7, #145a8a);
    transform: scale(1.05);
}

.btn-quiz {
    background: linear-gradient(90deg, #ff7eb3, #ff758c);
    color: white;
    font-weight: bold;
    padding: 12px 20px;
    border-radius: 30px;
    margin: 8px 5px;
    display: inline-block;
    text-align: center;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 12px rgba(255, 117, 140, 0.4);
    animation: pulseGlow 2s infinite;
}

.btn-quiz:hover {
    transform: scale(1.1) translateY(-3px);
    box-shadow: 0 6px 18px rgba(255, 117, 140, 0.6);
}


/* -------- Buttons -------- */
.btn {
    padding: 10px 18px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
}

.btn-mark-complete {
    background: linear-gradient(90deg, #28a745, #5cd85c);
    color: white;
    border: none;
}

.btn-mark-complete:hover {
    background: linear-gradient(90deg, #218838, #43b043);
}

.btn-prev {
    background-color: #6c757d;
    color: white;
}

.btn-next, .btn-start, .btn-complete {
    background: linear-gradient(90deg, #3490dc, #1d75bd);
    color: white;
}

.btn-next:hover, .btn-start:hover, .btn-complete:hover {
    background: linear-gradient(90deg, #227dc7, #145a8a);
}

/* -------- Misc -------- */
.completed-badge {
    color: #28a745;
    font-weight: 500;
}

.welcome-message {
    text-align: center;
    padding: 50px 20px;
    animation: fadeIn 1s ease;
}

.welcome-message h2 {
    margin-bottom: 20px;
    font-size: 28px;
    color: #2c3e50;
}

/* -------- Animations -------- */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes pulseGlow {
    0% { box-shadow: 0 0 10px rgba(255, 117, 140, 0.4); }
    50% { box-shadow: 0 0 25px rgba(255, 117, 140, 0.8); }
    100% { box-shadow: 0 0 10px rgba(255, 117, 140, 0.4); }
}

</style>
@endpush
<body>
@extends('layouts.student')
@section('student-content')

<div class="learning-container">
    <!-- Course Header -->
    <div class="course-header">
        <h1>{{ $enrollment->course->name }}</h1>
        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-fill" style="width: {{ $enrollment->progress }}%"></div>
            </div>
            <span class="progress-text">{{ $enrollment->progress }}% Complete</span>
        </div>
    </div>

    <div class="learning-content">
        <!-- Sidebar Navigation -->
        <div class="content-sidebar">
            <h3>Course Modules</h3>
            <ul class="content-list">
                @foreach($modules as $module)
                <li class="content-item {{ $activeModule && $activeModule->id == $module->id ? 'active' : '' }}">
                    <a href="{{ route('student.learn.module', ['enrollment' => $enrollment->id, 'module' => $module->id]) }}">
                        <i class="fas fa-folder"></i>
                        {{ $module->name }}
                        @if($module->isCompletedBy($enrollment->id)) ✅ @endif
                    </a>
                </li>

                @endforeach
                @if((int) $enrollment->progress >= 100 && !$enrollment->completed)
    <form method="POST" action="{{ route('student.finish.course', ['enrollment' => $enrollment->id]) }}">
        @csrf
        <button type="submit" class="btn btn-complete">🎓 Finish Course</button>
    </form>
@endif

            </ul>
        </div>


<!-- Main Content Area -->
<div class="content-main">
    @if($activeModule)
        <h2>{{ $activeModule->name }}</h2>

        <!-- TAB Navigation -->
        <div class="tabs">
            <button class="tab-btn active" data-tab="videos">📹 Videos</button>
            <button class="tab-btn" data-tab="documents">📄 Documents</button>
            <button class="tab-btn" data-tab="quizzes">📝 Quizzes</button>
        </div>

        <!-- TAB Content -->
       <div class="tab-content active" id="videos">
    @if($activeModule->videos->count())
        <div class="video-list">
            @foreach($activeModule->videos as $video)
                <div class="video-container">
                    <video controls src="{{ asset('storage/' . $video->file_path) }}"></video>
                </div>
            @endforeach
        </div>
    @else
        <p>No videos in this module.</p>
    @endif
</div>

        <div class="tab-content" id="documents">
    @if($activeModule->documents->count())
        <div class="documents-list">
            @foreach($activeModule->documents as $doc)
                <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="document-card">
                    <i class="fas fa-file-pdf doc-icon"></i>
                    <div class="doc-info">
                        <p class="doc-title">{{ $doc->title }}</p>
                        <p class="doc-meta">PDF • Click to view or download</p>
                    </div>
                    <span class="download-badge">⬇ Download</span>
                </a>
            @endforeach
        </div>
    @else
        <p>No documents in this module.</p>
    @endif
</div>


        <div class="tab-content" id="quizzes">
            @if($activeModule->quizzes->count())
                @foreach($activeModule->quizzes as $index => $quiz)
                    <a class="btn btn-quiz"
                       href="{{ route('quiz.start', ['enrollment' => $enrollment->id, 'quiz' => $quiz->id]) }}">
                        Quiz {{ $index + 1 }}
                    </a>
                @endforeach
            @else
                <p>No quizzes in this module.</p>
            @endif
        </div>

        <!-- Module Progress + Badge -->
        <div class="module-progress">
            <span>Progress: {{ $activeModule->progress($enrollment->id) }}%</span>
            @if($activeModule->isCompletedBy($enrollment->id))
                <span class="completed-badge">🏆 Completed!</span>
            @endif
        </div>


        <!-- Sticky Next Button -->
        <div class="sticky-next">
            <a href="{{ $nextModuleUrl ?? '#' }}" class="btn btn-next">➡ Next Module</a>
        </div>

    @else
        <div class="welcome-message">
            <h2>Welcome to {{ $enrollment->course->name }}</h2>
            <p>Select a module from the sidebar to begin learning.</p>
        </div>
    @endif
</div>



@endsection


@push('scripts')
<script>
// Auto-mark as complete when video reaches end
document.addEventListener('DOMContentLoaded', function() {
    const videoPlayers = document.querySelectorAll('video, iframe');
    
    videoPlayers.forEach(player => {
        player.addEventListener('ended', function() {
            const completeForm = document.querySelector('form[action*="complete"]');
            if(completeForm) {
                completeForm.submit();
            }
        });
    });
});

function refreshProgressBar(newProgress) {
    const progressFill = document.querySelector('.progress-fill');
    const progressText = document.querySelector('.progress-text');
    progressFill.style.width = `${newProgress}%`;
    progressText.textContent = `${newProgress}% Complete`;
}
</script>

<script>
// Tabs logic
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

        btn.classList.add('active');
        document.getElementById(btn.dataset.tab).classList.add('active');
    });
});

// Confetti when module completed 🎉
@if($activeModule && $activeModule->isCompletedBy($enrollment->id))
    import("https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js").then(module => {
        module.default({ particleCount: 150, spread: 80, origin: { y: 0.6 } });
    });
@endif
</script>

@endpush
        <!-- Add Chart.js library for charts -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="scripts.js"></script>
        
</body>
</html>
