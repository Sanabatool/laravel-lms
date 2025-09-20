<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/stylead.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<style>

/* ================= Dashboard Layout ================== */
.dashboard-container {
    padding: 20px;
    animation: fadeIn 0.8s ease-in-out;
}

.dashboard-container h1 {
    text-align: center;
    margin-bottom: 30px;
    font-weight: 700;
    color: #2c3e50;
    font-size: 2.2rem;
    letter-spacing: 1px;
}

/* vice assitant */
#voice-assistant-btn {
  position: fixed;
  bottom: 90px;
  right: 20px;
  background: linear-gradient(135deg, #ff416c, #ff4b2b);
  color: #fff;
  font-size: 24px;
  padding: 16px;
  border-radius: 50%;
  cursor: pointer;
  box-shadow: 0 6px 14px rgba(0,0,0,0.25);
  z-index: 1000;
  transition: transform 0.3s, background 0.3s;
  text-align: center;
}
#voice-assistant-btn:hover {
  transform: scale(1.1);
}

/* Voice-to-Assignment Button */
#voice-to-assignment-btn {
  position: fixed;
  bottom: 160px;   /* 👈 placed above voice assistant */
  right: 20px;
  background: linear-gradient(135deg, #36d1dc, #5b86e5); /* different gradient */
  color: #fff;
  font-size: 24px;
  padding: 16px;
  border-radius: 50%;
  cursor: pointer;
  box-shadow: 0 6px 14px rgba(0,0,0,0.25);
  z-index: 1000;
  transition: transform 0.3s, background 0.3s;
  text-align: center;
}
#voice-to-assignment-btn:hover {
  transform: scale(1.1);
}

/* ================ Stats Section ================= */
.stats-container {
    display: flex;
    justify-content: center;
    gap: 25px;
    margin-bottom: 40px;
    flex-wrap: wrap;
}

.stat-card {
    background: linear-gradient(135deg, #1cc88a, #17a673);
    color: #fff;
    font-weight: bold;
    font-size: 18px;
    padding: 18px 25px;
    border-radius: 12px;
    box-shadow: 0px 6px 20px rgba(0,0,0,0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    min-width: 160px;
    text-align: center;
    animation: growIn 0.6s ease-in-out;
}
.stat-card:hover {
    transform: translateY(-6px) scale(1.05);
    box-shadow: 0px 10px 25px rgba(0,0,0,0.25);
}

/* ================ Dashboard Sections ================= */
.dashboard-section h2 {
    font-size: 22px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 20px;
    border-left: 6px solid #1cc88a;
    padding-left: 10px;
    animation: slideUp 0.7s ease;
}

/* ================ Progress Cards ================= */
.progress-card {
    background: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
    margin-bottom: 20px;
    transition: all 0.3s ease;
    border-left: 6px solid #1cc88a;
}
.progress-card:hover {
    transform: translateX(6px);
    box-shadow: 0px 6px 20px rgba(0,0,0,0.2);
}

.progress-card h4 {
    font-size: 18px;
    margin-bottom: 12px;
    color: #333;
    font-weight: 600;
}
.progress-card a {
    color: #1cc88a;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s;
}
.progress-card a:hover {
    color: #13855c;
}

/* Progress Bar */
.progress-bar {
    background: #f0f0f0;
    border-radius: 20px;
    height: 12px;
    overflow: hidden;
    margin: 12px 0;
}
.progress-fill {
    background: linear-gradient(90deg, #1cc88a, #17a673);
    height: 100%;
    border-radius: 20px;
    transition: width 0.5s ease-in-out;
}

/* ================ Completed Course Cards ================= */
.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: flex-start;
}

.course-card {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    transition: transform 0.35s ease, box-shadow 0.35s ease;
    width: 230px;
    cursor: pointer;
    animation: fadeIn 0.6s ease-in;
}
.course-card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 10px 28px rgba(0,0,0,0.2);
}

.course-card img {
    width: 100%;
    height: 140px;
    object-fit: cover;
    transition: transform 0.4s ease;
}
.course-card:hover img {
    transform: scale(1.08);
}

.course-info {
    padding: 15px;
    text-align: center;
}
.course-info h4 {
    font-size: 17px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #2c3e50;
}
.course-info p {
    font-size: 14px;
    color: #666;
}
.course-info a {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 14px;
    font-size: 14px;
    font-weight: bold;
    border-radius: 8px;
    background: linear-gradient(135deg, #1cc88a, #17a673);
    color: #fff;
    text-decoration: none;
    transition: background 0.3s ease, transform 0.3s ease;
}
.course-info a:hover {
    background: linear-gradient(135deg, #17a673, #13855c);
    transform: translateY(-3px);
}

/* Floating Chat Icon */
#chatbot-icon {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background: linear-gradient(135deg, #4e54c8, #8f94fb);
  color: #fff;
  font-size: 24px;
  padding: 16px;
  border-radius: 50%;
  cursor: pointer;
  box-shadow: 0 6px 14px rgba(0,0,0,0.25);
  z-index: 1000;
  transition: transform 0.3s, background 0.3s;
}
#chatbot-icon:hover {
  transform: scale(1.1);
}

/* Chat Panel */
#chatbot-panel {
  position: fixed;
  bottom: 80px;
  right: 20px;
  width: 320px;
  height: 450px;
  border-radius: 10px;
  background: #fdfdfd;
  box-shadow: -3px 0 20px rgba(0,0,0,0.25);
  display: none;   /* ✅ matches JS */
  flex-direction: column;
  z-index: 2000;
}


