<?php include 'signmodal.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="homeStyle.css" />
        <title>Friends' : Room</title>
    </head>
    <body>
        <div class="head" > 
        <a href="home.php" style="color:black"><span style="color: red;">FRIENDS'</span>&nbsp;Hotel </a>
        </div>
        
            <nav>
                <ul>
                    <li> <a href="home.php" ><button>Home</button></a></li>      
                    <li> <a href="room.php"><button class="active" style="color: red;">Rooms</button></a></li>
                    <li> <a href="about.php"><button>About us</button></a></li>
                    <li> <a href="Contact.php"><button>Contact us</button></a></li>
                    <li> <a><button onclick="document.getElementById('signdiv').style.display='block'">Sign in</button></a></li>
                </ul>
            </nav>
            
            <div class="Roombody">
                <div class="subroom" style="margin-bottom: 7px;">
                    <div class="roomimg">
                        <img src="images/suite.jpeg" width="100%"; height="100%"  />
                    </div>
                    <div class="descrip">
                        <div style="font-style: italic ;font-family: sans-serif; font-size: 25px; font-weight: bold; text-decoration: underline; height: 20%;">
                            Exclusive Suite
                        </div>
                        <div style="font-size: 18px; font-family: Josefin Sans ; font-weight: bold; " >
                            Price\Night: 9000RS <br/>
                            Double Bed
                        </div>
                        <div style="color: green;">   
                            &#x2713;72m² &#x2713;View &#x2713;Air conditioning &#x2713;Ensuite bathroom &#x2713;Flat-screen TV &#x2713;socket near the bed &#x2713;Cleaning products &#x2713;Tile/marble floor
                            &#x2713;Toilet &#x2713;Bath or shower &#x2713;Extra bed on request
                        </div>
                        <button onclick="document.getElementById('Suite').style.display='block'" style="float: right; font-size: 18px; width: 20%; height: 35px ; background-color: black; color: white; cursor: pointer; margin-top: 15px;">
                            Book Room
                        </button>
                    </div>
                </div>
                <div class="subroom" style="margin-bottom: 7px;">
                    <div class="roomimg">
                        <img src="images/deluxe.jpg" width="100%"; height="100%"  />
                    </div>
                    <div class="descrip">
                        <div style="font-style: italic ;font-family: sans-serif; font-size: 25px; font-weight: bold; text-decoration: underline; height: 20%;">
                            Deluxe Room
                        </div>
                        <div style="font-size: 18px; font-family: Josefin Sans ; font-weight: bold; " >
                            Price\Night: 7000RS <br/>
                            Double Bed
                        </div>
                        <div style="color: green;">
                            &#x2713;60m² &#x2713;View &#x2713;Air conditioning &#x2713;Ensuite bathroom &#x2713;Flat-screen TV &#x2713;socket near the bed &#x2713;Cleaning products &#x2713;Tile/marble floor
                            &#x2713;Toilet &#x2713;Bath or shower &#x2713;Extra bed on request
                        </div>
                        <button onclick="document.getElementById('Duelex').style.display='block'" style="float: right; font-size: 18px; width: 20%; height: 35px ; background-color: black; color: white; cursor: pointer;margin-top: 15px;">
                            Book Room
                        </button>
                    </div>
                </div>
                <div class="subroom" style="margin-bottom: 7px;">
                    <div class="roomimg">
                        <img src="images/family-room.jpg" width="100%"; height="100%"  />
                    </div>
                    <div class="descrip">
                        <div style="font-style: italic ;font-family: sans-serif; font-size: 25px; font-weight: bold; text-decoration: underline; height: 20%;">
                            Family Room
                        </div>
                        <div style="font-size: 18px; font-family: Josefin Sans ; font-weight: bold; " >
                            Price\Night: 5000RS <br/>
                            1 Double bed 2 Single Bed
                        </div>
                        <div style="color: green;">
                            &#x2713;45m² &#x2713;View &#x2713;Air conditioning &#x2713;Ensuite bathroom &#x2713;Flat-screen TV &#x2713;socket near the bed &#x2713;Cleaning products &#x2713;Tile/marble floor
                            &#x2713;Toilet &#x2713;Bath or shower <span style="color: red">&#x292C;Extra bed on request
                        </div>
                        <button onclick="document.getElementById('Family').style.display='block'" style="float: right; font-size: 18px; width: 20%; height: 35px ; background-color: black; color: white; cursor: pointer;margin-top: 15px;">
                            Book Room
                        </button>
                    </div>
                </div>
                <div class="subroom" style="margin-bottom: 7px;">
                    <div class="roomimg">
                        <img src="images/doubleroom.jpg" width="100%"; height="100%"  />
                    </div>
                    <div class="descrip">
                        <div style="font-style: italic ;font-family: sans-serif; font-size: 25px; font-weight: bold; text-decoration: underline; height: 20%;">
                            Double Bed Room
                        </div>
                        <div style="font-size: 18px; font-family: Josefin Sans ; font-weight: bold; " >
                            Price\Night: 5000RS <br/>
                            1 Double bed 2 Single Bed
                        </div>
                        <div style="color: green;">
                            &#x2713;35m² &#x2713;View &#x2713;Air conditioning &#x2713;Ensuite bathroom &#x2713;Flat-screen TV <span style="color: red">&#x292C;Socket near the bed</span> &#x2713;Cleaning products <span style="color: red">&#x292C;Tile/marble floor</span>
                            &#x2713;Toilet &#x2713;Bath or shower <span style="color: red">&#x292C;Extra bed on request
                        </div>
                        <button onclick="document.getElementById('Double').style.display='block'"; style="float: right; font-size: 18px; width: 20%; height: 35px ; background-color: black; color: white; cursor: pointer;margin-top: 15px;">
                            Book Room
                        </button>
                    </div>
                </div>
                <div class="subroom" style="margin-bottom: 7px;">
                    <div class="roomimg">
                        <img src="images/single.jpg" width="100%"; height="100%"  />
                    </div>
                    <div class="descrip">
                        <div style="font-style: italic ;font-family: sans-serif; font-size: 25px; font-weight: bold; text-decoration: underline; height: 20%;">
                            Single Bed Room
                        </div>
                        <div style="font-size: 18px; font-family: Josefin Sans ; font-weight: bold; " >
                            Price\Night: 5000RS <br/>
                            1 Single Bed
                        </div>
                        <div style="color: green;">
                            &#x2713;20m² <span style="color: red">&#x292C;View</span> &#x2713;Air conditioning <span style="color: red">&#x292C;Ensuite bathroom</span> &#x2713;Flat-screen TV <span style="color: red">&#x292C;Socket near the bed</span> &#x2713;Cleaning products <span style="color: red">&#x292C;Tile/marble floor</span>
                            &#x2713;Toilet &#x2713;Bath or shower <span style="color: red">&#x292C;Extra bed on request
                        </div>
                        <button onclick="document.getElementById('Single').style.display='block'"; style="float: right; font-size: 18px; width: 20%; height: 35px ; background-color: black; color: white; cursor: pointer;margin-top: 15px;">
                            Book Room
                        </button>
                    </div>
                </div>
            </div>
            <div id="Suite" class="modal2">
                <div class="RoomBook" style="margin-top: 100px; background-image: url(images/suite.jpeg); background-size: cover; ">
                    <div style="display: flex; justify-content: right; height: 5vh; padding-right: 5px; margin: 3px;">
                        <span onclick="document.getElementById('Suite').style.display='none'"; class="closesign">+</span>
                    </div>   
                    <h2 style="padding-left: 10px; text-decoration: underline;">Exclusive Suite</h2>
                    <div style=" margin: 10px; height: 62vh; background-color: rgba(255, 255, 255, 0.4);">
                        <form id="SuiteRoom" action="" method="POST">
                            <fieldset>
                                <legend>Person Details</legend>
                                <label for="name">Username:</label>   <br />
                                    <input type="text" class="PD-name" name="username" id="name" required autofocus placeholder="Your username"pattern="[a-zA-Z]{3,}" 
                                    title="please enter in more than three letters"> <br />
            
                                <label for="email">Email:</label> <br />
                                    <input type="text" name="email" id="email" required placeholder="Your email" pattern="[a-zA-Z]{3,}@[a-zA-A]{3.}[.]{1}[a-zA-Z]{2,}" 
                                    title="please enter in a valid email adress"> <br />
            
                                <label for="phone">Phone:</label> <br />
                                    <input type="number" name="phone" id="phone" required 
                                    placeholder="Your phone number" pattern="[0-9]{4}" title="please enter in a phone 
                                    number in this format:#### ## ## ##"> <br />
                                
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Booking Details: </legend>
                                    <label for="date">Booking date:</label>
                                        <input id="date" type="date" name="date" min="2018-04-02" max="2020-12-30"> <br />
                                <br>
                                    <label for="numberofGuests"> Number Of Guests:</label>
                                        <input id="numberofGuests" type="number" name="number of guests" min="1" max="5"> <br />
                                
                                <label for="balcony">Do you require Balcony?</label>
                                    <input id="balcony" type="checkbox" name="balcony" value="yes" checked>
                                <br>
                                <input type="submit" value="Submit">
            
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div id="Duelex" class="modal2">
                <div class="RoomBook" style="margin-top: 100px; background-image: url(images/deluxe.jpg); background-size: cover; ">
                    <div style="display: flex; justify-content: right; height: 5vh; padding-right: 5px; margin: 3px;">
                        <span onclick="document.getElementById('Duelex').style.display='none'"; class="closesign">+</span>
                    </div>   
                    <h2 style="padding-left: 10px; text-decoration: underline;">Duelex Room</h2>
                    <div style=" margin: 10px; height: 62vh; background-color: rgba(255, 255, 255, 0.4);">
                        <form id="SuiteRoom" action="" method="POST">
                            <fieldset>
                                <legend>Person Details</legend>
                                <label for="name">Username:</label>   <br />
                                    <input type="text" class="PD-name" name="username" id="name" required autofocus placeholder="Your username"pattern="[a-zA-Z]{3,}" 
                                    title="please enter in more than three letters"> <br />
            
                                <label for="email">Email:</label> <br />
                                    <input type="text" name="email" id="email" required placeholder="Your email" pattern="[a-zA-Z]{3,}@[a-zA-A]{3.}[.]{1}[a-zA-Z]{2,}" 
                                    title="please enter in a valid email adress"> <br />
            
                                <label for="phone">Phone:</label> <br />
                                    <input type="number" name="phone" id="phone" required 
                                    placeholder="Your phone number" pattern="[0-9]{4}" title="please enter in a phone 
                                    number in this format:#### ## ## ##"> <br />
                                
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Booking Details: </legend>
                                    <label for="date">Booking date:</label>
                                        <input id="date" type="date" name="date" min="2018-04-02" max="2020-12-30"> <br />
                                <br>
                                    <label for="numberofGuests"> Number Of Guests:</label>
                                        <input id="numberofGuests" type="number" name="number of guests" min="1" max="5"> <br />
                                
                                <label for="balcony">Do you require Balcony?</label>
                                    <input id="balcony" type="checkbox" name="balcony" value="yes" checked>
                                <br>
                                <input type="submit" value="Submit">
            
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div id="Family" class="modal2">
                <div class="RoomBook" style="margin-top: 100px; background-image: url(images/family-room.jpg); background-size: cover; ">
                    <div style="display: flex; justify-content: right; height: 5vh; padding-right: 5px; margin: 3px;">
                        <span onclick="document.getElementById('Family').style.display='none'"; class="closesign">+</span>
                    </div>   
                    <h2 style="padding-left: 10px; text-decoration: underline;">Family Room</h2>
                    <div style=" margin: 10px; height: 62vh; background-color: rgba(255, 255, 255, 0.4);">
                        <form id="SuiteRoom" action="" method="POST">
                            <fieldset>
                                <legend>Person Details</legend>
                                <label for="name">Username:</label>   <br />
                                    <input type="text" class="PD-name" name="username" id="name" required autofocus placeholder="Your username"pattern="[a-zA-Z]{3,}" 
                                    title="please enter in more than three letters"> <br />
            
                                <label for="email">Email:</label> <br />
                                    <input type="text" name="email" id="email" required placeholder="Your email" pattern="[a-zA-Z]{3,}@[a-zA-A]{3.}[.]{1}[a-zA-Z]{2,}" 
                                    title="please enter in a valid email adress"> <br />
            
                                <label for="phone">Phone:</label> <br />
                                    <input type="number" name="phone" id="phone" required 
                                    placeholder="Your phone number" pattern="[0-9]{4}" title="please enter in a phone 
                                    number in this format:#### ## ## ##"> <br />
                                
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Booking Details: </legend>
                                    <label for="date">Booking date:</label>
                                        <input id="date" type="date" name="date" min="2018-04-02" max="2020-12-30"> <br />
                                <br>
                                    <label for="numberofGuests"> Number Of Guests:</label>
                                        <input id="numberofGuests" type="number" name="number of guests" min="1" max="5"> <br />
                                
                                <label for="balcony">Do you require Balcony?</label>
                                    <input id="balcony" type="checkbox" name="balcony" value="yes" checked>
                                <br>
                                <input type="submit" value="Submit">
            
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div id="Double" class="modal2">
                <div class="RoomBook" style="margin-top: 100px; background-image: url(images/family-room.jpg); background-size: cover; ">
                    <div style="display: flex; justify-content: right; height: 5vh; padding-right: 5px; margin: 3px;">
                        <span onclick="document.getElementById('Double').style.display='none'"; class="closesign">+</span>
                    </div>   
                    <h2 style="padding-left: 10px; text-decoration: underline;">Double Bed Room</h2>
                    <div style=" margin: 10px; height: 62vh; background-color: rgba(255, 255, 255, 0.4);">
                        <form id="SuiteRoom" action="" method="POST">
                            <fieldset>
                                <legend>Person Details</legend>
                                <label for="name">Username:</label>   <br />
                                    <input type="text" class="PD-name" name="username" id="name" required autofocus placeholder="Your username"pattern="[a-zA-Z]{3,}" 
                                    title="please enter in more than three letters"> <br />
            
                                <label for="email">Email:</label> <br />
                                    <input type="text" name="email" id="email" required placeholder="Your email" pattern="[a-zA-Z]{3,}@[a-zA-A]{3.}[.]{1}[a-zA-Z]{2,}" 
                                    title="please enter in a valid email adress"> <br />
            
                                <label for="phone">Phone:</label> <br />
                                    <input type="number" name="phone" id="phone" required 
                                    placeholder="Your phone number" pattern="[0-9]{4}" title="please enter in a phone 
                                    number in this format:#### ## ## ##"> <br />
                                
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Booking Details: </legend>
                                    <label for="date">Booking date:</label>
                                        <input id="date" type="date" name="date" min="2018-04-02" max="2020-12-30"> <br />
                                <br>
                                    <label for="numberofGuests"> Number Of Guests:</label>
                                        <input id="numberofGuests" type="number" name="number of guests" min="1" max="5"> <br />
                                
                                <label for="balcony">Do you require Balcony?</label>
                                    <input id="balcony" type="checkbox" name="balcony" value="yes" checked>
                                <br>
                                <input type="submit" value="Submit">
            
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div id="Single" class="modal2">
                <div class="RoomBook" style="margin-top: 100px; background-image: url(images/single.jpg); background-size: cover; ">
                    <div style="display: flex; justify-content: right; height: 5vh; padding-right: 5px; margin: 3px;">
                        <span onclick="document.getElementById('Single').style.display='none'"; class="closesign">+</span>
                    </div>   
                    <h2 style="padding-left: 10px; text-decoration: underline;">Single Bed Room</h2>
                    <div style=" margin: 10px; height: 62vh; background-color: rgba(255, 255, 255, 0.4);">
                        <form id="SuiteRoom" action="" method="POST">
                            <fieldset>
                                <legend>Person Details</legend>
                                <label for="name">Username:</label>   <br />
                                    <input type="text" class="PD-name" name="username" id="name" required autofocus placeholder="Your username"pattern="[a-zA-Z]{3,}" 
                                    title="please enter in more than three letters"> <br />
            
                                <label for="email">Email:</label> <br />
                                    <input type="text" name="email" id="email" required placeholder="Your email" pattern="[a-zA-Z]{3,}@[a-zA-A]{3.}[.]{1}[a-zA-Z]{2,}" 
                                    title="please enter in a valid email adress"> <br />
            
                                <label for="phone">Phone:</label> <br />
                                    <input type="number" name="phone" id="phone" required 
                                    placeholder="Your phone number" pattern="[0-9]{4}" title="please enter in a phone 
                                    number in this format:#### ## ## ##"> <br />
                                
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Booking Details: </legend>
                                    <label for="date">Booking date:</label>
                                        <input id="date" type="date" name="date" min="2018-04-02" max="2020-12-30"> <br />
                                <br>
                                    <label for="numberofGuests"> Number Of Guests:</label>
                                        <input id="numberofGuests" type="number" name="number of guests" min="1" max="5"> <br />
                                
                                <label for="balcony">Do you require Balcony?</label>
                                    <input id="balcony" type="checkbox" name="balcony" value="yes" checked>
                                <br>
                                <input type="submit" value="Submit">
            
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <footer>
                <p>Friends' Hotel, Copyright &copy; 2022</p>
            </footer>
    </body>
</html>