<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $aname = $_POST['aname'];
    $anic = $_POST['anic'];
    $astatus = $_POST['astatus'];
    $aemail = $_POST['aemail'];
    $anumber = $_POST['anumber'];

    // Create an SQL statement with placeholders.
    $sql = "INSERT INTO `auct` (aname, anic, astatus, aemail, anumber) VALUES (?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Bind the parameters and their types.
        $stmt->bind_param('sssss', $aname, $anic, $astatus, $aemail, $anumber);

        if ($stmt->execute()) {
            echo "Data Inserted Successfully";
            header("Location: viewAuctioner.php");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $con->error;
    }
}

// Close your database connection when you're done.
$con->close();
?>


<!DOCTYPE html>
<!-- ... (rest of your HTML code remains the same) ... -->
Now the code should work correctly, assuming your database connection and table are set up properly.







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
    <h2>Add Auctioner</h2>
    <br>
    <form method="post">
    <label for="aname">Name:</label>
    <input type="text" id="aname" name="aname" placeholder="Enter the item name" required>

    <label for="anic">NIC:</label>
    <input type="text" id="anic" name="anic" placeholder="Enter the item type" required>

    <label for="astatus">Status:</label>
    <input type="number" id="astatus" name="astatus" placeholder="Enter the minimum bid" required>

    <label for="aemail">Email:</label>
    <input type="email" id="aemail" name="aemail" required>

    <label for="anumber">Contact Number:</label>
    <input type="text" id="anumber" name="anumber" placeholder="Enter your name" required>

    <button type="submit" name="submit">Add</button>
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
