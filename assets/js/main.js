/**
 * TRAVELJO CEYLON TOURS — Main JavaScript
 * main.js
 */

'use strict';

// ── UTILITIES ─────────────────────────────────────────────
const $ = (selector, ctx = document) => ctx.querySelector(selector);
const $$ = (selector, ctx = document) => [...ctx.querySelectorAll(selector)];

// ── STICKY NAV / SCROLL EFFECTS ──────────────────────────
const header = $('#site-header');

function updateNav() {
  if (!header) return;

  if (window.scrollY > 80) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
}

window.addEventListener('scroll', updateNav, { passive: true });
updateNav();

// ── HERO SLIDER (Swiper) ──────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
  const heroEl = $('.hero .swiper');

  if (heroEl) {
    new Swiper(heroEl, {
      loop: true,
      speed: 900,
      autoplay: {
        delay: 5500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      effect: 'fade',
      fadeEffect: { crossFade: true },
      pagination: {
        el: '.hero .swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.hero .swiper-button-next',
        prevEl: '.hero .swiper-button-prev',
      },
      a11y: {
        prevSlideMessage: 'Previous slide',
        nextSlideMessage: 'Next slide',
      },
    });
  }

  // ── TESTIMONIALS SLIDER ─────────────────────────────────
  const testimonialsEl = $('.testimonials-swiper');

  if (testimonialsEl) {
    new Swiper(testimonialsEl, {
      loop: true,
      speed: 700,
      slidesPerView: 1,
      spaceBetween: 24,
      autoplay: {
        delay: 6000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.testimonials-swiper .swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      },
    });
  }
});

// ── MOBILE MENU ───────────────────────────────────────────
const hamburger    = $('#hamburger');
const mobileMenu   = $('#mobile-menu');
const mobileClose  = $('#mobile-close');

function openMobileMenu() {
  mobileMenu?.classList.add('open');
  hamburger?.classList.add('open');
  hamburger?.setAttribute('aria-expanded', 'true');
  document.body.style.overflow = 'hidden';
}

function closeMobileMenu() {
  mobileMenu?.classList.remove('open');
  hamburger?.classList.remove('open');
  hamburger?.setAttribute('aria-expanded', 'false');
  document.body.style.overflow = '';
}

hamburger?.addEventListener('click', () => {
  if (mobileMenu?.classList.contains('open')) {
    closeMobileMenu();
  } else {
    openMobileMenu();
  }
});

mobileClose?.addEventListener('click', closeMobileMenu);

// Close on ESC
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    closeMobileMenu();
    closeEnquiryModal();
  }
});

// ── ENQUIRY MODAL ─────────────────────────────────────────
const modalOverlay = $('#enquiry-modal-overlay');

function openEnquiryModal(tourId = '') {
  let url = getBasePath() + '/plan-your-trip';
  if (tourId) url += '?tour_id=' + tourId;
  window.location.href = url;
}

// Keep closeEnquiryModal for backwards compatibility just in case
function closeEnquiryModal() {}

// Make globally accessible
window.openEnquiryModal  = openEnquiryModal;
window.closeEnquiryModal = closeEnquiryModal;
window.closeMobileMenu   = closeMobileMenu;

// ── AOS — ANIMATE ON SCROLL ───────────────────────────────
function initAOS() {
  const items = $$('[data-aos]');
  if (!items.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const delay = parseInt(el.dataset.aosDelay ?? '0', 10);
        setTimeout(() => el.classList.add('aos-animate'), delay);
        observer.unobserve(el);
      }
    });
  }, {
    threshold: 0.12,
    rootMargin: '0px 0px -40px 0px',
  });

  items.forEach((item) => observer.observe(item));
}

document.addEventListener('DOMContentLoaded', initAOS);

// ── SMOOTH SCROLL ─────────────────────────────────────────
$$('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener('click', function (e) {
    const target = $(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

// ── TOAST NOTIFICATION ────────────────────────────────────
let toastTimeout;

function showToast(message, type = 'success') {
  const toast = $('#toast');
  if (!toast) return;

  clearTimeout(toastTimeout);
  toast.className = `toast toast-${type}`;
  toast.textContent = message;

  requestAnimationFrame(() => {
    requestAnimationFrame(() => toast.classList.add('show'));
  });

  toastTimeout = setTimeout(() => {
    toast.classList.remove('show');
  }, 4500);
}

window.showToast = showToast;

// ── LAZY LOAD IMAGES ──────────────────────────────────────
if ('loading' in HTMLImageElement.prototype) {
  // Native lazy load supported — done via HTML attribute
} else {
  // Polyfill for older browsers
  const lazyImages = $$('img[loading="lazy"]');
  const imageObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const img = entry.target;
        if (img.dataset.src) img.src = img.dataset.src;
        imageObserver.unobserve(img);
      }
    });
  });
  lazyImages.forEach((img) => imageObserver.observe(img));
}

// ── DESTINATION TILE HOVER PARALLAX ──────────────────────
$$('.dest-tile').forEach((tile) => {
  tile.addEventListener('mousemove', (e) => {
    const rect = tile.getBoundingClientRect();
    const x = ((e.clientX - rect.left) / rect.width - 0.5) * 8;
    const y = ((e.clientY - rect.top) / rect.height - 0.5) * 8;
    tile.style.transform = `perspective(1000px) rotateY(${x}deg) rotateX(${-y}deg)`;
  });

  tile.addEventListener('mouseleave', () => {
    tile.style.transform = '';
  });
});
