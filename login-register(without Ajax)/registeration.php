<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
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
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="input-wrap mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="input-wrap mb-3">
                            <label>Phone Number</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                        <div class="input-wrap mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="input-wrap mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="cpassword" class="form-control">
                        </div>
                        <div class="submit-wrap d-flex">
                            <input type="submit" name="submit" class="btn btn-primary" value="Register">
                            <a href="./login.php" class="btn btn-warning ms-auto">Login</a>
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
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        // both password should be encrypted
        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);
        $encryptedCpassword = password_hash($cpassword, PASSWORD_BCRYPT);
        
        // check email exist already or not
        $emailQuery = "select * from registeration where email = '$email'";
        $query = mysqli_query($conn, $emailQuery);
        $emailCount = mysqli_num_rows($query);

        echo $emailCount;


        if ($emailCount > 0){
            echo "email already exist";
        } else {

            if($password === $cpassword){

                $insertQuery = "INSERT INTO registeration(name, email, phone, password, cpassword) VALUES ('$name', '$email', '$phone', '$encryptedPassword', '$encryptedCpassword')";
                if (mysqli_query($conn, $insertQuery)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
                }


            } else {
                echo "Password are not matching";
            }

        }

    }

?>
    
</body>
</html>