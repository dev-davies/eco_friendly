// ===================================
// Novel Homes - Interactive Features
// ===================================

// ===================================
// 1. Fade-In Observer for Sections
// ===================================
const observerOptions = {
  root: null,
  threshold: 0.15,
  rootMargin: "0px 0px -50px 0px",
};

const fadeInObserver = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("fade-in-visible");
      // Optional: Stop observing after animation to improve performance
      fadeInObserver.unobserve(entry.target);
    }
  });
}, observerOptions);

// Initialize fade-in on all sections
function initFadeInAnimations() {
  const sections = document.querySelectorAll(
    "section, .product-card, .footer-column"
  );

  sections.forEach((section) => {
    section.classList.add("fade-in-element");
    fadeInObserver.observe(section);
  });
}

// ===================================
// 2. Sticky Header with Shadow
// ===================================
function initStickyHeader() {
  const header = document.querySelector(".header");
  let lastScrollY = window.scrollY;

  window.addEventListener("scroll", () => {
    const currentScrollY = window.scrollY;

    // Add shadow when scrolled down
    if (currentScrollY > 50) {
      header.classList.add("header-scrolled");
    } else {
      header.classList.remove("header-scrolled");
    }

    lastScrollY = currentScrollY;
  });
}

// ===================================
// 3. Image Lazy Loading with Fade
// ===================================
function initImageLazyLoading() {
  const images = document.querySelectorAll("img");

  images.forEach((img) => {
    // Set initial opacity to 0
    img.style.opacity = "0";
    img.style.transition = "opacity 0.6s ease-in-out";

    // Check if image is already loaded (cached)
    if (img.complete) {
      img.style.opacity = "1";
    } else {
      // Wait for image to load
      img.addEventListener("load", () => {
        setTimeout(() => {
          img.style.opacity = "1";
        }, 100); // Small delay for smoother effect
      });

      // Handle error case
      img.addEventListener("error", () => {
        img.style.opacity = "1"; // Still show the broken image placeholder
      });
    }
  });
}

// ===================================
// 4. Smooth Scroll for Navigation
// ===================================
function initSmoothScroll() {
  const navLinks = document.querySelectorAll('a[href^="#"]');

  navLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      const href = link.getAttribute("href");

      // Skip if it's just '#'
      if (href === "#" || href === "#home") {
        e.preventDefault();
        window.scrollTo({
          top: 0,
          behavior: "smooth",
        });
        return;
      }

      const target = document.querySelector(href);

      if (target) {
        e.preventDefault();
        const headerHeight = document.querySelector(".header").offsetHeight;
        const targetPosition = target.offsetTop - headerHeight - 20;

        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });
      }
    });
  });
}

// ===================================
// 5. Mobile Menu Toggle (Optional)
// ===================================
function initMobileMenu() {
  // This can be expanded if you add a hamburger menu later
  const navbar = document.querySelector(".navbar");

  // Add a simple class for mobile detection
  function checkMobile() {
    if (window.innerWidth <= 768) {
      navbar.classList.add("mobile-nav");
    } else {
      navbar.classList.remove("mobile-nav");
    }
  }

  checkMobile();
  window.addEventListener("resize", checkMobile);
}

// ===================================
// Initialize All Features
// ===================================
document.addEventListener("DOMContentLoaded", () => {
  // Initialize all interactive features
  initFadeInAnimations();
  initStickyHeader();
  initImageLazyLoading();
  initSmoothScroll();
  initMobileMenu();

  console.log("Novel Homes: All features initialized ✓");
});

// ===================================
// Handle Page Visibility for Performance
// ===================================
document.addEventListener("visibilitychange", () => {
  if (document.hidden) {
    // Pause animations when tab is not visible (optional optimization)
  } else {
    // Resume animations when tab becomes visible
  }
});
