<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Check if email already exists
    $check_stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $check_stmt->execute([$email]);
    if ($check_stmt->rowCount() > 0) {
        $_SESSION['error'] = "Email already exists. Please use a different email.";
        header("Location: ../login-registration.php");
        exit();
    }
    
    // Insert new user
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $email, $password])) {
        // Redirect to login page on success
        header("Location: ../login-registration.php");
        exit();
    } else {
        $_SESSION['error'] = "Registration failed. Please try again.";
        header("Location: ../login-registration.php");
        exit();
    }
}
?>