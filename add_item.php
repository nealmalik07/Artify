<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Add Auction Item</title>
</head>
<body style="margin-inline:7%; font-family: 'Arial', sans-serif; background-color: #f5f9f9; color: black; text-align: center;">

    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 20px 40px; border-bottom: 2px solid black;">
        <div style="display: flex; align-items: center;">
            <img src="images/artifylogo.svg" alt="Logo" style="width: 120px; height: 80px; margin-right: 10px;" />
        </div>
        <div style="display: flex; align-items: center; gap: 20px;">
            <?php if (isset($_SESSION['username'])): ?>
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <?php else: ?>
                <a href="login-registration.php" style="text-decoration: none; color: black; font-weight: bold;">Login</a>
                <a href="login-registration.php" style="text-decoration: none; color: black; font-weight: bold;">Register</a>
            <?php endif; ?>
            <button style="background-color: black; color: white; border: none; padding: 10px 20px; border-radius: 20px; font-weight: bold; cursor: pointer;">
                <a href="index.php" style="text-decoration: none; color: white;">MENU</a>
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <main style="margin-top: 50px; display: flex; justify-content: center;">
        <form action="php/add_item.php" method="POST" enctype="multipart/form-data" style="background-color: white; padding: 40px; border-radius: 20px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); max-width: 600px; width: 100%; text-align: left;">
            <h1 style="text-align: center; margin-bottom: 30px;">Add New Art Item</h1>
            <label for="title" style="display: block; margin-bottom: 8px; font-weight: bold;">Title:</label>
            <input type="text" id="title" name="title" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;" />

            <label for="description" style="display: block; margin-bottom: 8px; font-weight: bold;">Description:</label>
            <textarea id="description" name="description" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; resize: vertical; min-height: 100px;"></textarea>

            <label for="image" style="display: block; margin-bottom: 8px; font-weight: bold;">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required style="margin-bottom: 20px;" />

            <label for="starting_price" style="display: block; margin-bottom: 8px; font-weight: bold;">Starting Price:</label>
            <input type="number" id="starting_price" name="starting_price" step="0.01" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;" />

            <label for="end_time" style="display: block; margin-bottom: 8px; font-weight: bold;">End Time:</label>
            <input type="datetime-local" id="end_time" name="end_time" required style="width: 100%; padding: 10px; margin-bottom: 30px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;" />

            <button type="submit" style="background-color: black; color: white; border: none; padding: 15px 30px; border-radius: 30px; font-size: 16px; font-weight: bold; cursor: pointer; width: 100%;">Add Item</button>
        </form>
    </main>

    <!-- Footer -->
    <footer style="background-color: white; padding: 20px; border-top: 1px solid black; display: flex; justify-content: space-between; margin-top: 50px;">
        <div>
            <h3 style="margin-bottom: 10px;">artify</h3>
            <form>
                <label>Subscribe to our newsletter:</label><br />
                <input type="email" placeholder="Enter your email" style="padding: 5px; margin-top: 5px;" />
                <button type="submit" style="padding: 5px 10px; margin-left: 5px; background-color: #003e40; color: white;">Submit</button>
            </form>
        </div>
        <div>
            <p>© 2025 Artify. All rights reserved.</p>
            <div style="margin-top: 10px;">
                <span style="margin-right: 10px;">🔵</span>
                <span style="margin-right: 10px;">🟢</span>
                <span style="margin-right: 10px;">🔴</span>
            </div>
        </div>
    </footer>

</body>
</html>
