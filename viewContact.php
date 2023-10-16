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
            <th>Message</th><!-- Add a new column for actions -->
        </tr>
    </thead>
    <tbody>
    <?php
        $con = mysqli_connect('localhost', 'root', '', 'onlinebiding'); // Replace with your database connection details

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM contact"; // Replace 'items' with the actual table name
        $result = mysqli_query($con, $sql);

<<<<<<< HEAD
       if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cid = $row['cid'];  // Add this line to retrieve the value of $iid
                echo "<tr>";
                echo "<td>" . $cid . "</td>";
                echo "<td>" . $row['cname'] . "</td>"; // Change column names accordingly
                echo "<td>" . $row['cemail'] . "</td>";
                echo "<td>" . $row['cmessage'] . "</td>";
                echo "<td><a href='editContact.php?cid={$row['cid']}' class='edit-btn'>Edit</a> | <a href='deleteContact.php?cid={$row['cid']}' class='delete-btn'>Delete</a></td>";
                echo "</tr>";
=======
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['cid']}</td>";
                    echo "<td>{$row['cname']}</td>";
                    echo "<td>{$row['cemail']}</td>";
                    echo "<td>{$row['cmessage']}</td>";
                    echo "<td><a href='editmsg.php?cid={$row['cid']}' class='edit-btn'>Edit</a> | <a href='deleteContact.php?cid={$row['cid']}' class='delete-btn'>Delete</a></td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No messages found";
>>>>>>> 55697008a8c3047e05ac350e8cab29e7fbc60de1
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
