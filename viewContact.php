<?php
include 'connection.php';

// Fetch all records from the 'contact' table
$sql = "SELECT * FROM `contact`";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Sent Messages</title>
</head>
<body>
    <h1 class="logo">E-Auction.</h1>

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

    <h1 class="pagehead">View Sent Messages</h1><br>

    <div class="container">
        <div class="contact">
            <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th></tr>";

                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['cid']}</td>";
                    echo "<td>{$row['cname']}</td>";
                    echo "<td>{$row['cemail']}</td>";
                    echo "<td>{$row['cmessage']}</td>";
                    echo "<td><a href='editContact.php?cid={$row['cid']}' class='edit-btn'>Edit</a> | <a href='deleteContact.php?cid={$row['cid']}' class='delete-btn'>Delete</a></td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No messages found";
            }

            // Close your database connection when you're done.
            $con->close();
            ?>
        </div>
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
