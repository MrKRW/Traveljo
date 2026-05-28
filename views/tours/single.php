<main class="tour-single-page">
  <section class="page-hero tour-single-hero">
    <div class="container">
      <span class="page-hero-label"><?= e(ucfirst((string)$tour['category'])) ?> Tour</span>
      <h1 class="page-hero-title"><?= e((string)$tour['title']) ?></h1>
      <p class="page-hero-sub"><?= e((string)($tour['tagline'] ?: 'Curated private tour in Sri Lanka.')) ?></p>
    </div>
  </section>

  <section class="tour-single-content">
    <div class="container">
      <div class="breadcrumb mb-md">
        <a href="<?= SITE_URL ?>/">Home</a>
        <span class="breadcrumb-sep">/</span>
        <a href="<?= SITE_URL ?>/tours">Tours</a>
        <span class="breadcrumb-sep">/</span>
        <span class="current"><?= e((string)$tour['title']) ?></span>
      </div>

      <div class="tour-single-grid">
        <article class="tour-main card">
          <div class="card-img-wrap">
            <img class="card-img"
                 src="<?= SITE_URL . '/' . e(ltrim((string)($tour['cover_image'] ?? 'assets/images/hero/sigiriya.jpg'), '/')) ?>"
                 alt="<?= e((string)$tour['title']) ?>">
          </div>
          <div class="card-body">
            <h2 class="card-title">Tour Overview</h2>
            <p class="card-excerpt"><?= nl2br(e((string)($tour['description'] ?? 'Details coming soon.'))) ?></p>

            <?php if (!empty($tour['highlights'])): ?>
              <h3 class="tour-sub-title">Highlights</h3>
              <ul class="tour-highlights">
                <?php foreach (explode('|', (string)$tour['highlights']) as $point): ?>
                  <?php if (trim($point) !== ''): ?>
                    <li><?= e(trim($point)) ?></li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        </article>

        <aside class="tour-side card">
          <div class="card-body">
            <h3 class="card-title">Quick Facts</h3>
            <div class="tour-facts">
              <p><strong>Duration:</strong> <?= e((string)$tour['duration_days']) ?> days</p>
              <p><strong>Category:</strong> <?= e(ucfirst((string)$tour['category'])) ?></p>
              <p><strong>Price:</strong> <?= !empty($tour['price_usd']) ? formatPrice((float)$tour['price_usd']) : 'Contact us' ?></p>
            </div>
            <button class="btn btn-primary" onclick="openEnquiryModal(<?= (int)$tour['id'] ?>)">Plan This Tour</button>
          </div>
        </aside>
      </div>

      <?php if (!empty($related)): ?>
        <div class="related-wrap">
          <h3 class="section-title">Related Tours</h3>
          <div class="grid-3">
            <?php foreach ($related as $item): ?>
              <article class="card">
                <div class="card-body">
                  <div class="card-tag"><?= e((string)$item['category']) ?></div>
                  <h4 class="card-title"><?= e((string)$item['title']) ?></h4>
                  <p class="card-excerpt"><?= e(excerpt((string)($item['tagline'] ?: ''), 16)) ?></p>
                  <a href="<?= SITE_URL ?>/tour/<?= e((string)$item['slug']) ?>" class="btn btn-outline btn-sm">View Tour</a>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>
