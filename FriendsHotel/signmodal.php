<?php global $usererror; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <link rel="stylesheet" href="homeStyle.css"/>
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
                        <input type="number" name="forsignin" value="1" hidden>
                            <label for="name"><b>Full Name</b></label>
                            <span class="errormsg"  id="for_name" >User name cannot be empty </span></br>
                            <input class="inputstyle" type="text" placeholder="Enter your name" name="name" id="name" > <br>
                             
                            <label for="email"><b>Email</b></label> 
                            <span class="errormsg" id="for_email" >Email cannot be empty <br/></span> 
                            <span class="errormsg" id="for_emailvr" >Email id already exists <br/></span> 
                            <input  class="inputstyle" type="text" placeholder="Enter email" name="email" id="email" > <br>
                            
                            <label for="psw"><b>Password</b></label> 
                            <span class="errormsg" id="for_password">Password cannot be empty <br/></span> 
                            <span class="errormsg"  id="password_length">Password must be of atleast 8 characters <br/></span> 
                            <input class="inputstyle" type="password" placeholder="Enter password" name="psw" id="psw"  > <br>
                            
                            <label for="pswconfirm"><b>Confirm Password</b></label> 
                            <span class="errormsg" id="for_con_password">Password cannot be empty <br/></span>
                            <span class="errormsg" id="password_match">Password did not match <br/></span>
                            <input class="inputstyle" type="password" placeholder="Confirm password" name="pswcon" id="pswcon"  > <br> 
                            
                            <button type="submit" name="sign-up" class="signbtn">Sign Up</button>
                        </form>
                </div>
                <div id="signin">
                    <form id="sign-in" method="POST" action="" onsubmit="event.preventDefault(); signin()" >
                    <input type="number" name="forsignin" value="2" hidden>
                        <label for="Email"><b>Email</b></label>
                        <span class="errormsg"  id="for_log_email" >Email cannot be empty </span>
                        <span class="errormsg"  id="for_logn_email" >Email not registered/invalid  </span></br>
                        <input class="inputstyle" type="text" placeholder="Enter email" name="logemail" id="logemail" > <br>
                        <label for="Psw"><b>Password</b></label> 
                        <span class="errormsg"  id="for_log_password" >Password cannot be empty </span>
                        <span class="errormsg"  id="for_logn_password" >Password incorrect </span></br>
                        <input class="inputstyle" type="password" placeholder="Enter password" name="logpsw" id="logpsw"  > <br> 
                        <button type="submit" name="sign-in" class="signbtn" >Sign In </button>
                    </form>
                </div> 
            </div> 
        </div>
        <div id="mode" style="width:100%;height: 100vh;position: fixed;top: 0;visibility:hidden;">
                <div style="margin-top:100px;font-size:19px;text-align:center;height:4vh;color:white;background-color:green;border-radius:5px;margin-left:8px;width:350px">
                    Signup Successful. Please signin before start
                </div>
           </div>
           <div id="ssmode" style="width:100%;height: 100vh;position: fixed;top: 0;visibility:hidden;">
                <div style="margin-top:100px;font-size:19px;height:8vh;text-align:center;color:white;background-color:red;border-radius:5px;margin-left:8px;width:200px">
                Email Id already exists <br> Try using other id
                </div>
           </div>
           <div id="ssmodel" style="width:100%;height: 100vh;position: fixed;top: 0;visibility:hidden;">
                <div style="margin-top:100px;font-size:19px;height:4vh;text-align:center;color:white;background-color:Green;border-radius:5px;margin-left:8px;width:180px">
                Sign in successful.
                </div>
           </div>
           <div id="ssmodelo" style="width:100%;height: 100vh;position: fixed;top: 0;visibility:hidden;">
                <div style="margin-top:100px;font-size:19px;height:4vh;text-align:center;color:white;background-color:red;border-radius:5px;margin-left:8px;width:180px">
                Invalid Password
                </div>
           </div>
           <div id="ssmodeloo" style="width:100%;height: 100vh;position: fixed;top: 0;visibility:hidden;">
                <div style="margin-top:100px;font-size:19px;height:4vh;text-align:center;color:white;background-color:red;border-radius:5px;margin-left:8px;width:180px">
                Email not registered
                </div>
           </div>
    <script>
        function signin(){
                email = document.getElementById('logemail').value;
                password = document.getElementById('logpsw').value;
                isValidate = true;

                if(email == ''){
                     document.getElementById('for_log_email').style.display = 'block';
                     isValidate = false; 
                }else{
                    document.getElementById('for_log_email').style.display = 'none';
                }

                if(password == ''){
                    document.getElementById('for_log_password').style.display = 'block';
                    isValidate = false;
                } else{
                        document.getElementById('for_log_password').style.display = 'none';
                }

                if(isValidate){
                    document.getElementById("sign-in").submit();
                }
            }
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
    
    if($_POST['forsignin']==1){
        $full_name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['psw'];
        $enc_password = password_hash($password,PASSWORD_DEFAULT);

        $checkuser = "SELECT * FROM `signup` WHERE Email = '$email'";
        $check = mysqli_query($conn,$checkuser);

        if(mysqli_num_rows($check)>0) {
            ?>
           <script>
               function showmsg(){
                   document.getElementById('ssmode').style.visibility="visible";
               }setTimeout("showmsg()",0);

               function hidemsg(){
                   document.getElementById('ssmode').style.visibility="hidden";
               }setTimeout("hidemsg()",3000);
               function hidemsgresep(){
                location.replace("Login.php");
            }setTimeout("hidemsgresep()",1000);
           </script>
           
           
           
           <?php
        }else{
            $conn->query("INSERT INTO `signup` (`U_id`, `Full_name`, `Email`, `Password`)
            VALUES ('','$full_name', '$email','$enc_password')") or die(mysqli_error());

           ?>
           <script>
               function showmsg(){
                   document.getElementById('mode').style.visibility="visible";
               }setTimeout("showmsg()",0);

               function hidemsg(){
                   document.getElementById('mode').style.visibility="hidden";
               }setTimeout("hidemsg()",3000);
               function hidemsgresep(){
                location.replace("Login.php");
            }setTimeout("hidemsgresep()",1000);
           </script>
           
           
           
           <?php
        }      
    }
    if($_POST['forsignin']==2){

        $email = $_REQUEST['logemail'];
        $password = $_REQUEST['logpsw'];
        $query = ("SELECT * FROM `signup` WHERE `Email` = '$email'") or die(mysqli_error());
        $querycheck = mysqli_query($conn,$query);
    
        $fetch = mysqli_num_rows($querycheck);
        
    
        if($fetch!=0){
            $email_check = mysqli_fetch_assoc($querycheck);
    
            $db_pass = $email_check['Password'];
    
            
            
            $pass_decode = password_verify($password, $db_pass);
    
            if($pass_decode){
                $_SESSION['username'] = $email_check['U_id'];
                ?>
               <script>
                   function showmsgl(){
                       document.getElementById('ssmodel').style.visibility="visible";
                   }setTimeout("showmsgl()",0);
    
                   function hidemsgl(){
                       document.getElementById('ssmodel').style.visibility="hidden";
                   }setTimeout("hidemsgl()",3000);
    
               </script>
               
               
               
               <?php
            }else{
                ?>
               <script>
                   function showmsglo(){
                       document.getElementById('ssmodelo').style.visibility="visible";
                   }setTimeout("showmsglo()",0);
    
                   function hidemsglo(){
                       document.getElementById('ssmodelo').style.visibility="hidden";
                   }setTimeout("hidemsglo()",3000);
                   function hidemsgresep(){
                location.replace("Login.php");
            }setTimeout("hidemsgresep()",1000);
    
               </script>
               
               
               
               <?php
            }
        }else{
            ?>
               <script>
                   function showmsglo(){
                       document.getElementById('ssmodeloo').style.visibility="visible";
                   }setTimeout("showmsglo()",0);
    
                   function hidemsglo(){
                       document.getElementById('ssmodeloo').style.visibility="hidden";
                   }setTimeout("hidemsglo()",3000);
                   function hidemsgresep(){
                location.replace("Login.php");
            }setTimeout("hidemsgresep()",1000);
    
               </script>
               
               
               
               <?php
        }
    
    }}
    mysqli_close($conn);
?>
