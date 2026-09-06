<?php include 'nav.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodations — Suyo Tourism</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }
        body {
            background-color: #f8fef9;
            color: #1f2937;
        }
        .page-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px 60px;
        }
        .page-header {
            text-align: center;
            margin-bottom: 45px;
        }
        .page-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: #166534;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .title-divider {
            width: 260px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #4ade80, #166534, #4ade80, transparent);
            margin: 8px auto 15px;
        }
        .page-subtitle {
            color: #4b5563;
            font-size: 1.05rem;
        }
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }
        .card {
            background: white;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 2px 10px rgba(22, 101, 52, 0.06);
        }
        .card-photo {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
            background-color: #e5e7eb;
        }
        .card-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 14px;
        }
        .badge {
            display: inline-block;
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            color: white;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 5px 14px;
            border-radius: 20px;
            margin-bottom: 18px;
        }
        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-bottom: 10px;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        .info-row span:first-child {
            color: #166534;
            font-weight: 500;
            min-width: 22px;
        }
        .rate-text {
            color: #15803d;
            font-weight: 600;
        }
        .book-btn {
            display: block;
            background: #166534;
            color: white;
            text-align: center;
            text-decoration: none;
            font-weight: 700;
            padding: 11px;
            border-radius: 8px;
            margin-top: 18px;
            transition: background 0.2s ease;
        }
        .book-btn:hover {
            background: #15803d;
        }

        @media (max-width: 968px) {
            .cards-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 620px) {
            .cards-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="page-wrapper">
    <div class="page-header">
        <h1 class="page-title">🏨 Places to Stay in Suyo, Ilocos Sur</h1>
        <div class="title-divider"></div>
        <p class="page-subtitle">Experience comfort and hospitality — resorts, inns, and nature getaways</p>
    </div>

    <div class="cards-grid">

        <!-- === SUYO ECO-MOUNTAIN RESORT === -->
        <div class="card">
            <img src="suyo-eco-mountain.jpg" alt="Suyo Eco-Mountain Resort" class="card-photo">
            <h3 class="card-title">Suyo Eco-Mountain Resort</h3>
            <span class="badge">🏔️ Mountain Resort</span>

            <div class="info-row">
                <span>📍</span>
                <div><strong>Location:</strong> Sitio Coscosnong, Brgy. Man-atong, Suyo</div>
            </div>
            <div class="info-row">
                <span>💰</span>
                <div><strong>Rate:</strong> <span class="rate-text">₱1,500 – ₱3,500/night</span></div>
            </div>
            <div class="info-row">
                <span>🏊</span>
                <div><strong>Facilities:</strong> Pools, Cottages, Function Hall, Nature Trails</div>
            </div>
            <div class="info-row">
                <span>📞</span>
                <div><strong>Contact:</strong> +63 939 225 8644</div>
            </div>

            <a href="booking.php?accommodation=Suyo%20Eco-Mountain%20Resort" class="book-btn">Book Now</a>
        </div>

        <!-- === LIPAY RESORT === -->
        <div class="card">
            <img src="lipay_resort.jpg" alt="Lipay Resort" class="card-photo">
            <h3 class="card-title">Lipay Resort</h3>
            <span class="badge">🌊 Riverside Resort</span>

            <div class="info-row">
                <span>📍</span>
                <div><strong>Location:</strong> Sitio Lipay,Barangay Urzadan, Suyo</div>
            </div>
            <div class="info-row">
                <span>🎟️</span>
                <div><strong>Entrance:</strong> <span class="rate-text">₱30.00/person</span></div>
            </div>
            <div class="info-row">
                <span>🏊</span>
                <div><strong>Facilities:</strong> Natural pools, cottages, picnic grounds</div>
            </div>
            <div class="info-row">
                <span>⏰</span>
                <div><strong>Hours:</strong> 6:00 AM – 6:00 PM Daily</div>
            </div>

            <a href="booking.php?accommodation=Lipay%20Resort" class="book-btn">Book Now</a>
        </div>

        <!-- === JJBL HOMESTAY === -->
        <div class="card">
            <img src="jjbl-homestay.jpg" alt="JJBL Homestay & Transient House" class="card-photo">
            <h3 class="card-title">JJBL Homestay & Transient</h3>
            <span class="badge">🏠 Homestay / Budget</span>

            <div class="info-row">
                <span>📍</span>
                <div><strong>Location:</strong> Barangay Poblacion, Suyo</div>
            </div>
            <div class="info-row">
                <span>💰</span>
                <div><strong>Rate:</strong> <span class="rate-text">Budget-friendly — inquire</span></div>
            </div>
            <div class="info-row">
                <span>🏠</span>
                <div><strong>Facilities:</strong> Fully furnished house, good for groups</div>
            </div>
            <div class="info-row">
                <span>📞</span>
                <div><strong>Contact:</strong> 0915 715 0005 / Facebook: JJBL Homestay</div>
            </div>

            <a href="booking.php?accommodation=JJBL%20Homestay%20%26%20Transient%20House" class="book-btn">Book Now</a>
        </div>

    </div>
</div>

</body>
</html>