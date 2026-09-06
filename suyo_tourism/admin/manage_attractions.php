<?php
include '../config.php';
require_role('Admin');

// Add/Edit Attraction
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['delete_id'])) {
        $stmt = $pdo->prepare("DELETE FROM Tourist_Attraction WHERE attraction_id=?");
        $stmt->execute([$_POST['delete_id']]);
        header("Location: manage_attractions.php");
        exit;
    }

    if (!empty($_POST['attraction_id'])) {
        // Update
        $stmt = $pdo->prepare("UPDATE Tourist_Attraction SET name=?, location=?, description=?, opening_hours=?, entrance_fee=?, category=?, status=? WHERE attraction_id=?");
        $stmt->execute([
            $_POST['name'], $_POST['location'], $_POST['description'],
            $_POST['opening_hours'], $_POST['entrance_fee'], $_POST['category'],
            $_POST['status'], $_POST['attraction_id']
        ]);
    } else {
        // Insert
        $stmt = $pdo->prepare("INSERT INTO Tourist_Attraction (name, location, description, opening_hours, entrance_fee, category, status, created_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['name'], $_POST['location'], $_POST['description'],
            $_POST['opening_hours'], $_POST['entrance_fee'], $_POST['category'],
            $_POST['status'], $_SESSION['user_id']
        ]);
    }
    header("Location: manage_attractions.php");
    exit;
}

// Get record for editing
$edit = null;
if (!empty($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM Tourist_Attraction WHERE attraction_id=?");
    $stmt->execute([$_GET['edit']]);
    $edit = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Get all attractions
$attractions = $pdo->query("SELECT a.*, u.full_name as creator FROM Tourist_Attraction a LEFT JOIN User u ON a.created_by=u.user_id ORDER BY a.name")->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include '../nav.php'; ?>

<div class="container py-4">
    <h2 class="mb-4">📍 Manage Tourist Attractions</h2>

    <div class="card mb-5">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><?= $edit ? '✏️ Edit Attraction' : '➕ Add New Attraction' ?></h5>
        </div>
        <div class="card-body">
            <form method="POST">
                <?php if ($edit): ?>
                    <input type="hidden" name="attraction_id" value="<?= $edit['attraction_id'] ?>">
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Attraction Name</label>
                        <input type="text" name="name" class="form-control" value="<?= $edit ? htmlspecialchars($edit['name']) : '' ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <?php $cats = ['Nature','Cultural','Historical','Event']; ?>
                            <?php foreach ($cats as $c): ?>
                                <option value="<?= $c ?>" <?= ($edit && $edit['category']==$c)?'selected':'' ?>><?= $c ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" value="<?= $edit ? htmlspecialchars($edit['location']) : '' ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Entrance Fee (₱)</label>
                        <input type="number" step="0.01" name="entrance_fee" class="form-control" value="<?= $edit ? $edit['entrance_fee'] : '0.00' ?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="Active" <?= ($edit && $edit['status']=='Active')?'selected':'' ?>>Active</option>
                            <option value="Closed" <?= ($edit && $edit['status']=='Closed')?'selected':'' ?>>Closed</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Opening Hours</label>
                        <input type="text" name="opening_hours" class="form-control" value="<?= $edit ? htmlspecialchars($edit['opening_hours']) : '' ?>" placeholder="e.g. 8:00 AM - 5:00 PM">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"><?= $edit ? htmlspecialchars($edit['description']) : '' ?></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><?= $edit ? 'Update' : 'Add Attraction' ?></button>
                <?php if ($edit): ?>
                    <a href="manage_attractions.php" class="btn btn-secondary">Cancel Edit</a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <h4>📋 Attraction List</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Name</th><th>Category</th><th>Location</th><th>Fee</th><th>Status</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($attractions as $a): ?>
                <tr>
                    <td><?= htmlspecialchars($a['name']) ?></td>
                    <td><?= htmlspecialchars($a['category']) ?></td>
                    <td><?= htmlspecialchars($a['location']) ?></td>
                    <td>₱<?= number_format($a['entrance_fee'],2) ?></td>
                    <td><span class="badge <?= $a['status']==='Active'?'bg-success':'bg-danger' ?>"><?= $a['status'] ?></span></td>
                    <td>
                        <a href="?edit=<?= $a['attraction_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" class="d-inline" onsubmit="return confirm('Delete this attraction?');">
                            <input type="hidden" name="delete_id" value="<?= $a['attraction_id'] ?>">
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>