<?php
// Check if the user ID is provided in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Create a database connection
    $con = mysqli_connect('localhost', 'root', '', 'project001'); // Replace with your database connection details

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Execute a DELETE query to remove the user from the database
    $sql = "DELETE FROM user WHERE uid = $user_id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // User deleted successfully
        echo "User with ID $user_id has been deleted.";
    } else {
        // Error deleting the user
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    // User ID not provided in the URL
    echo "User ID not provided.";
}
?>
