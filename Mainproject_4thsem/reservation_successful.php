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
        <title>Friend's: Reservation success</title>
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
    <div id="Suite">
                <div class="RoomBook" style="margin-top: 5px; background-color:#f8f8ff; border-radius:10px;">  
                    <div style=" margin: 10px; height: 59vh; ">
                        
                        <fieldset class="room-fieldset">
                            <legend><b>Reservation Successful</b></legend>
                            
                            <div>Dear Sir/Madam,</div>
                            <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This is to notify you that your booking has been successfully confirmed and we are eager to provide our service
                            to you.</div><br> <b>
                            <p><u>Room Details</u></p>
                            <div>Room Number: <?php echo $_REQUEST['rno']?></div>
                            <div>Check-In: <?php echo $_REQUEST['cin']?></div>
                            <div>Check-Out: <?php echo $_REQUEST['cout']?></div>
                            <div>Price: <?php echo $_REQUEST['rs']?></div></b><br>
                            <p>Our hotel is always ready to provide you with best services. Our Hotel is and always be in your service.<br/> 

                            Please provide valid Govt. issued Address/ID proofs for all guests at check-in. (PAN Cards are not valid). <br/>
                            
                            Pay Reminder- 40% booking amount will be collected at the time of check-in. <br/>
                            
                            If you need any inquiries, please feel free to contact our customer service or office. We are always available to serve you.<br/>
                            <br>
                            <b>Thanking you</b> </p>
                            <div style="text-align:right;">
                                <a href="room.php"><button class="BD-submit">Back</button></a>
                            </div>
                        </fieldset>
                        
                    </div>
                </div>
            </div>
            <footer>
                <p>Friends' Hotel, Copyright &copy; 2022</p>
            </footer>
    </body>
</html>