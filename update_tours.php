<?php
require_once __DIR__ . '/includes/config.php';

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Empty existing tours
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE tours; SET FOREIGN_KEY_CHECKS = 1;");

    $tours = [
        [
            'title' => 'Kandy City Tour',
            'slug' => 'kandy-city-tour',
            'category' => 'authentic',
            'duration_days' => 1,
            'price_usd' => 10000,
            'tagline' => 'Explore the spiritual heart of Sri Lanka',
            'description' => 'Discover the cultural capital of Sri Lanka with our comprehensive Kandy City Tour. Visit sacred temples, lush gardens, and local artisan workshops.',
            'highlights' => 'Kandy Viewpoint|Bahirawa Kanda|Tea Factory|Gem Museum|Botanical Gardens|Wood Carving|Herbal Garden',
            'cover_image' => 'assets/images/hero/tea-train.jpg',
            'featured' => 1
        ],
        [
            'title' => 'Elephant Orphanage & Ambuluwawa Tower',
            'slug' => 'elephant-orphanage-ambuluwawa',
            'category' => 'adventure',
            'duration_days' => 1,
            'price_usd' => 15000,
            'tagline' => 'Gentle giants and sky-high mountain views',
            'description' => 'Splash, feed, and snap selfies with gentle giant elephants! Then climb the spiral tower and touch the sky with 360° mountain views!',
            'highlights' => 'Pinnawala Elephant Orphanage|Ambuluwawa Tower climb|Panoramic mountain views',
            'cover_image' => 'assets/images/hero/elephant.jpg',
            'featured' => 1
        ],
        [
            'title' => 'Sigiriya',
            'slug' => 'sigiriya-lion-rock',
            'category' => 'authentic',
            'duration_days' => 1,
            'price_usd' => 15000,
            'tagline' => 'Conquer Sri Lanka\'s ancient sky palace',
            'description' => 'Climb the Lion Rock and conquer Sri Lanka\'s ancient sky palace! Discover ancient frescoes, mirror walls, and breathtaking views from the top.',
            'highlights' => 'Sigiriya Rock Fortress climb|Ancient water gardens|Lion Gate|Sunset views',
            'cover_image' => 'assets/images/hero/sigiriya.jpg',
            'featured' => 1
        ],
        [
            'title' => 'Nuwara Eliya',
            'slug' => 'nuwara-eliya',
            'category' => 'romantic',
            'duration_days' => 1,
            'price_usd' => 15000,
            'tagline' => 'A day in Little England',
            'description' => 'Breathe in cool mountain air, stroll by lakes, and sip tea in Little England! Experience the colonial charm and rolling tea estates.',
            'highlights' => 'Gregory Lake|Tea estate tour|Waterfalls|Cool mountain climate',
            'cover_image' => 'assets/images/hero/tea-train.jpg',
            'featured' => 1
        ],
        [
            'title' => 'Ella',
            'slug' => 'ella',
            'category' => 'adventure',
            'duration_days' => 1,
            'price_usd' => 25000,
            'tagline' => 'Hike peaks and chase waterfalls',
            'description' => 'Hike peaks, chase waterfalls, and cross the iconic Nine Arches Bridge! Ella is a paradise for nature lovers and adventurers.',
            'highlights' => 'Nine Arches Bridge|Ella Rock hike|Ravana Falls|Lush green landscapes',
            'cover_image' => 'assets/images/hero/tea-train.jpg',
            'featured' => 1
        ],
        [
            'title' => 'Arugambay',
            'slug' => 'arugambay',
            'category' => 'adventure',
            'duration_days' => 2,
            'price_usd' => 35000,
            'tagline' => 'Island surf vibes',
            'description' => 'Ride the waves, chill by the beach, and soak up the island surf vibes! Experience the laid-back atmosphere of Sri Lanka\'s premier surf destination.',
            'highlights' => 'Surfing at Arugam Bay|Beach relaxation|Coastal vibe|Nightlife',
            'cover_image' => 'assets/images/hero/beach.jpg',
            'featured' => 1
        ],
        [
            'title' => 'Airport Transfers',
            'slug' => 'airport-transfers',
            'category' => 'luxury',
            'duration_days' => 1,
            'price_usd' => 25000,
            'tagline' => 'Smooth, safe, and always on time',
            'description' => 'Ride in comfort — smooth, safe, and always on time! Our premium airport transfer service ensures a hassle-free start or end to your journey.',
            'highlights' => 'Premium vehicles|Professional chauffeurs|Punctual service|Luggage assistance',
            'cover_image' => 'assets/images/luxury-van.jpg',
            'featured' => 1
        ]
    ];

    $stmt = $pdo->prepare("INSERT INTO tours (title, slug, category, duration_days, price_usd, tagline, description, highlights, cover_image, featured, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'published')");
    
    foreach ($tours as $t) {
        $stmt->execute([
            $t['title'], $t['slug'], $t['category'], $t['duration_days'], $t['price_usd'], $t['tagline'], $t['description'], $t['highlights'], $t['cover_image'], $t['featured']
        ]);
    }
    
    echo "Successfully updated tours!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
