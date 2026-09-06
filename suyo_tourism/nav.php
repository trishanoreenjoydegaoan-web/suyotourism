<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Roboto, sans-serif; }
        .navbar {
            background: linear-gradient(135deg, #166534, #15803d);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .nav-brand {
            color: white;
            font-weight: 800;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            line-height: 1.1;
        }
        .nav-brand img {
            width: 46px;
            height: 46px;
            object-fit: contain;
        }
        .nav-brand-text {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }
        .nav-brand-name {
            font-size: 1.2rem;
        }
        .nav-brand-subtitle {
            color: #bbf7d0;
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 14px;
            border-radius: 8px;
            transition: background 0.2s ease;
        }
        .nav-links a:hover {
            background: rgba(255,255,255,0.2);
        }
        .btn-login {
            background: white;
            color: #166534 !important;
            font-weight: 700;
            padding: 8px 22px !important;
            border-radius: 25px;
        }
        .btn-login:hover {
            background: #f0fdf4;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="index.php" class="nav-brand" aria-label="Suyo Ilocos Sur Tourism home">
        <img src="uploads/attractions/suyo_logo.jpg" alt="Suyo Ilocos Sur logo">
        <span class="nav-brand-text">
            <span class="nav-brand-name">Suyo Tourism</span>
            <span class="nav-brand-subtitle">Ilocos Sur</span>
        </span>
    </a>

    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="attractions.php">Attractions</a>
        <a href="accommodations.php">Accommodations</a>
        <a href="contact.php">Contact</a>

        <?php if (isset($_SESSION['admin_id'])): ?>
            <a href="inquiries.php">📬 Inquiries</a>
            <a href="bookings.php">🏨 Bookings</a>
            <a href="logout.php" class="btn-login">🚪 Logout</a>
        <?php else: ?>
            <a href="login.php" class="btn-login">🔐 Login</a>
        <?php endif; ?>
    </div>
</nav>

</body>
</html>