<?php
    include("./config/session.php");
    $name = $_SESSION['name'];
    echo "Welcome, ".$name;

    if(isset($_POST['logout'])) {
        session_destroy();
        header('location:index.php');
    }
?>

<form action="" method="post">
    <button type="submit" name="logout">Logout</button>
</form>