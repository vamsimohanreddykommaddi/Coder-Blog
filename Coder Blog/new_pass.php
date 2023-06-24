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
		/*background-color:#6abadeba; */

		background-image: url('images/p17.jpg');
		background-repeat: no-repeat;
		background-size: cover;
		/*background-position: center;*/
		font-family: sans-serif;
	}
	.container{
		width:320px;
		height: 320px;
		background: grey;
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
		margin:10px 0px;
		cursor: pointer;
	}
	.container input{
		width: 100%;
		margin-bottom: 0px;
	}

	.container input[type=password]{
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
		color: red;
		background-color: skyblue;
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
<center>
<form action="#" method="post" class="form.wrap">
<div class="container">
<p>NEW PASSWORD:</p>
<input type="password" placeholder="new password" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="">
<p>CONFIRM PASSWORD:</p>
<input type="password" placeholder="confirm password" name="password2" required="">
<button input type="submit" value="SEND" name="submit">submit</button>
</div>
</form>
<?php
	if(isset($_POST['submit']) && isset($_SESSION['fid'])){
		$password1=$_POST['password1'];
		$password2=$_POST['password2'];
			if($password1==$password2){
				if($_SESSION['fid']==2){
					mysqli_query($db,"UPDATE student_login SET password='$password1' WHERE username='".$_SESSION['username2']."';");
					$b1=mysqli_query($db,"SELECT username,image FROM student_login WHERE username='".$_SESSION['username2']."';");
					$row=mysqli_fetch_assoc($b1);
					$_SESSION['login_user']=$row['username'];
					$_SESSION['id']=2;
					$_SESSION['pic']= $row['image'];
					?>
					<script type="text/javascript">
						alert("password changed successfully");
						window.location="previous_programs.php";
					</script>
				<?php
				}
				else{
					mysqli_query($db,"UPDATE admin_login SET password='$password1' WHERE username='".$_SESSION['username2']."';");
					$b1=mysqli_query($db,"SELECT username,image FROM admin_login WHERE username='".$_SESSION['username2']."';");
					$row=mysqli_fetch_assoc($b1);
					$_SESSION['login_user']=$row['username'];
					$_SESSION['id']=1;
					$_SESSION['pic']= $row['image'];
					?>
					<script type="text/javascript">
						alert("password changed successfully");
						window.location="previous_programs.php";
					</script>
				<?php
				}
			}
			else{
				?>
				<script type="text/javascript">
					alert("password mismatch");
				</script>
				<?php
			}
	}
?>
</body>
</html>

