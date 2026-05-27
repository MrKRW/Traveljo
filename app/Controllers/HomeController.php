<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Tour;
use App\Models\Destination;
use App\Models\BlogPost;
use App\Models\Offer;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index(array $params = []): void
    {
        $tourModel        = new Tour();
        $destModel        = new Destination();
        $blogModel        = new BlogPost();
        $offerModel       = new Offer();
        $testimonialModel = new Testimonial();

        $this->render('home/index', [
            'pageTitle'    => SITE_NAME . ' — Discover the Pearl of the Indian Ocean',
            'metaDesc'     => 'Traveljo Ceylon Tours offers expertly crafted Sri Lanka tour packages — cultural heritage, wildlife safaris, beach escapes, and luxury travel experiences.',
            'isHeroPage'   => true,
            'featured_tours'   => $tourModel->getFeatured(3),
            'destinations'     => $destModel->getFeatured(6),
            'blog_posts'       => $blogModel->getLatest(3),
            'offers'           => $offerModel->getActive(3),
            'testimonials'     => $testimonialModel->getApproved(8),
            'csrf_token'       => $this->csrfToken(),
        ]);
    }

    public function about(array $params = []): void
    {
        $testimonialModel = new Testimonial();

        $this->render('about/index', [
            'pageTitle'    => 'About Us — ' . SITE_NAME,
            'metaDesc'     => 'Learn about Traveljo Ceylon Tours — a family-owned Sri Lanka tour operator with 20+ years of expertise crafting personalised cultural, wildlife, and luxury travel experiences.',
            'isHeroPage'   => false,
            'extraCss'     => ['home.css', 'about.css'],
            'testimonials' => $testimonialModel->getApproved(4),
            'csrf_token'   => $this->csrfToken(),
        ]);
    }
}
