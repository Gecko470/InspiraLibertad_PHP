<?php

require_once("php/PHPmailer.php");
require_once("php/SMTP.php");
require_once("php/Exception.php");


/* $msj = "<h3>Datos consulta: </h3><hr/><p>Nombre: $nombre</p><p>Email: $email</p><p>Mensaje: $mensaje</p>"; */
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');


//Create a new PHPMailer instance
$mail = new PHPMailer(true);
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server
$mail->Host = 'smtp.office365.com';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
$mail->CharSet="UTF-8";

//Username to use for SMTP authentication
$mail->Username = 'miCorreo';
//Password to use for SMTP authentication
$mail->Password = 'miClave';
//Set who the message is to be sent from
$mail->setFrom('miCorreo', 'Inspira Libertad');
//Set an alternative reply-to address
/* $mail->addReplyTo('otrocorreom', 'Inspira Libertad'); */
//Set who the message is to be sent to
/* $mail->addAddress('micorreo', 'Maria Gomez'); */
//Set the subject line
/* $mail->Subject = 'Consulta cliente Inspira Libertad'; */
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
/* $mail->msgHTML($msj); */
//Replace the plain text body with one created manually
/* $mail->Body = $msj; */
//Attach an image file
/* $mail->addAttachment('images/phpmailer_mini.png'); */
/* $mail->send(); */