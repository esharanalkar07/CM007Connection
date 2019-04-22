<?php 
include 'config.php';

	$sql= "SELECT * FROM student_user";
	$records= mysqli_query($db,$sql);
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script type="text/javascript">
var uploadField = document.getElementById("file");

uploadField.onchange = function() {
    if(this.files[0].size > 307200){
       alert("File is too big!");
       this.value = "";
    };
};
</script>

<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="studentdashboard.php">
				<h4><strong>ADMINISTRATOR'S DASHBOARD</strong></h4>
			</a>
		</div>
		
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
        <div class="col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li class="active" ><a href="admindashboard.php" style="background-color: deepskyblue;color: black">Dashboard</a></li>


                <li><a href="viewteach.php">View All Teachers</a></li>
                <li><a href="#">Manage Uploads</a></li>

            </ul>
        </div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:deepskyblue;color: black">
                    <h4><strong>STUDENTS</strong></h4>
                </div>
                <div class="panel-body">
                	<table class="table table-hover">
                		<tr>
                			<th>Firstname</th>
                			<th>Lastname</th>
                			<th>Department</th>
                			<th>Email Address</th>
                			<th>Student Id</th>

                		</tr>
                		<?php 
                		
                		while ($studentuser=mysqli_fetch_assoc($records)) {
                			echo "<tr>";

                			echo "<td>".$studentuser['firstname']."</td>";

                			echo "<td>".$studentuser['lastname']."</td>";

                			echo "<td>".$studentuser['department']."</td>";

                			echo "<td>".$studentuser['email']."</td>";

                			echo "<td>".$studentuser['student_id']."</td>";

                            echo "<td><a style='border-style: groove' name='del_student' href='deleteuser.php'>Delete User</a> </td>";

                			echo "</tr>";
                		} //end while

                		?>
                	</table>
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