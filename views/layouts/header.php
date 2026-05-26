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
  <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/nav.css">
  <?php if (isset($extraCss)): foreach ($extraCss as $css): ?>
  <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/<?= e($css) ?>">
  <?php endforeach; endif; ?>
</head>
<body>

<!-- ══ TOP BAR ══════════════════════════════════════════════ -->
<div class="topbar" role="banner">
  <div class="container">
    <div class="topbar-inner">
      <div class="topbar-left">
        <a href="tel:<?= e(SITE_PHONE) ?>">
          <span>📞</span> <?= e(SITE_PHONE) ?>
        </a>
        <span class="topbar-sep"></span>
        <a href="mailto:<?= e(SITE_EMAIL) ?>">
          <span>✉</span> <?= e(SITE_EMAIL) ?>
        </a>
      </div>
      <div class="topbar-right">
        <div class="topbar-socials">
          <a href="<?= SOCIAL_FB ?>" target="_blank" rel="noopener" aria-label="Facebook">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
          </a>
          <a href="<?= SOCIAL_IG ?>" target="_blank" rel="noopener" aria-label="Instagram">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
          </a>
          <a href="<?= SOCIAL_TW ?>" target="_blank" rel="noopener" aria-label="Twitter">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0022.43.36a9 9 0 01-2.88 1.1 4.52 4.52 0 00-7.69 4.11A12.82 12.82 0 011.64 1s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
          </a>
          <a href="<?= SOCIAL_YT ?>" target="_blank" rel="noopener" aria-label="YouTube">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 00-1.94-1.95C18.88 4 12 4 12 4s-6.88 0-8.6.47A2.78 2.78 0 001.46 6.42 29 29 0 001 12a29 29 0 00.46 5.58A2.78 2.78 0 003.4 19.53C5.12 20 12 20 12 20s6.88 0 8.6-.47a2.78 2.78 0 001.94-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ══ SITE HEADER ══════════════════════════════════════════ -->
<header class="site-header <?= ($isHeroPage ?? false) ? 'is-hero' : 'solid' ?>" id="site-header" role="navigation">
  <nav class="site-nav">
    <div class="container">
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
          <li class="has-dropdown">
            <a href="<?= SITE_URL ?>/destinations" class="<?= is_active('/destinations') ?>">Destinations</a>
            <ul class="nav-dropdown">
              <li><a href="<?= SITE_URL ?>/destination/sigiriya">Sigiriya</a></li>
              <li><a href="<?= SITE_URL ?>/destination/galle">Galle</a></li>
              <li><a href="<?= SITE_URL ?>/destination/kandy">Kandy</a></li>
              <li><a href="<?= SITE_URL ?>/destination/ella">Ella</a></li>
              <li><a href="<?= SITE_URL ?>/destination/mirissa">Mirissa</a></li>
              <li><a href="<?= SITE_URL ?>/destination/yala">Yala</a></li>
              <li><a href="<?= SITE_URL ?>/destinations">All Destinations →</a></li>
            </ul>
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
              <li><a href="<?= SITE_URL ?>/tours">All Tours →</a></li>
            </ul>
          </li>
          <li>
            <a href="<?= SITE_URL ?>/experiences" class="<?= is_active('/experiences') ?>">Experiences</a>
          </li>
          <li>
            <a href="<?= SITE_URL ?>/gallery" class="<?= is_active('/gallery') ?>">Gallery</a>
          </li>
          <li>
            <a href="<?= SITE_URL ?>/offers" class="<?= is_active('/offers') ?>">Offers</a>
          </li>
          <li>
            <a href="<?= SITE_URL ?>/blog" class="<?= is_active('/blog') ?>">Blog</a>
          </li>
          <li>
            <a href="<?= SITE_URL ?>/about" class="<?= is_active('/about') ?>">About</a>
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
    <li><a href="<?= SITE_URL ?>/destinations" class="<?= is_active('/destinations') ?>">Destinations</a></li>
    <li><a href="<?= SITE_URL ?>/tours" class="<?= is_active('/tours') ?>">Tours</a></li>
    <li><a href="<?= SITE_URL ?>/experiences" class="<?= is_active('/experiences') ?>">Experiences</a></li>
    <li><a href="<?= SITE_URL ?>/gallery" class="<?= is_active('/gallery') ?>">Gallery</a></li>
    <li><a href="<?= SITE_URL ?>/offers" class="<?= is_active('/offers') ?>">Offers</a></li>
    <li><a href="<?= SITE_URL ?>/blog" class="<?= is_active('/blog') ?>">Blog</a></li>
    <li><a href="<?= SITE_URL ?>/about" class="<?= is_active('/about') ?>">About Us</a></li>
    <li><a href="<?= SITE_URL ?>/contact" class="<?= is_active('/contact') ?>">Contact</a></li>
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
