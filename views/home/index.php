<?php
/**
 * HOME PAGE — views/home/index.php
 * All 11 sections rendered with data from HomeController
 */

// Extra CSS for home-specific styles
$extraCss = ['home.css', 'packages.css', 'map_categories.css'];

// Mark this as a hero page (transparent nav) + homepage (split centre-logo nav)
$isHeroPage = true;
$isHomePage  = true;
?>

<!-- ════════════════════════════════════════════════════════
 SECTION 1: HERO SLIDER
════════════════════════════════════════════════════════ -->
<main>
<section class="hero" aria-label="Hero Banner">
  <div class="swiper">
    <div class="swiper-wrapper">

      <!-- Slide 1 — Fleet -->
      <div class="swiper-slide hero-slide">
        <img src="<?= SITE_URL ?>/assets/images/nissan-vanette.jpg"
             alt="Luxury tourist van in Sri Lanka"
             class="hero-slide-bg" loading="eager">
        <div class="hero-slide-overlay"></div>
        <div class="hero-content">
          <h1 class="hero-title">
            Your Private Ride<br>
            <em>Across</em><br>
            Paradise
          </h1>
          <p class="hero-subtitle">
            Comfortable, safe, and premium chauffeur services across Sri Lanka.
          </p>
          <div class="hero-actions">
            <a href="<?= SITE_URL ?>/services" class="btn btn-primary btn-lg">
              Explore Services
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="<?= SITE_URL ?>/fleet" class="btn btn-outline-white btn-lg">
              Our Fleet
            </a>
          </div>
        </div>
      </div>

      <!-- Slide 2 — Airport -->
      <div class="swiper-slide hero-slide">
        <img src="<?= SITE_URL ?>/assets/images/luxury-car.jpg"
             alt="Comfortable airport transfers"
             class="hero-slide-bg" loading="lazy">
        <div class="hero-slide-overlay"></div>
        <div class="hero-content">
          <h1 class="hero-title">
            Airport<br>
            <em>Transfers,</em><br>
            Simplified
          </h1>
          <p class="hero-subtitle">
            Arrive in style. Smooth, reliable, and prompt rides from Colombo airport.
          </p>
          <div class="hero-actions">
            <a href="<?= SITE_URL ?>/services?type=airport" class="btn btn-primary btn-lg">
              Book a Transfer
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <button class="btn btn-outline-white btn-lg" onclick="openEnquiryModal()">
              Plan My Trip
            </button>
          </div>
        </div>
      </div>

      <!-- Slide 3 — Drivers -->
      <div class="swiper-slide hero-slide">
        <img src="<?= SITE_URL ?>/assets/images/hero/elephant.jpg"
             alt="Sri Lanka scenery"
             class="hero-slide-bg" loading="lazy">
        <div class="hero-slide-overlay"></div>
        <div class="hero-content">
          <h1 class="hero-title">
            Professional<br>
            <em>Chauffeurs,</em><br>
            Local Experts
          </h1>
          <p class="hero-subtitle">
            Sit back and relax while our experienced, fluent English-speaking drivers show you the island.
          </p>
          <div class="hero-actions">
            <a href="<?= SITE_URL ?>/services?type=multiday" class="btn btn-primary btn-lg">
              Multi-Day Drivers
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <button class="btn btn-outline-white btn-lg" onclick="openEnquiryModal()">
              Enquire Now
            </button>
          </div>
        </div>
      </div>

      <!-- Slide 4 — Comfort -->
      <div class="swiper-slide hero-slide">
        <img src="<?= SITE_URL ?>/assets/images/hero/tea-train.jpg"
             alt="Scenic road trip in Sri Lanka"
             class="hero-slide-bg" loading="lazy">
        <div class="hero-slide-overlay"></div>
        <div class="hero-content">
          <h1 class="hero-title">
            Unmatched<br>
            <em>Comfort &amp;</em><br>
            Safety
          </h1>
          <p class="hero-subtitle">
            Our fleet of modern, fully air-conditioned vehicles are ready for your journey.
          </p>
          <div class="hero-actions">
            <a href="<?= SITE_URL ?>/fleet" class="btn btn-primary btn-lg">
              View Our Fleet
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <button class="btn btn-outline-white btn-lg" onclick="openEnquiryModal()">
              Plan My Trip
            </button>
          </div>
        </div>
      </div>

    </div><!-- /swiper-wrapper -->

    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev" aria-label="Previous slide"></div>
    <div class="swiper-button-next" aria-label="Next slide"></div>
  </div>

  <!-- Scroll Indicator -->
  <div class="hero-scroll" aria-hidden="true">
    <div class="scroll-line"></div>
    <span>Scroll</span>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════
 SECTION 2: ABOUT SNIPPET + TRUST BADGES
