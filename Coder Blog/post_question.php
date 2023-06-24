<?php
 include "navbar.php";
 include "../connection.php";
 ?>
 <?php
		
		$sql2="SELECT qno FROM post_question ORDER BY qno DESC LIMIT 1";
		$res2=mysqli_query($db,$sql2);
		if($res2!=false){
			$r2=mysqli_fetch_assoc($res2);
			$que=$r2['qno'];
			$ques=$que+1;
		}
	?>
 <!DOCTYPE html>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>post question</title>

	<style type="text/css">
		body{
			background-image: url("images/pq_back.png");
			background-attachment: fixed;
			background-position: absolute;
			sbackground-size: cover;
		}
		.wrapper{
			width:500px;
			height:470px;
			background-color: skyblue;
			opacity:0.8;
			margin:-10px auto;
			padding:10px;
			border-radius: 20px;
			border:5px solid black;
		}
		
		.btn{
			width:90px;
			height:30px;
		}
		.scroll{
			width:100%;
			height:300px;
			overflow:auto;
		}
		h3{
			font-weight: bold;
			text-align: center;
		}
		label{
			font-weight: bold;
		}
		.all{
				margin-left:25px;
			}
			.all input{
				background-color:skyblue;width:150px;height: 30px;
			}
</style>
</head>
 <body>
 	<div class="wrapper">
 		<h3>POST QUESTION</h3>
	 		<form method="post">
	 			<label>QUESTION NUMBER:</label><br>
	 			<input type="number" placeholder="<?php echo $ques;?>" name="qnum" id="ques" value="<?php echo $ques;?>" required=""><br/>
	 			<label>QUESTION:</label><br>
	 			<textarea name="question" placeholder="write question..."  required=""></textarea><br/>
	 			<label>EXPIRE DATE:</label><br>
	 			<input type="text" placeholder="ex:jan 18, 2020" name="due_date" required=""><br/>
	 			<label>EXPIRE TIME:</label><br>
	 			<span>Hours</span><input type="number" name="hours" min="0" max="23" title="hours between 0 and 23" required="" style="width: 60px;">&nbsp;&nbsp;
	 			<span>Minutes</span><input type="number" name="minutes" min="0" max="59" title="minutes between 0 and 59" required="" style="width: 60px;">&nbsp;&nbsp;
	 			<span>Seconds</span><input type="number" name="seconds" min="0" max="59" title="seconds between 0 and 59" required="" style="width: 60px;"><br/><br/>
	 			<div style="text-align: center;"><input type="submit" name="submit" value="POST" class="btn btn-default"></div>
	 		</form><br><br>
 		<div class="scroll">
	 		<?php
	 			date_default_timezone_set('Asia/Kolkata');
	 			$timezone=date_default_timezone_get();
							$sql1="SELECT * FROM post_question WHERE trend=1 and status=1;";
							$res1=mysqli_query($db,$sql1);
							//to set status bit of post_question
							if($res1!=false){
								$r1=mysqli_fetch_assoc($res1);
								$d=strtotime($r1['due_date']);
								$c=strtotime(date("Y-m-d"));  
								$diff=$d-$c; 
								if($diff==0){  
									$p=$r1['due_time'];
									$q=date("H:i:s",time());
									$a=strtotime($p);
									$b=strtotime($q);
									$ab=$a-$b; 
									
									if($ab<=0){
										mysqli_query($db,"UPDATE post_question SET status='0' WHERE status=1;");
									}
								}
								else if($diff<0){
									mysqli_query($db,"UPDATE post_question SET status='0' WHERE status=1;");
								}
							}
	 			if(isset($_POST['submit'])){
	 				if(isset($_SESSION['login_user'])){
	 					if($_SESSION['id']==1){
		 						$p1=mysqli_query($db,"SELECT status FROM post_question WHERE status=1;");
		 						$lp1=mysqli_num_rows($p1);
		 						if($lp1==0){
			 						$b=$_POST['qnum'];
			 						$check=mysqli_query($db,"SELECT question FROM post_question WHERE qno=$b;");
			 						$lp2=mysqli_num_rows($check);
			 						if($lp2==0){
			 							if($b>0){
					 						$var1=date('Y-m-d');
					 						$var2=date('H:i:s',time());
					 						$due_time=$_POST['hours'].":".$_POST['minutes'].":".$_POST['seconds'];
					 						mysqli_query($db,"UPDATE post_question SET trend='0' WHERE trend=1;");
					 						$ab="INSERT INTO post_question VALUES('$_POST[qnum]','$var1','$var2','$_POST[due_date]','$due_time','$_POST[question]','1','1');";
					 						mysqli_query($db,$ab);
					 						?>
					 							<script type="text/javascript">
			 									alert("question posted successfully");
			 									</script>

					 						<?php
					 					}
					 					else{
					 						?>
			 							<script type="text/javascript">
			 								alert("question number must be greather than 0");
			 							</script>
			 								<?php
					 					}
					 				}
					 				else{
					 					?>
			 							<script type="text/javascript">
			 								alert("the question number already exist");
			 							</script>
			 						<?php
					 				}
				 				}
				 				else{
	 						?>
	 							<script type="text/javascript">
	 								alert("wait until the previous question time out..");
	 							</script>
	 						<?php
	 						}
	 					}
	 					else{
	 						?>
	 							<script type="text/javascript">
	 								alert("your are not allowed to post question");
	 							</script>
	 						<?php
	 					}
	 				}
	 			}
	 		?>
 		</div>
 	</div>
	
 </body>
</html>