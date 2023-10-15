<?php

$con = new mysqli('localhost', 'root', '', 'test');
if($con){
    
}else{
    die(mysqli_error($con));
}
?>