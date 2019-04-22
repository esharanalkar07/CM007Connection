<!DOCTYPE html>
<?php
include_once 'config.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Connection</title>
       
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

     <link href="css/main.css" media="screen" type="text/css" rel="STYLESHEET">
     <link href="css/user.css" media="screen" type="text/css" rel="STYLESHEET">
     <link href="css/ninja-slider.css" rel="stylesheet" type="text/css" />
    <script src="script/ninja-slider.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    

     


    </head>

    <body bgcolor="#ECECEC">
        <div id="parent"> 
            <div id="header">
                <div id="topbar">
                    <div id="logo"><img src="css/sitedata/project logo.png"></div>
                    <form style="margin-left: 900px " method="get" action="studentlogin.php">
                        <button  style="background-color: lightskyblue" type="submit"> Student </button>
                    </form>
                    <form style="margin-left: 900px" method="get" action="teacherlogin.php">
                        <button style="background-color: lightgreen" type="submit"> Teacher </button>
                    </form>
                    <form style="margin-left: 900px" action="adminlogin.php">
                        <button style="background-color: lightyellow"  type="submit"> Admin </button>
                    </form>

              </div>    
       
 <div>
    <div id='ninja-slider'>
      <ul>
        <li><div data-image="css/img/md/1.jpg"></div></li>
         <li><div data-image="css/img/md/2.jpg"></div></li>
          <li><div data-image="css/img/md/3.jpg"></div></li>
      </ul>
    </div>
  </div>


</div>
         

    </div>        
    </body>
</html>

