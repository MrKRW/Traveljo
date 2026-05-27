<!-- ══ SITE FOOTER ══════════════════════════════════════════ -->
<footer class="site-footer" role="contentinfo">
  <div class="container">

    <!-- Footer Grid -->
    <div class="footer-grid">

      <!-- Brand Column -->
      <div class="footer-brand">
        <img src="<?= SITE_URL ?>/assets/images/logo.png"
             alt="<?= e(SITE_NAME) ?>"
             height="56"
             style="margin-bottom:1.25rem;filter:brightness(0) invert(1);opacity:0.9">
        <p class="footer-tagline">
          Crafting unforgettable journeys through the Pearl of the Indian Ocean since 2005. Your gateway to authentic Sri Lanka.
        </p>
        <div class="footer-socials">
          <a href="<?= SOCIAL_FB ?>" target="_blank" rel="noopener" aria-label="Facebook" class="footer-social-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
          </a>
          <a href="<?= SOCIAL_IG ?>" target="_blank" rel="noopener" aria-label="Instagram" class="footer-social-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
          </a>
          <a href="<?= SOCIAL_TW ?>" target="_blank" rel="noopener" aria-label="Twitter" class="footer-social-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0022.43.36a9 9 0 01-2.88 1.1 4.52 4.52 0 00-7.69 4.11A12.82 12.82 0 011.64 1s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
          </a>
          <a href="<?= SOCIAL_YT ?>" target="_blank" rel="noopener" aria-label="YouTube" class="footer-social-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 00-1.94-1.95C18.88 4 12 4 12 4s-6.88 0-8.6.47A2.78 2.78 0 001.46 6.42 29 29 0 001 12a29 29 0 00.46 5.58A2.78 2.78 0 003.4 19.53C5.12 20 12 20 12 20s6.88 0 8.6-.47a2.78 2.78 0 001.94-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/></svg>
          </a>
          <a href="<?= SOCIAL_LI ?>" target="_blank" rel="noopener" aria-label="LinkedIn" class="footer-social-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
          </a>
        </div>
      </div>

      <!-- Explore -->
      <div class="footer-col">
        <h3 class="footer-heading">Explore</h3>
        <ul class="footer-links">
          <li><a href="<?= SITE_URL ?>/destinations">Destinations</a></li>
          <li><a href="<?= SITE_URL ?>/tours">Tour Packages</a></li>
          <li><a href="<?= SITE_URL ?>/experiences">Experiences</a></li>
          <li><a href="<?= SITE_URL ?>/gallery">Photo Gallery</a></li>
          <li><a href="<?= SITE_URL ?>/offers">Special Offers</a></li>
          <li><a href="<?= SITE_URL ?>/blog">Travel Blog</a></li>
        </ul>
      </div>

      <!-- Tours -->
      <div class="footer-col">
        <h3 class="footer-heading">Tour Categories</h3>
        <ul class="footer-links">
          <li><a href="<?= SITE_URL ?>/tours?category=authentic">Authentic Ceylon</a></li>
          <li><a href="<?= SITE_URL ?>/tours?category=adventure">Adventure Tours</a></li>
          <li><a href="<?= SITE_URL ?>/tours?category=luxury">Luxury Escapes</a></li>
          <li><a href="<?= SITE_URL ?>/tours?category=wildlife">Wildlife Safaris</a></li>
          <li><a href="<?= SITE_URL ?>/tours?category=romantic">Romantic Getaways</a></li>
          <li><a href="<?= SITE_URL ?>/tours?category=wellness">Wellness Retreats</a></li>
        </ul>
      </div>

      <!-- Info -->
      <div class="footer-col">
        <h3 class="footer-heading">Information</h3>
        <ul class="footer-links">
          <li><a href="<?= SITE_URL ?>/about">About Us</a></li>
          <li><a href="<?= SITE_URL ?>/plan-your-trip">Plan Your Trip</a></li>
          <li><a href="<?= SITE_URL ?>/contact">Contact Us</a></li>
          <li><a href="<?= SITE_URL ?>/faq">FAQ</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms & Conditions</a></li>
        </ul>
        <div class="footer-contact" style="margin-top:1.5rem">
          <p class="footer-contact-item">
            <span>📞</span>
            <a href="tel:<?= e(SITE_PHONE) ?>"><?= e(SITE_PHONE) ?></a>
          </p>
          <p class="footer-contact-item">
            <span>✉</span>
            <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a>
          </p>
          <p class="footer-contact-item" style="align-items:flex-start">
            <span>📍</span>
            <span><?= e(SITE_ADDRESS) ?></span>
          </p>
        </div>
      </div>

    </div><!-- /footer-grid -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <p>
        © <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.
        Crafted with ❤ for Sri Lanka travel.
      </p>
      <p style="color:rgba(255,255,255,0.3);font-size:0.8rem">
        SLTDA Licensed Tour Operator · LKR & USD Accepted
      </p>
    </div>

  </div>
</footer>

