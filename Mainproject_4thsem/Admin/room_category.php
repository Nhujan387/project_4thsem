<?php include '../db_configure.php' ?>
<?php 
    include 'logout.php';
    session_start();  
    if(!isset($_SESSION["Adname"]))
    {
    header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            *{
            font-family: 'Minion Variable Concept';
            }
            .adbox{
                background-color:	#D3D3D3;
                display: grid;
                grid-template-columns: 20% 80%;
            }
            .dash{
                    background-color: #9c9c9c;
                    display:flex;
                    justify-content: center;
                    padding: 5px;
                }
            ul{
                list-style-type:none;
            }
            button{
                width: 100%;
                font-size: 24px;
                padding: 5px;
                background-color: white;
                box-shadow: 5px 4px black;
                cursor:pointer;
                color:black;
                border-left:none;
                border-right:none;
                margin: 3px;
            }
            .addadmin{
                margin:10px;
                background-color: green;
                font-size: 18px;
                padding: 3px;
                border-radius: 8px;
                width: 120px;
            }
            .tablein{
                width: 90%;
                margin: 0 auto;
            }
            table{
                border-collapse: collapse;
                border: 2px solid black;
                width:100%;
                font-size: 18px;
                background-color: white;
                box-shadow: 0 8px 16px 0 rgba(0,0,0,1);
            }
            th{
                border: 2px solid black;
                font-size: 20px;
                width: 20px;
            }
            td{
                border: 2px solid black;
                text-align: center;
            }
            .update{
                border-radius: 4px;
                color: black;
                background-color: blue;
                text-decoration:none;
                margin:3px;
                padding:5px;
                font-size:18px;
                font-weight:bold;
            }
            .delete{
                border-radius: 4px;
                color: black;
                background: red;
                text-decoration:none;
                margin:3px;
                padding:5px;
                font-size:18px;
                font-weight:bold;
                width: 70px;
            }
            .addcategory{
                margin:10px;
                background-color: green;
                font-size: 18px;
                padding: 3px;
                border-radius: 8px;
                width: 180px;
            }
        </style>
    </head>
    <body>
    <div class="adbox">
            <div class="dash">
                <nav>
                    <ul>
                        <li> <a href="admin.php" ><button >Admin</button></a></li>      
                        <li> <a href="room_category.php"><button class="active" style="color: red;">Rooms Catagory</button></a></li>
                        <li> <a href="room.php"><button>Room</button></a></li>
                        <li> <a href="reservation.php"><button>Reservation</button></a></li>
                    </ul>
                </nav>
            </div>
            <div class="tablein" >
                <div style="font-size:18px;margin:10px 0px 10px;">
                    Room Categories
                </div>  
                <table id = "table"  >
                    <thead style="background-color:grey; height:5vh;">
                        <tr>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Beds</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $displayquery = "SELECT * FROM `room_category`";
                            $querydisplay = mysqli_query($conn,$displayquery);

                            while($fetch = mysqli_fetch_array($querydisplay)){
                                ?>
                                <tr>
                                    <td><?php echo $fetch['catagory_name'];?> </td>
                                    <td><?php echo $fetch['price'];?> </td>
                                    <td><?php echo $fetch['beds'];?> </td>
                                    <td><img src="<?php echo $fetch['image'];?>" height="100px" width="150px" > </td>
                                    <td>
                                        <a class="update" href= "update_category.php?id=<?php echo $fetch['cat_id'];?>">
                                            Update
                                        </a>
                                        <a class="delete" href="delete_category.php?id= <?php echo $fetch['cat_id']?>">
                                            Remove
                                        </a>
                                    </td>
                                </tr>
                        <?php    
                            }
                        ?>
                    </tbody>
                    </table>
                    <div style="text-align:right; margin-top:10px">
                        <a href="addcategory.php" ><button class="addcategory">Add Room Category</button> </a>
                    </div>
                </div>
            </div>
        

    </body>
</html>