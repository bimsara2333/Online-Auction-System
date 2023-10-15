<?php

include('connection.php');

$errors = [];

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['passwd'];

    $sql = "SELECT * FROM user WHERE email=? AND password=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        header('location: afterLogin.php');
    } else {
        echo "<script>alert('The E-mail and the password do not match.')</script>";
    }

    mysqli_stmt_close($stmt);
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
            <li><a href="aboutUsNoLogin.php">About Us</a></li>
        </ul>
    </div>

    <h2>LOGIN</h2>
    <br>

    <form action="#">
        <div class="register">
            <label for="email">E-mail</label>
            <input type="text" name="email"><br>

            <label for="passwd">Password</label>
            <input type="text" name="passwd">

            <a href="register.php" class="link">Do not have an account?</a><br>

            <button class="register_btn" type="submit" name="submit">Login</button>

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