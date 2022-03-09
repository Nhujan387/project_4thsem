<?php
include 'db_configure.php';

    if($_POST){

    $email = $_REQUEST['email'];
    $password = $_REQUEST['psw'];
    $query = $conn->query("SELECT * FROM `signup` WHERE `Email` = '$email'") or die(mysqli_error());
    $fetch = $query->fetch_array();
    $row = $query->num_rows;

    if($row != 0){
        if (password_verify($password,$fetch['Password'])){
            $user = 'you have successfully loged in'; 
                echo "<script type='text/javascript'>alert('$user');</script>";
                header('refresh:0;url=room.php');
        }
    }else{
        $erroruser = 'wrong email id'; 
            echo "<script type='text/javascript'>alert('$erroruser');</script>";  ;
    }

    }
    mysqli_close($conn);
?>