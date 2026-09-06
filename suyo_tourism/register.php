<?php
include 'config.php';
$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    try {
        $stmt = $pdo->prepare("INSERT INTO User (full_name,email,username,password_hash,role) VALUES (?,?,?,?,?)");
        $stmt->execute([$full_name, $email, $username, $password, $role]);
        $success = "Account created! <a href='login.php'>Login here</a>";
    } catch(PDOException $e) {
        $error = "Username or Email already exists.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Suyo Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 class="text-center mb-4">Create Account</h3>
                <?php if($success): ?><div class="alert alert-success"><?= $success ?></div><?php endif; ?>
                <?php if($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
                <form method="POST" class="card p-4 shadow">
                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" name="full_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Register As</label>
                        <select name="role" class="form-select">
                            <option value="Tourist">Tourist</option>
                            <option value="Owner">Accommodation Owner</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Register</button>
                    <p class="text-center mt-3">Already have account? <a href="login.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>