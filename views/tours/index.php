<main class="tours-page">
  <section class="page-hero tours-hero">
    <div class="container">
      <span class="page-hero-label">Tour Packages</span>
      <h1 class="page-hero-title">Find Your Perfect Sri Lanka Journey</h1>
      <p class="page-hero-sub">Every tour below is curated by our team and managed from the admin panel.</p>
    </div>
  </section>

  <section class="tours-toolbar">
    <div class="container tours-toolbar-inner">
      <div>
        <span class="section-label">Browse Tours</span>
        <h2 class="section-title">Available Tour Packages</h2>
        <p class="section-sub"><?= e((string)$totalTours) ?> tours available<?= $category ? ' in ' . e(ucfirst($category)) : '' ?>.</p>
      </div>

      <form method="GET" action="<?= SITE_URL ?>/tours" class="tours-filter-form">
        <label for="category" class="sr-only">Filter by category</label>
        <select id="category" name="category" class="form-control">
          <option value="">All Categories</option>
          <?php
            $catMap = [
              'authentic' => 'Authentic Ceylon',
              'adventure' => 'Adventure',
              'luxury' => 'Luxury',
              'wildlife' => 'Wildlife',
              'romantic' => 'Romantic',
              'group' => 'Group',
              'wellness' => 'Wellness',
            ];
          ?>
          <?php foreach ($catMap as $catSlug => $catName): ?>
            <option value="<?= e($catSlug) ?>" <?= $category === $catSlug ? 'selected' : '' ?>>
              <?= e($catName) ?>
            </option>
          <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-outline">Apply</button>
      </form>
    </div>
  </section>

  <section class="tours-list-section">
    <div class="container">
      <?php if (!empty($tours)): ?>
        <div class="grid-3">
          <?php foreach ($tours as $tour): ?>
            <article class="card tour-card">
              <div class="card-img-wrap">
                <img src="<?= SITE_URL . '/' . e(ltrim((string)($tour['cover_image'] ?? 'assets/images/hero/sigiriya.jpg'), '/')) ?>"
                     alt="<?= e((string)$tour['title']) ?>"
                     class="card-img"
                     loading="lazy">
                <span class="card-badge"><?= e(ucfirst((string)$tour['category'])) ?></span>
              </div>

              <div class="card-body">
                <div class="card-tag"><?= e((string)$tour['category']) ?></div>
                <h3 class="card-title"><?= e((string)$tour['title']) ?></h3>

                <div class="card-meta">
                  <span class="card-meta-item"><?= e((string)$tour['duration_days']) ?> Days</span>
                  <span class="card-meta-sep">·</span>
                  <span class="card-meta-item"><?= !empty($tour['featured']) ? 'Featured' : 'Private Tour' ?></span>
                </div>

                <p class="card-excerpt"><?= e(excerpt((string)($tour['tagline'] ?: $tour['description'] ?: ''), 20)) ?></p>

                <div class="card-footer">
                  <a href="<?= SITE_URL ?>/tour/<?= e((string)$tour['slug']) ?>" class="btn btn-primary btn-sm" style="width: 100%; justify-content: center;">View Tour</a>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <div class="tours-empty">
          <h3>No tours found yet</h3>
          <p>Use the admin panel to add tours and publish them.</p>
          <a href="<?= SITE_URL ?>/admin/tours" class="btn btn-primary">Go to Admin Tours</a>
        </div>
      <?php endif; ?>

      <?php if (($pagination['total_pages'] ?? 1) > 1): ?>
        <div class="pagination">
          <?php
            $current = (int)$pagination['current'];
            $totalPages = (int)$pagination['total_pages'];
            $queryBase = $category ? '&category=' . urlencode($category) : '';
          ?>
          <?php for ($p = 1; $p <= $totalPages; $p++): ?>
            <a href="<?= SITE_URL ?>/tours?page=<?= $p . $queryBase ?>" class="<?= $p === $current ? 'active' : '' ?>">
              <?= $p ?>
            </a>
          <?php endfor; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>
