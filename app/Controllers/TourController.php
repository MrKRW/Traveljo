<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Tour;

class TourController extends Controller
{
    public function index(array $params = []): void
    {
        $tourModel = new Tour();

        $category = trim((string)($_GET['category'] ?? ''));
        $allowedCategories = ['authentic', 'adventure', 'luxury', 'wildlife', 'romantic', 'group', 'wellness'];
        if ($category !== '' && !in_array($category, $allowedCategories, true)) {
            $category = '';
        }

        $page = max(1, (int)($_GET['page'] ?? 1));
        $perPage = ITEMS_PER_PAGE;
        $total = $tourModel->countAll($category);
        $pagination = paginate($total, $perPage, $page);

        $this->render('tours/index', [
            'pageTitle'   => 'Tours — ' . SITE_NAME,
            'metaDesc'    => 'Explore curated Sri Lanka tours by Traveljo Ceylon Tours.',
            'isHeroPage'  => false,
            'extraCss'    => ['tours.css'],
            'category'    => $category,
            'tours'       => $tourModel->getAll($category, $perPage, (int)$pagination['offset']),
            'totalTours'  => $total,
            'pagination'  => $pagination,
        ]);
    }

    public function single(array $params = []): void
    {
        $slug = $params['slug'] ?? '';
        $tourModel = new Tour();
        $tour = $tourModel->getBySlug($slug);

        if (!$tour) {
            http_response_code(404);
            include ROOT_PATH . '/views/errors/404.php';
            return;
        }

        $this->render('tours/single', [
            'pageTitle'  => $tour['title'] . ' — ' . SITE_NAME,
            'metaDesc'   => $tour['tagline'] ?: excerpt($tour['description'] ?? '', 24),
            'isHeroPage' => false,
            'extraCss'   => ['tours.css'],
            'tour'       => $tour,
            'related'    => $tourModel->getRelated((int)$tour['id'], (string)$tour['category'], 3),
        ]);
    }
}
