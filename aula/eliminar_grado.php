<?php
include("database.php");
session_start();
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: grados.php");
}

 $sql="UPDATE grado SET Status=0 WHERE Id_Grado=?";
$values=array($id);
Database::executeRow($sql, $values);

 header("location: grados.php");


?>