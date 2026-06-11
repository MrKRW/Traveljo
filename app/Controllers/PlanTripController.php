<?php

namespace App\Controllers;

class PlanTripController
{
    public function index()
    {
        $pageTitle = "Plan Your Trip";
        $metaDesc = "Plan your custom trip to Sri Lanka with Traveljo Ceylon Tours.";

        require_once __DIR__ . '/../../views/layouts/header.php';
        require_once __DIR__ . '/../../views/plan-trip/index.php';
        require_once __DIR__ . '/../../views/layouts/footer.php';
    }
}
