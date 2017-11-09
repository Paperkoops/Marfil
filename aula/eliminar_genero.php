<?php
include("database.php");
session_start();
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: genero.php");
}

 $sql="UPDATE genero SET Status=0 WHERE Id_Genero=?";
$values=array($id);
Database::executeRow($sql, $values);

 header("location: genero.php");


?>