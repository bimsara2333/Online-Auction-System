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

    <h1 class="pagehead">My Profile</h1><br><br>        


    <div class="profilecontainer">
        <div class="user-details">
            <p class="userdetails">Username: user@example.com</p>
            <p class="userdetails">First Name: John</p>
            <p class="userdetails">Last Name: Doe</p>

            <a href="editProfile.php" class="contact-button">Edit</a>
        </div>
    </div>

    <div class="profilecontainer">
        <a href="addAddress.php" class="contact-button">Add New Address</a><br><br>
    <table id="data-table">
    <thead>
        <tr>
            <th>Adress line 1</th>
            <th>Adress line 1</th>
            <th>Adress line 1</th>
            <th>Postal Code</th>
        </tr>
    </thead>
    <tbody>
    <tr>
            <td>125</td>
            <td>2 nd lane</td>
            <td>colombo 07</td>
            <td>10200</td>
            <td>
                <a href="editAddress.php" class="edit-btn">Edit</a>
                <a href="addItem.php" class="delete-btn">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
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