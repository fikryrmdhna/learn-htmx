<?php
    if(isset($_POST['Submit'])) {
        $activity = $_POST['activity'];
        
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO users(activity) VALUES('$activity')");
        header("Location: index.php");
    }
?>