════════════════════════════════════════════════════════ -->
<section class="about-section" aria-label="About Traveljo Ceylon Tours">
  <div class="container">
    <div class="about-inner">

      <!-- Text column -->
      <div class="about-text" data-aos="fade-right">
        <span class="section-label">About Traveljo</span>
        <h2 class="section-title">
          We Are Your Premium<br>Vehicle Service
        </h2>
        <div class="divider"></div>
        <p class="about-desc">
          Founded with a passion for providing the most comfortable way to see our island home,
          Traveljo Vehicle Tours has been offering top-tier private driver services for over
          3 years. From smooth airport transfers to multi-day cross-country journeys, we ensure
          your ride is safe, relaxing, and tailored to you.
        </p>
        <p class="about-desc" style="margin-top:-0.75rem">
          Every journey is personally designed around you — your pace, your route, your
          comfort. Our fleet of modern, air-conditioned vehicles and our hand-picked, fluent English-speaking chauffeurs mean we deliver an experience that's seamlessly yours.
        </p>

        <!-- Stats row -->
        <div class="about-stats">
          <div class="about-stat">
            <span class="about-stat-num">15+</span>
            <span class="about-stat-label">Luxury Vehicles</span>
          </div>
          <div class="about-stat">
            <span class="about-stat-num">100%</span>
            <span class="about-stat-label">Safe Drives</span>
          </div>
          <div class="about-stat">
            <span class="about-stat-num">5★</span>
            <span class="about-stat-label">Chauffeurs</span>
          </div>
        </div>

        <a href="<?= SITE_URL ?>/about" class="btn btn-primary">
          Learn More About Us
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>

      <!-- Portrait Image column -->
      <div class="about-portrait-wrap" data-aos="fade-left" data-aos-delay="100">
        <img src="<?= SITE_URL ?>/assets/images/happy-tourists.jpg"
             alt="Happy tourists enjoying Sri Lanka"
             class="about-portrait-img"
             loading="lazy">
        <div class="about-portrait-badge">
          <span class="about-badge-num">3+</span>
          <span class="about-badge-text">Years of<br>Expertise</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════════════════════
 AMAZING BANNER
════════════════════════════════════════════════════════ -->
<div class="amazing-banner" aria-hidden="true">
  <img src="<?= SITE_URL ?>/assets/images/hero/amazing-banner.jpg" alt="Sri Lanka Landscape" class="amazing-banner-bg" loading="lazy">
  <div class="amazing-banner-overlay"></div>
  <div class="amazing-banner-content">
    <span class="amazing-label">Sri Lanka</span>
    <h2 class="amazing-word">Amazing</h2>
    <p class="amazing-sub">The most comfortable way to see the island</p>
    <a href="<?= SITE_URL ?>/fleet" class="btn btn-outline-white btn-lg">View Our Fleet</a>
  </div>
</div>



<!-- ════════════════════════════════════════════════════════
 SECTION 4: FEATURED TOURS (from DB) — Photo Strip
