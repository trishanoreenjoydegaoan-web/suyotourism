<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiries — Suyo Tourism</title>
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
        .status-unread { background: #fef2f2; color: #dc2626; font-weight:600; padding:4px 10px; border-radius:20px; font-size:0.85rem; }
        .status-read { background: #f0fdf4; color: #166534; font-weight:600; padding:4px 10px; border-radius:20px; font-size:0.85rem; }
        .empty-box { text-align:center; padding:40px; color:#6b7280; }
        .btn-back { background:#e5e7eb; color:#374151; border:none; }
        .btn-back:hover { background:#d1d5db; color:#1f2937; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-header">📬 Inquiries / Messages</h2>
            <div class="divider"></div>
        </div>
        <a href="index.php" class="btn btn-back">← Back to Website</a>
    </div>

    <div class="table-card">

        <?php
        if (isset($_GET['delete'])) {
            $id = intval($_GET['delete']);
            $conn->query("DELETE FROM inquiries WHERE inquiry_id = $id");
            echo '<div class="alert alert-success">✅ Message deleted.</div>';
        }

        if (isset($_GET['mark_read'])) {
            $id = intval($_GET['mark_read']);
            $conn->query("UPDATE inquiries SET status = 'Read' WHERE inquiry_id = $id");
            echo '<div class="alert alert-success">✅ Marked as read.</div>';
        }

        $unread_result = $conn->query("SELECT COUNT(*) AS c FROM inquiries WHERE status = 'Unread'");
        $unread = $unread_result ? $unread_result->fetch_assoc()['c'] : 0;
        ?>

        <?php if ($unread > 0): ?>
        <div class="alert alert-warning">
            📬 You have <strong><?= $unread ?></strong> new message<?= $unread > 1 ? 's' : '' ?>!
        </div>
        <?php endif; ?>

        <?php
        $result = $conn->query("SELECT * FROM inquiries ORDER BY submitted_at DESC");
        ?>

        <?php if (!$result || $result->num_rows === 0): ?>
        <div class="empty-box">
            <h4>📭 No Messages Yet</h4>
            <p>Messages from visitors will appear here.</p>
        </div>
        <?php else: ?>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>From</th>
                        <th>Contact</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($row['name']) ?></strong></td>
                        <td>
                            <small>
                                📧 <?= htmlspecialchars($row['email']) ?><br>
                                📞 <?= htmlspecialchars($row['phone'] ?: '—') ?>
                            </small>
                        </td>
                        <td style="max-width: 300px;">
                            <small><?= nl2br(htmlspecialchars($row['message'])) ?></small>
                        </td>
                        <td>
                            <?php if ($row['status'] === 'Unread'): ?>
                                <span class="status-unread">🔴 Unread</span>
                            <?php else: ?>
                                <span class="status-read">✅ Read</span>
                            <?php endif; ?>
                        </td>
                        <td><small><?= date('M j, Y g:i A', strtotime($row['submitted_at'])) ?></small></td>
                        <td>
                            <?php if ($row['status'] === 'Unread'): ?>
                            <a href="inquiries.php?mark_read=<?= $row['inquiry_id'] ?>" class="btn btn-sm btn-success mb-1">✓ Mark Read</a>
                            <?php endif; ?>
                            <a href="inquiries.php?delete=<?= $row['inquiry_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this message?')">🗑️ Delete</a>
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