<?php
include_once("config.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");
// header("Location:index.php");
?>