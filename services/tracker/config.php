<?php
$con= new mysqli('localhost','root','','db_tracker');

if($con->connect_error){
    die("Connection failed :" . $con->connect_error);

}
?>

