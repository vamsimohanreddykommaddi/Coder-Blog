<?php
	session_start();
	include "connection.php";
?>
<html>
<head>
	<title>Coder Blog</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">
		nav{
			float:right;
			word-spacing: 30px;
			padding:20px;
		}

		/* to display in one line of navigation of list */
		nav li{
			display:inline-block;
			line-height: 38px;
		}
		.logo h1{
			color:white;
			margin-left:42%;
		}
		.index_image .box h1{
			color:#d6481c;
			text-align:center;
			font-size:30px;
		}
		.index_image .box h3{
			color:#d6481c;
			text-align:right;
			margin-top: -50px;
			font-size:15px;
			margin-top: 10px;
			margin-right: :10px;
		}
		section{
			font-family: courier,arial;
			background-attachment: fixed;
			background-position: absolute;
			background-size: cover;
		}
		.index_image .box{
			height:420px;
			width:750px;
			background-color:#f7f7bd;
			margin:23px auto;
			opacity:0.7;
			border-radius: 50px;

		}

		h2{
			text-align: center;
			margin-top:10px;
			color:black;
			font-size:27px;
		}
		#demo{
		  text-align: center;
		  font-size: 35px;
		  margin-top: 20px;
		}

		.wrapper{
			height:580px;
			width:100%;
		 }

		 /*for header block */
		 header{
			 height:90px;
			width:100%;
			 background-color:#99ceb1;
		 }
		 section{
			height:410px;
			width:100%;
		 }
		 footer{
			height:80px;
			width:100%;
			background-color:#99ceb1;
			}
		 body{
			width:99%;
			height:auto;
		 }
		 .details{
			color:white;
			margin-top: 245px;
			margin-left:15px;
		 }
		 a{
			background-color:#99ceb1;
			opacity:0.9;
			padding: 0px 7px;
			text-align:center;
			color:black;
			text-decoration:none;
			display:inline-block;
		}
		a:hover,a:active{
			background-color:#f7f7bd;
			opacity:0.7;
			color:black;
		}
		body{
			background-image:url('images/mbg1.jpg');
			background-repeat:no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body>
	<?php
	$p=mysqli_query($db,"SELECT due_date,due_time FROM post_question WHERE trend=1;");
	$h2=0;
	if($p!=false){
		$h2=mysqli_num_rows($p);
	}
	if($h2!=0){
		$row=mysqli_fetch_assoc($p);
		$pp=$row['due_date']." ".$row['due_time'];
		?>
		<!-----------countdown timer--------->
		<script>
			// Set the date we're counting down to
			var countDownDate = new Date("<?php echo $pp;?>").getTime();

			// Update the count down every 1 second
			var x = setInterval(function() {

			  // Get today's date and time
			  var now = new Date().getTime();
			    
			  // Find the distance between now and the count down date
			  var distance = countDownDate - now;
			    
			  // Time calculations for days, hours, minutes and seconds
			  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			  // Output the result in an element with id="demo"
			  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
			  + minutes + "m " + seconds + "s ";
			    
			  // If the count down is over, write some text 
			  if (distance < 0) {
			    clearInterval(x);
			    document.getElementById("demo").innerHTML = "TIMED OUT";

			  }
			}, 1000);
		</script>
		
		<?php
	}
	?>
	<div class="wrapper">
		<header>
			<div class="logo">
				<?php
				 echo "<img src='images/pp3.png' width=50 height=40>";
				 ?>
				<h1>CODER&nbsp;&nbsp;BLOG</h1>
			</div>
			<?php
				if(isset($_SESSION['login_user']))
				{
			?>
				<nav>
					<ul>
						<li><a  href="index.php">HOME</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
						<li><a>COMMENTS</a></li>
					</ul>
				</nav>
			<?php
			}
			else{
			?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="login.php">LOGIN</a></li>
						<li><a href="signup.php">SIGN-UP</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
					</ul>
				</nav>
			<?php
			}
			?>
		</header>
		<section>
			<div class="index_image">
				<br><br>
				<div class="box">
					<center>
					<h1>&nbsp;&nbsp;WELCOME TO CODER BLOG</h1><br>
					</center>
					<div style="text-align: center;"> <img src='images/ind_logo.png' width=90 height=80></div>
					<h1>Today question</h1><br>
					<h2>
						<?php
							$sql="SELECT * FROM post_question WHERE trend=1;";
							$res=mysqli_query($db,$sql);
							if($res!=false){
									$row=mysqli_fetch_assoc($res);
									echo $row['question'];
									?>
									<p id="demo">TIMER</p>
								</h2>
									<h3>
										<span style="color:black">Due_Date:</span><?php echo $row['due_date']."<br>"."<br>";?>
										<span style="color:black">Due_Time:</span><?php echo $row['due_time'];?>
									</h3>
									<?php
							}
						?>	
				</div>
			</div>
		</section>
		<footer>
		<div class="details"><br>
			Email:&nbsp;&nbsp;admin@gmail.com<br><br>
			Phone:&nbsp;&nbsp;6301190308
		</div>
	</footer>
	</div>
	
</body>
</html>