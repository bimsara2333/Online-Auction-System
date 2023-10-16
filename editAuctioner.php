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
            <li><a href="viewAuctioner.php">Auctioner</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
        </ul>
    </div>
</header>

<div class="centered-form">
    <h2>Edit Auctioner</h2>
    <br>
    <form action="#" method="post">
        <?php
        include 'connection.php';  // Make sure to include your database connection configuration

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form submission

            // Check if the necessary fields are set in the $_POST array
            if (isset($_POST['aid'])) {
                // Retrieve form data
                $aid = $_POST['aid'];
                $aname = $_POST['aname'];
                $anic = $_POST['anic'];
                $astatus = $_POST['astatus'];
                $aemail = $_POST['aemail'];
                $anumber = $_POST['anumber'];

                // Perform the update query (replace 'YOUR_AUCTIONER_ID' with the actual auctioner ID)
                $sql = "UPDATE auct SET aname = '$aname', anic = '$anic', astatus = '$astatus', aemail = '$aemail', anumber = '$anumber' WHERE auctioner_id = '$aid'";
                $result = $con->query($sql);

                if (!$result) {
                    $errorMessage = "Invalid query: " . $con->error;
                } else {
                    // Redirect after a successful update
                    header("location:viewAuctioner.php");
                    exit;
                }
            } else {
                $errorMessage = "All the fields are required.";
            }
        } else {
            // Form rendering

            // Fetch existing auctioner details to display in the form (replace 'aid' with the actual auctioner ID)
            $auctionerId = 'aid'; // Replace with the actual auctioner ID
            $sql = "SELECT * FROM auct WHERE aid = '$auctionerId'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();

            if ($row) {
                $aname = $row['aname'];
                $anic = $row['anic'];
                $astatus = $row['astatus'];
                $aemail = $row['aemail'];
                $anumber = $row['anumber'];
            } else {
                $errorMessage = "Auctioner not found.";
            }
        }
        ?>
        <label for="aname">Name:</label>
        <input type="text" id="f1" name="aname" placeholder="Enter the item name" required value="<?php echo isset($aname) ? $aname : ''; ?>">

        <label for="anic">NIC:</label>
        <input type="text" id="f1" name="anic" placeholder="Enter the item type" required value="<?php echo isset($anic) ? $anic : ''; ?>">

        <label for="astatus">Status:</label>
        <input type="number" id="astatus" name="astatus" placeholder="Enter the minimum bid" required value="<?php echo isset($astatus) ? $astatus : ''; ?>">

        <label for="aemail">Email:</label>
        <input type="text" id="aemail" name="aemail" required value="<?php echo isset($aemail) ? $aemail : ''; ?>">

        <label for="anumber">Contact Number:</label>
        <input type="text" id="f1" name="anumber" placeholder="Enter your name" required value="<?php echo isset($anumber) ? $anumber : ''; ?>">


        <input type="hidden" name="aid" value="<?php echo $auctionerId; ?>"> <!-- Add a hidden field for auctioner ID -->

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
