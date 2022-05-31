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
        <link rel="stylesheet" href="homeStyle.css" />
        <title>Friends' : Room</title>
    </head>
    <body>
        <div class="head" > 
        <a href="home.php" style="color:black"><span style="color: red;">FRIENDS'</span>&nbsp;Hotel </a>
        </div>
        <nav>
                <ul>
                    <li style="width:340px;"></li>
                    <li> <a href="home.php?" ><button>Home</button></a></li>      
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
            <div class="Roombody">
                <div style="border:1px solid White; width:30%;margin-left:200px;padding:5px;background-color:white;font-size:large;border-radius:5px;">
                    <form action="" method="GET">
                            <label style="font-size:large;">Filter by price:</label>
                            <Select name="sorting" style="width:55%;font-size:large;" >
                                <option value="">--Select Option--</option>
                                <option value="High-to-low" <?php if(isset($_GET['sorting'])&& $_GET['sorting']=="High-to-low") {echo "selected";} ?>>High-to-low</option>
                                <option value="Low-to-high"<?php if(isset($_GET['sorting'])&& $_GET['sorting']=="Low-to-high") {echo "selected";} ?>>Low-to-high</option>
                            </Select>
                            <input type="submit" value="Submit" style="color:white;background-color:black;cursor:pointer;font-size:large;border-radius:5px;"/>
                    </form>
                </div><br/>
                    <?php
                        $sort_option = "Desc";

                        if(isset($_GET['sorting']))
                        {
                            if($_GET['sorting']=="Low-to-high"){
                                $sort_option = "Asc";
                            }elseif($_GET['sorting']=="High-to-low"){
                                $sort_option = "DESC";
                            }
                        }

                        $displayquery = "SELECT * FROM `room_category`order by price $sort_option ";
                        $querydisplay = mysqli_query($conn,$displayquery);
                        while($result = mysqli_fetch_array($querydisplay)){
                    ?>
                
                <div class="subroom" style="margin-bottom: 7px; border-radius:8px">
                    
                    <div class="roomimg" >
                        <img src="Admin/<?php echo $result['image'];?>" width="100%"; height="100%" style="border-radius:5px"  />
                    </div>
                    <div class="descrip">
                        <div style="font-style: italic ;font-family: sans-serif; font-size: 25px; font-weight: bold; text-decoration: underline; height: 20%;">
                            <?php echo $result['catagory_name'];?>
                        </div>
                        <div style="font-size: 20px; font-family: Josefin Sans ; font-weight: bold; " >
                           RS <?php echo $result['price'];?> / day
                        </div>
                        <div style="font-size: 20px; font-family: Josefin Sans ; font-weight: bold; ">   
                            <?php echo $result['beds'];?>
                        </div>
                            <a href="room_list.php?cat_id=<?php echo $result['cat_id'];?>"
                            style="float: right; font-size: 18px;text-decoration:none; text-align:center;padding:6px; width: 100px; height: 35px ;
                            background-color: black; color: white; cursor: pointer; margin-top: 50px; border-radius:5px;">
                               View Room
                        </a>
                    </div>
                   
                </div>
                <?php    
                    }
                ?>
            </div>
            <footer>
                <p>Friends' Hotel, Copyright &copy; 2022</p>
            </footer>
    </body>
</html>