<?php

$con = new mysqli('localhost', 'root', '', 'project001');
if($con){
    echo "Connection Successfull";
}else{
    die(mysqli_error($con));
}
?>