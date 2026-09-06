<?php include 'config.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['send_inquiry'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO Inquiries (name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $message);
        $stmt->execute();
        $stmt->close();
        
        header("Location: contact.php?msg=sent");
        exit;
    }
    header("Location: contact.php?msg=error");
    exit;
}
?>