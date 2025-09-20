<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $course->name }} | Course Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Fonts and Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Bootstrap (optional, already used in your project) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <style>
        body {
            background: #f9fbfc;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .container h1 {
            font-size: 32px;
            color: #1a1a1a;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .container p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        h3 {
            margin-top: 40px;
            font-size: 24px;
            color: #333;
            border-left: 4px solid #007bff;
            padding-left: 10px;
        }

        .module {
            background-color: #f4f8fe;
            border: 1px solid #d6e4f0;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            transition: transform 0.3s ease;
        }

        .module:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .module h4 {
            font-size: 20px;
            color: #0056b3;
            margin-bottom: 10px;
        }

        .module p {
            font-size: 15px;
            color: #444;
        }

        .module .btn {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            transition: 0.3s;
        }

        .module .btn:hover {
            background-color: #0056b3;
        }

        .module-content ul {
    list-style: none;
    padding-left: 0;
}

.module-content ul li {
    margin-bottom: 10px;
}


        .progress-bar {
            width: 100%;
            height: 20px;
            background-color: #e4eaf0;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .progress-bar .progress {
            height: 100%;
            width: {{ $progress ?? 0 }}%;
            background: linear-gradient(90deg, #007bff, #00c6ff);
            transition: width 0.5s ease;
        }

        form {
            margin-top: 20px;
            background-color: #f8f9fc;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        form .form-group {
            margin-bottom: 15px;
        }

        form label {
            font-weight: 600;
            color: #333;
        }

        form input,
        form textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1.5px solid #ccc;
            transition: border 0.3s;
        }

        form input:focus,
        form textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        form button {
            background-color: #28a745;
            color: white;
            border: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        form button:hover {
            background-color: #218838;
        }

        .reviews {
            margin-top: 30px;
        }

        .review {
            background-color: #fff;
            border-left: 4px solid #007bff;
            padding: 15px 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.1);
        }

        .review strong {
            font-size: 16px;
            color: #007bff;
        }

        .review p {
            margin: 5px 0;
            font-size: 14px;
            color: #444;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>{{ $course->name }}</h1>
    <p>{{ $course->description }}</p>

    <h3>Modules</h3>
    @foreach ($course->modules as $module)
        <div class="module">
            <h4>{{ $module->name }}</h4>
            <p>{{ $module->description }}</p>
            <button class="btn btn-info toggle-module" data-target="module-content-{{ $module->id }}">
    <i class="fas fa-play"></i> Start Module
</button>

<div id="module-content-{{ $module->id }}" class="module-content" style="display: none; margin-top: 15px;">
    {{-- Videos --}}
    @if ($module->videos->count())
        <strong>Videos:</strong>
        <ul>
            @foreach ($module->videos as $video)
                <li><video src="{{ asset('storage/' . $video->file_path) }}" controls width="100%"></video></li>
            @endforeach
        </ul>
    @endif

    {{-- Documents --}}
    @if ($module->documents->count())
        <strong>Documents:</strong>
        <ul>
            @foreach ($module->documents as $doc)
                <li>
                    <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank">
                        📄 {{ $doc->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    {{-- Quizzes --}}
    @if ($module->quizzes->count())
        <strong>Quizzes:</strong>
        <ul>
            @foreach ($module->quizzes as $quiz)
                <li>📝 {{ $quiz->title }}</li>
            @endforeach
        </ul>
    @endif
</div>

        </div>
    @endforeach

    <h3>Progress</h3>
    <div class="progress-bar">
        <div class="progress"></div>
    </div>

    <h3>Ratings and Reviews</h3>
    <form action="{{ route('courses.review', $course->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="rating">Rating (1-5)</label>
            <input type="number" name="rating" min="1" max="5" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="review">Review</label>
            <textarea name="review" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-star"></i> Submit Review</button>
    </form>

    <div class="reviews">
    @foreach($course->reviews as $review)
        <div class="review">
            <strong>{{ $review->user->name }}</strong>
            <div class="star-rating mb-1">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $review->rating)
                        <i class="fas fa-star" style="color: gold;"></i>
                    @else
                        <i class="far fa-star" style="color: gold;"></i>
                    @endif
                @endfor
            </div>
            <p>{{ $review->comment }}</p>
        </div>
    @endforeach
</div>

</div>

<script>
    // Smooth scroll to module on click (optional enhancement)
    document.querySelectorAll('.btn-info').forEach(btn => {
        btn.addEventListener('click', e => {
            // You can handle smooth transitions or modals here
            console.log("Starting module...");
        });
    });
</script>

<script>
    document.querySelectorAll('.toggle-module').forEach(button => {
        button.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const target = document.getElementById(targetId);
            if (target.style.display === "none") {
                target.style.display = "block";
                this.innerHTML = '<i class="fas fa-chevron-up"></i> Hide Module';
            } else {
                target.style.display = "none";
                this.innerHTML = '<i class="fas fa-play"></i> Start Module';
            }
        });
    });
</script>


</body>
</html>
