<?php
namespace App\Controllers;

use App\Core\Controller;

class ContactController extends Controller
{
    public function index(array $params = []): void
    {
        $this->render('contact/index', [
            'pageTitle'  => 'Contact Us — ' . SITE_NAME,
            'metaDesc'   => 'Get in touch with Traveljo Ceylon Tours to plan your perfect Sri Lanka holiday. We reply within 24 hours.',
            'isHeroPage' => false,
            'extraCss'   => ['contact.css'],
            'csrf_token' => $this->csrfToken(),
        ]);
    }
}
