<?php
// Start the session
session_start();

// if session destroy then check and redirect
if( !isset($_SESSION["username"]) ){
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<section>
    <div class="container">
        <h1>Welcome <span style="color: green;"><?php echo $_SESSION["username"];?></span></h1>
        <a href="./logout.php" class="btn btn-danger">Logout</a>
    </div>
</section>
    
</body>
</html>