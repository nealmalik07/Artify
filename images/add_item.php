<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login-registration.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $starting_price = $_POST['starting_price'];
    $end_time = $_POST['end_time'];
    $user_id = $_SESSION['user_id'];

    // Handle image upload
    $image = $_FILES['image']['name'];
    $target = "../images/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $stmt = $pdo->prepare("INSERT INTO items (user_id, title, description, image, starting_price, end_time) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $title, $description, $image, $starting_price, $end_time]);

    header("Location: ../auction.php");
}
?>