════════════════════════════════════════════════════════ -->
<section class="featured-tours-section" aria-label="Popular Chauffeur Routes">
  <div class="container">
    <div class="section-header section-header--flex">
      <div data-aos="fade-right">
        <span class="section-label">Most Requested</span>
        <h2 class="section-title">Popular Chauffeur Routes</h2>
      </div>
      <a href="<?= SITE_URL ?>/routes" class="btn btn-outline" data-aos="fade-left">
        View All Routes
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </div>

  <!-- Full-width photo strip -->
  <div class="photo-strip" data-aos="fade-up">
    <?php if (!empty($featured_tours)): ?>
      <?php foreach (array_slice($featured_tours, 0, 4) as $i => $tour): ?>
      <a href="<?= SITE_URL ?>/tour/<?= e($tour['slug']) ?>" class="photo-strip-item">
        <img src="<?= SITE_URL ?>/<?= e($tour['cover_image'] ?? 'assets/images/hero/sigiriya.jpg') ?>"
             alt="<?= e($tour['title']) ?>" loading="lazy">
        <div class="photo-strip-overlay"></div>
        <div class="photo-strip-info">
          <span class="photo-strip-tag"><?= e(ucfirst($tour['category'])) ?></span>
          <h3 class="photo-strip-title"><?= e($tour['title']) ?></h3>
          <span class="photo-strip-days"><?= e($tour['duration_days']) ?> Days</span>
        </div>
      </a>
      <?php endforeach; ?>
    <?php else: ?>
      <?php
      $placeholderTours = [
        ['img'=>'sigiriya.jpg','cat'=>'Cultural Drive','title'=>'Colombo to Kandy Route','days'=>1],
        ['img'=>'beach.jpg','cat'=>'Coastal Ride','title'=>'Southern Coast Transfer','days'=>1],
        ['img'=>'elephant.jpg','cat'=>'Wildlife Route','title'=>'Yala Safari Drive','days'=>2],
        ['img'=>'tea-train.jpg','cat'=>'Scenic Drive','title'=>'Hill Country Journey','days'=>3],
      ];
      foreach ($placeholderTours as $pt): ?>
      <a href="<?= SITE_URL ?>/services" class="photo-strip-item">
        <img src="<?= SITE_URL ?>/assets/images/hero/<?= $pt['img'] ?>" alt="<?= $pt['title'] ?>" loading="lazy">
        <div class="photo-strip-overlay"></div>
        <div class="photo-strip-info">
          <span class="photo-strip-tag"><?= $pt['cat'] ?></span>
          <h3 class="photo-strip-title"><?= $pt['title'] ?></h3>
          <span class="photo-strip-days"><?= $pt['days'] ?> Day(s)</span>
        </div>
      </a>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════
 SECTION 5: DESTINATIONS MOSAIC (from DB)
════════════════════════════════════════════════════════ -->
<section class="destinations-section" aria-label="Sri Lanka Routes">
  <div class="container">
    <div class="section-header section-header--flex">
      <div data-aos="fade-right">
        <span class="section-label">Where We Drive</span>
        <h2 class="section-title">Top Routes We<br>Cover Daily</h2>
      </div>
      <a href="<?= SITE_URL ?>/destinations" class="btn btn-outline" data-aos="fade-left">
        All Destinations
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

    <?php
    $destList = !empty($destinations) ? $destinations : [
      ['name'=>'Sigiriya', 'region'=>'Cultural Triangle', 'slug'=>'sigiriya', 'cover_image'=>'assets/images/hero/sigiriya.jpg'],
      ['name'=>'Mirissa Beach', 'region'=>'Southern Coast', 'slug'=>'mirissa', 'cover_image'=>'assets/images/hero/beach.jpg'],
      ['name'=>'Kandy', 'region'=>'Hill Country', 'slug'=>'kandy', 'cover_image'=>'assets/images/hero/tea-train.jpg'],
      ['name'=>'Yala Safari', 'region'=>'Wildlife', 'slug'=>'yala', 'cover_image'=>'assets/images/hero/elephant.jpg'],
    ];
    ?>
    <div class="mosaic-grid" data-aos="fade-up">
      <?php foreach (array_slice($destList, 0, 4) as $i => $dest): ?>
      <a href="<?= SITE_URL ?>/destination/<?= e($dest['slug']) ?>"
         class="mosaic-item <?= $i === 0 ? 'mosaic-item--large' : '' ?>"
         aria-label="Explore <?= e($dest['name']) ?>">
        <img src="<?= SITE_URL ?>/<?= e($dest['cover_image'] ?? 'assets/images/hero/sigiriya.jpg') ?>"
             alt="<?= e($dest['name']) ?>, Sri Lanka"
             loading="lazy">
        <div class="mosaic-overlay">
          <div class="mosaic-info">
            <div class="mosaic-region"><?= e($dest['region'] ?? '') ?></div>
            <div class="mosaic-name"><?= e($dest['name']) ?></div>
            <span class="mosaic-cta">Explore →</span>
          </div>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════
 SECTION 6: EXPERIENCES (MAP CATEGORIES)
