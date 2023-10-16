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

    <h1 class="pagehead">Edit Profile</h1><br>

    <div class="container">
        <div class="contact">

            <section>
                <form>
                    <label for="name">Username</label>
                    <input type="text" id="username" name="username" required><br><br>

                    <label for="email">First Name</label>
                    <input type="text" id="firstName" name="firstName" required><br><br>

                    <label for="message">Last Name</label>
                    <input type="text" id="lastName" name="lastName" required><br><br>

                    <input type="submit" value="Edit Profile" class="register_btn">
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