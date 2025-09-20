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
  @extends('layouts.admin')

@section('admin-content')

<a href="{{ route('admin.courses.create') }}" class="btnlogin">Add Courses</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="course-cards">
    @foreach($courses as $course)
        <div class="course-card">

            <!-- Delete Button -->
            <form action="{{ route('courses.delete', $course->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn">✖</button>
            </form>  

            <!-- Clickable image -->
            <a href="{{ route('courses.view', $course->id) }}">
                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}" />
            </a>

            <!-- Title -->
            <h3>{{ $course->name }}</h3>

            <!-- Description -->
            <p>
                {{ \Illuminate\Support\Str::limit(strip_tags($course->description), 100) }}
                <a href="{{ route('courses.view', $course->id) }}" class="learn-more-link">Learn more</a>
            </p>

            <!-- Badges -->
            <span class="badge badge-price">${{ $course->price }}</span>
            <span class="badge badge-duration">{{ $course->duration }}</span>

            <!-- Actions -->
            <div>
                <a href="{{ route('courses.view', $course->id) }}" class="btn">View</a>
                <a href="{{ route('courses.modify', $course->id) }}" class="btn">Edit</a>
            </div>
        </div>
    @endforeach
</div>


@endsection

<!-- Add Chart.js and your script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="scripts.js"></script>
        
        
</body>
</html>
