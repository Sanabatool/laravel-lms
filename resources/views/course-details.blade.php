<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Understanding Data Science - Course Details</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, sans-serif;
      margin: 0;
      background: #f9fafb;
      color: #333;
    }
.navbar {
  background: #ffffff;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  padding: 1rem 2rem;
  position: sticky;
  top: 0;
  z-index: 1000;
}

.nav-container {
  max-width: 1200px;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
}

.logo {
  font-size: 1.8rem;
  font-weight: 700;
  color: #1d3557;
}
.logo span {
  color: #457b9d;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 1.5rem;
}
.nav-links li a {
  text-decoration: none;
  color: #2b2d42;
  font-weight: 500;
  transition: color 0.3s ease;
}
.nav-links li a:hover {
  color: #457b9d;
}

.nav-actions {
  display: flex;
  align-items: center;
  gap: 0.8rem;
}

.nav-actions input {
  padding: 0.45rem 0.8rem;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.btn-outline, .btn-fill {
  padding: 0.5rem 1rem;
  border-radius: 5px;
  font-weight: 500;
  cursor: pointer;
}

/* Outline Button */
.btn-outline {
  background: transparent;
  border: 1.5px solid #1d3557;
  color: #1d3557;
  transition: all 0.3s ease;
}
.btn-outline:hover {
  background-color: #1d3557;
  color: #fff;
}

/* Filled Button */
.btn-fill {
  background-color: #457b9d;
  color: #fff;
  border: none;
  transition: background 0.3s ease;
}
.btn-fill:hover {
  background-color: #1d3557;
}

.btn-outline {
  background: transparent;
  border: 2px solid #5c67f2;
  color: #5c67f2;
  padding: 10px 18px;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.3s ease, box-shadow 0.3s;
}

.btn-outline:hover {
  background: #5c67f2;
  color: white;
  box-shadow: 0 4px 12px rgba(92, 103, 242, 0.2);
}


    .hero {
      background: linear-gradient(to right, #4f46e5, #4338ca);
      color: #fff;
      text-align: center;
    }

    .hero h1 {
      font-size: 38px;
      margin: 0 0 10px;
    }

    .hero p {
      font-size: 18px;
      opacity: 0.9;
    }

    .container {
      max-width: 1100px;
      margin: 40px auto;
      background: #fff;
      border-radius: 8px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .course-info {
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
    }

    .course-main {
      flex: 2;
      min-width: 300px;
    }

    .course-sidebar {
      flex: 1;
      background: #f9fafb;
      padding: 30px;
      border-radius: 8px;
      border: 1px solid #e5e7eb;
    }

    .course-sidebar strong {
      display: block;
      margin-bottom: 10px;
    }

    .course-sidebar p {
      margin: 5px 0;
    }

    .enroll-btn {
      display: inline-block;
      background: #1d3557;
      color: #fff;
      text-decoration: none;
      padding: 15px 30px;
      border-radius: 5px;
      margin-top: 20px;
      font-weight: 400;
      transition: 0.3s;
      text-align: center;
    }

    .enroll-btn:hover {
      background: #3730a3;
    }

    .video-preview {
      width: 100%;
      height: 400px;
      background: #ddd;
      margin-bottom: 20px;
      border-radius: 8px;
      overflow: hidden;
    }

    .tabs {
      display: flex;
      border-bottom: 2px solid #ddd;
      margin-bottom: 20px;
    }

    .tab {
      padding: 10px 20px;
      cursor: pointer;
      border: none;
      background: none;
      font-weight: 600;
      transition: 0.3s;
    }

    .tab.active {
      border-bottom: 3px solid #4f46e5;
      color: #4f46e5;
    }

    .tab-content {
      display: none;
    }

    .tab-content.active {
      display: block;
    }

    .review {
      border-top: 1px solid #eee;
      padding: 15px 0;
    }

    .review strong {
      display: block;
    }

    .related-courses {
      margin-top: 60px;
    }

    .related-courses h2 {
      margin-bottom: 20px;
    }

    .related-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .related-card {
      background: #fff;
      border: 1px solid #eee;
      padding: 20px;
      border-radius: 8px;
    }
.course-sidebar .instructor {
  display: flex;
  align-items: center;
  gap: 15px;
  margin: 20px 0;
}

.course-sidebar .instructor img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #4f46e5;
}

.course-sidebar .instructor-info p {
  margin: 3px 0 0;
  font-size: 14px;
  color: #555;
}
.course-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
}

.course-card {
  border: 1px solid #eee;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  transition: 0.3s;
}

.course-card:hover {
  transform: translateY(-5px);
}

.card-image {
  position: relative;
}

.card-image img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.tag {
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: #007bff;
  color: #fff;
  padding: 4px 10px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: bold;
}

.tag.popular {
  background-color: #ff9800;
}

.tag.new {
  background-color: #4caf50;
}

.card-content {
  padding: 20px;
}

.card-content .meta {
  font-size: 13px;
  color: #999;
  margin-bottom: 8px;
}

.card-content h3 {
  font-size: 16px;
  margin: 0 0 5px;
  font-weight: 600;
}

.card-content p {
  font-size: 13px;
  color: #666;
  margin: 0 0 10px;
}

.rating {
  font-size: 14px;
  color: #ffa500;
  margin-bottom: 10px;
}

.price {
  font-size: 16px;
  font-weight: 600;
}

.old-price {
  font-size: 14px;
  color: #888;
  text-decoration: line-through;
  margin-left: 10px;
}
.container1 {
  max-width: 1200px;
  margin: auto;
  padding: 40px 20px;
  text-align: center;
}
.footer {
  background: #f9f9f9;
  padding: 50px 20px 20px;
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 40px;
  max-width: 1200px;
  margin: 0 auto;
}

.footer-brand {
  flex: 1 1 250px;
}

.footer-brand h3 {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.footer-brand p {
  margin-bottom: 20px;
}

.social-icons a {
  display: inline-block;
  margin-right: 10px;
  font-size: 1.2rem;
  color: #0f172a;
}

.footer-links {
  display: flex;
  flex: 3 1 700px;
  flex-wrap: wrap;
  gap: 40px;
}

.footer-column h4 {
  font-size: 1rem;
  margin-bottom: 10px;
}

.footer-column ul {
  list-style: none;
  padding: 0;
}

.footer-column ul li {
  margin-bottom: 8px;
}

.footer-column ul li a {
  color: #333;
  text-decoration: none;
}

.footer-bottom {
  border-top: 1px solid #ddd;
  margin-top: 40px;
  padding-top: 20px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  margin-left: auto;
  margin-right: auto;
}

.payment-icons img {
  height: 24px;
  margin-right: 10px;
}

.footer-selects select {
  margin-left: 10px;
  padding: 6px 10px;
}


    @media (max-width: 768px) {
      .course-info {
        flex-direction: column;
      }
      .video-preview {
        height: 200px;
      }
    }
  </style>
</head>
<body>
<nav class="navbar">
  <div class="nav-container">
    <div class="logo">Edu<span>Spark</span></div>

    <ul class="nav-links">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('marketplace') }}">Courses</a></li>
      <li><a href="{{ route('about') }}">About</a></li>
      <li><a href="{{ route('Contactus') }}">Contact</a></li>
    </ul>

    <div class="nav-actions">
      <input type="text" placeholder="Search...">
      <a href="{{ route('login.form') }}"><button class="btn-outline">Log In</button></a>
      <button class="btn-fill">Get Started</button>
    </div>
  </div>
