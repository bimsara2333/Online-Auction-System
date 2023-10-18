<?php
// Check if the item ID is provided in the URL
if (isset($_GET['iid'])) {
    $iid = $_GET['iid'];

    $con = mysqli_connect('localhost', 'root', '', 'onlinebiding');

    if (!$con) {
        die("<script>alert('Connection failed: " . mysqli_connect_error() . "');</script>");
    }

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM item WHERE iid = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $iid);
        mysqli_stmt_execute($stmt);

        echo "<script>alert('Item deleted successfully.');</script>";

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }

    mysqli_close($con);
} else {
    echo "<script>alert('Item ID not provided.');</script>";
}

// Redirect back to the viewItems.php page after deletion
echo "<script>window.location = 'viewItems.php';</script>";
exit();
