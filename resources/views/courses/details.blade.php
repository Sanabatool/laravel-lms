<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/styledetails.css.css') }}"> --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('css/stylead.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        @include('includes.dasheader')

        <div class="course-details">
            <h1>{{ $course->name }}</h1>
            <p>{{ $course->description }}</p>
            <p><strong>Trainer:</strong> {{ $course->trainer }}</p>
            <p><strong>Duration:</strong> {{ $course->duration }}</p>
            {{-- <p><strong>Price:</strong> ${{ $course->price }}</p>         --}}
            <h2>Modules</h2>

            @foreach($course->modules as $module)
            <div class="module">
                <button class="module-button" onclick="toggleModuleContent(this)">
                    {{ $module->name }}
                </button>
                <div class="module-content">
                    <div class="videos">
                        <h4>Videos</h4>
                        @foreach ($module->videos as $video)
                            <video controls width="100%" style="margin-bottom: 10px;">
                                <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                                Your browser does not support HTML video.
                            </video>
                        @endforeach
                    </div>
                    <div class="documents">
                        <h4>Documents</h4>
                        <ul>
                            @foreach ($module->documents as $doc)
                                <a href="{{ Storage::url($doc->file_path) }}" target="_blank">{{ $doc->title }}</a>
                                
                                @if(Str::endsWith($doc->file_path, ['.pdf']))
                                    <iframe src="{{ Storage::url($doc->file_path) }}" width="100%" height="600px"></iframe>
                                @endif
                            @endforeach
                            

                        </ul>
                    </div>
                    <div class="quizzes">
                        <h4>Quizzes</h4>
                        <ul>
                            @foreach($module->quizzes as $quiz)
                            <li>{{ $quiz->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    
    </div>

    <script>
        function toggleModuleContent(button) {
            const content = button.nextElementSibling;
            const isActive = button.classList.contains("active");
            
            document.querySelectorAll(".module-content").forEach(el => el.style.display = "none");
            document.querySelectorAll(".module-button").forEach(btn => btn.classList.remove("active"));
            
            if (!isActive) {
                content.style.display = "block";
                button.classList.add("active");
            }
        }
    </script>
    
    </body>
   
</html>
