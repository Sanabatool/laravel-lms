<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>EduSpark - Learn Smarter</title>
  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body>

  <!-- Navbar -->
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
       @if(session()->has('user_role'))
                @php
                    $role = session('user_role');
                    $dashboardRoute = $role == 1 ? route('admin.dashboard') :
                                      ($role == 2 ? route('teacher.dashboard') : route('student.dashboard'));
                @endphp
                <a href="{{ $dashboardRoute }}" class="btn-fill">Dashboard</a>
                <a href="{{ route('logout') }}" class="btn-outline">Logout</a>
            @else
                <a href="{{ route('login.form') }}" class="btn-outline">Log In</a>
                <a href="{{ route('register') }}" class="btn-fill">Register</a>
            @endif
    </div>
  </div>
</nav>
  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-text">
      <h1>Boost Your <span class="highlight">Skills</span> with EduSpark</h1>
      <p>Join thousands of learners and explore powerful, project-based courses to excel in your career or academics.</p>
      <div class="hero-buttons">
        <button class="btn-fill">Explore Courses</button>
        <button class="btn-outline">Learn More</button>
      </div>
      <div class="ratings">⭐ 4.9/5 average rating from 10,000+ learners</div>
    </div>

     <div class="hero-image">
        <img src="{{ asset('images/girl.png') }}" alt="Learning Image">
        <div class="badge">Trusted by Educators</div>
     </div>
      <!-- Floating Chatbot Icon -->
      <div id="chatbot-icon">💬</div>
      
      <!-- Chatbot Panel -->
      <div id="chatbot-panel">
        <div class="chatbot-header">
          <span> SmartBot</span>
          <button id="close-chat">×</button>
        </div>
      
        <div class="chatbot-messages">
          <div class="message bot">Hi 👋 I'm SmartBot. How can I help you today?</div>
        </div>
      
        <div class="chatbot-input">
          <form id="chat-form" style="display:flex; width:100%;">
            <input type="text" id="chat-input" placeholder="Type a message..." />
            <button id="send-btn" type="submit">➤</button>
          </form>
        </div>

    

  </section>

  <section class="courses">
  <div class="container">
    <h2>Explore Our Courses</h2>
    <p>Discover thousands of courses across various categories to help you achieve your personal and professional goals.</p>

    <ul class="tabs">
      <li class="active">All Courses</li>
      <li>Video Courses</li>
      <li>Live Classes</li>
      <li>Test Courses</li>
      <li>Free Courses</li>
      <li>Courses Bundles</li>
    </ul>

<div class="course-grid">
@foreach($courses as $course)
  <a href="{{ route('user.course.show', $course->id) }}" class="course-link">
    <div class="course-card">
      <div class="card-image">
        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}">
        <span class="tag popular">Popular</span>
      </div>
      <div class="card-content">
        <div class="meta">{{ $course->duration }}</div>
        <h3>{{ $course->name }}</h3>
        <p>Dr. Emily Clark, Sam Wilson</p>
        <div class="rating">Rating: 
                      @php $avgRating = round($course->averageRating()) @endphp
                      {{ str_repeat('⭐', $avgRating) }} ({{ number_format($course->averageRating(), 1) }}/5)</div>
        <div class="price">${{ $course->price }} <span class="old-price">$119.00</span></div>
      </div>
    </div>
  </a>
 @endforeach  
<br> 
  <!-- Repeat for more cards -->
</div>
<div class="course-grid">
  <a href="{{ route('course-details', $course->id) }}" class="course-link">
    <div class="course-card">
      <div class="card-image">
        <img src="{{ asset('images/tutor.png') }}" alt="Course 1">
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

  <!-- Repeat for more cards -->
</div>

  </div>
  