════════════════════════════════════════════════════════ -->
<section class="map-categories-section" aria-label="Our Vehicle Services">
  <div class="mc-container">
    
    <!-- Left Column -->
    <div class="mc-col mc-col-left" data-aos="fade-right">
      
      <!-- Category 1 -->
      <a href="<?= SITE_URL ?>/services" class="mc-item">
        <div class="mc-img-wrap">
          <img src="<?= SITE_URL ?>/assets/images/luxury-car.jpg" alt="Airport Transfers" loading="lazy">
        </div>
        <div class="mc-text-box">
          <h3 class="mc-title">Airport Transfers</h3>
        </div>
      </a>

      <!-- Category 2 -->
      <a href="<?= SITE_URL ?>/services" class="mc-item">
        <div class="mc-img-wrap">
          <img src="<?= SITE_URL ?>/assets/images/nissan-vanette.jpg" alt="Multi-Day Chauffeur" loading="lazy">
        </div>
        <div class="mc-text-box">
          <h3 class="mc-title">Multi-Day Chauffeur</h3>
        </div>
      </a>

      <!-- Category 3 -->
      <a href="<?= SITE_URL ?>/services" class="mc-item">
        <div class="mc-img-wrap">
          <img src="<?= SITE_URL ?>/assets/images/hero/tea-train.jpg" alt="Day Tours" loading="lazy">
        </div>
        <div class="mc-text-box">
          <h3 class="mc-title">Day Tours</h3>
        </div>
      </a>

    </div>

    <!-- Center Map -->
    <div class="mc-map-wrap" data-aos="zoom-in">
      <img src="<?= SITE_URL ?>/assets/images/srilanka_map.png" alt="Map of Sri Lanka with categories" loading="lazy">
      
      <!-- Package Locations Pins -->
      <div class="map-pin pin-dot-left" style="top: 40%; left: 47%; animation-delay: 0.1s;"><span class="map-pin-dot"></span>Sigiriya</div>
      <div class="map-pin pin-dot-left" style="top: 51%; left: 48%; animation-delay: 0.2s;"><span class="map-pin-dot"></span>Kandy</div>
      <div class="map-pin pin-dot-right" style="top: 50%; left: 38%; animation-delay: 0.3s;"><span class="map-pin-dot"></span>Pinnawala</div>
      <div class="map-pin pin-dot-left" style="top: 58%; left: 48%; animation-delay: 0.4s;"><span class="map-pin-dot"></span>Nuwara Eliya</div>
      <div class="map-pin pin-dot-left" style="top: 63%; left: 53%; animation-delay: 0.5s;"><span class="map-pin-dot"></span>Ella</div>
      <div class="map-pin pin-dot-left" style="top: 56%; left: 66%; animation-delay: 0.6s;"><span class="map-pin-dot"></span>Arugambay</div>
    </div>

    <!-- Right Column -->
    <div class="mc-col mc-col-right" data-aos="fade-left">
      
      <!-- Category 4 -->
      <a href="<?= SITE_URL ?>/services" class="mc-item">
        <div class="mc-text-box">
          <h3 class="mc-title">Corporate Travel</h3>
        </div>
        <div class="mc-img-wrap">
          <img src="<?= SITE_URL ?>/assets/images/luxury-car.jpg" alt="Corporate Travel" loading="lazy">
        </div>
      </a>

      <!-- Category 5 -->
      <a href="<?= SITE_URL ?>/fleet" class="mc-item">
        <div class="mc-text-box">
          <h3 class="mc-title">Luxury Fleet</h3>
        </div>
        <div class="mc-img-wrap">
          <img src="<?= SITE_URL ?>/assets/images/nissan-vanette.jpg" alt="Luxury Fleet" loading="lazy">
        </div>
      </a>

      <!-- Category 6 -->
      <a href="<?= SITE_URL ?>/about" class="mc-item">
        <div class="mc-text-box">
          <h3 class="mc-title">Safe & Reliable</h3>
        </div>
        <div class="mc-img-wrap">
          <img src="<?= SITE_URL ?>/assets/images/hero/beach.jpg" alt="Safe & Reliable" loading="lazy">
        </div>
      </a>

    </div>

  </div>
</section>


<!-- ════════════════════════════════════════════════════════
 SECTION 7: SPECIAL OFFERS (from DB)
