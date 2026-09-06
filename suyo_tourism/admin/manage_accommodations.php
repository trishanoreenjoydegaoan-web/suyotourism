<?php
include '../config.php';
require_role('Admin');

// Approve / Reject
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['action'])) {
    $stmt = $pdo->prepare("UPDATE Accommodation SET status=?, approved_by=? WHERE accommodation_id=?");
    $stmt->execute([$_POST['action'], $_SESSION['user_id'], $_POST['accommodation_id']]);
    header("Location: manage_accommodations.php");
    exit;
}

$accoms = $pdo->query("SELECT a.*, u.full_name as owner_name FROM Accommodation a LEFT JOIN User u ON a.owner_id=u.user_id ORDER BY FIELD(status,'Pending','Approved','Rejected'), name")->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include '../nav.php'; ?>

<div class="container py-4">
    <h2 class="mb-4">🏨 Manage Accommodations</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Name</th><th>Type</th><th>Owner</th><th>Address</th><th>Status</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($accoms as $acc): ?>
                <tr>
                    <td><strong><?= htmlspecialchars($acc['name']) ?></strong></td>
                    <td><?= htmlspecialchars($acc['type']) ?></td>
                    <td><?= htmlspecialchars($acc['owner_name'] ?? '—') ?></td>
                    <td><?= htmlspecialchars($acc['address']) ?></td>
                    <td>
                        <?php
                        $s = $acc['status'];
                        $sc = ['Pending'=>'bg-warning text-dark','Approved'=>'bg-success','Rejected'=>'bg-danger'][$s];
                        ?>
                        <span class="badge <?= $sc ?>"><?= $s ?></span>
                    </td>
                    <td>
                        <?php if ($s === 'Pending'): ?>
                            <form method="POST" class="d-inline">
                                <input type="hidden" name="accommodation_id" value="<?= $acc['accommodation_id'] ?>">
                                <button name="action" value="Approved" class="btn btn-sm btn-success">✓ Approve</button>
                                <button name="action" value="Rejected" class="btn btn-sm btn-danger">✗ Reject</button>
                            </form>
                        <?php else: ?>
                            <em class="text-muted">— <?= $s ?> —</em>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>