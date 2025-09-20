<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Certificate of Completion</title>
    <style>
        body { 
            text-align: center; 
            font-family: 'DejaVu Sans', sans-serif;
            background: #fdfdfd;
        }
        .certificate {
            border: 8px solid #b5a642;
            padding: 60px;
            background: #fff;
            width: 85%;
            margin: auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }
        .star {
            font-size: 80px;
            color: #d4af37;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 38px; 
            color: #333; 
            margin: 10px 0;
            font-weight: bold;
        }
        p {
            font-size: 18px;
            color: #444;
            margin: 10px 0;
        }
        .name {
            font-size: 30px; 
            font-style: italic;
            font-weight: bold;
            margin: 20px 0;
            text-decoration: underline;
            color: #000;
        }
        .course {
            font-size: 22px;
            margin: 15px 0;
            font-weight: bold;
            color: #222;
        }
        .date {
            margin-top: 30px;
            font-size: 16px;
            color: #666;
        }
        .footer {
            margin-top: 50px;
            font-size: 14px;
            color: #777;
        }
        .signature {
            margin-top: 50px;
        }
        .signature p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="star">★</div>
        <h1>Certificate of Completion</h1>
        <p>Proudly Awarded To</p>
        <p class="name">{{ $student }}</p>
        <p>For successfully completing the course</p>
        <p class="course">"{{ $course }}"</p>
        <p class="date">Completed on {{ $date }}</p>

        <div class="footer">
            <p>EduSpark Learning Platform</p>
        </div>
    </div>
</body>
</html>
