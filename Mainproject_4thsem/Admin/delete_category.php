<?php
    include '../db_configure.php' ;


    $deleteid = $_REQUEST['cat_id'];

    $removequery =  "DELETE FROM `room_category` WHERE cat_id = $deleteid";
    $delete = mysqli_query($conn,$removequery);

    if($delete){
        ?> 
        <script>alert("Room category removed");
            location.replace("room_category.php");
        </script><?php
       
    }

?>