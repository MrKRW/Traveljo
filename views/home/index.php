<?php
/**
 * HOME PAGE — views/home/index.php
 * All 11 sections rendered with data from HomeController
 */

// Extra CSS for home-specific styles
$extraCss = ['home.css'];

// Mark this as a hero page (transparent nav)
$isHeroPage = true;
?>

<!-- ════════════════════════════════════════════════════════
 SECTION 1: HERO SLIDER
════════════════════════════════════════════════════════ -->
<main>
<section class="hero" aria-label="Hero Banner">
  <div class="swiper">
    <div class="swiper-wrapper">

      <!-- Slide 1 — Sigiriya -->
      <div class="swiper-slide hero-slide">
        <img src="<?= SITE_URL ?>/assets/images/hero/sigiriya.jpg"
             alt="Sigiriya Rock Fortress, Sri Lanka"
             class="hero-slide-bg" loading="eager">
        <div class="hero-slide-overlay"></div>
        <div class="hero-content">
          <span class="hero-eyebrow">Welcome to Sri Lanka</span>
          <h1 class="hero-title">
            Discover the<br>
            <em>Pearl of the</em><br>
            Indian Ocean
          </h1>
          <p class="hero-subtitle">
            Tailored journeys through ancient kingdoms, emerald highlands &amp; golden shores
          </p>
          <div class="hero-actions">
            <a href="<?= SITE_URL ?>/tours" class="btn btn-primary btn-lg">
              Explore Tours
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="<?= SITE_URL ?>/destinations" class="btn btn-outline-white btn-lg">
              Our Destinations
            </a>
          </div>
        </div>
      </div>

      <!-- Slide 2 — Beach -->
      <div class="swiper-slide hero-slide">
        <img src="<?= SITE_URL ?>/assets/images/hero/beach.jpg"
             alt="Pristine beach in Sri Lanka"
             class="hero-slide-bg" loading="lazy">
        <div class="hero-slide-overlay"></div>
        <div class="hero-content">
          <span class="hero-eyebrow">Southern Coast</span>
          <h1 class="hero-title">
            Endless Beaches,<br>
            <em>Timeless</em><br>
            Memories
          </h1>
          <p class="hero-subtitle">
            From Galle's Dutch fort to Mirissa's whale-watching paradise
          </p>
          <div class="hero-actions">
            <a href="<?= SITE_URL ?>/tour/southern-coast-beach-bliss" class="btn btn-primary btn-lg">
              Explore This Tour
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <button class="btn btn-outline-white btn-lg" onclick="openEnquiryModal()">
              Plan My Trip
            </button>
          </div>
        </div>
      </div>

      <!-- Slide 3 — Wildlife -->
      <div class="swiper-slide hero-slide">
        <img src="<?= SITE_URL ?>/assets/images/hero/elephant.jpg"
             alt="Wild elephants in Yala National Park, Sri Lanka"
             class="hero-slide-bg" loading="lazy">
        <div class="hero-slide-overlay"></div>
        <div class="hero-content">
          <span class="hero-eyebrow">Wildlife Safari</span>
          <h1 class="hero-title">
            Track Leopards,<br>
            <em>Witness</em> the<br>
            Wild
          </h1>
          <p class="hero-subtitle">
            The world's highest leopard density awaits in Yala National Park
          </p>
          <div class="hero-actions">
            <a href="<?= SITE_URL ?>/tour/wild-ceylon-safari" class="btn btn-primary btn-lg">
              Safari Tours
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <button class="btn btn-outline-white btn-lg" onclick="openEnquiryModal()">
              Plan My Trip
            </button>
          </div>
        </div>
      </div>

      <!-- Slide 4 — Tea Train -->
      <div class="swiper-slide hero-slide">
        <img src="<?= SITE_URL ?>/assets/images/hero/tea-train.jpg"
             alt="Scenic train through Sri Lanka tea country"
             class="hero-slide-bg" loading="lazy">
        <div class="hero-slide-overlay"></div>
        <div class="hero-content">
          <span class="hero-eyebrow">Hill Country</span>
          <h1 class="hero-title">
            Ride the World's<br>
            <em>Most Scenic</em><br>
            Railway
          </h1>
          <p class="hero-subtitle">
            Through emerald tea estates from Kandy to Ella on the famous blue train
          </p>
          <div class="hero-actions">
            <a href="<?= SITE_URL ?>/tour/hill-country-train-journey" class="btn btn-primary btn-lg">
              Explore This Tour
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

      <!-- Image column -->
      <div class="about-img-wrap" data-aos="fade-right">
        <img src="<?= SITE_URL ?>/assets/images/hero/sigiriya.jpg"
             alt="Sigiriya Rock Fortress"
             class="about-img-main"
             loading="lazy">
        <img src="<?= SITE_URL ?>/assets/images/hero/beach.jpg"
             alt="Sri Lanka beach"
             class="about-img-accent"
             loading="lazy">
        <div class="about-badge">
          <span class="about-badge-num">20+</span>
          <span class="about-badge-text">Years of<br>Expertise</span>
        </div>
      </div>

      <!-- Text column -->
      <div class="about-text" data-aos="fade-left" data-aos-delay="100">
        <span class="section-label">About Traveljo</span>
        <h2 class="section-title">
          We Know Sri Lanka<br>Like No One Else
        </h2>
        <div class="divider"></div>
        <p class="about-desc">
          Founded with a passion for sharing the extraordinary beauty of our island home,
          Traveljo Ceylon Tours has been crafting personalised Sri Lanka experiences for over
          two decades. From UNESCO World Heritage temples to pristine wilderness, we reveal
          a Sri Lanka that goes far beyond the guidebook.
        </p>
        <p class="about-desc" style="margin-top:-0.75rem">
          Every journey is personally designed around you — your pace, your interests, your
          budget. Our fleet of private vehicles, hand-picked guides, and trusted hotel
          partners mean we deliver an experience that's seamlessly, unforgettably yours.
        </p>

        <!-- Trust Badges -->
        <div class="trust-badges">
          <div class="trust-badge">
            <div class="trust-badge-icon">🏛️</div>
            <div class="trust-badge-info">
              <h4>Heritage Expertise</h4>
              <p>Deep knowledge of Sri Lanka's UNESCO sites and living culture</p>
            </div>
          </div>
          <div class="trust-badge">
            <div class="trust-badge-icon">🚐</div>
            <div class="trust-badge-info">
              <h4>Own Vehicle Fleet</h4>
              <p>Private air-conditioned vehicles and professional drivers</p>
            </div>
          </div>
          <div class="trust-badge">
            <div class="trust-badge-icon">🌿</div>
            <div class="trust-badge-info">
              <h4>Sustainable Travel</h4>
              <p>Committed to eco-responsible tourism and local communities</p>
            </div>
          </div>
          <div class="trust-badge">
            <div class="trust-badge-icon">⭐</div>
            <div class="trust-badge-info">
              <h4>5-Star Rated</h4>
              <p>Consistently rated 5 stars by hundreds of happy travellers</p>
            </div>
          </div>
        </div>

        <a href="<?= SITE_URL ?>/about" class="btn btn-primary">
          Learn More About Us
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>

    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════
 SECTION 3: TOUR CATEGORIES
