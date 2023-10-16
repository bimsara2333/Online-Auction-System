<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles4.css">
    <title>E-Auction</title>
</head>

<body>

    <header id="header1">
        <!-- Header content... -->
    </header>

    <div class="centered-form">
        <h2>Edit Contact Details</h2>
        <br>
       
        <?php
        include 'connection.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form submission logic
            if (isset($_POST['cid'])) {
                $cid = $_POST['cid'];
                $cname = $_POST['cname'];
                $cemail = $_POST['cemail'];
                $cmessage = $_POST['cmessage'];
                
                if (empty($cid) || empty($cname) || empty($cemail) || empty($cmessage) ) {
                    $errorMessage = "All the fields are required";
                } else {
                    $sql = "UPDATE contact SET cname ='$cname', cemail ='$cemail', cmessage ='$cmessage' WHERE cid='$cid'";
                    $result = $con->query($sql);

                    if (!$result) {
                        $errorMessage = "Invalid query: " . $con->error;
                    } else {
                        // Redirect after successful update
                        header("location:viewContact.php");
                        exit;
                    }
                }
            } else {
                $errorMessage = "Item ID is not set in the form.";
            }
        } else {
            // Form rendering logic
            if (!isset($_GET["cid"])) {
                header("location:viewContact.php");
                exit;
            }
            $cid = $_GET["cid"];

            $sql = "SELECT * FROM contact WHERE cid=$cid";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();

            if (!$row) {
                header("location:viewContact.php");
                exit;
            }
            $cname = $row['cname'];
            $cemail = $row['cemail'];
            $cmessage = $row['cmessage'];
           
        }
        ?>

            <form action="#" method="post">

            <input type="hidden" name="cid" value="<?php echo $cid; ?>">

            <label for="cname">Your Name:</label>
            <input type="text" id="cname" name="cname" value="<?php echo $cname; ?>" required><br><br>

            <label for="cemail">Your Email:</label>
            <input type="email" id="cemail" name="cemail" value="<?php echo $cemail; ?>" required><br><br>

            <label for="cmessage">Message:</label>
            <textarea id="cmessage" name="cmessage" rows="5" required><?php echo $cmessage; ?></textarea><br><br>

            <input type="submit" name="submit" value="Submit" class="register_btn">
        </form>

    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2023 E-Auction. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </footer>

</body>

</html>
