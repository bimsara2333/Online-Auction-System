<?php
// Check if the item ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include('connection.php');

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM contact WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        echo "Item deleted successfully.";

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Item ID not provided.";
}

// Redirect back to the viewItems.php page after deletion
header("Location: viewContact.php");
exit();
?>
