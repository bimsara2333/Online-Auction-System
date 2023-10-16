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
        <h2>Edit Item Details</h2>
        <br>
        <?php
        include 'connection.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form submission logic
            if (isset($_POST['submit'])) {
                $cname = $_POST['cname'];
                $cemail = $_POST['cemail'];
                $cmessage = $_POST['cmessage'];

                if (!empty($cname) && !empty($cemail) && !empty($cmessage)) {
                    // Insert the data into the 'contact' table
                    $sql = "INSERT INTO `contact` (cname, cemail, cmessage) VALUES ('$cname', '$cemail', '$cmessage')";
                    $result = $con->query($sql);

                    if ($result) {
                        echo "Message sent successfully!";
                    } else {
                        echo "Error sending message: " . $con->error;
                    }
                } else {
                    echo "All fields are required!";
                }
            }
        }

        // Fetch data if contact_id is provided in the URL
        $contact_id = $_GET['contact_id'];
        $sql_fetch = "SELECT * FROM `contact` WHERE id = $contact_id";
        $result_fetch = $con->query($sql_fetch);

        if ($result_fetch->num_rows > 0) {
            $row = $result_fetch->fetch_assoc();
            $cname_value = $row['cname'];
            $cemail_value = $row['cemail'];
            $cmessage_value = $row['cmessage'];
        } else {
            echo "Error fetching data: " . $con->error;
        }
        ?>

        <form method="post" action="">
            <label for="cname">Your Name:</label>
            <input type="text" id="cname" name="cname" value="<?php echo $cname_value; ?>" required><br><br>

            <label for="cemail">Your Email:</label>
            <input type="email" id="cemail" name="cemail" value="<?php echo $cemail_value; ?>" required><br><br>

            <label for="cmessage">Message:</label>
            <textarea id="cmessage" name="cmessage" rows="5" required><?php echo $cmessage_value; ?></textarea><br><br>

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
