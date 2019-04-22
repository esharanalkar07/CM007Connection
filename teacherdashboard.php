<?php
include ('config.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: teacherlogin.php');
}
$sql = "SELECT firstname, lastname, lastname, department, email, phone, teacher_id,img_url FROM teacher_user WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teacher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<!------  HEAD tag ---------->
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="active navbar-brand" href="index.php">Connection</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="teacherdashboard.php">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Support</a></li>
            </ul>


        </div>
    </nav>
</header>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid" style="background-color: white">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >

            <p><font size="2"; color="black"> <strong> Teacher Id : <?php echo $row['teacher_id']; ?></strong></p>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <li><a style="color: black;" class="btn" href="logout.php"><strong>LOGOUT</strong></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid main-container">
    <div class="col-md-2 sidebar">
        <ul class="nav nav-pills nav-stacked">

            <img  class='top-image' src='profile_pictures/<?php echo $row['img_url']?>' alt="user photo" title="user photo"height="200px" width="200px">

            <li style="margin-top: 20px" class="active"><a href="teacherdashboard.php" style="background-color: deepskyblue;color: white">Home</a></li>
            <li><a href="teacheredit.php">Edit Profile</a></li>
            <li><a href="teacher_assignupload.php">Upload Assignments</a></li>
            <li><a href="teachviewassignment.php">View  Assignments</a></li>

        </ul>
    </div>
    <div  class="col-md-10 content">
        <div style="height: 400px"class="panel panel-default">
            <div class="panel-heading" style="background-color: deepskyblue;">

                <h4 style="text-transform: uppercase"><strong><font size="2"; color="black"> <?php echo $row['firstname']." ".$row['lastname']." " ?>Profile </font> </strong></h4>
            </div>
            <div class="panel-body">

                <div style="border-style: groove;background-color: lightskyblue ;padding-top: 30px;margin-left: 300px;width: 300px;padding-left: 30px" id="profileinfo"> <strong><font size="3"; color="black">
                            Name: <?php echo $row['firstname'];
                            echo $row['lastname'];
                            ?><br><br>
                            Department: <?php echo $row['department']; ?><br><br>

                            Email Id: <?php echo $row['email'];?><br><br>

                            Phone number: <?php echo $row['phone'];?><br><br>

                        </font>
                    </strong>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid text-center">
        <footer class=“col-md-12">
            <p class="col-md-12">
            <hr class="divider">
            Copyright &COPY; 2018 <a href="index.php">Connection:Online Assignment Submission</a>
            </p>
        </footer>
    </div>
</div>