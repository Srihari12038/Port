<?php

$conn = new mysqli("localhost", "root", "", "portfolio_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

if (!$name || !$email || !$message) {
    echo "Missing data";
    exit;
}

$sql = "INSERT INTO messages (name, email, subject, message)
        VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "SQL ERROR: " . $conn->error;
}

$conn->close();
?>