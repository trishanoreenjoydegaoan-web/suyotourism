<?php include '../config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h2>📊 Admin Dashboard</h2>
    <?php if(isset($_SESSION['full_name'])): ?>
        <p>Welcome, <strong><?php echo $_SESSION['full_name']; ?></strong>!</p>
    <?php endif; ?>
    <hr>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="../attractions.php" class="btn btn-success">🏞️ Manage Attractions</a>
        <a href="../index.php" class="btn btn-primary">🏠 Go to Home</a>
        <a href="../logout.php" class="btn btn-danger">🚪 Logout</a>
    </div>
</div>
</body>
</html> 