/* Header */
.chatbot-header {
  background: linear-gradient(135deg, #4e54c8, #8f94fb);
  color: white;
  padding: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: bold;
  font-size: 16px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}
.chatbot-header button {
  background: transparent;
  border: none;
  font-size: 20px;
  color: white;
  cursor: pointer;
}

/* Messages */
.chatbot-messages {
  flex: 1;
  padding: 15px;
  overflow-y: auto;
  background: #f1f3f6;
  display: flex;
  flex-direction: column;
  gap: 12px;
}

/* Bubbles */
.message {
  max-width: 80%;
  padding: 12px 16px;
  border-radius: 20px;
  line-height: 1.4;
  font-size: 14px;
  animation: fadeIn 0.3s ease-in-out;
}
.message.bot {
  background: #ffffff;
  align-self: flex-start;
  border: 1px solid #ddd;
  color: #333;
}
.message.user {
  background: linear-gradient(135deg, #4e54c8, #8f94fb);
  color: white;
  align-self: flex-end;
  box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}

/* Input */
.chatbot-input {
  display: flex;
  padding: 12px;
  border-top: 1px solid #ddd;
  background: #fff;
}
.chatbot-input input {
  flex: 1;
  padding: 10px;
  border-radius: 20px;
  border: 1px solid #ccc;
  outline: none;
  font-size: 14px;
}
.chatbot-input button {
  margin-left: 10px;
  padding: 10px 16px;
  border-radius: 50%;
  background: linear-gradient(135deg, #4e54c8, #8f94fb);
  color: white;
  border: none;
  cursor: pointer;
  font-size: 16px;
  transition: background 0.3s;
}
.chatbot-input button:hover {
  opacity: 0.9;
}

/* Fancy fade */
@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(10px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* chatbot */

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.08); }
    100% { transform: scale(1); }
}

.animate-slide {
    animation: slideUp 0.6s ease forwards;
}
.animate-grow {
    animation: growIn 0.6s ease forwards;
}
.animate-fade {
    animation: fadeIn 0.6s ease forwards;
}

/* ================ Animations ================= */
@keyframes slideUp {
    0% { opacity: 0; transform: translateY(25px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes growIn {
    0% { opacity: 0; transform: scale(0.9); }
    100% { opacity: 1; transform: scale(1); }
}

@keyframes fadeIn {
    0% { opacity: 0; }
    100% { opacity: 1; }
}
</style>   

</head>
<body id="page-top">
    @extends('layouts.student')

@section('student-content')
<link rel="stylesheet" href="{{ asset('css/student-dashboard.css') }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="dashboard-container">
    <h1>Welcome, {{ auth()->user()->name }}</h1>

    <!-- Floating Voice Assistant Button -->
<a href="{{ route('student.voiceassistant') }}" 
   id="voice-assistant-btn" 
   title="Voice Assistant">
   <i class="fas fa-microphone"></i>
</a>
<!-- Floating Voice-to-Assignment Button -->
<a href="{{ route('student.voicetoassignment') }}" 
   id="voice-to-assignment-btn" 
   title="Voice to Assignment">
   <i class="fas fa-headset"></i>
</a>


  <div class="stats-container">
  <div class="stat-card">Enrolled: {{ count($inProgress ?? []) + count($completed ?? []) }}</div>
  <div class="stat-card">In Progress: {{ count($inProgress ?? []) }}</div>
  <div class="stat-card">Completed: {{ count($completed ?? []) }}</div>
</div>


    {{-- In Progress --}}
    <section class="dashboard-section">
    <h2>Courses In Progress</h2>
    @foreach($inProgress as $item)
        <div class="progress-card animate-grow">
            <p>{{ $item['progress'] }}% completed</p>
            <h4>
                <a href="{{ route('student.learn', ['enrollment' => $item['enrollment_id']]) }}" style="text-decoration: none; color: #333;">
                    {{ $item['course']->name }}
                </a>
                @if($item['progress'] == 100) ✔️ @endif
            </h4>
            <div class="progress-bar">
                <div class="progress-fill" style="width: {{ $item['progress'] }}%"></div>
            </div>
            <p>{{ $item['progress'] }}% completed</p>
            <a href="{{ route('student.learn', ['enrollment' => $item['enrollment_id']]) }}">Continue Learning</a>

            <form action="{{ route('student.finishCourse', $item['enrollment_id']) }}" method="POST" style="margin-top: 10px;">
                @csrf
                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to mark this course as completed?')">Finish</button>
            </form>

        </div>
    @endforeach
    </section>

{{-- Completed --}}
<section class="dashboard-section">
    <h2>Completed Courses</h2>
    <div class="card-container">
        @foreach($completed as $item)
            <div class="course-card animate-fade">
                <img src="{{ asset('storage/'.$item['course']->image) }}" alt="{{ $item['course']->name }}">
                <div class="course-info">
                    <h4>{{ $item['course']->name }}</h4>
                    <p>Completed</p>
                    <a href="{{ route('certificate.generate', $item['enrollment_id']) }}" class="btn btn-success">
                        Download Certificate
                    </a>
                </div>
            </div>
        @endforeach


        
    </div>
</section>

@include('components.chatbot')


    {{-- Chatbot --}}
<!-- Floating Chatbot Button -->
{{-- <div id="chatbot-icon" class="chatbot-icon">💬</div> --}}





{{-- <link rel="stylesheet" href="{{ asset('css/chatbot.css') }}"> --}}
<script defer src="{{ asset('js/chatbot.js') }}"></script>



@endsection

</body>
</html>

