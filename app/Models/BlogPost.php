<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class BlogPost
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::get();
    }

    public function getLatest(int $n = 3): array
    {
        $stmt = $this->db->prepare(
            "SELECT id, title, slug, author, cover_image, excerpt, tags, published_at
             FROM blog_posts WHERE status = 'published'
             ORDER BY published_at DESC LIMIT :n"
        );
        $stmt->bindValue(':n', $n, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAll(int $limit = 9, int $offset = 0): array
    {
        $stmt = $this->db->prepare(
            "SELECT id, title, slug, author, cover_image, excerpt, tags, published_at
             FROM blog_posts WHERE status = 'published'
             ORDER BY published_at DESC LIMIT :limit OFFSET :offset"
        );
        $stmt->bindValue(':limit',  $limit,  PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM blog_posts WHERE slug = :slug AND status = 'published'"
        );
        $stmt->execute([':slug' => $slug]);
        return $stmt->fetch() ?: null;
    }

    public function countAll(): int
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM blog_posts WHERE status = 'published'");
        return (int) $stmt->fetchColumn();
    }
}
