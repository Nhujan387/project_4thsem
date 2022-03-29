<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        include 'signmodal.php' ;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Friend's Hotel</title>
        <link rel="stylesheet" href="homeStyle.css" />
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    </head>
    <body>
            <div class="head" > 
                <a href="home.php" style="color:black"><span style="color: red;">FRIENDS'</span>&nbsp;Hotel </a>
            </div>
        
            <nav>
                <ul>
                    <li> <a href="#" ><button class="active" style="color: red;">Home</button></a></li>      
                    <li> <a href="room.php"><button>Rooms</button></a></li>
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
        
        <div class="section">
            <div class="sectiontxt">Check Room Availability</div>
            <div class="subsectiontxt" >
                <form method='POST' action="room_availability.php">
                    <div>
                        CheckIn Date
                        <input style="font-size: 24px;" type="date" name='checkin' required/> &nbsp;
                    
                        CheckOut Date
                        <input style="font-size: 24px;" type="date" name='checkout' required />
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

