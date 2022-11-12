<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style>
		body{
			background-image:url('images/mback1.jpg');
			background-attachment: fixed;
			background-position: absolute;
			background-size: cover;
		}
		.form-control{
			width:300px;
			height:40px;
		}
		form{
			padding-left:50px;
			margin-top:-10px;
		}
		label{
			color:white;
		}
		.wrapper{
			width:400px;
			height:570px;
			margin:20px auto;
			border-radius: 20px;
			background-color: grey;
			border: 5px solid black;
			margin-top:40px;
		}
		h2{
			text-align: center;
			color:black;
			font-weight: bold;
		}
	</style>
</head>
<body style="background-color:#004528;">
	<?php if(isset($_SESSION['login_user'])){?>
	<h2>Edit Information</h2>
	<?php 
		if(isset($_SESSION['login_user'])){
				if($_SESSION['id']==2){
					$sql="SELECT first_name,last_name,contact,image FROM student_login WHERE username='$_SESSION[login_user]';";
					$result=mysqli_query($db,$sql);
				}
				else if($_SESSION['id']==1){
					$sql="SELECT first_name,last_name,contact,image FROM admin_login WHERE username='$_SESSION[login_user]';";
					$result=mysqli_query($db,$sql);
				}
					$row=mysqli_fetch_assoc($result);
					$first=$row['first_name'];
					$last=$row['last_name'];
					$contact=$row['contact'];
					$image=$row['image'];

					 ?>
					 <div class="wrapper">
					<div class="profile_info" style="text-align:center;">
						<span style="color:white;"><h3>Welcome,</h3></span><br>
						<h3 style="color:white;"><?php echo $_SESSION['login_user']; ?></h3>
					</div><br><br>
					<form method="post" enctype="multipart/form-data" action="">
						<input class="form-control" type="file" name="dp">
						<label><h4><b>First Name</b></h4></label>
						<input type="text" name="first" class="form-control" value="<?php echo $first;?>">
						<label><h4><b>Last Name</b></h4></label>
						<input type="text" name="last" class="form-control" value="<?php echo $last;?>">
						<label><h4><b>Contact</b></h4></label>
						<input type="text" name="contact" class="form-control" value="<?php echo $contact;?>"><br><br>
						<div style="padding-left:100px;"><button class="btn btn-default" type="submit" name="submit">Save</button></div>
					</form>
				</div>
					<?php
						if(isset($_POST['submit'])){
							$first=$_POST['first'];
							$last=$_POST['last'];
							$contact=$_POST['contact'];
							$pic=$_FILES['dp']['name'];
							$tm=$_FILES['dp']['tmp_name'];
							$ext=explode(".", $pic);
							$dec=0;
							$cn=count($ext);
							if($ext[$cn-1]=='jpg' || $ext[$cn-1]=='png' || $ext[$cn-1]=='jpeg'){
									move_uploaded_file($tm, "images/".$pic);
									$dec=1;
							}
							if($_SESSION['id']==1){
									if($pic=='' || $dec==0){
										$sql1="UPDATE admin_login  SET first_name='$first',last_name='$last',contact='$contact' WHERE username='".$_SESSION['login_user']."';";
									}
									else{
										$sql1="UPDATE admin_login  SET first_name='$first',last_name='$last',contact='$contact',image='$pic' WHERE username='".$_SESSION['login_user']."';";
										$_SESSION['pic']=$pic;
									}
							}
							else{
									if($pic=='' || $dec==0){
										$sql1="UPDATE student_login  SET first_name='$first',last_name='$last',contact='$contact' WHERE username='".$_SESSION['login_user']."';";
									}
									else{
										$sql1="UPDATE student_login  SET first_name='$first',last_name='$last',contact='$contact',image='$pic' WHERE username='".$_SESSION['login_user']."';";
										$_SESSION['pic']=$pic;
									}

							}
							if($pic==''){
								$dec=1;
							}
							if($dec==0){
									?>
									<script type="text/javascript">
										alert("image should be valid");
									</script>
									<?php

							}
							if(mysqli_query($db,$sql1) && $dec==1){
									?>
									<script type="text/javascript">
										alert("saved succussfully.");
										window.location="profile.php";
									</script>
									<?php

							}
						}
			
		}
		else{
			?>
				<script type="text/javascript">
					window.location="login.php"
				</script>
			<?php
		}
	}
	?>
</body>
</html>
