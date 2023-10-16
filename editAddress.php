<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Address</title>
</head>

<body>
    <h1 class="logo">E-Auction</h1>

    <div class="navbar">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="myProfile.php">My Profile</a></li>
            <li><a href="viewItems.php">Online Bidding</a></li>
            <li><a href="viewAuctioner.php">Auctioneer</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
        </ul>
    </div>

    <h1 class="pagehead">Edit Address</h1><br>

    <div class="container">
        <div class="contact">
            <section>
                <form method="post">
                    <?php
                    include 'connection.php';

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_POST['adid'])) {
                            $adid = $_POST['adid'];
                            $address1 = $_POST['address1'];
                            $address2 = $_POST['address2'];
                            $address3 = $_POST['address3'];
                            $pcode = $_POST['pcode'];

                            if (empty($address1) || empty($address2) || empty($address3) || empty($pcode)) {
                                $errorMessage = "All fields are required";
                            } else {
                                $stmt = $con->prepare("UPDATE address SET address1=?, address2=?, address3=?, pcode=? WHERE adid=?");

                                if ($stmt) {
                                    $stmt->bind_param("ssssi", $address1, $address2, $address3, $pcode, $adid);

                                    if ($stmt->execute()) {
                                        // Redirect using PHP header
                                        header("Location: myProfile.php");
                                        exit;
                                    } else {
                                        $errorMessage = "Error updating the address: " . $stmt->error;
                                    }
                                    $stmt->close();
                                } else {
                                    $errorMessage = "Error preparing the statement: " . $con->error;
                                }
                            }
                        } else {
                            $errorMessage = "adid is not set in the form.";
                        }
                    } else {
                        // Form rendering
                        if (!isset($_GET["adid"])) {
                            header("Location: myProfile.php");
                            exit;
                        }
                        $adid = $_GET["adid"];
                        $sql = "SELECT * FROM address WHERE adid=$adid";
                        $result = $con->query($sql);
                        $row = $result->fetch_assoc();
                        if (!$row) {
                            header("Location: myProfile.php");
                            exit;
                        }
                        $address1 = $row['address1'];
                        $address2 = $row['address2'];
                        $address3 = $row['address3'];
                        $pcode = $row['pcode'];
                    }
                    ?>
                    <input type="hidden" name="adid" value="<?php echo $adid; ?>">
                    <label for="address1">Address Line 1</label>
                    <input type="text" id="address1" name="address1" value="<?php echo $address1; ?>" required><br><br>
                    <label for="address2">Address Line 2</label>
                    <input type="text" id="address2" name="address2" value="<?php echo $address2; ?>" required><br><br>
                    <label for="address3">Address Line 3</label>
                    <input type="text" id="address3" name="address3" value="<?php echo $address3; ?>" required><br><br>
                    <label for="pcode">Postal Code</label>
                    <input type="text" id="pcode" name="pcode" value="<?php echo $pcode; ?>" required><br><br>
                    <input type="submit" value="Edit Address" class="register_btn">
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
