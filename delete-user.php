<?php

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sessionId = $_SESSION['id'];
        if($id === $sessionId) {
            header("location:dashboard.php?message=logged-in-delete");
        } else {
            include("./config/database.php");
            // to delete a record
            $sql = "DELETE FROM `users` WHERE `id`=$id";

            if ($conn->query($sql) === TRUE) {
                header("location:dashboard.php?message=success-delete-user");
            } else {
                header("location:dashboard.php?message=something-want-wrong");
            }
        }
    } else {
        header("location:dashboard.php?message=something-want-wrong");
    }

    
?>