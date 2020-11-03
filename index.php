<?php

    //checking for session
    session_start();
    if(isset($_SESSION['email'])) {
        header("location:dashboard.php");
    } else {
        header("location:login.php");
    }

?>

