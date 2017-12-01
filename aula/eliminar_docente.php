<?php
include("database.php");
session_start();
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: docente.php");
}

 $sql="UPDATE docente SET Status=0 WHERE Id_Docente=?";
$values=array($id);
Database::executeRow($sql, $values);

 header("location: docente.php");


?>