</section>
  <section class="marketplace">
    <div class="container">
      <h2>Explore Our Marketplace</h2>
      <p class="subtitle">
        Discover thousands of engaging courses across various categories taught by expert instructors from around the world.
      </p>

      <div class="filter-buttons">
        <button class="active">All Products</button>
        <button>eBooks</button>
        <button>Templates</button>
        <button>Study Kits</button>
        <button>Physical Books</button>
      </div>

      <div class="product-grid">
        <!-- Card 1 -->
        <div class="card">
          <img src="images/image2.jpg" alt="Data Science eBook">
          <span class="tag">eBook</span>
          <h3>Data Science eBook</h3>
          <p class="details">📄 450 Pages | PDF + EPUB</p>
          <p class="rating">⭐ 4.6 (44 reviews)</p>
          <p class="price"><span>$13.99</span> <del>$19.99</del></p>
         <a href="cart5.html"><button>Learn More</button></a> 
        </div>

        <!-- Card 2 -->
        <div class="card">
          <img src="images/image3.jpg" alt="Web Dev Study Kit">
          <span class="tag">Study Kit</span>
          <h3>Web Dev Study Kit</h3>
          <p class="details">📦 8 Items | Study Kit</p>
          <p class="rating">⭐ 4.5 (38 reviews)</p>
          <p class="price"><span>$39.99</span></p>
        <a href="cart2.html"><button>Learn More</button></a>          </div>

        <!-- Card 3 -->
        <div class="card">
          <img src="images/image4.jpg" alt="Success Planner">
          <span class="tag">Templates</span>
          <h3>Success Planner</h3>
          <p class="details">📁 12 Templates | Download</p>
          <p class="rating">⭐ 4.6 (48 reviews)</p>
          <p class="price"><span>$39.99</span></p>
         <a href="cart2.html"> <button>Learn More</button>
</a>        </div>

        <!-- Card 4 -->
        <div class="card">
          <img src="images/images.jpg" alt="Design Fundamental">
          <span class="tag">Physical Book</span>
          <h3>Design Fundamental</h3>
          <p class="details">📄 400 Pages | Hardcover</p>
          <p class="rating">⭐ 4.8 (66 reviews)</p>
          <p class="price"><span>$39.99</span></p>
        <a href="cart1.html"> <button>Learn More</button>
</a>  
        </div>
      </div>

      <a href="marketplace.html" class="view-all-btn">View All Products →</a>
    </div>
  </section>
    <h2>Flexible Purchasing Model</h2>
  <p class="description">
    Explore our flexible subscription plans tailored to fit your learning goals and budget.
  </p>

  <div class="toggle-buttons">
    <button id="yearlyBtn" class="active" onclick="togglePricing('yearly')">Yearly -30%</button>
    <button id="monthlyBtn" onclick="togglePricing('monthly')">Monthly</button>
  </div>

  <div class="plans" id="plansContainer">
    <!-- Cards will be injected here by JS -->
  </div>
<section class="instructor-section">
  <div class="container">
    <div class="instructor-content">
      <!-- Left Side -->
      <div class="instructor-info">
        <h2>Become An Instructor</h2>
        <p>Join our community of expert instructors and share your knowledge with millions of students worldwide. Create engaging courses.</p>
        
        <div class="info-box">
          <i class="icon">💰</i>
          <div>
            <h4>Earn Revenue</h4>
            <p>Monetize your expertise with flexible teaching opportunities.</p>
          </div>
        </div>
        <div class="info-box">
          <i class="icon">🌍</i>
          <div>
            <h4>Reach students</h4>
            <p>Teach learners from around the world, at your own pace.</p>
          </div>
        </div>
        <div class="info-box">
          <i class="icon">🎓</i>
          <div>
            <h4>Teach your way</h4>
            <p>Create courses on topics you know best, in the format you prefer.</p>
          </div>
        </div>

        <a href="Instructor.html">
          <button class="start-btn">Start Teaching Today →</button>
        </a>
      </div>

      <!-- Right Side (Image instead of form) -->
      <div class="instructor-image">
        <img src="images/teach.jpg" alt="Instructor" />
      </div>
    </div>
  </div>
