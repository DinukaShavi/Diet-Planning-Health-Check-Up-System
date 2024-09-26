<?php
session_start();
include_once('includes/config.php');

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $deleteUserQuery = mysqli_query($con, "DELETE FROM users WHERE id = '$userId'");
    
    if ($deleteUserQuery) {
        echo "<script>alert('User deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting user');</script>";
    }
}

session_destroy();
?>

<script language="javascript">
    document.location="index.php";
</script>
