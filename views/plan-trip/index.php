<!-- PAGE HERO -->
<section class="page-hero">
  <div class="container">
    <span class="page-hero-label" data-aos="fade-up">Start Your Journey</span>
    <h1 class="page-hero-title" data-aos="fade-up" data-aos-delay="100">Plan Your Sri Lanka Trip</h1>
    <p class="page-hero-sub" data-aos="fade-up" data-aos-delay="200">
      Fill out the form below and our travel experts will get back to you within 24 hours with a custom itinerary and quote.
    </p>
  </div>
</section>

<!-- MAIN CONTENT -->
<section class="plan-trip-section section--cream">
  <div class="container container--sm">
    <div class="card" style="padding: 3rem; border-radius: var(--radius-lg); margin-top: -6rem; position: relative; z-index: 10;">
      <form id="enquiry-form" class="modal-form">
        <?= function_exists('csrf_field') ? csrf_field() : '' ?>
        <input type="hidden" id="modal-tour-id" name="tour_id" value="<?= isset($_GET['tour_id']) ? (int)$_GET['tour_id'] : '' ?>">
        
        <div class="form-group mb-sm">
          <label for="enq-name" class="form-label">Full Name *</label>
          <input type="text" id="enq-name" name="name" class="form-control" required placeholder="Jane Smith">
        </div>
        
        <div class="form-group mb-sm">
          <label for="enq-email" class="form-label">Email Address *</label>
          <input type="email" id="enq-email" name="email" class="form-control" required placeholder="your@email.com">
        </div>
        
        <div class="form-group mb-sm">
          <label for="enq-phone" class="form-label">WhatsApp / Phone Number</label>
          <input type="tel" id="enq-phone" name="phone" class="form-control" placeholder="+1 234 567 8900">
        </div>
        
        <div class="form-group mb-sm">
          <label for="enq-dates" class="form-label">Expected Travel Dates</label>
          <input type="text" id="enq-dates" name="dates" class="form-control" placeholder="e.g. Mid December 2026 for 10 days">
        </div>
        
        <div class="form-group mb-md">
          <label for="enq-message" class="form-label">Your Travel Ideas / Requirements</label>
          <textarea id="enq-message" name="message" class="form-control" rows="6" placeholder="Tell us about the places you'd like to visit, your budget, number of travelers, etc."></textarea>
        </div>
        
        <button type="submit" id="enq-submit" class="btn btn-primary btn-lg" style="width: 100%; justify-content: center;">
          <span id="enq-btn-text">Send My Enquiry</span>
          <svg id="enq-spinner" style="display:none; width: 18px; height: 18px; animation: spin 1s linear infinite; margin-left: 8px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
            <path d="M12 2a10 10 0 0 1 10 10" stroke="currentColor"></path>
          </svg>
        </button>
      </form>
    </div>
  </div>
</section>
