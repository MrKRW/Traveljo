<main class="gallery-page">
  <section class="gallery-hero">
    <div class="container">
      <span class="section-label">Travel Moments</span>
      <h1 class="section-title">Our Sri Lanka Gallery</h1>
      <p class="section-sub">
        A curated visual journey across beaches, wildlife, tea country, and timeless heritage landmarks.
      </p>
    </div>
  </section>

  <section class="gallery-grid-section">
    <div class="container">
      <?php if (!empty($images)): ?>
        <div class="masonry-grid">
          <?php foreach ($images as $image): ?>
            <figure class="gallery-card">
              <img
                src="<?= SITE_URL . '/' . e(ltrim($image['image_path'], '/')) ?>"
                alt="<?= e($image['title'] ?: 'Traveljo gallery image') ?>"
                loading="lazy"
              >
              <?php if (!empty($image['title'])): ?>
                <figcaption><?= e($image['title']) ?></figcaption>
              <?php endif; ?>
            </figure>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <div class="gallery-empty">
          <h2>Gallery coming soon</h2>
          <p>We are adding fresh travel moments. Please check back shortly.</p>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>
