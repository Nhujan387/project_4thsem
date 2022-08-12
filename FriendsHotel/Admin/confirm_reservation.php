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
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Friends' Hotel|Reservation</title>
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

            .catagory{
                width: 35%;
                margin: 0 auto;
            }
            .catform{
                width: 100%;
                background-color: white;
                border: 2px solid black;
                box-shadow: 0 8px 16px 0 rgba(0,0,0,1);
                padding: 15px;
                font-size: 18px;
                border-radius: 10px;
            }
            .input{
                width:100%;
                font-size: 16px;
                padding: 5px;
                margin: 3px;
            }
            .msgerr{
                color:red;
                font-size: 12px;
                float:right;
                display:none;
                margin-top: 5px;
            }
            
    </style>
    </head>
    <body>
        <div class="adbox">
            <div class="dash">
                <nav>
                    <ul>
                        <li> <a href="admin.php" ><button >Admin</button></a></li>      
                        <li> <a href="room_category.php"><button >Rooms Catagory</button></a></li>
                        <li> <a href="room.php"><button>Room</button></a></li>
                        <li> <a href="reservation.php"><button class="active" style="color: red;">Reservation</button></a></li>
                        <li> <a href="check.php"><button >Check-In</button></a></li>
                        <li> <a href="checkoutlist.php"><button >Check-Out</button></a></li>
                    </ul>
                </nav>
            </div>
            <div class="catagory">
                <div style="font-size:18px;margin:10px 0px 10px;">
                    Confirm Reservation
                </div>  
                <div class="catform">
                    <?php
                    $select = "SELECT r.Username, r.Checkindate, r.Checkoutdate, ro.room_num FROM `reservation` as r inner join room as ro on
                    r.room_id = ro.room_id where rev_id = '$_REQUEST[rev_id]'";
                    $query = mysqli_query($conn,$select);
                    $result = mysqli_fetch_array($query);
                    ?>
                    <form method="POST">
                        <label>Name</label>
                        <input class="input" type="text" id="username" name="username" value="<?php echo $result['Username']?>" /></br>
                        <label>Room No</label>
                        <input class="input" type="text" id="room" name="room" value="<?php echo $result['room_num']?>" readonly/></br>
                        <label>Check in date</label>
                        <input class="input" type="date" id="checkin" name="checkin" value="<?php echo $result['Checkindate']?>" /></br>
                        <label>Check out date</label>
                        <input class="input" type="date" id="checkout" name="checkout" value="<?php echo $result['Checkoutdate']?>" /></br>
                        <input class="input" type="text" id="confirm" name="confirm" value="1" style="display:none" /></br>

                        <input style=" font-size: 18px;border-radius: 5px ;width: 120px; height: 35px ; 
                        background-color: Green; color: white; cursor: pointer; margin-top: 5px;" type="submit" name="Check In" value="Check In" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if($_POST){
        $name = $_REQUEST['username'];
        $room =  $_REQUEST['room'];
        $checkin=  $_REQUEST['checkin'];
        $checkout=  $_REQUEST['checkout'];
        $confirm=  $_REQUEST['confirm'];

        $update = "UPDATE `reservation` SET 
        `Username`='$name',`Checkindate`='$checkin',`Checkoutdate`='$checkout',`status`='$confirm' WHERE rev_id = '$_REQUEST[rev_id]'";

        if($update){
            $updateroom = "UPDATE `room` SET `Status`='$confirm' WHERE room_id = '$_REQUEST[room_id]'";
            $queryupdate = mysqli_query($conn,$updateroom);
            ?> <script>alert('User checked in successful');location.replace("reservation.php");</script><?php
        }
        $query = mysqli_query($conn,$update);

       
    }




?>