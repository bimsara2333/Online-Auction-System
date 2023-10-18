<?php

include('connection.php');

$errors = [];

if (isset($_POST['submit'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $email = $_POST['email'];
    $passwords = $_POST['password'];
    $cpassword = $_POST['confirmPassword'];

    $fName = htmlspecialchars($fName);
    $lName = htmlspecialchars($lName);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ($passwords !== $cpassword) {
        $errors[] = "Password and Confirm Password do not match.";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($passwords, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (firstName, lastName, email, password) 
                VALUES ('$fName', '$lName', '$email', '$hashedPassword')";

        if ($con->query($sql) === TRUE) {
            // Use JavaScript to display an alert to the user
            echo '<script>alert("Profile created successfully");</script>';
            header("Location: afterLogin.php");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get the submit button by its ID
            var submitButton = document.getElementById("submitBtn");

            // Add a click event listener to the submit button
            submitButton.addEventListener("click", function (event) {
                // Display an alert to the user
                alert("Form submitted successfully!");
            });
        });
    </script>
</head>

<body>
    <h1 class="logo">E-Auction.</h1>

    <div class="navbar">
    <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="aboutUsNoLogin.php">About Us</a></li>
            <li><a href="myProfile.php">My Profile</a></li>
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

            <button type="submit" name="submit" class="register_btn" id="submitBtn">Create Account</button>

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
