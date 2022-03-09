<?php include '../db_configure.php' ?>
<?php include 'logout.php' ?>
<?php
    global $adminerror;
    if($_POST){
        $username = $_REQUEST['Adname'];
        $password = $_REQUEST['Adpassword'];
        $select = "SELECT * FROM `admin` WHERE A_name = '$username'";
        $check = mysqli_query($conn,$select);

        if(mysqli_num_rows($check)>0) {
            $adminerror = 'Admin already exists';
        }else{
            $conn->query("INSERT INTO `admin` (A_name, password) VALUES('$username', '$password')") or die(mysqli_error());
            header("location:admin.php");
        }
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
        .adbox{
            background-color:	#D3D3D3;
            height: 89vh;
            display: grid;
            grid-template-columns: 20% 80%;
        }
        .dash{
                height: 89vh;
                background-color: #9c9c9c;
                display:flex;
                justify-content: center;
                padding: 5px;
                border-right:2px solid red;
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
        .tablein{
            width: 30%;
            margin: 0 auto;
        }
        .table{
            border-collapse: collapse;
            border: 2px solid black;
            width:100%;
            background-color: white;
            font-size: 18px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.8);
        }
        .ed{
            width: 70px;
            background-color: blue;
            font-weight:bold;
            font-size: 18px;
            padding:3px;
            border-radius:5px;
        }
    </style>
    <script>
            function Showpassword() {
            var x = document.getElementById("Adpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            }
    </script>
    <body>
        <div class="adbox">
            <div class="dash">
                <nav>
                    <ul>
                        <li> <a href="admin.php" ><button class="active" style="color: red;">Admin</button></a></li>      
                        <li> <a href="roomcatagrory.php"><button>Rooms Catagory</button></a></li>
                        <li> <a href="room.php"><button>Room</button></a></li>
                        <li> <a href="Contact.php"><button>Site</button></a></li>
                    </ul>
                </nav>
            </div>
            <div class="tablein" style="margin-top:10px;">
                <div style="font-size:18px;margin:10px 0px 10px;">
                    Create <a style="font-size:22px; font-weight:bold; color:black; text-decoration:none" href="admin.php" >Admin</a> Account
                </div> 
                <div class="table">
                <p style="color:red; font-size:16px;"> <?= $adminerror ?> </p>
                <form method="POST"  >
                            <label>Admin Name </label> <br/>
                            <input class="inputmargin" type= "text" id="Adname" name="Adname" /> <br/>
                            <label>Password </label><br/>
                            <input class="inputmargin" type="password" id="Adpassword" name="Adpassword" />
                            <input type="checkbox" style="display:none" name="pass"  ></button>
                            <i class="fa fa-eye" id="passeye" for="pass" onclick=" Showpassword();"></i> <br/>

                            <input style=" font-size: 18px;border-radius: 5px ;width: 120px; height: 35px ; background-color: black; color: white; cursor: pointer; margin:6px" type="submit" name="Add Admin" value="Add Admin" />
                        </form>
                </div>
            </div>
        </div>
    </body>
</html>
