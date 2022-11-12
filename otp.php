<?php
	session_start();
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>OTP confirmation</title>
<style>
	body{
		margin: 0;
		padding: 0;
		/*background-color:#6abadeba;*/
		background-image: url('images/p17.jpg');
		background-repeat: no-repeat;
		background-size: cover;
		/*background-position: center*/;
		font-family: sans-serif;
	}
	.container{
		width:320px;
		height: 300px;
		/*background: grey;*/
		color: black;
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
		color: blue;
		background-color: yellow;

	}
	button{
		width:40%;
		padding:0px;
		margin:10px 0px;
		cursor: pointer;
	}
	.container input{
		width: 100%;
		margin-bottom: 20px;
	}

	.container input[type=number]{
		border: none;
		border-bottom: 1px solid black;
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
		color:red;
		opacity: 0.7;
		background-color: skyblue;
		border: none;}
		.container button[type=submit]{
		outline: none;
		height: 40px;
		font-size: 18px;
		border-radius: 20px;
	}
	h1{
		margin: 50px;
		padding:0 0 20px;
		text-align: center;
		font-size: 30px;
		color:black;
	}
	.a {
		text-align: center;
	}
	</style>
</head>
<body>
	<div class="a"><h3>Email sent to <?php echo $_SESSION['email']; ?></h3></div>
<center>
<h1>OTP Confirmation</h1>
</center>
<form method="post">
<div class="container">
<p>OTP</p>
<input type="number" placeholder="Enter OTP" name="otp"required>
<button input type="submit" value="submit" name="submit">submit</button>
</div>
</form>
<?php
	//at forgot password
	//when the submit button is pressed
	if(isset($_POST['submit']) && isset($_SESSION['fid'])){
		//checking whether the otp is set or not
		date_default_timezone_set('Asia/Kolkata');
		$var1=strtotime($_SESSION['date']);
		$var2=strtotime($_SESSION['time']);
		$var3=strtotime(date('Y-m-d'));
		$var4=strtotime(date('H:i:s'));
		$diff1=$var3-$var1;      //returns in seconds
		$diff2=$var4-$var2;
		//checking the time out
		if($diff1==0 && $diff2<=120){ //max 2 minutes
			//for forgot password
			if(isset($_SESSION['otp2'])){
				$number=$_POST['otp'];
				if($_SESSION['otp2']==$number){  //checking whether the otp is valid or not
					unset($_SESSION['otp2']);
					unset($_SESSION['email']);
					unset($_SESSION['date']);
					unset($_SESSION['time']);
				?>
					<script type="text/javascript">
						window.location="new_pass.php";
					</script>
				<?php
				}
				else{
					unset($_SESSION['otp2']);
					unset($_SESSION['username2']);
					unset($_SESSION['email']);
					unset($_SESSION['date']);
					unset($_SESSION['time']);
					?>
						<script type="text/javascript">
							alert("invalid OTP");
							window.location="forgot.php";
						</script>
					<?php
				}
			}//end of otp2

			//at signup
			if(isset($_SESSION['otp1'])){
				$number=$_POST['otp'];
				if($_SESSION['otp1']==$number){  //cehcking whether the otp is valid or not
					$sql1=mysqli_query($db,"SELECT * FROM register1 WHERE username='".$_SESSION['username']."';");
					$row1=mysqli_fetch_assoc($sql1);
					mysqli_query($db,"INSERT INTO student_login(`first_name`,`last_name`,`username`,`password`,`email`,`contact`) VALUES('$row1[first_name]','$row1[last_name]','$row1[username]','$row1[password]','$row1[email]','$row1[contact]');");
					mysqli_query($db,"DELETE FROM register1 WHERE username='".$_SESSION['username']."';");
					$_SESSION['login_user']=$_SESSION['username'];
					$_SESSION['id']=2;
					$_SESSION['pic']=$row1['image'];
					unset($_SESSION['username']);
					unset($_SESSION['fid']);
							unset($_SESSION['opt1']);
							unset($_SESSION['email']);
							unset($_SESSION['date']);
							unset($_SESSION['time']);
				?>

					<script type="text/javascript">
							alert("Registration request successfully done!..");
							window.location="previous_programs.php";
					</script>
				<?php
				}
				else{
					?>
						<script type="text/javascript">
							unset($_SESSION['username']);
							unset($_SESSION['fid']);
							unset($_SESSION['opt1']);
							unset($_SESSION['email']);
							unset($_SESSION['date']);
							unset($_SESSION['time']);
							alert("invalid OTP");
							window.location="forgot.php";
						</script>
					<?php
				unset($_SESSION['otp1']);
				unset($_SESSION['username']);
				}
			} //end of otp1
		}
		else{
			?>
				<script type="text/javascript">
					alert("The OTP is TIME OUT");
					window.location="forgot.php";
				</script>
			<?php
		}
	}
?>
</body>
</html>