</section>
      </div>
    </div>
  </div>
</section>
<section class="testimonials">
  <div class="container">
    <h2 class="section-title">Student Success Stories</h2>
    <p class="section-subtitle">
      Discover how HUBNeo has transformed countless careers and lives through quality education and innovative skill development programs.
    </p>

    <div class="carousel-wrapper">
      <div class="carousel" id="testimonial-carousel">
        <!-- Testimonial 1 -->
        <div class="testimonial-card">
          <div class="profile">
            <img src="https://i.pravatar.cc/50?img=12" alt="Emily Chen" />
            <div>
              <h3>Emily Chen</h3>
              <p>Data Science Bootcamp</p>
            </div>
          </div>
          <p class="testimonial-text">
            “After completing the Data Science Bootcamp, I landed a data analyst job with a 47% salary bump. The hands-on projects made all the difference.”
          </p>
          <div class="stars">★★★★★</div>
        </div>
        <!-- Testimonial 2 -->
        <div class="testimonial-card">
          <div class="profile">
            <img src="https://i.pravatar.cc/50?img=14" alt="Marcus Johnson" />
            <div>
              <h3>Marcus Johnson</h3>
              <p>UI/UX Design Masterclass</p>
            </div>
          </div>
          <p class="testimonial-text">
            “The UI/UX Design Masterclass helped me launch my freelance career. I landed my first client within 3 months.”
          </p>
          <div class="stars">★★★★★</div>
        </div>

        <!-- Testimonial 3 -->
        <div class="testimonial-card">
          <div class="profile">
            <img src="https://i.pravatar.cc/50?img=16" alt="Sofia Rodriguez" />
            <div>
              <h3>Sofia Rodriguez</h3>
              <p>Digital Marketing Bundle</p>
            </div>
          </div>
          <p class="testimonial-text">
            “The Digital Marketing Bundle helped me increase my online sales by 900% in just 6 months.”
          </p>
          <div class="stars">★★★★★</div>
        </div>

        <!-- Testimonial 4 (duplicate for loop) -->
        <div class="testimonial-card">
          <div class="profile">
            <img src="https://i.pravatar.cc/50?img=18" alt="David Lee" />
            <div>
              <h3>David Lee</h3>
              <p>Full Stack Developer</p>
            </div>
          </div>
          <p class="testimonial-text">
            “This course gave me the confidence to switch careers. Now I’m working as a full stack dev!”
          </p>
          <div class="stars">★★★★★</div>
        </div>

        <!-- Testimonial 5 (duplicate for loop) -->
        <div class="testimonial-card">
          <div class="profile">
            <img src="https://i.pravatar.cc/50?img=19" alt="Fatima Ali" />
            <div>
              <h3>Fatima Ali</h3>
              <p>Business Analytics</p>
            </div>
          </div>
          <p class="testimonial-text">
            “The analytics bootcamp helped me get promoted to lead analyst in just 6 months.”
          </p>
          <div class="stars">★★★★★</div>
        </div>

        <!-- Testimonial 6 (duplicate for loop) -->
        <div class="testimonial-card">
          <div class="profile">
            <img src="https://i.pravatar.cc/50?img=20" alt="Ava Patel" />
            <div>
              <h3>Ava Patel</h3>
              <p>Project Management</p>
            </div>
          </div>
          <p class="testimonial-text">
            “With the project management course, I passed my certification exam with ease.”
          </p>
          <div class="stars">★★★★★</div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- CTA Section -->
<section class="cta-section">
  <div class="cta-content">
    <h2>Transform Your Future With <br>Expert-Led Learning</h2>
    <p>Stay updated with the latest announcements, platform updates, community news, and exciting new features coming soon.</p>
    <div class="cta-buttons">
      <a href="#" class="btn-primary">Start Learning Now →</a>
      <a href="#" class="btn-secondary">View Success Story</a>
    </div>
  </div>
