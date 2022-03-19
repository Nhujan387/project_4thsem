<?php 
    include '../db_configure.php' 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
    <div class=nav>
            <p style=" font-size:30px;font-weight: 500; margin-top:15px;float:left;width:50%;"> <span style="color: red;">FRIENDS'</span>&nbsp; <span style="color:white;">Hotel</span></p>      
            <form method="POST">
                <input type="submit" value="Log Out" name="logout" class="abutton"  name="logout">Log Out</button>
            </form>
    </div>
    </body>
</html>
<?php

    if(isset($_POST['logout'])){
        session_start();
        session_destroy();
        header("location: login.php");
        exit;
    }

?>