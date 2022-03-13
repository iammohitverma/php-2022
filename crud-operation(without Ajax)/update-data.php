<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation|Update Data</title>
    <?php include "./header-files.php";?>
</head>
<body>

<?php
    //very important 
    include "./connection.php"; // first include "./connection.php"

    $idFromUrl = $_GET['id']; //Get id from url

    echo $idFromUrl;

    // Select and display data from Database table    
    $sql = "SELECT id, name, email, phone, qualification, refer, jobpost FROM jobregisteration WHERE `id`='" . $idFromUrl . "'";

    $result = mysqli_query($conn, $sql);// mysqli_query for run query in db

    $numOfRows = mysqli_num_rows($result);// get number of rows in table

    $row = mysqli_fetch_array($result)

?>


<section>
    <div class="container">
        <div class="form-wrap">
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-wrap mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
                        </div>
                        <div class="input-wrap mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                        </div>
                        <div class="input-wrap mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-wrap mb-3">
                            <label class="form-label">Qualification</label>
                            <input type="text" class="form-control" name="qualification" value="<?php echo $row['qualification'] ?>">
                        </div>
                        <div class="input-wrap mb-3">
                            <label class="form-label">Refer</label>
                            <input type="text" class="form-control" name="refer" value="<?php echo $row['refer'] ?>">
                        </div>
                        <div class="input-wrap mb-3">
                            <label class="form-label">Job Post</label>
                            <input type="text" class="form-control" name="post" value="<?php echo $row['jobpost'] ?>">
                        </div>
                    </div>
                    <div class="submit-wrap text-center mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Update Data</button>
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

        
        // Update data into database table
        $updateQuery = "UPDATE jobregisteration SET name = '$name',  email =  '$email', phone =  '$phone', qualification =  '$qualification', refer =  '$refer', jobpost =  '$post' WHERE id = $idFromUrl";

        if (mysqli_query($conn, $updateQuery)) {
            echo "Update record successfully";
          } else {
            echo "Error: <br>" . $updateQuery . "<br>" . mysqli_error($conn);
          }
          

    }
?>

</body>
</html>