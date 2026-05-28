<main class="admin-gallery-page">
  <section class="admin-gallery-header">
    <div class="container">
      <span class="section-label">Admin Panel</span>
      <h1 class="section-title">Manage Gallery Images</h1>
      <p class="section-sub">Upload images here and they will appear on the public gallery page.</p>
      <div class="admin-shortcuts">
        <a class="admin-shortcut <?= is_active('/admin/tours') ?>" href="<?= SITE_URL ?>/admin/tours">Tours</a>
        <a class="admin-shortcut <?= is_active('/admin/gallery') ?>" href="<?= SITE_URL ?>/admin/gallery">Gallery</a>
      </div>
    </div>
  </section>

  <section class="admin-gallery-content">
    <div class="container admin-grid">
      <div class="admin-card">
        <h2>Add New Image</h2>

        <?php if (!empty($flash)): ?>
          <div class="admin-alert admin-alert--<?= e($flash['type'] ?? 'success') ?>">
            <?= e($flash['message'] ?? '') ?>
          </div>
        <?php endif; ?>

        <form action="<?= SITE_URL ?>/admin/gallery/store" method="POST" enctype="multipart/form-data" class="admin-form">
          <?= csrf_field() ?>

          <label for="title">Image Title (optional)</label>
          <input type="text" id="title" name="title" placeholder="e.g. Sunset at Mirissa Beach">

          <label for="sort_order">Sort Order</label>
          <input type="number" id="sort_order" name="sort_order" value="0" min="0">

          <label for="image">Image File (JPG, PNG, WEBP · max 5MB)</label>
          <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp" required>

          <button type="submit" class="btn btn-primary">Upload Image</button>
        </form>
      </div>

      <div class="admin-card">
        <h2>Current Gallery Images</h2>
        <?php if (!empty($images)): ?>
          <div class="admin-gallery-list">
            <?php foreach ($images as $image): ?>
              <article class="admin-image-item">
                <img src="<?= SITE_URL . '/' . e(ltrim($image['image_path'], '/')) ?>" alt="<?= e($image['title'] ?: 'Gallery image') ?>">
                <div class="admin-image-info">
                  <h3><?= e($image['title'] ?: 'Untitled image') ?></h3>
                  <p><?= e($image['image_path']) ?></p>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <p class="admin-empty">No gallery images found yet.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
