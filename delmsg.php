<?php
include 'connection.php';

// Check if the cid parameter is set in the URL
if(isset($_GET['cid'])) {
    $cid = $_GET['cid'];

    // Delete the record from the 'contact' table
    $deleteSql = "DELETE FROM `contact` WHERE `cid` = $cid";
    $deleteResult = $con->query($deleteSql);

    if($deleteResult) {
        // Redirect back to viewContact.php after deletion
        header("Location: viewContact.php");
        exit();
    } else {
        echo "Error deleting record: " . $con->error;
    }
} else {
    echo "Invalid request";
}

// Close your database connection when you're done.
$con->close();
?>
