<?php include 'config.php'; ?>
<?php include 'nav.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us — Suyo Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f7f4;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        .page-header {
            color: #166534;
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        .divider {
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #4ade80, #166534);
            border-radius: 2px;
            margin-bottom: 30px;
        }
        .form-card, .info-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 6px 18px rgba(22, 101, 52, 0.08);
            height: 100%;
        }
        .form-label {
            font-weight: 600;
            color: #1f2937;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #bbf7d0;
            padding: 10px 14px;
        }
        .form-control:focus {
            border-color: #4ade80;
            box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.25);
        }
        .btn-send {
            background: linear-gradient(135deg, #166534, #15803d);
            color: white;
            font-weight: 700;
            padding: 12px 30px;
            border-radius: 10px;
            border: none;
            width: 100%;
            font-size: 1.05rem;
            transition: all 0.3s ease;
        }
        .btn-send:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(22, 101, 52, 0.3);
        }
        .info-item {
            padding: 12px 0;
            border-bottom: 1px dashed #e5e7eb;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .info-item strong {
            color: #166534;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="page-header">📩 Contact Us</h2>
        <div class="divider"></div>
        <p class="text-muted fs-6">Have questions about your trip to Suyo? Send us a message and we'll get back to you soon!</p>
    </div>

    <div class="row g-4">
        <!-- INQUIRY FORM -->
        <div class="col-lg-7">
            <div class="form-card">
                <h4 class="mb-4" style="color:#166534">Send Us a Message</h4>

                <?php
                // Show success/error messages
                if (isset($_GET['msg'])) {
                    if ($_GET['msg'] === 'sent') {
                        echo '<div class="alert alert-success">✅ Message sent successfully! We will reply to you soon.</div>';
                    } elseif ($_GET['msg'] === 'error') {
                        echo '<div class="alert alert-danger">❌ Something went wrong. Please try again.</div>';
                    }
                }
                ?>

                <form method="POST" action="submit_inquiry.php">
                    <div class="mb-3">
                        <label class="form-label">👤 Your Name *</label>
                        <input type="text" name="name" class="form-control" placeholder="Juan Dela Cruz" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">📧 Email Address *</label>
                        <input type="email" name="email" class="form-control" placeholder="your@email.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">📞 Phone / Mobile (Optional)</label>
                        <input type="tel" name="phone" class="form-control" placeholder="+63 9XX XXX XXXX">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">💬 Your Message *</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="Tell us about your travel plans, questions, or feedback..." required></textarea>
                    </div>

                    <button type="submit" name="send_inquiry" class="btn-send">✉️ Send Message</button>
                </form>
            </div>
        </div>

        <!-- CONTACT INFO -->
        <div class="col-lg-5">
            <div class="info-card">
                <h4 class="mb-4" style="color:#166534">📍 Contact Information</h4>

                <div class="info-item">
                    <strong>🏛️ Municipal Tourism Office</strong><br>
                    Barangay Poblacion, Suyo<br>
                    Ilocos Sur, Philippines
                </div>

                <div class="info-item">
                    <strong>📞 Mobile / WhatsApp</strong><br>
                    +63 9XX XXX XXXX (Local Tourism Office)
                </div>

                <div class="info-item">
                    <strong>📧 Email</strong><br>
                    tourism@suyo.ilocossur.gov.ph
                </div>

                <div class="info-item">
                    <strong>🌐 Social Media</strong><br>
                    Follow us on Facebook: <strong>@SuyoTourism</strong>
                </div>

                <div class="info-item">
                    <strong>🕒 Office Hours</strong><br>
                    Monday – Friday<br>
                    8:00 AM – 5:00 PM
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>