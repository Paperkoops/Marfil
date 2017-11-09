<?php
include("database.php");
session_start();
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: transporte.php");
}

 $sql="UPDATE medio_transporte SET Status=0 WHERE Id_Medio=?";
$values=array($id);
Database::executeRow($sql, $values);

 header("location: transporte.php");


?>