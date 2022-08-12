<?php session_start(); include "signmodal.php";  ?><?php include 'db_configure.php' ;?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Friends Hotel | Contact Us
        </title>
        <link rel="stylesheet" href="homeStyle.css">
        <link rel="stylesheet" href="contactStyle.css">
        <style>
             .m-container{
                height: 475px;
                margin-top: 5px;
                padding: 15px;
                background-image: url(images/BGbagli.jpg);
                background-size: cover;
            }

            .cont-container{
                display: flex;
                padding: 14px 18px;
                border-radius: 20px;
                margin-left: 130px;
                margin-right: 130px ;
                margin-top: 10px;
                background-color: #4686b4;
                box-shadow: 0 40px 160px 35px black;

            }

            .cont-info{
                margin-left: 50px;
                width: 100%;
                font-size: 18px;
            }

            h2{
                text-align: center;
            }

            p{
                font-size: 20px;
                    
            }
        </style>
    </head>
    <body>
        <div class="head" > 
        <a href="home.php" style="color:black"> <span style="color: red;">FRIENDS'</span>&nbsp;Hotel </a>
        </div>
        
            <nav>
            <ul>
                    <li style="width:340px;"></li>
                    <li> <a href="home.php" ><button>Home</button></a></li>      
                    <li> <a href="room.php"><button >Rooms</button></a></li>
                    <li> <a href="about.php"><button >About us</button></a></li>
                    <li> <a href="Contact.php"><button class="active" style="color: red;">Contact us</button></a></li>
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
            <div class="m-container">
            <div class="cont-container">
                <div class="cont-map">
                    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16801.698794103926!2d85.30631258075817!3d27.71351701495491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fde4b6fb07%3A0x7b0dcfa6468e82e2!2sHotel%20Friends%20Home!5e0!3m2!1sen!2snp!4v1647657893932!5m2!1sen!2snp" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
                </div>
                <div class="cont-info">
                    <h2><u>Contact Information</u></h2><br/>
                    <div class="contContact">
                        <h3>Address</h3> 
                        <p>44600, Chhusya Galli, Jyatha, Kathmandu, Nepal</p>
                    </div>

                    <div class="contPhone"> 
                        <h3>Phone</h3>
                        <p>
                            01-42123987
                        </p>
                    </div>

                    <div class="contTelephone">
                        <h3>Telephone</h3>
                        <p>+977-9818123987</p>
                    </div>

                    <div class="contEmail">
                        <h3>Email</h3>
                        <p>friendshotel@gmail.com</p>
                    </div>
                </div>
            </div>
            </div>
            <footer>
            <p>Friends Hotel, Copyright &copy; 2017</p>
            </footer>
    </body>
</html>    
