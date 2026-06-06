<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle ?? SITE_NAME) ?></title>
  <meta name="description" content="<?= e($metaDesc ?? 'Traveljo Ceylon Tours — Expert Sri Lanka tour operator offering tailor-made travel packages, cultural heritage tours, wildlife safaris, beach escapes and luxury travel.') ?>">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?= e(current_url()) ?>">

  <!-- Open Graph -->
  <meta property="og:type"        content="website">
  <meta property="og:site_name"   content="<?= e(SITE_NAME) ?>">
  <meta property="og:title"       content="<?= e($pageTitle ?? SITE_NAME) ?>">
  <meta property="og:description" content="<?= e($metaDesc ?? '') ?>">
  <meta property="og:image"       content="<?= SITE_URL ?>/assets/images/logo.png">
  <meta property="og:url"         content="<?= e(current_url()) ?>">

  <!-- Twitter Card -->
  <meta name="twitter:card"        content="summary_large_image">
  <meta name="twitter:title"       content="<?= e($pageTitle ?? SITE_NAME) ?>">
  <meta name="twitter:description" content="<?= e($metaDesc ?? '') ?>">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?= SITE_URL ?>/assets/images/logo.png">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,600&family=Source+Sans+3:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

  <!-- Site CSS -->
  <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css?v=1.3">
  <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/nav.css?v=1.5">
  <?php if (isset($extraCss)): foreach ($extraCss as $css): ?>
  <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/<?= e($css) ?>?v=1.4">
  <?php endforeach; endif; ?>
</head>
<body>


<!-- ══ SITE HEADER ══════════════════════════════════════════ -->
<header class="site-header <?= ($isHeroPage ?? false) ? 'is-hero' : 'solid' ?> <?= ($isHomePage ?? false) ? 'has-split-nav' : '' ?>" id="site-header" role="navigation">
  <nav class="site-nav">
    <div class="container">

<?php if ($isHomePage ?? false): ?>
      <!-- ── HOMEPAGE: Split nav — links | LOGO | links ── -->
      <div class="nav-inner nav-inner--split">

        <!-- Left links -->
        <ul class="nav-links nav-links--left" role="list">
          <li>
            <a href="<?= SITE_URL ?>/" class="<?= is_active('/') ?>">Home</a>
          </li>
          <li>
            <a href="<?= SITE_URL ?>/about" class="<?= is_active('/about') ?>">About Us</a>
          </li>
          <li class="has-dropdown">
            <a href="<?= SITE_URL ?>/tours" class="<?= is_active('/tours') ?>">Tours</a>
            <ul class="nav-dropdown">
              <li><a href="<?= SITE_URL ?>/tours?category=authentic">Authentic Ceylon</a></li>
              <li><a href="<?= SITE_URL ?>/tours?category=adventure">Adventure</a></li>
              <li><a href="<?= SITE_URL ?>/tours?category=luxury">Luxury</a></li>
              <li><a href="<?= SITE_URL ?>/tours?category=wildlife">Wildlife</a></li>
              <li><a href="<?= SITE_URL ?>/tours?category=romantic">Romantic</a></li>
              <li><a href="<?= SITE_URL ?>/tours?category=wellness">Wellness</a></li>
              <li><a href="<?= SITE_URL ?>/tours">All Tours &rarr;</a></li>
            </ul>
          </li>
        </ul>

        <!-- Centre Logo -->
        <a href="<?= SITE_URL ?>/" class="nav-logo nav-logo--center" aria-label="<?= e(SITE_NAME) ?> Home">
          <img src="<?= SITE_URL ?>/assets/images/logo.png"
               alt="<?= e(SITE_NAME) ?> Logo"
               width="140" height="140">
        </a>

        <!-- Right links -->
        <ul class="nav-links nav-links--right" role="list">
          <li>
            <a href="<?= SITE_URL ?>/gallery" class="<?= is_active('/gallery') ?>">Gallery</a>
          </li>
          <li>
            <a href="<?= SITE_URL ?>/contact" class="<?= is_active('/contact') ?>">Contact Us</a>
          </li>
          <li class="nav-cta-item">
            <button class="btn btn-primary btn-sm" id="enquiry-fab-btn" onclick="openEnquiryModal()">
              Plan My Trip
            </button>
          </li>
        </ul>

        <!-- Hamburger (mobile only) -->
        <button class="hamburger" id="hamburger" aria-label="Open menu" aria-expanded="false">
          <span></span>
          <span></span>
          <span></span>
        </button>

      </div>
