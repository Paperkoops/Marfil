<?php
include("database.php");

$email = $_POST['email'];
$password = $_POST['password'];
/*$sql = "SELECT Correo FROM usuarios WHERE Correo = ? AND Status=?";
$values=array($email, 1);
Database::executeRow($sql, $values); */

$aVar = mysqli_connect("localhost", "root", "", "base_colegio");

$result = mysqli_query($aVar, "SELECT * FROM usuarios WHERE Correo = '$email' AND Pass = '$password' AND Status = 1");

//$row = mysqli_fetch_assoc($result);
$user = $result->fetch_assoc();
//print_r($user); die;

if ($user['Correo'] == $email && $user['Pass'] == $password) {

    session_start(); 
    $_SESSION['email'] = $user['Correo'];
    $_SESSION['docente'] = $user['Id_Docente'];

    $_SESSION['logged_in'] = true;
    header("location: index.php");

} else {
    header("location: login.php");
    echo "<script>alert('Usuario o contraseña incorrectos');</script>";
}



/*

if ($sql->num_rows == 0) { //no existe
    echo "<script>alert('Correo inválido');</script>";
}
else { //existe
    $user = $sql->mysql_fetch_assoc();
    if (password_verify($_POST['password'], $user['Pass'])) {
        $_SESSION['email'] = $user['Correo'];
        $_SESSION['docente'] = $user['Id_Docente'];

        $_SESSION['logged_in'] = true;
        header("location: index.php");
    }
} */
?>