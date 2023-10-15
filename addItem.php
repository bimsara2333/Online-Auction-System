<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $iName = $_POST['itemName'];
    $iType = $_POST['itemType'];
    $mBid = $_POST['minimumBid'];
    $date = $_POST['closingDate'];
    $yName = $_POST['name'];
    $yEmail = $_POST['email'];
    $info = $_POST['message'];

    // Create an SQL statement with placeholders, excluding 'id'.
    $sql = "INSERT INTO `item` (iName, iType, mBid, date, yName, yEmail, info) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Bind the parameters and their types, excluding 'id'.
        $stmt->bind_param('ssdssss', $iName, $iType, $mBid, $date, $yName, $yEmail, $info);

        if ($stmt->execute()) {
            echo "Data Inserted Successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $con->error;
    }

    // Close your database connection when you're done.
    $con->close();
}
?>

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
            <li><a href="myProfile.php">My Profile</a></li>
            <li><a href="viewItems.php">Online Bidding</a></li>
            <li><a href="viewAuctioner.php">Auctioner</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
        </ul>
    </div>
</header>

<div class="centered-form">
    <h2>Add item for start bidding</h2>
    <br>
    <form method="post">
        <label for="itemName">Item Name:</label>
        <input type="text" id="f1" name="itemName" placeholder="Enter the item name" required>

        <label for="itemType">Item Type:</label>
        <input type="text" id="f1" name="itemType" placeholder="Enter the item type" required>

        <label for="minimumBid">Minimum Bid:</label>
        <input type="number" id="minimumBid" name="minimumBid" placeholder="Enter the minimum bid" required>

        <label for="closingDate">Closing Date:</label>
        <input type="date" id="closingDate" name="closingDate" required>

        <label for="name">Your Name:</label>
        <input type="text" id="f1" name="name" placeholder="Enter your name" required>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="message">Additional Information:</label>
        <textarea id="message" name="message" placeholder="Enter additional information" required></textarea>

        <button type="submit" name="submit">Place Bid</button>
    </form>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>

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
