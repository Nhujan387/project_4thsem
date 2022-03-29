<?php
    include '../db_configure.php' ;


    $deleteid = $_REQUEST['rev_id'];

    $removequery =  "DELETE FROM `reservation` WHERE rev_id = $deleteid";
   

    if($removequery){
        ?> 
        <script>alert("Reservation canceled and deleted");
            location.replace("reservation.php");
        </script><?php
       
    }
    $delete = mysqli_query($conn,$removequery);
?>