<?php
include("database.php");
session_start();
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: religion.php");
}

 $sql="UPDATE religion SET Status=0 WHERE Id_Religion=?";
$values=array($id);
Database::executeRow($sql, $values);

 header("location: religion.php");


?>