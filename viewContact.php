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
            <li><a href="myProfile.php">My Profile</a></li>
            <li><a href="viewItems.php">Online Bidding</a></li>
            <li><a href="viewAuctioner.php">Auctioner</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="home.php">Log out</a></li>
        </ul>
    </div>
</header>
<br><br>
<!-- Table to fetch data -->
<table id="data-table">
    <thead>
        <tr>
            <th>Message ID</th>
            <th>Sender</th>
            <th>Email</th>
            <th>Message</th>
            <th>Action</th><!-- Add a new column for actions -->
        </tr>
    </thead>
    <tbody>
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'onlinebiding'); // Replace with your database connection details

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM contact"; // Replace 'contact' with the actual table name
    $result = mysqli_query($con, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cid = $row['cid'];
            echo "<tr>";
            echo "<td>" . $cid . "</td>";
            echo "<td>" . $row['cname'] . "</td>";
            echo "<td>" . $row['cemail'] . "</td>";
            echo "<td>" . $row['cmessage'] . "</td>";
            echo "<td><a href='editmsg.php?cid={$row['cid']}' class='edit-btn'>Edit</a> | <a href='deleteContact.php?cid={$row['cid']}' class='delete-btn'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "No messages found";
    }

    mysqli_close($con);
    ?>
    </tbody>
</table>

<br><br><br><br><br><br><br><br>

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
