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
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Minimum Bid</th>
            <th>Closing Date</th>
            <th>Your Name</th>
            <th>Your Email</th>
            <th>Additional Information</th>
            <th>Actions</th> <!-- Add a new column for actions -->
        </tr>
    </thead>
    <tbody>
    <?php
        $con = mysqli_connect('localhost', 'root', '', 'onlinebiding'); // Replace with your database connection details

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM item"; // Replace 'items' with the actual table name
        $result = mysqli_query($con, $sql);

       if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $iid = $row['iid'];  // Add this line to retrieve the value of $iid
                echo "<tr>";
                echo "<td>" . $iid . "</td>";
                echo "<td>" . $row['iName'] . "</td>"; // Change column names accordingly
                echo "<td>" . $row['iType'] . "</td>";
                echo "<td>" . $row['mBid'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['yName'] . "</td>";
                echo "<td>" . $row['yEmail'] . "</td>";
                echo "<td>" . $row['info'] . "</td>";
                echo '<td><a href="editItem.php?iid=' . $iid . '" class="edit-btn">Edit</a> | <a href="deleteItem.php?iid=' . $iid . '" class="delete-btn">Delete</a></td>';
                echo "</tr>";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);
    ?>
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
