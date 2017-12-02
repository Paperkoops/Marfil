<?php
include("database.php");
session_start();
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: materias.php");
}

 $sql="UPDATE materia SET Status=0 WHERE Id_Materia=?";
$values=array($id);
Database::executeRow($sql, $values);

 header("location: materias.php");


?>