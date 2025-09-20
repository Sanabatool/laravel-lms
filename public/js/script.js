var swiper = new Swiper('.swiper-container', {
  loop: true,
  pagination: {
      el: '.swiper-pagination',
      clickable: true,
  },
  autoplay: {
      delay: 2500,
      disableOnInteraction: false,
  },
});

// courses cards
document.addEventListener("DOMContentLoaded", () => {
  // Delete Confirmation
  document.querySelectorAll(".course-card form").forEach((form) => {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      let confirmDelete = confirm("Are you sure you want to delete this course?");
      if (confirmDelete) {
        this.submit();
      }
    });
  });

  // Smooth scroll for 'View Details' button
  document.querySelectorAll(".course-card .btn").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      if (btn.getAttribute("href") && btn.getAttribute("href").startsWith("#")) {
        e.preventDefault();
        document.querySelector(btn.getAttribute("href")).scrollIntoView({
          behavior: "smooth"
        });
      }
    });
  });
});

// packages cards
// Add hover effect with GSAP
document.querySelectorAll('.package-card').forEach(card => {
  card.addEventListener('mouseenter', () => {
      gsap.to(card, { scale: 1.1, duration: 0.2 });
  });
  card.addEventListener('mouseleave', () => {
      gsap.to(card, { scale: 1.05, duration: 0.2 });
  });
});
// packages Form input focus animation
document.querySelectorAll('.form-container input, .form-container textarea').forEach(input => {
  input.addEventListener('focus', () => {
      gsap.to(input, { borderColor: '#007bff', duration: 0.3 });
  });
  input.addEventListener('blur', () => {
      gsap.to(input, { borderColor: '#ccc', duration: 0.3 });
  });
});
