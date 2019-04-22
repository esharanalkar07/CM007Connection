<?php
include ('config.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Teacher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<body>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="active navbar-brand" href="#">Connection</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Support</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>
    </nav>
</header>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid" style="background-color: white">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <strong>ADMINISTRATOR'S DASHBOARD</strong>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php" target="_blank"><strong>LOGOUT</strong></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div  class="container-fluid main-container">
    <div class="col-md-2 sidebar">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="admindashboard.php">Home</a></li>

            <li><a href="viewstuds.php">View All Students</a></li>
            <li><a href="viewteach.php">View All Teachers</a></li>
             <li class="active"><a href="addteach.php" style="background-color:deepskyblue;color: white">Add Users</a></li>
        </ul>
    </div>
    <div  class="col-md-10 content">
        <div  class="panel panel-default">
            <div   class="header" style="background-color:lightskyblue;color: black">
                <div  id="frame1">&nbsp;&nbsp;&nbsp;<div style="margin-left: 450px"><strong style="font-size: 25px" > Add Teacher</strong></div>
                </div>
            </div>
            <div  id="frame2" style="margin-top: 40px; margin-left: 40px ; margin-bottom: 40px">
                <form action="adduser.php" method="post">
                    <input type="hidden" name="REQ_TYPE" value="add_teacher">

                    <table id="adddata">
                        <tr><td>   First Name  </td><td>       <input class="field1"  type="text" placeholder="First Name" name="firstname"> </td></tr>
                        <tr><td>   Last Name   </td><td>       <input class="field1" type="text" placeholder="Last Name" name="lastname"></td></tr>
                        <tr><td>   Email ID    </td><td>       <input class="field1" type="text" placeholder="@domain name " name="email"></td></tr>
                        <tr><td>   Mobile No.  </td><td>       <input class="field1" type="text" placeholder="Phone" name="phone"></td></tr>
                        <tr><td>   Address     </td><td>       <textarea class="field1" placeholder="Address" rows='4' cols='23' name="address"></textarea></td></tr>
                        <tr><td>   Birth date  </td><td>       <input class="field1" type="date" name="dob"></td></tr>
                        <tr><td>   Teacher Id  </td><td>       <input class="field1" type="text" placeholder="Teacher Id" name="teacher_id"></td></tr>
                        <tr><td>    User Name   </td><td>       <input class="field1" type="text" placeholder="Username" name="username"></td></tr>
                        <tr><td>    Password   </td><td>       <input class="field1" type="text" placeholder="Username" name="password"></td></tr>
                        <tr><td>    Experience   </td><td>       <input class="field1" type="int" placeholder=" Years of Experience" name="experience"></td></tr>
                        <tr><td>   Department  </td><td>
                                <select class="dropdown" name="department">
                                    <option value="Default">Choose Option</option>
                                    <option value="SCDM">School of Computing and Digital Media</option>
                                    <option value="ITOG">Health and Science</option>



                        <tr><td>   <input  style="margin-top: 20px;margin-left: 30px" type="submit" name="submit" class="btn btn-info btn-md" value="Enroll">   </td><td>

                </form>

            </div>

        </div>

    </div>
</body>
<!--Footer-->




