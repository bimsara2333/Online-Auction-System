<?php

$con = new mysqli('localhost', 'root', '', 'online bidding');
if($con){
    
}else{
    die(mysqli_error($con));
}
?>