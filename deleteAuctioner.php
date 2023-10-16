<?php
include 'connection.php';

// ... rest of your code ...

// deleteAuctioner.php

// Check if the name parameter is set in the URL
if (isset($_GET['aid'])) {
    $aid = mysqli_real_escape_string($con, $_GET['aid']);

    // Delete the row from the database
    $sql = "DELETE FROM auct WHERE aid = '$aid'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Redirect to viewAuctioner.php after successful deletion
        header("Location: viewAuctioner.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    // Handle the case where 'name' parameter is not set
    echo "Invalid request";
}
?>
