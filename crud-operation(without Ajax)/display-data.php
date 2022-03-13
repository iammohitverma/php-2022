<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation|Display Data</title>
    <?php include "./header-files.php";?>
</head>
<body>

<section>
    <div class="container">
        <div class="data-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Qualification</th>
                        <th>Refer</th>
                        <th>Jobpost</th>
                        <th colspan="2">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //very important 
                        include "./connection.php"; // first include "./connection.php"

                        // Select and display data from Database table    
                        $sql = "SELECT id, name, email, phone, qualification, refer, jobpost FROM jobregisteration";

                        $result = mysqli_query($conn, $sql);// mysqli_query for run query in db

                        $numOfRows = mysqli_num_rows($result);// get number of rows in table

                        if ($numOfRows > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['phone'] ?></td>
                                    <td><?php echo $row['qualification'] ?></td>
                                    <td><?php echo $row['refer'] ?></td>
                                    <td><?php echo $row['jobpost'] ?></td>
                                    <td>
                                        <a href="./update-data?id=<?php echo $row['id']?>" class="edit operation-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="./delete-data?id=<?php echo $row['id']?>" class="delete operation-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            echo "0 results";
                        }
                    ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    var myTooltipEl = document.querySelectorAll('.operation-icon')
    myTooltipEl.forEach(element => {
        var tooltip = new bootstrap.Tooltip(element)
        element.addEventListener('hidden.bs.tooltip', function () {
        // do something...
        })
    
        tooltip.hide()
        
    });

</script>
    
</body>
</html>
