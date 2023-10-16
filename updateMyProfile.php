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

    <h2>Update my Account</h2>
    <br>

    <?php
        include 'connection.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form submission logic
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $username = $_POST['email'];
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];

                if (empty($id) || empty($username) || empty($firstName) || empty($lastName)) {
                    $errorMessage = "All the fields are required";
                } else {
                    $sql = "UPDATE user SET email ='$username', firstName ='$firstName', lastName ='$lastName' WHERE id='$id'";
                    $result = $con->query($sql);

                    if (!$result) {
                        $errorMessage = "Invalid query: " . $con->error;
                    } else {
                        // Redirect after successful update
                        header("location:myprofile.php");
                        exit;
                    }
                }
            } else {
                $errorMessage = "ID is not set in the form.";
            }
        } else {
            // Form rendering logic
            if (!isset($_GET["id"])) {
                header("location:myprofile.php");
                exit;
            }
            $id = $_GET["id"];

            $sql = "SELECT * FROM user WHERE id=$id";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();

            if (!$row) {
                header("location:myprofile.php");
                exit;
            }
            $username = $row['email'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            
        }
        ?>

    <form method="post" >
        <div class="register">
            
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="firstName" value="<?php echo $firstName; ?>">First Name</label>
            <input type="text" name="firstName" value="<?php echo $firstName; ?>"><br>

            <label for="lastName" value="<?php echo $lastName; ?>">Last Name</label>
            <input type="text" name="lastName" value="<?php echo $lastName; ?>"><br>

            <label for="email" value="<?php echo $firstName; ?>">E-mail</label>
            <input type="email" name="email" value="<?php echo $username; ?>"><br><br>

            <button type="submit" name="submit" class="register_btn">Update Account</button>

        </div>
    </form>

    <br><br>

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
