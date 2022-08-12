<?php

    session_start();
    if(!isset($_SESSION['username'])){
        echo "you have not logged in";
    }
    session_destroy();
    header("location:home.php");
?>