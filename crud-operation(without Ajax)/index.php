<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation|Insert Data</title>
    <?php include "./header-files.php";?>
</head>
<body>

<section>
    <div class="container">
        <div class="form-wrap">
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-wrap mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="input-wrap mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="input-wrap mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-wrap mb-3">
                            <label class="form-label">Qualification</label>
                            <input type="text" class="form-control" name="qualification">
                        </div>
                        <div class="input-wrap mb-3">
                            <label class="form-label">Refer</label>
                            <input type="text" class="form-control" name="refer">
                        </div>
                        <div class="input-wrap mb-3">
                            <label class="form-label">Job Post</label>
                            <input type="text" class="form-control" name="post">
                        </div>
                    </div>
                    <div class="submit-wrap text-center mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
    
<?php 
    //very important 
    include "./connection.php"; // first include "./connection.php"

    // Insert data into database table
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $qualification = $_POST['qualification'];
        $refer = $_POST['refer'];
        $post = $_POST['post'];


        $insertQuery = "INSERT INTO jobregisteration(name, email, phone, qualification, refer, jobpost) VALUES ('$name','$email','$phone','$qualification','$refer','$post')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "New record created successfully";
          } else {
            echo "Error: <br>" . $insertQuery . "<br>" . mysqli_error($conn);
          }
          

    }
?>

</body>
</html>