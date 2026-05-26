<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function submit(array $params = []): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->json(['success' => false, 'message' => 'Method not allowed'], 405);
        }

        // CSRF check
        if (!$this->verifyCsrf()) {
            $this->json(['success' => false, 'message' => 'Invalid request. Please refresh and try again.'], 403);
        }

        // Rate limiting (simple IP-based, 5 per hour)
        $ipKey = 'enquiry_' . md5($_SERVER['REMOTE_ADDR'] ?? '');
        if (isset($_SESSION[$ipKey]) && $_SESSION[$ipKey] >= 5) {
            $this->json(['success' => false, 'message' => 'Too many enquiries. Please try again later.'], 429);
        }

        // Sanitize & validate
        $name    = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
        $email   = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
        $phone   = htmlspecialchars(trim($_POST['phone'] ?? ''), ENT_QUOTES, 'UTF-8');
        $country = htmlspecialchars(trim($_POST['country'] ?? ''), ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars(trim($_POST['message'] ?? ''), ENT_QUOTES, 'UTF-8');
        $tourId  = intval($_POST['tour_id'] ?? 0);

        if (!$name || !$email) {
            $this->json(['success' => false, 'message' => 'Please fill in your name and a valid email address.'], 422);
        }

        $model = new Enquiry();
        $saved = $model->create([
            'name'         => $name,
            'email'        => $email,
            'phone'        => $phone,
            'country'      => $country,
            'tour_id'      => $tourId ?: null,
            'travel_date'  => $_POST['travel_date'] ?? null,
            'num_adults'   => intval($_POST['num_adults'] ?? 2),
            'num_children' => intval($_POST['num_children'] ?? 0),
            'message'      => $message,
        ]);

        if ($saved) {
            // Increment rate-limit counter
            $_SESSION[$ipKey] = ($_SESSION[$ipKey] ?? 0) + 1;

            $this->json([
                'success' => true,
                'message' => 'Thank you, ' . $name . '! We\'ll contact you within 24 hours.',
            ]);
        } else {
            $this->json(['success' => false, 'message' => 'Something went wrong. Please try again.'], 500);
        }
    }

    public function newsletter(array $params = []): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->json(['success' => false, 'message' => 'Method not allowed'], 405);
        }

        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);

        if (!$email) {
            $this->json(['success' => false, 'message' => 'Please enter a valid email address.'], 422);
        }

        $model = new Enquiry();
        $model->addNewsletterSubscriber($email);

        $this->json([
            'success' => true,
            'message' => 'Thank you for subscribing! Welcome to the Traveljo community.',
        ]);
    }
}
