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
                <li><a href="viewAuctioner.php">Auctioner</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="contactUs.php">Contact Us</a></li>
            </ul>
        </div>
    </header>

    <div class="centered-form">
        <h2>Edit Item Details</h2>
        <br>
        <form action="#" method="post">
        <?php
include 'connection.php';  // Make sure to include your database connection configuration

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form submission

    // Check if the "iid" key is set in the $_POST array
    if (isset($_POST['iid'])) {
        // Retrieve form data
        $iid = $_POST['iid'];
        $iName = $_POST['iName'];
        $iType = $_POST['iType'];
        $mBid = $_POST['mBid'];
        $date = $_POST['date'];
        $yName = $_POST['yName'];
        $yEmail = $_POST['yEmail'];
        $info = $_POST['info'];

        do {
            // Check if variables are empty
            if (empty($iid) || empty($iName) || empty($iType) || empty($mBid) || empty($date) || empty($yName) || empty($yEmail) || empty($info)) {
                $errorMessage = "All the fields are required";
                break;
            }

            // Perform the update query
            $sql = "UPDATE item SET iName ='$iName', iType ='$iType', mBid ='$mBid', date ='$date', yName ='$yName', yEmail ='$yEmail', info ='$info' WHERE iid='$iid'";
            $result = $con->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query: " . $con->error;
                break;
            }

            // Redirect after successful update
            header("location:viewItems.php");
            exit;

        } while (false);
    } else {
        $errorMessage = "Item ID is not set in the form.";
    }
} else {
    // Form rendering

    if (!isset($_GET["iid"])) {
        header("location:viewItems.php");
        exit;
    }
    $iid = $_GET["iid"];

    $sql = "SELECT * FROM item WHERE iid=$iid";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:viewItems.php");
        exit;
    }
    $iName = $row['iName'];
    $iType = $row['iType'];
    $mBid = $row['mBid'];
    $date = $row['date'];
    $yName = $row['yName'];
    $yEmail = $row['yEmail'];
    $info = $row['info'];
}
?>
            <label for="itemName">Item Name:</label>
            <input type="text" id="f1" name="iName" placeholder="Enter the item name" required value="<?php echo $iName; ?>">

            <label for="itemType">Item Type:</label>
            <input type="text" id="f1" name="iType" placeholder="Enter the item type" required value="<?php echo $iType; ?>">

            <label for="minimumBid">Minimum Bid:</label>
            <input type="number" id="minimumBid" name="mBid" placeholder="Enter the minimum bid" required value="<?php echo $mBid; ?>">

            <label for="closingDate">Closing Date:</label>
            <input type="date" id="closingDate" name="date" required value="<?php echo $date; ?>">

            <label for="name">Your Name:</label>
            <input type="text" id="f1" name="yName" placeholder="Enter your name" required value="<?php echo $yName; ?>">

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="yEmail" placeholder="Enter your email" required value="<?php echo $yEmail; ?>">

            <label for="message">Additional Information:</label>
            <textarea id="message" name="info" placeholder="Enter additional information" required><?php echo $info; ?></textarea>

            <button type="submit" name="submit">Update</button>

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
