<?php
/**
 * ABOUT US PAGE — views/about/index.php
 */
?>

<main>

<!-- ══ PAGE HERO ════════════════════════════════════════════ -->
<section class="page-hero page-hero--img" aria-label="About Us">
  <div class="container">
    <nav class="breadcrumb breadcrumb--light" aria-label="Breadcrumb">
      <a href="<?= SITE_URL ?>/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span class="current">About Us</span>
    </nav>
    <span class="page-hero-label">Our Story</span>
    <h1 class="page-hero-title">About Traveljo<br><em>Ceylon Tours</em></h1>
    <p class="page-hero-sub">
      A family-owned Sri Lanka tour operator dedicated to revealing the island's
      extraordinary beauty — one personalised journey at a time.
    </p>
  </div>
</section>


<!-- ══ OUR STORY ════════════════════════════════════════════ -->
<section class="about-section" aria-label="Our Story">
  <div class="container">
    <div class="about-inner">

      <div class="about-img-wrap" data-aos="fade-right">
        <img src="<?= SITE_URL ?>/assets/images/hero/sigiriya.jpg"
             alt="Sigiriya Rock Fortress, Sri Lanka"
             class="about-img-main"
             loading="lazy">
        <img src="<?= SITE_URL ?>/assets/images/hero/tea-train.jpg"
             alt="Scenic train through Sri Lanka tea country"
             class="about-img-accent"
             loading="lazy">
        <div class="about-badge">
          <span class="about-badge-num">20+</span>
          <span class="about-badge-text">Years of<br>Expertise</span>
        </div>
      </div>

      <div class="about-text" data-aos="fade-left" data-aos-delay="100">
        <span class="section-label">Who We Are</span>
        <h2 class="section-title">Born From a Love<br>of Our Island Home</h2>
        <div class="divider"></div>
        <p class="about-desc">
          Traveljo Ceylon Tours was founded in 2005 by a team of passionate Sri Lankan
          travel professionals who believed that the best way to experience our island
          is through the eyes of those who know it intimately. What began as a small
          family operation in Colombo has grown into one of Sri Lanka's most trusted
          inbound tour operators — without ever losing our personal touch.
        </p>
        <p class="about-desc" style="margin-top:-0.75rem">
          We don't sell cookie-cutter packages. Every itinerary we craft is built
          around you — your interests, your pace, your budget. Whether you're tracing
          ancient kingdoms through the Cultural Triangle, tracking leopards in Yala,
          or unwinding on a secluded southern beach, we design journeys that feel
          genuinely, unforgettably yours.
        </p>
        <p class="about-desc" style="margin-top:-0.75rem">
          Our team of licensed guides, professional drivers, and destination specialists
          live and breathe Sri Lanka. We maintain our own fleet of air-conditioned
          vehicles, partner with hand-picked hotels and eco-lodges, and hold a SLTDA
          licence — so you can travel with complete confidence.
        </p>
      </div>

    </div>
  </div>
</section>


<!-- ══ STATS ════════════════════════════════════════════════ -->
<section class="about-stats" aria-label="Traveljo at a glance">
  <div class="container">
    <div class="about-stats-grid">
      <div class="about-stat" data-aos="fade-up">
        <span class="about-stat-num">20+</span>
        <span class="about-stat-label">Years of Experience</span>
      </div>
      <div class="about-stat" data-aos="fade-up" data-aos-delay="80">
        <span class="about-stat-num">5,000+</span>
        <span class="about-stat-label">Happy Travellers</span>
      </div>
      <div class="about-stat" data-aos="fade-up" data-aos-delay="160">
        <span class="about-stat-num">50+</span>
        <span class="about-stat-label">Curated Tour Packages</span>
      </div>
      <div class="about-stat" data-aos="fade-up" data-aos-delay="240">
        <span class="about-stat-num">98%</span>
        <span class="about-stat-label">Guest Satisfaction</span>
      </div>
    </div>
  </div>
</section>


