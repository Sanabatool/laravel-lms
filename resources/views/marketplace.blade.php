<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>EduSpark Marketplace</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      color: #111;
    }

    header {
      background: #4f46e5;
      color: #fff;
      padding: 40px 20px;
      text-align: center;
    }

    header h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
    }

    header p {
      max-width: 600px;
      margin: 0 auto;
      font-size: 1rem;
      color: #e0e7ff;
    }

    nav {
      background: #fff;
      padding: 10px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #ddd;
    }
    nav .logo {
      font-size: 24px;
      font-weight: bold;
      color: #4f46e5;
    }
    nav .cart-icon {
      position: relative;
      cursor: pointer;
      font-size: 24px;
    }
    nav .cart-count {
      position: absolute;
      top: -8px;
      right: -10px;
      background: #dc3545;
      color: #fff;
      border-radius: 50%;
      padding: 2px 6px;
      font-size: 12px;
    }
    .cart-popup {
      display: none;
      position: absolute;
      right: 40px;
      top: 60px;
      width: 250px;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      z-index: 100;
    }
    .cart-popup ul {
      list-style: none;
      margin: 0;
      padding: 10px;
      max-height: 200px;
      overflow-y: auto;
    }
    .cart-popup li {
      border-bottom: 1px solid #eee;
      padding: 8px 0;
      font-size: 14px;
    }
    .cart-popup p {
      padding: 10px;
      margin: 0;
      font-weight: bold;
    }

    .container {
      max-width: 1200px;
      margin: auto;
      padding: 40px 20px;
      text-align: center;
    }

    .filter-buttons {
      margin-bottom: 40px;
    }

    .filter-buttons button {
      background-color: #fff;
      border: 1px solid #ddd;
      color: #333;
      padding: 10px 15px;
      margin: 5px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .filter-buttons button.active,
    .filter-buttons button:hover {
      background-color: #4f46e5;
      color: white;
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      margin-bottom: 30px;
    }

    .card {
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      padding: 20px;
      text-align: left;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 10px;
    }

    .card .tag {
      background-color: #e0f2fe;
      color: #0369a1;
      font-size: 0.75rem;
      padding: 4px 10px;
      border-radius: 20px;
      display: inline-block;
      margin-bottom: 10px;
    }

    .card h3 {
      font-size: 1.1rem;
      margin: 5px 0;
    }

    .card .details,
    .card .rating,
    .card .price {
      font-size: 0.9rem;
      color: #555;
    }

    .card .price span {
      font-weight: bold;
      color: #111;
    }

    .card button {
      background-color: #4f46e5;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      margin-top: 10px;
      cursor: pointer;
    }

    .card button:hover {
      background-color: #3730a3;
    }
    .carousel-wrapper {
  position: relative;
  overflow: hidden;
}

.carousel {
  display: flex;
  overflow-x: auto;
  scroll-behavior: smooth;
  -webkit-overflow-scrolling: touch;
  gap: 20px;
  padding: 20px 0;
}

.carousel::-webkit-scrollbar {
  display: none; /* Hide scroll bar */
}

.carousel .card {
  flex: 0 0 250px;
  min-width: 250px;
}

.carousel-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: #4f46e5;
  color: #fff;
  border: none;
  font-size: 2rem;
  padding: 5px 15px;
  cursor: pointer;
  z-index: 10;
  border-radius: 50%;
}

.carousel-btn.prev {
  left: -10px;
}

.carousel-btn.next {
  right: -10px;
}
.cta-section {
  background: #0f172a;
  color: #fff;
  text-align: center;
  padding: 80px 20px;
}

.cta-section h2 {
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.cta-section p {
  font-size: 1rem;
  margin-bottom: 30px;
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
}

.cta-buttons .btn-primary,
.cta-buttons .btn-secondary {
  display: inline-block;
  padding: 12px 24px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
  margin: 5px;
}

.btn-primary {
  background: #4f46e5;
  color: #fff;
}

.btn-secondary {
  border: 1px solid #fff;
  color: #fff;
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

  </style>
</head>
<body>

<nav class="navbar">
    <div class="logo">Edu<span>Spark</span></div>
    <ul class="nav-links">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('marketplace') }}">Courses</a></li>
      <li><a href="{{ route('about') }}">About</a></li>
      <li><a href="{{ route('Contactus') }}">Contact</a></li>
    </ul>

  <div class="cart-icon" onclick="toggleCartPopup()">
    🛒
    <span class="cart-count" id="cart-count">0</span>
    <div class="cart-popup" id="cart-popup">
      <ul id="cart-items"></ul>
      <p id="cart-total">Total: $0.00</p>
    </div>
  </div>
