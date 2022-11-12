<?php
 include "navbar.php";
 include "../connection.php";
 ?>
 <!DOCTYPE html>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Backup</title>
 </head>

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
		background-image: url("images/b8.jpg");
		background-repeat:no-repeat;
		background-size: cover;
	}
	.wrapper{
		width:700px;
		background-color: pink;
		opacity:0.8;
		margin:40px auto;
		padding:10px;
	}
	.box{
		
	}
	.btn{
		width:90px;
		height:30px;
	}
	.scroll{
		overflow:auto;
	}
	h2{
		text-align: center;
		color:purple;
	}
	p{
		text-align: right;
		font-size: 15px;
		color:grey;
	}
	h3{
		text-align: center;
		color:blue;
	}
	form{
		text-align: center;
	}
	.box{
		background-color: grey;
		width:600px;
		margin:10px auto;
		padding:20px;
	}
	.each{
		border:2px solid blue;
		margin:10px auto;
		width:500px;
		height:50px;
	}
</style>
 <body>
 	<?php
 		$question="";
 		$date="";
 		$time="";
 		$qno=0;
 		$sql="SELECT * FROM post_question ORDER BY post_question.qno DESC;";
		$res=mysqli_query($db,$sql);
		if($res!=false){
			$row=mysqli_fetch_assoc($res);
			$question=$row['question'];
			$date=$row['date'];
			$time=$row['time'];
			$qno=$row['qno'];
		}
	 	
	?>
 	<div class="wrapper">
 		<h3>SUBMISSION PROGRAMS</h3>
 		<div class="scroll">
	 		<h2>
	 			<?php
	 				echo $question;
	 			?>
	 		</h2>
	 		<p>
	 			<?php
	 				echo $date;echo "<br>";
	 				echo $time;
	 			?>
	 		</p>

 		</div>
 		<div class="box">
				<?php
					$sql1="SELECT * FROM submit_answer WHERE visible=0;";
					$res1=mysqli_query($db,$sql1);
					if($res1!=false){
							while($row1=mysqli_fetch_assoc($res1)){
								?>
								<div class="each">
								<?php
								$present=$row1['username'];
								$result2=mysqli_query($db,"SELECT image FROM student_login WHERE student_login.username='$present';");
								$row2=mysqli_fetch_assoc($result2);
								?>
								<div style="color:white;margin-top:5px;margin-left:5px;">
								<?php
								echo "<img class='img-circle profile_img' width=30 height=30 src='../images/".$row2['image']."'>";
								echo " ".$row1['username']."<br><br>";
								?>
								</div>
								</div>
								<?php
							}
					}
					?>
 		</div>
 			
 	</div>
 	
 </body>
 </html>