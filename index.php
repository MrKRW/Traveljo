<?php
/**
 * TRAVELJO CEYLON TOURS
 * Front Controller — all requests route through here
 */

// Autoload & bootstrap
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

// PSR-4 style autoloader for App\ namespace
spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/app/';

    if (strncmp($prefix, $class, strlen($prefix)) !== 0) return;

    $relativeClass = substr($class, strlen($prefix));
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use App\Core\Router;

$router = new Router();

// ── PUBLIC ROUTES ──────────────────────────────────────────
$router->get('/',                          'HomeController@index');
$router->get('/about',                     'HomeController@about');
$router->get('/destinations',              'DestinationController@index');
$router->get('/destination/:slug',         'DestinationController@single');
$router->get('/tours',                     'TourController@index');
$router->get('/tour/:slug',                'TourController@single');
$router->get('/experiences',               'ExperienceController@index');
$router->get('/gallery',                   'GalleryController@index');
$router->get('/blog',                      'BlogController@index');
$router->get('/blog/:slug',                'BlogController@single');
$router->get('/offers',                    'OfferController@index');
$router->get('/offer/:slug',               'OfferController@single');
$router->get('/plan-your-trip',            'PlanTripController@index');
$router->get('/contact',                   'ContactController@index');
$router->get('/faq',                       'FaqController@index');

// ── POST ROUTES ────────────────────────────────────────────
$router->post('/enquiry/submit',           'EnquiryController@submit');
$router->post('/newsletter/subscribe',     'EnquiryController@newsletter');

// ── DISPATCH ───────────────────────────────────────────────
$uri    = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$router->dispatch($uri, $method);
