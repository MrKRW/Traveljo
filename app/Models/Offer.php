<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Offer
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::get();
    }

    public function getActive(int $limit = 3): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM offers
             WHERE status = 'active' AND (valid_until IS NULL OR valid_until >= CURDATE())
             ORDER BY created_at DESC LIMIT :limit"
        );
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query(
            "SELECT * FROM offers ORDER BY status ASC, valid_until ASC"
        );
        return $stmt->fetchAll();
    }

    public function getBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM offers WHERE slug = :slug");
        $stmt->execute([':slug' => $slug]);
        return $stmt->fetch() ?: null;
    }
}
