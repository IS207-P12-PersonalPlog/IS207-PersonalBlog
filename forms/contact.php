<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

//Has trouble at this line
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "22520213@gm.uit.edu.vn";
$mail->Password = "123456789";

$mail->setFrom($email, $name);
$mail->addAddress("leducdat0907@gmail.com", "Dat");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

echo "email sent";