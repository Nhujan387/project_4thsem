<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        $user = 'Please Sign in before Booking the room '; 
        echo "<script type='text/javascript'>alert('$user');</script>";
        header('refresh:0;url=room.php');
    }
    include 'db_configure.php' ;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="homeStyle.css" />
        <title>Friend's: Reservation cancel</title>
        <style>
            #Suite{
                background-image: url(images/BGbagli.jpg);
                background-size: cover;
                width: 100%;
                height: 80vh;
                margin-top: 5px;
                padding: 5px;
            }    
        </style>
    </head>
    <body>
    <div class="head" > 
        <a href="home.php" style="color:black"><span style="color: red;">FRIENDS'</span>&nbsp;Hotel </a>
        </div>
        
            <nav>
            <ul>
                    <li style="width:340px;"></li>
                    <li> <a href="home.php?" ><button>Home</button></a></li>      
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
                   <li style="width:340px;"></li>
                   <?php 
                    if(isset($_SESSION['username'])){?>
                    <?php 
                        $numuser = $_SESSION['username'];
                        $notification = "SELECT * from reservation where U_id = $numuser And status = 0";
                        $notifyquery = mysqli_query($conn,$notification);
                        
                        if(mysqli_num_rows($notifyquery)>0){
                            ?><li ><a href="notify.php"><img src="images/red.png" style="width:30px;margin-top:10px;"></a><?php
                        }else{
                            ?><li ><a href="notify.php"><img src="images/white.png" style="width:30px;margin-top:10px;"></a><?php
                        }
                    ?>
                   <?php }?>
                    
                </ul>
            </nav>
    <div id="Suite" style="height:68vh;">
                <div class="RoomBook" style="height:65vh;margin-top: 5px; background-color:#f8f8ff; border-radius:10px;">  
                    <div style=" margin: 10px; height: 59vh; ">
                    <?php
                    $checkin= $_REQUEST['cin'];
                    $checkout= $_REQUEST['cout'];
                    $catid = $_REQUEST['cid'];

                    $displayprice = "SELECT price FROM `room_category` WHERE Cat_id = $catid";
                    $pricequery = mysqli_query($conn,$displayprice);
                    $showprice  = mysqli_fetch_assoc($pricequery);

                    $indate = date_create($checkin);
                    $outdate = date_create($checkout);
                    $days = date_diff($outdate,$indate);
                    $Totalprice = $showprice['price']*$days->format('%a');
                    ?>
                        
                        <fieldset class="room-fieldset" style="height:62vh">
                            <legend><b>Cancel Reservation</b></legend>
                            
                            
                            <b><div>Are you sure you want to cancel your reservation??</div>
                            <p><u>Room Details</u></p>
                            <div>Room Number: <?php echo $_REQUEST['rno']?></div>
                            <div>Check-In: <?php echo $_REQUEST['cin']?></div>
                            <div>Check-Out: <?php echo $_REQUEST['cout']?></div>
                            <div>Price: <?php echo $Totalprice?></div><br></b>
                            <p>
                                Our hotel always aims to provide our guest with best services. <br>
                                We look forward to have you as our guest.
                            <br>
                            <b>Thanking you</b> </p>
                            <div style="text-align:right;">

                                <form action="" method="POST">
                                    <input type="number" value="3" id="status" name="status" hidden>
                                    <input type="submit" style="color:white;margin-top:180px;width:30%;background-color:red;font-size:large;border:1px solid black;border-radius:5px" value="Confirm Cancel">
                                </form>
                                
                            </div>
                        </fieldset>
                        
                    </div>
                </div>
            </div>
            <footer>
                <p>Friends' Hotel, Copyright &copy; 2022</p>
            </footer>
            <div id="cmode" style="width:100%;height: 100vh;background-color: rgba(0, 0, 0, 0.8);position: fixed;top: 0;visibility:hidden;">
                <div style="margin-top:100px;font-size:19px;height:4vh;color:white;background-color:red;border-radius:5px;margin-left:8px;width:330px">
                Room Reservation Canceled Successful
                </div>
           </div>
    </body>
</html>
<?php

    if($_POST){
        $status = $_REQUEST['status'];
        $rev = $_REQUEST['revid'];

        $updatereservation = "UPDATE `reservation` SET `status`='$status' WHERE rev_id = $rev ";
        $query = mysqli_query($conn,$updatereservation);

        if($query){
            ?>
                <script>
                     function showcmsg(){
                        document.getElementById('cmode').style.visibility="visible";
                    }setTimeout("showcmsg()",0);

                    function hidecmsg(){
                        document.getElementById('cmode').style.visibility="hidden";
                    }setTimeout("hidecmsg()",4000);

                    setTimeout(function(){
                        location.replace("room.php"); 
                    }, 500);
                </script>
            <?php
           
        $roomset = "UPDATE `room` SET `status`='2' WHERE room_id = '$_REQUEST[rid]' ";
        $firequery = mysqli_query($conn,$roomset);

        }
    }


?>