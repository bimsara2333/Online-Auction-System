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
        <h2>Edit Message</h2>
        <br>
        <?php
        include 'connection.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form submission logic
            if (isset($_POST['cid'])) {
                $cid = $_POST['cid'];
                $cname = $_POST['cname'];
                $cemail = $_POST['cemail'];
                $cmessage = $_POST['cmessage'];

                if (empty($cmessage)) {
                    $errorMessage = "Message field is required";
                } else {
                    $sql = "UPDATE contact SET cmessage ='$cmessage' WHERE id='$cid'";
                    $result = $con->query($sql);

                    if (!$result) {
                        $errorMessage = "Invalid query: " . $con->error;
                    } else {
                        // Redirect after successful update
                        header("location:viewContact.php");
                        exit;
                    }
                }
            } else {
                $errorMessage = "Item ID is not set in the form.";
            }
        } else {
            // Form rendering logic
            if (!isset($_GET["cid"])) {
                header("location:viewContact.php");
                exit;
            }
            $cid = $_GET["cid"];

            $sql = "SELECT * FROM contact WHERE cid=$cid";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();

            if (!$row) {
                header("location:viewContact.php");
                exit;
            }
            $cname = $row['cname'];
            $cemail = $row['cemail'];
            $cmessage = $row['cmessage'];
        }
        ?>
        <form action="editContact.php" method="post">

            <input type="hidden" name="id" value="<?php echo $iid; ?>">

                 <label for="cname">Your Name:</label>
                 <input type="text" id="cname" name="cname" required value="<?php echo $yName; ?>"><br><br>

                 <label for="cemail">Your Email:</label>
                <input type="email" id="cemail" name="cemail" required value="<?php echo $yName; ?>"><br><br>

                <label for="cmessage">Message:</label>
                <textarea id="cmessage" name="cmessage" rows="5" required value="<?php echo $yName; ?>"></textarea><br><br>

                <input type="submit" name="submit" value="Update Message" class="register_btn">

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
