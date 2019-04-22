<?php
include 'config.php';
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: teacherlogin.php');
}
$sql = "SELECT firstname, teacher_id, lastname, department, email, phone, username,img_url FROM teacher_user WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
$user=$row['username'];
$old=(isset($_POST['old']))?$db->real_escape_string(trim($_POST['old'])):'';
$new=(isset($_POST['new']))?$db->real_escape_string(trim($_POST['new'])):'';


$check="select * from teacher_user where username='$user' and password='$old'";
$check=$db->query($check) or die ($db->error);


if(isset($_POST['submit'])){
    $count=$check->num_rows;

    if($count>0){

        $update="update teacher_user set password='$new' where username='$user'";
        if($db->query($update)){
            echo '<div data-alert class="alert-box success radius">';
            echo  '<b>Success !</b> password updated successfully';
            header('Location:teacherlogin.php');
            echo  '<a href="#" class="close">&times;</a>';
            echo '</div>';

        }else{
            echo '<div data-alert class="alert-box warning radius">';
            echo  '<b>Error !</b> '.$db->error;
            echo  '<a href="#" class="close">&times;</a>';
            echo '</div>';
        }

    }else{
        echo '<div data-alert class="alert-box alert radius">';
        echo  '<b>Error !</b> Wrong Current Password...';
        echo  '<a href="#" class="close">&times;</a>';
        echo '</div>';
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
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

            <li  ><a href="teacherdashboard.php" >Home</a></li>
            <li ><a href="teacherpicupload.php">Change Photo</a></li>
            <li style="margin-top: 20px"  ><a href="teacheredit.php">Change Details</a></li>
            <li><a href="teacherpasschange.php"class="active"style="background-color: deepskyblue;color: white"    >Change Password</a></li>

        </ul>
    </div>
    <!--- Header End--->
    <body>
    <div  class="col-md-10 content">
        <div style="height: 400px"class="panel panel-default">
            <div class="panel-heading" style="background-color: deepskyblue;">

                <h4 style="text-transform: uppercase"><strong><font size="2"; color="black"> <?php echo $row['firstname']." ".$row['lastname']." " ?>Profile </font> </strong></h4>
            </div>
            <div class="panel-body">
                <div style="margin-top:40px; border-style: groove;background-color: lightskyblue ;padding-top: 30px;margin-left: 300px;width: 300px;padding-left: 30px" id="profileinfo"> <strong><font size="3"; color="black">
                            <form action="" method="post" data-abide>

                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="password">Current Password
                                            <input id="password" type="password"  name="old" placeholder="current password" required></input>
                                        </label>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="password">New Password
                                            <input id="password" type="password"  name="new" placeholder="new password" required></input>
                                        </label>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="large-12 columns">
                                        <button type="submit" name="submit" class="button expand radius">Update</button>
                                    </div>
                                </div>
                            </form>
    </body></div>

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
<!---Footer end--->
</html>


