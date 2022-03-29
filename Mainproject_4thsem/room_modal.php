<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        $user = 'User must Sign in before Booking the room '; 
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
        <title>Document</title>
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
        <script>
        function validateDetails(){
            userName = document.getElementById('username').value;
            phone = document.getElementById('phone').value;
            checkin = document.getElementById('datein').value;
            checkout = document.getElementById('dateout').value;
            userNameError = document.getElementById('username-error');
            phoneError = document.getElementById('phone-error');
            dateError = document.getElementById('datein-error');
            dateoutError = document.getElementById('dateout-error');
            validate = true;

            if(userName.trim() == ""){
                userNameError.innerHTML="Username required";
                userNameError.style.display="block";
                validate = false;
            }
           
            if(phone == ""){
                phoneError.innerHTML="Phone number required";
                phoneError.style.display="block";
                validate = false;
            }else{
                if(phone.length<10){
                    phoneError.innerHTML="Phone number cannot be less than 10 digits";
                    phoneError.style.display="block";
                    validate = false;
                }else{
                    if(phone.length>14){
                        phoneError.innerHTML="Phone number cannot be greater than 14 digits";
                        phoneError.style.display="block";
                        validate = false;
                    }
                }
            }

            if(checkin == ''){
                dateError.innerHTML="Check-in date required";
                dateError.style.display="block";
                validate = false;
            }

            if(checkout == ''){
                dateoutError.innerHTML="Check-out date required";
                dateoutError.style.display="block";
                validate = false;
            }
            if(validate){
                document.getElementById("SuiteRoom").submit();
            }
        }
    </script>
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
    <div id="Suite">
                <div class="RoomBook" style="margin-top: 5px; background-color:#f8f8ff; border-radius:10px;">  
                    <div style=" margin: 10px; height: 59vh; ">
                        <?php
                            $displayquery = "SELECT * FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'";
                            $querydisplay = mysqli_query($conn,$displayquery);
                            $result = mysqli_fetch_array($querydisplay)
                        ?>

                        <form id="SuiteRoom" action="" method="POST" onsubmit="event.preventDefault(); validateDetails()">
                            <fieldset class="room-fieldset">
                            <legend>Book</legend>
                                <p style="font-size:24px;text-decoration:underline; margin-bottom:5px; "><?= $result['room_num']; ?></p> 
                                <label for="username">Full Name:</label>   <br />
                                    <input type="text" class="PD-name" name="username" id="username" placeholder="Your full name"
                                    title="please enter in more than three letters"> 
                                    <div id="username-error" class="error" style="font-size:14px;"></div>
            
                                <label for="phone">Contact No:</label> <br />
                                    <input type="number" name="phone" id="phone" class="PD-phone"
                                    placeholder="Your phone number" > 
                                    <div id="phone-error" class="error" style="font-size:14px;"></div>
                                    

                                    <div class="BD-chck">    
                                        <div class="BD-chck1">
                                            <label for="date">Checkin date:</label>
                                            <input id="datein" class="BD-date" type="date" name="datein" min="2022-03-20">
                                            <div id="datein-error" class="error" style="font-size:14px;"></div> 
                                        </div>    
                                        <div class="BD-chck2">
                                            <label for="date">Checkout date:</label>
                                            <input id="dateout" class="BD-date" type="date" name="dateout" min="2022-03-20" >
                                            <div id="dateout-error" class="error" style="font-size:14px;"></div> <br />
                                        </div>
                                    </div>
                                    <div style="text-align:right;">
                                        <input type="submit" class="BD-submit" value="Submit">
                                    </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <footer>
                <p>Friends' Hotel, Copyright &copy; 2022</p>
            </footer>
    
    </body>
</html>
<?php
    if($_POST){

        $name = $_REQUEST['username'];
        $phone = $_REQUEST['phone'];
        $checkin = $_REQUEST['datein'];
        $checkout = $_REQUEST['dateout'];
        $status = 0;
        $room_id = $_REQUEST['room_id'];
        $cat_id =  $_REQUEST['cat_id'];
        $U_id = $_SESSION['username'];

        $checkdate = "SELECT * from reservation where room_id=$room_id And checkindate between '$checkin' AND '$checkout' ";
        $querydatecheck = mysqli_query($conn,$checkdate);

        if($querydatecheck!=null){
            $insert = "INSERT INTO `reservation`(`Username`, `Contact`, `Checkindate`, `Checkoutdate`, `status`, `room_id`, `U_id`, `cat_id`) VALUES
            ('$name','$phone','$checkin','$checkout','$status','$room_id','$U_id','$cat_id')";
            $query = mysqli_query($conn,$insert);
        }else{
            ?><script>alert('Sorry the Room is already reserved for that date.');location.replace("room.php");</script><?php
        }
    }
?>