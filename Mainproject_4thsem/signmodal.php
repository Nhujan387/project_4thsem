<?php global $usererror; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <link rel="stylesheet" href="homeStyle.css"/>
        <title>Document</title>
        <style>
            .errormsg{
                color: red; 
                display: none; 
                font-size: small; 
                margin-top: 10px ;
                float: right;
            }
        </style>
    </head>
    <body>
    <?= $usererror ?>
    <div id="signdiv" class="modal">
            <div class="container" style="margin-top:75px;">
                <div style="display: flex; justify-content: right; height: 5vh; padding-right: 5px;">
                    <span onclick="document.getElementById('signdiv').style.display='none'"; class="closesign">+</span>
                </div>    
                <div class="button_sign">
                    <span id="signinstyle" onclick="document.getElementById('signin').style.display='block';document.getElementById('signup').style.display='none'; document.getElementById('signinstyle').style.color='#404040'; document.getElementById('signupstyle').style.color='black'"><i>Sign-in</i></span>
                    <span style=" font-size:xx-large"> &nbsp; | &nbsp;</span>
                    <span id="signupstyle" onclick="document.getElementById('signup').style.display='block'; document.getElementById('signin').style.display='none'; document.getElementById('signupstyle').style.color='#404040'; document.getElementById('signinstyle').style.color='black'"><i>Sign-up</i></span>
                </div>
                    <hr>
                <div id="signup">
                        <form method="POST" id="signup-form" onsubmit="event.preventDefault(); signupvalidate()" >
                            <label for="name"><b>Full Name</b></label>
                            <span class="errormsg"  id="for_name" >User name cannot be empty </span></br>
                            <input class="inputstyle" type="text" placeholder="Enter your name" name="name" id="name" > <br>
                             
                            <label for="email"><b>Email</b></label> 
                            <span class="errormsg" id="for_email" >Email cannot be empty <br/></span> 
                            <input  class="inputstyle" type="text" placeholder="Enter email" name="email" id="email" > <br>
                            
                            <label for="psw"><b>Password</b></label> 
                            <span class="errormsg" id="for_password">Password cannot be empty <br/></span> 
                            <span class="errormsg"  id="password_length">Password must be of atleast 8 characters <br/></span> 
                            <input class="inputstyle" type="password" placeholder="Enter password" name="psw" id="psw"  > <br>
                            
                            <label for="pswconfirm"><b>Confirm Password</b></label> 
                            <span class="errormsg" id="for_con_password">Password cannot be empty <br/></span>
                            <span class="errormsg" id="password_match">Password did not match <br/></span>
                            <input class="inputstyle" type="password" placeholder="Confirm password" name="pswcon" id="pswcon"  > <br> 
                            
                            <button type="submit" class="signbtn">Sign Up</button>
                        </form>
                </div>
                <div id="signin">
                    <form method="POST" action="userlogin.php"  >
                        <label for="email"><b>Email</b></label> <br/>
                        <input class="inputstyle" type="text" placeholder="Enter email" name="email" > <br>
                        <label for="psw"><b>Password</b></label> <br/>
                        <input class="inputstyle" type="password" placeholder="Enter password" name="psw"  > <br> 
                        <button type="submit" class="signbtn" >Sign In </button>
                    </form>
                </div> 
            </div> 
        </div>
    <script>
        function signupvalidate(){
                 userName = document.getElementById('name').value;
                 Email = document.getElementById('email').value;
                 Password = document.getElementById('psw').value;
                 ConfirmPassword = document.getElementById('pswcon').value;
                 isValidate = true;

                 if(userName == ''){
                     document.getElementById('for_name').style.display = 'block';
                     isValidate = false; 
                }else{
                    document.getElementById('for_name').style.display = 'none';
                }
                 if(Email == ''){
                     document.getElementById('for_email').style.display = 'block';
                     isValidate = false; 
                }else{
                    document.getElementById('for_email').style.display = 'none';
                }

                if(Password == ''){
                    document.getElementById('for_password').style.display = 'block';
                    isValidate = false;
                }else{
                    document.getElementById('for_password').style.display = 'none';
                    if(Password.length < 8){
                        document.getElementById('password_length').style.display = 'block';
                        isValidate = false;
                    }else{
                        document.getElementById('password_length').style.display = 'none';
                    }
                }

                if(ConfirmPassword == ''){
                    document.getElementById('for_con_password').style.display = 'block';
                    isValidate = false;
                }else{
                    document.getElementById('for_con_password').style.display = 'none';
                    if(Password != ConfirmPassword){
                        document.getElementById('password_match').style.display = 'block';
                        isValidate = false;
                    }else{
                        document.getElementById('password_match').style.display = 'none';
                    }
                }
                
                if(isValidate){
                    document.getElementById("signup-form").submit();
                }
                
            }
    </script>
    </body>
</html>

<?php
    include 'db_configure.php';
    
    if($_POST){
        $full_name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['psw'];
        $enc_password = password_hash($password,PASSWORD_DEFAULT);

        $checkuser = "SELECT * FROM `signup` WHERE Email = '$email'";
        $check = mysqli_query($conn,$checkuser);

        if(mysqli_num_rows($check)>0) {
            $erroruser = 'Email Id already exists \n Try using other id'; 
            echo "<script type='text/javascript'>alert('$erroruser');</script>";
        }else{
            $conn->query("INSERT INTO `signup` (`id`, `Full_name`, `Email`, `Password`)
            VALUES ('','$full_name', '$email','$enc_password')") or die(mysqli_error());
            header("location:room.php");
        }      
    }
    mysqli_close($conn);
?>
