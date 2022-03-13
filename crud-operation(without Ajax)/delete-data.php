<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>

    <?php
        //very important 
        include "./connection.php"; // first include "./connection.php"

        $idFromUrl = $_GET['id']; //Get id from url

        echo $idFromUrl;

        // Delete data from Database table    
        $sql = "DELETE FROM jobregisteration WHERE `id`='" . $idFromUrl . "'";

        $result = mysqli_query($conn, $sql);// mysqli_query for run query in db

        // Redirect browser
        header("Location: display-data.php");
        
        exit;

    ?>

</body>
</html>