<?php
/**
 * FLEET PAGE — views/fleet/index.php
 */
$extraCss = ['services.css']; // We can reuse the hero styles
?>

<!-- Hero Section -->
<section class="service-hero" style="background-image: url('<?= SITE_URL ?>/assets/images/nissan-vanette.jpg');">
    <div class="service-hero-overlay"></div>
    <div class="container service-hero-content">
        <h1 class="service-title">Our Premium Fleet</h1>
    </div>
</section>

<!-- Content Section -->
<section class="service-details-section">
    <div class="container">
        
        <div style="max-width: 800px; margin: 0 auto; text-align: center; margin-bottom: 4rem;">
            <h2>Travel in Comfort & Style</h2>
            <p class="service-desc" style="margin-bottom: 0;">
                Whether you're traveling solo, as a couple, or with a large group, we have the perfect vehicle to ensure your journey across Sri Lanka is safe, comfortable, and memorable. All our vehicles are fully air-conditioned, regularly serviced, and driven by professional, English-speaking chauffeurs.
            </p>
        </div>

        <!-- Fleet Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem;">
            
            <!-- Car -->
            <div style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <img src="<?= SITE_URL ?>/assets/images/luxury-car.jpg" alt="Luxury Car" style="width: 100%; height: 250px; object-fit: cover;">
                <div style="padding: 2rem;">
                    <h3 style="margin-bottom: 0.5rem; color: var(--dark);">Luxury Sedans</h3>
                    <p style="color: var(--primary); font-weight: 600; margin-bottom: 1.5rem;">Max Passengers: 3 | Luggage: 2 Large</p>
                    <p style="color: var(--gray); line-height: 1.6; margin-bottom: 1.5rem;">
                        Perfect for couples, solo travelers, or corporate clients. Enjoy a smooth, quiet ride with premium leather seating and ample legroom. Ideal for airport transfers or city tours.
                    </p>
                    <a href="<?= SITE_URL ?>/services?type=multiday" class="btn btn-outline" style="width: 100%; text-align: center;">Book a Sedan</a>
                </div>
            </div>

            <!-- Van -->
            <div style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <img src="<?= SITE_URL ?>/assets/images/nissan-vanette.jpg" alt="Nissan Vanette" style="width: 100%; height: 250px; object-fit: cover;">
                <div style="padding: 2rem;">
                    <h3 style="margin-bottom: 0.5rem; color: var(--dark);">Comfort Vans (KDH)</h3>
                    <p style="color: var(--primary); font-weight: 600; margin-bottom: 1.5rem;">Max Passengers: 7 | Luggage: 7 Large</p>
                    <p style="color: var(--gray); line-height: 1.6; margin-bottom: 1.5rem;">
                        The ultimate choice for families and small groups. Our spacious vans offer superior comfort, high visibility windows for sightseeing, and plenty of room for all your luggage.
                    </p>
                    <a href="<?= SITE_URL ?>/services?type=multiday" class="btn btn-outline" style="width: 100%; text-align: center;">Book a Van</a>
                </div>
            </div>

        </div>

    </div>
</section>
