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
        <title>Notification</title>
        <style>
            .nobody{
                border: 1px solid black;
                margin-top: 5px;
                padding: 15px;
                background-image: url(images/BGbagli.jpg);
                background-size: cover;
            }
            .subnobody{
                width: 45%;
                height: 70vh;
                margin-left:340px;
                background: rgba(255, 255, 255, 1);
                color: black;
                border: 1px solid rgba(255, 255, 255, 1);
                border-radius: 15px;
                box-shadow: 5px 5px rgba(0, 0, 0, 0.7) ;
                padding:15px;
            }
            .noti{
                overflow-y:scroll;
                overflow-x:hidden;
                height: 58vh;
                width: 100%;
                padding: 10px;
                background-color: #E6E6E6;
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
                    <li> <a href="home.php" ><button>Home</button></a></li>      
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
                        $notification = "SELECT r.rev_id, r.Username,r.Contact,r.Checkindate,r.Checkoutdate,ro.room_id,ro.room_num,c.cat_id,c.catagory_name,c.price from reservation as r inner join room as ro on r.room_id=ro.room_id inner join room_category as c on r.cat_id = c.cat_id  where U_id = $numuser And r.status = 0
                        order by r.rev_id desc";
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
            <div class="nobody">
                    <div class="subnobody">
                        <P style="font-weight:bold;font-size:x-large;">Notification <span style="color:red;font-size:medium;font-weight:normal;"><br>(To update or delete reservation click on respective notification.)</span></P><hr/>
                        <div class="noti">
                            <?php
                                if(mysqli_num_rows($notifyquery)<0){
                                    ?><p>No message for you.</p><?php
                                }else{
                                    while($result = mysqli_fetch_array($notifyquery)){
                                    ?>
                                    <a href="resevationsuccess.php?revid=<?=$result['rev_id'] ?>&&cid=<?=$result['cat_id'] ?>&&rid=<?=$result['room_id'] ?>&&rno=<?= $result['room_num']?>&&cin=<?= $result['Checkindate']?>&&cout=<?= $result['Checkoutdate']?>&&rs=<?= $result['price']?>&&nm=<?= $result['Username']?>" style="text-decoration-line:none;">
                                       <div style="background-color:white;border:1px solid black;height:7vh;width:100%;margin-bottom:4px;border-radius:5px;">
                                            <p style="color:black;font-weight:bold;">Your Booking for <?= $result['room_num']?> of category <?= $result['catagory_name'] ?> is successful for date <?= $result['Checkindate']?> to <?= $result['Checkoutdate']?>.</p>
                                       </div>
                                    </a>
                                    <?php
                                }}
                            ?>
                        </div>
                    </div>
            </div>
            <footer>
                <p>Friends' Hotel, Copyright &copy; 2022</p>
            </footer>
    </body>
</html>