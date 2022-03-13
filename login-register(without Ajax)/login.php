<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="form-wrap">
                    <form method="POST">
                        <div class="input-wrap mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="input-wrap mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="submit-wrap">
                            <input type="submit" name="submit" class="btn btn-primary" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php

    include "./connection.php";

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // check email exist or not
        $emailSearchQuery = "select * from registeration where email = '$email'";
        $query = mysqli_query($conn, $emailSearchQuery);
        $emailExist = mysqli_num_rows($query);
        
        if ($emailExist){
           
            // match password from db password if_is_register
            $row = mysqli_fetch_array($query);

            $database_pass = $row['password'];

            // Set username on session variables
            $_SESSION["username"] = $row['name'];

            $matchPassword = password_verify($password, $database_pass);

            if($matchPassword){
                echo "Login Success";
                header("Location: ./home.php");
                die();
            }else{
                echo "Wrong Password";
            }

        } else {
            echo "email not exist";          
        }
    }

?>
    
</body>
</html>