════════════════════════════════════════════════════════ -->
<section class="offers-section" aria-label="Special Offers">
  <div class="container">
    <div class="section-header section-header--center" data-aos="fade-up">
      <span class="section-label">Limited Time</span>
      <h2 class="section-title">Special Offers & Deals</h2>
      <p class="section-sub">
        Seasonal promotions designed to make your Sri Lanka dream more accessible
      </p>
    </div>

    <?php if (!empty($offers)): ?>
    <div class="offers-grid">
      <?php foreach ($offers as $i => $offer): ?>
      <article class="offer-card" data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
        <img src="<?= SITE_URL ?>/<?= e($offer['cover_image'] ?? 'assets/images/hero/sigiriya.jpg') ?>"
             alt="<?= e($offer['title']) ?>"
             class="offer-card-bg"
             loading="lazy">
        <div class="offer-card-overlay"></div>
        <div class="offer-card-body">
          <span class="offer-discount"><?= e($offer['discount_text'] ?? '') ?></span>
          <div class="offer-title"><?= e($offer['title']) ?></div>
          <?php if ($offer['starting_from']): ?>
          <div class="offer-from">
            From <strong><?= formatPrice((float)$offer['starting_from'], $offer['currency'] ?? 'USD') ?></strong> per person
          </div>
          <?php endif; ?>
          <button class="btn btn-primary btn-sm" onclick="openEnquiryModal()">
            Enquire Now
          </button>
          <?php if ($offer['valid_until']): ?>
          <div class="offer-expires">
            Offer valid until <?= date('j M Y', strtotime($offer['valid_until'])) ?>
          </div>
          <?php endif; ?>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-md" data-aos="fade-up">
      <a href="<?= SITE_URL ?>/offers" class="btn-ghost">View All Offers</a>
    </div>

    <?php else: ?>
    <p class="text-center text-muted">Check back soon for our latest special offers.</p>
    <?php endif; ?>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════
 SECTION 8: TESTIMONIALS (from DB)
════════════════════════════════════════════════════════ -->
<section class="testimonials-section" aria-label="Guest Testimonials">
  <div class="container">
    <div class="section-header section-header--center" data-aos="fade-up">
      <span class="section-label">What Our Guests Say</span>
      <h2 class="section-title">Stories From Happy Travellers</h2>
      <p class="section-sub">
        Real experiences from guests who discovered Sri Lanka with Traveljo
      </p>
    </div>

    <?php if (!empty($testimonials)): ?>
    <div class="swiper testimonials-swiper">
      <div class="swiper-wrapper">
        <?php foreach ($testimonials as $testimonial): ?>
        <div class="swiper-slide" style="height:auto">
          <div class="testimonial-card">
            <div class="testimonial-quote">"</div>
            <p class="testimonial-text"><?= e($testimonial['message']) ?></p>
            <div class="testimonial-meta">
              <div class="testimonial-avatar">
                <?= mb_strtoupper(mb_substr($testimonial['guest_name'] ?? 'G', 0, 1)) ?>
              </div>
              <div>
                <div class="testimonial-name"><?= e($testimonial['guest_name']) ?></div>
                <div class="testimonial-country">
                  <?= e($testimonial['country']) ?>
                </div>
                <?php if ($testimonial['tour_title']): ?>
                <div class="testimonial-tour">
                  <?= e($testimonial['tour_title']) ?>
                </div>
                <?php endif; ?>
                <div style="margin-top:0.3rem"><?= starRating((int)$testimonial['rating']) ?></div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <?php endif; ?>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════
 SECTION 9: BLOG PREVIEW (from DB)
════════════════════════════════════════════════════════ -->
<section class="blog-section" aria-label="Travel Blog">
  <div class="container">
    <div class="section-header section-header--flex">
      <div data-aos="fade-right">
        <span class="section-label">Travel Inspiration</span>
        <h2 class="section-title">From Our Travel Blog</h2>
      </div>
      <a href="<?= SITE_URL ?>/blog" class="btn btn-outline" data-aos="fade-left">
        View All Articles
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

    <div class="grid-3">
      <?php if (!empty($blog_posts)): ?>
        <?php foreach ($blog_posts as $i => $post): ?>
        <article class="card blog-card" data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
          <div class="card-img-wrap">
            <img src="<?= SITE_URL ?>/<?= e($post['cover_image'] ?? 'assets/images/hero/sigiriya.jpg') ?>"
                 alt="<?= e($post['title']) ?>"
                 class="card-img"
                 loading="lazy">
          </div>
          <div class="card-body">
            <?php if ($post['tags']): ?>
            <div class="blog-tags">
              <?php foreach (array_slice(explode(',', $post['tags']), 0, 2) as $tag): ?>
              <span class="blog-tag"><?= e(trim($tag)) ?></span>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <h3 class="card-title"><?= e($post['title']) ?></h3>

            <p class="card-excerpt">
              <?= e(excerpt($post['excerpt'] ?? '', 22)) ?>
            </p>

            <div class="card-footer">
              <div class="blog-date">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <?= $post['published_at'] ? date('j M Y', strtotime($post['published_at'])) : 'Recently' ?>
              </div>
              <a href="<?= SITE_URL ?>/blog/<?= e($post['slug']) ?>" class="btn-ghost">
                Read More
              </a>
            </div>
          </div>
        </article>
        <?php endforeach; ?>

      <?php else: ?>
        <div class="card" style="min-height:300px;background:var(--cream);grid-column:1/-1;display:flex;align-items:center;justify-content:center">
          <p class="text-muted">Blog posts coming soon.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════
 SECTION 10: NEWSLETTER SIGNUP
