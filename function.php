<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//Load Composer's autoloaderf

function phpmailsend($to, $subject, $content)
{
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = 'smtp.gmail.com'; //
	$mail->SMTPAuth = TRUE;
	$mail->Username = "manjunathbhavi25@gmail.com";
	$mail->Password = "git@123456";
	$mail->SMTPSecure = 'ssl'; // tls or ssl 
	$mail->Port     = "465"; //465

	$mail->SMTPDebug = 0;
	$mail->SetFrom('manjunathbhavi25@gmail.com', "Food Project");

	$mail->addAddress($to); //we can add here multiple email 

	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body = $content;


	if (!$mail->Send()) {
		echo $mail->ErrorInfo;
		return false;
	} else {
		return true;
	}
}

?>