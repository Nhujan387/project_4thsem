<?php
    session_start();  
    if(!isset($_SESSION["Adname"]))
    {
    header("location:login.php");
    }

    include '../db_configure.php' ;
    include 'logout.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Document</title>
    </head>
    <style>
        *{
            font-family: 'Minion Variable Concept';
        }
        .adbox{
            background-color:	#D3D3D3;
            height: 89vh;
            display: grid;
            grid-template-columns: 20% 80%;
        }
        .dash{
                height: 89vh;
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
        .room{
            width: 90%;
            margin:0 auto;

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
        .addroom{
                margin:10px;
                background-color: green;
                font-size: 18px;
                padding: 3px;
                border-radius: 8px;
                width: 120px;
            }

    </style>
    <body>
    <div class="adbox">
            <div class="dash">
                <nav>
                    <ul>
                        <li> <a href="admin.php" ><button >Admin</button></a></li>      
                        <li> <a href="room_category.php"><button >Rooms Catagory</button></a></li>
                        <li> <a href="room.php"><button class="active" style="color: red;">Room</button></a></li>
                        <li> <a href="reservation.php"><button>Reservation</button></a></li>
                    </ul>
                </nav>
            </div>
            <div class="room">
                <div style="font-size:18px;margin:10px 0px 10px;">
                    Rooms
                </div> 
                <table id = "table"  >
                    <thead style="background-color:grey; height:5vh;">
                        <tr>
                            <th>S-no</th>
                            <th>Room-no</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $displayquery = "SELECT room.room_num, room.status, room_category.catagory_name FROM room LEFT JOIN room_category 
                            ON room.cat_id = room_category.cat_id";
                            $querydisplay = mysqli_query($conn,$displayquery);
                            $i=1;
                            while($fetch = mysqli_fetch_array($querydisplay)){
                                ?>
                                    <tr>
                                        <td><?php echo $i++;?> </td>
                                        <td><?php echo $fetch['room_num'];?> </td>
                                        <td><?php echo $fetch['catagory_name'];?> </td>
                                        <td>
                                            
                                            <?php 
                                                if($fetch['status'] == 0){
                                                    echo 'Available';
                                                }else{
                                                    echo 'Unavailable';
                                                }
                                                
                                            ?>
                                        </td>
                                        <td>
                                        <a>
                                            Update
                                        </a>
                                        <a >
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
                        <a href="add_room.php" ><button class="addroom">Add Room </button> </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>