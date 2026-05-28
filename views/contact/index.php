<?php
/**
 * CONTACT PAGE — views/contact/index.php
 */
?>

<main>

<section class="page-hero contact-hero" aria-label="Contact us">
  <div class="container">
    <nav class="breadcrumb breadcrumb--light" aria-label="Breadcrumb">
      <a href="<?= SITE_URL ?>/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span class="current">Contact Us</span>
    </nav>
    <span class="page-hero-label">Get In Touch</span>
    <h1 class="page-hero-title">Let's Plan Your<br><em>Sri Lanka Journey</em></h1>
    <p class="page-hero-sub">
      Share your travel ideas with our local specialists and receive a personalised
      itinerary tailored to your pace, interests, and budget.
    </p>
  </div>
</section>

<section class="contact-section" aria-label="Contact details and enquiry form">
  <div class="container">
    <div class="contact-grid">
      <aside class="contact-info card" data-aos="fade-right">
        <div class="contact-info-inner">
          <span class="section-label">Traveljo Ceylon Tours</span>
          <h2 class="section-title">Talk to a Local Travel Expert</h2>
          <p class="contact-intro">
            From cultural trails and wildlife safaris to beach escapes and luxury stays,
            our team helps you design the perfect Sri Lanka experience.
          </p>

          <div class="contact-points">
            <div class="contact-point">
              <span class="contact-icon" aria-hidden="true">📞</span>
              <div>
                <h3>Call or WhatsApp</h3>
                <a href="tel:<?= e(SITE_PHONE) ?>"><?= e(SITE_PHONE) ?></a>
              </div>
            </div>

            <div class="contact-point">
              <span class="contact-icon" aria-hidden="true">✉</span>
              <div>
                <h3>Email</h3>
                <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a>
              </div>
            </div>

            <div class="contact-point">
              <span class="contact-icon" aria-hidden="true">📍</span>
              <div>
                <h3>Office</h3>
                <p><?= e(SITE_ADDRESS) ?></p>
              </div>
            </div>
          </div>

          <div class="contact-note">
            <strong>Response time:</strong> Typically within 24 hours.
          </div>
        </div>
      </aside>

      <article class="contact-form-wrap card" data-aos="fade-left">
        <div class="contact-form-head">
          <span class="section-label">Trip Enquiry</span>
          <h2 class="section-title">Send Us Your Travel Plans</h2>
          <p>
            Tell us what you are looking for and we will build your custom itinerary.
          </p>
        </div>

        <form class="contact-form" action="<?= SITE_URL ?>/enquiry/submit" method="POST" novalidate>
          <?= csrf_field() ?>
          <input type="hidden" name="tour_id" value="">

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="name">Full Name *</label>
              <input class="form-control" type="text" id="name" name="name" required autocomplete="name" placeholder="John Smith">
            </div>
            <div class="form-group">
              <label class="form-label" for="email">Email Address *</label>
              <input class="form-control" type="email" id="email" name="email" required autocomplete="email" placeholder="john@example.com">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="phone">Phone Number</label>
              <input class="form-control" type="tel" id="phone" name="phone" autocomplete="tel" placeholder="+44 7700 900000">
            </div>
            <div class="form-group">
              <label class="form-label" for="country">Your Country</label>
              <input class="form-control" type="text" id="country" name="country" autocomplete="country-name" placeholder="United Kingdom">
            </div>
          </div>

          <div class="form-row form-row--split">
            <div class="form-group">
              <label class="form-label" for="travel_date">Travel Date</label>
              <input class="form-control" type="date" id="travel_date" name="travel_date" min="<?= date('Y-m-d') ?>">
            </div>
            <div class="form-row form-row--inline">
              <div class="form-group">
                <label class="form-label" for="num_adults">Adults</label>
                <input class="form-control" type="number" id="num_adults" name="num_adults" value="2" min="1" max="20">
              </div>
              <div class="form-group">
                <label class="form-label" for="num_children">Children</label>
                <input class="form-control" type="number" id="num_children" name="num_children" value="0" min="0" max="10">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="message">Tell Us About Your Dream Trip *</label>
            <textarea class="form-control" id="message" name="message" required placeholder="Places you would like to visit, activities, budget range, and any special requests..."></textarea>
          </div>

          <button type="submit" class="btn btn-primary btn-lg">Send Enquiry</button>
        </form>
      </article>
    </div>
  </div>
</section>

<section class="contact-cta section--cream" aria-label="Quick action links">
  <div class="container">
    <div class="contact-cta-inner">
      <h2 class="section-title">Need a Faster Response?</h2>
      <p class="section-sub">
        Reach us directly by phone or email, and our team will be happy to assist you.
      </p>
      <div class="contact-cta-actions">
        <a href="tel:<?= e(SITE_PHONE) ?>" class="btn btn-outline">Call Now</a>
        <a href="mailto:<?= e(SITE_EMAIL) ?>" class="btn btn-primary">Email Us</a>
      </div>
    </div>
  </div>
</section>

</main>
