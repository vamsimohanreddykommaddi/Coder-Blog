<?php
 include "navbar.php";
 include "../connection.php";
 ?>
 <!DOCTYPE html>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>ANALYZE</title>
 </head>

<style type="text/css">
	body{
		background-image: url("../images/b8.jpg");
		background-repeat:no-repeat;
		background-size: cover;
	}
	.left_box{
			height:707px;
			width:800px;
			background-color:#8ecdd2;
			margin:-10px auto;
			border-radius:15px;
			
		}
		h4{
		text-align: center;
		color:white;
	}
	p{
		text-align: right;
		font-size: 12px;
		color:blue;
	}
	.left_box2{
			height:630px;
			width:750px;
			background-color:#537890;
			margin:5px auto;
			border-radius:20px;
		}
		.middle{
			text-align: center;
			margin:10px;
			display: inline-flex;
		}
		.list{
			margin-left:25px;
		}
		.form-control{width:150px;}
</style>
 <body>
 	<?php
 		if(isset($_SESSION['login_user'])&&$_SESSION['id']==1){
 		$question="";
 		$date="";
 		$time="";
 		$qnumber=0;
 		$p1=mysqli_query($db,"SELECT qno FROM post_question WHERE trend=1;");
 		if($p1!=false){
 			$p2=mysqli_fetch_assoc($p1);
 			$qnumber=$p2['qno'];
 		}
 		$sql="SELECT * FROM submit_answer where username='".$_SESSION['submitted_username']."' and qno=$qnumber;";
		$res=mysqli_query($db,$sql);
		if($res!=false){
			$row=mysqli_fetch_assoc($res);
			$date=$row['date'];
			$time=$row['time'];
			$qno=$row['qno'];
			$ab=$row['pdfname'];
		}
		
	 	
	?>
 		
 		<div class="left_box">

 			<h4><strong><?php if(isset($_SESSION['submitted_username'])){echo $_SESSION['submitted_username'];}?> PROGRAM</strong></h4>
	 		<p>
	 			<?php
	 			if($_SESSION['status']==1){  
	 				echo "Submission_Date:".$date;
	 				echo " &nbsp;&nbsp;&nbsp;&nbsp;Submission_Time: ".$time;
	 				$b=$_SESSION['submitted_username'];
	 			}
	 			?>
	 		</p>
			<div class="left_box2">
					<div class="middle">
						<form method="post" enctype="multipart/form-data">
							<input type="float" placeholder="enter marks" name="marks" required="">
							<input type="submit" name="submit1" class="btn btn-default" value="REGISTER">
						</form>
					</div>
				<div class="list">
						<embed src="<?php echo '../answers/'.$ab ?>" type="application/pdf" style="width:700px;height: 550px;"></embed>
				</div>
			</div>
		</div>
	<!--if the show button is pressed -->
	<?php
		if(isset($_POST['submit1'])){
			$mark=$_POST['marks'];
			if($mark<0 || $mark>10){
				?>
					<script type="text/javascript">
						alert("enter valid marks b/n 0 to 10");
					</script>
				<?php
			}
			else{
				$credit2='<p style="background-color:green;color:yellow;">CREDITED</p>';
				$sql1="UPDATE submit_answer  SET marks='$mark',credit='$credit2' WHERE username='".$_SESSION['submitted_username']."'and qno=$qno;";
				mysqli_query($db,$sql1);
				unset($_SESSION['submitted_username']);
				unset($_SESSION['status']);
					?>
						<script type="text/javascript">
							alert("marks are credited");
						</script>

					<?php
			}
		}
	}
	?>
 	
 </body>
 </html>