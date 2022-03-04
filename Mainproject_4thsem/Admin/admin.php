<?php include '../db_configure.php' ?>
<?php include 'logout.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css" />
        <title>Document</title>
    </head>
    <style>
        body{
            background-color:	#D3D3D3;
        }
        .tablein{
            width: 50%;
            margin: 0 auto;
        }
        table{
            border-collapse: collapse;
            border: 2px solid black;
            width:100%;
            font-size: 18px;
            background-color: white;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.8);
        }
        th{
            border: 2px solid black;
            font-size: 20px;
        }
        td{
            border: 2px solid black;
            padding: 3px;
        }
        .ed{
            width: 70px;
            background-color: blue;
            font-weight:bold;
            font-size: 18px;
            padding:3px;
            border-radius:5px;
        }
        .addadmin{
            margin:10px;
            background-color: green;
            font-size: 18px;
            padding: 3px;
            border-radius: 8px;
            width: 120px;
        }
    </style>
    <body>
        <div class="tablein" style="margin-top:10px;">
            <div style="font-size:18px;margin:10px 0px 10px;">
                Admin Accounts
            </div>  
            <table id = "table"  >
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
                        <td style="text-align:center"> <button class="ed"> Delete</button></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                </table>
                <div style="text-align:right; margin-top:10px">
                    <a href="add_admin.php" ><button class="addadmin">Add Admin</button> </a>
                </div>
            </div>

            <script type = "text/javascript">
                $(document).ready(function(){
                    $("#table").DataTable();
                });
            </script>
    </body>
</html>
