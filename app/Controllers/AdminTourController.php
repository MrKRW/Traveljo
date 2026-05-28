<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Tour;

class AdminTourController extends Controller
{
    public function index(array $params = []): void
    {
        $tourModel = new Tour();

        $this->render('admin/tours/index', [
            'pageTitle'  => 'Admin Tours — ' . SITE_NAME,
            'metaDesc'   => 'Manage tour packages for Traveljo Ceylon Tours.',
            'isHeroPage' => false,
            'extraCss'   => ['admin-tours.css'],
            'tours'      => $tourModel->getAllForAdmin(300),
            'flash'      => $_SESSION['admin_tour_flash'] ?? null,
        ]);

        unset($_SESSION['admin_tour_flash']);
    }

    public function store(array $params = []): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/tours');
        }

        if (!$this->verifyCsrf()) {
            $_SESSION['admin_tour_flash'] = ['type' => 'error', 'message' => 'Invalid request. Please try again.'];
            $this->redirect('/admin/tours');
        }

        $title = trim((string)($_POST['title'] ?? ''));
        $category = trim((string)($_POST['category'] ?? ''));
        $durationDays = (int)($_POST['duration_days'] ?? 0);
        $priceUsd = trim((string)($_POST['price_usd'] ?? ''));
        $tagline = trim((string)($_POST['tagline'] ?? ''));
        $description = trim((string)($_POST['description'] ?? ''));
        $highlights = trim((string)($_POST['highlights'] ?? ''));
        $coverImage = trim((string)($_POST['cover_image'] ?? ''));
        $featured = (int)($_POST['featured'] ?? 0) === 1 ? 1 : 0;
        $status = trim((string)($_POST['status'] ?? 'draft'));

        $allowedCategories = ['authentic', 'adventure', 'luxury', 'wildlife', 'romantic', 'group', 'wellness'];
        $allowedStatuses = ['published', 'draft'];

        if ($title === '' || !in_array($category, $allowedCategories, true) || $durationDays < 1) {
            $_SESSION['admin_tour_flash'] = ['type' => 'error', 'message' => 'Please fill required fields with valid values.'];
            $this->redirect('/admin/tours');
        }

        if (!in_array($status, $allowedStatuses, true)) {
            $status = 'draft';
        }

        $slug = slugify($title);
        if ($slug === '') {
            $_SESSION['admin_tour_flash'] = ['type' => 'error', 'message' => 'Please provide a valid tour title.'];
            $this->redirect('/admin/tours');
        }

        $tourModel = new Tour();
        $baseSlug = $slug;
        $counter = 1;
        while ($tourModel->slugExists($slug)) {
            $counter++;
            $slug = $baseSlug . '-' . $counter;
        }

        $normalizedPrice = null;
        if ($priceUsd !== '') {
            $normalizedPrice = is_numeric($priceUsd) ? (float)$priceUsd : null;
        }

        $saved = $tourModel->create([
            'title'         => $title,
            'slug'          => $slug,
            'category'      => $category,
            'duration_days' => $durationDays,
            'price_usd'     => $normalizedPrice,
            'tagline'       => $tagline ?: null,
            'description'   => $description ?: null,
            'highlights'    => $highlights ?: null,
            'cover_image'   => $coverImage ?: 'assets/images/hero/sigiriya.jpg',
            'featured'      => $featured,
            'status'        => $status,
        ]);

        $_SESSION['admin_tour_flash'] = $saved
            ? ['type' => 'success', 'message' => 'Tour added successfully.']
            : ['type' => 'error', 'message' => 'Failed to save the tour. Please try again.'];

        $this->redirect('/admin/tours');
    }
}
