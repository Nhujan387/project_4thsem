<?php
    session_start();
    include 'db_configure.php';

    if($_POST){
        $checkin = $_REQUEST['checkin'];
        $checkout = $_REQUEST['checkout'];

        $checkdate = "SELECT * from reservation where status=2 And checkindate between '$checkin' AND '$checkout' ";
        $querydatecheck = mysqli_query($conn,$checkdate);
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="homeStyle.css"/>
        <title>Friend's | Room Availability</title>
    </head>
    <body>
        <div class="head" > 
            <a href="home.php" style="color:black"><span style="color: red;">FRIENDS'</span>&nbsp;Hotel </a>
        </div>
            <nav>
                <ul>
                    <li> <a href="home.php" ><button>Home</button></a></li>      
                    <li> <a href="room.php"><button class="active" style="color: red;">Rooms</button></a></li>
                    <li> <a href="about.php"><button>About us</button></a></li>
                    <li> <a href="Contact.php"><button>Contact us</button></a></li>
                    <?php 
                    if(!isset($_SESSION['username'])){?>
                    <li> <a><button onclick="document.getElementById('signdiv').style.display='block'">Sign in</button></a></li>
                    <?php }?>
                    <?php 
                    if(isset($_SESSION['username'])){?>
                    <li> <a href="logout.php"><button>Log out</button></a></li>
                   <?php }?>
                </ul>
            </nav>
            <div class="Roombody" >
                    <?php
                        $displayquery =  "SELECT room.room_id, room.room_num,room.image, room_category.catagory_name, room_category.cat_id, reservation.status FROM 
                        ((`room` left JOIN `room_category` on room.cat_id = room_category.cat_id) left JOIN `reservation` on room.room_id = reservation.room_id) 
                        Where reservation.status=2 ORDER by room.room_num DESC";
                        $querydisplay = mysqli_query($conn,$displayquery);
                        while($result = mysqli_fetch_array($querydisplay)){
                    ?>
                <div class="subroom" style="margin-bottom: 7px; border-radius:8px">
                    
                    <div class="roomimg"  >
                        <img src="Admin/<?php echo $result['image'];?>" width="100%"; height="100%" style="border-radius:5px"  />
                    </div>
                    <div class="descrip">
                        <div style="font-style: italic ;font-family: sans-serif; font-size: 25px; font-weight: bold; text-decoration: underline; height: 20%;">
                            <?php echo $result['room_num'];?>
                        </div>
                        <div style="font-size: 20px; font-family: Josefin Sans ; font-weight: bold; " >
                        
                        </div>
                        <div style="font-size: 20px; font-family: Josefin Sans ; font-weight: bold; ">   
                        
                        </div>
                            <a href="room_modal.php?room_id=<?php echo $result['room_id'] ;?>&cat_id=<?php echo $result['cat_id'] ;?>"
                            style="float: right; font-size: 18px;text-decoration:none; text-align:center;padding:6px; width: 100px; height: 35px ;
                            background-color: black; color: white; cursor: pointer; margin-top: 80px; border-radius:5px;">
                                Book Room
                        </a>
                    </div>
                   
                </div>
                <?php    
                    }
                ?>
            </div>
        <footer>
            <p>Friends Hotel, Copyright &copy; 2017</p>
        </footer>
    </body>
</html>