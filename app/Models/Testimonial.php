<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Testimonial
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::get();
    }

    public function getApproved(int $limit = 10): array
    {
        $stmt = $this->db->prepare(
            "SELECT t.*, tr.title as tour_title FROM testimonials t
             LEFT JOIN tours tr ON t.tour_id = tr.id
             WHERE t.approved = 1
             ORDER BY t.created_at DESC LIMIT :limit"
        );
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
