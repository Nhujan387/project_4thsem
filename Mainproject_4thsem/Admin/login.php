<?php include '../db_configure.php' ?>
<?php
    Global $unathorized;
    if($_POST){

        $username = $_REQUEST['Adname'];
        $password = $_REQUEST['Adpassword'];
        $query = $conn->query("SELECT * FROM `admin` WHERE `A_name` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$row = $query->num_rows;
		
		if($row > 0){
			session_start();
			$_SESSION['admin_id'] = $fetch['admin_id'];
			header('location:admin.php');
		}else{
			$unathorized = "You ain't admin, imposter"  ;
		}

    }
    mysqli_close($conn);
?>

    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Friends'</title>
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


