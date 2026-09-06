<?php
include 'config.php';
include 'email_helper.php';

$conn->query("CREATE TABLE IF NOT EXISTS visitor_logbook (
    visitor_id INT AUTO_INCREMENT PRIMARY KEY,
    attraction_name VARCHAR(150) NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(40) NOT NULL,
    address VARCHAR(255) NOT NULL,
    number_of_visitors INT NOT NULL DEFAULT 1,
    visit_date DATE NOT NULL,
    purpose VARCHAR(255) NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$selected_attraction = trim($_GET['attraction'] ?? $_POST['attraction_name'] ?? '');
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $number_of_visitors = intval($_POST['number_of_visitors'] ?? 0);
    $visit_date = $_POST['visit_date'] ?? '';
    $purpose = trim($_POST['purpose'] ?? '');

    if ($selected_attraction && $full_name && filter_var($email, FILTER_VALIDATE_EMAIL) && $phone && $address && $number_of_visitors > 0 && $visit_date && $purpose) {
        $stmt = $conn->prepare("INSERT INTO visitor_logbook (attraction_name, full_name, email, phone, address, number_of_visitors, visit_date, purpose) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssiss', $selected_attraction, $full_name, $email, $phone, $address, $number_of_visitors, $visit_date, $purpose);

        if ($stmt->execute()) {
            $visitor_id = $conn->insert_id;
            $email_sent = sendVisitorNotification(
                $email,
                $full_name,
                'Visitor logbook registration - Suyo Tourism',
                "Your visit to {$selected_attraction} has been recorded.\n\nVisitor record: #VL{$visitor_id}\nVisit date: {$visit_date}\nNumber of visitors: {$number_of_visitors}\nPurpose: {$purpose}\n\nThank you for visiting Suyo!"
            );
            $success = $email_sent
                ? 'Visitor details recorded successfully. A confirmation email was sent.'
                : 'Visitor details recorded successfully. Email delivery is not available right now.';
        } else {
            $error = 'Unable to save your visitor details. Please try again.';
        }
        $stmt->close();
    } else {
        $error = 'Please complete all fields with valid information.';
    }
}

include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Logbook — Suyo Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f7f4; font-family: 'Segoe UI', Roboto, sans-serif; }
        .form-card { max-width: 720px; margin: 35px auto; padding: 35px; background: white; border-radius: 16px; box-shadow: 0 6px 18px rgba(22, 101, 52, 0.08); }
        .form-title { color: #166534; font-weight: 800; text-align: center; }
        .form-label { color: #374151; font-weight: 600; }
        .form-control { border: 1px solid #bbf7d0; border-radius: 10px; padding: 10px 14px; }
        .form-control:focus { border-color: #4ade80; box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.25); }
        .btn-submit { width: 100%; border: 0; border-radius: 10px; padding: 12px 30px; background: #166534; color: white; font-weight: 700; }
        .btn-submit:hover { background: #15803d; }
        .selected-place { background: #f0fdf4; border-left: 4px solid #22c55e; color: #166534; padding: 12px 15px; }
    </style>
</head>
<body>
<div class="container">
    <div class="form-card">
        <h2 class="form-title">Visitor Logbook</h2>
        <p class="text-center text-muted mb-4">Please register your visit to help us keep an accurate tourism record.</p>

        <?php if ($success): ?>
            <div class="alert alert-success text-center"><?= htmlspecialchars($success) ?></div>
        <?php elseif ($error): ?>
            <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (!$selected_attraction): ?>
            <div class="alert alert-warning">Please select an attraction from the attractions page first.</div>
        <?php else: ?>
            <div class="selected-place mb-4"><strong>Selected attraction:</strong> <?= htmlspecialchars($selected_attraction) ?></div>
            <form method="POST" action="visitor_logbook.php?attraction=<?= urlencode($selected_attraction) ?>">
                <input type="hidden" name="attraction_name" value="<?= htmlspecialchars($selected_attraction) ?>">
                <div class="mb-3">
                    <label class="form-label" for="full_name">Full Name *</label>
                    <input id="full_name" type="text" name="full_name" class="form-control" required>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="email">Email *</label>
                        <input id="email" type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="phone">Phone Number *</label>
                        <input id="phone" type="tel" name="phone" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="address">Address *</label>
                    <input id="address" type="text" name="address" class="form-control" required>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="number_of_visitors">Number of Visitors *</label>
                        <input id="number_of_visitors" type="number" name="number_of_visitors" class="form-control" min="1" max="100" value="1" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="visit_date">Visit Date *</label>
                        <input id="visit_date" type="date" name="visit_date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="purpose">Purpose of Visit *</label>
                    <input id="purpose" type="text" name="purpose" class="form-control" placeholder="Tourism, picnic, hiking, etc." required>
                </div>
                <button type="submit" class="btn-submit">Submit Visitor Record</button>
            </form>
        <?php endif; ?>
        <a href="attractions.php" class="d-block text-center mt-4 text-success">Back to Attractions</a>
    </div>
</div>
</body>
</html>
