<?php
include("database.php");
session_start();
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: alumnos.php");
}

 $sql="UPDATE alumno SET Status=0 WHERE NIE=?";
$values=array($id);
Database::executeRow($sql, $values);

 header("location: alumnos.php");


?>