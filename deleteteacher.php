<?php
include ('config.php');

$sql= "SELECT * FROM teacher_user";
$records= mysqli_query($db,$sql);

$teacheruser=mysqli_fetch_assoc($records);
$teacher_id=$teacheruser['teacher_id'];

$sqlQry = "delete from teacher_user where teacher_id=$teacher_id";
$res = $db->query($sqlQry);
if($res)
{
    echo "<p>Record with Username = username, is deleted successfully.</p>";
    header('Location:viewteach.php');
}
else
{
    echo "<p>Error in deleting the record..exiting...</p>";
    exit();
}
?>