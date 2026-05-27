<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class GalleryImage
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::get();
    }

    public function getAll(int $limit = 100): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM gallery_images ORDER BY sort_order ASC, created_at DESC LIMIT :limit"
        );
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO gallery_images (title, image_path, sort_order)
             VALUES (:title, :image_path, :sort_order)"
        );

        return $stmt->execute([
            ':title'      => $data['title'] ?? '',
            ':image_path' => $data['image_path'] ?? '',
            ':sort_order' => (int)($data['sort_order'] ?? 0),
        ]);
    }
}
