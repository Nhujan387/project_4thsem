<?php
    include 'db_configure.php';
    
    if(isset($_POST['submit'])){

        

        $full_name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['psw'];
        $cpassword = $_POST['pswcon'];
        $enc_password = md5('password');
        
        $emailcheck = "select * from signup where email= '$email'";
        $queryemail = mysqli_query($conn,$emailcheck);
        
        $emailnum = mysqli_num_rows($queryemail);
        if($emailnum>0){
            echo "Email already exists";
        }else{
            if($password == $cpassword){
                $sql = "INSERT INTO `signup` (`id`, `Full_name`, `Email`, `Password`)
                    VALUES ('','$full_name', '$email','$enc_password')";
                if(mysqli_query($conn, $sql)){
                    echo "New record added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                    
            }else{
                echo"password are not matching";
            }
        }
        
        
    }
    mysqli_close($conn);
?>