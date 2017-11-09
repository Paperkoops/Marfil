<?php
include("database.php");
session_start();
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: estado_civil.php");
}

 $sql="UPDATE estado_civil SET Status=0 WHERE Id_Estado=?";
$values=array($id);
Database::executeRow($sql, $values);

 header("location: estado_civil.php");


?>