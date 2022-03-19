<?php
session_start();
include 'db_configure.php';

    if($_POST){

    $email = $_REQUEST['logemail'];
    $password = $_REQUEST['logpsw'];
    $query = ("SELECT * FROM `signup` WHERE `Email` = '$email'") or die(mysqli_error());
    $querycheck = mysqli_query($conn,$query);

    $fetch = mysqli_num_rows($querycheck);
    

    if($fetch){
        $email_check = mysqli_fetch_assoc($querycheck);

        $db_pass = $email_check['Password'];

        $_SESSION['username'] = $email_check['U_id'];
        
        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
            echo "login sucessful";
            ?>
            <script>
                location.replace("home.php");
            </script>
            <?php
        }else{
            echo "password incorrect";
        }
    }else{
        echo "invalid email";
    }

    mysqli_close($conn);
}
?>