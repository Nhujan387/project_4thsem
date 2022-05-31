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
        <title>Friend's| Book </title>
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
            today = new Date(new Date().getTime() - 24*60*60*1000);
            checkin = new Date(document.getElementById('datein').value);
            checkout = new Date(document.getElementById('dateout').value);
            checkinemp = document.getElementById('datein').value;
            checkoutemp = document.getElementById('dateout').value;
            userNameError = document.getElementById('username-error');
            phoneError = document.getElementById('phone-error');
            dateError = document.getElementById('datein-error');
            datepError = document.getElementById('datepin-error');
            dateoutError = document.getElementById('dateout-error');
            Checkdaterror = document.getElementById('Checkdaterror');
            validate = true;

            if(userName.trim() == ""){
                userNameError.innerHTML="Username required";
                userNameError.style.display="block";
                validate = false;
            }else{
                userNameError.style.display="none";
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
                    }else{
                        phoneError.style.display="none";
                    }
                }
            }

            if(checkinemp == ''){
                dateError.innerHTML="Check-in date required";
                dateError.style.display="block";
                validate = false;
            }else{
                dateError.style.display="none";
            }

            if(checkin < today){
                dateError.style.display="none";
                datepError.innerHTML="Check-in date cannot be past";
                datepError.style.display="block";
                validate = false;
            }
            else{
                datepError.style.display="none";
            }

            if(checkoutemp == ''){
                dateoutError.innerHTML="Check-out date required";
                dateoutError.style.display="block";
                validate = false;
            }else{
                dateoutError.style.display="none";

                
            }
            if(checkin > checkout){   
                Checkdaterror.innerHTML = "Check-out date cannot be before Check-in date";
                Checkdaterror.style.display="block";
                validate = false;
            }else{
                Checkdaterror.style.display="none";
               
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
    <div id="Suite" style="height:68vh;">
                <div class="RoomBook" style="height:65vh;margin-top: 5px; background-color:#f8f8ff; border-radius:10px;">  
                    <div style=" margin: 10px; height: 59vh; ">
                        <?php
                            $displayquery = "SELECT r.rev_id, r.Username,r.Contact,r.Checkindate,r.Checkoutdate,
                            ro.room_id,ro.room_num,c.cat_id,c.catagory_name,c.price from reservation as r inner join room 
                            as ro on r.room_id=ro.room_id inner join room_category as c on r.cat_id = c.cat_id  
                            where  ro.room_id = '$_REQUEST[rid]'";

                            $querydisplay = mysqli_query($conn,$displayquery);

                            $result = mysqli_fetch_array($querydisplay)
                        ?>

                        <form id="SuiteRoom" action="" method="POST" onsubmit="event.preventDefault(); validateDetails()">
                            <fieldset class="room-fieldset" style="height:62vh">
                            <legend>Book</legend>
                                <p style="font-size:24px;text-decoration:underline; margin-bottom:5px; "><?= $result['room_num']; ?></p> 
                                <label for="username">Full Name:</label>   <br />
                                    <input type="text" class="PD-name" name="username" id="username" placeholder="Your full name"
                                    title="please enter in more than 6 letters " value="<?= $result['Username'] ?>" > 
                                    <div id="username-error" class="error" style="font-size:14px;"></div>
            
                                <label for="phone">Contact No:</label> <br />
                                    <input type="number" name="phone" id="phone" class="PD-phone"
                                    placeholder="Your phone number" value="<?= $result['Contact'] ?>"> 
                                    <div id="phone-error" class="error" style="font-size:14px;"></div>
                                    

                                    <div class="BD-chck">    
                                        <div class="BD-chck1">
                                            <label for="date">Checkin date:</label>
                                            <input id="datein" class="BD-date" type="date" name="datein" value="<?= $result['Checkindate'] ?>">
                                            <div id="datein-error" class="error" style="font-size:14px;"></div> 
                                            <div id="datepin-error" class="error" style="font-size:14px;"></div> 
                                        </div>    
                                        <div class="BD-chck2">
                                            <label for="date">Checkout date:</label>
                                            <input id="dateout" class="BD-date" type="date" name="dateout" value="<?= $result['Checkoutdate'] ?>" >
                                            <div id="dateout-error" class="error" style="font-size:14px;"></div> <br />
                                        </div>
                                        
                                    </div>
                                    <p id="Checkdaterror" class="error" style="font-size:14px;"></p>
                                    <div style="text-align:right;">
                                        <input type="submit" style="width:30%;color:white;background-color:red;font-size:x-large;border:1px solid black;border-radius:5px"
                                         value="Confirm Edit">
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
        $room_id = $_REQUEST['rid'];
        $cat_id =  $result['cat_id'];
        $U_id = $_SESSION['username'];
        $rev_id = $result['rev_id'];

        /*$checkdate = "SELECT * from reservation where room_id=$room_id And checkindate between '$checkin' AND '$checkout' ";
        $querydatecheck = mysqli_query($conn,$checkdate);


        if(mysqli_num_rows($querydatecheck)>0){
            ?><script>alert('Sorry the Room is already reserved for that date.');location.replace("room_list.php?cat_id=<?= $cat_id ?>");</script><?php
        }else{*/
            
            $updatereservation = "UPDATE `reservation` SET `Username`='$name',`Contact`='$phone',
            `Checkindate`='$checkin',`Checkoutdate`='$checkout',`status`='$status',`room_id`='$room_id',
            `U_id`='$U_id',`cat_id`='$cat_id' WHERE rev_id = $rev_id ";
            $query = mysqli_query($conn,$updatereservation);
            
            if($query){

                $checkmail = "SELECT * from signup where U_id = $U_id";
                $mailquery = mysqli_query($conn,$checkmail);
                $mailid = mysqli_fetch_assoc($mailquery);

                $displayprice = "SELECT price FROM `room_category` WHERE Cat_id = '$cat_id'";
                $pricequery = mysqli_query($conn,$displayprice);
                $showprice  = mysqli_fetch_assoc($pricequery);

                $indate = date_create($checkin);
                $outdate = date_create($checkout);
                $days = date_diff($outdate,$indate);
                $Totalprice = $showprice['price']*$days->format('%a');


                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .="Content-type:text/html; charset=iso-8859-1"."\r\n";
                $headers .="From: maharjannhuj@gmail.com"."\r\n";

                $subject = "Booking Updated Successful";
                $email = $mailid["Email"];
                $body = "<div><b><u>Friend's Hotel</u></b><div><br/><hr/>
                        <div>TO,</div>
                        <div>$name</div><br/>
                        <div>Subject= Updated Room Reservation Successful .</div><br/>
                        <div>Dear Sir/Madam,
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This letter informs you that your booking has been successfully confirmed and we are eager to provide our service
                        to you.</div>
                        <p><u>Room Details</u></p>
                        <div>Room Number: $result[room_num]</div><br/>
                        <div>Check-In: $checkin</div><br/>
                        <div>Check-out: $checkout</div><br/>
                        <div>Price: $Totalprice</div><br/>
                        <p>Our hotel is always ready to provide you with best services. Our Hotel is and always be in your service.<br/> 

                        Please provide valid Govt. issued Address/ID proofs for all guests at check-in. (PAN Cards are not valid). <br/>
                        
                        Pay Reminder- 40% booking amount will be collected at the time of check-in. <br/>
                        
                        If you need any inquiries, please feel free to contact our customer service or office. We are always available to serve you.<br/>
                        
                        Thanking you. </p>
                        ";
                $success =mail($email,$subject,$body,$headers);

                if($query){
                    ?><script>location.replace("reservation_successful.php?rno=<?= $result['room_num'];?>&&cin=<?= $checkin; ?>&&cout=<?= $checkout; ?>&&rs=<?= $Totalprice; ?>")</script><?php
                }
           }

            $updateroom = "UPDATE `room` SET `Status`=$status WHERE room_id = '$_REQUEST[room_id]'";
            $queryupdate = mysqli_query($conn,$updateroom);

                
        /*}*/
    }
?>