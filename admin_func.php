<?php
require('config.php');
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