════════════════════════════════════════════════════════ -->
<section class="categories-section" aria-label="Tour Categories">
  <div class="container">
    <div class="section-header section-header--center" data-aos="fade-up">
      <span class="section-label">What Are You Looking For?</span>
      <h2 class="section-title">Choose Your Journey Style</h2>
    </div>

    <div class="categories-grid">
      <?php
      $categories = [
        ['slug' => 'authentic',  'icon' => '🏯', 'name' => 'Authentic Ceylon',   'count' => 8],
        ['slug' => 'adventure',  'icon' => '🧗', 'name' => 'Adventure',          'count' => 6],
        ['slug' => 'luxury',     'icon' => '💎', 'name' => 'Luxury Escapes',     'count' => 4],
        ['slug' => 'wildlife',   'icon' => '🐘', 'name' => 'Wildlife Safaris',   'count' => 7],
        ['slug' => 'romantic',   'icon' => '💑', 'name' => 'Romantic Getaways',  'count' => 5],
        ['slug' => 'group',      'icon' => '👥', 'name' => 'Group Tours',        'count' => 3],
        ['slug' => 'wellness',   'icon' => '🧘', 'name' => 'Wellness Retreats',  'count' => 4],
      ];
      ?>
      <?php foreach ($categories as $i => $cat): ?>
      <a href="<?= SITE_URL ?>/tours?category=<?= e($cat['slug']) ?>"
         class="category-card"
         data-aos="fade-up"
         data-aos-delay="<?= $i * 60 ?>">
        <div class="category-icon"><?= $cat['icon'] ?></div>
        <div class="category-name"><?= e($cat['name']) ?></div>
        <div class="category-count"><?= $cat['count'] ?> tours</div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════
 SECTION 4: FEATURED TOURS (from DB)