<!-- ══ ENQUIRY MODAL ════════════════════════════════════════ -->
<div class="enquiry-modal-overlay" id="enquiry-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modal-title">
  <div class="enquiry-modal">
    <div class="enquiry-modal-header">
      <div>
        <div class="enquiry-modal-title" id="modal-title">Plan My Perfect Trip</div>
        <div class="enquiry-modal-sub">Tell us your dream — we'll make it real within 24 hours</div>
      </div>
      <button class="modal-close" onclick="closeEnquiryModal()" aria-label="Close modal">×</button>
    </div>

    <div class="enquiry-modal-body">
      <form class="enquiry-form" id="enquiry-form" novalidate>
        <?= csrf_field() ?>
        <input type="hidden" name="tour_id" id="modal-tour-id" value="">

        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="enq-name">Full Name *</label>
            <input type="text" id="enq-name" name="name" class="form-control"
                   placeholder="John Smith" required autocomplete="name">
          </div>
          <div class="form-group">
            <label class="form-label" for="enq-email">Email Address *</label>
            <input type="email" id="enq-email" name="email" class="form-control"
                   placeholder="john@example.com" required autocomplete="email">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="enq-phone">Phone Number</label>
            <input type="tel" id="enq-phone" name="phone" class="form-control"
                   placeholder="+44 7700 900000" autocomplete="tel">
          </div>
          <div class="form-group">
            <label class="form-label" for="enq-country">Your Country</label>
            <input type="text" id="enq-country" name="country" class="form-control"
                   placeholder="United Kingdom" autocomplete="country-name">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="enq-date">Travel Date</label>
            <input type="date" id="enq-date" name="travel_date" class="form-control"
                   min="<?= date('Y-m-d') ?>">
          </div>
          <div class="form-row" style="gap:0.5rem">
            <div class="form-group">
              <label class="form-label" for="enq-adults">Adults</label>
              <input type="number" id="enq-adults" name="num_adults" class="form-control"
                     value="2" min="1" max="20">
            </div>
            <div class="form-group">
              <label class="form-label" for="enq-children">Children</label>
              <input type="number" id="enq-children" name="num_children" class="form-control"
                     value="0" min="0" max="10">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="enq-message">Tell Us About Your Dream Trip</label>
          <textarea id="enq-message" name="message" class="form-control"
                    placeholder="Destinations you'd like to visit, interests, special requests, budget range..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-lg" id="enq-submit" style="width:100%;justify-content:center">
          <span id="enq-btn-text">Send My Enquiry</span>
          <svg id="enq-spinner" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;animation:spin 0.8s linear infinite">
            <circle cx="12" cy="12" r="10" stroke-opacity="0.3"/>
            <path d="M12 2a10 10 0 0110 10"/>
          </svg>
        </button>

        <p style="font-size:0.78rem;color:var(--muted);text-align:center">
          🔒 Your information is secure and never shared with third parties.
        </p>
      </form>
    </div>
  </div>
</div>

<!-- ══ STICKY ENQUIRY FAB ═══════════════════════════════════ -->
<div class="enquiry-fab">
  <span class="enquiry-fab-label">Plan My Trip</span>
  <button class="enquiry-fab-btn" onclick="openEnquiryModal()" aria-label="Open trip enquiry form">
    ✈
  </button>
</div>

<!-- ══ TOAST ═════════════════════════════════════════════════ -->
<div class="toast" id="toast" role="alert" aria-live="polite"></div>

<!-- ══ SCRIPTS ═══════════════════════════════════════════════ -->
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Site JS -->
<script src="<?= SITE_URL ?>/assets/js/main.js?v=1.3"></script>
<script src="<?= SITE_URL ?>/assets/js/enquiry.js?v=1.3"></script>

<?php if (isset($extraJs)): foreach ($extraJs as $js): ?>
<script src="<?= SITE_URL ?>/assets/js/<?= e($js) ?>?v=1.3"></script>
<?php endforeach; endif; ?>

<style>
/* Footer specific styles */
.site-footer {
  background: var(--dark);
  color: rgba(255,255,255,0.7);
  padding: 5rem 0 2rem;
}

.footer-grid {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 1.2fr;
  gap: 3rem;
  margin-bottom: 3.5rem;
  padding-bottom: 3.5rem;
  border-bottom: 1px solid rgba(255,255,255,0.08);
}

.footer-tagline {
  font-size: 0.9rem;
  line-height: 1.75;
  color: rgba(255,255,255,0.55);
  margin-bottom: 1.5rem;
  max-width: 300px;
}

.footer-socials {
  display: flex;
  gap: 0.75rem;
}

.footer-social-link {
  width: 38px;
  height: 38px;
  border-radius: 50%;
  background: rgba(255,255,255,0.07);
  display: flex;
  align-items: center;
  justify-content: center;
  color: rgba(255,255,255,0.6);
  transition: background var(--t-fast) var(--ease), color var(--t-fast) var(--ease);
}

.footer-social-link:hover {
  background: var(--gold);
  color: var(--white);
}

.footer-heading {
  color: var(--white);
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.15em;
  font-weight: 700;
  margin-bottom: 1.5rem;
}

.footer-links li {
  margin-bottom: 0.65rem;
}

.footer-links a {
  font-size: 0.875rem;
  color: rgba(255,255,255,0.55);
  transition: color var(--t-fast) var(--ease), padding-left var(--t-fast) var(--ease);
}

.footer-links a:hover {
  color: var(--gold);
  padding-left: 4px;
}

.footer-contact-item {
  display: flex;
  align-items: center;
  gap: 0.6rem;
  font-size: 0.85rem;
  color: rgba(255,255,255,0.55);
  margin-bottom: 0.6rem;
}

.footer-contact-item a:hover { color: var(--gold); }

.footer-bottom {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 1rem;
  font-size: 0.82rem;
  color: rgba(255,255,255,0.35);
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

@media (max-width: 1024px) {
  .footer-grid { grid-template-columns: 1fr 1fr; }
  .footer-brand { grid-column: 1 / -1; }
}

@media (max-width: 640px) {
  .footer-grid { grid-template-columns: 1fr; gap: 2rem; }
  .footer-brand { grid-column: 1; }
  .footer-bottom { flex-direction: column; text-align: center; }
}
</style>

</body>
</html>
