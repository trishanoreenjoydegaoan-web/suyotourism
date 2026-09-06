<?php
$host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "suyo_tourism_db";

$conn = new mysqli($host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("❌ Database Connection Failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>