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

    <h1 class="pagehead">Add New Address</h1><br>

    <div class="container">
        <div class="contact">
            <section>
                <?php
                if (isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['address3']) && isset($_POST['pcode'])) {
                    include 'connection.php'; // Include your database connection script.

                    $address1 = $_POST['address1'];
                    $address2 = $_POST['address2'];
                    $address3 = $_POST['address3'];
                    $pcode = $_POST['pcode'];

                    // Create an SQL statement with placeholders for your database table (replace 'your_table' with the actual table name).
                    $sql = "INSERT INTO address (address1, address2, address3, pcode) VALUES (?, ?, ?, ?)";
                    $stmt = $con->prepare($sql);

                    if ($stmt) {
                        // Bind the parameters and their types.
                        $stmt->bind_param('ssss', $address1, $address2, $address3, $pcode);

                        if ($stmt->execute()) {
                            echo "Address Inserted Successfully";
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
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <label for="address1">Address Line 1</label>
                    <input type="text" id="address1" name="address1" required><br><br>

                    <label for="address2">Address Line 2</label>
                    <input type="text" id="address2" name="address2" required><br><br>

                    <label for="address3">Address Line 3</label>
                    <input type="text" id="address3" name="address3" required><br><br>

                    <label for="pcode">Postal Code</label>
                    <input type="text" id="pcode" name="pcode" required><br><br>

                    <input type="submit" value="Add Address" class="register_btn">
                </form>
            </section>
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
