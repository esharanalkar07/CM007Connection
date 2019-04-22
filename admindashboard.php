<?php
include ('config.php');
/*session_start();
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: adminlogin.php');
  }
$sql = "SELECT username FROM adminuser WHERE email = '" . $_SESSION['email'] . "'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administrator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<!------ HEAD tag ---------->

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


        </div>
    </nav>
</header>
<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid"style="background-color: white">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >

            <a class="navbar-brand" href="#">
                <strong>ADMIN DASHBOARD <strong></strong></strong>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a style="color: black;" class="btn" href="logout.php"><strong>LOGOUT</strong></a></li>
            </ul>
            </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid main-container">
    <div class="col-md-2 sidebar">
        <ul class="nav nav-pills nav-stacked">
            <li class="active" ><a href="admindashboard.php" style="background-color: deepskyblue;color: white">Home</a></li>

            <li><a href="viewstuds.php">View All Students</a></li>
            <li><a href="viewteach.php">View All Teachers</a></li>
            <li><a href="#">Manage Uploads</a></li>

        </ul>
    </div>
    <div class="container-fluid main-container">

                  <div class="container-fluid main-container">
                <div class="col-md-2 sidebar">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active" ><a href="admindashboard.php" style="background-color: deepskyblue;color: white">Users</a></li>

                        <li><a href="addstud.php">Add Student</a></li>
                        <li><a href="addteach.php">Add Teacher</a></li>



                    </ul>
                </div>
    </div>
        </div>
    </div>
</div>

            <div style="margin-top: 170px" class="container-fluid text-center">
                <footer " class=“col-md-12">
                    <p class="col-md-12">
                    <hr class="divider">
                    Copyright &COPY; 2018 <a href="index.php">Connection:Online Assignment Submission</a>
                    </p>
                </footer>
            </div>

</div>
</body>
</html>