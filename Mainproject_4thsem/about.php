<?php  session_start(); include "signmodal.php"; ?><?php include 'db_configure.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Friends Hotel | About us
        </title>
        <link rel="stylesheet" href="HomeStyle.css">
    </head>
    <body>
        <div class="head" > 
           <a href="home.php" style="color:black"> <span style="color: red;">FRIENDS'</span>&nbsp;Hotel </a>
        </div>
        
            <nav>
            <ul>
                    <li style="width:340px;"></li>
                    <li> <a href="home.php?" ><button>Home</button></a></li>      
                    <li> <a href="room.php"><button >Rooms</button></a></li>
                    <li> <a href="about.php"><button class="active" style="color: red;">About us</button></a></li>
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

            <section id="main">
                <article id="main-col">
                    <h1 class="page-title" style="text-shadow:1px 1px white">About us</h1>
                    <div class="dark">
                        <p class="about-text">
                            Friends' Hotel provides one-stop room booking services in easiest way through our website. 
                            Friends' Hotel enjoys a quiet yet central location in Jatha,Kathmandu, just 6.5 km away from 
                            Tribhuvan International Airport. As our hotel is near to thamel area also known as tourist spot, guests can easily find any items for the purchase.
                            Religious spots are also only a short distances away from our hotel. Our location is also termed as Chinatown as landscape is heavily populated with Chinese businesses. Our Hotel will provide 
                            best combo of tradition and tourist experiences.
                        </p>
                        <p class="about-text">
                            
                        </p>
                    </div>
                </article> 

                <aside id="sidebar">
                <h3 class="page-title" style="text-shadow:1px 1px white">What We Do?</h3>
                    <div class="dark">
                        
                        <p class="about-text">
                        With Friends' Hotel you can always travel worry free knowing that we're here if you need us. Our 
                        award-winning customer service team speaks multiple languages, with English service available 24 hours 
                        a day via phone, email. We provide you with the 24 hours services. Free Wi-Fi is available.
                        </p>
                    </div>
                </aside>
            </section>
        <footer>
            <p>Friends Hotel, Copyright &copy; 2017</p>
        </footer>
    </body>
</html>    