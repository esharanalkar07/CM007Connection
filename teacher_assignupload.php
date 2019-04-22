<?php
include ('config.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: teacherlogin.php');
}
$sql = "SELECT firstname, teacher_id, lastname, department, email, phone, username,img_url FROM teacher_user WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);


if(isset($_POST['submit']))
{
    $teacher_id=$row['teacher_id'];
    $department=$row['department'];
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="assignments/";

    // new file size in KB
    $new_size = $file_size/1000000;
    // new file size in KB

    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case

    $final_file=str_replace( '','-',$new_file_name);

    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $sql="INSERT INTO teacher_assignments(file,teacher_id,department) VALUES('$final_file','$teacher_id','$department')";
        if ($db->query($sql) === TRUE) {
            echo '<div data-alert class="alert-box success radius">';
            echo  '<b>Success !</b> Asiignment Uploaded' ;
            echo  '<a href="#" class="close">&times;</a>';
            echo '</div>';
            header('refresh:1;url=teacherdashboard.php');
        }
        ?>

        <?php
    }
    else
    {
        ?>
        <script>
            alert('error while uploading file');
            window.location.href='teacher_assignment_upload.php?fail';
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment Upload</title>
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
                <li class="active"><a href="studentdashboard.php">Home</a></li>
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

            <li style="margin-top: 20px" "><a href="teacherdashboard.php" >Home</a></li>
            <li><a href="studentedit.php">Edit Profile</a></li>
            <li><a href="assignment_upload.php" style="background-color: deepskyblue;color: white" class="active">My Assignments</a></li>

        </ul>
    </div>

    <div class="col-md-10 content">
        <div style="height: 400px" class="panel panel-default">
            <div class="panel-heading" style="background-color: deepskyblue;">
                <h4><strong>UPLOADS</strong></h4>
            </div>
            <div class="panel-body">
                <div><h4> Add your assignment here </h4><br>


                </div>
                <div class="form-group">
                    <form class="form-group" method="POST" action="teacher_assignupload.php" enctype="multipart/form-data">

                        <fieldset style="margin-right: 1000px; >
                            <input type="hidden" name="exid" value='<?php echo $exid;?>'>
                        <input type="file" name="file" class="form-control-file">
                        <input type="submit" class="btn" style="background-color: deepskyblue;color: white;float: right;" name="submit" value="Submit">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div style="position: center;margin-top: 400px" class="container-fluid">
        <footer class="pull-left footer">
            <p>
            <hr class="divider">
            Copyright &COPY; 2018 <a href="index.php">Connection:Online Assignment Submission</a>
            </p>
        </footer>
    </div>

