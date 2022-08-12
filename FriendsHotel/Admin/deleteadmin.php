<?php
    include '../db_configure.php' ;

    $deleteid = $_REQUEST['A_id'];

    $removequery =  "DELETE FROM `admin` WHERE A_id = $deleteid ";
    $delete = mysqli_query($conn,$removequery);

    if($delete){
        ?> 
        <script>alert("admin deleted");
            location.replace("admin.php");
        </script><?php
       
    }

?>