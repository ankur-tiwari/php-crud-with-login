<?php

     //error and success message handling
    $message = "";
    if(isset($_GET['message'])) {
        $param = $_GET['message'];
        if($param === "alredy-user") {
            $message = '<div class="alert alert-success" role="alert">User email already exist</div>';
        }
        
    }

    //including requried files
    include("./config/header.php");
    include("./config/database.php");

    $id = "";
    $name = "";
    if(isset($_GET['id'])) {

        //check the id is valid or not
        $id = $_GET['id'];
        $query = "SELECT `id`, `name`, `created_at`, `updated_at` FROM `users` WHERE `id` = '$id';";
        $result = $conn->query($query);
        
        //checking if user present the do nothing otherwise redirect it to dashboard with error
        if($result->num_rows > 0) {   
            while($row = $result->fetch_assoc()) {
                $name = $row['name'];
            }
        } else {
            header("location:dashboard.php?message=user-id-not-found");
        }
    } else {
        header("location:add-user.php?message=user-id-not-found");
    }

    
    

    if(isset($_POST['update'])) {
        $name = "";
        //check for full name
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
        }

        //creating query string
        $query = "UPDATE `users` SET `name` = '$name' WHERE `id` = $id" ;
        $result = $conn->query($query);
        if($result) {
            header("location:dashboard.php?message=success-update-user");
        } else {
            echo "<p>Invalid User Data!!!</p>";
        }
        
    }
?>
<div class="container">
    <?php include("./partials/navbar.php"); ?>
    <div class="row"> 
         <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5><?php echo $message ?></h5>
                    <h5 class="card-title">Edit User <a class="pull-right btn btn-success" href="dashboard.php">View User</a></h5>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="name" class="form-control" placeholder="Enter name" id="name" name="name" value="<?php echo $name?>" required>
                        </div>
                        <button type="submit"  name="update" class="btn btn-primary">Update</button>
                    </form>
                </div>    
            </div>
        </div>
    </div>
<div>