<?php 
session_start();
include "../connection.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin navbar</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

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
									if($_SESSION['id']==1){
									?>
									<li><a href="submitted_answers.php">PROGRAMS SUBMISSION</a></li>
									<li><a href="post_question.php">POST QUESTION</a></li>
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