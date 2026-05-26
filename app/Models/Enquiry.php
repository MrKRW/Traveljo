<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Enquiry
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::get();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO enquiries
             (name, email, phone, country, tour_id, offer_id, travel_date, num_adults, num_children, message)
             VALUES
             (:name, :email, :phone, :country, :tour_id, :offer_id, :travel_date, :num_adults, :num_children, :message)"
        );

        return $stmt->execute([
            ':name'         => $data['name']         ?? '',
            ':email'        => $data['email']         ?? '',
            ':phone'        => $data['phone']         ?? '',
            ':country'      => $data['country']       ?? '',
            ':tour_id'      => !empty($data['tour_id']) ? (int)$data['tour_id'] : null,
            ':offer_id'     => !empty($data['offer_id']) ? (int)$data['offer_id'] : null,
            ':travel_date'  => !empty($data['travel_date']) ? $data['travel_date'] : null,
            ':num_adults'   => (int)($data['num_adults']   ?? 2),
            ':num_children' => (int)($data['num_children'] ?? 0),
            ':message'      => $data['message']       ?? '',
        ]);
    }

    public function addNewsletterSubscriber(string $email): bool
    {
        try {
            $stmt = $this->db->prepare(
                "INSERT IGNORE INTO newsletter_subscribers (email) VALUES (:email)"
            );
            return $stmt->execute([':email' => $email]);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getAll(string $status = '', int $limit = 50, int $offset = 0): array
    {
        $where  = $status ? "WHERE e.status = :status" : "";
        $params = $status ? [':status' => $status] : [];

        $stmt = $this->db->prepare(
            "SELECT e.*, t.title as tour_title
             FROM enquiries e
             LEFT JOIN tours t ON e.tour_id = t.id
             {$where}
             ORDER BY e.created_at DESC LIMIT :limit OFFSET :offset"
        );
        foreach ($params as $k => $v) $stmt->bindValue($k, $v);
        $stmt->bindValue(':limit',  $limit,  PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
