<?php   
include 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure  = 'ssl';
//$mail->Debugoutput = 'html';
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "dayana.072000@gmail.com";
$mail->Password = "fiorella07062000";
$mail->setFrom('dayana.072000@gmail.com');
// $mail->addReplyTo('hokumageos@gmail.com','Yo alterno');
$mail->addAddress('$email');
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