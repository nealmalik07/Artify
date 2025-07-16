<?php
require 'php/config.php';

try {
    $stmt = $pdo->query("SELECT * FROM items WHERE end_time > NOW()");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Debug Auction Items</title>
</head>
<body>
    <h1>Debug Auction Items</h1>
    <?php if (count($items) === 0): ?>
        <p>No active auction items found.</p>
    <?php else: ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Starting Price</th>
                    <th>End Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['id']) ?></td>
                    <td><?= htmlspecialchars($item['title']) ?></td>
                    <td><?= htmlspecialchars($item['description']) ?></td>
                    <td><?= htmlspecialchars($item['image']) ?></td>
                    <td><?= htmlspecialchars($item['starting_price']) ?></td>
                    <td><?= htmlspecialchars($item['end_time']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
