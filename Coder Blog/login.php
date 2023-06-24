<?php
	include "connection.php";
	include "navbar.php";
?>

<html>
<head>
	<title>student login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<style>
		body{
			background-image:url('images/logback.jpg');
			background-attachment: fixed;
			background-position: absolute;
			background-size: cover;
		}
		section{
			margin-top:-20px;
		}
		.box1{
			height: 450px;
			width:420px;
			background-color:black;
			margin:-20px auto;
			color:white;
			padding:20px;
		}
		label{
			font-size:18px;
			font-weight:600px;
		}
		.box2{
			padding-left:50px;
		}
	  .btn{
		width:100px;
		background-color: #99ceb1;
		color:white;
		height:30px;
		}
	  
	  h1{
		font-weight: bold;
	  }
	  .re{
		display: inline-flex;
	  }
	  
	</style>
</head>
<body> 
		<section>
			<div class="login_image">
				<br><br><br>  <!--this makes the  the box put in center and the white space between header and section cleared-->
				<div class="box1"> 
				<!--to place it in center of box -->
					<h1 style="text-align:center;font-size:30px;word-spacing:15px; ">CODER BLOG</h1>
					<h1 style="text-align:center;font-size:20px;">Login Form</h1>
					<form name="login" action="" method="post"><!--form -->
						<b><p style="padding-left:50px;font-size:15px;font-weight:700;">Login as:</p></b>
						<input style="margin-left:50px;width:18px;" type="radio" name="user" value="admin" id="admin">
						<label for="admin">Admin</label>
						<input style="margin-left:50px;width:18px;" type="radio" name="user" value="student" id="student" checked="">
						<label for="student">Student</label>
						<div class="form_input"> <!-- box for to keep right position in another box-->
							<br><label class="required">Username:</label>
							<div class="re"><input class="form-control" type="text" name="username" placeholder="username" required="">
								<span style="color:red;font-size: 25px;font-weight: bold;margin-left: 7px;">*</span></div><br>
							<label class="required">Password:</label>
							<div class="re"><input class="form-control" type="password" name="password" placeholder="password" required="">
								<span style="color:red;font-size: 25px;font-weight: bold;margin-left: 7px;">*</span></div><br><br>
							<input class="btn btn-default" type="submit" name="submit" value="Login">
							<input class="btn btn-default" type="reset" name="submit" value="RESET" style="margin-left:35px">
						</div><br>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="forgot.php" style="color:yellow;width:130px;height:30px;text-decoration: none;">forgot password?</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						New to this Website?&nbsp;&nbsp;<a href="signup.php" style="color:yellow;text-decoration:none;">Sign Up</a> 
					</p>
					</form>
				</div>
			</div>
		</section>
		<?php
			if(isset($_POST['submit'])){
				if($_POST['user']=='admin'){
					$count=0;
					$res=mysqli_query($db,"SELECT * FROM admin_login WHERE username='$_POST[username]';");
					$row=mysqli_fetch_assoc($res);
					$count=mysqli_num_rows($res);
					if($count==0)
					{
					?>
					<!-- <script type="text/javascript">
					alert("username and passowrd doesn't match ");
					</script> -->
						<div class="alert alert-danger" style="width:600px; margin-left:400px;background-color: red;margin-top:-70px;">
							<p style="color:white;"><strong>username doesn't exist</strong></p>
						</div>
					<?php
					}
					else{
					/*if username and password matches -------*/
						$password1=$_POST['password'];
						$password2=$row['password'];
						if($password1==$password2){
							$_SESSION['login_user']=$row['username'];
							$_SESSION['id']=1;
							$_SESSION['pic']= $row['image'];
							?>
							<script type="text/javascript">
								window.location="previous_programs.php"
							</script>
							<?php
						}
						else{
							?>
							<div class="alert alert-danger" style="width:600px; margin-left:400px;background-color: red;margin-top:-70px;">
								<p style="color:white;"><strong>password is incorrect</strong></p>
							</div>
						<?php
						}
					}
				}
				else{
						$count1=0;
						$res=mysqli_query($db,"SELECT * FROM student_login WHERE username='$_POST[username]';");
						$row=mysqli_fetch_assoc($res);
						$count1=mysqli_num_rows($res);
						if($count1==0)
						{
						?>
									
									<div class="alert alert-danger" style="width:600px; margin-left:400px;background-color: red;margin-top:-90px;">
										<p style="color:white;"><strong>username doesn't exist</strong></p>
									</div>
								<?php
						}
						else{
							$password1=$_POST['password'];
							$password2=$row['password'];
							if($password1==$password2){
								$_SESSION['id']=2;
								$_SESSION['login_user']=$row['username'];
								$_SESSION['pic']= $row['image'];
								?>
								<script type="text/javascript">
									window.location="previous_programs.php"
								</script>
								<?php
							}
							else{
								?>
								<div class="alert alert-danger" style="width:600px; margin-left:400px;background-color: red;margin-top:-90px;">
										<p style="color:white;"><strong>password is incorrect</strong></p>
									</div>
								<?php

							}
						}
				}
			}
		?>
		
		
</body>
</html>