</nav>

<header>
  <h1>Explore Our Marketplace</h1>
  <p>Discover thousands of engaging courses, eBooks, templates, and study kits taught and designed by experts from around the world.</p>
</header>

<section class="marketplace">
  <div class="container">
    <section class="marketplace">
  <div class="container">
        <div class="filter-buttons">
      <button class="active" data-filter="All">All Products</button>
      <button data-filter="eBook">eBooks</button>
      <button data-filter="Templates">Templates</button>
      <button data-filter="Study Kit">Study Kits</button>
      <button data-filter="Physical Book">Physical Books</button>
    </div>

    <h2>Featured Products</h2>

    <div class="carousel-wrapper">
      <button class="carousel-btn prev">‹</button>

      <div class="carousel" id="carousel">
        <!-- CARD 1 -->
        <div class="card" data-category="eBook">
          <img src="images/image2.jpg" alt="Data Science eBook">
          <span class="tag">eBook</span>
          <h3>Data Science eBook</h3>
          <p class="details">📄 450 Pages | PDF + EPUB</p>
          <p class="rating">⭐ 4.6 (44 reviews)</p>
          <p class="price"><span>$13.99</span> <del>$19.99</del></p>
       <a href="cart2.html">  <button onclick="addToCart('Data Science eBook', 13.99)">Add To Cart</button>
 </a>        </div>

        <!-- CARD 2 -->
        <div class="card" data-category="Study Kit">
          <img src="images/image3.jpg" alt="Web Dev Study Kit">
          <span class="tag">Study Kit</span>
          <h3>Web Dev Study Kit</h3>
          <p class="details">📦 8 Items | Study Kit</p>
          <p class="rating">⭐ 4.5 (38 reviews)</p>
          <p class="price"><span>$39.99</span></p>
          <button onclick="addToCart('Web Dev Study Kit', 39.99)">Add To Cart</button>
        </div>
        <div class="card">
          <img src="images/image2.jpg" alt="Data Science eBook" />
          <span class="tag">eBook</span>
          <h3>Data Science eBook</h3>
          <p class="details">📄 450 Pages | PDF + EPUB</p>
          <p class="rating">⭐ 4.6 (44 reviews)</p>
          <p class="price"><span>$13.99</span></p>
         <a href="cart3.html"> <button>Add To Cart</button></a>
        </div>
        <div class="card">
          <img src="images/image2.jpg" alt="Data Science eBook" />
          <span class="tag">eBook</span>
          <h3>Data Science eBook</h3>
          <p class="details">📄 450 Pages | PDF + EPUB</p>
          <p class="rating">⭐ 4.6 (44 reviews)</p>
          <p class="price"><span>$13.99</span></p>
        <a href="cart3.html"> <button>Add To Cart</button></a> 
        </div>
        <div class="card">
          <img src="images/image2.jpg" alt="Data Science eBook" />
          <span class="tag">eBook</span>
          <h3>Data Science eBook</h3>
          <p class="details">📄 450 Pages | PDF + EPUB</p>
          <p class="rating">⭐ 4.6 (44 reviews)</p>
          <p class="price"><span>$13.99</span></p>
     <a href="cart3.html"></a>     <button>Add To Cart</button></a> 
        </div>

        <!-- CARD 3 -->
        <div class="card" data-category="Templates">
          <img src="images/image4.jpg" alt="Success Planner">
          <span class="tag">Templates</span>
          <h3>Success Planner</h3>
          <p class="details">📁 12 Templates | Download</p>
          <p class="rating">⭐ 4.6 (48 reviews)</p>
          <p class="price"><span>$39.99</span></p>
         <a href="cart5.html"> <button onclick="addToCart('Success Planner', 39.99)">Add To Cart</button>
       </a> </div>

        <!-- CARD 4 -->
        <div class="card" data-category="Physical Book">
          <img src="images/images.jpg" alt="Design Fundamental">
          <span class="tag">Physical Book</span>
          <h3>Design Fundamental</h3>
          <p class="details">📄 400 Pages | Hardcover</p>
          <p class="rating">⭐ 4.8 (66 reviews)</p>
          <p class="price"><span>$39.99</span></p>
        <a href="cart3.html"> <button onclick="addToCart('Design Fundamental', 39.99)">Add To Cart</button>
      </a>   </div>

        <!-- CARD 5 -->
        <div class="card" data-category="eBook">
          <img src="images/image5.jpg" alt="Python Mastery">
          <span class="tag">eBook</span>
          <h3>Python Mastery</h3>
          <p class="details">📄 550 Pages | PDF</p>
          <p class="rating">⭐ 4.7 (88 reviews)</p>
          <p class="price"><span>$15.99</span></p>
        <a href="cart2.html"></a>  <button onclick="addToCart('Python Mastery', 15.99)">Add To Cart</button>
      </a>   </div>

        <!-- CARD 6 -->
        <div class="card" data-category="Templates">
          <img src="images/image6.jpg" alt="Business Templates">
          <span class="tag">Templates</span>
          <h3>Business Templates</h3>
          <p class="details">📁 20 Templates | DOCX</p>
          <p class="rating">⭐ 4.9 (102 reviews)</p>
          <p class="price"><span>$29.99</span></p>
         <a href="cart1.html"></a> <button onclick="addToCart('Business Templates', 29.99)">Add To Cart</button>
        </div>
      </div>

      <button class="carousel-btn next">›</button>
    </div>
  </div>
