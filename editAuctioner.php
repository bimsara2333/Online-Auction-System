<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles3.css">
    <title>E-Auction</title>
</head>
<body>

<header id="header1">
    <h1 class="logo">E-Auction</h1>
    <div class="navbar">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="viewItems.php">Online Bidding</a></li>
            <li><a href="viewItems.php">Auctioner</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
        </ul>
    </div>
</header>

<div class="centered-form">
    <h2>Edit Auctioner</h2>
    <br>
    <form action="#" method="post">
        <label for="itemName">Name:</label>
        <input type="text" id="f1" name="itemName" placeholder="Enter the item name" required>

        <label for="itemType">NIC:</label>
        <input type="text" id="f1" name="itemType" placeholder="Enter the item type" required>

        <label for="minimumBid">Status:</label>
        <input type="number" id="minimumBid" name="minimumBid" placeholder="Enter the minimum bid" required>

        <label for="closingDate">Email:</label>
        <input type="date" id="closingDate" name="closingDate" required>

        <label for="name">Contact Number:</label>
        <input type="text" id="f1" name="name" placeholder="Enter your name" required>

        <button type="submit">Update</button>
    </form>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<footer>
    <div class="footer-content">
        <p>&copy; 2023 E-Auction. All rights reserved.</p>
        <ul class="footer-links">
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </div>
</footer>

</body>
</html>