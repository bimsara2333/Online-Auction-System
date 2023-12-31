<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $iName = $_POST['iName'];
    $iType = $_POST['iType'];
    $mBid = $_POST['mBid'];
    $date = $_POST['date'];
    $yName = $_POST['yName'];
    $yEmail = $_POST['yEmail'];
    $info = $_POST['info'];

    // Create an SQL statement with placeholders, excluding 'id'.
    $sql = "INSERT INTO `item` (iName, iType, mBid, date, yName, yEmail, info) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Bind the parameters and their types, excluding 'id'.
        $stmt->bind_param('ssdssss', $iName, $iType, $mBid, $date, $yName, $yEmail, $info);

        if ($stmt->execute()) {
            // Use JavaScript to display an alert to the user
            echo '<script>alert("Data Inserted Successfully");</script>';
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get the submit button by its ID
            var submitButton = document.getElementById("submitBtn");

            // Add a click event listener to the submit button
            submitButton.addEventListener("click", function (event) {
                // Display an alert to the user
                alert("Form submitted successfully!");
            });
        });
    </script>

</head>
<body>

<header id="header1">
    <h1 class="logo">E-Auction</h1>
    <div class="navbar">
    <ul>
            <li><a href="myProfile.php">My Profile</a></li>  
            <li><a href="viewItems.php">Online Bidding</a></li>
            <li><a href="viewAuctioner.php">Auctioner</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="home.php">Log out</a></li>
        </ul>
    </div>
</header>

<div class="centered-form">
    <h2>Add item for start bidding</h2>
    <br>
    <form method="post">
        <label for="itemName">Item Name:</label>
        <input type="text" id="f1" name="iName" placeholder="Enter the item name" required>

        <label for="itemType">Item Type:</label>
        <input type="text" id="f1" name="iType" placeholder="Enter the item type" required>

        <label for="minimumBid">Minimum Bid:</label>
        <input type="number" id="minimumBid" name="mBid" placeholder="Enter the minimum bid" required>

        <label for="closingDate">Closing Date:</label>
        <input type="date" id="closingDate" name="date" required>

        <label for="name">Your Name:</label>
        <input type="text" id="f1" name="yName" placeholder="Enter your name" required>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="yEmail" placeholder="Enter your email" required>

        <label for="message">Additional Information:</label>
        <textarea id="message" name="info" placeholder="Enter additional information" required></textarea>

        <button type="submit" name="submit" id="submitBtn">Place Bid</button>
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
