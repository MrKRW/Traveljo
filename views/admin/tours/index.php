<main class="admin-tours-page">
  <section class="admin-tours-header">
    <div class="container">
      <span class="section-label">Admin Panel</span>
      <h1 class="section-title">Manage Tours</h1>
      <p class="section-sub">Add tours here. Published tours will appear on the public tours page.</p>

      <div class="admin-shortcuts">
        <a class="admin-shortcut <?= is_active('/admin/tours') ?>" href="<?= SITE_URL ?>/admin/tours">Tours</a>
        <a class="admin-shortcut <?= is_active('/admin/gallery') ?>" href="<?= SITE_URL ?>/admin/gallery">Gallery</a>
      </div>
    </div>
  </section>

  <section class="admin-tours-content">
    <div class="container admin-grid">
      <div class="admin-card">
        <h2>Add New Tour</h2>

        <?php if (!empty($flash)): ?>
          <div class="admin-alert admin-alert--<?= e($flash['type'] ?? 'success') ?>">
            <?= e($flash['message'] ?? '') ?>
          </div>
        <?php endif; ?>

        <form action="<?= SITE_URL ?>/admin/tours/store" method="POST" class="admin-form">
          <?= csrf_field() ?>

          <label for="title">Tour Title *</label>
          <input type="text" id="title" name="title" placeholder="e.g. Ancient Wonders of Ceylon" required>

          <label for="category">Category *</label>
          <select id="category" name="category" required>
            <option value="">Select a category</option>
            <option value="authentic">Authentic Ceylon</option>
            <option value="adventure">Adventure</option>
            <option value="luxury">Luxury</option>
            <option value="wildlife">Wildlife</option>
            <option value="romantic">Romantic</option>
            <option value="group">Group</option>
            <option value="wellness">Wellness</option>
          </select>

          <div class="admin-form-row">
            <div>
              <label for="duration_days">Duration (days) *</label>
              <input type="number" id="duration_days" name="duration_days" min="1" value="1" required>
            </div>
            <div>
              <label for="price_usd">Price (USD)</label>
              <input type="number" id="price_usd" name="price_usd" min="0" step="0.01" placeholder="e.g. 1800">
            </div>
          </div>

          <label for="tagline">Tagline</label>
          <input type="text" id="tagline" name="tagline" placeholder="Short one-line value pitch">

          <label for="description">Description</label>
          <textarea id="description" name="description" rows="4" placeholder="Tour overview"></textarea>

          <label for="highlights">Highlights</label>
          <textarea id="highlights" name="highlights" rows="3" placeholder="Use | to separate highlights"></textarea>

          <label for="cover_image">Cover Image Path</label>
          <input type="text" id="cover_image" name="cover_image" placeholder="assets/images/hero/sigiriya.jpg">

          <div class="admin-form-row">
            <div>
              <label for="featured">Featured</label>
              <select id="featured" name="featured">
                <option value="0">No</option>
                <option value="1">Yes</option>
              </select>
            </div>
            <div>
              <label for="status">Status</label>
              <select id="status" name="status">
                <option value="published">Published</option>
                <option value="draft" selected>Draft</option>
              </select>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Save Tour</button>
        </form>
      </div>

      <div class="admin-card">
        <h2>Saved Tours</h2>

        <?php if (!empty($tours)): ?>
          <div class="admin-tour-list">
            <?php foreach ($tours as $tour): ?>
              <article class="admin-tour-item">
                <img src="<?= SITE_URL . '/' . e(ltrim((string)($tour['cover_image'] ?? ''), '/')) ?>"
                     alt="<?= e($tour['title'] ?: 'Tour') ?>">
                <div class="admin-tour-info">
                  <h3><?= e($tour['title']) ?></h3>
                  <p><?= e(ucfirst($tour['category'])) ?> · <?= e((string)$tour['duration_days']) ?> Days · <?= e($tour['status']) ?></p>
                  <small><?= e((string)$tour['slug']) ?></small>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <p class="admin-empty">No tours created yet.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
