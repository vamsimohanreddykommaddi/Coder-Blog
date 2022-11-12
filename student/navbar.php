<?php 
session_start();
include "../connection.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>navbar-student</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1">

	<!--below three links for bootstrap for better response of form we add classes to input fields it makes seen nice and easy to use-->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	
	<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand active">CODER BLOG</a>
				</div>
					<ul class="nav navbar-nav">
						<li><a href="../feedback.php">FEEDBACK</a></li>
					</ul>
					<?php 
					if(isset($_SESSION['login_user']))
						{
							?>
						<ul class="nav navbar-nav">	
								
									<li><a href="../profile.php">PROFILE</a></li>
									<li><a href="../previous_programs.php">PREVIOUS PROGRAMS</a></li>
									<?php
									if($_SESSION['id']==2){
									?>
									<li><a href="submit_answer.php">SUBMIT ANSWER</a></li>
									<li><a href="execute.php">EXECUTE</a></li>
									<li><a href="submissions.php">SUBMISSIONS</a></li>
									<?php
								}
								?>

						</ul>
						<ul class="nav navbar-nav navbar-right">
						<li><a><p style="color:red;font-size:15px;" id="demo"></p></a></li>
						<li><a href="../profile.php">
							<div style="color:white;">
									<?php
										echo "<img class='img-circle profile_img' width=30 height=30 src='../images/".$_SESSION['pic']."'>";
									 	echo " ".$_SESSION['login_user'];
									 	?>
								</div>
							</a><li>
							<li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
						</ul>
						<?php
					}
					else{
					?>
						<ul class="nav navbar-nav navbar-right">
						<li><a href="../login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
						<li><a href="../signup.php"><span class="glyphicon glyphicon-user"> SING UP</span></a></li>
					</ul>
					<?php 
					}?>	
			</div>
					
		</nav>
</body>
</html>