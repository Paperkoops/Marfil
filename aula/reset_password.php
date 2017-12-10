<?php
/* Password reset process, updates database with new user password */
require 'database.php';
session_start();

// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Make sure the two passwords match
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

       // $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        $new_password = $_POST['newpassword'];
        // We get $_POST['email'] from the hidden input field of reset.php form
        $email = $mysqli->escape_string($_POST['email']);
        
        $sql = "UPDATE usuarios SET Pass='$new_password' WHERE Correo='$email'";

        if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "¡Tu contraseña ha sido actualizada!";
        header("location: success.php");    

        }

    }
    else {
        $_SESSION['message'] = "Las contraseñas no coinciden, por favor intenta de nuevo";
        header("location: error.php");    
    }

}
?>