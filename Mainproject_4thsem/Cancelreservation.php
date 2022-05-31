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
                            <div>Check-In: <?php echo $_REQUEST['cout']?></div>
                            <div>Price: <?php echo $Totalprice?></div><br></b>
                            <p>
                                Our hotel always aims to provide our guest with best services. <br>
                                We look forward to have you as our guest.
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