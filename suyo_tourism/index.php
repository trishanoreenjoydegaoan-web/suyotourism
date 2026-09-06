<?php include 'config.php'; ?>
<?php include 'nav.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Suyo — Ilocos Sur's Highland Paradise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f0f7f4;
            color: #1f2937;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #166534 0%, #15803d 40%, #4ade80 100%);
            color: white;
            padding: 90px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section h1 {
            font-size: 3.2rem;
            font-weight: 800;
            letter-spacing: 1px;
            margin-bottom: 15px;
            text-shadow: 2px 4px 12px rgba(0,0,0,0.15);
        }

        .hero-tagline {
            font-size: 1.3rem;
            font-weight: 400;
            max-width: 750px;
            margin: 0 auto;
            opacity: 0.94;
            line-height: 1.6;
        }

        .hero-buttons {
            margin-top: 35px;
        }

        .btn-primary-custom {
            background: white;
            color: #166534;
            font-weight: 700;
            padding: 12px 32px;
            border-radius: 50px;
            border: none;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin: 8px;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            background: #f0fdf4;
            color: #14532d;
        }

        .btn-outline-custom {
            background: transparent;
            color: white;
            font-weight: 600;
            padding: 12px 32px;
            border-radius: 50px;
            border: 2px solid white;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin: 8px;
        }

        .btn-outline-custom:hover {
            background: white;
            color: #166534;
        }

        /* Section Shared Styles */
        .section-title {
            color: #166534;
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 25px;
            text-align: center;
        }

        .divider {
            width: 90px;
            height: 4px;
            background: linear-gradient(90deg, #4ade80, #166534);
            border-radius: 2px;
            margin: 0 auto 35px;
        }

        /* About Suyo Section */
        .about-section {
            padding: 70px 20px;
            background: white;
        }

        .about-text {
            font-size: 1.08rem;
            line-height: 1.85;
            color: #374151;
            max-width: 900px;
            margin: 0 auto;
            text-align: justify;
        }

        .about-text strong {
            color: #15803d;
        }

        /* Highlights Section */
        .highlights-section {
            padding: 60px 20px 70px;
            background: #f0f7f4;
        }

        .highlight-card {
            background: white;
            border-radius: 16px;
            padding: 30px 25px;
            text-align: center;
            box-shadow: 0 6px 18px rgba(22, 101, 52, 0.08);
            transition: all 0.35s ease;
            height: 100%;
        }

        .highlight-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 14px 30px rgba(22, 101, 52, 0.15);
        }

        .highlight-icon {
            font-size: 2.8rem;
            margin-bottom: 15px;
        }

        .highlight-card h4 {
            color: #166534;
            font-weight: 700;
            margin-bottom: 12px;
            font-size: 1.15rem;
        }

        .highlight-card p {
            color: #6b7280;
            font-size: 0.98rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Featured Photos Section */
        .photos-section {
            padding: 70px 20px;
            background: white;
        }

        .photo-card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            transition: all 0.35s ease;
            height: 100%;
            background-color: #e9ecef;
        }

        .photo-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.15);
        }

        .photo-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .photo-card:hover img {
            transform: scale(1.08);
        }

        .photo-caption {
            padding: 16px;
            background: white;
        }

        .photo-caption h5 {
            color: #166534;
            font-weight: 700;
            margin: 0;
            font-size: 1rem;
        }

        /* Plan Your Visit Section */
        .visit-section {
            padding: 70px 20px;
            background: linear-gradient(180deg, #f0f7f4, #dcfce7);
        }

        .visit-card {
            background: white;
            border-radius: 16px;
            padding: 28px 24px;
            box-shadow: 0 6px 18px rgba(22, 101, 52, 0.08);
            height: 100%;
        }

        .visit-card h4 {
            color: #166534;
            font-weight: 700;
            font-size: 1.15rem;
            margin-bottom: 18px;
            padding-bottom: 10px;
            border-bottom: 2px dashed #bbf7d0;
        }

        .visit-card ul {
            margin: 0;
            padding-left: 18px;
        }

        .visit-card li {
            margin-bottom: 10px;
            color: #374151;
            line-height: 1.6;
            font-size: 0.98rem;
        }

        .visit-card strong {
            color: #15803d;
        }

        /* Quick Stats Bar */
        .stats-bar {
            background: linear-gradient(90deg, #14532d, #166534, #15803d);
            color: white;
            padding: 35px 20px;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 2.2rem;
            font-weight: 800;
            margin: 0;
        }

        .stat-item p {
            margin: 6px 0 0;
            opacity: 0.88;
            font-size: 0.95rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.1rem;
            }
            .hero-tagline {
                font-size: 1.05rem;
            }
            .section-title {
                font-size: 1.7rem;
            }
        }
    </style>
</head>
<body>

<!-- HERO BANNER -->
<section class="hero-section">
    <h1>🌿 Welcome to Suyo</h1>
    <p class="hero-tagline">
        Ilocos Sur's Hidden Highland Paradise — where misty mountains, cascading waterfalls, and warm culture await you
    </p>
    <div class="hero-buttons">
        <a href="attractions.php" class="btn-primary-custom">✨ Explore Attractions</a>
        <a href="accommodations.php" class="btn-outline-custom">🏨 Where to Stay</a>
    </div>
</section>

<!-- ABOUT SUYO — MAIN DESCRIPTION -->
<section class="about-section">
    <h2 class="section-title">Discover Suyo, Ilocos Sur</h2>
    <div class="divider"></div>
    <div class="about-text">
        <p>
            Nestled in the majestic highlands of <strong>Ilocos Sur</strong>, the municipality of <strong>Suyo</strong> is a breathtaking mountain paradise waiting to be explored. Located along the scenic route to the historic Bessang Pass, Suyo sits perched among rolling hills, lush pine forests, and rugged peaks — offering cool, fresh mountain air and stunning landscapes that change with the light.
        </p>
        <p>
            Suyo is famous for its <strong>pristine waterfalls</strong> — including the majestic Dawara Falls, the multi-tiered Sangbay ni Ragsak ("Falls of Happiness"), and the hidden beauty of Kaman-itil and Burayok Falls. Rising above the town is <strong>Mount Tapao</strong>, Suyo's crown jewel, where visitors wake up to a sea of clouds and panoramic views stretching all the way to the West Philippine Sea.
        </p>
        <p>
            More than just a destination of natural wonders, Suyo carries a <strong>rich and storied past</strong>. It stands beside the historic <strong>Bessang Pass</strong>, a key battleground of World War II and now a protected Natural Monument. The town's spiritual heart beats at <strong>St. Andrew the Apostle Parish</strong> in Barangay Uso, honoring the town's patron saint and centuries-old faith.
        </p>
        <p>
            Whether you are chasing waterfalls, hiking to a sunrise viewpoint, exploring historic trails, or simply escaping the heat to breathe crisp highland air — <strong>Suyo welcomes you</strong>. Experience the warmth of its people, the richness of its culture, and the untouched beauty of nature. Come visit, and discover why Suyo is truly Ilocos Sur's hidden gem.
        </p>
    </div>
</section>

<!-- HIGHLIGHTS -->
<section class="highlights-section">
    <h2 class="section-title">Why Visit Suyo?</h2>
    <div class="divider"></div>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="highlight-card">
                    <div class="highlight-icon">💧</div>
                    <h4>Majestic Waterfalls</h4>
                    <p>5+ stunning waterfalls — each with its own beauty and charm, from gentle cascades to towering falls.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="highlight-card">
                    <div class="highlight-icon">🏔️</div>
                    <h4>Sea of Clouds</h4>
                    <p>Climb Mount Tapao at sunrise and stand above the clouds with views reaching the ocean.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="highlight-card">
                    <div class="highlight-icon">🌲</div>
                    <h4>Cool Highlands</h4>
                    <p>Escape the heat! Suyo enjoys fresh mountain breeze and cool weather year-round.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="highlight-card">
                    <div class="highlight-icon">🏛️</div>
                    <h4>History & Faith</h4>
                    <p>Walk the historic Bessang Pass and visit St. Andrew Parish — faith and courage live here.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURED PHOTOS -->
<section class="photos-section">
    <h2 class="section-title">📸 Glimpses of Suyo</h2>
    <div class="divider"></div>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="photo-card">
                    <img src="uploads/attractions/mt_tapao.jpg" alt="Mount Tapao Sea of Clouds">
                    <div class="photo-caption">
                        <h5>🌄 Mount Tapao Sunrise</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="photo-card">
                    <img src="uploads/attractions/dawara_falls.jpg" alt="Dawara Falls">
                    <div class="photo-caption">
                        <h5>💧 Dawara Falls</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="photo-card">
                    <img src="uploads/attractions/sangbay_ni_ragsak.jpg" alt="Sangbay ni Ragsak Falls">
                    <div class="photo-caption">
                        <h5>🌊 Sangbay ni Ragsak</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="photo-card">
                    <img src="uploads/attractions/bessang_pass.jpg" alt="Bessang Pass">
                    <div class="photo-caption">
                        <h5>🏛️ Bessang Pass</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PLAN YOUR VISIT GUIDE -->
<section class="visit-section">
    <h2 class="section-title">🗺️ Plan Your Visit</h2>
    <div class="divider"></div>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="visit-card">
                    <h4>🚗 How to Get There</h4>
                    <ul>
                        <li><strong>From Vigan City:</strong> ~3–4 hours via Cervantes–Bessang Pass highway</li>
                        <li><strong>From Manila:</strong> ~8–10 hours northbound</li>
                        <li><strong>Public Transport:</strong> Buses to Cervantes, then jeepney or tricycle to Suyo</li>
                        <li><strong>Private:</strong> Follow the scenic Bessang Pass road — steep but paved</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="visit-card">
                    <h4>📅 Best Time to Go</h4>
                    <ul>
                        <li><strong>☀️ Dry Season (Nov–May):</strong> Best for trekking, waterfalls, and Mt. Tapao</li>
                        <li><strong>🌅 Sunrise Viewing:</strong> Arrive at Mt. Tapao by <strong>5:00 AM</strong></li>
                        <li><strong>🌧️ Rainy Season:</strong> Falls are fuller but roads may be slippery — take caution</li>
                        <li><strong>🎉 Feast Day:</strong> St. Andrew — November 30</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="visit-card">
                    <h4>🎒 What to Bring</h4>
                    <ul>
                        <li>Warm jacket — it gets cold in the highlands!</li>
                        <li>Comfortable trekking shoes & extra pair of socks</li>
                        <li>Swimwear & towel for the falls</li>
                        <li>Water bottle, snacks, power bank, camera</li>
                        <li>Small cash — some spots have no signal or ATM</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- QUICK STATS -->
<section class="stats-bar">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3 col-6 stat-item">
                <h3>13+</h3>
                <p>Tourist Spots</p>
            </div>
            <div class="col-md-3 col-6 stat-item">
                <h3>5</h3>
                <p>Waterfalls</p>
            </div>
            <div class="col-md-3 col-6 stat-item">
                <h3>4</h3>
                <p>Mountains & Views</p>
            </div>
            <div class="col-md-3 col-6 stat-item">
                <h3>∞</h3>
                <p>Warm Welcome</p>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>