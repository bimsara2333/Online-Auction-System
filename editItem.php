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
    <h2>Edit User Details</h2>
    <br>
    <form action="#" method="post">
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'onlinebiding');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['update'])) {
        // Updated variable names
        $item_id = $_POST['item_id'];  // Change $iid to $item_id
        $iName = $_POST['iName'];
        $iType = $_POST['iType'];
        $mBid = $_POST['mBid'];
        $date = $_POST['date'];
        $yName = $_POST['yName'];
        $yEmail = $_POST['yEmail'];
        $info = $_POST['info'];

        // Update the user's information in the database
        $sql = "UPDATE item SET itemName = '$iName', itemType = '$iType', minimumBid = '$mBid', closingDate = '$date', name = '$yName', email = '$yEmail', message = '$info' WHERE iid = $item_id"; // Added WHERE clause
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "Item information has been updated.";
        } else {
            echo "Error updating the item: " . mysqli_error($con);
        }
    } else {
        // Fetch item data based on item ID
        if (isset($_GET['item_id'])) {
            $item_id = $_GET['item_id'];
            $sql = "SELECT * FROM item WHERE iid = $item_id";
            $result = mysqli_query($con, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $iName = $row['itemName'];
                $iType = $row['itemType'];
                $mBid = $row['minimumBid'];
                $date = $row['closingDate'];
                $yName = $row['name'];
                $yEmail = $row['email'];
                $info = $row['message'];

                // Rest of your code remains the same
            } else {
                echo "Item not found.";
            }
        } else {
            echo "Item ID is not set in the URL.";
        }
    }

    mysqli_close($con);
    ?>
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