════════════════════════════════════════════════════════ -->
<section class="featured-tours-section" aria-label="Featured Tour Packages">
  <div class="container">
    <div class="section-header section-header--flex">
      <div data-aos="fade-right">
        <span class="section-label">Handpicked For You</span>
        <h2 class="section-title">Featured Tour Packages</h2>
      </div>
      <a href="<?= SITE_URL ?>/tours" class="btn btn-outline" data-aos="fade-left">
        View All Tours
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

    <div class="grid-3">
      <?php if (!empty($featured_tours)): ?>
        <?php foreach ($featured_tours as $i => $tour): ?>
        <article class="card tour-card"
                 data-aos="fade-up"
                 data-aos-delay="<?= $i * 80 ?>">

          <div class="card-img-wrap">
            <img src="<?= SITE_URL ?>/<?= e($tour['cover_image'] ?? 'assets/images/hero/sigiriya.jpg') ?>"
                 alt="<?= e($tour['title']) ?>"
                 class="card-img"
                 loading="lazy">
            <span class="card-badge"><?= e(ucfirst($tour['category'])) ?></span>
          </div>

          <div class="card-body">
            <div class="card-tag"><?= e($tour['category']) ?></div>
            <h3 class="card-title"><?= e($tour['title']) ?></h3>

            <div class="card-meta">
              <span class="card-meta-item">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <?= e($tour['duration_days']) ?> Days
              </span>
              <span class="card-meta-sep">·</span>
              <span class="card-meta-item">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                Private Tour
              </span>
            </div>

            <p class="card-excerpt"><?= e(excerpt($tour['tagline'] ?? $tour['description'] ?? '', 20)) ?></p>

            <div class="card-footer">
              <div>
                <span class="card-price-label">From</span>
                <span class="card-price"><?= $tour['price_usd'] ? formatPrice((float)$tour['price_usd']) : 'Contact Us' ?></span>
              </div>
              <a href="<?= SITE_URL ?>/tour/<?= e($tour['slug']) ?>"
                 class="btn btn-primary btn-sm">
                View Tour
              </a>
            </div>
          </div>
        </article>
        <?php endforeach; ?>

      <?php else: ?>
        <!-- Skeleton placeholders when DB is empty -->
        <?php for ($i = 0; $i < 3; $i++): ?>
        <div class="card" style="min-height:420px;background:var(--cream)"></div>
        <?php endfor; ?>
      <?php endif; ?>
    </div><!-- /grid-3 -->
  </div>
</section>


<!-- ════════════════════════════════════════════════════════
 SECTION 5: DESTINATIONS GRID (from DB)
