<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles4.css">
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
            <li><a href="viewAuctioner.php">Auctioneer</a></li> <!-- Corrected "Auctioner" to "Auctioneer" -->
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
        </ul>
    </div>
</header>

<div class="centered-form">
    <h2>Edit Auctioneer</h2> <!-- Corrected "Edit Auctioner" to "Edit Auctioneer" -->
    <br>
    <?php
        include 'connection.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form submission logic
            if (isset($_POST['aid'])) {
                $aid = $_POST['aid'];
                $aname = $_POST['aname'];
                $anic = $_POST['anic'];
                $astatus = $_POST['astatus'];
                $aemail = $_POST['aemail'];
                $anumber = $_POST['anumber'];

                if (empty($aid) || empty($aname) || empty($anic) || empty($astatus) || empty($aemail) || empty($anumber)) {
                    $errorMessage = "All the fields are required";
                } else {
                    $sql = "UPDATE auct SET aname ='$aname', anic ='$anic', astatus ='$astatus', aemail ='$aemail', anumber ='$anumber' WHERE aid='$aid'";
                    $result = $con->query($sql);

                    if (!$result) {
                        $errorMessage = "Invalid query: " . $con->error;
                    } else {
                        // Redirect after successful update
                        header("location:viewAuctioner.php");
                        exit;
                    }
                }
            } else {
                $errorMessage = "Auctioneer ID is not set in the form."; 
                
            }
        } else {
            // Form rendering logic
            if (!isset($_GET["aid"])) {
                header("location:viewAuctioner.php");
                exit;
            }
            $aid = $_GET["aid"];

            $sql = "SELECT * FROM auct WHERE aid=$aid"; 
            $result = $con->query($sql);
            $row = $result->fetch_assoc();

            if (!$row) {
                header("location:viewAuctioner.php");
                exit;
            }
            $aname = $row['aname'];
            $anic = $row['anic'];
            $astatus = $row['astatus'];
            $aemail = $row['aemail'];
            $anumber = $row['anumber'];
        }
    ?>
    <form action="#" method="post">
        <input type="hidden" name="aid" value="<?php echo $aid; ?>"> <!-- Corrected variable name from $auctionerId to $aid -->

        <label for="aname">Name:</label>
        <input type="text" id="aname" name="aname" placeholder="Enter the item name" required value="<?php echo $aname; ?>">

        <label for="anic">NIC:</label>
        <input type="text" id="anic" name="anic" placeholder="Enter the item type" required value="<?php echo $anic; ?>">

        <label for="astatus">Status:</label>
        <input type="text" id="astatus" name="astatus" placeholder="Enter the minimum bid" required value="<?php echo $astatus; ?>">

        <label for="aemail">Email:</label>
        <input type="email" id="aemail" name="aemail" placeholder="Enter your email" required value="<?php echo $aemail; ?>">

        <label for="anumber">Contact Number:</label>
        <input type="text" id="anumber" name="anumber" placeholder="Enter your name" required value="<?php echo $anumber; ?>">

        <button type="submit" name="submit">Update</button>
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
