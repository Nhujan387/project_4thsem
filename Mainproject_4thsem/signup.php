<?php
    include 'db_configure.php';
    
    if($_POST){
        $full_name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['psw'];
        $enc_password = password_hash($password,PASSWORD_BCRYPT);


        $emailcheck = "select * from signup where email= '$email'";
        $queryemail = mysqli_query($conn,$emailcheck);

        $sql = "INSERT INTO `signup` (`id`, `Full_name`, `Email`, `Password`)
        VALUES ('','$full_name', '$email','$enc_password')";
        if(mysqli_query($conn, $sql)){
            echo "New record added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
?>