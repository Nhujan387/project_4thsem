<?php 
    session_start();
    include '../db_configure.php' 
?>
<?php
    Global $unathorized;
    if($_POST){

        $username = $_REQUEST['Adname'];
        $password = $_REQUEST['Adpassword'];
        $query = mysqli_query($conn,"SELECT * FROM `admin` WHERE `A_name` = '$username' && `password` = '$password'") or die(mysqli_error());
		$row = mysqli_fetch_array($query);
		
		if(is_array($row)){
            $_SESSION['Adname'] = $row['A_name'];
            $_SESSION['Adpassword'] = $row['password'];
		}else{
			$unathorized = "You are not admin"  ;
		}
        if(isset($_SESSION["Adname"])){
            header('location:admin.php');
        }

    }
    mysqli_close($conn);
?>

    
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Friends' Hotel|Admin</title>
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
    </head>
    <body>
    
        <div class= "page">
            <div class= "img" >
                <img src="../images/BGbagli.jpg" width=100% height=100% />
            </div>
            <div class="adminlog">
                <div style="box-shadow: 2px 2px grey; border:1px solid black;width:65%; background-color: white; padding: 5px; ">
                <p style="color:red; font-size:16px;"> <?php echo $unathorized ?> </p>
                    <form method="POST"  >
                        <label>Admin Name </label> <br/>
                        <input class="inputmargin" type= "text" id="Adname" name="Adname" /> <br/>
                        <label>Password </label><br/>
                        <input class="inputmargin" type="password" id="Adpassword" name="Adpassword" />
                        <input type="checkbox" style="display:none" name="pass"  ></button>
                        <i class="fa fa-eye" id="passeye" for="pass" onclick=" Showpassword();"></i> <br/>

                        <input style=" font-size: 18px; width: 20%; height: 35px ; background-color: black; color: white; cursor: pointer; margin:6px" type="submit" name="login" value="Login" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>


