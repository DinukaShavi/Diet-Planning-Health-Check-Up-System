<?php
require 'config.php';

if(isset($_POST['submit'])){
    $water = $_POST['water'];
    $exercise = $_POST['exercise'];
    $bloodsugerlevel = $_POST['bloodsugerlevel'];
   

    $stmt = $conn->prepare("INSERT INTO tb_tracker VALUES('',?,?,?)");
    $stmt->bind_param("sss",$water,$exercise,$bloodsugerlevel);
    $stmt -> execute();

}
if (isset($_POST['Update'])) {
    $userid = $_POST['id'];
    $water = $_POST['water'];
    $exercise = $_POST['exercise'];
    $bloodsugerlevel = $_POST['bloodsugerlevel'];
    $msg = mysqli_query($con, "update users set water='$water',exercise='$exercise',bloodsugerlevel='$bloodsugerlevel' where id='$userid");
}
?>