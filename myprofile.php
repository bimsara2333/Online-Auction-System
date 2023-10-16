

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

    <h1 class="pagehead">My Profile</h1><br><br>        


    <div class="profilecontainer">
    <table id="data-table">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
    </thead>
    <tbody>

    <?php
        include('connection.php');

        $sql = "SELECT * FROM user"; // Replace 'items' with the actual table name
        $result = mysqli_query($con, $sql);

       if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];  // Add this line to retrieve the value of $iid
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $row['email'] . "</td>"; // Change column names accordingly
                echo "<td>" . $row['firstName'] . "</td>";
                echo "<td>" . $row['lastName'] . "</td>";
                echo '<td><a href="updateMyProfile.php?id=' . $id . '" class="edit-btn">Edit</a> | <a href="deleteMyProfile.php?id=' . $id . '" class="delete-btn">Delete</a></td>';
                echo "</tr>";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);
    ?>
    
    </tbody>
</table>
    </div>

    <div class="profilecontainer">
        <a href="addAddress.php" class="contact-button">Add New Address</a><br><br>
    <table id="data-table">
    <thead>
        <tr>
            <th>Address ID</th>
            <th>Adress line 1</th>
            <th>Adress line 2</th>
            <th>Adress line 3</th>
            <th>Postal Code</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $con = mysqli_connect('localhost', 'root', '', 'onlinebiding'); // Replace with your database connection details

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM address"; // Replace 'items' with the actual table name
        $result = mysqli_query($con, $sql);

       if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $adid = $row['adid'];  // Add this line to retrieve the value of $iid
                echo "<tr>";
                echo "<td>" . $adid . "</td>";
                echo "<td>" . $row['address1'] . "</td>"; // Change column names accordingly
                echo "<td>" . $row['address2'] . "</td>";
                echo "<td>" . $row['address3'] . "</td>";
                echo "<td>" . $row['pcode'] . "</td>";
                echo '<td><a href="editAddress.php?adid=' . $adid . '" class="edit-btn">Edit</a> | <a href="deleteaddress.php?adid=' . $adid . '" class="delete-btn">Delete</a></td>';
                echo "</tr>";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);
    ?>
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