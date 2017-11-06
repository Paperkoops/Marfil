<?php
include("database.php");
session_start();
$id = null;
if (!empty($_GET['id']) && !empty($_GET['mes'])) {
	$id = $_REQUEST['id'];
	$mes = $_REQUEST['mes'];
}

if (null == $id ) {
	header("Location: admin_pagos.php");
}
if (null == $mes ) {
	header("Location: admin_pagos.php");
}

 $sql="UPDATE pago SET Status=1 WHERE Id_Pago=?";
$values=array($id);
Database::executeRow($sql, $values);

 header("location: admin_pagos.php?Mes=$mes");


?>