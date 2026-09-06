<?php include 'config.php'; ?>
<?php include 'nav.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourist Attractions — Suyo Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8faf8;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        .page-header {
            color: #2d5f3f;
            font-weight: 700;
            letter-spacing: 0.5px;
            padding-bottom: 12px;
            border-bottom: 3px solid #74b789;
            display: inline-block;
        }
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.06);
            transition: all 0.4s ease;
            overflow: hidden;
            background: #ffffff;
            cursor: pointer;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 30px rgba(0,0,0,0.12);
        }
        .card-img-top {
            height: 220px;
            object-fit: cover;
            object-position: center;
            transition: height 0.4s ease;
            background-color: #e9ecef;
        }
        .card.expanded .card-img-top {
            height: 180px;
        }
        .card-title {
            color: #1e402f;
            font-weight: 700;
            font-size: 1.25rem;
        }
        .card-title a, .location-link {
            color: inherit;
            text-decoration: none;
        }
        .card-title a:hover, .location-link:hover {
            color: #15803d;
            text-decoration: underline;
        }
        .visit-link {
            display: inline-block;
            background: #166534;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            padding: 9px 14px;
            font-weight: 700;
        }
        .visit-link:hover {
            background: #15803d;
            color: white;
        }
        .badge-category {
            background: linear-gradient(135deg, #4ade80, #22c55e);
            color: #166534;
            font-weight: 600;
            font-size: 0.78rem;
            padding: 5px 12px;
            border-radius: 20px;
        }
        .info-line {
            font-size: 0.93rem;
            color: #4b5563;
            margin-bottom: 6px;
        }
        .info-line strong {
            color: #1f2937;
        }
        .details-section {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease, padding 0.4s ease;
            opacity: 0;
        }
        .card.expanded .details-section {
            max-height: 600px;
            opacity: 1;
            padding-top: 16px;
            margin-top: 12px;
            border-top: 1px dashed #d1fae5;
        }
        .expand-hint {
            font-size: 0.8rem;
            color: #74b789;
            font-style: italic;
            margin-top: 8px;
            transition: transform 0.3s ease;
        }
        .card.expanded .expand-hint {
            transform: rotate(180deg);
        }
        .full-description {
            color: #374151;
            line-height: 1.7;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="page-header">📍 Tourist Attractions in Suyo, Ilocos Sur</h2>
        <p class="text-muted mt-3 fs-6">Click any card to see more details ✨</p>
    </div>

    <div class="row g-4">

        <!-- 1. MOUNT TAPAO -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/mt_tapao.jpg" class="card-img-top" alt="Mount Tapao">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=Mount%20Tapao" onclick="event.stopPropagation()">Mount Tapao</a></h5>
                    <span class="badge-category mb-3 align-self-start">🏔️ Mountain / Viewpoint</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=Mount%20Tapao" onclick="event.stopPropagation()">Poblacion, Suyo</a></p>
                    <p class="info-line"><strong>💰 Entrance:</strong> ₱30.00 + ₱10.00 Ecological Fee</p>
                    <p class="info-line"><strong>🕐 Hours:</strong> 5:00 AM – 6:00 PM Daily</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">The most famous landmark of Suyo! At the summit, enjoy breathtaking panoramic views stretching to the West Philippine Sea. Best visited at sunrise or sunset. Also a WWII historical site. Camping allowed overnight — watch the stars and wake above the clouds!</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Go early for sunrise. Bring a jacket — it gets cold at the top! Wear non-slip shoes and bring water.</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

        <!-- 2. SANGBAY NI RAGSAK FALLS -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/sangbay_ni_ragsak.jpg" class="card-img-top" alt="Sangbay ni Ragsak Falls">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=Sangbay%20ni%20Ragsak%20Falls" onclick="event.stopPropagation()">Sangbay ni Ragsak Falls</a></h5>
                    <span class="badge-category mb-3 align-self-start">💧 Waterfall</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=Sangbay%20ni%20Ragsak%20Falls" onclick="event.stopPropagation()">Lubnac, Patoc-ao, Suyo</a></p>
                    <p class="info-line"><strong>💰 Entrance:</strong> ₱40.00 + ₱10.00 Ecological Fee</p>
                    <p class="info-line"><strong>🕐 Hours:</strong> 6:00 AM – 5:30 PM Daily</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">Meaning "Falls of Happiness"! A stunning multi-tiered waterfall surrounded by lush greenery. Cool clear waters form natural pools perfect for swimming. Located ~3 km from Urzadan Bridge — short scenic trek.</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Best on a hot day! Bring swimwear, aqua shoes, towel. Water is cold year-round.</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

        <!-- 3. DAWARA FALLS -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/dawara_falls.jpg" class="card-img-top" alt="Dawara Falls">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=Dawara%20Falls" onclick="event.stopPropagation()">Dawara Falls</a></h5>
                    <span class="badge-category mb-3 align-self-start">💧 Waterfall</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=Dawara%20Falls" onclick="event.stopPropagation()">Poblacion, Suyo</a></p>
                    <p class="info-line"><strong>💰 Entrance:</strong> ₱25.00</p>
                    <p class="info-line"><strong>🕐 Hours:</strong> 6:00 AM – 6:00 PM Daily</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">The tallest and most majestic waterfall in Suyo! Dramatic rugged rock face with water cascading from a great height. Deep cool pool below. Conveniently near town proper — easy access for all visitors.</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Watch your step on slippery rocks! View from base is spectacular — bring your camera!</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

        <!-- 4. DAWARA RESORT -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/dawara_resort.jpg" class="card-img-top" alt="Dawara Resort">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=Dawara%20Resort" onclick="event.stopPropagation()">Dawara Resort</a></h5>
                    <span class="badge-category mb-3 align-self-start">🏊 Nature Resort</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=Dawara%20Resort" onclick="event.stopPropagation()">Near Dawara Falls, Poblacion, Suyo</a></p>
                    <p class="info-line"><strong>💰 Entrance:</strong> ₱30.00/person</p>
                    <p class="info-line"><strong>🕐 Hours:</strong> 6:00 AM – 6:00 PM Daily</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">A scenic nature resort located beside the majestic Dawara Falls! Features natural swimming pools, shaded cottages, and refreshing cool waters directly from the falls. Perfect for combining a waterfall visit with a relaxing stay and picnic. One of Suyo's most refreshing getaways.</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Visit Dawara Falls then relax at the resort! Cottages available for rent. Arrive early to secure a good spot near the water.</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

        <!-- 5. KAMAN-ITIL FALLS -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/kaman_itil.jpg" class="card-img-top" alt="Kaman-itil Falls">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=Kaman-itil%20Falls" onclick="event.stopPropagation()">Kaman-itil Falls</a></h5>
                    <span class="badge-category mb-3 align-self-start">💧 Waterfall</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=Kaman-itil%20Falls" onclick="event.stopPropagation()">Man-atong, Suyo</a></p>
                    <p class="info-line"><strong>💰 Entrance:</strong> ₱30.00</p>
                    <p class="info-line"><strong>🕐 Hours:</strong> 6:00 AM – 5:00 PM Daily</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">A hidden gem nestled in the mountains of Man-atong! Requires about a 1-hour trek from Tegteggamat — perfect for adventurers. Crystal-clear waters surrounded by untouched forest.</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Nature trek! Wear sturdy shoes, bring water, hire a local guide if first time.</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

        <!-- 6. BURAYOK FALLS -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/burayok_falls.jpg" class="card-img-top" alt="Burayok Falls">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=Burayok%20Falls" onclick="event.stopPropagation()">Burayok Falls</a></h5>
                    <span class="badge-category mb-3 align-self-start">💧 Waterfall</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=Burayok%20Falls" onclick="event.stopPropagation()">Baringcucurong, Suyo</a></p>
                    <p class="info-line"><strong>💰 Entrance:</strong> ₱25.00</p>
                    <p class="info-line"><strong>🕐 Hours:</strong> 6:00 AM – 6:00 PM Daily</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">Also known as the original name of Sangbay ni Ragsak Falls! A serene and peaceful waterfall with gentle cascades. Lush vegetation and tall trees provide natural shade. Perfect spot to relax and enjoy nature's tranquility.</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Great for picnics! Bring blanket and snacks. Calm atmosphere — ideal for meditation and photography.</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

        <!-- 7. LIPAY RESORT -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/lipay_resort.jpg" class="card-img-top" alt="Lipay Resort">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=Lipay%20Resort" onclick="event.stopPropagation()">Lipay Resort</a></h5>
                    <span class="badge-category mb-3 align-self-start">🏊 Nature Resort</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=Lipay%20Resort" onclick="event.stopPropagation()">Barangay Lipay, Suyo</a></p>
                    <p class="info-line"><strong>💰 Entrance:</strong> ₱30.00/person</p>
                    <p class="info-line"><strong>🕐 Hours:</strong> 6:00 AM – 6:00 PM Daily</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">A peaceful riverside and nature resort in Barangay Lipay. Natural swimming pools fed by cool mountain waters, picnic grounds, relaxing views of Lipay River. Favorite spot for family gatherings and swimming.</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Arrive early for best spots! Cottages available. Perfect for family outings.</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

        <!-- 8. SUYO ECO MOUNTAIN RESORT -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/suyo_eco_resort.jpg" class="card-img-top" alt="Suyo Eco Mountain Resort">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=Suyo%20Eco-Mountain%20Resort" onclick="event.stopPropagation()">Suyo Eco-Mountain Resort</a></h5>
                    <span class="badge-category mb-3 align-self-start">🏞️ Mountain Resort</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=Suyo%20Eco-Mountain%20Resort" onclick="event.stopPropagation()">Sitio Coscosnong, Man-atong, Suyo</a></p>
                    <p class="info-line"><strong>💰 Rates:</strong> ₱1,500 – ₱3,500/night</p>
                    <p class="info-line"><strong>🕐 Open:</strong> Daily, 24 Hours for Guests</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">Municipal-owned resort along historic Bessang Pass highway. Overlooks scenic Chico River. Cool mountain breeze year-round, spring-water pools, cozy cottages, function hall, nature trails.</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Book in advance especially weekends! Contact: +63 939 225 8644</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

        <!-- 9. BESSANG PASS NATURAL MONUMENT -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/bessang_pass.jpg" class="card-img-top" alt="Bessang Pass Natural Monument">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=Bessang%20Pass%20Natural%20Monument" onclick="event.stopPropagation()">Bessang Pass Natural Monument</a></h5>
                    <span class="badge-category mb-3 align-self-start">🏛️ Historical / Park</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=Bessang%20Pass%20Natural%20Monument" onclick="event.stopPropagation()">Suyo-Cervantes Boundary (Suyo Side)</a></p>
                    <p class="info-line"><strong>💰 Entrance:</strong> Free / Donation Accepted</p>
                    <p class="info-line"><strong>🕐 Hours:</strong> Daylight Hours Daily</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">Historic WWII battleground and protected natural monument. Site of fierce fighting in 1945. Features memorial shrine, lush forests, and breathtaking mountain views.</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Read the historical markers at the shrine. Drive carefully and respect the site.</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

        <!-- 10. MOUNT BALUNGABING -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/mt_balungabing.jpg" class="card-img-top" alt="Mount Balungabing">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=Mount%20Balungabing" onclick="event.stopPropagation()">Mount Balungabing</a></h5>
                    <span class="badge-category mb-3 align-self-start">🏔️ Mountain / Trekking</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=Mount%20Balungabing" onclick="event.stopPropagation()">Barangay Uso, Suyo</a></p>
                    <p class="info-line"><strong>💰 Entrance:</strong> ₱30.00 + Guide Fee</p>
                    <p class="info-line"><strong>🕐 Hours:</strong> Daylight Hours — Start Early</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">Majestic mountain in Barangay Uso offering challenging but rewarding trekking trails. Summit offers spectacular panoramic views of Cordillera peaks and West Philippine Sea on clear days.</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Start before dawn! Hire a local guide. Bring trekking poles, water, and warm clothes.</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

        <!-- 11. MOUNT TIBEK -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/mt_tibek.jpg" class="card-img-top" alt="Mount Tibek">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=Mount%20Tibek" onclick="event.stopPropagation()">Mount Tibek</a></h5>
                    <span class="badge-category mb-3 align-self-start">🏔️ Mountain / Viewpoint</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=Mount%20Tibek" onclick="event.stopPropagation()">Man-atong, Suyo</a></p>
                    <p class="info-line"><strong>💰 Entrance:</strong> ₱25.00</p>
                    <p class="info-line"><strong>🕐 Hours:</strong> 5:30 AM – 6:00 PM Daily</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">Scenic mountain viewpoint in Man-atong offering commanding highland views. Cool climate and pine-forested slopes. Quieter alternative to Mt. Tapao.</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Great for sunrise photography! Mist rolling over mountains is magical. Bring warm jacket.</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

        <!-- 12. TIMORRE VIEWPOINT -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/timorre_view.jpg" class="card-img-top" alt="Timorre Viewpoint">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=Timorre%20Viewpoint" onclick="event.stopPropagation()">Timorre Viewpoint</a></h5>
                    <span class="badge-category mb-3 align-self-start">🌄 Scenic Viewpoint</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=Timorre%20Viewpoint" onclick="event.stopPropagation()">Urzadan, Suyo</a></p>
                    <p class="info-line"><strong>💰 Entrance:</strong> Free</p>
                    <p class="info-line"><strong>🕐 Hours:</strong> Daylight Hours Daily</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">Stunning roadside viewpoint offering panoramic vistas of Suyo valley, mountains, and distant sea. Perfect for quick stop and sunset photography.</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Stop late afternoon for golden hour. Park safely off highway.</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

        <!-- 13. ST. ANDREW THE APOSTLE PARISH CHURCH -->
        <div class="col-md-4 col-sm-6 d-flex">
            <div class="card h-100 w-100" onclick="toggleCard(this)">
                <img src="uploads/attractions/st_andrew_church.jpg" class="card-img-top" alt="St. Andrew the Apostle Parish Church">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title mb-2"><a href="visitor_logbook.php?attraction=St.%20Andrew%20the%20Apostle%20Parish" onclick="event.stopPropagation()">St. Andrew the Apostle Parish</a></h5>
                    <span class="badge-category mb-3 align-self-start">⛪ Historical / Religious</span>
                    <p class="info-line"><strong>📍 Location:</strong> <a class="location-link" href="visitor_logbook.php?attraction=St.%20Andrew%20the%20Apostle%20Parish" onclick="event.stopPropagation()">Barangay Uso, Suyo</a></p>
                    <p class="info-line"><strong>💰 Entrance:</strong> Free</p>
                    <p class="info-line"><strong>🕐 Hours:</strong> Open During Daylight Hours</p>
                    <div class="details-section">
                        <h6 class="fw-bold text-success mb-2">ℹ️ About This Place</h6>
                        <p class="full-description">The main parish church of Suyo, dedicated to St. Andrew the Apostle, principal patron saint of the municipality. Historic religious landmark in Barangay Uso. Spiritual heart of the town and center of community faith life.</p>
                        <hr class="my-2">
                        <p class="mb-0 info-line"><strong>💡 Travel Tip:</strong> Dress modestly. Check bulletin for Mass schedules and feast day celebrations.</p>
                    </div>
                    <span class="expand-hint text-center mt-auto">⬇ Click to see more</span>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleCard(card) {
        document.querySelectorAll('.card.expanded').forEach(expandedCard => {
            if (expandedCard !== card) {
                expandedCard.classList.remove('expanded');
            }
        });
        card.classList.toggle('expanded');
        const hint = card.querySelector('.expand-hint');
        hint.textContent = card.classList.contains('expanded') ? '⬆ Click to collapse' : '⬇ Click to see more';
    }
</script>
</body>
</html>