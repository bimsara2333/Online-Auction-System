<?php
include 'connection.php';

if (isset($_POST['cname']) && isset($_POST['cemail']) && isset($_POST['cmessage'])) {
    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $cmessage = $_POST['cmessage'];
   
    // Create an SQL statement with placeholders, excluding 'id'.
    $sql = "INSERT INTO `contact` (cname, cemail, cmessage) VALUES (?, ?, ?)";

    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Bind the parameters and their types, excluding 'id'.
        $stmt->bind_param('sss', $cname, $cemail, $cmessage);

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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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

    <h1 class="pagehead">Contact Us</h1><br>

    <div class="container">
        <div class="contact">
            <p>We're here to help. If you have any questions, concerns, or feedback, please don't hesitate to reach out to us. We value your input.</p>
            <br>
            <section>
                <h3>Contact Information</h3><br>
                <p>
                    <strong>Address:</strong> 123 Auction Way, City, State, Zip Code<br>
                    <strong>Phone:</strong> (555) 123-4567<br>
                    <strong>Email:</strong> <a href="mailto:info@yourauctionwebsite.com">info@yourauctionwebsite.com</a>
                </p>
            </section>
            <br>

            <section>
                <h3>Customer Support</h3><br>
                <p>If you require immediate assistance, our customer support team is available during our business hours:</p>
                <p>
                    <strong>Business Hours:</strong><br>
                    Monday-Friday: 9:00 AM - 6:00 PM<br>
                    Saturday: 10:00 AM - 4:00 PM<br>
                    Sunday: Closed
                </p>
            </section>
            <br>

            <section>
                <h3>Contact Form</h3><br>
                <form method="post">
                    <label for="cname">Your Name:</label>
                    <input type="text" id="cname" name="cname" required><br><br>

                    <label for="cemail">Your Email:</label>
                    <input type="email" id="cemail" name="cemail" required><br><br>

                    <label for="cmessage">Message:</label>
                    <textarea id="cmessage" name="cmessage" rows="5" required></textarea><br><br>

                    <input type="submit" name="submit" value="Submit" class="register_btn">
                </form>
            </section>
            <br>

        </div>
        <div class="image">
            <img src="./images/contactus.jpg" alt="contactus" class="contactusimg">
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
