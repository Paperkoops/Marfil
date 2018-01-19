<?php
require 'database.php';
include 'php/phpmailer/PHPMailerAutoload.php';
session_start();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
//revisssssssssssssaaaaaaarrrrrrrr
    $email = $_POST['email'];
    $aVar = mysqli_connect("localhost", "root", "", "base_colegio");
    $result = mysqli_query($aVar, "SELECT * FROM usuarios WHERE Correo = '$email' AND Status = 1");

    $user = $result->fetch_assoc();
    //print_r($user); die;



    if ($user['Correo'] == $email)  { // Usuario con ese correo existe
        
        $email = $user['Correo'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>Por favor dirígete a tu correo <span>$email</span>"
        . " para poder reestablecer tu contraseña</p>";

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Recuperar tu contaseña';
        $message_body = '
        Hola, has solicitado reestablecer tu contraseña

        Por favor clickea el siguiente link para terminar tu proceso:

        http://localhost/Marfil/aula/reset.php?email='.$email;  



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
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $message_body;
        //$mail->AltBody = "Hola OWO";
        if(!$mail->send()){
            echo "Mailer Error:".$mail->ErrorInfo;
            print_r($user); die;
            header("location: login.php");
        }
        else{
            echo "Message sent!";
            header("location: success.php");
        }

/*
        if (mail($to, $subject, $message_body))
        {

            header("location: success.php");
        }
        else {

            header("location: login.php");
        } */
        
    }
    else { // No existe

        header("location: login.php");

  }
}
?>