</section>

<!-- Footer -->
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

<!-- FontAwesome for social icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <script>
    const plansData = {
      yearly: [
        { name: "Basic Plan", price: "$12", label: "Perfect for beginners" },
        { name: "Standard Plan", price: "$40", label: "Best for serious learners", popular: true },
        { name: "Premium Plan", price: "$75", label: "For professional development" }
      ],
      monthly: [
        { name: "Basic Plan", price: "$2", label: "Perfect for beginners" },
        { name: "Standard Plan", price: "$5", label: "Best for serious learners", popular: true },
        { name: "Premium Plan", price: "$10", label: "For professional development" }
      ]
    };

    const commonFeatures = `
      <ul>
        <li>✔ Access to 100+ courses</li>
        <li>✔ Basic course materials</li>
        <li>✔ Course completion certificates</li>
        <li>✔ 24/7 customer support</li>
        <li>✔ Live Q&A sessions</li>
        <li>✔ Downloadable resources</li>
        <li>✘ 1-on-1 coaching sessions</li>
      </ul>
    `;

    function renderPlans(planType) {
      const plansContainer = document.getElementById("plansContainer");
      plansContainer.innerHTML = '';

      plansData[planType].forEach((plan, index) => {
        const card = document.createElement("div");
        card.className = "card" + (plan.popular ? " highlighted" : "");

        card.innerHTML = `
          ${plan.popular ? `<div class="popular-tag">Popular</div>` : ""}
          <h3>${plan.name}</h3>
          <div class="price">${plan.price}<span style="font-size: 14px;">/${planType === "yearly" ? "year" : "month"}</span></div>
          <p style="font-size: 13px; color: #666;">${plan.label}</p>
          ${commonFeatures}
<button onclick="window.location.href='Payment.html?plan=${plan.name}&price=${plan.price}'">Get Started →</button>
        `;
        plansContainer.appendChild(card);
      });
    }

    function togglePricing(type) {
      document.getElementById("yearlyBtn").classList.toggle("active", type === "yearly");
      document.getElementById("monthlyBtn").classList.toggle("active", type === "monthly");
      renderPlans(type);
    }

    // Initial render
    renderPlans("yearly");
      const testimonials = document.querySelectorAll('.testimonial-card');
  const dots = document.querySelectorAll('.dot');
  let currentIndex = 0;

  function showTestimonial(index) {
    testimonials.forEach((testimonial, i) => {
      testimonial.style.display = i === index ? 'block' : 'none';
    });

    dots.forEach((dot, i) => {
      dot.classList.toggle('active', i === index);
    });
  }

  function nextTestimonial() {
    currentIndex = (currentIndex + 1) % testimonials.length;
    showTestimonial(currentIndex);
  }

  // Initialize: show first testimonial
  showTestimonial(currentIndex);

  // Auto loop every 4 seconds
  setInterval(nextTestimonial, 4000);

  // Make dots clickable too (optional)
  dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
      currentIndex = i;
      showTestimonial(currentIndex);
    });
  });
  const carousel = document.getElementById('testimonial-carousel');
  const cards = carousel.querySelectorAll('.testimonial-card');

  // Clone cards for infinite effect
  cards.forEach(card => {
    const clone = card.cloneNode(true);
    carousel.appendChild(clone);
  });

  let scrollAmount = 0;

  function autoScroll() {
    scrollAmount += 1; // speed, adjust as needed
    carousel.scrollLeft = scrollAmount;

    if (scrollAmount >= carousel.scrollWidth / 2) {
      scrollAmount = 0;
      carousel.scrollLeft = 0;
    }

    requestAnimationFrame(autoScroll);
  }

  autoScroll();



  </script>
<script src="{{ asset('js/chatbot.js') }}"></script>
</body>
</html>
