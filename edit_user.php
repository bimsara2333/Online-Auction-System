<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'project001');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the user ID from the URL query parameter
    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];

        // Retrieve the user information from the database
        $sql = "SELECT * FROM user WHERE uid = $user_id";
        $result = mysqli_query($con, $sql);

        if ($result && $row = mysqli_fetch_assoc($result)) {
            // Display the user's information for editing
            echo "<form action='update_user.php' method='POST'>";
            echo "User ID: " . $row['uid'] . "<br>";
            echo "First Name: <input type='text' name='first_name' value='" . $row['firstName'] . "'><br>";
            echo "Last Name: <input type='text' name='last_name' value='" . $row['lastName'] . "'><br>";
            echo "Email: <input type='text' name='email' value='" . $row['email'] . "'><br>";
            echo "Password: <input type='password' name='password' value='" . $row['password'] . "'><br>";
            echo "<input type='hidden' name='user_id' value='" . $row['uid'] . "'>";
            echo "<input type='submit' name='update' value='Update'>";
            echo "</form>";
        } else {
            echo "User not found or an error occurred.";
        }
    } else {
        echo "User ID not provided.";
    }

    mysqli_close($con);
    ?>
</body>
</html>
