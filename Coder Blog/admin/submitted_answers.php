<?php
 include "navbar.php";
 include "../connection.php";
 ?>
 <!DOCTYPE html>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Answers submitted</title>
 </head>


<style type="text/css">
	body{
		background-image: url("../images/b8.jpg");
		background-repeat:no-repeat;
		background-size: cover;
	}
	.btn{
		width:90px;
		height:30px;
	}
	h3{
		text-align: center;
		color:white;
	}
	h4{
		text-align: center;
		color:blue;
	}
	p{
		text-align: right;
		font-size: 12px;
		color:blue;
	}
	tr:hover{
			background-color:#1e3f54;
			cursor:pointer;

		}

	.left_box{
			height:600px;
			width:900px;
			background-color:#8ecdd2;
			margin:-30px auto;
			border-radius:15px;
			
		}
		.left_box2{
			height:550px;
			width:870px;
			background-color:#537890;
			float:right;
			margin-right:15px;
			border-radius:20px;
		}
		.list{
			height:400px;
			width:850px;
			background-color:#537890;
			float:right;
			color:white;
			padding:10px;
			overflow-y:scroll;
			overflow-x:hidden;
		}
		.left_box2 input{
			width:150px;
			height:50px;
			background-color:#537890;
			padding:10px;
			margin:10px;
			border-radius:20px;
		}
		.middle{
			text-align: center;
		}
		.score{
			float:right;
			margin-top: -30px;
		}
		td,th{text-align: center;}

		.all{
			margin-left:15px;
		}
		.all input{background-color:pink;width:150px;height: 30px;}
		table p{text-align: center;}

