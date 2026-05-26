<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 — Page Not Found | <?= defined('SITE_NAME') ? SITE_NAME : 'Traveljo Ceylon Tours' ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --gold: #C9A84C;
      --dark: #1A1A2E;
      --font-display: 'Playfair Display', Georgia, serif;
      --font-body: 'Source Sans 3', sans-serif;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: var(--font-body);
      background: var(--dark);
      color: #fff;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 2rem;
    }
    .error-wrap { max-width: 560px; }
    .error-num {
      font-family: var(--font-display);
      font-size: clamp(5rem, 20vw, 10rem);
      font-weight: 900;
      color: var(--gold);
      line-height: 1;
      margin-bottom: 1rem;
    }
    .error-title {
      font-family: var(--font-display);
      font-size: 2rem;
      margin-bottom: 1rem;
    }
    .error-desc {
      color: rgba(255,255,255,0.65);
      margin-bottom: 2rem;
      line-height: 1.7;
    }
    .btn {
      display: inline-block;
      padding: 0.85rem 2rem;
      border-radius: 8px;
      font-weight: 600;
      background: var(--gold);
      color: #fff;
      text-decoration: none;
      transition: background 0.2s;
    }
    .btn:hover { background: #a8873b; }
  </style>
</head>
<body>
  <div class="error-wrap">
    <div class="error-num">404</div>
    <h1 class="error-title">Page Not Found</h1>
    <p class="error-desc">
      The page you're looking for seems to have gone on its own adventure.<br>
      Let us guide you back to paradise.
    </p>
    <a href="<?= defined('SITE_URL') ? SITE_URL : '/' ?>" class="btn">
      ← Back to Home
    </a>
  </div>
</body>
</html>
