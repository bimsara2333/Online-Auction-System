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
            <li><a href="myProfile.php">My Profile</a></li>
            <li><a href="viewItems.php">Online Bidding</a></li>
            <li><a href="viewAuctioner.php">Auctioner</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
        </ul>
    </div>

    <h1 class="pagehead">Edit Address</h1><br>

    <div class="container">
        <div class="contact">

            <section>
                <form>
                    <label for="name">Address Line 1</label>
                    <input type="text" id="address1" name="address1" required><br><br>

                    <label for="email">Address Line 2</label>
                    <input type="text" id="address2" name="address2" required><br><br>

                    <label for="message">Address Line 3</label>
                    <input type="text" id="address3" name="address3" required><br><br>

                    <label for="message">Postal Code</label>
                    <input type="text" id="postcode" name="postcode" required><br><br>

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