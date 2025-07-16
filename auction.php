<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Art Auctions</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/script.js" defer></script>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
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
        <div id="auction-list" class="auction-list-grid">
            <!-- Auction items will be dynamically inserted here -->
        </div>
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
