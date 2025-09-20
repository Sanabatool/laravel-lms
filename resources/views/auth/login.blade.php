<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | EduSpark</title>
  <style>
    /* Global Reset */
    ** {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', sans-serif;
}

.login-container {
  margin-top: 80px;   /* ✅ space from navbar */
  padding: 40px;
  margin-left: 400px;
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.1);
  text-align: center;
  transition: transform 0.3s ease;
    align-items: center;

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

    .login-container {
      width: 380px;
      padding: 40px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.1);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .login-container:hover {
      transform: translateY(-5px);
    }

    .login-container h2 {
      margin-bottom: 20px;
      font-size: 26px;
      color: #333;
    }

    .input-group {
      margin-bottom: 18px;
      text-align: left;
    }

    .input-group label {
      font-size: 14px;
      color: #555;
      margin-bottom: 6px;
      display: block;
    }

    .input-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 12px;
      outline: none;
      font-size: 15px;
      transition: all 0.3s ease;
    }

    .input-group input:focus {
      border-color: #5c67f2;
      box-shadow: 0 0 8px rgba(92,103,242,0.2);
    }

    .login-btn {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(135deg, #5c67f2, #6a76ff);
      color: #fff;
      border-radius: 12px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .login-btn:hover {
      background: linear-gradient(135deg, #4b55e1, #5c67f2);
      transform: scale(1.02);
    }

    .extra-links {
      margin-top: 16px;
      font-size: 14px;
    }

    .extra-links a {
      color: #5c67f2;
      text-decoration: none;
      margin: 0 5px;
    }

    .extra-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div>
<nav class="navbar">
  <div class="nav-container">
    <div class="logo">Edu<span>Spark</span></div>

    <ul class="nav-links">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="course-details.html">Courses</a></li>
      <li><a href="About.html">About</a></li>
      <li><a href="#">Contact</a></li>
    </ul>

    <div class="nav-actions">
      <input type="text" placeholder="Search...">
      <button class="btn-outline">Login</button>
      <button class="btn-fill">Get Started</button>
    </div>
  </div>
</nav>
</div>
  <div class="login-container">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
  @endif
  @if (Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
  @endif
    
    <h2>Welcome Back 👋</h2>
    <form method="POST" action="{{ route('login.submit') }}" id="loginForm">
        @csrf
      <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>
    </div>
    <button type="submit" class="login-btn">Login</button>
    </form>
    <div class="extra-links">
      <a href="#">Forgot Password?</a> | 
      <a href="{{ route('register') }}">Create Account</a>
    </div>
  </div>


<!-- CTA Section -->
<section style="background: linear-gradient(135deg,#4a60e2,#6d8dff); color:#fff; text-align:center; padding:60px 20px; border-radius:16px; margin:50px auto; max-width:1200px;">
  <div style="max-width:800px; margin:0 auto;">
    <h2 style="font-size:2rem; margin-bottom:20px; line-height:1.3;">Transform Your Future With <br>Expert-Led Learning</h2>
    <p style="font-size:1rem; margin-bottom:30px; line-height:1.6;">Stay updated with the latest announcements, platform updates, community news, and exciting new features coming soon.</p>
    <div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap;">
      <a href="#" style="background:#fff; color:#4a60e2; padding:12px 24px; border-radius:8px; font-weight:600; text-decoration:none; transition:0.3s;">Start Learning Now →</a>
      <a href="#" style="background:transparent; border:2px solid #fff; color:#fff; padding:12px 24px; border-radius:8px; font-weight:600; text-decoration:none; transition:0.3s;">View Success Story</a>
    </div>
  </div>
</section>

<!-- Footer -->
<footer style="background:#f9f9f9; padding:50px 20px 20px;">
  <div style="display:flex; flex-wrap:wrap; justify-content:space-between; gap:40px; max-width:1200px; margin:0 auto;">
    
    <!-- Brand -->
    <div style="flex:1 1 250px;">
      <h3 style="font-size:1.5rem; margin-bottom:10px;">EduSpark 🎓</h3>
      <p style="margin-bottom:20px;">Empowering individuals and organizations through high-quality online education and skill development.</p>
      <div>
        <a href="#" style="display:inline-block; margin-right:10px; font-size:1.2rem; color:#0f172a;"><i class="fab fa-facebook-f"></i></a>
        <a href="#" style="display:inline-block; margin-right:10px; font-size:1.2rem; color:#0f172a;"><i class="fab fa-twitter"></i></a>
        <a href="#" style="display:inline-block; margin-right:10px; font-size:1.2rem; color:#0f172a;"><i class="fab fa-instagram"></i></a>
        <a href="#" style="display:inline-block; margin-right:10px; font-size:1.2rem; color:#0f172a;"><i class="fab fa-youtube"></i></a>
        <a href="#" style="display:inline-block; margin-right:10px; font-size:1.2rem; color:#0f172a;"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>

    <!-- Links -->
    <div style="display:flex; flex:3 1 700px; flex-wrap:wrap; gap:40px;">
      <div>
        <h4 style="font-size:1rem; margin-bottom:10px;">Quick Links</h4>
        <ul style="list-style:none; padding:0; margin:0;">
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Home</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Courses</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Pricing</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Marketplace</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Become an Instructor</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Affiliate Program</a></li>
        </ul>
      </div>

      <div>
        <h4 style="font-size:1rem; margin-bottom:10px;">Resources</h4>
        <ul style="list-style:none; padding:0; margin:0;">
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Blog</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Help Center</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Career Resources</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Student Success Story</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Instructor Resources</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Learning Paths</a></li>
        </ul>
      </div>

      <div>
        <h4 style="font-size:1rem; margin-bottom:10px;">Legal & Access</h4>
        <ul style="list-style:none; padding:0; margin:0;">
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Terms of Service</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Privacy Policy</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Cookie Policy</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Sitemap</a></li>
        </ul>
      </div>

      <div>
        <h4 style="font-size:1rem; margin-bottom:10px;">Company</h4>
        <ul style="list-style:none; padding:0; margin:0;">
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">About Us</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Press</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Partners</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Contact Us</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Accessibility</a></li>
          <li style="margin-bottom:8px;"><a href="#" style="color:#333; text-decoration:none;">Investors</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Bottom -->
  <div style="border-top:1px solid #ddd; margin-top:40px; padding-top:20px; display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center; max-width:1200px; margin-left:auto; margin-right:auto;">
    <p style="margin:0;">© 2025 HubMoe LMS. All rights reserved.</p>
    <div>
      <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa" style="height:24px; margin-right:10px;" />
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/MasterCard_Logo.svg" alt="MasterCard" style="height:24px; margin-right:10px;" />
      <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Google_Pay_Logo.svg" alt="Google Pay" style="height:24px; margin-right:10px;" />
    </div>
    <div>
      <select style="margin-left:10px; padding:6px 10px;">
        <option>🌐 English</option>
      </select>
      <select style="margin-left:10px; padding:6px 10px;">
        <option>💲 Currency</option>
      </select>
    </div>
  </div>
</footer>

</body>
</html>
