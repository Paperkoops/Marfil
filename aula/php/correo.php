<?php   
include 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure  = 'ssl';
$mail->Username = "hokumageo@gmail.com";
$mail->Password = "22357237Pachi";
$mail->setFrom('hokumageo@gmail.com','Brandon Giovanni');
$mail->addReplyTo('hokumageos@gmail.com','Yo alterno');
$mail->addAddress('hokumageos@gmail.com','Yo alterno');
$mail->Subject = 'Prueba de correo UwU';
$mail->Body = "Este es un mensaje de prueba <h1>En teoria es full html nativo</h1>";
$mail->AltBody = "Hola OWO";
if(!$mail->send()){
    echo "Mailer Error:".$mail->ErrorInfo;
}
else{
    echo "Message sent!";
}
?>