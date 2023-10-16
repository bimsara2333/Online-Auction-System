<?php
// Establish a database connection (you may need to modify this with your database credentials)
include('connection.php');

// Handle the form submission
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['passwd'];

    // Query the database to check if the user exists and the password is correct
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            // Password is correct, redirect to afterLogin.php
            header("Location: afterLogin.php");
            exit();
        } else {
            $error_message = "Incorrect password. Please try again.";
        }
    } else {
        $error_message = "User not found. Please register if you don't have an account.";
    }
}

// Close the database connection
mysqli_close($con);
?>

<!-- Add this code to display the error message -->
<?php if (isset($error_message)) : ?>
    <div class="error-message">
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>



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

    <form action="afterLogin.php" method="post">
        <div class="register">
            <label for="email">E-mail</label>
            <input type="text" name="email"><br>

            <label for="passwd">Password</label>
            <input type="password" name="passwd">

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