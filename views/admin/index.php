<main class="admin-page">
  <section class="admin-header">
    <div class="container">
      <span class="section-label">Admin Panel</span>
      <h1 class="section-title">Dashboard</h1>
      <p class="section-sub">Manage your tours and gallery images in one place.</p>
      
      <div class="admin-tabs" style="margin-top: 2rem; display: flex; gap: 1rem;">
        <button id="tab-btn-tours" class="btn btn-primary" onclick="switchAdminTab('tours')">Tours Management</button>
        <button id="tab-btn-gallery" class="btn" style="background: transparent; color: var(--text-main); border: 1px solid var(--border-color);" onclick="switchAdminTab('gallery')">Gallery Management</button>
      </div>
    </div>
  </section>

  <!-- TOURS SECTION -->
  <section id="tours-section" class="admin-tours-content" style="padding-top: 2rem;">
    <div class="container admin-grid">
      <div class="admin-card">
        <h2>Add New Tour</h2>

        <?php if (!empty($tour_flash)): ?>
          <div class="admin-alert admin-alert--<?= e($tour_flash['type'] ?? 'success') ?>">
            <?= e($tour_flash['message'] ?? '') ?>
          </div>
        <?php endif; ?>

        <form action="<?= SITE_URL ?>/admin/store-tour" method="POST" class="admin-form">
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

  <!-- GALLERY SECTION -->
  <section id="gallery-section" class="admin-gallery-content" style="padding-top: 2rem; display: none;">
    <div class="container admin-grid">
      <div class="admin-card">
        <h2>Add New Image</h2>

        <?php if (!empty($gallery_flash)): ?>
          <div class="admin-alert admin-alert--<?= e($gallery_flash['type'] ?? 'success') ?>">
            <?= e($gallery_flash['message'] ?? '') ?>
          </div>
        <?php endif; ?>

        <form action="<?= SITE_URL ?>/admin/store-gallery" method="POST" enctype="multipart/form-data" class="admin-form">
          <?= csrf_field() ?>

          <label for="gallery_title">Image Title (optional)</label>
          <input type="text" id="gallery_title" name="title" placeholder="e.g. Sunset at Mirissa Beach">

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

<script>
  function switchAdminTab(tabName) {
    const toursSection = document.getElementById('tours-section');
    const gallerySection = document.getElementById('gallery-section');
    const btnTours = document.getElementById('tab-btn-tours');
    const btnGallery = document.getElementById('tab-btn-gallery');

    if (tabName === 'tours') {
      toursSection.style.display = 'block';
      gallerySection.style.display = 'none';
      
      btnTours.className = 'btn btn-primary';
      btnTours.style.background = '';
      btnTours.style.color = '';
      btnTours.style.border = '';

      btnGallery.className = 'btn';
      btnGallery.style.background = 'transparent';
      btnGallery.style.color = 'var(--text-main)';
      btnGallery.style.border = '1px solid var(--border-color)';
      
      // Store tab preference
      localStorage.setItem('adminActiveTab', 'tours');
    } else {
      toursSection.style.display = 'none';
      gallerySection.style.display = 'block';
      
      btnGallery.className = 'btn btn-primary';
      btnGallery.style.background = '';
      btnGallery.style.color = '';
      btnGallery.style.border = '';

      btnTours.className = 'btn';
      btnTours.style.background = 'transparent';
      btnTours.style.color = 'var(--text-main)';
      btnTours.style.border = '1px solid var(--border-color)';
      
      // Store tab preference
      localStorage.setItem('adminActiveTab', 'gallery');
    }
  }

  // Restore last active tab on page load
  document.addEventListener('DOMContentLoaded', () => {
    const activeTab = localStorage.getItem('adminActiveTab');
    // If a flash message exists for gallery, force switch to gallery
    const hasGalleryFlash = <?= !empty($gallery_flash) ? 'true' : 'false' ?>;
    
    if (hasGalleryFlash) {
      switchAdminTab('gallery');
    } else if (activeTab === 'gallery') {
      switchAdminTab('gallery');
    }
  });
</script>
