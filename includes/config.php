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
define('SITE_EMAIL', 'info@traveljoceylontours.com');
define('SITE_PHONE', '+94 77 212 1115');
define('SITE_PHONE2', '+94 11 234 5678');
define('SITE_ADDRESS', 'No. 45, Galle Road, Colombo 03, Sri Lanka');

// --- Social ---
define('SOCIAL_FB',  'https://facebook.com/traveljoceylon');
define('SOCIAL_IG',  'https://instagram.com/traveljoceylon');
define('SOCIAL_TW',  'https://twitter.com/traveljoceylon');
define('SOCIAL_YT',  'https://youtube.com/@traveljoceylon');
define('SOCIAL_LI',  'https://linkedin.com/company/traveljoceylon');

// --- Paths ---
define('ROOT_PATH',    dirname(__DIR__));
define('UPLOAD_PATH',  ROOT_PATH . '/uploads/');
define('ASSETS_URL',   SITE_URL . '/assets');
define('UPLOADS_URL',  SITE_URL . '/uploads');

// --- App settings ---
define('ITEMS_PER_PAGE', 9);
define('ENQUIRY_EMAIL',  'enquiries@traveljoceylontours.com');

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
