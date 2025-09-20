<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/stylead.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  
</head>
<body>
    @extends('layouts.teacher')
    @section('teacher-content')
       
<a href="{{ route('teacher.courses.create') }}" class="btnlogin">Add Courses</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="course-cards">
    @foreach($courses as $course)
        <div class="course-card">
            <form action="{{ route('teacher.courses-delete', $course->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">X</button>
            </form>  

            <a href="{{ route('courses.view', $course->id) }}">
                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}" />
            </a>

            <h3>{{ $course->name }}</h3>

            <p>
                {{ \Illuminate\Support\Str::limit(strip_tags($course->description), 100) }}
                <a href="{{ route('courses.view', $course->id) }}" class="learn-more-link">Learn more</a>
            </p>

            <p><strong>Price:</strong> ${{ $course->price }}</p> 
            <p><strong>Duration:</strong> {{ $course->duration }}</p>

            <a href="{{ route('courses.view', $course->id) }}" class="btn">View Details</a>
            <a href="{{ route('teacher.courses_edit', $course->id) }}" class="btn">Edit</a>
        </div>
    @endforeach
</div>


    @endsection   
    <!-- Add Chart.js library for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="scripts.js"></script>
</body>
</html>

