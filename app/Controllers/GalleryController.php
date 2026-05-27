<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index(array $params = []): void
    {
        $galleryModel = new GalleryImage();

        $this->render('gallery/index', [
            'pageTitle'  => 'Gallery — ' . SITE_NAME,
            'metaDesc'   => 'Explore Sri Lanka through Traveljo Ceylon Tours gallery moments.',
            'isHeroPage' => false,
            'extraCss'   => ['gallery.css'],
            'images'     => $galleryModel->getAll(200),
        ]);
    }
}
