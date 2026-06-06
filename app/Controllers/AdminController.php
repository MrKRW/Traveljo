<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Tour;
use App\Models\GalleryImage;

class AdminController extends Controller
{
    public function index(array $params = []): void
    {
        $tourModel = new Tour();
        $galleryModel = new GalleryImage();

        $this->render('admin/index', [
            'pageTitle'  => 'Admin Panel — ' . SITE_NAME,
            'isAdmin'    => true,
            'metaDesc'   => 'Manage tours and gallery for Traveljo Ceylon Tours.',
            'isHeroPage' => false,
            // Include both CSS files to retain their specific styling, or a combined one if we had it.
            'extraCss'   => ['admin-tours.css', 'admin-gallery.css'],
            'tours'      => $tourModel->getAllForAdmin(300),
            'images'     => $galleryModel->getAll(200),
            'csrf_token' => $this->csrfToken(),
            'tour_flash' => $_SESSION['admin_tour_flash'] ?? null,
            'gallery_flash' => $_SESSION['admin_gallery_flash'] ?? null,
        ]);

        unset($_SESSION['admin_tour_flash']);
        unset($_SESSION['admin_gallery_flash']);
    }

    public function storeTour(array $params = []): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin');
        }

        if (!$this->verifyCsrf()) {
            $_SESSION['admin_tour_flash'] = ['type' => 'error', 'message' => 'Invalid request. Please try again.'];
            $this->redirect('/admin');
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
            $this->redirect('/admin');
        }

        if (!in_array($status, $allowedStatuses, true)) {
            $status = 'draft';
        }

        $slug = slugify($title);
        if ($slug === '') {
            $_SESSION['admin_tour_flash'] = ['type' => 'error', 'message' => 'Please provide a valid tour title.'];
            $this->redirect('/admin');
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

        $this->redirect('/admin');
    }

    public function storeGallery(array $params = []): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin');
        }

        if (!$this->verifyCsrf()) {
            $_SESSION['admin_gallery_flash'] = ['type' => 'error', 'message' => 'Invalid request. Please try again.'];
            $this->redirect('/admin');
        }

        $title = trim($_POST['title'] ?? '');
        $sortOrder = (int)($_POST['sort_order'] ?? 0);
        $file = $_FILES['image'] ?? null;

        if (!$file || ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            $_SESSION['admin_gallery_flash'] = ['type' => 'error', 'message' => 'Please upload an image file.'];
            $this->redirect('/admin');
        }

        $allowedMime = ['image/jpeg', 'image/png', 'image/webp'];
        $mimeType = mime_content_type($file['tmp_name']) ?: '';
        if (!in_array($mimeType, $allowedMime, true)) {
            $_SESSION['admin_gallery_flash'] = ['type' => 'error', 'message' => 'Only JPG, PNG, and WEBP images are allowed.'];
            $this->redirect('/admin');
        }

        $maxSize = 5 * 1024 * 1024;
        if (($file['size'] ?? 0) > $maxSize) {
            $_SESSION['admin_gallery_flash'] = ['type' => 'error', 'message' => 'Image must be smaller than 5MB.'];
            $this->redirect('/admin');
        }

        $extMap = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
        $extension = $extMap[$mimeType] ?? 'jpg';

        $uploadDir = ROOT_PATH . '/uploads/gallery';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        $filename = date('YmdHis') . '-' . bin2hex(random_bytes(6)) . '.' . $extension;
        $targetPath = $uploadDir . '/' . $filename;
        $relativePath = 'uploads/gallery/' . $filename;

        if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
            $_SESSION['admin_gallery_flash'] = ['type' => 'error', 'message' => 'Failed to save image. Please try again.'];
            $this->redirect('/admin');
        }

        $galleryModel = new GalleryImage();
        $saved = $galleryModel->create([
            'title'      => $title,
            'image_path' => $relativePath,
            'sort_order' => $sortOrder,
        ]);

        if (!$saved) {
            if (file_exists($targetPath)) {
                @unlink($targetPath);
            }
            $_SESSION['admin_gallery_flash'] = ['type' => 'error', 'message' => 'Failed to save image details in database.'];
            $this->redirect('/admin');
        }

        $_SESSION['admin_gallery_flash'] = ['type' => 'success', 'message' => 'Gallery image uploaded successfully.'];
        $this->redirect('/admin');
    }
}
