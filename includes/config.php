<?php
// ============================================================
// TRAVELJO CEYLON TOURS — Configuration
// ============================================================

// --- Database ---
define('DB_HOST', 'localhost');
define('DB_NAME', 'traveljo_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// --- Site ---
define('SITE_NAME',  'Traveljo Vehicle Tours');
define('SITE_TAGLINE', 'Your Premium Private Ride in Sri Lanka');
define('SITE_URL',   'http://localhost/Traveljo/Traveljo');
define('SITE_EMAIL', 'traveljoceylon@gmail.com');
define('SITE_PHONE', '+94 77 212 1115');
define('SITE_PHONE2', '+94 11 234 5678');
define('SITE_ADDRESS', '300/1/A, Doluwa road, Hindagala, Mahakanda, Peradeniya.');

// --- Social ---
define('SOCIAL_FB',  'https://www.facebook.com/share/1HEYkAtUTC/');
define('SOCIAL_WA',  'https://wa.me/94772121115'); // Replace with actual number if different

// --- Paths ---
define('ROOT_PATH',    dirname(__DIR__));
define('UPLOAD_PATH',  ROOT_PATH . '/uploads/');
define('ASSETS_URL',   SITE_URL . '/assets');
define('UPLOADS_URL',  SITE_URL . '/uploads');

// --- App settings ---
define('ITEMS_PER_PAGE', 9);
define('ENQUIRY_EMAIL',  'traveljoceylon@gmail.com');

// --- Environment ---
define('APP_ENV', 'development'); // 'development' | 'production'

if (APP_ENV === 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}

// --- Session ---
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
