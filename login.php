<?php
    include("./config/header.php");
    include("./config/database.php");

    if(isset($_POST['login'])) {
        $email = "";
        $password = "";

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
        
        //creating query string
        $query = "SELECT * FROM `users` WHERE `email` = '".$email. "' AND `password` = '".$password."';";
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            include("./config/session.php");
            $_SESSION['email'] = $user['email']; 
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            header("location:dashboard.php");
        } else {
            echo "<p>Invalid User email or password!!!</p>";
        }
        
    }
?>
<body class="login">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Login</h5>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
                            </div>
                            <button type="submit"  name="login" class="btn btn-primary">Submit</button>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</body>