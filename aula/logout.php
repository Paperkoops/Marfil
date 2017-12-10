<?php
/* Log out process, unsets and destroys session variables */
    $_SESSION['logged_in'] = false;
session_start();
session_unset();
session_destroy(); 
header("location: index.php");
?>

