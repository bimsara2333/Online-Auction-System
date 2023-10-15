<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles3.css">
    <title>E-Auction</title>
</head>
<body>

<header id="header1">
    <h1 class="logo">E-Auction</h1>
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
</header>
<a href="addItem.php" class="add-item-btn">Add new item</a>
<br><br>
<!-- Table to fetch data -->
<table id="data-table">
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Minimum Bid</th>
            <th>Closing Date</th>
            <th>Your Name</th>
            <th>Your Email</th>
            <th>Additional Information</th>
        </tr>
    </thead>
    <tbody>
    <tr>
            <td>Sample Item 1</td>
            <td>Electronics</td>
            <td>$100</td>
            <td>2023-11-01</td>
            <td>John Doe</td>
            <td>john.doe@example.com</td>
            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
            <td>
                <a href="editItem.php" class="edit-btn">Edit</a>
                <a href="addItem.php" class="delete-btn">Delete</a>
            </td>
        </tr>
    </tbody>
</table>

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