</section>

    <div class="product-grid">
      <!-- Example Cards -->
      <div class="card" data-category="eBook">
        <img src="images/image2.jpg" alt="Data Science eBook">
        <span class="tag">eBook</span>
        <h3>Data Science eBook</h3>
        <p class="details">📄 450 Pages | PDF + EPUB</p>
        <p class="rating">⭐ 4.6 (44 reviews)</p>
        <p class="price"><span>$13.99</span> <del>$19.99</del></p>
        <button onclick="addToCart('Data Science eBook', 13.99)">Add To Cart</button>
      </div>

      <div class="card" data-category="Study Kit">
        <img src="images/image3.jpg" alt="Web Dev Study Kit">
        <span class="tag">Study Kit</span>
        <h3>Web Dev Study Kit</h3>
        <p class="details">📦 8 Items | Study Kit</p>
        <p class="rating">⭐ 4.5 (38 reviews)</p>
        <p class="price"><span>$39.99</span></p>
        <button onclick="addToCart('Web Dev Study Kit', 39.99)">Add To Cart</button>
      </div>

      <div class="card" data-category="Templates">
        <img src="images/image4.jpg" alt="Success Planner">
        <span class="tag">Templates</span>
        <h3>Success Planner</h3>
        <p class="details">📁 12 Templates | Download</p>
        <p class="rating">⭐ 4.6 (48 reviews)</p>
        <p class="price"><span>$39.99</span></p>
        <button onclick="addToCart('Success Planner', 39.99)">Add To Cart</button>
      </div>

      <div class="card" data-category="Physical Book">
        <img src="images/images.jpg" alt="Design Fundamental">
        <span class="tag">Physical Book</span>
        <h3>Design Fundamental</h3>
        <p class="details">📄 400 Pages | Hardcover</p>
        <p class="rating">⭐ 4.8 (66 reviews)</p>
        <p class="price"><span>$39.99</span></p>
        <button onclick="addToCart('Design Fundamental', 39.99)">Add To Cart</button>
      </div>
    </div>

  </div>
</section>

<script>
// ✅ FILTER BUTTONS
const filterButtons = document.querySelectorAll('.filter-buttons button');
const cards = document.querySelectorAll('.card');

filterButtons.forEach(button => {
  button.addEventListener('click', () => {
    document.querySelector('.filter-buttons .active').classList.remove('active');
    button.classList.add('active');

    const filter = button.getAttribute('data-filter');

    cards.forEach(card => {
      const category = card.getAttribute('data-category');
      card.style.display = (filter === 'All' || category === filter) ? 'block' : 'none';
    });
  });
});

// ✅ ADD TO CART
const cartItems = [];

function addToCart(name, price) {
  cartItems.push({ name, price });
  updateCart();
}

function updateCart() {
  const cartList = document.getElementById('cart-items');
  const cartCount = document.getElementById('cart-count');
  const cartTotal = document.getElementById('cart-total');

  cartList.innerHTML = '';
  let total = 0;

  cartItems.forEach(item => {
    const li = document.createElement('li');
    li.textContent = `${item.name} - $${item.price.toFixed(2)}`;
    cartList.appendChild(li);
    total += item.price;
  });

  cartCount.textContent = cartItems.length;
  cartTotal.textContent = `Total: $${total.toFixed(2)}`;
}

