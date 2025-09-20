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

        <div class="form-container">
          <form action="{{ route('admin.packages.store') }}" method="POST">
              @csrf
              <input type="text" name="name" placeholder="Package Name" required>
              <input type="number" step="0.01" name="price" placeholder="Price" required>
              <textarea name="description" placeholder="Description" required></textarea>
              <textarea name="objectives" placeholder="Objectives" required></textarea>
              <textarea name="target_audience" placeholder="Target Audience" required></textarea>
              <button type="submit">Add Package</button>
          </form>
      </div>


    @endsection  

          <!-- Add Chart.js library for charts -->
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <script src="scripts.js"></script>
          
</body>
</html>       