<?php
// Check if the item ID is provided in the URL
if (isset($_GET['adid'])) {
    $adid = $_GET['adid'];

    $con = mysqli_connect('localhost', 'root', '', 'onlinebiding');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM address WHERE adid = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $adid);
        mysqli_stmt_execute($stmt);

        echo "<script>alert('User ID not provided.');</script>";

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }

    mysqli_close($con);
} else {
    echo "<script>alert('Item ID not provided.');</script>";
}

// Redirect back to the viewItems.php page after deletion
echo "<script>window.location = 'myprofile.php';</script>";
?>
