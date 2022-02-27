<?php include '../db_configure.php' ?>
<?php include 'logout.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <title>Document</title>
    </head>
    <body>
        <table id = "table" class = "tablestyle">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    $query = $conn->query("SELECT * FROM `admin`") or die(mysqli_error());
                    while($fetch = $query->fetch_array()){
                ?>
                <tr>
                    <td ><?php echo $fetch['A_name']?></td>
                    <td><?php echo ($fetch['password'])?></td>
                    <td><button class="ed"> Edit</button> <button class="ed"> Delete</button></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
            </table>
            <script type = "text/javascript">
                $(document).ready(function(){
                    $("#table").DataTable();
                });
            </script>
    </body>
</html>
<?php

    

?>