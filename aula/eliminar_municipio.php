<?php
include("database.php");
session_start();
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: municipio.php");
}

 $sql="UPDATE municipio SET Status=0 WHERE Id_Municipio=?";
$values=array($id);
Database::executeRow($sql, $values);

 header("location: municipio.php");


?>