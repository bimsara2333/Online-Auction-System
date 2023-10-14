<?php
include 'connection.php';

if(isset($_POST['submit'])){
    $id = $_POST['uid'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `user` (uid,firstName, lastName, email, password) VALUES (?,?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param($uid, $firstName, $lastName, $email, $password);
        if ($stmt->execute()) {
            echo "Data Inserted Successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <form method="post">
        <label for="uid">User ID:</label>
        <input type="text" id="uid" name="uid" required><br><br>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