// ✅ TOGGLE CART POPUP
function toggleCartPopup() {
  const popup = document.getElementById('cart-popup');
  popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
}

// ✅ CLOSE CART WHEN CLICKING OUTSIDE
window.onclick = function(e) {
  const popup = document.getElementById('cart-popup');
  const icon = document.querySelector('.cart-icon');
  if (popup && icon && !icon.contains(e.target) && !popup.contains(e.target)) {
    popup.style.display = 'none';
  }
};

// ✅ CAROUSEL ARROWS
const carousel = document.getElementById('carousel');
const nextBtn = document.querySelector('.carousel-btn.next');
const prevBtn = document.querySelector('.carousel-btn.prev');

if (nextBtn && prevBtn && carousel) {
  nextBtn.addEventListener('click', () => {
    carousel.scrollBy({ left: 300, behavior: 'smooth' });
  });

  prevBtn.addEventListener('click', () => {
    carousel.scrollBy({ left: -300, behavior: 'smooth' });
  });
}






// ✅ FILTER BUTTONS
// const filterButtons = document.querySelectorAll('.filter-buttons button');
// const cards = document.querySelectorAll('.card');

// filterButtons.forEach(button => {
//   button.addEventListener('click', () => {
//     document.querySelector('.filter-buttons .active').classList.remove('active');
//     button.classList.add('active');

//     const filter = button.getAttribute('data-filter');

//     cards.forEach(card => {
//       const category = card.getAttribute('data-category');
//       card.style.display = (filter === 'All' || category === filter) ? 'block' : 'none';
//     });
//   });
// });

// // ✅ ADD TO CART
// const cartItems = [];

// function addToCart(name, price) {
//   cartItems.push({ name, price });
//   updateCart();
// }

// function updateCart() {
//   const cartList = document.getElementById('cart-items');
//   const cartCount = document.getElementById('cart-count');
//   const cartTotal = document.getElementById('cart-total');

//   if (!cartList || !cartCount || !cartTotal) return;

//   cartList.innerHTML = '';
//   let total = 0;

//   cartItems.forEach(item => {
//     const li = document.createElement('li');
//     li.textContent = `${item.name} - $${item.price.toFixed(2)}`;
//     cartList.appendChild(li);
//     total += item.price;
//   });

//   cartCount.textContent = cartItems.length;
//   cartTotal.textContent = `Total: $${total.toFixed(2)}`;
// }

// // ✅ TOGGLE CART POPUP
// function toggleCartPopup() {
//   const popup = document.getElementById('cart-popup');
//   if (popup) {
//     popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
//   }
// }

// // ✅ CLOSE CART WHEN CLICKING OUTSIDE
// window.onclick = function (e) {
//   const popup = document.getElementById('cart-popup');
//   const icon = document.querySelector('.cart-icon');
//   if (popup && icon && !icon.contains(e.target) && !popup.contains(e.target)) {
//     popup.style.display = 'none';
//   }
// };

// // ✅ CAROUSEL ARROWS + AUTO SCROLL
// const carousel = document.getElementById('carousel');
// const nextBtn = document.querySelector('.carousel-btn.next');
// const prevBtn = document.querySelector('.carousel-btn.prev');

// if (nextBtn && prevBtn && carousel) {
//   nextBtn.addEventListener('click', () => {
//     carousel.scrollBy({ left: 300, behavior: 'smooth' });
//   });

//   prevBtn.addEventListener('click', () => {
//     carousel.scrollBy({ left: -300, behavior: 'smooth' });
//   });

//   // ✅ CLONE CARDS for infinite loop
//   const cards = carousel.querySelectorAll('.card');
//   cards.forEach(card => {
//     const clone = card.cloneNode(true);
//     carousel.appendChild(clone);
//   });

//   let scrollAmount = 0;

//   function autoScroll() {
//     scrollAmount += 1; // speed: increase for faster scroll
//     carousel.scrollLeft = scrollAmount;
//     if (scrollAmount >= carousel.scrollWidth / 2) {
//       scrollAmount = 0;
//       carousel.scrollLeft = 0;
//     }
//     requestAnimationFrame(autoScroll);
//   }

//   autoScroll();
// }


</script>
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

</body>
</html>
