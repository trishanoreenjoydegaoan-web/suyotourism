<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings — Suyo Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f7f4;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }
        .page-header {
            color: #166534;
            font-weight: 800;
            font-size: 1.8rem;
        }
        .divider {
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, #4ade80, #166534);
            border-radius: 2px;
            margin-bottom: 25px;
        }
        .table-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 6px 18px rgba(22, 101, 52, 0.08);
        }
        .table th {
            color: #166534;
            font-weight: 700;
            padding: 12px;
            background: #f0fdf4;
        }
        .status-pending { background: #fef3c7; color: #92400e; font-weight:600; padding:4px 10px; border-radius:20px; font-size:0.85rem; }
        .status-confirmed { background: #d1fae5; color: #065f46; font-weight:600; padding:4px 10px; border-radius:20px; font-size:0.85rem; }
        .status-cancelled { background: #fee2e2; color: #991b1b; font-weight:600; padding:4px 10px; border-radius:20px; font-size:0.85rem; }
        .empty-box { text-align:center; padding:40px; color:#6b7280; }
        .btn-back { background:#e5e7eb; color:#374151; border:none; }
        .btn-back:hover { background:#d1d5db; color:#1f2937; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-header">🏨 Accommodation Bookings</h2>
            <div class="divider"></div>
        </div>
        <a href="index.php" class="btn btn-back">← Back to Website</a>
    </div>

    <div class="table-card">

        <?php
        if (isset($_GET['delete'])) {
            $id = intval($_GET['delete']);
            $conn->query("DELETE FROM bookings WHERE booking_id = $id");
            echo '<div class="alert alert-success">✅ Booking deleted.</div>';
        }

        if (isset($_GET['confirm'])) {
            $id = intval($_GET['confirm']);
            $conn->query("UPDATE bookings SET status = 'Confirmed' WHERE booking_id = $id");
            echo '<div class="alert alert-success">✅ Booking Confirmed!</div>';
        }

        if (isset($_GET['cancel'])) {
            $id = intval($_GET['cancel']);
            $conn->query("UPDATE bookings SET status = 'Cancelled' WHERE booking_id = $id");
            echo '<div class="alert alert-warning">⚠️ Booking Cancelled.</div>';
        }

        $result = $conn->query("SELECT * FROM bookings ORDER BY booking_date DESC");
        ?>

        <?php if (!$result || $result->num_rows === 0): ?>
        <div class="empty-box">
            <h4>📭 No Bookings Yet</h4>
            <p>Bookings from visitors will appear here.</p>
        </div>
        <?php else: ?>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Guest</th>
                        <th>Accommodation</th>
                        <th>Check-In / Out</th>
                        <th>Guests</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><strong>#<?= $row['booking_id'] ?></strong></td>
                        <td>
                            <strong><?= htmlspecialchars($row['full_name']) ?></strong><br>
                            <small>📧 <?= htmlspecialchars($row['email']) ?><br>📞 <?= htmlspecialchars($row['phone']) ?></small>
                        </td>
                        <td><small><?= htmlspecialchars($row['accommodation_name']) ?></small></td>
                        <td><small><?= date('M j, Y', strtotime($row['check_in'])) ?> → <?= date('M j, Y', strtotime($row['check_out'])) ?></small></td>
                        <td><small><?= $row['guests'] ?></small></td>
                        <td>
                            <?php if ($row['status'] === 'Pending'): ?>
                                <span class="status-pending">⏳ Pending</span>
                            <?php elseif ($row['status'] === 'Confirmed'): ?>
                                <span class="status-confirmed">✅ Confirmed</span>
                            <?php else: ?>
                                <span class="status-cancelled">❌ Cancelled</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($row['status'] === 'Pending'): ?>
                            <a href="bookings.php?confirm=<?= $row['booking_id'] ?>" class="btn btn-sm btn-success" onclick="return confirm('Confirm this booking?')">✓ Confirm</a>
                            <?php endif; ?>
                            <a href="bookings.php?cancel=<?= $row['booking_id'] ?>" class="btn btn-sm btn-warning" onclick="return confirm('Cancel this booking?')">Cancel</a>
                            <a href="bookings.php?delete=<?= $row['booking_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this booking?')">🗑️ Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>