</nav>

  <!-- Hero Section -->
    <h1 style=" text-align: center; color: #1d3557;">{{ $course->name }}</h1>
    <p style="text-align: center;">Build a strong foundation in data science with expert guidance and real-world projects.</p>

  <!-- Main Container -->
  <div class="container">
    <div class="course-info">
  
  <!-- Left: Image -->
  <div class="course-main">
    <img src="{{ asset('storage/' . $course->image) }}" 
         alt="{{ $course->name }}" 
         style="width:100%; max-width:500px; border-radius:10px;">
  </div>

  <!-- Right: Info -->
  <div class="course-sidebar">
    <h2>{{ $course->name }}</h2>
    <p>{{ $course->description }}</p>
    <p><strong>Duration:</strong> {{ $course->duration }}</p>
    <p><strong>Rating:</strong> ⭐ 4.6 ({{ $reviews->count() }})</p>
    <p><strong>Enrolled:</strong> {{ $enrolledCount }}</p>

    <div class="instructor">
      <img src="https://i.pravatar.cc/80?img=12" alt="Instructor Photo" />
      <div class="instructor-info">
        <strong>{{ $course->trainer }}</strong>
        <p>Lead Instructor</p>
      </div>
    </div>

    @auth
      <a href="{{ route('user.course.payment', $course->id) }}" class="enroll-btn">
        Enroll Now for ${{ $course->price }}
      </a>
    @else
      <a href="{{ route('login.form') }}" class="btn btn-primary">Login to Enroll</a>
    @endauth
  </div>

