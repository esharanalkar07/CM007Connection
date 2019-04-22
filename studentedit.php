<?php
include ('config.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: studentlogin.php');
}
$sql = "SELECT firstname, student_id,department, lastname, course, email, phone, address, username, dob, img_url FROM student_user WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);

if(isset($_POST['update'])) {

// Get data from the parameters below
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $department = $_POST["department"];
    $course = $_POST["course"];
    $email = $_POST["email"];
   $username = $row ["username"];

  $sql="UPDATE student_user SET firstname ='$firstname',lastname='$lastname', phone= '$phone', address= '$address',
       dob= '$dob', department= '$department',course='$course' WHERE username = '$username'" ;

    if(mysqli_query($db, $sql)){
        header('Location: studentedit.php');
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
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
            <li ><a href="studentpicupload.php">Change Photo</a></li>
            <li style="margin-top: 20px" class="active" style="background-color: deepskyblue;color: white"><a href="#">Change Details</a></li>
            <li><a href="passwordchange.php">Change Password</a></li>

        </ul>
    </div>
    <div  class="col-md-10 content">
        <div style="height: 457px"class="panel panel-default">
            <div class="panel-heading" style="background-color: deepskyblue;">

                <h4 style="text-transform: uppercase"><strong><font size="2"; color="black"> <?php echo $row['firstname']." ".$row['lastname']." " ?>Profile </font> </strong></h4>
            </div>
            <div class="panel-body">

                <form  class="signup-form" action="" method="post"> <strong>
                    <table id="updatedata">
                    <tr ><td>  Firstname  </td><td>  <input style="background-color: lightblue" style="text-transform: uppercase; height: 30px" type="text" name="firstname" value="<?php echo $row['firstname']; ?>" autocomplete="off" class="box"/><br /><br />
                    <tr><td>  Lastname  </td><td>  <input style="background-color: lightblue" style="text-transform: uppercase; height: 30px"type="text" name="lastname" value="<?php echo $row['lastname']; ?>" autocomplete="off" class="box"/><br /><br />
                    <tr><td>  Email  </td><td>  <input style="background-color: lightblue" type="email" name="email" value="<?php echo $row['email']; ?>" autocomplete="off" class="box"/><br /><br />
                    <tr><td>  Date of Birth  </td><td>  <input style="background-color: lightblue"type="date" name="dob" value="<?php echo $row['dob']; ?>"autocomplete="off" class="box"/><br /><br />
                    <tr><td>  Address  </td><td>  <input style="background-color: lightblue" type="text" name="address" value="<?php echo $row['address']; ?>"  autocomplete="off" class="box"/><br /><br />
                    <tr><td>  Phone  </td><td>  <input style="background-color: lightblue" type="int" name="phone"  value="<?php echo $row['phone']; ?>"autocomplete="off" class="box"/><br /><br />
                    <tr><td>  Department  </td><td>  <input style="background-color: lightblue" style="text-transform: uppercase; height: 30px"type="text" name="department" value="<?php echo $row['department']; ?>" autocomplete="off" class="box"/><br /><br />
                    <tr><td>  Course  </td><td>  <input style="background-color: lightblue" style="text-transform: uppercase; height: 30px"type="text" name="course" value="<?php echo $row['course']; ?>" autocomplete="off" class="box"/><br /><br />

                        <tr><td>       </td><td>   <input  type="submit" name='update' value="Update" class='submit'/>
                    </strong>
                </form>

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
</html>