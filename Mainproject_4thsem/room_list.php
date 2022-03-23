<?php  
    session_start();
    include 'signmodal.php'; 
?>
<?php include 'db_configure.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="homeStyle.css"/>
        <title>Document</title>
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
            <div class="Roombody" style="height:130vh" >
                    <?php
                        $displayquery =  "SELECT * FROM `room` WHERE `cat_id` = '$_REQUEST[cat_id]' order by room_num asc";
                        $querydisplay = mysqli_query($conn,$displayquery);
                        while($result = mysqli_fetch_array($querydisplay)){
                            if($result['status'] == 0){
                    ?>
                <div class="subroom" style="margin-bottom: 7px; border-radius:8px">
                    
                    <div class="roomimg"  >
                        <img src="Admin/<?php echo $result['image'];?>" width="100%"; height="100%" style="border-radius:5px"  />
                    </div>
                    <div class="descrip">
                        <div style="font-style: italic ;font-family: sans-serif; font-size: 25px; font-weight: bold; text-decoration: underline; height: 20%;">
                            <?php echo $result['room_num'];?>
                        </div>
                        <div style="font-size: 20px; font-family: Josefin Sans ; font-weight: bold; " >
                        
                        </div>
                        <div style="font-size: 20px; font-family: Josefin Sans ; font-weight: bold; ">   
                        
                        </div>
                            <a href="room_modal.php?room_id=<?php echo $result['room_id'];?>"
                            style="float: right; font-size: 18px;text-decoration:none; text-align:center;padding:6px; width: 100px; height: 35px ;
                            background-color: black; color: white; cursor: pointer; margin-top: 80px; border-radius:5px;">
                                Book Room
                        </a>
                    </div>
                   
                </div>
                <?php    
                    }}
                ?>
            </div>
        <footer>
            <p>Friends Hotel, Copyright &copy; 2017</p>
        </footer>
    </body>
</html>