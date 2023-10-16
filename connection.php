<?php

$con = new mysqli('localhost', 'root', '', 'onlinebiding');

if($con){
    
}else{
    die(mysqli_error($con));
}
?>