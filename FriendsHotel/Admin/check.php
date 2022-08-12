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
        <title>Friends' Hotel</title>
    </head>
    <style>
        *{
            font-family: 'Minion Variable Concept';
        }
        .adbox{
            background-color:	#D3D3D3;
            height: 89vh;
            display: grid;
            grid-template-columns: 18% 82%;
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
            width: 98%;
            margin:0 auto;

        }
        table{
            border-collapse: collapse;
            border: 2px solid black;
            width:100%;
            font-size: 16px;
            background-color: #F0FFF0;
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
        .checkin{
                border-radius: 4px;
                color: black;
                background: green;
                text-decoration:none;
                margin:3px;
                padding:5px;
                font-size:14px;
                font-weight:bold;
                width: 80px;
                box-shadow:none;
            }
            .checkout{
                border-radius: 4px;
                color: black;
                background: red;
                text-decoration:none;
                margin:3px;
                padding:5px;
                font-size:14px;
                font-weight:bold;
                width: 80px;
                box-shadow:none;
            }

    </style>
    <body>
        <div class="adbox">
            <div class="dash">
                <nav>
                    <ul>
                        <li> <a href="admin.php" ><button >Admin</button></a></li>      
                        <li> <a href="room_category.php"><button >Rooms Catagory</button></a></li>
                        <li> <a href="room.php"><button>Room</button></a></li>
                        <li> <a href="reservation.php"><button  >Reservation</button></a></li>
                        <li> <a href="check.php"><button class="active" style="color: red;">Check-In</button></a></li>
                        <li> <a href="checkoutlist.php"><button >Check-Out</button></a></li>
                    </ul>
                </nav>
            </div>
            <div class="room">
            <div style="font-size:24px;margin:10px 0px 10px;">
                    Check In
                </div> 
                <table id = "table"  >
                    <thead style="background-color:grey; height:5vh;">
                        <tr>
                            <th>Name</th>
                            <th>Contact no</th>
                            <th>Room Number</th>
                            <th>Room status</th>
                            <th>Check in date</th>
                            <th>Check out date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $displayquery = "SELECT room.room_id, reservation.rev_id, reservation.Username, reservation.Contact, reservation.Checkindate, reservation.Checkoutdate, reservation.status, room.room_num 
                            FROM `reservation` INNER JOIN `room` on reservation.room_id = room.room_id;";
                            $querydisplay = mysqli_query($conn,$displayquery);
                            $i=1;
                            while($result = mysqli_fetch_array($querydisplay)){
                                if($result['status'] == 1){
                                ?>
                                    <tr>
                                        <td><?php echo $result['Username'];?> </td>
                                        <td><?php echo $result['Contact'];?> </td>
                                        <td><?php echo $result['room_num'];?></td>
                                        <td>
                                            <?php 
                                                if($result['status'] == 0){
                                                    echo '<span style="color:#FFFF00">Pending</span>';
                                                }else if($result['status'] == 1){
                                                    echo '<span style="color:green">Checked in</span>';
                                                }else if($result['status'] == 2){
                                                    echo '<span style="color:red">Checked out</span>';
                                                }
                                                
                                            ?>
                                        </td>
                                        <td><?php echo $result['Checkindate'];?></td>
                                        <td><?php echo $result['Checkoutdate'];?></td>
                                        <td>
                                            <a href="checkout.php?rev_id=<?php echo $result['rev_id'];?>&room_id=<?php echo $result['room_id'];?>">
                                                <button class="checkout"  >Checkout</button>
                                            </a>
                                        </td>
                                    </tr>
                            <?php    
                                }}
                            ?>
                    </tbody>
                    </table>
            </div>
        </div>
    </body>
</html>

