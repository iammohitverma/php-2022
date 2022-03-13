<?php  
    $server = 'localhost';  
    $username = 'root';  
    $password = '';  
    $databasename = 'crud_db';  
    $conn = mysqli_connect($server, $username, $password, $databasename);  

    if($conn ) {  
?>
    <script>
        console.log("Connected successfully");
    </script>
<?php
    } else {
        die('Could not connect: ' . mysqli_connect_error());  
    }
?>  