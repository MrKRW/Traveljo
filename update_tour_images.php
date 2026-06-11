<?php
require_once __DIR__ . '/includes/config.php';

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $updates = [
        'kandy-city-tour' => 'assets/images/hero/amazing-banner.jpg',
        'nuwara-eliya' => 'assets/images/happy-tourists.jpg',
        'ella' => 'assets/images/hero/tea-train.jpg' // ensuring Ella gets tea-train
    ];

    $stmt = $pdo->prepare("UPDATE tours SET cover_image = ? WHERE slug = ?");
    
    foreach ($updates as $slug => $img) {
        $stmt->execute([$img, $slug]);
    }
    
    echo "Successfully updated tour images to be unique!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
