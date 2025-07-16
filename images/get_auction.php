<?php
header('Content-Type: application/json');
require 'config.php';

try {
    $stmt = $pdo->query("SELECT items.*, MAX(bids.bid_amount) as current_bid 
                         FROM items 
                         LEFT JOIN bids ON items.id = bids.item_id 
                         WHERE items.end_time > NOW() 
                         GROUP BY items.id");
    $auctions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($auctions);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
}
?>
