<?php

namespace App\Controllers;

class ServiceController {
    public function index() {
        $type = $_GET['type'] ?? 'general';

        $serviceData = [
            'airport' => [
                'title' => 'Airport Transfers',
                'description' => 'Start your Sri Lankan journey stress-free. Our professional chauffeurs will meet you at Bandaranaike International Airport (BIA) holding a name sign. We monitor flight times so we\'re always there when you land. Enjoy a smooth, air-conditioned ride directly to your hotel anywhere on the island.',
                'features' => ['Meet & Greet Service', 'Free Wait Time (1 Hour)', 'Flight Tracking', 'Luggage Assistance'],
                'image' => 'assets/images/luxury-van.jpg'
            ],
            'multiday' => [
                'title' => 'Multi-Day Private Driver',
                'description' => 'The ultimate way to explore Sri Lanka. Hire one of our experienced, fluent English-speaking chauffeurs for your entire trip. Go wherever you want, whenever you want. Your driver acts as a local guide, ensuring you discover hidden gems while traveling in complete comfort.',
                'features' => ['Flexible Itinerary', 'Local Expert Driver', 'Fuel & Driver Accommodation Included', 'Unlimited Stops'],
                'image' => 'assets/images/hero/sigiriya.jpg'
            ],
            'daytrip' => [
                'title' => 'Day Trips & Excursions',
                'description' => 'Base yourself in Colombo, Kandy, or the Coast, and take comfortable day trips to nearby attractions. Whether it\'s a quick trip to Sigiriya, a day in Galle Fort, or an afternoon safari, our drivers will get you there and back safely.',
                'features' => ['10-12 Hour Service', 'Door-to-door Pickup', 'Comfortable Ride', 'Customizable Stops'],
                'image' => 'assets/images/hero/tea-train.jpg'
            ],
            'corporate' => [
                'title' => 'Corporate Travel',
                'description' => 'Reliable, discreet, and premium transportation for business travelers. We provide Wi-Fi enabled vehicles, punctual service, and professional chauffeurs who understand the demands of corporate schedules.',
                'features' => ['Wi-Fi Enabled Vehicles', 'Priority Booking', 'Discreet Service', 'Monthly Invoicing Options'],
                'image' => 'assets/images/nissan-vanette.jpg'
            ],
            'general' => [
                'title' => 'Our Vehicle Services',
                'description' => 'We offer a range of premium vehicle and chauffeur services across Sri Lanka. Select a specific service from our menu to learn more and book.',
                'features' => ['Professional Chauffeurs', 'Modern Fleet', '24/7 Support', 'Fully Insured'],
                'image' => 'assets/images/happy-tourists.jpg'
            ]
        ];

        $service = $serviceData[$type] ?? $serviceData['general'];

        // Define extra CSS for the header
        $extraCss = ['services.css'];

        // Load View
        require_once __DIR__ . '/../../views/layouts/header.php';
        require_once __DIR__ . '/../../views/services/index.php';
        require_once __DIR__ . '/../../views/layouts/footer.php';
    }

    public function book() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name'] ?? '');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $service = htmlspecialchars($_POST['service'] ?? '');
            
            // In a real application, you would save this to the database or send an email.
            // For now, we simulate a success response.
            
            $_SESSION['toast'] = "Thank you, $name! Your booking request for $service has been received. Our team will contact you shortly.";
            
            header('Location: ' . SITE_URL . '/services?type=' . urlencode($_POST['service_type'] ?? 'general'));
            exit;
        }
    }
    
    public function fleet() {
        // Load View
        require_once __DIR__ . '/../../views/layouts/header.php';
        require_once __DIR__ . '/../../views/fleet/index.php';
        require_once __DIR__ . '/../../views/layouts/footer.php';
    }
}