</style>
 <body>
 	<?php
 		if(isset($_SESSION['login_user']) && $_SESSION['id']==1){
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
	 	
	?>
 		<div class="all">
				<form method="post">
						<input type="submit" name="submit7" value="ALL SUBMISSIONS">
				</form>
		</div>
 		<div class="left_box">
 			<h3><strong>PROGRAM SUBMISSIONS</strong></h3>
 			<h4>
	 			<?php
	 				echo $qno.". ".$question;
	 			?>
	 		</h4>
	 		<p>
	 			<?php
	 				echo "Due_Date:".$date;
	 				echo "&nbsp;&nbsp;&nbsp;&nbsp;Due_Time: ".$time;
	 			?>
	 		</p>
			<div class="left_box2">
					<div class="middle">
						<form method="post">
							<input type="text" name="username" id="uname" required="">
							<input type="submit" name="submit1" value="SHOW">
						</form>
					</div>
					<div class="score">
							<form method="post">
								<input type="submit" name="submit2" value="ANNOUNCE RESULTS">
							</form>
					</div>
				<div class="list">
						<?php
							$res1=mysqli_query($db,"SELECT submit_answer.qno,date,time,pdfname,visible,credit,marks,student_login.username,image from submit_answer inner join student_login on submit_answer.username=student_login.username where submit_answer.qno=$qno;");
							$c1=0;
							if($res1!=false){
								$c1=mysqli_num_rows($res1);
							}
							if($c1>0){
								echo "<table id='table' class='table'>";
								echo "<tr>";
								echo "<th colspan='2'>";echo "USERNAME";echo "</th>";
								echo "<th>";echo "SUB_DATE";echo "</th>";
								echo "<th>";echo "SUB_TIME";echo "</th>";
								echo "<th>";echo "PDF_NAME";echo "</th>";
								echo "<th>";echo "CREDITS";echo "</th>";
								echo "<th>";echo "MARKS";echo "</th>";
								echo "</tr>";
								while($row1=mysqli_fetch_assoc($res1)){
									echo "<tr>";
									echo "<td width=45>"; echo "<image class='img-circle profile_img' height=40 width=40 src='../images/".$row1['image']."'>";
									echo "</td>";
									echo "<td style='padding-top:20px;margin-left:-35px;'>"; echo $row1['username']; echo "</td>";
									echo "<td style='padding-top:20px;'>"; echo $row1['date'];echo "</td>";
									echo "<td style='padding-top:20px;'>"; echo $row1['time'];echo "</td>";
									echo "<td style='padding-top:20px;'>"; echo $row1['pdfname'];echo "</td>";
									echo "<td style='padding-top:20px;'>"; echo $row1['credit'];echo "</td>";
									echo "<td style='padding-top:20px;'>"; echo $row1['marks'];echo "</td>";
									echo "</tr>";
								}
								echo "</table>";
							}
							else{
								?>
									<h4>NO SUBMISSIONS FOUND</h4>
								<?php
							}
						
						?>
					</div>
			</div>
		</div>
 	<script type="text/javascript">
		var table=document.getElementById('table'),eIndex;
		for(var i=0; i<table.rows.length; i++)
		{
			table.rows[i].onclick =function()
			{
				rIndex=this.rowIndex;
				document.getElementById("uname").value = this.cells[1].innerHTML;

			}
		}
	</script>
	<!--if the show button is pressed -->
	<?php
	if(isset($_SESSION['login_user'])){

		//to see the all the submissions
		if(isset($_POST['submit7'])){
			?>
				<script type="text/javascript">
					window.location="all_submissions.php";
				</script>
			<?php
		}
		if(isset($_POST['submit1'])){
			$_SESSION['status']=0;
			if($c1>0){
				$name=$_POST['username'];
				$res2=mysqli_query($db,"SELECT pdfname,username FROM submit_answer WHERE submit_answer.username='$name' and qno=$qno;");
				$c2=0;
				if($res2!=false){
					$c2=mysqli_num_rows($res2);
					$res0=mysqli_fetch_assoc($res2);
				}
				if($c2==1){
				$row3=mysqli_fetch_assoc($res2);
				$_SESSION['submitted_username']=$res0['username'];
				$_SESSION['status']=1;    //whether to display the program in analyze page
				?>
				<script type="text/javascript">
					window.location="analyze.php"
				</script>
				<?php
				}
				else{
					?>
					<script type="text/javascript">
						alert("no submission found with entered username");
					</script>
				<?php
				}
			}
			else{
				?>
					<script type="text/javascript">
						alert("no submission avaliable");
					</script>
				<?php
			}
		}
		if(isset($_POST['submit2'])){
			if($res1!=false){
				$check3=mysqli_query($db,"SELECT username FROM submit_answer WHERE marks=-1 and qno=$qno;");
				$c=0;
				if($check3!=false){
					$c=mysqli_num_rows($check3);
				}
				$m=0;
				$check5=mysqli_query($db,"SELECT qno FROM post_question WHERE status=0 and qno=$qno;");
				if($check5!=false){
					$m=mysqli_num_rows($check5);
				}
				if($m==1){
					if($c1>0){ 
						if($c==0){ 
							$po=0;
							$check4=mysqli_query($db,"SELECT username FROM submit_answer WHERE qno=$qno and visible=1");
							if($check4!=false){   
								$po1=mysqli_num_rows($check4);
								if($po1>0){
									$po=1;
								}
							}
							if($po==0){//checking already marks released or not
								$res3=mysqli_query($db,"SELECT username,marks FROM submit_answer WHERE qno=$qno and marks!=-1;");
								$num=mysqli_num_rows($res3);
								$row=mysqli_fetch_assoc($res3);
								$uname=$row['username'];
								$umax=$row['marks'];
								echo $num;
								if($num>1){
									while($row=mysqli_fetch_assoc($res3)){      //getting highest marks from group of users of same question
										if($umax<$row['marks']){
											$umax=$row['marks'];
											$uname=$row['username'];
										}
									}
									echo $umax;
									$res4=mysqli_query($db,"SELECT * FROM submit_answer WHERE marks=$umax and qno=$qno;");
									$c2=mysqli_num_rows($res4);
									if($c2>1){       //if more than one user has same marks then check the time taken to complete the program
										$res5=mysqli_query($db,"SELECT start_date,start_time FROM post_question WHERE qno=$qno;");
										$row5=mysqli_fetch_assoc($res5);
										$c=strtotime($row5['start_date']); //question posted time

										$row4=mysqli_fetch_assoc($res4);  //fetching the user history when submitted who has same marks
										$d=strtotime($row4['date']); 
										$uname=$row4['username']; 
										$min=$d-$c;   //result is in seconds subtracting present date from due date
										$m=strtotime($row5['start_time']); 
										$n=strtotime($row4['time']);
										$t1=$n-$m;   //subtracting from submitted time to start time
										while($row4=mysqli_fetch_assoc($res4)){
											$d=strtotime($row4['date']);
											$diff=$d-$c;
											if($min>$diff){
												$min=$diff;
												$uname=$row4['username'];
											}
											if($min==$diff){
												$y=strtotime($row4['time']);
												$t2=$y-$m; //subtracting from submitted time to start time
												if($t1>$t2){
													$t1=$t2;
													$uname=$row4['username'];
													$min=$diff;
												}
											}
										}
										//if more than one user has same marks
										mysqli_query($db,"UPDATE submit_answer SET visible='1' WHERE username='$uname' and qno=$qno;");
										?>
											<script type="text/javascript">
												alert("results successfully released");
											</script>
										<?php
									}
									else{//the maximum marks is credited to only one person
										mysqli_query($db,"UPDATE submit_answer SET visible='1' WHERE username='$uname' and qno=$qno;");
										?>
											<script type="text/javascript">
												alert("results successfully released");
											</script>
										<?php
									}
								}
								else{ //for only one user
									mysqli_query($db,"UPDATE submit_answer SET visible='1' WHERE username='$uname' and qno=$qno;");
									?>
											<script type="text/javascript">
												alert("results successfully released");
											</script>
										<?php
								}
							}
							else{
								?>
									<script type="text/javascript">
									alert("marks already released..");
									</script>
								<?php
							}
						}
						else{
							?>
								<script type="text/javascript">
									alert("evaluate all the submitted answers..");
								</script>
							<?php
						}
					}
					else{
						?>
							<script type="text/javascript">
								alert("No submissions available to evaluate..");
							</script>
						<?php
					}
				}
				else{
					?>
							<script type="text/javascript">
								alert("Results can be released after timed out");
							</script>
						<?php
				}
			}
		}
	}
}
	?>
 	
 </body>
 </html>