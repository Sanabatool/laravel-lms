<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="{{ asset('css/stylead.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            margin: 0;
            padding: 0;
        }

        .content-main {
            max-width: 900px;
            margin: 30px auto;
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            animation: fadeInUp 0.6s ease;
        }

        .content-main h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 25px;
            color: #2c3e50;
            font-weight: 700;
        }

        .quiz-question {
            margin-bottom: 25px;
            padding: 20px;
            border-radius: 12px;
            background: #f8f9fc;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .quiz-question:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
        }

        .quiz-question p {
            font-size: 1.1rem;
            font-weight: 600;
            color: #34495e;
            margin-bottom: 15px;
        }

        .option {
            margin: 10px 0;
            display: flex;
            align-items: center;
            background: #fff;
            padding: 10px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .option:hover {
            border-color: #3498db;
            background: #ecf6ff;
        }

        .option input {
            margin-right: 12px;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 14px;
            font-size: 1.2rem;
            font-weight: bold;
            background: linear-gradient(45deg, #3498db, #2980b9);
            border: none;
            border-radius: 12px;
            color: white;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-submit:hover {
            background: linear-gradient(45deg, #2980b9, #1c6ea4);
            transform: scale(1.02);
        }

        /* Animation */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
@extends('layouts.student')
@section('student-content')

<div class="content-main">
    <h2>{{ $quiz->title }}</h2>

    <form method="POST" action="{{ route('quiz.submit', ['enrollment' => $enrollment->id, 'quiz' => $quiz->id]) }}">
        @csrf
        @foreach($quiz->questions as $question)
            <div class="quiz-question">
                <p>{{ $loop->iteration }}. {{ $question->title }}</p>
                @foreach($question->options as $option)
                    <label class="option">
                        <input type="radio" name="question_{{ $question->id }}" value="{{ $option->id }}" required>
                        {{ $option->text }}
                    </label>
                @endforeach
            </div>
        @endforeach
        <button type="submit" class="btn-submit">🚀 Submit Quiz</button>
    </form>
</div>

@endsection
</body>
</html>
