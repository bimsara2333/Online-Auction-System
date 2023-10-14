<?php
if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $con = mysqli_connect('localhost', 'root', '', 'project001');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the user's information in the database
    $sql = "UPDATE user SET firstName = '$first_name', lastName = '$last_name', email = '$email', password = '$password' WHERE uid = $user_id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "User with ID $user_id has been updated.";
    } else {
        echo "Error updating the user: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Update button not pressed.";
}
?>
