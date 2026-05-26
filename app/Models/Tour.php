<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Tour
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::get();
    }

    public function getFeatured(int $limit = 3): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM tours WHERE featured = 1 AND status = 'published' ORDER BY created_at DESC LIMIT :limit"
        );
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAll(string $category = '', int $limit = 50, int $offset = 0): array
    {
        $where = "status = 'published'";
        $params = [];

        if ($category) {
            $where .= " AND category = :category";
            $params[':category'] = $category;
        }

        $stmt = $this->db->prepare(
            "SELECT * FROM tours WHERE {$where} ORDER BY featured DESC, created_at DESC LIMIT :limit OFFSET :offset"
        );
        foreach ($params as $key => $val) {
            $stmt->bindValue($key, $val);
        }
        $stmt->bindValue(':limit',  $limit,  PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM tours WHERE slug = :slug AND status = 'published'"
        );
        $stmt->execute([':slug' => $slug]);
        return $stmt->fetch() ?: null;
    }

    public function getByCategory(string $category, int $limit = 6): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM tours WHERE category = :category AND status = 'published' ORDER BY featured DESC LIMIT :limit"
        );
        $stmt->bindValue(':category', $category);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function countAll(string $category = ''): int
    {
        $where = "status = 'published'";
        $params = [];
        if ($category) {
            $where .= " AND category = :category";
            $params[':category'] = $category;
        }
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM tours WHERE {$where}");
        $stmt->execute($params);
        return (int) $stmt->fetchColumn();
    }

    public function getRelated(int $tourId, string $category, int $limit = 3): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM tours WHERE id != :id AND category = :category AND status = 'published' LIMIT :limit"
        );
        $stmt->bindValue(':id', $tourId, PDO::PARAM_INT);
        $stmt->bindValue(':category', $category);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
