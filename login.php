



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

    <form action="myprofile.php" method="post">
        <div class="register">
            <label for="email">E-mail</label>
            <input type="email" name="email" required><br>

            <label for="passwd">Password</label>
            <input type="password" name="passwd" required>

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