<?php
include("database.php");
session_start();
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: periodo.php");
}

 $sql="UPDATE periodo SET Status=0 WHERE Id_Periodo=?";
$values=array($id);
Database::executeRow($sql, $values);

 header("location: periodo.php");


?>