<?php  session_start(); include "signmodal.php"; ?>
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
                    <li> <a href="home.php" ><button >Home</button></a></li>      
                    <li> <a href="room.php"><button>Rooms</button></a></li>
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
                </ul>
            </nav>

            <section id="main">
                <article id="main-col">
                    <h1 class="page-title">About us</h1>
                    <div class="dark">
                        <p class="about-text">
                            Friends Hotel provides one-stop room booking services in 13 languages through our website and 
                            mobile app. Friends Hotel enjoys a quiet yet central location in Kathmandu, just 7 km away from 
                            Tribhuvan International Airport. Guests can swim and relax at the outdoor pool surrounded by landscaped 
                            gardens. Free Wi-Fi is available.
                        </p>
                        <p class="about-text">
                            
                        </p>
                    </div>
                </article> 

                <aside id="sidebar">
                <h3 class="page-title">What We Do?</h3>
                    <div class="dark">
                        
                        <p class="about-text">
                        With Friends Hotel you can always travel worry free knowing that we're here if you need us. Our 
                        award-winning customer service team speaks multiple languages, with English service available 24 hours 
                        a day via phone, email. 
                        </p>
                    </div>
                </aside>
            </section>
        <footer>
            <p>Friends Hotel, Copyright &copy; 2017</p>
        </footer>
    </body>
</html>    