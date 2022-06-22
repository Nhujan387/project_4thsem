
<?php
session_start();
include 'db_configure.php';

    if($_POST){

    $email = $_REQUEST['logemail'];
    $password = $_REQUEST['logpsw'];
    $query = ("SELECT * FROM `signup` WHERE `Email` = '$email'") or die(mysqli_error());
    $querycheck = mysqli_query($conn,$query);

    $fetch = mysqli_num_rows($querycheck);
    

    if($fetch!=0){
        $email_check = mysqli_fetch_assoc($querycheck);

        $db_pass = $email_check['Password'];

        
        
        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
            $_SESSION['username'] = $email_check['U_id'];
            ?>
           <script>
               function showmsgl(){
                   document.getElementById('ssmodel').style.visibility="visible";
               }setTimeout("showmsgl()",500);

               function hidemsgl(){
                   document.getElementById('ssmodel').style.visibility="hidden";
               }setTimeout("hidemsgl()",9000);

               function home(){
                    location.replace('home.php');
               }setTimeout("home()",500);
           </script>
           
           
           
           <?php
        }else{
            echo "<script type='text/javascript'>alert('password incorrect');location.replace('home.php');</script>";
        }
    }else{
        echo "<script type='text/javascript'>alert('Email not registered/invalid');location.replace('home.php');</script>";
    }

    mysqli_close($conn);
}
?>