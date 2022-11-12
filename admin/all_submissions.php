<?php
 include "navbar.php";
 include "../connection.php";
 ?>
 <!DOCTYPE html>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>feedback</title>

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
		h4{
			text-align: center;
			color:white;
		}
		p{
			text-align: right;
			font-size: 12px;
			color:grey;
		}
		tr:hover{
				background-color:#1e3f54;
				cursor:pointer;

			}

		.left_box{
				height:600px;
				width:900px;
				background-color:#8ecdd2;
				margin:-10px auto;
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
				height:500px;
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
			th,td{text-align: center;}

	</style>
	
 <body>
 	<?php
 		if(isset($_SESSION['login_user'])&&$_SESSION['id']==1){
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
		/*$sql1=mysqli_query($db,"select registration.image,messages.username from registration inner join messages on registration.username=messages.username group by username order by status;");*/
	 	
	?>
 		
 		<div class="left_box">
 			<h4><strong>ALL SUBMISSION PROGRAMS</strong></h4>
			<div class="left_box2">
				<div class="list">
						<?php
							$res1=mysqli_query($db,"SELECT submit_answer.qno,date,time,pdfname,visible,credit,marks,student_login.username,image from submit_answer inner join student_login on submit_answer.username=student_login.username WHERE marks!=-1 ORDER BY submit_answer.qno DESC;");
							$p1=0;
							if($res1!=false){
								$p1=mysqli_num_rows($res1);
							}
							echo "<table id='table' class='table'>";
								if($p1!=0){
								echo "<tr>";
								echo "<th>";echo "QUESTION NO.";echo "</th>";
								echo "<th colspan='2'>";echo "USERNAME";echo "</th>";
								echo "<th>";echo "SUB_DATE";echo "</th>";
								echo "<th>";echo "SUB_TIME";echo "</th>";
								echo "<th>";echo "PDF_NAME";echo "</th>";
								echo "<th>";echo "CREDITS";echo "</th>";
								echo "<th>";echo "MARKS";echo "</th>";
								echo "</tr>";
								while($row1=mysqli_fetch_assoc($res1)){
									echo "<tr>";
									echo "<td style='padding-top:20px;'>"; echo $row1['qno'];echo "</td>";
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
							}
						echo "</table>";
						?>
					</div>
			</div>
		</div>
		<?php
	}
	?>
 	
 </body>
 </html>