</div>

    <!-- Related Courses -->
    <div class="related-courses">
      <h2>Related Courses</h2>
      <div class="related-grid">
        <div class="related-card">
          <h3>Python for Beginners</h3>
          <p>⭐ 4.5 (120)</p>
          <p>$59.99</p>
        </div>
        <div class="related-card">
          <h3>Machine Learning 101</h3>
          <p>⭐ 4.7 (85)</p>
          <p>$79.99</p>
        </div>
        <div class="related-card">
          <h3>Data Visualization with Python</h3>
          <p>⭐ 4.8 (98)</p>
          <p>$69.99</p>
        </div>
      </div>
    </div>

  </div>
  <section class="courses">
  <div class="container1">

<div class="course-grid">
  <a href="{{ route('course-details', $course->id) }}" class="course-link">
    <div class="course-card">
      <div class="card-image">
        <img src="images/Logo.png" alt="Course 1">
        <span class="tag popular">Popular</span>
      </div>
      <div class="card-content">
        <div class="meta">60 hours • 180 lessons</div>
        <h3>Understanding the Fundamentals of Data</h3>
        <p>Dr. Michael Reynolds, David Kim, Sarah Lee</p>
        <div class="rating">⭐ 4.6 (54 Reviews)</div>
        <div class="price">$89.99 <span class="old-price">$99.00</span></div>
      </div>
    </div>
  </a>

  <a href="{{ route('course-details', $course->id) }}" class="course-link">
    <div class="course-card">
      <div class="card-image">
        <img src="images/GenAI1.jpg" alt="Course 2">
        <span class="tag popular">Popular</span>
      </div>
      <div class="card-content">
        <div class="meta">60 hours • 180 lessons</div>
        <h3>Introduction to AI Fundamentals</h3>
        <p>Prof. John Doe, Jane Smith</p>
        <div class="rating">⭐ 4.8 (120 Reviews)</div>
        <div class="price">$109.99 <span class="old-price">$129.00</span></div>
      </div>
    </div>
  </a>

  <a href="{{ route('course-details', $course->id) }}" class="course-link">
    <div class="course-card">
      <div class="card-image">
        <img src="images/GenAI.png" alt="Course 3">
        <span class="tag popular">Popular</span>
      </div>
      <div class="card-content">
        <div class="meta">45 hours • 100 lessons</div>
        <h3>Generative AI Masterclass</h3>
        <p>Dr. Emily Clark, Sam Wilson</p>
        <div class="rating">⭐ 4.7 (75 Reviews)</div>
        <div class="price">$99.99 <span class="old-price">$119.00</span></div>
      </div>
    </div>
  </a>
