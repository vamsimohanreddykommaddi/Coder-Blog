<?php
	session_start();
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Forgot Page</title>
<style>
	body{
		margin: 0;
		padding: 0;
		background-image: url('images/p16.jpg');
		background-repeat: no-repeat;
		background-size: cover;
		/*background-position: center;*/
		font-family: sans-serif;
	}
	.container{
		width:320px;
		height: 300px;
		background: black;
		color: white;
		top: 50%;
		left:50%;
		position:absolute;
		transform: translate(-50%,-50%);
		box-sizing: border-box;
		padding: 50px 20px;
	}
	.container p{
		margin:0;
		padding:0;
		font-weight: bold;
	}
	.container a{
		text-decoration: none;
		font-size: 12px;
		line-height: 20px;
	}
	.container a:hover{
		color: #ffc107;

	}
	button{
		width:40%;
		padding:0px;
		margin:10px 0px;
		cursor: pointer;
	}
	.container input{
		width: 100%;
		margin-bottom: 0px;
		color:white;
	}

	.container input[type=text]{
		border: none;
		border-bottom: 1px solid #fff;
		background: transparent;
		outline: none;
		width: 50%;
		height: 40px;
		font-size: 16px;
		margin: 8px 0;
		padding: 12px 20px;
		display: inline-block;
	}
	button:hover{
		color: #ffc107;
		opacity: 0.7;
		border: none;
	}
	.container button[type=submit]{
		outline: none;
		height: 40px;
		font-size: 18px;
		border-radius: 20px;
	}
	h1{
		margin: 100px;
		padding:0 0 20px;
		text-align: center;
		font-size: 30px;
		color:black;
	}
	</style>
</head>
<body>
<center>
<h1> Forgot Password </h1>

<form method="post">
<div class="container">
	<input style="margin-left:20px;width:18px;margin-top: -10px;" type="radio" name="user" value="admin" id="admin">
	<label for="admin">Admin</label>
	<input style="margin-left:50px;width:18px;" type="radio" name="user" value="student" id="student" checked="">
	<label for="student">Student</label>
	<br/><br/><p>USERNAME:</p>
	<input type="text" placeholder="username"name="username"required>
	<button input type="submit" value="SEND" name="submit">submit</button>
</div>
</form>
</center>
<?php
	if(isset($_POST['submit'])){
		$uname=$_POST['username'];
		if($_POST['user']=='admin'){
			$sql=mysqli_query($db,"SELECT username,email FROM admin_login where username='$uname';");
			$_SESSION['fid']=1;
		}
		else{
			$sql=mysqli_query($db,"SELECT username,email FROM student_login where username='$uname';");
			$_SESSION['fid']=2;
		}
		$res=mysqli_num_rows($sql);
		if($res==1){
			date_default_timezone_set('Asia/Kolkata');
			$otp2= rand(100000,999999);
			$var1=date('Y-m-d');
			$var2=date('H:i:s');
			$row=mysqli_fetch_assoc($sql);
			$uname=$row['username'];
			$email=$row['email'];
			mysqli_query($db,"INSERT INTO register2 VALUES('$row[username]','$row[email]','$var1','$var2');");
			$_SESSION['otp2']=$otp2;
			$_SESSION['username2']=$_POST['username'];
			$_SESSION['email']=$row['email'];
			$_SESSION['date']=$var1;
			$_SESSION['time']=$var2;

			?>
				<script type="text/javascript">
					window.location="indes.php";
				</script> 
			<?php
		}
		else{
			unset($_SESSION['fid']);
			?>
				<script type="text/javascript">
					alert("entered username not recorded");
					window.location="signup.php";
				</script>
			<?php
		}
	}
?>
</body>
</html>

