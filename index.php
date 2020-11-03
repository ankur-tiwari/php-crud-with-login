<?php

    //checking for session
    session_start();
    if(isset($_SESSION['email'])) {
        header("location:dasboard.php");
    } else {
        header("location:login.php");
    }

?>

