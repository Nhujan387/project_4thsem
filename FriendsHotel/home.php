<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        include 'signmodal.php' ;
       
    }
    
?>
<?php include 'db_configure.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Friend's Hotel</title>
        <link rel="stylesheet" href="homeStyle.css" />
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <style>
            .errorer{
                display:none;
                color:red;
                text-align:center;
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
                    <li> <a href="home.php" ><button class="active" style="color: red;">Home</button></a></li>      
                    <li> <a href="room.php"><button >Rooms</button></a></li>
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
        
        <div class="section">
            <div class="sectiontxt">Check Room Availability</div>
            <div class="subsectiontxt" >
                <form id="dateroom" method='POST' action="room_availability.php" onsubmit="event.preventDefault(); checkdate()">
                    <div style="margin:0 auto;width:55%;">
                        CheckIn Date
                        <input style="font-size: 24px;" type="date" id="datein" name='checkin'/> 
                        
                        &nbsp;
                        CheckOut Date
                        <input style="font-size: 24px;" type="date" id="dateout" name='checkout' />
                        <table style="width:100%;">
                            <tr>
                                <td><div id="datein-error" class="errorer" style="font-size:14px;"></div><td><div id="datepin-error" class="errorer" style="font-size:14px;"></div> </td> </td>
                                <td ><div id="dateout-error" class="errorer" style="font-size:14px;"></div><td><div id="Checkdaterror" class="error" style="font-size:14px;"></div></td></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <input class="checkbutton" type="submit" value="Check Availability" />
                    </div>
                </form>
            </div>
        </div>
        <div style="display: grid; grid-template-columns: 5% 90% 5%;  align-items: center; background-color: black; margin-bottom: 5px; ">
            <div><button style=" margin-left: 20px; border: none; font-size: xx-large; background-color: black; color: white;" onclick="plusDivs(-1)">&#10094;</button></div>
            
                <div style="width: 100%; ">
                    <img class="mySlides" src="images/hotel.jpg" style="width:100% ; height:60vh">
                    <img class="mySlides" src="images/rrecp.jpg" style="width:100%; height:60vh">
                    <img class="mySlides" src="images/hotel luna.jpg" style="width:100%; height:60vh">
                    <img class="mySlides" src="images/out.jpg" style="width:100%; height:60vh">
                </div>
            
            <div><button  style=" margin-left: 20px; border: none; font-size: xx-large; background-color: black; color: white;" onclick="plusDivs(1)">&#10095;</button></div>
        </div> 
        
            <div class="Introduction">
                <div class="title">
                    Welcome to Friend's Hotel
                </div>
                <div class="description">
                    Friends' hotel is located in the immaculate area of Thamel, Kathmandu is a hotel established in 2000. 
                    Friends' Hotel is one the most reputed hotels in Kathmandu and has proudly built its reputation in hospitality and 
                    service throughout its 22 years of operation. 
                    <br/>
                    The hotel is close to the cities famous historical attractions. Friend's Hotel provides very reasonable rate compared
                    to the hospitality service it provides. Friend's Hotel is re-knowed to be popular with friends night outs and hangout.
                    Hotel is located in the tourist spot which provides all the facilities required by the tourist. 
                </div>
                <div class="facilities">
                    Facilities provided by our Hotel
                </div>
                <div class="facilitiespoint">
                    <ul>
                        <li>
                            Comfortable suite, single, double and triple rooms
                        </li>
                        <li>
                            Located in a serene and peaceful environment in the heart of the busy hub of kathmandu
                        </li>
                        <li>
                            Quick check in service
                        </li>
                        <li>
                            Daily housekeeping, laundry and cleaning services 
                        </li>
                        <li>
                            Designated Smoking and Non smoking area 
                        </li>
                        <li>
                            Bar with unlimited choice of International and Nepali Drinks
                        </li>
                        <li>
                            Free WIFI
                        </li>
                    </ul>
                </div>
                <div class="title">
                    Honoured member of
                </div>
                <div>
                    <img src="images/Han.jpg" style="width: 20%;" /> &nbsp;
                    <img src="images/NTB.jpg" style="width: 20%;" />
                </div>
            </div>
            
            <footer>
                <p>Friends' Hotel, Copyright &copy; 2022</p>
            </footer>
        <script>
        function checkdate(){
            today = new Date(new Date().getTime() - 24*60*60*1000);
            checkin = new Date(document.getElementById('datein').value);
            checkout = new Date(document.getElementById('dateout').value);
            checkinemp = document.getElementById('datein').value;
            checkoutemp = document.getElementById('dateout').value;
            dateError = document.getElementById('datein-error');
            datepError = document.getElementById('datepin-error');
            dateoutError = document.getElementById('dateout-error');
            Checkdaterror = document.getElementById('Checkdaterror');
            validate = true;

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
            if(checkin >= checkout){   
                Checkdaterror.innerHTML = "Check-out date cannot be same or before Check-in date";
                Checkdaterror.style.display="block";
                validate = false;
            }else{
                Checkdaterror.style.display="none";
               
            }
            if(validate == true){
                document.getElementById("dateroom").submit();
            }

        }

            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
            showDivs(slideIndex += n);
            }

            function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            x[slideIndex-1].style.display = "block";  
            }

        </script>
    </body>
</html>

