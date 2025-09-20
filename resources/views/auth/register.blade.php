<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Register — EduSpark</title>
  <style>
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
      transition: all 0.3s ease;
    }

    /* Outline Button */
    .btn-outline {
      background: transparent;
      border: 2px solid #5c67f2;
      color: #5c67f2;
      padding: 10px 18px;
      border-radius: 8px;
    }
    .btn-outline:hover {
      background: #5c67f2;
      color: white;
      box-shadow: 0 4px 12px rgba(92, 103, 242, 0.2);
    }

    /* Filled Button */
    .btn-fill {
      background-color: #457b9d;
      color: #fff;
      border: none;
    }
    .btn-fill:hover {
      background-color: #1d3557;
    }

    /* Auth Card */
    .auth-card {
      background: #fff;
      padding: 40px;
      max-width: 400px;
      width: 100%;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.1);
      text-align: center;
      margin: 80px auto; /* ✅ centers form with space from navbar */
      transition: transform 0.3s ease;
    }

    .auth-card h2 {
      margin-bottom: 20px;
      color: #4f46e5;
    }

    .auth-card input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .auth-card button {
      width: 100%;
      padding: 12px;
      background: #4f46e5;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
    }

    .auth-card p {
      margin-top: 15px;
      font-size: 14px;
    }

    .auth-card p a {
      color: #4f46e5;
      text-decoration: none;
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
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="nav-container">
      <div class="logo">Edu<span>Spark</span></div>

      <ul class="nav-links">
        <li><a href="Index.html">Home</a></li>
        <li><a href="course-details.html">Courses</a></li>
        <li><a href="About.html">About</a></li>
        <li><a href="Contactus.html">Contact</a></li>
      </ul>

      <div class="nav-actions">
        <input type="text" placeholder="Search...">
        <a href="{{ route('login.form') }}"><button class="btn-outline">Login</button></a>
       <a href="Registration.html"><button class="btn-fill">Get Started</button></a> 
      </div>
    </div>
  </nav>

  <div class="auth-card">
    <h2>Create an Account</h2>
    <form method="POST" action="{{ route('register') }}">
  @csrf
  <input type="text" name="name" placeholder="Full Name" required />
  <input type="email" name="email" placeholder="Email" required />
  <input type="password" name="password" placeholder="Password" required />
  <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
  <select name="role" required>
    <option value="1">Admin</option>
    <option value="2">Teacher</option>
    <option value="3">Student</option>
  </select>
  <button type="submit">Register</button>
</form>

    <p>Already have an account? <a href="{{ route('login.form') }}">Login here</a></p>
  </div>
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

</body>
</html>
