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
 	<title>feedback</title>
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
		background-image: url("../images/pq_back.png");
		background-attachment: fixed;
		background-position: absolute;
		background-size: cover;
	}
	.wrapper{
		width:500px;
		height:470px;
		background-color: skyblue;
		opacity:0.8;
		margin:-10px auto;
		padding:10px;
		border:5px solid black;
		border-radius: 20px;
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
 <body>
 	<?php if(isset($_SESSION['login_user']) && $_SESSION['id']==1){?>
 	<div class="all">
				<form method="post" enctype="multipart/form-data">
						<input type="submit" name="submit7" class="btn-default" value="ALL QUESTIONS">
				</form>
	</div>
 	<div class="wrapper">
 		<h3>POST QUESTION</h3>
	 		<form method="post">
	 			<label>QUESTION NUMBER:</label><br>
	 			<input type="text" placeholder="question number" name="qnum" class="form-control" id="ques" value="<?php echo $ques;?>" readonly><br/>
	 			<label>QUESTION:</label><br>
	 			<textarea name="question" placeholder="write question..." class="form-control" required=""></textarea><br/>
	 			<label>EXPIRE DATE:</label><br>
	 			<select name="year[]">
	 				<option value="" disabled selected="">year</option>
	 				<option value="2021">2021</option>
	 				<option value="2022">2022</option>
	 				<option value="2023">2023</option>
	 				<option value="2024">2024</option>
	 				<option value="2025">2025</option>
	 			</select>
	 			<select name="month[]">
	 				<option value="" disabled selected="">month</option>
	 				<option value="january">january</option>
	 				<option value="february">february</option>
	 				<option value=">march">march</option>
	 				<option value="april">april</option>
	 				<option value="may">may</option>
	 				<option value="june">june</option>
	 				<option value="july">july</option>
	 				<option value="august">august</option>
	 				<option value="september">september</option>
	 				<option value="october">october</option>
	 				<option value="november">november</option>
	 				<option value="december">december</option>
	 			</select>
	 			<select name="day[]">
	 				<option value="" disabled selected="">day</option>
	 				<option value="1">1</option><option value="2">2</option><option value="3">3</option>
	 				<option value="4">4</option><option value="5">5</option><option value="6">6</option>
	 				<option value="7">7</option><option value="8">8</option><option value="9">9</option>
	 				<option value="10">10</option><option value="11">11</option><option value="12">12</option>
	 				<option value="13">13</option><option value="14">14</option><option value="15">15</option>
	 				<option value="16">16</option><option value="17">17</option><option value="18">18</option>
	 				<option value="19">19</option><option value="20">20</option><option value="21">21</option>
	 				<option value="22">22</option><option value="23">23</option><option value="24">24</option>
	 				<option value="25">25</option><option value="26">26</option><option value="27">27</option>
	 				<option value="28">28</option><option value="29">29</option><option value="30">30</option>
	 				<option value="31">31</option>
	 			</select><br/><br/>
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
	 			/*echo "the current server timezone is:".$timezone;
	 			echo "<br>"*/
							$sql1="SELECT * FROM post_question WHERE trend=1 and status=1;";
							$res1=mysqli_query($db,$sql1);
							//to set status bit of post_question
							$kp=0;
							if($res1!=false){
								$kp=mysqli_num_rows($res1);
							}
							if($kp!=0){
								$r1=mysqli_fetch_assoc($res1);
								$d=strtotime($r1['due_date']);
								$c=strtotime(date("Y-m-d"));  
								$diff=$d-$c;   //result is in seconds subtracting present date from due date
								if($diff==0){   //so we divide 24*60*60 to get days
									$p=$r1['due_time'];
									$q=date("H:i:s",time());
									$a=strtotime($p);
									$b=strtotime($q);
									$ab=$a-$b;       //results is in seconds so we divide by 60 to get minutes
									if($ab<=0){
										mysqli_query($db,"UPDATE post_question SET status='0' WHERE status=1;");
									}
								}
								elseif($diff<0){
									mysqli_query($db,"UPDATE post_question SET status='0' WHERE status=1;");
								}
							}

				//if the submit button pressed to post question whether it valid or not based on that it will posted
	 			if(isset($_POST['submit'])){
	 				if(isset($_SESSION['login_user'])){
	 					if($_SESSION['id']==1){
		 						$p1=mysqli_query($db,"SELECT status FROM post_question WHERE status=1;");
		 						$lp1=mysqli_num_rows($p1);
		 						$v=0;
		 						$p9=mysqli_query($db,"SELECT visible FROM post_question WHERE trend=1;");
		 						if($p9!=false){
		 							$v7=mysqli_fetch_assoc($p9);
		 							if($v7['visible']==1){
		 								$v=1;
		 							}
		 							else{
		 								$v=-1;
		 							}
		 						}
		 						if($lp1==0){
		 							if($v!=-1){
				 						$b=$_POST['qnum'];
				 						$check=mysqli_query($db,"SELECT question FROM post_question WHERE qno=$b;");
				 						$lp2=mysqli_num_rows($check);
				 						if($lp2==0){
				 							if($b>0){
						 						$var1=date('Y-m-d');
						 						$var2=date('H:i:s',time());
						 						//checking date by year
						 						$leap=0;
						 						$date=1;
						 						if(!empty($_POST['year'])){
						 							foreach($_POST['year'] as $selected1){
						 								
						 								if($selected1%100==0){
						 									if($selected1%400==0){
						 										$leap=1;
						 									}
						 								}
						 								else{
						 									if($selected1%4==0){
						 										$leap=1;
						 									}
						 								}
						 							}
						 						}
						 						//checking month
						 						if(!empty($_POST['month'])){
						 							foreach($_POST['month'] as $selected2){
						 								
						 							}
						 						}
						 						//checking day
						 						if(!empty($_POST['day'])){
						 							foreach($_POST['day'] as $selected3){
						 								
						 							}
						 							if($selected2=='april' || $selected2=='june' || $selected2=='september' || $selected2=='november'){
						 								if($selected3==31){
						 									$date=0;
						 									?>
						 										<script type="text/javascript">
						 											alert("selected month doesn't have 31");
						 										</script>
						 									<?php
						 								}
						 							}
						 							if($selected2=='february'){
						 								if($leap==0){
						 									if($selected3>28){
						 										$date=0;
						 										?>
						 										<script type="text/javascript">
						 											alert("selected month doesn't have day above 28");
						 										</script>
						 										<?php
						 									}
						 								}
						 								else{
						 									if($selected3>29){
						 										$date=0;
						 										?>
						 										<script type="text/javascript">
						 											alert("selected month doesn't have day above 29");
						 										</script>
						 										<?php
						 									}
						 								}
						 							}
						 						}
						 						if(empty($_POST['year'])||empty($_POST['month'])||empty($_POST['day'])){
						 							$date=0;
						 							?>
				 									<script type="text/javascript">
				 										alert("please fill the date section completely..");
				 									</script>
				 								<?php
						 						}
						 						
						 						if($date==1){
						 							$due_date=$selected2." ".$selected3.", ".$selected1;
						 							$due_time=$_POST['hours'].":".$_POST['minutes'].":".$_POST['seconds'];
						 							$var3=strtotime(date("Y-m-d"));  //current date
						 							$f=strtotime($due_date);    
													$g=strtotime($due_time);     
													$var4=strtotime(date("H:i:s"));   //current time
													$valid1=$f-$var3;
													$valid2=$g-$var4;
													$v1=$valid1/(24*60*60);  //to obtain number of days
													$temp=0;
													if($v1<0){
														$temp=0;
													}
													elseif($v1>0){
														$temp=1;
													}
													elseif($v1==0 && $valid2>=300){
														$temp=1;
													}
													else{
														$temp=0;
													}
													if($temp==1){
								 						mysqli_query($db,"UPDATE post_question SET trend='0' WHERE trend=1;");
								 						$ab="INSERT INTO post_question VALUES('$_POST[qnum]','$var1','$var2','$due_date','$due_time','$_POST[question]','1','1');";
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
					 									alert("expired time atleast greater than 5 min than current time");
					 									</script>

							 						<?php
								 					}
							 					}
							 					/*else{
							 						?>
							 							<script type="text/javascript">
					 									alert("question not posted");
					 									</script>

							 						<?php
							 					}*/
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
	 									alert("Must announce the results for previous question..");
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

	 			if(isset($_SESSION['login_user'])&&$_SESSION['id']==1){
	 				//if the submit 7 is pressed for seeing all posted questions
	 					if(isset($_POST['submit7'])){
							?>
								<script type="text/javascript">
									window.location="all_questions.php";
								</script>
						<?php
						}//the submit7 button completed
	 			}
	 			?>
 		</div>
 	</div>
 <?php }?>
 </body>
 </html>