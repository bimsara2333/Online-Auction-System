<?php

include('connection.php');

$errors = [];

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $sql = "SELECT * FROM sampletable WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            header("Location: userprofile.php");
            exit();
        } else {
            $errors[] = "Incorrect password. Please try again.";
        }
    } else {
        $errors[] = "User not found. Please check your email or register.";
    }

    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}

$conn->close();
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
            <li><a href="aboutUsNoLogin.php">About Us</a></li>
        </ul>
    </div>

    <h2>LOGIN</h2>
    <br>

    <form action="#">
        <div class="register">
            <label for="firstName">E-mail</label>
            <input type="text"><br>

            <label for="firstName">Password</label>
            <input type="text">

            <a href="register.php" class="link">Do not have an account?</a><br>

            <button class="register_btn">LOGIN</button>

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