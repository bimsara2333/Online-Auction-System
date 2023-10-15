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

    <h1 class="pagehead">Contact Us</h1><br>

    <div class="container">
        <div class="contact">
            <p>We're here to help. If you have any questions, concerns, or feedback, please don't hesitate to reach out to us. We value your input.</p>
            <br>
            <section>
                <h3>Contact Information</h3><br>
                <p>
                    <strong>Address:</strong> 123 Auction Way, City, State, Zip Code<br>
                    <strong>Phone:</strong> (555) 123-4567<br>
                    <strong>Email:</strong> <a href="mailto:info@yourauctionwebsite.com">info@yourauctionwebsite.com</a>
                </p>
            </section>
            <br>

            <section>
                <h3>Contact Form</h3><br>
                <form>
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required><br><br>

                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea><br><br>

                    <input type="submit" value="Submit" class="register_btn">
                </form>
            </section>
            <br>

            <section>
                <h3>Customer Support</h3><br>
                <p>If you require immediate assistance, our customer support team is available during our business hours:</p>
                <p>
                    <strong>Business Hours:</strong><br>
                    Monday-Friday: 9:00 AM - 6:00 PM<br>
                    Saturday: 10:00 AM - 4:00 PM<br>
                    Sunday: Closed
                </p>
            </section>
        </div>
        <div class="image">
            <img src="./images/contactus.jpg" alt="contactus" class="contactusimg">
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