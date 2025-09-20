<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Contact Us — EduSpark</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: #f8faff;
      color: #333;
      line-height: 1.6;
      overflow-x: hidden;
    }

    a {
      text-decoration: none;
      color: inherit;
      transition: color 0.3s;
    }

    a:hover {
      color: #5c67f2;
    }

/* Navbar Styling */
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
    /* Hero Section */
    .contact-hero {
      background: linear-gradient(135deg, #a1c4fd, #c2e9fb);
      padding: 100px 20px;
      text-align: center;
      color: #1d3557;
      position: relative;
      overflow: hidden;
    }
    .contact-hero::before {
      content: "";
      position: absolute;
      width: 250px;
      height: 250px;
      background: rgba(255,255,255,0.2);
      top: -50px;
      right: -50px;
      border-radius: 50%;
      animation: float 6s infinite ease-in-out;
    }
    .contact-hero h1 {
      font-size: 3.5rem;
      margin-bottom: 15px;
      background: linear-gradient(to right, #434343, #5c67f2);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .contact-hero p {
      font-size: 1.2rem;
      color: #333;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(15px); }
    }

    /* Contact Section */
    .contact-container {
      max-width: 1200px;
      margin: 60px auto;
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      padding: 0 20px;
      animation: fadeUp 1.2s ease;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Left: Info */
    .contact-info {
      flex: 1;
      min-width: 280px;
      background: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(92, 103, 242, 0.1);
      transition: 0.3s;
    }
    .contact-info:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 40px rgba(92, 103, 242, 0.2);
    }
    .contact-info h2 {
      font-size: 28px;
      margin-bottom: 25px;
      color: #1d3557;
    }
    .info-box {
      display: flex;
      gap: 15px;
      margin-bottom: 20px;
      align-items: flex-start;
    }
    .info-box i {
      font-size: 22px;
      color: #5c67f2;
      margin-top: 4px;
    }
    .info-box div h4 {
      margin: 0;
      font-size: 16px;
      font-weight: 600;
    }
    .info-box div p {
      margin: 5px 0 0;
      color: #555;
      font-size: 14px;
    }

    /* Right: Form */
    .contact-form {
      flex: 1;
      min-width: 300px;
      background: #fff;
      padding: 35px;
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(92, 103, 242, 0.1);
      transition: 0.3s;
    }
    .contact-form:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 40px rgba(92, 103, 242, 0.2);
    }
    .contact-form h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #1d3557;
    }
    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 14px 16px;
      margin-bottom: 15px;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      font-size: 15px;
      transition: all 0.3s;
    }
    .contact-form input:focus,
    .contact-form textarea:focus {
      border-color: #5c67f2;
      box-shadow: 0 0 8px rgba(92,103,242,0.3);
      outline: none;
    }
    .contact-form textarea {
      height: 120px;
      resize: none;
    }
    .contact-form button {
      background: linear-gradient(90deg, #5c67f2, #43cea2);
      color: white;
      border: none;
      padding: 14px 22px;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
    }
    .contact-form button:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 18px rgba(67, 206, 162, 0.5);
    }

    /* Map */
    .map {
      margin: 60px auto;
      max-width: 1200px;
      padding: 0 20px;
    }
    .map iframe {
      width: 100%;
      height: 380px;
      border: none;
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    }

    /* Footer */
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
    /* Responsive */
    @media (max-width: 768px) {
      .contact-container {
        flex-direction: column;
      }
    }
  </style>
  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
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


  <!-- Hero -->
  <section class="contact-hero">
    <h1>Contact Us</h1>
    <p>We’d love to hear from you. Get in touch with us today!</p>
  </section>

  <!-- Contact Section -->
  <section class="contact-container">
    <!-- Left: Info -->
    <div class="contact-info">
      <h2>Get in Touch</h2>
      <div class="info-box">
        <i class="fas fa-map-marker-alt"></i>
        <div>
          <h4>Our Office</h4>
          <p>123 Learning Street, Knowledge City, PK</p>
        </div>
      </div>
      <div class="info-box">
        <i class="fas fa-phone"></i>
        <div>
          <h4>Phone</h4>
          <p>+92 300 1234567</p>
        </div>
      </div>
      <div class="info-box">
        <i class="fas fa-envelope"></i>
        <div>
          <h4>Email</h4>
          <p>support@eduspark.com</p>
        </div>
      </div>
    </div>

    <!-- Right: Form -->
    <div class="contact-form">
      <h2>Send Us a Message</h2>
      <form>
        <input type="text" placeholder="Your Name" required />
        <input type="email" placeholder="Your Email" required />
        <input type="text" placeholder="Subject" />
        <textarea placeholder="Your Message"></textarea>
        <button type="submit">Send Message</button>
      </form>
    </div>
  </section>

  <!-- Map -->
  <section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.9160157776816!2d67.02127951500254!3d24.8607349840605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjTCsDUxJzM4LjYiTiA2N8KwMDEnMTguNiJF!5e0!3m2!1sen!2s!4v1687694020000" allowfullscreen></iframe>
  </section>
<footer class="footer">
  <div class="footer-container">
    <div class="footer-brand">
      <h3>EduSpark 🎓</h3>
      <p>Empowering individuals and organizations through high-quality online education and skill development.</p>
      <div class="social-icons">
        <a href="facebook.com"><i class="fab fa-facebook-f"></i></a>
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
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('marketplace') }}">Courses</a></li>
          <li><a href="{{ route('Contactus') }}">Contact</a></li>       
          <li><a href="Payment.html">Pricing</a></li>
          <li><a href="">Marketplace</a></li>
          <li><a href="Instructor.html">Become an Instructor</a></li>
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

</body>
</html>
