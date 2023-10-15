<?php
include 'connection.php';

if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create an SQL statement with placeholders, excluding 'id'.
    $sql = "INSERT INTO `user` (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";

    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Bind the parameters and their types, excluding 'id'.
        $stmt->bind_param('ssss', $firstName, $lastName, $email, $password);

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
            <li><a href="home.php">Home</a></li>
            <li><a href="#">Online Bidding</a></li>
            <li><a href="#">Auctioner</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
        </ul>
    </div>

    <h2>Create an Account</h2>
    <br>

    <form method="post" >
        <div class="register">
             <!-- <label for="firstName">ID</label>
            <input type="text" name="id"><br> -->

            <label for="firstName">First Name</label>
            <input type="text" name="firstName"><br>

            <label for="lastName">Last Name</label>
            <input type="text" name="lastName"><br>

            <label for="email">E-mail</label>
            <input type="email" name="email"><br>

            <label for="password">Password</label>
            <input type="password" name="password">
            <p class="description">Use 8 or more characters with a mix of letters, numbers, and symbols.</p><br>

            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name="confirmPassword"><br>

            <a href="login.php" class="link">Already have an account?</a><br>

            <button type="submit" name="submit" class="register_btn">CREATE ACCOUNT</button>
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