════════════════════════════════════════════════════════ -->
<section class="newsletter-section" aria-label="Newsletter Signup">
  <div class="container">
    <div class="newsletter-inner">

      <div class="newsletter-text" data-aos="fade-right">
        <span class="section-label">Stay Inspired</span>
        <h2 class="section-title">Join the Traveljo<br>Community</h2>
        <div class="divider"></div>
        <p>
          Get monthly travel inspiration, hidden Sri Lanka gems, early-bird offers, and
          insider tips from our expert guides — delivered straight to your inbox.
          No spam, ever. Unsubscribe anytime.
        </p>
        <div style="display:flex;gap:2rem;margin-top:2rem;flex-wrap:wrap">
          <div style="text-align:center">
            <div style="font-family:var(--font-display);font-size:2rem;font-weight:900;color:var(--gold-light)">5,200+</div>
            <div style="font-size:0.8rem;opacity:0.7">Subscribers</div>
          </div>
          <div style="text-align:center">
            <div style="font-family:var(--font-display);font-size:2rem;font-weight:900;color:var(--gold-light)">Monthly</div>
            <div style="font-size:0.8rem;opacity:0.7">Sri Lanka Stories</div>
          </div>
          <div style="text-align:center">
            <div style="font-family:var(--font-display);font-size:2rem;font-weight:900;color:var(--gold-light)">100%</div>
            <div style="font-size:0.8rem;opacity:0.7">Spam-Free</div>
          </div>
        </div>
      </div>

      <div data-aos="fade-left" data-aos-delay="100">
        <form class="newsletter-form" id="newsletter-form" novalidate>
          <?= csrf_field() ?>
          <div style="display:flex;flex-direction:column;gap:0.5rem">
            <label style="font-size:0.85rem;font-weight:600;color:rgba(255,255,255,0.9)"
                   for="nl-name">Your Name</label>
            <input type="text" id="nl-name" name="name"
                   class="newsletter-input"
                   placeholder="Jane Smith"
                   autocomplete="given-name">
          </div>

          <div class="newsletter-form-row">
            <input type="email" id="nl-email" name="email"
                   class="newsletter-input"
                   placeholder="your@email.com"
                   required
                   autocomplete="email">
            <button type="submit" class="btn btn-primary" style="white-space:nowrap">
              Subscribe
            </button>
          </div>

          <p class="newsletter-privacy">
            🔒 We respect your privacy. No spam, ever. Unsubscribe with one click.
          </p>
        </form>
      </div>

    </div>
  </div>
</section>

</main>

<!-- JSON-LD Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "TouristInformationCenter",
  "name": "<?= SITE_NAME ?>",
  "description": "Expert Sri Lanka tour operator offering tailored travel packages for cultural heritage, wildlife safaris, beach escapes and luxury travel.",
  "url": "<?= SITE_URL ?>",
  "telephone": "<?= SITE_PHONE ?>",
  "email": "<?= SITE_EMAIL ?>",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "No. 45, Galle Road",
    "addressLocality": "Colombo",
    "addressRegion": "Western Province",
    "postalCode": "00300",
    "addressCountry": "LK"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 6.9271,
    "longitude": 79.8612
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
    "opens": "08:30",
    "closes": "18:00"
  },
  "sameAs": [
    "<?= SOCIAL_FB ?>",
    "<?= SOCIAL_IG ?>",
    "<?= SOCIAL_TW ?>"
  ]
}
</script>
