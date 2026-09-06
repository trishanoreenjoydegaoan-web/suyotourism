<?php
session_start();
include 'config.php';

$error = '';

if (isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $admin_user = "admin";
    $admin_pass = "admin123";

    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION['admin_id'] = 1;
        $_SESSION['admin_name'] = 'Administrator';
        header("Location: index.php");
        exit;
    } else {
        $error = "❌ Incorrect username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Suyo Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #166534, #15803d, #4ade80);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }
        .login-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        .login-title {
            color: #166534;
            font-weight: 800;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        .divider {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #4ade80, #166534);
            border-radius: 2px;
            margin-bottom: 25px;
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
        .btn-login {
            background: linear-gradient(135deg, #166534, #15803d);
            color: white;
            font-weight: 700;
            padding: 11px 30px;
            border-radius: 10px;
            border: none;
            width: 100%;
            font-size: 1.05rem;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(22, 101, 52, 0.3);
        }
        .back-link {
            color: #6b7280;
            text-decoration: none;
            font-size: 0.95rem;
        }
        .back-link:hover {
            color: #166534;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-6">
            <div class="login-card">
                <div class="text-center mb-4">
                    <h2 class="login-title">🔐 Admin Login</h2>
                    <div class="divider"></div>
                    <p class="text-muted">Suyo Tourism — Admin Panel</p>
                </div>

                <?php if ($error): ?>
                <div class="alert alert-danger text-center"><?= $error ?></div>
                <?php endif; ?>

                <form method="POST" action="login.php">
                    <div class="mb-3">
                        <label class="form-label">👤 Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">🔒 Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>

                    <button type="submit" class="btn-login">Sign In</button>
                </form>

                <div class="text-center mt-4">
                    <a href="index.php" class="back-link">← Back to Website</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>