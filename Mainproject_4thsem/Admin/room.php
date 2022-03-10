<?php include '../db_configure.php' ?>
<?php include 'logout.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Document</title>
    </head>
    <style>
        *{
            font-family: 'Minion Variable Concept';
        }
        .adbox{
            background-color:	#D3D3D3;
            height: 89vh;
            display: grid;
            grid-template-columns: 20% 80%;
        }
        .dash{
                height: 89vh;
                background-color: #9c9c9c;
                display:flex;
                justify-content: center;
                padding: 5px;
            }
        ul{
            list-style-type:none;
        }
        button{
                width: 100%;
                font-size: 24px;
                padding: 5px;
                background-color: white;
                box-shadow: 5px 4px black;
                cursor:pointer;
                color:black;
                border-left:none;
                border-right:none;
                margin: 3px;
            }

            .catagory{
                width: 35%;
                margin: 0 auto;
            }
            .catform{
                width: 100%;
                background-color: white;
                border: 2px solid black;
                box-shadow: 0 8px 16px 0 rgba(0,0,0,1);
                padding: 15px;
                font-size: 18px;
                border-radius: 10px;
            }
            .input{
                width:100%;
                font-size: 16px;
                padding: 5px;
                margin: 3px;
            }
            .msgerr{
                color:red;
                font-size: 12px;
                float:right;
                margin-top: 5px;
                display:none;
            }
            
    </style>
    </head>
    <body>
        <div class="adbox">
            <div class="dash">
                <nav>
                    <ul>
                        <li> <a href="admin.php" ><button >Admin</button></a></li>      
                        <li> <a href="roomcatagrory.php"><button >Rooms Catagory</button></a></li>
                        <li> <a href="room.php"><button class="active" style="color: red;">Room</button></a></li>
                        <li> <a href="Contact.php"><button>Site</button></a></li>
                    </ul>
                </nav>
            </div>
            <div class="catagory">
                <div style="font-size:18px;margin:10px 0px 10px;">
                    Add Rooms
                </div>  
                <div class="catform">
                    <form id="FormRoom" name="form" method="POST" onsubmit="event.preventDefault(); validroom();">
                        <label>Room</label>
                        <span class="msgerr" id="err_room" >Fill the room</span>
                        <input class="input" type="text" id="room" name="room" /></br>
                        <label>Catagory</label>
                        <span class="msgerr" id="err_category" >Choose the category</span>
                        <select class="input" name="catagory" id="catagory">
                        <option value=""></option>
                                <?  
                                    mysql_connect ("localhost","root","");  
                                    mysql_select_db ("company");  
                                    $select="company";  
                                    if (isset ($select)&&$select!=""){  
                                    $select=$_POST ['NEW'];  
                                }  
                                ?>  
                            <?  
                                $list=mysql_query("select * from employee order by emp_id asc");  
                                while($row_list=mysql_fetch_assoc($list)){  
                            ?>  
                            <option value="<? echo $row_list['emp_id']; ?>"<? if($row_list['emp_id']==$select){ echo "selected"; } ?>>  
                                <?echo $row_list['emp_name'];?>  
                            </option>  
                            <?  }  ?>  
                        </select>
                        <label>Availability</label>
                        <span class="msgerr" id="err_availability" >Check availability</span>
                        <select class="input" name="available" id="available">
                            <option value="available">Available</option>
                            <option value="book">Booked</option>
                        </select>
                        
                        <input style=" font-size: 18px;border-radius: 5px ;width: 120px; height: 35px ; 
                        background-color: black; color: white; cursor: pointer; margin-top: 5px;" type="submit" name="Add room" value="Add Room" />
                    </form>
                </div>
            </div>
        </div>
        <script>
            function validroom(){
                room = document.getElementById('room').value;
                catagory = document.getElementById('category');
                available = document.getElementById('available');
                isvalidate = true;

                if(room == ''){
                    document.getElementById('err_room').style.display = 'block';
                    isvalidate = false;
                }else{
                    document.getElementById('err_room').style.display = 'none';
                }
                if (document.form.catagory.selectedIndex=="") {
                    document.getElementById('err_category').style.display = 'block';
                    isvalidate = false;
                }else{
                    document.getElementById('err_category').style.display = 'none';
                }
                if(available.value == ''){
                    document.getElementById('err_availability').style.display = 'block';
                    isvalidate = false;
                }else{
                    document.getElementById('err_availability').style.display = 'none';
                }

                if(isvalidate){
                    document.getElementById('FormRoom').submit();
                }
            }
        </script>
    </body>
</html>