<?php
session_start();
//if(isset($_SESSION['fid'])){
//include required phpmailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//create instance of phpmailer
$mail=new PHPMailer();
//set mailer to use smtp
$mail->isSMTP();
//define smtp host
$mail->Host = "smtp.gmail.com";
//enable smtp authentication
$mail->SMTPAuth = "true";
//set type of encryption(ssl/tls)
$mail->SMTPSecure = "tls";
//set port to connect smtp
$mail->Port = "587";
//set gamil username
$mail->Username = "kvmrvamsi@gmail.com";
//set gamil password
$mail->Password = "cjkfwlfcbgwabrij";
//set email subject
$mail->Subject = "OTP from CODER BLOG";
//set sender email
$mail->setFrom("kvmrvamsi@gmail.com");
//set body
$p1=$_SESSION['otp2'];
$mail->Body = "$p1";
//add recipient
$p2=$_SESSION['email'];
$mail->addAddress("$p2");
//finally send email
if( $mail->Send() ) {
	echo "Email sent..!";
	$mail->smtpClose();
	?>
		<script type="text/javascript">
					window.location="otp.php";
		</script> 
	<?php
}
else{
	echo "Error..!";
	$mail->smtpClose();
}
//closing smtp connection
//}

?>