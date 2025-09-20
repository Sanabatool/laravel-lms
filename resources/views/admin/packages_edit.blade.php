<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Package</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/stylead.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Animation Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #f0f4ff, #e3e9ff);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 850px;
            margin: 60px auto;
            padding: 30px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            opacity: 0; /* for animation */
            transform: translateY(30px);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            color: #333;
            position: relative;
        }

        h2::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: #4a90e2;
            margin: 8px auto 0;
            border-radius: 2px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 6px;
            font-weight: 500;
            color: #444;
        }

        input, textarea {
            padding: 12px 14px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            resize: none;
        }

        input:focus, textarea:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 8px rgba(74, 144, 226, 0.2);
            outline: none;
            transform: scale(1.02);
        }

        button, .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-success {
            background: #4a90e2;
            color: #fff;
        }

        .btn-success:hover {
            background: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(74,144,226,0.3);
        }

        .btn-secondary {
            background: #f2f2f2;
            color: #333;
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background: #e1e1e1;
        }

        .form-actions {
            text-align: center;
        }
    </style>
</head>
<body id="page-top">
@extends('layouts.admin')

@section('admin-content')
<div class="container">
    <h2>Edit Package</h2>

    <form action="{{ route('packages.update', $package->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name', $package->name) }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" value="{{ old('price', $package->price) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea rows="3" name="description" required>{{ old('description', $package->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="objectives">Objectives</label>
            <textarea rows="3" name="objectives" required>{{ old('objectives', $package->objectives) }}</textarea>
        </div>

        <div class="form-group">
            <label for="target_audience">Target Audience</label>
            <textarea rows="3" name="target_audience" required>{{ old('target_audience', $package->target_audience) }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<script>
    // Page load animation
    gsap.to(".container", {
        duration: 1,
        opacity: 1,
        y: 0,
        ease: "power3.out"
    });

    // Input field animation
    $("input, textarea").on("focus", function() {
        gsap.to(this, { scale: 1.05, duration: 0.3 });
    }).on("blur", function() {
        gsap.to(this, { scale: 1, duration: 0.3 });
    });
</script>
@endsection
</body>
</html>
