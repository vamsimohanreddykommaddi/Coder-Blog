<?php 
session_start();
include "connection.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>nav page</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!--compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


</head>
<body>
	
	<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand active">CODER BLOG</a>
				</div>
					<ul class="nav navbar-nav">	
					<?php 
					if(isset($_SESSION['login_user']))
					{
							?>
									<li><a href="feedback.php">FEEDBACK</a></li>
									<li><a href="profile.php">PROFILE</a></li>
									<li><a href="previous_programs.php">PREVIOUS PROGRAMS</a></li>
									<?php
									if($_SESSION['id']==1){
										?>
										<li><a href="admin/post_question.php">POST QUESTION</a></li>
										<li><a href="admin/submitted_answers.php">PROGRAM SUBMISSION</a></li>
										<?php
									}
									else{
										?>
										<li><a href="student/submit_answer.php">SUBMIT ANSWER</a></li>
										<li><a href="student/execute.php">EXECUTE</a></li>
										<li><a href="student/submissions.php">SUBMISSIONS</a></li>
										<?php
									}
					}
					else{
						?>
						<li><a href="index.php">HOME</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
						<?php
					}
					?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<?php
					if(isset($_SESSION['login_user']))
					{
						?>

						<li><a href="profile.php">
							<div style="color:white;">
									<?php
										echo "<img class='img-circle profile_img' width=30 height=30 src='images/".$_SESSION['pic']."'>";
									 	echo " ".$_SESSION['login_user'];
									 	?>
								</div></a><li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
						</ul>
						<?php
						}
						else{
					?>
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
						<li><a href="signup.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
					<?php 
					}?>	
					</ul>
			</div>
					
		</nav>
</body>
</html>