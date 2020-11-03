<?php
    include("./config/session.php");
    include("./config/database.php");
    include("./config/header.php"); 
    
    if(isset($_POST['logout'])) {
        session_destroy();
        header('location:index.php');
    }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="dashboard.php">PHP CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <?php 
            if(isset($_SESSION['id'])) {
              
        ?>
        <form  action="" method="post" class="form-inline my-2 my-lg-0">
            <button class="btn btn-danger my-2 my-sm-0" type="submit" name="logout">Logout</button>
        </form>
        <?php
            }
            else {
                    echo "<a href='/login.php'>Login</a>";
                } 
            ?>
    </div>
</nav>
</br>
</br>