<br> 
  <!-- Repeat for more cards -->
</div>
<div class="course-grid">
  <a href="{{ route('course-details', $course->id) }}" class="course-link">
    <div class="course-card">
      <div class="card-image">
        <img src="images/tutor.png" alt="Course 1">
        <span class="tag popular">Popular</span>
      </div>
      <div class="card-content">
        <div class="meta">60 hours • 180 lessons</div>
        <h3>Understanding the Fundamentals of Data</h3>
        <p>Dr. Michael Reynolds, David Kim, Sarah Lee</p>
        <div class="rating">⭐ 4.6 (54 Reviews)</div>
        <div class="price">$89.99 <span class="old-price">$99.00</span></div>
      </div>
    </div>
  </a>

  <a href="{{ route('course-details', $course->id) }}" class="course-link">
    <div class="course-card">
      <div class="card-image">
        <img src="images/Deep.png" alt="Course 2">
        <span class="tag popular">Popular</span>
      </div>
      <div class="card-content">
        <div class="meta">60 hours • 180 lessons</div>
        <h3>Introduction to AI Fundamentals</h3>
        <p>Prof. John Doe, Jane Smith</p>
        <div class="rating">⭐ 4.8 (120 Reviews)</div>
        <div class="price">$109.99 <span class="old-price">$129.00</span></div>
      </div>
    </div>
  </a>

  <a href="{{ route('course-details', $course->id) }}" class="course-link">
    <div class="course-card">
      <div class="card-image">
        <img src="images/GenAI.png" alt="Course 3">
        <span class="tag popular">Popular</span>
      </div>
      <div class="card-content">
        <div class="meta">45 hours • 100 lessons</div>
        <h3>Generative AI Masterclass</h3>
        <p>Dr. Emily Clark, Sam Wilson</p>
        <div class="rating">⭐ 4.7 (75 Reviews)</div>
        <div class="price">$99.99 <span class="old-price">$119.00</span></div>
      </div>
    </div>
  </a>

  <!-- Repeat for more cards -->
</div>

  </div>

  <script>
    const tabs = document.querySelectorAll('.tab');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(btn => btn.classList.remove('active'));
        contents.forEach(c => c.classList.remove('active'));
        tab.classList.add('active');
        document.getElementById(tab.dataset.tab).classList.add('active');
      });
    });
  </script>
<footer class="footer">
  <div class="footer-container">
    <div class="footer-brand">
      <h3>EduSpark 🎓</h3>
      <p>Empowering individuals and organizations through high-quality online education and skill development.</p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>

    <div class="footer-links">
      <div class="footer-column">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Courses</a></li>
          <li><a href="#">Pricing</a></li>
          <li><a href="#">Marketplace</a></li>
          <li><a href="#">Become an Instructor</a></li>
          <li><a href="#">Affiliate Program</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h4>Resources</h4>
        <ul>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Help Center</a></li>
          <li><a href="#">Career Resources</a></li>
          <li><a href="#">Student Success Story</a></li>
          <li><a href="#">Instructor Resources</a></li>
          <li><a href="#">Learning Paths</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h4>Legal & Access</h4>
        <ul>
          <li><a href="#">Terms of Service</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Cookie Policy</a></li>
          <li><a href="#">Sitemap</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h4>Company</h4>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Press</a></li>
          <li><a href="#">Partners</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Accessibility</a></li>
          <li><a href="#">Investors</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 HubMoe LMS. All rights reserved.</p>
    <div class="payment-icons">
      <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa" />
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/MasterCard_Logo.svg" alt="MasterCard" />
      <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Google_Pay_Logo.svg" alt="Google Pay" />
    </div>
    <div class="footer-selects">
      <select>
        <option>🌐 English</option>
      </select>
      <select>
        <option>💲 Currency</option>
      </select>
    </div>
  </div>
</footer>

</body>
</html>
