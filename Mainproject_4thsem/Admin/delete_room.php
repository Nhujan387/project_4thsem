<?php
    include '../db_configure.php' ;


    $deleteid = $_REQUEST['room_id'];

    $removequery =  "DELETE FROM `room` WHERE room_id = $deleteid";
    $delete = mysqli_query($conn,$removequery);

    if($delete){
        ?> 
        <script>alert("Room deleted");
            location.replace("room.php");
        </script><?php
       
    }

?>