<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\GalleryImage;

class AdminGalleryController extends Controller
{
    public function index(array $params = []): void
    {
        $galleryModel = new GalleryImage();

        $this->render('admin/gallery/index', [
            'pageTitle'  => 'Admin Gallery — ' . SITE_NAME,
            'metaDesc'   => 'Manage gallery images for Traveljo Ceylon Tours.',
            'isHeroPage' => false,
            'extraCss'   => ['admin-gallery.css'],
            'images'     => $galleryModel->getAll(200),
            'csrf_token' => $this->csrfToken(),
            'flash'      => $_SESSION['admin_gallery_flash'] ?? null,
        ]);

        unset($_SESSION['admin_gallery_flash']);
    }

    public function store(array $params = []): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/gallery');
        }

        if (!$this->verifyCsrf()) {
            $_SESSION['admin_gallery_flash'] = ['type' => 'error', 'message' => 'Invalid request. Please try again.'];
            $this->redirect('/admin/gallery');
        }

        $title = trim($_POST['title'] ?? '');
        $sortOrder = (int)($_POST['sort_order'] ?? 0);
        $file = $_FILES['image'] ?? null;

        if (!$file || ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            $_SESSION['admin_gallery_flash'] = ['type' => 'error', 'message' => 'Please upload an image file.'];
            $this->redirect('/admin/gallery');
        }

        $allowedMime = ['image/jpeg', 'image/png', 'image/webp'];
        $mimeType = mime_content_type($file['tmp_name']) ?: '';
        if (!in_array($mimeType, $allowedMime, true)) {
            $_SESSION['admin_gallery_flash'] = ['type' => 'error', 'message' => 'Only JPG, PNG, and WEBP images are allowed.'];
            $this->redirect('/admin/gallery');
        }

        $maxSize = 5 * 1024 * 1024;
        if (($file['size'] ?? 0) > $maxSize) {
            $_SESSION['admin_gallery_flash'] = ['type' => 'error', 'message' => 'Image must be smaller than 5MB.'];
            $this->redirect('/admin/gallery');
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
            $this->redirect('/admin/gallery');
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
            $this->redirect('/admin/gallery');
        }

        $_SESSION['admin_gallery_flash'] = ['type' => 'success', 'message' => 'Gallery image uploaded successfully.'];
        $this->redirect('/admin/gallery');
    }
}
