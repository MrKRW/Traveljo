<?php
/**
 * SERVICES PAGE — views/services/index.php
 */
$extraCss = ['services.css'];
?>

<!-- Hero Section for the specific service -->
<section class="service-hero" style="background-image: url('<?= SITE_URL ?>/<?= e($service['image']) ?>');">
    <div class="service-hero-overlay"></div>
    <div class="container service-hero-content">
        <h1 class="service-title"><?= e($service['title']) ?></h1>
    </div>
</section>

<!-- Content Section -->
<section class="service-details-section">
    <div class="container">
        <div class="service-layout">
            
            <!-- Left: Description & Features -->
            <div class="service-info">
                <h2>Overview</h2>
                <p class="service-desc"><?= nl2br(e($service['description'])) ?></p>
                
                <h3 class="mt-4">What's Included</h3>
                <ul class="service-features-list">
                    <?php foreach ($service['features'] as $feature): ?>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20" class="check-icon">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <?= e($feature) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Right: Booking Form (Sticky) -->
            <div class="service-booking-sidebar">
                <div class="booking-card">
                    <h3>Book This Service</h3>
                    <p>Fill out the form below to request a quote or reserve your vehicle.</p>
                    
                    <form action="<?= SITE_URL ?>/services/book" method="POST" class="booking-form">
                        <input type="hidden" name="service" value="<?= e($service['title']) ?>">
                        <input type="hidden" name="service_type" value="<?= e($_GET['type'] ?? 'general') ?>">
                        
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required class="form-control" placeholder="John Doe">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required class="form-control" placeholder="john@example.com">
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">WhatsApp / Contact No *</label>
                            <input type="tel" id="phone" name="phone" required class="form-control" placeholder="+1 234 567 8900">
                        </div>

                        <div class="form-row">
                            <div class="form-group half">
                                <label for="date">Pickup Date *</label>
                                <input type="date" id="date" name="date" required class="form-control">
                            </div>
                            <div class="form-group half">
                                <label for="passengers">Passengers *</label>
                                <input type="number" id="passengers" name="passengers" min="1" required class="form-control" placeholder="1">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="details">Special Requirements (Optional)</label>
                            <textarea id="details" name="details" rows="4" class="form-control" placeholder="Flight number, hotel name, luggage details, etc."></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">Submit Booking Request</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
