-- ============================================================
-- TRAVELJO CEYLON TOURS — Database Schema + Seed Data
-- MySQL 8.0+
-- Run: mysql -u root -p < database/schema.sql
-- ============================================================

CREATE DATABASE IF NOT EXISTS traveljo_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE traveljo_db;

-- ============================================================
-- TABLES
-- ============================================================

DROP TABLE IF EXISTS testimonials;
DROP TABLE IF EXISTS enquiries;
DROP TABLE IF EXISTS gallery_images;
DROP TABLE IF EXISTS blog_posts;
DROP TABLE IF EXISTS offers;
DROP TABLE IF EXISTS tours;
DROP TABLE IF EXISTS destinations;
DROP TABLE IF EXISTS newsletter_subscribers;
DROP TABLE IF EXISTS admin_users;

-- Tours
CREATE TABLE tours (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  title         VARCHAR(200) NOT NULL,
  slug          VARCHAR(200) UNIQUE NOT NULL,
  category      ENUM('authentic','adventure','luxury','wildlife','romantic','group','wellness') NOT NULL,
  duration_days INT NOT NULL,
  price_usd     DECIMAL(10,2),
  tagline       VARCHAR(300),
  description   TEXT,
  highlights    TEXT,
  itinerary     JSON,
  cover_image   VARCHAR(255),
  featured      TINYINT(1) DEFAULT 0,
  status        ENUM('published','draft') DEFAULT 'draft',
  created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Destinations
CREATE TABLE destinations (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  name         VARCHAR(100) NOT NULL,
  slug         VARCHAR(100) UNIQUE NOT NULL,
  region       VARCHAR(100),
  description  TEXT,
  highlights   TEXT,
  cover_image  VARCHAR(255),
  lat          DECIMAL(10,7),
  lng          DECIMAL(10,7),
  featured     TINYINT(1) DEFAULT 0,
  status       ENUM('published','draft') DEFAULT 'published',
  created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Enquiries
CREATE TABLE enquiries (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  name         VARCHAR(100) NOT NULL,
  email        VARCHAR(150) NOT NULL,
  phone        VARCHAR(30),
  country      VARCHAR(80),
  tour_id      INT,
  offer_id     INT,
  travel_date  DATE,
  num_adults   INT DEFAULT 2,
  num_children INT DEFAULT 0,
  message      TEXT,
  status       ENUM('new','contacted','confirmed','closed') DEFAULT 'new',
  created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (tour_id) REFERENCES tours(id) ON DELETE SET NULL
);

-- Blog Posts
CREATE TABLE blog_posts (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  title        VARCHAR(255) NOT NULL,
  slug         VARCHAR(255) UNIQUE NOT NULL,
  author       VARCHAR(100) DEFAULT 'Traveljo Team',
  cover_image  VARCHAR(255),
  excerpt      TEXT,
  body         LONGTEXT,
  tags         VARCHAR(255),
  status       ENUM('published','draft') DEFAULT 'draft',
  published_at DATETIME,
  created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Gallery Images
CREATE TABLE gallery_images (
  id             INT AUTO_INCREMENT PRIMARY KEY,
  title          VARCHAR(150),
  image_path     VARCHAR(255) NOT NULL,
  destination_id INT,
  tour_id        INT,
  sort_order     INT DEFAULT 0,
  created_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Offers
CREATE TABLE offers (
  id             INT AUTO_INCREMENT PRIMARY KEY,
  title          VARCHAR(200) NOT NULL,
  slug           VARCHAR(200) UNIQUE NOT NULL,
  discount_text  VARCHAR(100),
  starting_from  DECIMAL(10,2),
  currency       CHAR(3) DEFAULT 'USD',
  description    TEXT,
  cover_image    VARCHAR(255),
  valid_until    DATE,
  status         ENUM('active','expired') DEFAULT 'active',
  created_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Testimonials
CREATE TABLE testimonials (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  guest_name  VARCHAR(100),
  country     VARCHAR(80),
  message     TEXT,
  rating      TINYINT DEFAULT 5,
  tour_id     INT,
  approved    TINYINT(1) DEFAULT 0,
  created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Newsletter Subscribers
CREATE TABLE newsletter_subscribers (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  email         VARCHAR(150) UNIQUE NOT NULL,
  subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin Users
CREATE TABLE admin_users (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  username      VARCHAR(50) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  email         VARCHAR(150),
  role          ENUM('superadmin','editor') DEFAULT 'editor',
  created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================================
-- SEED DATA
-- ============================================================

-- Tours (6 tours, 3 featured)
INSERT INTO tours (title, slug, category, duration_days, price_usd, tagline, description, highlights, cover_image, featured, status) VALUES
(
  'Ancient Wonders of Ceylon',
  'ancient-wonders-of-ceylon',
  'authentic',
  10,
  1850.00,
  'Walk through 2,500 years of history across UNESCO World Heritage Sites',
  'Journey through the Cultural Triangle — Sigiriya, Polonnaruwa, Anuradhapura — and discover the living history of Sri Lanka. From fortress rock to ancient monasteries, every step reveals a civilisation that shaped an island.',
  'Sigiriya Rock Fortress at sunrise|Dambulla Cave Temples|Polonnaruwa Ancient City|Anuradhapura Sacred City|Kandy Temple of the Tooth|Traditional village experience|Spice garden visit',
  'assets/images/hero/sigiriya.jpg',
  1,
  'published'
),
(
  'Southern Coast & Beach Bliss',
  'southern-coast-beach-bliss',
  'romantic',
  8,
  1620.00,
  'Turquoise waters, golden sands, and colonial charm along Sri Lanka\'s south coast',
  'From the Dutch fort city of Galle to the whale-watching capital of Mirissa, this tour traces Sri Lanka\'s most beautiful coastline. Swim in warm waters, watch humpback whales breaching, and sip Ceylon tea watching the sunset.',
  'Galle Fort UNESCO Heritage|Unawatuna Beach|Mirissa Whale Watching|Tangalle Beach|Weligama Surf Lessons|Seafood dining on the beach|Sunset boat cruise',
  'assets/images/hero/beach.jpg',
  1,
  'published'
),
(
  'Wild Ceylon Safari',
  'wild-ceylon-safari',
  'wildlife',
  7,
  2100.00,
  'Track leopards, elephants, and blue whales in one extraordinary island',
  'Sri Lanka boasts one of the highest leopard densities in the world. This safari tour combines Yala\'s big cats with Udawalawe\'s elephant herds and the marine magic of whale-watching off Mirissa.',
  'Yala Leopard Safari|Udawalawe Elephant Safari|Wilpattu Game Drives|Whale Watching Mirissa|Bird watching Sinharaja|Night safari experience|Expert wildlife naturalist guide',
  'assets/images/hero/elephant.jpg',
  1,
  'published'
),
(
  'Hill Country Train Journey',
  'hill-country-train-journey',
  'authentic',
  6,
  1290.00,
  'Ride the world\'s most scenic railway through emerald tea fields',
  'Board the iconic blue train from Kandy to Ella and watch Sri Lanka\'s landscape transform into a mosaic of mist-wrapped tea estates. Walk through organic tea gardens, hike to Ella Rock, and discover the real highland Sri Lanka.',
  'Kandy Temple of Tooth|Blue Train Kandy to Ella|Tea plantation tour|Ella Rock sunrise hike|Nine Arches Bridge|Little Adam\'s Peak|Tea factory visit & tasting',
  'assets/images/hero/tea-train.jpg',
  0,
  'published'
),
(
  'Luxury Barefoot Escape',
  'luxury-barefoot-escape',
  'luxury',
  12,
  4500.00,
  'Handpicked boutique hotels, private guides, and bespoke Sri Lankan luxury',
  'This is Sri Lanka without compromise. Stay in architecturally stunning boutique properties, travel by private air-conditioned vehicle with your personal guide, and enjoy curated experiences from private temple visits to in-villa Ayurvedic treatments.',
  'Private pool villa accommodation|Exclusive Sigiriya sunrise access|Private Chef experiences|Spa & Ayurvedic treatments|Chartered boat safaris|Behind-the-scenes tea estate tour|Personal concierge throughout',
  'assets/images/hero/sigiriya.jpg',
  0,
  'published'
),
(
  'Sri Lanka Wellness Retreat',
  'sri-lanka-wellness-retreat',
  'wellness',
  9,
  2350.00,
  'Ancient Ayurveda meets tropical paradise — restore your mind, body and soul',
  'Rooted in a 3,000-year tradition of Ayurvedic healing, this retreat combines daily wellness treatments with yoga, meditation, and nourishing plant-based Sri Lankan cuisine — set against a backdrop of rainforest and ocean.',
  'Daily Ayurvedic consultations|Yoga & meditation sessions|Herbal medicine garden visits|Meditation at ancient temples|Organic Sri Lankan cuisine|Beach sound healing|Forest bathing in Sinharaja',
  'assets/images/hero/beach.jpg',
  0,
  'published'
);

-- Destinations (8, 6 featured)
INSERT INTO destinations (name, slug, region, description, highlights, cover_image, lat, lng, featured, status) VALUES
(
  'Sigiriya',
  'sigiriya',
  'Cultural Triangle',
  'Rising dramatically from the jungle plains of central Sri Lanka, Sigiriya is a 5th-century rock fortress that is one of the world\'s most extraordinary archaeological monuments. A UNESCO World Heritage Site, it rewards those who climb its 1,200 steps with breathtaking views and ancient frescoes.',
  'UNESCO World Heritage Site|Lion\'s Gate|Ancient frescoes|Mirror Wall|Water gardens|Sunset views',
  'assets/images/hero/sigiriya.jpg',
  7.9570000, 80.7603000,
  1, 'published'
),
(
  'Galle',
  'galle',
  'Southern Province',
  'Galle is a living museum of Dutch colonial architecture. Walk the ramparts of its UNESCO-listed fort, browse boutique galleries, and dine in centuries-old colonial buildings converted to world-class restaurants.',
  'Dutch Fort UNESCO Heritage|Lighthouse|Boutique shopping|Colonial architecture|Nearby beaches|Cricket ground inside the fort',
  'assets/images/hero/beach.jpg',
  6.0535000, 80.2210000,
  1, 'published'
),
(
  'Kandy',
  'kandy',
  'Central Province',
  'Set around a sacred lake and ringed by misty hills, Kandy is Sri Lanka\'s last royal capital and spiritual heart. The Temple of the Sacred Tooth Relic is Buddhism\'s most important shrine on the island, while the city\'s vibrant Esala Perahera festival is one of Asia\'s grandest spectacles.',
  'Temple of the Tooth|Kandy Lake|Royal Botanical Gardens Peradeniya|Esala Perahera Festival|Gem Museum|Arts & Crafts Centre',
  'assets/images/hero/tea-train.jpg',
  7.2906000, 80.6337000,
  1, 'published'
),
(
  'Ella',
  'ella',
  'Uva Province',
  'Perched at 1,000m in Sri Lanka\'s hill country, Ella is a charming village of cozy guesthouses, misty mountain trails, and arguably the island\'s best viewpoints. The famous Nine Arches Bridge and Ella Rock are must-visits for every traveller.',
  'Nine Arches Bridge|Ella Rock hike|Little Adam\'s Peak|Blue train views|Waterfalls|Tea estate walks',
  'assets/images/hero/tea-train.jpg',
  6.8667000, 81.0465000,
  1, 'published'
),
(
  'Mirissa',
  'mirissa',
  'Southern Province',
  'A crescent of golden sand fringed with palm trees, Mirissa is Sri Lanka\'s premier beach destination. It is also the world\'s best place to spot blue whales — the largest animals ever to have lived on Earth.',
  'Blue Whale watching|Pristine beaches|Coconut Tree Hill|Parrot Rock|Surf lessons|Seafood restaurants',
  'assets/images/hero/beach.jpg',
  5.9478000, 80.4544000,
  1, 'published'
),
(
  'Yala',
  'yala',
  'Southern Province',
  'Yala National Park is Sri Lanka\'s most famous wildlife reserve — a vast wilderness of scrub jungle, lagoons, and rocky outcrops. It has the world\'s highest concentration of wild leopards and is home to elephants, sloth bears, crocodiles, and over 200 species of birds.',
  'Leopard sightings|Elephant herds|Sloth bears|Crocodiles|200+ bird species|Block 1 game drives',
  'assets/images/hero/elephant.jpg',
  6.3667000, 81.5167000,
  1, 'published'
),
(
  'Colombo',
  'colombo',
  'Western Province',
  'Sri Lanka\'s vibrant capital is a city of contrasts — colonial buildings stand beside gleaming skyscrapers, while Buddhist temples neighbour colonial-era churches. Colombo\'s Pettah market, luxury Galle Face Hotel, and world-class food scene make it a city worth exploring.',
  'Galle Face Green|Pettah Market|National Museum|Dutch Hospital Shopping|Gangaramaya Temple|Colombo Fort',
  'assets/images/hero/sigiriya.jpg',
  6.9271000, 79.8612000,
  0, 'published'
),
(
  'Anuradhapura',
  'anuradhapura',
  'North Central Province',
  'Sri Lanka\'s first ancient capital and a UNESCO World Heritage Site, Anuradhapura is home to monumental stupas, sacred Bodhi trees, and sprawling palace ruins spanning 2,500 years of history. The sacred Sri Maha Bodhi tree is a cutting from the original Bodhi tree under which the Buddha attained enlightenment.',
  'Sri Maha Bodhi tree|Ruwanwelisaya Stupa|Jetavanaramaya|Mihintale|Moonstone carvings|Bicycle tours',
  'assets/images/hero/sigiriya.jpg',
  8.3114000, 80.4037000,
  0, 'published'
);

-- Offers (3 active)
INSERT INTO offers (title, slug, discount_text, starting_from, currency, description, cover_image, valid_until, status) VALUES
(
  'Early Bird 2025 — 20% Off',
  'early-bird-2025',
  '20% OFF',
  1480.00,
  'USD',
  'Book any tour departing between January and April 2025 and receive 20% off the listed price. Includes complimentary airport pick-up, a welcome dinner, and a cultural show in Kandy.',
  'assets/images/hero/sigiriya.jpg',
  '2025-12-31',
  'active'
),
(
  'Honeymoon Special — Romantic Escape',
  'honeymoon-special',
  'FREE Upgrade',
  1620.00,
  'USD',
  'Celebrate your love in paradise. Book our Southern Coast & Beach Bliss tour and receive a complimentary room upgrade to a beachfront villa, a sunset dhow cruise, and a couples\' spa session.',
  'assets/images/hero/beach.jpg',
  '2025-12-31',
  'active'
),
(
  'Wildlife Duo Package — Save $300',
  'wildlife-duo-package',
  'SAVE $300',
  1800.00,
  'USD',
  'Two travellers, one unforgettable safari adventure. Combine our Wild Ceylon Safari with the Hill Country Train Journey for a complete Sri Lanka experience at a special duo rate.',
  'assets/images/hero/elephant.jpg',
  '2025-10-31',
  'active'
);

-- Testimonials (5 approved)
INSERT INTO testimonials (guest_name, country, message, rating, tour_id, approved) VALUES
(
  'James & Sarah Mitchell',
  'United Kingdom',
  'Traveljo turned our dream Sri Lanka honeymoon into reality. Every detail was perfectly arranged — from the sunrise jeep at Sigiriya to the private candlelit dinner on Mirissa beach. Our guide Nuwan was exceptional, knowledgeable, and genuinely warm. We are already planning to come back!',
  5, 1, 1
),
(
  'Dr. Marcus Weber',
  'Germany',
  'As a wildlife photographer, I have been on safaris across Africa and Asia. The leopard sightings at Yala were beyond anything I had experienced. Traveljo\'s naturalist guides knew exactly where to position us for the perfect shot. Professional, punctual, and passionate.',
  5, 3, 1
),
(
  'Priya & Arun Sharma',
  'India',
  'We were a group of 12 family members spanning three generations, and Traveljo managed everything flawlessly. The temples, the train journey, the food — every experience was curated with care. The kids loved the elephant orphanage, the grandparents loved the cultural shows. Outstanding!',
  5, NULL, 1
),
(
  'Charlotte Beaumont',
  'Australia',
  'I travelled solo for the first time and chose Traveljo on a recommendation. Best decision I ever made. I felt completely safe, met other travellers on the group tour, and saw parts of Sri Lanka most tourists never discover. The Wellness Retreat was genuinely transformative.',
  5, 6, 1
),
(
  'Robert & Linda Chen',
  'Canada',
  'We have travelled extensively and rarely write reviews, but Traveljo deserves one. The Luxury Barefoot Escape was worth every penny — private pool villas, a personal concierge who anticipated our every need, and experiences money normally cannot buy. A masterclass in luxury travel.',
  5, 5, 1
);

-- Blog Posts (3 published)
INSERT INTO blog_posts (title, slug, author, cover_image, excerpt, body, tags, status, published_at) VALUES
(
  'The Ultimate Guide to Visiting Sigiriya — Tips, Timings & Secrets',
  'ultimate-guide-sigiriya',
  'Chamara Perera',
  'assets/images/hero/sigiriya.jpg',
  'Sri Lanka\'s iconic Lion Rock fortress is one of Asia\'s most extraordinary monuments. Here is everything you need to know to make the most of your visit — including the tips the guidebooks miss.',
  '<p>Rising 200 metres above the surrounding jungle, Sigiriya is arguably Sri Lanka\'s most impressive sight...</p><h2>Best Time to Visit</h2><p>Arrive before 7am to beat the crowds and experience the fortress in golden morning light. The royal gardens at the base are particularly beautiful at dawn when mist still clings to the jungle...</p><h2>The Frescoes</h2><p>Halfway up the rock, a sheltered gallery protects 22 remarkable frescoes of celestial maidens — the Sigiriya Damsels — who have captivated visitors for 15 centuries...</p>',
  'sigiriya,cultural-triangle,heritage,tips',
  'published',
  '2025-03-15 09:00:00'
),
(
  'Whale Watching in Mirissa — When to Go and What to Expect',
  'whale-watching-mirissa-guide',
  'Traveljo Team',
  'assets/images/hero/beach.jpg',
  'Mirissa is one of the world\'s top whale-watching destinations, with blue whales and sperm whales seen regularly. Our expert guide tells you everything you need for an unforgettable experience.',
  '<p>Every year between November and April, the warm waters off Sri Lanka\'s southern coast play host to one of nature\'s greatest spectacles...</p><h2>The Blue Whale</h2><p>At up to 30 metres long and 170 tonnes, blue whales are the largest animals ever to have lived on Earth. Seeing one breach close to your boat is an experience that stays with you forever...</p>',
  'whale-watching,mirissa,wildlife,marine',
  'published',
  '2025-04-02 10:00:00'
),
(
  'A Foodie\'s Journey Through Sri Lanka — 10 Dishes You Must Try',
  'sri-lanka-food-guide',
  'Traveljo Team',
  'assets/images/hero/tea-train.jpg',
  'Sri Lankan cuisine is one of Asia\'s most underrated — bold flavours, fresh coconut, fragrant spices, and dishes that vary dramatically by region. Here are 10 dishes every food lover must try.',
  '<p>Sri Lankan food is an adventure in itself. The cuisine is characterised by the generous use of coconut — milk, oil, and flesh — combined with a spice palette that reflects centuries of trade with Arabia, India, and Portugal...</p><h2>1. Rice & Curry</h2><p>The definitive Sri Lankan meal is a mound of steamed rice surrounded by a dozen small bowls of curries — fish, chicken, dhal, jackfruit — each more fragrant than the last...</p>',
  'food,culture,cuisine,travel-tips',
  'published',
  '2025-04-20 11:00:00'
);

-- Admin User (password: Admin@1234)
INSERT INTO admin_users (username, password_hash, email, role) VALUES
(
  'admin',
  '$2y$12$6mSS/v7b.FkJ5Y4XbN9e3.tZMKGhVQxP.lW1mXrI4IB5fKg0TBmVu',
  'admin@traveljoceylontours.com',
  'superadmin'
);
