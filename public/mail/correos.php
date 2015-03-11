<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'correo';                 // SMTP username
$mail->Password = 'clave';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'barcadict@gmail.com';
$mail->FromName = 'Contacto Manantiales';
$mail->addAddress('h2d_07@hotmail.com', 'Hector Sevilla');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Contacto';
$mail->Body    = '<b>Nombre: </b>'.$_POST["nombre"].'<br>'.'<b>Telefono: </b>'.$_POST["telefono"].'<br>'.'<b>Correo: </b>'.$_POST["correo"].'<br>'.'<b>Comentarios: </b>'.$_POST["comentario"].'<br>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    $message= 'Mensaje No Enviado, lo sentimos a ocurrido un error';
	echo $message;
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	//header("Location: http://localhost:8080/manantiales/public/");
} else {
    $message= 'Mensaje Enviado';
	echo $message;
	//header("Location: http://localhost:8080/manantiales/public/");
}