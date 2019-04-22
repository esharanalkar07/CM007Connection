<?php
include 'config.php';

//session_start();
// If form submitted, insert values into the database.
if (isset($_POST['submit'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['a_username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($db, $username);
    $password = stripslashes($_REQUEST['a_password']);
    $password = mysqli_real_escape_string($db, $password);
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `admin_user` WHERE a_username='$username'
and a_password='$password'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['a_username'] = $username;
        // Redirect user to index.php
        header("Location: admindashboard.php");
    } else {
        echo "Username or Password Invalid";
    }
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>AdminLogin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<!------ Include the above in your HEAD tag ---------->
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="active navbar-brand" href="index.php">Connection</a>
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
<div id="login">
    <h3 class="text-center text-white pt-5"></h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="" method="post">
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="a_username" id="username" class="form-control"autocomplete="off>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="a_password" id="password" class="form-control"autocomplete="off>
                        </div>
                        <div class="form-group">
                            <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
