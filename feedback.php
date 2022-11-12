<?php
 include "navbar.php";
 include "connection.php";
 ?>
 <!DOCTYPE html>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>feedback</title>
 

	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1">

	<!--below three links for bootstrap for better response of form we add classes to input fields it makes seen nice and easy to use-->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<style type="text/css">
		body{
			background-image:url('images/p11.jpeg');
			background-attachment: fixed;
			background-position: absolute;
			background-size: cover;

		}
		.wrapper{
			width:600px;
			height:550px;
			background-color: #3f401b;
			opacity:0.8;
			margin:-20px auto;
			padding:10px;
		}
		.form-control{
			width:400px;
			height:40px;
		}
		.btn{
			width:90px;
			height:30px;
		}
		.scroll{
			width:100%;
			height:400px;
			overflow:auto;
		}
		p{
			font-size:10px;
			color:white;
		}
	</style>
 </head>
 <body>
 	<div class="wrapper">
 		<h3 style="color:white; ">Post your suggestions, comments or queries</h3>
	 		<form  action="" method="post" style="">
	 			<div style="display: inline-flex;">
		 			<input type="text" name="comment" placeholder="comment here" class="form-control" required="">&nbsp;&nbsp;&nbsp;&nbsp;
		 			<span style="margin-top: 3px;"><input type="submit" name="submit" value="comment" class="btn btn-default"></span>
	 			</div>
	 		</form><br><br>
 		<div class="scroll">
	 		<?php
	 		date_default_timezone_set('Asia/Kolkata');
	 			if(isset($_POST['submit'])){
	 				$var1=date('Y-m-d');
					 $var2=date('H:i:s',time());
	 				if(isset($_SESSION['login_user'])){
	 					if($_SESSION['id']==1){
	 						$ab="INSERT INTO feedback VALUES('',1,'$_SESSION[login_user]','$_POST[comment]','$var1','$var2');";
	 					}
	 					else{
	 						$ab="INSERT INTO feedback VALUES('',2,'$_SESSION[login_user]','$_POST[comment]','$var1','$var2');";
	 					}
	 				}
	 				else{
	 					$ab="INSERT INTO feedback VALUES('',0,'guest','$_POST[comment]','$var1','$var2');";
	 				}
	 				mysqli_query($db,$ab);
	 			}
	 				
		 		$sql="SELECT * FROM `feedback` ORDER BY feedback.sno DESC";
		 		$res=mysqli_query($db,$sql);
		 		if($res!=false){
		 			echo "<table class='table'>";
				 				while($row=mysqli_fetch_assoc($res)){
					 					$image="user.jpeg";
					 					$uname=$row['username'];
					 					if($row['rid']==1){
					 						$k1=mysqli_query($db,"SELECT image FROM admin_login WHERE username='$uname';"); //by giving directly error(syntax error)
					 						$p=mysqli_fetch_assoc($k1);
					 						$image=$p['image'];
					 					}
					 					else if($row['rid']==2){
					 						$k1=mysqli_query($db,"SELECT image FROM student_login WHERE username='$uname';");
					 						$p=mysqli_fetch_assoc($k1);
					 						$image=$p['image'];
					 					}
					 					echo "<tr>";
					 					echo "<td>";echo "<image class='img-circle profile_img' height=30 width=30 src='images/".$image."'>";echo "</td>";
					 					echo "<td style='color:white;padding-top:12px;'>"; echo $row['username'];echo "<br>";
					 					echo "</td>";
					 					echo "<td style='color:white;'>"; echo $row['message']; echo "</td>";
					 					echo "<td>";echo "<p>";echo $row['date'];echo "<br>";echo $row['time']; echo "</p>";echo "</td>";
					 					echo "</tr>";
				 				}
				 				echo "</table>";
		 				}
	 			?>
 		</div>
 	</div>
 </body>
 </html>