<?php
require('config.php');
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$dob = $_POST["dob"];
$studentid = $_POST["student_id"];
$department = $_POST["department"];
$course = $_POST["course"];
$password = $_POST["password"];
$email = $_POST["email"];
$course=$_POST["course"];

//$password_hashed=md5($password);

switch ($_POST['REQ_TYPE']) {

    case 'add_student':
                $query = "SELECT * FROM student_user WHERE email = '" . $email . "'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "Email is already in use.<br>";
        } else {
            $sql = "INSERT INTO student_user (firstname, lastname, department, email,dob, username,password,phone,address,student_id,course) VALUES ('$firstname', '$lastname', '$department', '$email' , '$dob', '$username', '$password', '$phone', '$address', '$studentid', '$course')";
            if ($db->query($sql) === TRUE) {
                echo '<div data-alert class="alert-box success radius">';
                echo  '<b>User added Successfully !!</b> ' ;
                echo  '<a href="#" class="close">&times;</a>';
                echo '</div>';
                header('refresh:1;url=admindashboard.php');
            }
        }
        break;
    case 'add_teacher' :
        $teacherid = $_POST["teacher_id"];
        $query = "SELECT * FROM teacher_user WHERE email = '" . $email . "'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "Email is already in use.<br>";
        } else {
            $sql = "INSERT INTO teacher_user (firstname, lastname, department, email,dob, username,password,phone,address,teacher_id,experience) VALUES ('$firstname', '$lastname', '$department', '$email' , '$dob', '$username', '$password_hashed', '$phone', '$address', '$teacherid', '$experience')";
            if ($db->query($sql) === TRUE) {
                header('Location:message.php');

            }


        }
}


?>