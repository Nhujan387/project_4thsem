<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <link rel="stylesheet" href="homeStyle.css"/>
        <title>Friends'</title>
        <style>
            .opac{
                background-color: rgba(0, 0, 0, 0.8);
                height: 100vh;
            }
           .box{
               background-image: url("images/err.png");
               height: 100vh;
               overflow: hidden;
           }
           .errbox{
               width: 35%;
               height: 40vh;
               background-color: white;
               margin: 0 auto;
               margin-top: 62px;
               border: 1px solid black;
               text-align: center;

           }
        </style>
    </head>
    <body>
        <div class="box">
        <div class="opac">
            <div class="errbox">
                user name already exist;
            </div>
        </div>
        </div>
    </body>
</html>