<?php

$con = new mysqli('localhost', 'root', '', 'onlinebiding');
if($con){
    echo "Connection Successfull";
}else{
    die(mysqli_error($con));
}
?>