<?php
	include "../connection.php";
	include "navbar.php";
	?>

<!DOCTYPE html>
<html>
<head>
	<title>student submissions</title>

<style>
	tr:hover{
		background-color:white;
	}

	body{
			font-family: "Lato", sans-serif;
			transition: background-color .5s;
			background-image:url('../images/b8.jpg');
			background-attachment: fixed;
			background-position: absolute;
			background-size: cover;
	}
	td,th{
		text-align:center;
	}
</style>
</head>
<body>
	<?php if(isset($_SESSION['login_user'])&&$_SESSION['id']==2){?>
	<h3 ><b>YOUR SUBMISSIONS</b></h3>
	<?php
			$sql="SELECT * FROM submit_answer WHERE username='".$_SESSION['login_user']."' ORDER BY submit_answer.qno DESC;";
			$res=mysqli_query($db,$sql);
			if(mysqli_num_rows($res)==0){
				echo "<div style='text-align:center;'>";
				echo "<h2 style='color:red;'>";
				echo "You had not submitted any program...";
				echo "</h2>";
				echo "</div>";
			}
			else{
				echo"<table class='table table-bordered'>";
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
		?>
		
</body>
</html>