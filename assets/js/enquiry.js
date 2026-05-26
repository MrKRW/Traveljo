/**
 * TRAVELJO CEYLON TOURS — Enquiry Form Handler
 * enquiry.js
 */

'use strict';

document.addEventListener('DOMContentLoaded', () => {
  const form      = document.getElementById('enquiry-form');
  const submitBtn = document.getElementById('enq-submit');
  const btnText   = document.getElementById('enq-btn-text');
  const spinner   = document.getElementById('enq-spinner');

  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    // Basic client-side validation
    const name  = form.querySelector('#enq-name').value.trim();
    const email = form.querySelector('#enq-email').value.trim();

    if (!name) {
      showToast('Please enter your name.', 'error');
      form.querySelector('#enq-name').focus();
      return;
    }

    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      showToast('Please enter a valid email address.', 'error');
      form.querySelector('#enq-email').focus();
      return;
    }

    // Show loading state
    setLoading(true);

    try {
      const formData = new FormData(form);

      // Detect base path for XAMPP
      const basePath = getBasePath();

      const response = await fetch(basePath + '/enquiry/submit', {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
      });

      const data = await response.json();

      if (data.success) {
        showToast('✅ ' + data.message, 'success');
        closeEnquiryModal();
        form.reset();
      } else {
        showToast('❌ ' + (data.message || 'Something went wrong. Please try again.'), 'error');
      }
    } catch (err) {
      console.error('Enquiry submit error:', err);
      showToast('❌ Network error. Please check your connection.', 'error');
    } finally {
      setLoading(false);
    }
  });

  function setLoading(loading) {
    submitBtn.disabled = loading;
    if (loading) {
      btnText.textContent = 'Sending…';
      spinner.style.display = 'block';
    } else {
      btnText.textContent = 'Send My Enquiry';
      spinner.style.display = 'none';
    }
  }

  // ── NEWSLETTER FORM ─────────────────────────────────────
  const newsletterForm = document.getElementById('newsletter-form');

  if (newsletterForm) {
    newsletterForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      const emailInput = newsletterForm.querySelector('[name="email"]');
      const email = emailInput?.value.trim();

      if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showToast('Please enter a valid email address.', 'error');
        return;
      }

      const btn = newsletterForm.querySelector('button[type="submit"]');
      const origText = btn?.textContent;
      if (btn) {
        btn.disabled = true;
        btn.textContent = 'Subscribing…';
      }

      try {
        const formData = new FormData(newsletterForm);
        const basePath = getBasePath();

        const response = await fetch(basePath + '/newsletter/subscribe', {
          method: 'POST',
          body: formData,
          headers: { 'X-Requested-With': 'XMLHttpRequest' },
        });

        const data = await response.json();

        if (data.success) {
          showToast('🎉 ' + data.message, 'success');
          newsletterForm.reset();
        } else {
          showToast('❌ ' + (data.message || 'Could not subscribe. Please try again.'), 'error');
        }
      } catch (err) {
        showToast('❌ Network error. Please try again.', 'error');
      } finally {
        if (btn) {
          btn.disabled = false;
          btn.textContent = origText;
        }
      }
    });
  }
});

/**
 * Detect base path for XAMPP subdirectory installation
 * e.g. http://localhost/Traveljo → /Traveljo
 */
function getBasePath() {
  const scripts = document.querySelectorAll('script[src]');
  for (const s of scripts) {
    const match = s.src.match(/(.*?)\/assets\/js\//);
    if (match) return match[1];
  }
  return '';
}
