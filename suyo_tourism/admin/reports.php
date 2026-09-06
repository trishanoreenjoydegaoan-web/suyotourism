<?php
include '../config.php';
require_role('Admin');

// Date filters
$start = $_GET['start_date'] ?? date('Y-m-01');
$end = $_GET['end_date'] ?? date('Y-m-t');

// Stats
$totalBookings = $pdo->prepare("SELECT COUNT(*), SUM(total_amount) FROM Booking WHERE booking_date BETWEEN ? AND ?");
$totalBookings->execute([$start, $end.' 23:59:59']);
$bookData = $totalBookings->fetch(PDO::FETCH_NUM);
$totalBookingsCount = $bookData[0] ?? 0;
$totalRevenue = $bookData[1] ?? 0;

$totalTourists = $pdo->query("SELECT COUNT(DISTINCT tourist_id) FROM Booking")->fetchColumn();
$totalAttractions = $pdo->query("SELECT COUNT(*) FROM Tourist_Attraction WHERE status='Active'")->fetchColumn();
$approvedAccoms = $pdo->query("SELECT COUNT(*) FROM Accommodation WHERE status='Approved'")->fetchColumn();

// Recent bookings
$stmt = $pdo->prepare("SELECT b.*, u.full_name, a.name as accom_name 
    FROM Booking b JOIN User u ON b.tourist_id=u.user_id 
    JOIN Room r ON b.room_id=r.room_id JOIN Accommodation a ON r.accommodation_id=a.accommodation_id 
    WHERE b.booking_date BETWEEN ? AND ? ORDER BY b.booking_date DESC LIMIT 10");
$stmt->execute([$start, $end.' 23:59:59']);
$recentBookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include '../nav.php'; ?>

<div class="container py-4">
    <h2 class="mb-4">📊 Tourism Reports & Statistics</h2>

    <form method="GET" class="row g-3 mb-4 align-items-end">
        <div class="col-auto">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" value="<?= $start ?>" class="form-control">
        </div>
        <div class="col-auto">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" value="<?= $end ?>" class="form-control">
        </div>
        <div class="col-auto">
            <button class="btn btn-success">Filter</button>
            <button class="btn btn-outline-success" onclick="window.print()">Print / Export PDF</button>
        </div>
    </form>

    <div class="row g-3 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card bg-primary text-white text-center py-3">
                <h4><?= $totalBookingsCount ?></h4>
                <p class="mb-0">Total Bookings</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card bg-success text-white text-center py-3">
                <h4>₱<?= number_format($totalRevenue,2) ?></h4>
                <p class="mb-0">Total Revenue</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card bg-info text-white text-center py-3">
                <h4><?= $totalTourists ?></h4>
                <p class="mb-0">Unique Tourists</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card bg-warning text-dark text-center py-3">
                <h4><?= $totalAttractions ?></h4>
                <p class="mb-0">Attractions / <?= $approvedAccoms ?> Accoms</p>
            </div>
        </div>
    </div>

    <h4>📅 Recent Bookings (Filtered)</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Tourist</th><th>Accommodation</th><th>Check-in</th><th>Check-out</th><th>Amount</th><th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php if (count($recentBookings) === 0): ?>
                <tr><td colspan="6" class="text-center text-muted">No bookings in selected period</td></tr>
            <?php else: ?>
                <?php foreach ($recentBookings as $b): ?>
                <tr>
                    <td><?= htmlspecialchars($b['full_name']) ?></td>
                    <td><?= htmlspecialchars($b['accom_name']) ?></td>
                    <td><?= $b['check_in_date'] ?></td>
                    <td><?= $b['check_out_date'] ?></td>
                    <td>₱<?= number_format($b['total_amount'],2) ?></td>
                    <td><?= $b['booking_status'] ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>