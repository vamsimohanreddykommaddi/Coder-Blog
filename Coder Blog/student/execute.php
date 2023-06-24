<?php
 include "navbar.php";
 include "../connection.php";
 ?>
<html>
	<head>
		<title>Execute</title>
		<style>
			button{
				display:inline;
				margin-top:150px;
				float:left;
				padding:20px;
				margin-left:230px;
				text-align:center;
				background-color:blue;
				opacity:0.8;
				color:ghostwhite;
				border-radius:10px;
			}
			button:hover
			{
				background-color:orange;
				color:blue;
			}
			body{
				background-image:url("../images/main_back.jpg");
				background-repeat:no repaeat;
				background-size:cover;
			}
		</style>
	</head>
	<body>
		<section>
			<button onclick="window.location.href='https://www.jdoodle.com/c-online-compiler/';">C LANGUAGE</button>
			<button onclick="window.location.href='https://www.jdoodle.com/online-compiler-c++/';">C++</button>
			<button onclick="window.location.href='https://www.jdoodle.com/a/4SJb';">JAVA</button>
			<button onclick="window.location.href='https://www.jdoodle.com/python3-programming-online/';">PYTHON</button>
		</section>
	</body>
</html>