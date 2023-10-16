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
<a href="addAuctioner.php" class="add-item-btn">Add new Auctioner</a>
<br><br>
<!-- Table to fetch data -->
<table id="data-table">
    <thead>
        <tr>
            <th>Auct ID</th>
            <th>Name</th>
            <th>NIC</th>
            <th>Status</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Actions</th> <!-- Add a new column for actions -->
        </tr>
    </thead>
    <tbody>
    <?php
        $con = mysqli_connect('localhost', 'root', '', 'onlinebiding'); // Replace with your database connection details

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM auct"; // Replace 'auct' with the actual table name
        $result = mysqli_query($con, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $aid = $row['aid'];  // Assuming the column name is 'aid'
                $name = $row['aname'];  // Change column names accordingly
                echo "<tr>";
                echo "<td>" . $aid . "</td>";
                echo "<td>" . $name . "</td>";
                echo "<td>" . $row['anic'] . "</td>";
                echo "<td>" . $row['astatus'] . "</td>";
                echo "<td>" . $row['aemail'] . "</td>";
                echo "<td>" . $row['anumber'] . "</td>";
                echo '<td><a href="editAuctioner.php?aid=' . $aid . '"  class="edit-btn">Edit</a> | <a href="deleteAuctioner.php?aid=' . $aid . '" class="delete-btn">Delete</a></td>';
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