<!-- ══ MISSION & VISION ═════════════════════════════════════ -->
<section class="about-mission section--cream" aria-label="Mission and Vision">
  <div class="container">
    <div class="section-header section-header--center" data-aos="fade-up">
      <span class="section-label">What Drives Us</span>
      <h2 class="section-title">Our Mission &amp; Vision</h2>
      <p class="section-sub">
        Everything we do is guided by a deep commitment to authentic travel,
        local communities, and the natural beauty of Sri Lanka.
      </p>
    </div>

    <div class="about-mission-grid">
      <article class="about-mission-card" data-aos="fade-up" data-aos-delay="80">
        <div class="about-mission-icon">🎯</div>
        <h3>Our Mission</h3>
        <p>
          To create deeply personal Sri Lanka travel experiences that connect
          visitors with the island's culture, nature, and people — while supporting
          local communities and practising responsible, sustainable tourism.
        </p>
      </article>
      <article class="about-mission-card" data-aos="fade-up" data-aos-delay="160">
        <div class="about-mission-icon">🌏</div>
        <h3>Our Vision</h3>
        <p>
          To be recognised globally as Sri Lanka's most trusted and authentic
          tour operator — known for exceptional service, insider knowledge, and
          journeys that leave both travellers and the island better than we found them.
        </p>
      </article>
    </div>
  </div>
</section>


<!-- ══ OUR VALUES ═══════════════════════════════════════════ -->
<section class="about-values" aria-label="Our Values">
  <div class="container">
    <div class="section-header section-header--center" data-aos="fade-up">
      <span class="section-label">What We Stand For</span>
      <h2 class="section-title">The Traveljo Difference</h2>
    </div>

    <div class="trust-badges about-values-grid">
      <div class="trust-badge" data-aos="fade-up">
        <div class="trust-badge-icon">🏛️</div>
        <div class="trust-badge-info">
          <h4>Heritage Expertise</h4>
          <p>Deep knowledge of Sri Lanka's UNESCO World Heritage sites, ancient kingdoms, and living Buddhist culture</p>
        </div>
      </div>
      <div class="trust-badge" data-aos="fade-up" data-aos-delay="60">
        <div class="trust-badge-icon">🚐</div>
        <div class="trust-badge-info">
          <h4>Own Vehicle Fleet</h4>
          <p>Private air-conditioned vehicles and professional, English-speaking drivers for safe, comfortable travel</p>
        </div>
      </div>
      <div class="trust-badge" data-aos="fade-up" data-aos-delay="120">
        <div class="trust-badge-icon">🌿</div>
        <div class="trust-badge-info">
          <h4>Sustainable Travel</h4>
          <p>Committed to eco-responsible tourism, wildlife conservation, and fair support for local communities</p>
        </div>
      </div>
      <div class="trust-badge" data-aos="fade-up" data-aos-delay="180">
        <div class="trust-badge-icon">⭐</div>
        <div class="trust-badge-info">
          <h4>5-Star Rated</h4>
          <p>Consistently rated 5 stars by hundreds of happy travellers from around the world</p>
        </div>
      </div>
      <div class="trust-badge" data-aos="fade-up" data-aos-delay="240">
        <div class="trust-badge-icon">🤝</div>
        <div class="trust-badge-info">
          <h4>Personal Service</h4>
          <p>A dedicated travel consultant from enquiry to departure — available 24/7 during your trip</p>
        </div>
      </div>
      <div class="trust-badge" data-aos="fade-up" data-aos-delay="300">
        <div class="trust-badge-icon">💎</div>
        <div class="trust-badge-info">
          <h4>Best Value</h4>
          <p>Transparent pricing with no hidden fees — quality experiences at fair, competitive rates</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ══ TIMELINE ═════════════════════════════════════════════ -->
