<?php
    //error and success message handling
    $message = "";
    if(isset($_GET['message'])) {
        $param = $_GET['message'];
        if($param === "success-add-user") {
            $message = '<div class="alert alert-success" role="alert">User added successfully</div>';
        } else if($param === "user-id-not-found") {
            $message = '<div class="alert alert-danger" role="alert">User not found</div>';
        } else if($param === "success-update-user") { 
            $message = '<div class="alert alert-success" role="alert">User updated successfully</div>';
        } else if($param === "logged-in-delete") {  
            $message = '<div class="alert alert-danger" role="alert">You cannot delete logged in user</div>';
        } else if($param === "success-delete-user") { 
            $message = '<div class="alert alert-success" role="alert">User deleted successfully</div>';
        } else if($param === "something-want-wrong") { 
            $message = '<div class="alert alert-danger" role="alert">Something want wrong</div>';
        }

        
    }
?>
<div class="container">
    <?php include("./partials/navbar.php"); ?>
    <?php include("./config/header.php"); ?>
    <div class="row"> 
         <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5><?php echo $message ?></h5>
                    <h5 class="card-title">Users Detials <a class="pull-right btn btn-success" href="add-user.php">Add User</a></h5>
                    </br>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // $sqlQuery = "SELECT id, name, email, created_at FROM users ";
                                $sqlQuery = "SELECT id, name, email, created_at FROM users WHERE id != ".$_SESSION['id'].";";
                                $result = $conn->query($sqlQuery);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row["id"];
                                        $name = $row["name"];
                                        $email = $row["email"];
                                        $date = date("d-M-Y", strtotime($row["created_at"]));
                                        echo "<tr><td>$id</td><td>$name</td><td>$email</td><td>$date</td><td class='inline-button'><a  href='edit-user.php?id=$id' class='btn btn-primary'>Edit</a> <a href='delete-user.php?id=$id' class='btn btn-danger zero-margin'>Delete</a></td></tr>";
                                    }
                                } 
                                else {
                                    echo "<tr><td  colspan='5' class='text-center'>Currently, There is no data.</td></tr>";
                                }
                                $conn->close();

                            
                            ?>
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>
<div>