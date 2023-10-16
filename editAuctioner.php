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
    <h2>Edit Auctioner</h2>
    <br>
    <?php
    include 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Form submission

        $aid = $_POST['aid'];
        $aname = $_POST['aname'];
        $anic = $_POST['anic'];
        $astatus = $_POST['astatus'];
        $aemail = $_POST['aemail'];
        $anumber = $_POST['anumber'];

        $sql = "UPDATE auct SET aname = '$aname', anic = '$anic', astatus = '$astatus', aemail = '$aemail', anumber = '$anumber' WHERE aid = '$aid'";
        $result = $con->query($sql);

        if (!$result) {
            die("Error in SQL query: " . $con->error);
        } else {
            header("location:viewAuctioner.php");
            exit;
        }
    } else {
        // Form rendering

        $auctionerId = isset($_GET['aid']) ? $_GET['aid'] : '';

        if (!$auctionerId) {
            die("Auctioner ID not provided.");
        }

        $sql = "SELECT * FROM auct WHERE aid = '$auctionerId'";
        $result = $con->query($sql);

        if (!$result) {
            die("Error in SQL query: " . $con->error);
        }

        $row = $result->fetch_assoc();

        if (!$row) {
            die("Auctioner not found.");
        }

        $aname = $row['aname'];
        $anic = $row['anic'];
        $astatus = $row['astatus'];
        $aemail = $row['aemail'];
        $anumber = $row['anumber'];
    }
    ?>

    <form action="#" method="post">
        <label for="aname">Name:</label>
        <input type="text" id="f1" name="aname" placeholder="Enter the item name" required value="<?php echo $aname; ?>">

        <label for="anic">NIC:</label>
        <input type="text" id="f1" name="anic" placeholder="Enter the item type" required value="<?php echo $anic; ?>">

        <label for="astatus">Status:</label>
        <input type="number" id="astatus" name="astatus" placeholder="Enter the minimum bid" required value="<?php echo $astatus; ?>">

        <label for="aemail">Email:</label>
        <input type="text" id="aemail" name="aemail" required value="<?php echo $aemail; ?>">

        <label for="anumber">Contact Number:</label>
        <input type="text" id="f1" name="anumber" placeholder="Enter your name" required value="<?php echo $anumber; ?>">

        <input type="hidden" name="aid" value="<?php echo $auctionerId; ?>">

        <button type="submit">Update</button>
    </form>
</div>

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
