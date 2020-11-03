
<?php

     //error and success message handling
    $message = "";
    if(isset($_GET['message'])) {
        $param = $_GET['message'];
        if($param === "alredy-user") {
            $message = '<div class="alert alert-warning" role="alert">Email already exist!</div>';
        }
        
    }

    //including requried files
    include("./config/header.php");
    include("./config/database.php");

    if(isset($_POST['add'])) {
        $email = "";
        $password = "";
        $name = "";
        //check for full name
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
        } else {
            echo "Name is requried";
            die;
        }

        //check for email
        if(isset($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            echo "Email is requried";
            die;
        }

        //check for password
        if(isset($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            echo "Password is requried";
            die;
        }
        
        $query = "SELECT `id`, `name`, `email`, `password`, `created_at`, `updated_at` FROM `users` WHERE `email` = '$email';";
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            header("location:add-user.php?message=alredy-user");
            die;
        }

        //creating query string
        $query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
        $result = $conn->query($query);
        if($result) {
            header("location:dashboard.php?message=success-add-user");
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
                    <h5 class="card-title">Add User <a class="pull-right btn btn-success" href="dashboard.php">View User</a></h5>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="name" class="form-control" placeholder="Enter name" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password" required>
                        </div>
                        <button type="submit"  name="add" class="btn btn-primary">Submit</button>
                    </form>
                </div>    
            </div>
        </div>
    </div>
<div>