<section class="about-timeline section--cream" aria-label="Our Journey">
  <div class="container">
    <div class="section-header section-header--center" data-aos="fade-up">
      <span class="section-label">Our Journey</span>
      <h2 class="section-title">Two Decades of<br>Creating Memories</h2>
    </div>

    <div class="timeline">
      <div class="timeline-item" data-aos="fade-up">
        <span class="timeline-year">2005</span>
        <div class="timeline-content">
          <h3>The Beginning</h3>
          <p>Traveljo Ceylon Tours is founded in Colombo with a single vehicle and a passion for sharing Sri Lanka's hidden gems with the world.</p>
        </div>
      </div>
      <div class="timeline-item" data-aos="fade-up" data-aos-delay="80">
        <span class="timeline-year">2010</span>
        <div class="timeline-content">
          <h3>Expanding Horizons</h3>
          <p>Our fleet grows to 10 vehicles and we launch dedicated wildlife safari and cultural heritage tour programmes across the island.</p>
        </div>
      </div>
      <div class="timeline-item" data-aos="fade-up" data-aos-delay="160">
        <span class="timeline-year">2015</span>
        <div class="timeline-content">
          <h3>SLTDA Licensed</h3>
          <p>Officially licensed by the Sri Lanka Tourism Development Authority, cementing our reputation as a trusted inbound operator.</p>
        </div>
      </div>
      <div class="timeline-item" data-aos="fade-up" data-aos-delay="240">
        <span class="timeline-year">2020</span>
        <div class="timeline-content">
          <h3>Going Digital</h3>
          <p>We launch our online booking platform and virtual trip planning service, making it easier for travellers worldwide to discover Sri Lanka.</p>
        </div>
      </div>
      <div class="timeline-item" data-aos="fade-up" data-aos-delay="320">
        <span class="timeline-year">Today</span>
        <div class="timeline-content">
          <h3>5,000+ Journeys &amp; Counting</h3>
          <p>With 50+ curated tour packages and guests from over 40 countries, we continue to craft the journeys that make Sri Lanka unforgettable.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ══ TESTIMONIALS ═════════════════════════════════════════ -->
<?php if (!empty($testimonials)): ?>
<section class="testimonials-section" aria-label="Guest Testimonials">
  <div class="container">
    <div class="section-header section-header--center" data-aos="fade-up">
      <span class="section-label">What Our Guests Say</span>
      <h2 class="section-title">Trusted by Travellers Worldwide</h2>
      <p class="section-sub">
        Real stories from guests who discovered Sri Lanka with Traveljo
      </p>
    </div>

    <div class="about-testimonials-grid">
      <?php foreach ($testimonials as $i => $testimonial): ?>
      <div class="testimonial-card" data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
        <div class="testimonial-quote">"</div>
        <p class="testimonial-text"><?= e($testimonial['message']) ?></p>
        <div class="testimonial-meta">
          <div class="testimonial-avatar">
            <?= mb_strtoupper(mb_substr($testimonial['guest_name'] ?? 'G', 0, 1)) ?>
          </div>
          <div>
            <div class="testimonial-name"><?= e($testimonial['guest_name']) ?></div>
            <div class="testimonial-country"><?= e($testimonial['country']) ?></div>
            <div style="margin-top:0.3rem"><?= starRating((int)$testimonial['rating']) ?></div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══ CTA ══════════════════════════════════════════════════ -->
<section class="about-cta" aria-label="Start planning your trip">
  <div class="container">
    <div class="about-cta-inner" data-aos="fade-up">
      <span class="section-label" style="color:var(--gold-light)">Ready to Explore?</span>
      <h2 class="section-title section-title--white">Let's Plan Your<br>Sri Lanka Adventure</h2>
      <div class="divider divider--center"></div>
      <p>
        Whether you have a clear itinerary in mind or need inspiration from scratch,
        our travel experts are ready to craft your perfect journey within 24 hours.
      </p>
      <div class="about-cta-actions">
        <button class="btn btn-primary btn-lg" onclick="openEnquiryModal()">
          Plan My Trip
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </button>
        <a href="<?= SITE_URL ?>/contact" class="btn btn-outline-white btn-lg">
          Contact Us
        </a>
      </div>
    </div>
  </div>
</section>

</main>

<!-- JSON-LD Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "TravelAgency",
  "name": "<?= SITE_NAME ?>",
  "description": "Family-owned Sri Lanka tour operator with 20+ years of expertise crafting personalised cultural, wildlife, and luxury travel experiences.",
  "url": "<?= SITE_URL ?>/about",
  "telephone": "<?= SITE_PHONE ?>",
  "email": "<?= SITE_EMAIL ?>",
  "foundingDate": "2005",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "No. 45, Galle Road",
    "addressLocality": "Colombo",
    "addressRegion": "Western Province",
    "postalCode": "00300",
    "addressCountry": "LK"
  },
  "sameAs": [
    "<?= SOCIAL_FB ?>",
    "<?= SOCIAL_IG ?>",
    "<?= SOCIAL_TW ?>"
  ]
}
</script>
