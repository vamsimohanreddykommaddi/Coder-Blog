<?php
session_start();
if(isset($_SESSION['login_user']))
{
	unset($_SESSION['login_user']);
	unset($_SESSION['id']);
	unset($_SESSION['pic']);
}
	header("location:index.php");
?>