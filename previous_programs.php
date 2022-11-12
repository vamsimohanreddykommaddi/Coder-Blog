<?php
include "connection.php";
include "navbar.php";
?>
<!Doctype html>
<html>
<head>
	<title>Coder Blog</title>
	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1">

	<style type="text/css">
		body{
			background-image: url('images/back3.jpg');
			background-attachment: fixed;
			background-size: cover;
			background-position: absolute;
		}
		h1{
			text-align: center;
			color:blue;
		}
		.box{
			margin:27px auto;
			border:7px solid white;
			border-radius: 10px;
			width:700px;
			height:430px;
			padding: 10px 46px;
			background-color: grey;
		}
		.nb{
			background-color: yellow;
			color:blue;
			font-weight: bold;
		}
		.na{
			background-color: yellow;
			color:blue;
			font-weight: bold;
			float: right;
		}
		span{
			margin-top: 5px;
		}
		.nc{
			float: right;
		}
		
	</style>
</head>
<body> 
	<?php
	if(isset($_SESSION['login_user'])){
	?>
	<h1>Previous programs</h1>
	<?php
		//to set the status bit of post_question
		$sql="SELECT * FROM submit_answer WHERE visible='0' ORDER BY qno DESC;";
		$result=mysqli_query($db,$sql);
		if($result!=false){
			while($row=mysqli_fetch_assoc($result)){
					$qnum=$row['qno'];
					$pp=mysqli_query($db,"SELECT qno,question FROM post_question WHERE qno='$qnum';");
					$row2=mysqli_fetch_assoc($pp);
					$ques=$row2['question'];
					$m1=mysqli_query($db,"SELECT image FROM student_login WHERE username='".$row['username']."';");
					$row3=mysqli_fetch_assoc($m1);
					$image=$row3['image'];
				?>
					<div class="box">
							<div class="nb"><?php echo $qnum.". ".$ques;?></div>
							<embed src="<?php echo 'answers/'.$row['pdfname']?>" type="application/pdf" style="width:640px;height: 370px;margin-left:-20px;"></embed>
							<span class="na"><?php echo "Username: ".$row['username'];?></span>
							<image class='img-circle profile_img nc' height=40 width=40 src='images/<?php echo $image;?>'>
					</div>
			<?php
			}
		}
	}
	?>
</body>
</html>