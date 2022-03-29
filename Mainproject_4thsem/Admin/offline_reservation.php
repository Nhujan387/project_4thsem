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
                    <form method="POST">
                        <label>Name</label>
                        <input class="input" type="text" id="username" name="username"  /></br>
                        <label>Contact No</label>
                        <input class="input" type="text" id="contact" name="contact" /></br>
                        <label>Check in date</label>
                        <input class="input" type="date" id="checkin" name="checkin"  /></br>
                        <label>Check out date</label>
                        <input class="input" type="date" id="checkout" name="checkout"  /></br>
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
        $contact =  $_REQUEST['contact'];
        $checkin=  $_REQUEST['checkin'];
        $checkout=  $_REQUEST['checkout'];
        $confirm=  $_REQUEST['confirm'];

        $room = $_REQUEST['room_id'];
        $category = $_REQUEST['cat_id'];


        $checkdate = "SELECT * from reservation where room_id=$room And checkindate between '$checkin' AND '$checkout' ";
        $querydatecheck = mysqli_query($conn,$checkdate);

        if($querydatecheck){
            $insert = "INSERT INTO `reservation`(`Username`, `Contact`, `Checkindate`, `Checkoutdate`, `status`, `room_id`, `cat_id`) VALUES 
                        ('$name','$contact','$checkin','$checkout','$confirm','$room','$category')";
             if($insert){
                ?> <script>alert('User checked in successful');location.replace("check.php");</script><?php
            }
            $query = mysqli_query($conn,$insert);
        }else{
            ?><script>alert('Sorry the Room is already reserved for that date.');location.replace("room.php");</script><?php
        }
    }
?>