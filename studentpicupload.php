<?php
include ('config.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: studentlogin.php');
}
$sql = "SELECT firstname, student_id, lastname, course, email, phone, username,img_url FROM student_user WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);

// Upload feature
	        $output_dir = "profile_pictures/";
		$allowedExts = array("jpg", "jpeg", "gif", "png","JPG",);
		$extension = @end(explode(".", $_FILES["myfile"]["name"]));
		    if(isset($_POST['upload']))
		    {
		        $user=$row['username'];
			    //Filter the file types , if you want.
			    if ((($_FILES["myfile"]["type"] == "image/gif")
				    || ($_FILES["myfile"]["type"] == "image/jpeg")
				    || ($_FILES["myfile"]["type"] == "image/JPG")
				    || ($_FILES["myfile"]["type"] == "image/png")
				    || ($_FILES["myfile"]["type"] == "image/pjpeg"))
				    && ($_FILES["myfile"]["size"] < 10000000)
				    && in_array($extension, $allowedExts))
			    {
				      if ($_FILES["myfile"]["error"] > 0)
					    {
					    echo "Return Code: " . $_FILES["myfile"]["error"] . "<br>";
					    }
				    if (file_exists($output_dir. $_FILES["myfile"]["name"]))
				      {
				      unlink($output_dir. $_FILES["myfile"]["name"]);
				      }
					    else
					    {
					    $pic=$_FILES["myfile"]["name"];
					    $conv=explode(".",$pic);
					    $ext=$conv['1'];

					    //move the uploaded file to uploads folder;
				          move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$user.".".$ext);

					    $pics=$output_dir.$user.".".$ext;


					    $url=$user.".".$ext;

					    $update="update student_user set img_url='$url' where username='$user'";

					    if($db->query($update)){
						   echo '<div data-alert class="alert-box success radius">';
						      echo  '<b>Success !</b>  Image Updated' ;
						      echo  '<a href="#" class="close">&times;</a>';
						    echo '</div>';
						   header('refresh:2;url=studentdashboard.php');
					    }
					    else{
						    echo '<div data-alert class="alert-box alert radius">';
						      echo  '<b>Error !</b> ' .$db->error ;
						      echo  '<a href="#" class="close">&times;</a>';
						    echo '</div>';
					    }



					    }

			    }
			    else{

			       echo '<div data-alert class="alert-box warning radius">';
			        echo  '<b>Warning !</b>  File not Uploaded, Check image' ;
			        echo  '<a href="#" class="close">&times;</a>';
				echo '</div>';

			    }

		    }
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

            <p><font size="2"; color="black"> <strong> Student Id : <?php echo $row['student_id']; ?></strong></p>
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

            <li  ><a href="studentdashboard.php" >Home</a></li>
            <li ><a href="studentpicupload.php"class="active" style="background-color: deepskyblue;color: white">Change Photo</a></li>
            <li style="margin-top: 20px" ><a href="#">Change Details</a></li>
            <li><a href="passwordchange.php">Change Password</a></li>

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
                <div style="margin-top:100px; border-style: groove;background-color: lightskyblue ;padding-top: 30px;margin-left: 300px;width: 300px;padding-left: 30px" id="profileinfo"> <strong><font size="3"; color="black">
                <form action="studentpicupload.php" method="post" enctype="multipart/form-data">
                    Upload a Photo:
                    <input type="file" name="myfile" id="fileToUpload">
                    <input type="submit" name="upload" value="Upload File Now" >
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