════════════════════════════════════════════════════════ -->
<section class="destinations-section" aria-label="Sri Lanka Destinations">
  <div class="container">
    <div class="section-header section-header--flex">
      <div data-aos="fade-right">
        <span class="section-label">Our Island</span>
        <h2 class="section-title">Discover Sri Lanka's<br>Iconic Destinations</h2>
      </div>
      <a href="<?= SITE_URL ?>/destinations" class="btn btn-outline" data-aos="fade-left">
        All Destinations
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

    <div class="destinations-grid" data-aos="fade-up">
      <?php if (!empty($destinations)): ?>
        <?php foreach ($destinations as $i => $dest): ?>
        <a href="<?= SITE_URL ?>/destination/<?= e($dest['slug']) ?>"
           class="dest-tile"
           aria-label="Explore <?= e($dest['name']) ?>">
          <img src="<?= SITE_URL ?>/<?= e($dest['cover_image'] ?? 'assets/images/hero/sigiriya.jpg') ?>"
               alt="<?= e($dest['name']) ?>, Sri Lanka"
               loading="lazy">
          <div class="dest-tile-overlay">
            <div class="dest-tile-info">
              <div class="dest-tile-region"><?= e($dest['region']) ?></div>
              <div class="dest-tile-name"><?= e($dest['name']) ?></div>
              <span class="dest-tile-cta">Explore →</span>
            </div>
          </div>
        </a>
        <?php endforeach; ?>

      <?php else: ?>
        <?php
        $placeholders = ['Sigiriya','Galle','Kandy','Ella','Mirissa','Yala'];
        foreach ($placeholders as $name):
        ?>
        <div class="dest-tile" style="background:var(--cream-dark)">
          <div class="dest-tile-overlay">
            <div class="dest-tile-info">
              <div class="dest-tile-name"><?= e($name) ?></div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════
 SECTION 6: EXPERIENCES
════════════════════════════════════════════════════════ -->
<section class="experiences-section" aria-label="Sri Lanka Experiences">
  <img src="<?= SITE_URL ?>/assets/images/hero/tea-train.jpg"
       alt=""
       class="experiences-bg"
       aria-hidden="true"
       loading="lazy">

  <div class="container">
    <div class="section-header section-header--center" data-aos="fade-up">
      <span class="section-label" style="color:var(--gold-light)">How Will You Spend Your Days?</span>
      <h2 class="section-title section-title--white">Extraordinary Experiences Await</h2>
      <p class="section-sub section-sub--white">
        From ancient temples to blue whale encounters — every day in Sri Lanka is an adventure
      </p>
    </div>

    <?php
    $experiences = [
      ['icon' => '🏝️', 'name' => 'Beaches & Coastline',      'desc' => 'From turtle-nesting coves to surf breaks and whale-watching straits — Sri Lanka's 1,340km coastline never repeats itself.'],
      ['icon' => '🏛️', 'name' => 'History & Culture',          'desc' => 'Walk among 2,500-year-old stupas, ancient royal palaces, and vibrant Buddhist monasteries still used today.'],
      ['icon' => '🐆', 'name' => 'Wildlife & Safaris',         'desc' => 'Spot leopards at Yala, elephants at Udawalawe, and blue whales off Mirissa — all within one extraordinary island.'],
      ['icon' => '🧗', 'name' => 'Adventure & Outdoors',       'desc' => 'Hike Adam's Peak at dawn, surf Arugam Bay, white-water raft the Kelani River, or zip-line over the rainforest.'],
      ['icon' => '🍛', 'name' => 'Gastronomy & Food',          'desc' => 'Explore a cuisine shaped by three millennia of trade — fresh coconut, bold spices, and street food that tells Sri Lanka's story.'],
      ['icon' => '🗺️', 'name' => 'Off The Beaten Path',       'desc' => 'Discover the quiet north, the wild east coast, and hidden jungle temples most tourists will never find.'],
    ];
    ?>

    <div class="experiences-grid">
      <?php foreach ($experiences as $i => $exp): ?>
      <a href="<?= SITE_URL ?>/experiences"
         class="experience-card"
         data-aos="fade-up"
         data-aos-delay="<?= $i * 70 ?>">
        <div class="experience-icon"><?= $exp['icon'] ?></div>
        <div class="experience-name"><?= e($exp['name']) ?></div>
        <p class="experience-desc"><?= e($exp['desc']) ?></p>
      </a>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-md" data-aos="fade-up" data-aos-delay="450">
      <a href="<?= SITE_URL ?>/experiences" class="btn btn-outline-white btn-lg">
        Explore All Experiences
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
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
