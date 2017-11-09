<?php
include("database.php");
session_start();
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: departamento.php");
}

 $sql="UPDATE departamento SET Status=0 WHERE Id_Departamento=?";
$values=array($id);
Database::executeRow($sql, $values);

 header("location: departamento.php");


?>