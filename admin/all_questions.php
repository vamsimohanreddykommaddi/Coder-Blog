<?php
	include "../connection.php";
	include "navbar.php";
	?>

<!DOCTYPE html>
<html>
<head>
	<title>all questions</title>
	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1">

	
<style>
	tr:hover{
		background-color:white;
	}

	body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
  background-image:url('../images/p9.jpg');
}
td,th{
	text-align:center;
}
h3{
	text-align: center;
}
</style>
</head>
<body>
	
	<?php
		if(isset($_SESSION['login_user']) && $_SESSION['id']==1){?>
			<h3 ><b>POSTED QUESTIONS</b></h3>
			<?php

			$sql="SELECT * FROM post_question ORDER BY qno DESC;";
			$res=mysqli_query($db,$sql);
			if(mysqli_num_rows($res)==0){
				echo "<div style='text-align:center;'>";
				echo "<h2 style='color:red;'>";
				echo "You haven't posted any question";
				echo "</h2>";
				echo "</div>";
			}
			else{
				echo"<table class='table table-bordered'>";
				echo"<tr style='background-color:#71a9a1;'>";
				echo "<th>";echo "QUESTION NO."; echo "</th>";
				echo "<th>"; echo "POST_DATE"; echo "</th>";
				echo "<th>";echo "POST_TIME"; echo "</th>";
				echo "<th>";echo "DUE_DATE"; echo "</th>";
				echo "<th>"; echo "DUE_TIME"; echo "</th>";
				echo "<th>"; echo "QUESTION"; echo "</th>";
				echo "</tr>";
				while($row=mysqli_fetch_assoc($res)){
					echo "<tr>";
					echo "<td>";echo $row['qno'];echo "</td>";
					echo "<td>";echo $row['start_date'];echo "</td>";
					echo "<td>";echo $row['start_time'];echo "</td>";
					echo "<td>";echo $row['due_date'];echo "</td>";
					echo "<td>";echo $row['due_time'];echo "</td>";
					echo "<td>";echo $row['question'];echo "</td>";
					echo "</tr>";
			}
			echo "</table>";
		}
	}
		
?>
		
</body>
</html>