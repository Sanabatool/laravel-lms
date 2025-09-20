<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/stylead.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  
</head>
<body id="page-top">
    @extends('layouts.admin')
    @section('admin-content')
        
        <section class="performance-section">
            <a href="{{ route('admin.packages.create') }}" class="btnlogin" style="margin-top: 20px">Add Package</a>

            <div class="package-container">
                @foreach($packages as $package)
                    <div class="package-card">
    <h3>{{ $package->name }}</h3>
    <p><strong>Price:</strong> ${{ $package->price }}</p>

    <!-- Action Buttons -->
    <div class="actions">
        <a href="{{ route('packages.modify', $package->id) }}" class="btn">Edit</a>

        <form action="{{ route('packages.delete', $package->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</div>

                @endforeach
            </div>
        </section>

        

        <!-- Add Chart.js library for charts -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="script.js"></script>
    
    @endsection     
        
</body>
</html>
