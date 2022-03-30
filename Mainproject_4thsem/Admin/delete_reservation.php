<?php
    include '../db_configure.php' ;


    $deleteid = $_REQUEST['rev_id'];
    $updateid = $_REQUEST['room_id'];

    $update = "UPDATE `room` SET `Status`='2' where room_id = $updateid";
            $upadatequery = mysqli_query($conn,$update);

    $removequery =  "DELETE FROM `reservation` WHERE rev_id = $deleteid";
    if($removequery){
        ?> 
        <script>alert("Reservation canceled and deleted");
            location.replace("reservation.php");
        </script><?php
       
    }
    $delete = mysqli_query($conn,$removequery);
?>