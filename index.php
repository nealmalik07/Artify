<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Artify - Art Auction Platform</title>
</head>

<body style="margin-inline:7% ; font-family: 'Arial', sans-serif; background-color: #f5f9f9; color: black; text-align: center;">

  <!-- Header -->
  <div style="display: flex; justify-content: space-between; align-items: center; padding: 20px 40px; border-bottom: 2px solid  black;">
    <div style="display: flex; align-items: center;">
      <img src="images/artifylogo.svg" alt="Logo" style="width: 120px; height: 80px; margin-right: 10px;">
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
  <div style="margin-top: 50px;">
    <h3 style="color: black; font-size: 16px;">Buy, Sell, Discover, Engage</h3>
    <h1 style="font-size: 64px; font-weight: normal; margin: 20px 0;">
      Embrace the Art within You
    </h1>
    <button style="background-color: black; color: white; border: none; padding: 15px 30px; border-radius: 30px; font-size: 16px; font-weight: bold; cursor: pointer;">
      Join Now
    </button>
  </div>

<!-- Hero Banner -->
<div style="display: flex; justify-content: center; gap: 10px; margin: 20px;">
  <img src="images/image1.png" style="width: 25%;" />
  <img src="images/IMG_20240716_170728.jpg" style="width: 25%;" />
  <img src="images/image2.png" style="width: 25%;" />
  <img src="images/image3.png" style="width: 25%;" />
</div>

<!-- Featured Items -->
<div style="display: flex;justify-content: space-around;background-color: black;margin-top: 50px;padding: 50px;border: black;border-radius: 10px;">
     <div style="margin-left: 25%;color: white;">
      <h1>sell paintings,<br>sculptures <br>and crafts</h1>
     </div>
     <div style="margin: auto;"><button style="background-color: white; color: black; border: none; padding: 40px 60px; border-radius: 20px; font-weight: bold; cursor: pointer;">
      <a href="add_item.php" style="text-decoration: none; color:black">Add to Auction</a>
     </button></div>
</div>

<!-- Categories -->
<div style="text-align: center; padding: 40px;">
  <h2 style="margin-bottom: 40px;">Categories</h2>
  <div style="display: flex; justify-content: center; gap: 20px;">
    <div style="text-align: center;">
      <img src="images/painting.png" style="width: 300px; height: 250px; object-fit: contain; display: block; margin: 0 auto;" alt="Painting" /><br/>
      <div>Painting</div>
    </div>
    <div style="text-align: center;">
      <img src="images/sculptures.png" style="width: 300px; height: 250px; object-fit: contain; display: block; margin: 0 auto;" alt="Sculpture" /><br/>
      <span>Sculpture</span>
    </div>
    <div style="text-align: center;">
      <img src="images/craft.png" style="width: 300px; height: 250px; object-fit: contain; display: block; margin: 0 auto;" alt="Craft" /><br/>
      <span>Craft</span>
    </div>
  </div>
</div>

<!-- About Section -->
<div style="display: flex; align-items: center; padding: 60px; background-color: white;margin: 30px;">
  <div style="flex: 1;">
    <img src="images/artifylogo.svg" style="border: 5px solid white;height: 300px;" />
  </div>
  <div style="flex: 2; padding-left: 40px;">
    <h2>Our Creative Journey</h2>
    <h4>Art Enthusiasts</h4>
    <p style="line-height: 1.6;">
      Artify, the leading online art auction platform, offers a diverse collection of paintings, sculptures, and prints.
      With our innovative auction functionality, artists can showcase their work while art enthusiasts bid on their favorites.
      Our minimalistic design ensures a seamless experience, with a user-friendly navigation bar and footer that complements
      the artistry showcased on the platform.
    </p>
  </div>
</div>

<!-- Footer -->
<footer style="background-color: white; padding: 20px; border-top: 1px solid black; display: flex;justify-content: space-between;">
  <div>
    <h3 style="margin-bottom: 10px;">artify</h3>
    <form>
      <label>Subscribe to our newsletter:</label><br/>
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
