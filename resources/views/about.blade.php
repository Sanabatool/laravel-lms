<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | EduSpark</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
    body { background: #f8fbff; color: #333; line-height: 1.6; }

    /* Navbar */
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
    /* Hero */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('images/About.jpg') center/cover no-repeat;
      color: #fff; text-align: center; padding: 120px 20px;
    }
    .hero h1 { font-size: 3rem; margin-bottom: 15px; }
    .hero p { font-size: 1.2rem; max-width: 800px; margin: auto; }

    /* Section Titles */
    section { padding: 60px 8%; }
    h2.section-title { text-align: center; color: #4a60e2; margin-bottom: 20px; font-size: 2rem; }

    /* About Intro */
    .intro { text-align: center; max-width: 900px; margin: auto; font-size: 1.1rem; }

    /* Goals */
.goals {
  display: grid;
  grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
  gap: 25px;
  margin-top: 40px;
}

.goal {
  background: linear-gradient(145deg, #ffffff, #f5f7ff);
  border: 2px solid transparent;
  border-radius: 16px;
  padding: 30px 20px;
  text-align: center;
  box-shadow: 0 6px 18px rgba(0,0,0,0.08);
  position: relative;
  transition: all 0.35s ease;
  overflow: hidden;
}

.goal::before {
  content: "";
  position: absolute;
  top: -2px; left: -2px; right: -2px; bottom: -2px;
  background: linear-gradient(135deg, #4a60e2, #6d8dff);
  z-index: -1;
  border-radius: 18px;
  opacity: 0;
  transition: opacity 0.35s ease;
}

.goal:hover::before { opacity: 1; }
.goal:hover { color: #fff; transform: translateY(-8px); }

.goal .icon {
  font-size: 2rem;
  margin-bottom: 15px;
  color: #4a60e2;
  transition: 0.35s;
}

.goal:hover .icon { color: #fff; transform: scale(1.2) rotate(8deg); }

.goal h3 {
  font-size: 1.3rem;
  margin-bottom: 10px;
  font-weight: 600;
}

.goal p {
  font-size: 0.95rem;
  line-height: 1.5;
}
    /* Stats */
    .stats { display: flex; justify-content: center; gap: 60px; margin: 60px 0; text-align: center; flex-wrap: wrap; }
    .stat { font-size: 2.5rem; font-weight: bold; color: #4a60e2; }
    .stat-label { font-size: 1rem; color: #555; }

    /* Accordion */
.accordion {
  max-width: 850px;
  margin: 50px auto;
}

/* Accordion Item - fresh look */
.accordion-item {
  background: #fff;
  margin-bottom: 15px;
  border-radius: 12px;
  border-left: 6px solid #4a60e2;   /* accent border */
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  overflow: hidden;
  transition: 0.3s ease;
}
.accordion-item:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(0,0,0,0.12);
}

/* Accordion Header - clean modern */
.accordion-header {
  padding: 18px 20px;
  cursor: pointer;
  font-weight: 600;
  font-size: 1.1rem;
  display: flex; justify-content: space-between; align-items: center;
  background: linear-gradient(to right, #f5f7ff, #ffffff);
  transition: background 0.3s;
}
.accordion-header:hover {
  background: #eef2ff;
  color: #3246c5;
}

/* Accordion Content - smoother */
.accordion-content {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.4s ease, padding 0.3s ease;
  padding: 0 20px;
  color: #555;
  font-size: 0.95rem;
  line-height: 1.6;
}
.accordion-content p {
  padding: 12px 0;
}
.accordion-item.active .accordion-content {
  max-height: 500px;
  padding: 15px 20px;
  background: #fafbff;
}
    .accordion-header:hover { background: #f0f3ff; }
    .accordion-content { max-height: 0; overflow: hidden; transition: max-height 0.3s ease; padding: 0 15px; color: #555; }
    .accordion-content p { padding: 10px 0; }

    /* Team */
    .team-members { display: flex; justify-content: center; flex-wrap: wrap; gap: 20px; margin-top: 20px; }
    .member {
      background: #fff; padding: 20px; border-radius: 12px; width: 250px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08); transition: 0.3s;
    }
    .member img { width: 100%; border-radius: 10px; }
    .member:hover { transform: translateY(-10px); }
    .member h4 { margin: 10px 0 5px; }
    .member p { font-size: 0.9rem; color: #666; }
    .socials { margin-top: 10px; }
    .socials a { text-decoration: none; margin: 0 5px; font-size: 18px; color: #4a60e2; transition: 0.3s; }
    .socials a:hover { color: #222; }

    /* CTA */
    .cta { background: linear-gradient(120deg,#4a60e2,#6c8ef5); color: #fff; text-align: center; padding: 60px 20px; border-radius: 15px; margin-top: 40px; }
    .cta h2 { margin-bottom: 15px; }
    .cta button {
      background: #fff; color: #4a60e2; border: none; padding: 12px 25px;
      border-radius: 25px; cursor: pointer; font-size: 1rem; transition: 0.3s;
    }
    .cta button:hover { background: #f0f0f0; }

    /* Footer */
    footer { background: #111; color: #ddd; text-align: center; padding: 30px 10px; margin-top: 60px; }

    /* Scroll Btn */
    #scrollBtn {
      display: none; position: fixed; bottom: 20px; right: 20px;
      background: #4a60e2; color: #fff; border: none; padding: 12px 16px;
      border-radius: 50%; cursor: pointer; font-size: 18px; box-shadow: 0 3px 10px rgba(0,0,0,0.2); transition: 0.3s;
    }
    #scrollBtn:hover { background: #3246c5; }

    /* Reveal Animation */
    .reveal { opacity: 0; transform: translateY(30px); transition: 0.8s ease; }
    .reveal.active { opacity: 1; transform: translateY(0); }
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

  </style>
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
    <a href="{{ route('login.form') }}"><button class="btn-outline">Log In</button></a>
      <button class="btn-fill">Get Started</button>
    </div>
  </div>
</nav>

  <!-- Hero -->
  <section class="hero">
    <h1>About EduSpark</h1>
    <p>We empower learners worldwide with expert-led online education, designed to help you grow skills that matter.</p>
  </section>

  <!-- Intro -->
  <section class="intro reveal">
    <h2 class="section-title">Who We Are</h2>
    <p>EduSpark is a leading online learning platform, trusted by thousands of learners and organizations. 
       Our mission is to make education accessible, practical, and transformative for everyone. 
       With top instructors and career-focused learning, we bring opportunities closer to you.</p>
  </section>

  <!-- Goals -->
<section class="reveal">
  <h2 class="section-title">Our Goals</h2>
  <div class="goals">
    <div class="goal">
      <div class="icon">🎯</div>
      <h3>Accessible Learning</h3>
      <p>Bring affordable education to learners across the globe.</p>
    </div>
    <div class="goal">
      <div class="icon">💡</div>
      <h3>Skill Development</h3>
      <p>Empower students with real-world skills that employers demand.</p>
    </div>
    <div class="goal">
      <div class="icon">🚀</div>
      <h3>Innovation</h3>
      <p>Use the latest technology to make learning more engaging and effective.</p>
    </div>
    <div class="goal">
      <div class="icon">🌍</div>
      <h3>Community Growth</h3>
      <p>Build a global network of learners and educators.</p>
    </div>
  </div>
</section>
  <!-- Stats -->
  <section class="stats reveal">
    <div><div class="stat" data-target="50000">0</div><div class="stat-label">Students</div></div>
    <div><div class="stat" data-target="120">0</div><div class="stat-label">Courses</div></div>
    <div><div class="stat" data-target="200">0</div><div class="stat-label">Instructors</div></div>
    <div><div class="stat" data-target="1500">0</div><div class="stat-label">Certificates Issued</div></div>
  </section>

  <!-- Mission/Vision/Values -->
  <section class="accordion reveal">
    <h2 class="section-title">Our Principles</h2>
    <div class="accordion-item">
      <div class="accordion-header">Our Mission <span>+</span></div>
      <div class="accordion-content"><p>To provide affordable, world-class education accessible to anyone, anywhere.</p></div>
    </div>
    <div class="accordion-item">
      <div class="accordion-header">Our Vision <span>+</span></div>
      <div class="accordion-content"><p>To become the most impactful global e-learning platform for career success.</p></div>
    </div>
    <div class="accordion-item">
      <div class="accordion-header">Our Values <span>+</span></div>
      <div class="accordion-content"><p>Innovation, accessibility, and lifelong learning define our core values.</p></div>
    </div>
  </section>

  <!-- Team -->
  <section class="team reveal">
    <h2 class="section-title">Meet Our Team</h2>
    <div class="team-members">
      <div class="member"><img src="images/fatima.jpg"><h4>Fatima Abro</h4><p>AI & Data Science Expert</p><div class="socials"><a href="#">🌐</a><a href="#">🐦</a><a href="#">💼</a></div></div>
      <div class="member"><img src="images/sajjida.jpg "><h4>Sajjida Bhutto</h4><p>Cloud Computing Specialist</p><div class="socials"><a href="#">🌐</a><a href="#">🐦</a><a href="#">💼</a></div></div>
      <div class="member"><img src="images/Sana.jpg"><h4>Sana Batool</h4><p>Cybersecurity Instructor</p><div class="socials"><a href="#">🌐</a><a href="#">🐦</a><a href="#">💼</a></div></div>
        <div class="member"><img src="images/sawera.jpg"><h4>Sawera jarwar</h4><p>Social Butterfly</p><div class="socials"><a href="#">🌐</a><a href="#">🐦</a><a href="#">💼</a></div></div>

    </div>
  </section>

  <!-- FAQs -->
  <section class="accordion reveal">
    <h2 class="section-title">Frequently Asked Questions</h2>
    <div class="accordion-item">
      <div class="accordion-header">What is EduSpark? <span>+</span></div>
      <div class="accordion-content"><p>EduSpark is an online learning platform offering courses, certifications, and training from expert instructors worldwide.</p></div>
    </div>
    <div class="accordion-item">
      <div class="accordion-header">Do I get a certificate? <span>+</span></div>
      <div class="accordion-content"><p>Yes, learners receive a verified certificate upon course completion that can be shared with employers.</p></div>
    </div>
    <div class="accordion-item">
      <div class="accordion-header">Are courses self-paced? <span>+</span></div>
      <div class="accordion-content"><p>Yes, most of our courses allow you to learn at your own pace with lifetime access to course materials.</p></div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta reveal">
    <h2>Transform Your Future with EduSpark</h2>
    <p>Join thousands of learners worldwide and start your journey today.</p>
   <a href="marketplace.html"> <button>Explore Courses</button></a>
  </section>

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


  <!-- Scroll Btn -->
  <button id="scrollBtn">↑</button>

  <script>
    // Scroll to Top
    const scrollBtn = document.getElementById("scrollBtn");
    window.onscroll = function() {
      if (document.documentElement.scrollTop > 200) scrollBtn.style.display = "block";
      else scrollBtn.style.display = "none";
      revealOnScroll();
    };
    scrollBtn.onclick = () => window.scrollTo({top: 0, behavior: 'smooth'});

    // Counters
    const counters = document.querySelectorAll(".stat");
    let started = false;
    function runCounters() {
      counters.forEach(counter => {
        let target = +counter.getAttribute("data-target");
        let count = 0, step = target / 100;
        let update = setInterval(() => {
          count += step;
          if(count >= target) { counter.textContent = target.toLocaleString(); clearInterval(update); }
          else { counter.textContent = Math.floor(count); }
        }, 20);
      });
    }
    window.addEventListener("scroll", () => {
      const stats = document.querySelector(".stats");
      if(!started && window.scrollY + window.innerHeight >= stats.offsetTop) {
        runCounters(); started = true;
      }
    });

    // Accordion
    document.querySelectorAll(".accordion-header").forEach(header => {
      header.addEventListener("click", () => {
        let content = header.nextElementSibling;
        let icon = header.querySelector("span");
        document.querySelectorAll(".accordion-content").forEach(c => {
          if(c !== content) { c.style.maxHeight = null; c.previousElementSibling.querySelector("span").textContent = "+"; }
        });
        if(content.style.maxHeight) { content.style.maxHeight = null; icon.textContent = "+"; }
        else { content.style.maxHeight = content.scrollHeight + "px"; icon.textContent = "-"; }
      });
    });

    // Reveal
    function revealOnScroll() {
      document.querySelectorAll(".reveal").forEach(el => {
        let windowHeight = window.innerHeight;
        let revealTop = el.getBoundingClientRect().top;
        if(revealTop < windowHeight - 50) { el.classList.add("active"); }
      });
    }
    revealOnScroll();
  </script>
</body>
</html>
