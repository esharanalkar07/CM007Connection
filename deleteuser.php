<?php
include ('config.php');

$sql= "SELECT * FROM student_user";
$records= mysqli_query($db,$sql);

$studentuser=mysqli_fetch_assoc($records);
$student_id=$studentuser['student_id'];

$sqlQry = "delete from student_user where student_id=$student_id";
$res = $db->query($sqlQry);
if($res)
{
    echo "<p>Record with Username = username, is deleted successfully.</p>";
    header('Location:viewstuds.php');
}
else
{
    echo "<p>Error in deleting the record..exiting...</p>";
    exit();
}
?>