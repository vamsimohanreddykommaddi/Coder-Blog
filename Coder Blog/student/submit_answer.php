<?php
 include "navbar.php";
 include "../connection.php";
 ?>
 <html>
 <head>
 	<title>submit answer</title>
 </head>

<style type="text/css">
	body{
		background-image: url("../images/ccm.jpg");
		background-repeat:no-repeat;
		background-size: cover;
	}
	.wrapper{
		width:500px;
		height:400px;
		background-color:#71a9a1;
		border-radius: 25px;
		opacity:0.8;
		margin:5px auto;
		padding:10px;
	}
	.box{
		margin:10px auto;
		border-radius: 20px;
		width:400px;
		height:120px;
		background-color:#fcf8e3;
		padding:20px;
	}
	.btn{
		width:90px;
		height:30px;
	}
	.scroll{
		overflow:auto;
	}
	h4{
		text-align: center;
		color:purple;
	}
	p{
		text-align: right;
		font-size: 15px;
		color:black;
	}
	h3{
		text-align: center;
		color:black;
	}
	form{
		text-align: center;
	}
	td,th{
	text-align:center;
}
tr:hover{
		background-color:grey;
	}
</style>
 <body>
 	<?php
 		if(isset($_SESSION['login_user'])&&$_SESSION['id']==2){
 		$question="";
 		$date="";
 		$time="";
 		$qno=0;
 		$sql="SELECT * FROM post_question WHERE trend=1;";
		$res=mysqli_query($db,$sql);
		if($res!=false){
			$row=mysqli_fetch_assoc($res);
			$question=$row['question'];
			$date=$row['due_date'];
			$time=$row['due_time'];
			$qno=$row['qno'];
		}
	 	if(isset($_POST['submit'])){
	 		if(isset($_SESSION['login_user'])){
	 			$check2=mysqli_query($db,"SELECT username FROM submit_answer WHERE username='".$_SESSION['login_user']."' and visible=0 and qno=$qno;");              //to know whether the user already responded to the same question or not
	 			$parity=0;
	 			if($check2!=false){
	 				$parity=mysqli_num_rows($check2);
	 			}
	 			date_default_timezone_set('Asia/Kolkata');
	 			$d=date('Y-m-d');
	 			$t=date('H:i:s',time());
	 			$timezone=date_default_timezone_get();
	 			$pdf=$_FILES['pdffile']['name'];
	 			$tm=$_FILES['pdffile']['tmp_name'];
				$ext=explode(".", $pdf);
				$cn=count($ext);
				$username=$_SESSION['login_user'];
				$check3=mysqli_query($db,"SELECT qno FROM post_question WHERE post_question.status='1' and trend='1';");
				$count=mysqli_num_rows($check3);
				if($ext[$cn-1]=='pdf'){
					$credit1='<p style="background-color:red;color:yellow;">NOT-CREDITED</p>';
					if($count!=0){
						if($parity==0){
							move_uploaded_file($tm, "../answers/".$pdf);
							$sql="INSERT INTO submit_answer VALUES('$qno','$d','$t','$username','$pdf',0,-1,'$credit1');";
							mysqli_query($db,$sql);
									?>
								<script type="text/javascript">
									alert("uploaded successfully");
								</script>
							<?php
						}
					else{
							?>
								<script type="text/javascript">
									alert("your response is overriding with previous response");
								</script>
							<?php
							move_uploaded_file($tm, "../answers/".$pdf);
							$sql="UPDATE submit_answer SET date='$d',time='$t',pdfname='$pdf',marks='-1',credit='$credit1' WHERE username='".$_SESSION['login_user']."' and qno=$qno;";
							mysqli_query($db,$sql);
						}
					}
					else{
						?>
								<script type="text/javascript">
									alert("TIMED OUT");
								</script>
							<?php
					}
				}
				else{
					?>
					<script type="text/javascript">
						alert("upload only pdf files");
					</script>
					<?php
				}
				
			}
	 	}
	?>
 	<div class="wrapper">
 		<h3>POST YOUR ANSWER IN PDF FORMAT</h3>
 		<div class="scroll">
	 		<h4>
	 			<?php
	 				echo $qno.". ".$question;
	 			?>
	 		</h4>
	 		<p>
	 			<?php
	 				echo "";
	 				echo "Due_Date:".$date;echo "<br>";
	 				echo "Due_Time:".$time;
	 			?>
	 		</p>

 		</div>
 			<div class="box">
			 		<form  method="post" enctype="multipart/form-data">
			 			<input type="file" name="pdffile" required=""><br>
			 			<input type="submit" name="submit" value="POST" class="btn btn-default" style="background-color: #71a9a1;">
			 		</form><br><br>
			 </div>
 	</div>
 	<h3 ><b>YOUR SUBMISSION</b></h3>
	<?php
			date_default_timezone_set('Asia/Kolkata');
			$sql1="SELECT * FROM post_question WHERE trend=1 and status=1;";
			$res1=mysqli_query($db,$sql1);
							
			if($res1!=false){
				$r1=mysqli_fetch_assoc($res1);
				if($r1>=1)
				{
					$d=strtotime($r1['due_date']);
					$c=strtotime(date("Y-m-d"));  
					$diff=$d-$c;   
					if($diff<=0){   
						$p=$r1['due_time'];
						$q=date("H:i:s");
						$a=strtotime($p);
						$b=strtotime($q);
						$ab=$a-$b;       
						if($ab<=0){
							mysqli_query($db,"UPDATE post_question SET status='0' WHERE status=1;");
						}
					}
				}
				$sql="SELECT * FROM submit_answer WHERE username='".$_SESSION['login_user']."' and qno=$qno;";
				$res=mysqli_query($db,$sql);
				$h1=0;
				if($res!=false){
					$h1=mysqli_num_rows($res);
				}
				if($h1==0){
					echo "<div style='text-align:center;'>";
					echo "<h2 style='color:red;'>";
					echo "You had not submitted above program..."; 
					echo "</h2>";
					echo "</div>";
				}
				else{
					echo"<table>";
					echo"<tr style='background-color:#71a9a1;'>";
					echo "<th>";echo "QUESTION NO."; echo "</th>";
					echo "<th>"; echo "SUBMISSION_DATE"; echo "</th>";
					echo "<th>";echo "SUBMISSION_TIME"; echo "</th>";
					echo "<th>";echo "PDF_NAME"; echo "</th>";
					echo "<th>"; echo "MARKS"; echo "</th>";
					echo "<th>"; echo "CREDIT"; echo "</th>";
					echo "</tr>";
					while($row=mysqli_fetch_assoc($res)){
						echo "<tr>";
						echo "<td>";echo $row['qno'];echo "</td>";
						echo "<td>";echo $row['date'];echo "</td>";
						echo "<td>";echo $row['time'];echo "</td>";
						echo "<td>";echo $row['pdfname'];echo "</td>";
						echo "<td>";echo $row['marks'];echo "</td>";
						echo "<td>";echo $row['credit'];echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
				}
			}
		}
		?>
		
 </body>
 </html>