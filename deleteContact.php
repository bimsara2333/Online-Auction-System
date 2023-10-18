<?php
// Check if the item ID is provided in the URL
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];

    include('connection.php');

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM contact WHERE cid = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $cid);
        mysqli_stmt_execute($stmt);

        echo "<script>alert('Contact deleted successfully.');</script>";
    
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }

    mysqli_close($con);
} else {
    echo "<script>alert('Item ID not provided.');</script>";
}

// Redirect back to the viewItems.php page after deletion
echo "<script>window.location = 'viewContact.php';</script>";
exit();
?>
