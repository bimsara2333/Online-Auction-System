<!DOCTYPE html>
<html>
<head>
    <title>Display User</title>
</head>
<body>
    <button><a href="user.php">Add User</a></button>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Operation</th> <!-- Corrected "Operartion" to "Operation" -->
            </tr>
        </thead>
        <tbody>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'project001'); // Replace with your database connection details

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM user";
            $result = mysqli_query($con, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['uid'] . "</td>"; // Change 'user_id' to the actual column name in your database
                    echo "<td>" . $row['firstName'] . "</td>"; // Change 'first_name' to the actual column name in your database
                    echo "<td>" . $row['lastName'] . "</td>"; // Change 'last_name' to the actual column name in your database
                    echo "<td>" . $row['email'] . "</td>"; // Change 'email' to the actual column name in your database
                    echo "<td>" . $row['password'] . "</td>"; // Change 'password' to the actual column name in your database
                    echo "<td><a href='edit_user.php?id=" . $row['uid'] . "'>Edit</a> | <a href='delete_user.php?id=" . $row['uid'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }

            mysqli_close($con);
            ?>
        </tbody>
    </table>
</body>
</html>
<!-- old-->