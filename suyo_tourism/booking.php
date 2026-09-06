<?php
include 'config.php';
include 'email_helper.php';
$success = '';
$selected_accommodation = $_GET['accommodation'] ?? '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $accommodation_name = trim($_POST['accommodation_name'] ?? '');
    $check_in = $_POST['check_in'] ?? '';
    $check_out = $_POST['check_out'] ?? '';
    $guests = intval($_POST['guests'] ?? 1);
    $special_requests = trim($_POST['special_requests'] ?? '');

    if ($full_name && filter_var($email, FILTER_VALIDATE_EMAIL) && $phone && $accommodation_name && $check_in && $check_out && $guests > 0) {
        $stmt = $conn->prepare("INSERT INTO bookings (full_name, email, phone, accommodation_name, check_in, check_out, guests, special_requests) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssis", $full_name, $email, $phone, $accommodation_name, $check_in, $check_out, $guests, $special_requests);

        if ($stmt->execute()) {
            $booking_id = $conn->insert_id;
            $email_sent = sendVisitorNotification(
                $email,
                $full_name,
                'Booking request received - Suyo Tourism',
                "We received your booking request for {$accommodation_name}.\n\nReference: #BK{$booking_id}\nCheck-in: {$check_in}\nCheck-out: {$check_out}\nGuests: {$guests}\n\nOur tourism team will contact you soon."
            );
            $success = $email_sent
                ? "✅ Booking Submitted! Reference: #BK$booking_id — A confirmation email was sent."
                : "✅ Booking Submitted! Reference: #BK$booking_id — We will contact you soon. Email delivery is not available right now.";
        } else {
            $success = "❌ Error: " . $conn->error;
        }
        $stmt->close();
    } else {
        $success = "⚠️ Please fill in ALL required fields!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form — Suyo Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f7f4;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }
        .form-card {
            background: white;
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 6px 18px rgba(22, 101, 52, 0.08);
            max-width: 650px;
            margin: 30px auto;
        }
        .form-title {
            color: #166534;
            font-weight: 800;
            font-size: 1.8rem;
            text-align: center;
            margin-bottom: 10px;
        }
        .divider {
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, #4ade80, #166534);
            border-radius: 2px;
            margin: 0 auto 25px;
        }
        .form-label {
            font-weight: 600;
            color: #374151;
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
        .btn-submit {
            background: linear-gradient(135deg, #166534, #15803d);
            color: white;
            font-weight: 700;
            padding: 12px 30px;
            border-radius: 10px;
            border: none;
            width: 100%;
            font-size: 1.05rem;
            margin-top: 10px;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(22, 101, 52, 0.3);
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #6b7280;
            text-decoration: none;
        }
        .back-link:hover {
            color: #166534;
        }
    </style>
</head>
<body>

<div class="form-card">
    <h2 class="form-title">📅 Book Your Stay</h2>
    <div class="divider"></div>

    <?php if ($success): ?>
    <div class="alert <?= str_starts_with($success, '✅') ? 'alert-success' : 'alert-danger' ?> text-center">
        <?= $success ?>
    </div>
    <?php endif; ?>

    <form method="POST" action="booking.php">
        <div class="mb-3">
            <label class="form-label">👤 Full Name *</label>
            <input type="text" name="full_name" class="form-control" placeholder="Your full name" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">📧 Email *</label>
                <input type="email" name="email" class="form-control" placeholder="your@email.com" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">📞 Phone *</label>
                <input type="tel" name="phone" class="form-control" placeholder="Your phone number" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">🏡 Accommodation *</label>
            <input type="text" name="accommodation_name" class="form-control" value="<?= htmlspecialchars($selected_accommodation) ?>" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">📅 Check-In Date *</label>
                <input type="date" name="check_in" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">📅 Check-Out Date *</label>
                <input type="date" name="check_out" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">👥 Number of Guests *</label>
            <input type="number" name="guests" class="form-control" min="1" max="20" placeholder="How many people?" required>
        </div>

        <div class="mb-4">
            <label class="form-label">📝 Special Requests (Optional)</label>
            <textarea name="special_requests" class="form-control" rows="3" placeholder="Any special requests?"></textarea>
        </div>

        <button type="submit" class="btn-submit">✅ Submit Booking Request</button>
    </form>

    <a href="accommodations.php" class="back-link">← Back to Accommodations</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>