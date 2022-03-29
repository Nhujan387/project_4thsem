<?php include '../db_configure.php' ?>
<?php 
    include 'logout.php' ;
    session_start();  
    if(!isset($_SESSION["Adname"]))
    {
    header("location:login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Document</title>
    </head>
    <style>
        *{
            font-family: 'Minion Variable Concept';
        }
        .adbox{
            background-color:	#D3D3D3;
            height: 89vh;
            display: grid;
            grid-template-columns: 18% 82%;
        }
        .dash{
                height: 89vh;
                background-color: #9c9c9c;
                display:flex;
                justify-content: center;
                padding: 5px;
            }
        ul{
            list-style-type:none;
        }
        button{
                width: 100%;
                font-size: 24px;
                padding: 5px;
                background-color: white;
                box-shadow: 5px 4px black;
                cursor:pointer;
                color:black;
                border-left:none;
                border-right:none;
                margin: 3px;
            }

            .catagory{
                width: 35%;
                margin: 0 auto;
            }
            .catform{
                width: 100%;
                background-color: white;
                border: 2px solid black;
                box-shadow: 0 8px 16px 0 rgba(0,0,0,1);
                padding: 15px;
                font-size: 18px;
                border-radius: 10px;
            }
            .input{
                width:100%;
                font-size: 16px;
                padding: 5px;
                margin: 3px;
            }
            .msgerr{
                color:red;
                font-size: 12px;
                float:right;
                margin-top: 5px;
                display:none;
            }
            
    </style>
    </head>
    <body>
        <div class="adbox">
            <div class="dash">
                <nav>
                    <ul>
                        <li> <a href="admin.php" ><button >Admin</button></a></li>      
                        <li> <a href="room_category.php"><button >Rooms Catagory</button></a></li>
                        <li> <a href="room.php"><button class="active" style="color: red;">Room</button></a></li>
                        <li> <a href="reservation.php"><button>Reservation</button></a></li>
                        <li> <a href="check.php"><button>Check in/out</button></a></li>
                    </ul>
                </nav>
            </div>
            <div class="catagory">
                <div style="font-size:18px;margin:10px 0px 10px;">
                    Update Rooms
                </div>  
                <div class="catform">
                    <?php 
                        $updateid = $_REQUEST['room_id']; 
                        $select = "SELECT * FROM `room` WHERE room_id=$updateid";
                        $result = mysqli_query($conn,$select);
                        $room = mysqli_fetch_assoc($result);
                    ?>
                    <form id="FormRoom" name="form" method="POST"  enctype="multipart/form-data" onsubmit="event.preventDefault(); validroom();">
                        <label>Room No</label>
                        <span class="msgerr" id="err_room" >Fill the room</span>
                        <input class="input" type="text" id="room" name="room" value="<?= $room['room_num']; ?>" /></br>
                        <label>Catagory</label>
                        <span class="msgerr" id="err_category" >Choose the category</span>
                        <select class="input" name="catagory" id="catagory">
                        <option>--Select--</option>
                        <?php 
								$cat = $conn->query("SELECT * FROM room_category");
                                if($cat->num_rows>0){
                                    while($row= $cat->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['catagory_name'] ?></option>
                               
							<?php
								}}
							?>
                        </select>
                        
                        <label>Image</label>
                        <input class="input" type="file" id="file" name="file" accept="image/*" 
                        onchange="document.getElementById('showimg').src=window.URL.createObjectURL(this.files[0]);" /></br>

                        <img style="width: 50%;height:20vh; border: 1px solid black"  id="showimg"></p>
                        
                        <input style=" font-size: 18px;border-radius: 5px ;width: 120px; height: 35px ; 
                        background-color: black; color: white; cursor: pointer; margin-top: 5px;" type="submit" name="Add room" value="Update Room" />
                    </form>
                </div>
            </div>
        </div>
        <script>
            function validroom(){
                room = document.getElementById('room').value;
                catagory = document.getElementById('category');
                isvalidate = true;

                if(room == ''){
                    document.getElementById('err_room').style.display = 'block';
                    isvalidate = false;
                }else{
                    document.getElementById('err_room').style.display = 'none';
                }
                if (document.form.catagory.selectedIndex=="") {
                    document.getElementById('err_category').style.display = 'block';
                    isvalidate = false;
                }else{
                    document.getElementById('err_category').style.display = 'none';
                }

                if(isvalidate){
                    document.getElementById('FormRoom').submit();
                }
            }
        </script>
    </body>
</html>
<?php

    if($_POST){
        $room = $_REQUEST['room'];
        $category = $_REQUEST['catagory'];
        $files = $_FILES['file'];

        $filename = $files['name'];
        $fileerror = $files['error'];
        $filetmp = $files['tmp_name'];

        $fileext = explode('.',$filename);
        $filecheck = strtolower(end($fileext));
        $fileextstored = array('png','jpg','jpeg');

        if(in_array($filecheck,$fileextstored)){
            $destinationfile = 'zimage/'.$filename;
            move_uploaded_file($filetmp,$destinationfile);

            $update = "UPDATE `room` SET `room_num`='$room',`image`='$destinationfile',`cat_id`='$category'
            WHERE `room_id` = '$updateid'";

            if($update){
            ?>  <script> alert('Room updated successfully') ;location.replace("room.php");</script> <?php
            }
             
            $query = mysqli_query($conn,$update);
        }
    }

?>