<?php else: ?>
      <!-- ── OTHER PAGES: Standard nav ── -->
      <div class="nav-inner">

        <!-- Logo -->
        <a href="<?= SITE_URL ?>/" class="nav-logo" aria-label="<?= e(SITE_NAME) ?> Home">
          <img src="<?= SITE_URL ?>/assets/images/logo.png"
               alt="<?= e(SITE_NAME) ?> Logo"
               width="160" height="54">
        </a>

        <!-- Desktop Nav Links -->
        <ul class="nav-links" id="nav-links" role="list">
          <li>
            <a href="<?= SITE_URL ?>/" class="<?= is_active('/') ?>">Home</a>
          </li>
          <li>
            <a href="<?= SITE_URL ?>/about" class="<?= is_active('/about') ?>">About Us</a>
          </li>
          <li class="has-dropdown">
            <a href="<?= SITE_URL ?>/tours" class="<?= is_active('/tours') ?>">Tours</a>
            <ul class="nav-dropdown">
              <li><a href="<?= SITE_URL ?>/tours?category=authentic">Authentic Ceylon</a></li>
              <li><a href="<?= SITE_URL ?>/tours?category=adventure">Adventure</a></li>
              <li><a href="<?= SITE_URL ?>/tours?category=luxury">Luxury</a></li>
              <li><a href="<?= SITE_URL ?>/tours?category=wildlife">Wildlife</a></li>
              <li><a href="<?= SITE_URL ?>/tours?category=romantic">Romantic</a></li>
              <li><a href="<?= SITE_URL ?>/tours?category=wellness">Wellness</a></li>
              <li><a href="<?= SITE_URL ?>/tours">All Tours &rarr;</a></li>
            </ul>
          </li>
          <li>
            <a href="<?= SITE_URL ?>/gallery" class="<?= is_active('/gallery') ?>">Gallery</a>
          </li>
          <li>
            <a href="<?= SITE_URL ?>/contact" class="<?= is_active('/contact') ?>">Contact Us</a>
          </li>
        </ul>

        <!-- CTA + Hamburger -->
        <div class="nav-actions" style="display:flex;align-items:center;gap:1rem;">
          <div class="nav-cta">
            <button class="btn btn-primary btn-sm" id="enquiry-fab-btn" onclick="openEnquiryModal()">
              Plan My Trip
            </button>
          </div>

          <button class="hamburger" id="hamburger" aria-label="Open menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>

      </div>
<?php endif; ?>

    </div>
  </nav>
</header>

<!-- ══ MOBILE MENU ══════════════════════════════════════════ -->
<div class="mobile-menu" id="mobile-menu" role="dialog" aria-label="Mobile navigation" aria-modal="true">
  <div class="mobile-menu-header">
    <img src="<?= SITE_URL ?>/assets/images/logo.png" alt="<?= e(SITE_NAME) ?>" height="44">
    <button class="mobile-menu-close" id="mobile-close" aria-label="Close menu">×</button>
  </div>

  <ul class="mobile-nav" role="list">
    <li><a href="<?= SITE_URL ?>/" class="<?= is_active('/') ?>">Home</a></li>
    <li><a href="<?= SITE_URL ?>/about" class="<?= is_active('/about') ?>">About Us</a></li>
    <li><a href="<?= SITE_URL ?>/tours" class="<?= is_active('/tours') ?>">Tours</a></li>
    <li><a href="<?= SITE_URL ?>/gallery" class="<?= is_active('/gallery') ?>">Gallery</a></li>
    <li><a href="<?= SITE_URL ?>/contact" class="<?= is_active('/contact') ?>">Contact Us</a></li>
  </ul>

  <div class="mobile-menu-footer">
    <button class="btn btn-primary" onclick="openEnquiryModal(); closeMobileMenu()">
      Plan My Trip
    </button>
    <div class="mobile-contact">
      <a href="tel:<?= e(SITE_PHONE) ?>"><?= e(SITE_PHONE) ?></a>
      <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a>
    </div>
  </div>
</div>

<!-- Body starts below -->
