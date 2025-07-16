<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.html");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_id = $_POST['item_id'];
    $bid_amount = $_POST['bid_amount'];
    $user_id = $_SESSION['user_id'];

    // Check if bid is higher than current highest bid
    $stmt = $pdo->prepare("SELECT MAX(bid_amount) as max_bid FROM bids WHERE item_id = ?");
    $stmt->execute([$item_id]);
    $max_bid = $stmt->fetch()['max_bid'] ?? 0;

    $stmt = $pdo->prepare("SELECT starting_price FROM items WHERE id = ?");
    $stmt->execute([$item_id]);
    $starting_price = $stmt->fetch()['starting_price'];

    if ($bid_amount > $max_bid && $bid_amount >= $starting_price) {
        $stmt = $pdo->prepare("INSERT INTO bids (item_id, user_id, bid_amount) VALUES (?, ?, ?)");
        $stmt->execute([$item_id, $user_id, $bid_amount]);
        echo "Bid placed successfully!";
    } else {
        echo "Bid must be higher than current bid or starting price.";
    }
}
?>