<?php
include("database.php");
session_start();
$id = null;
$id2 = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: agregar_usuario.php");
}

if (!empty($_GET['id2'])) {
	$id2 = $_REQUEST['id2'];
}

if (null == $id2 ) {
	header("Location: agregar_usuario.php");
}

 $sql="UPDATE usuarios SET Status=0 WHERE Id_Usuario=?";
$values=array($id);
Database::executeRow($sql, $values);

$sql="UPDATE docente SET cuenta=0 WHERE Id_Docente=?";
$values=array($id2);
Database::executeRow($sql, $values);

 header("location: agregar_usuario.php");


?>