<?php include '../db_configure.php' ?>
<?php 
    include 'logout.php';
    session_start();  
    if(!isset($_SESSION["Adname"]))
    {
    header("location:login.php");
    }
?>

<?php
    if($_POST){
        $category = $_REQUEST['catagory'];
        $price = $_REQUEST['price'];
        $bed = $_REQUEST['bed'];
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

            $insert = "INSERT INTO `room_category`(`catagory_name`, `price`, `beds`, `image`) VALUES 
            ('$category','$price','$bed','$destinationfile')";

            if($insert){
                ?> <script>alert('Category added successful');location.replace("room_category.php");</script><?php
            }

            $query = mysqli_query($conn,$insert);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Friends' Hotel|Category</title>
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
                display:none;
                margin-top: 5px;
            }
            
    </style>
    </head>
    <body>
        <div class="adbox">
            <div class="dash">
                <nav>
                    <ul>
                        <li> <a href="admin.php" ><button >Admin</button></a></li>      
                        <li> <a href="room_category.php"><button class="active" style="color: red;">Rooms Catagory</button></a></li>
                        <li> <a href="room.php"><button>Room</button></a></li>
                        <li> <a href="reservation.php"><button>Reservation</button></a></li>
                        <li> <a href="check.php"><button>Check-In</button></a></li>
                        <li> <a href="checkoutlist.php"><button >Check-Out</button></a></li>
                    </ul>
                </nav>
            </div>
            <div class="catagory">
                <div style="font-size:24px;margin:10px 0px 10px;">
                    Add Rooms Catagory
                </div>  
                <div class="catform">
                    <form id="Formcatagory" method="POST" enctype="multipart/form-data" onsubmit="event.preventDefault(); valid();">
                        <label>Category</label>
                        <span class="msgerr" id="err_category" >Fill the category</span>
                        <input class="input" type="text" id="catagory" name="catagory" /></br>
                        <label>Price/Night</label>
                        <span class="msgerr" id="err_price" >Insert Price</span>
                        <input class="input" type="number" id="price" name="price" /></br>
                        <label>Beds</label>
                        <span class="msgerr" id="err_beds" >Enter beds details</span>
                        <input class="input" type="text" id="bed" name="bed" /></br>
                        <label>Image</label>
                        <input class="input" type="file" id="file" name="file" accept="image/*" 
                        onchange="document.getElementById('showimg').src=window.URL.createObjectURL(this.files[0]);" /></br>

                        <img style="width: 50%;height:20vh; border: 1px solid black"  id="showimg"></p>
                        
                        <input style=" font-size: 18px;border-radius: 5px ;width: 120px; height: 35px ; 
                        background-color: black; color: white; cursor: pointer; margin-top: 5px;" type="submit" name="Add catagory" value="Add Catagory" />
                    </form>
                </div>
            </div>
        </div>
        <script>
            function valid(){
                catagory = document.getElementById('catagory').value;
                price = document.getElementById('price').value;
                bed = document.getElementById('bed').value;
                isvalidate = true;

                if(catagory == ''){
                    document.getElementById('err_category').style.display = 'block';
                    isvalidate = false;
                }else{
                    document.getElementById('err_category').style.display = 'none';
                }
                if(price == ''){
                    document.getElementById('err_price').style.display = 'block';
                    isvalidate = false;
                }else{
                    document.getElementById('err_price').style.display = 'none';
                }
                if(bed == ''){
                    document.getElementById('err_beds').style.display = 'block';
                    isvalidate = false;
                }else{
                    document.getElementById('err_beds').style.display = 'none';
                }

                if(isvalidate){
                    document.getElementById('Formcatagory').submit();
                }
            }
        </script>
    </body>
</html>