<?php
include "connection.php";
include "navbar.php";

?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style>
		body{
			background-image:url('images/b8.jpg');
			
		}
		.wrapper{
			color:white;
			margin:0 auto;
			width:350px;	
			font-weight: bold;
			background-color:grey;
			border-radius: 20px;
			height:450px;
		}
		.box1{
			text-align:center;
			color:black;
		}
		h2{
			color:black;
		}
		td,th{
			text-align: center;
		}
		table{
			border:1px solid grey;
		}
		
	</style>
</head>
<body>
	<?php if(isset($_SESSION['login_user'])){?>
	<div class="container">
		<form action="" method="post">
				<button type="submit" class="btn btn-default" style="float:right;width:60px;" name="submit">Edit</button>
			</form>
		<div class="wrapper">
			<?php
			if(isset($_POST['submit'])){
			?>
				<script type="text/javascript">
				 	window.location="profile_edit.php"
				</script>
			<?php
			}
			if($_SESSION['id']==2){
				$res=mysqli_query($db,"SELECT * FROM student_login where username='$_SESSION[login_user]';");
				$row=mysqli_fetch_assoc($res);
			}
			else if($_SESSION['id']==1){
				$res=mysqli_query($db,"SELECT * FROM admin_login where username='$_SESSION[login_user]';");
				$row=mysqli_fetch_assoc($res);

			}?>
			<h2 style="text-align:center;">My Profile</h2>
				<?php
					echo "<div style='text-align:center;'>";
					echo "<img width=120 height=110 src='images/".$_SESSION['pic']."'class='img-circle profile_img'>";
					echo "</div>";
				?>
			<div class="box1">Welcome
			<h4><?php echo $_SESSION['login_user'];?></h4>
			</div>
			<?php
			echo "<table class='table'>";
			echo "<tr>";echo "<td>"; echo "FirstName:"; echo "</td>"; echo "<td>"; echo $row['first_name']; echo "</td>"; echo "</tr>";
			echo "<tr>";echo "<td>"; echo "LastName:"; echo "</td>"; echo "<td>"; echo $row['last_name']; echo "</td>"; echo "</tr>";
			echo "<tr>";echo "<td>"; echo "Username:"; echo "</td>"; echo "<td>"; echo $row['username']; echo "</td>"; echo "</tr>";
			echo "<tr>";echo "<td>"; echo "Email:"; echo "</td>"; echo "<td>"; echo $row['email']; echo "</td>"; echo "</tr>";
			echo "<tr>";echo "<td>"; echo "Contact:"; echo "</td>"; echo "<td>"; echo $row['contact']; echo "</td>"; echo "</tr>";
			echo "</table>";
		?>
			
		</div>
	</div>
<?php } ?>
</body>
</html>