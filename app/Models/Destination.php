<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Destination
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::get();
    }

    public function getFeatured(int $limit = 6): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM destinations WHERE featured = 1 AND status = 'published' ORDER BY name ASC LIMIT :limit"
        );
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAll(int $limit = 50, int $offset = 0): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM destinations WHERE status = 'published' ORDER BY featured DESC, name ASC LIMIT :limit OFFSET :offset"
        );
        $stmt->bindValue(':limit',  $limit,  PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM destinations WHERE slug = :slug AND status = 'published'"
        );
        $stmt->execute([':slug' => $slug]);
        return $stmt->fetch() ?: null;
    }

    public function getByRegion(string $region): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM destinations WHERE region = :region AND status = 'published' ORDER BY name ASC"
        );
        $stmt->execute([':region' => $region]);
        return $stmt->fetchAll();
    }

    public function countAll(): int
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM destinations WHERE status = 'published'");
        return (int) $stmt->fetchColumn();
    }
}
