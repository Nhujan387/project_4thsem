<?php session_start(); include "signmodal.php";  ?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Friends Hotel | Contact Us
        </title>
        <link rel="stylesheet" href="homeStyle.css">
        <link rel="stylesheet" href="contactStyle.css">
    </head>
    <body>
        <div class="head" > 
        <a href="home.php" style="color:black"> <span style="color: red;">FRIENDS'</span>&nbsp;Hotel </a>
        </div>
        
            <nav>
                <ul>
                    <li> <a href="home.php" ><button  >Home</button></a></li>      
                    <li> <a href="room.php"><button>Rooms</button></a></li>
                    <li> <a href="about.php"><button>About us</button></a></li>
                    <li> <a href="Contact.php" ><button class="active" style="color: red;">Contact us</button></a></li>
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
            <div class="cont-container">
                <div style="text-align:center">
                    <h2 class="cont-header">Contact Us</h2>
                    <p class="cont-text">Swing by for a cup of coffee, or leave us a message:</p>
                </div>
                    <div class="column1">
                        <form action="" onsubmit="event.preventDefault(); validateContact()">
                            <label for="fname">First name:</label>  
                                <input type="text" name="username" class="cont-fname" id="fname" placeholder="Enter your first name" > <br>
                                <div class="error" id="fname-error"></div>
    
                            <label for="lname">Last name:</label>  
                                <input type="text" name="username" class="cont-lname" id="lname" placeholder="Enter your last name" > <br>
                                <div class="error" id="lname-error"></div>
    
                            <label for="email">Email:</label>
                               <input type="email" name="email" id="email" class="cont-email" placeholder="Enter your email" > <br>
                               <div class="error" id="email-error"></div>
                               
                            <label for="contact">Intention of contacting</label>
                               <select id="contact" name="Place" class="cont-contacting">
                                    <option value="General inquiry">General inquiry</option>
                                    <option value="Report issue">Report issue</option>
                                    <option value="Support Friends Hotel">Support Friends Hotel</option>
                                    <option value="Other">Other(Please specify in attatchment)</option>
                                </select> <br>
                        
                            <label for="subject">Subject:</label>
                                <textarea id="subject" class="cont-subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
                                <div class="sub_box">
                                <input type="submit" class="cont-submit" value="Submit"> <br>
                            </div>
                        </form>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16801.698794103926!2d85.30631258075817!3d27.71351701495491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fde4b6fb07%3A0x7b0dcfa6468e82e2!2sHotel%20Friends%20Home!5e0!3m2!1sen!2snp!4v1647657893932!5m2!1sen!2snp" width="600" height="450" style="border:0; " allowfullscreen="" loading="lazy"></iframe>
            </div>

        <footer>
            <p>Friends Hotel, Copyright &copy; 2017</p>
        </footer>
        
    </body>
</html>    
