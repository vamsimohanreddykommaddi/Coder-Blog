<?php
	include "connection.php";
	include "navbar.php";
?>
<html>
<head>
	<title>student registration</title>
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


	<style>
		section{
			margin-top:-20px;
			align:center;
		}
		body{
			background-image:url('images/signback.jpg');
			background-repeat:no-repeat;
			background-size: cover;
		}
		.box2{
			height: 550px;
			width:400px;
			color:white;
			background-color:black;
			margin:0px auto;
			opacity:0.7;
		}
			
	</style>
	<script type="text/javascript">
		function validateForm()
		{
			var unamelen=document.registration.username.length;
			if(unamelen==0||unamelen<6||unamelen>12)
			{
				alert("user name must be between 6 to 12 characters");
				document.registration.username.focus();
				return false;
			}
			var uname_re=/^[a-zA-Z]+$/;
			if(!document.registration.username.value.match(uname_re))
			{
				alert("enter only characters for user name");
				document.registration.username.focus();
				return false;
			}
			var passlen=document.registration.password.value.length;
			if(passlen==0||passlen<8||passlen>12)
			{
				alert("password length must be between 8 to 12 characters");
				document.registration.password.focus();
				return false;
			}
			var pass_re=/[a-zA-z1-9@$&*]{10}/;
			if(!document.registration.password.value.match(pass_re))
			{
				alert("password pattern not matched");
				document.registration.password.focus();
				return false;
			}
			var pass1=document.registration.password.value;
			var pass2=document.registration.cpassword.value;
			if(pass1!=pass2)
			{
				alert("passwords not matched");
				document.registration.password.focus();
				return false;
			}
			var email_re=/[a-z1-9]{10}@[a-z]{5}\.com/;
			if(!document.registration.email.value.match(email_re))
			{
				alert("enter a valid email");
				document.registration.email.focus();
				return false;
			}
			return true;
		}
	</script>

</head>
<body> 
	
		<section>
			<div class="registration_image">
				<div class="box2"> 
					<br>
					<h1 style="text-align:center;font-size:30px;word-spacing:15px; ">CODER BLOG</h1>
					<h1 style="text-align:center;font-size:20px;">User Registration Form</h1>
					<form name="registration" onsubmit= "return validateForm()" method="post"><!--form -->
					<center>
						<div>
							<input class="form-control" type="text" name="firstname" placeholder="First Name" required=""><br>
							<input class="form-control" type="text" name="lastname" placeholder="Last Name" required=""><br>
							<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
							<input class="form-control" type="password" name="password" placeholder="password" required=""><br>
							<input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
							<input class="form-control" type="text" name="contact" placeholder="Phone" required=""><br>
							<input  class="form-control" type="file" name="profile" placeholder="upload profile"><br>
							<input  type="submit" name="submit" value="Sign Up" style="color:black;width:100px;height:30px;">
						</div>
					</center>
					</form>
					
				</div>
			</div>
		</section>
		<?php
			if(isset($_POST['submit']))
			{
				$sql=mysqli_query($db,"SELECT username FROM student_login where username='$_POST[username]';");
				$res=mysqli_num_rows($sql);
				if($res!=1){
						mysqli_query($db,"INSERT INTO student_login(`first_name`,`last_name`,`username`,`password`,`email`,`contact`,`image`) VALUES('$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]','$_POST[profile]');");
						?>
						<script type="text/javascript">
							alert("Registration request successfully done!..");
							window.location="login.php"
						</script>
						<?php
				}
				else{
				?>
					<script type="text/javascript">
						alert("username already exist");
					</script>
				<?php
				}
			}
		?>
		
</body>
</html>