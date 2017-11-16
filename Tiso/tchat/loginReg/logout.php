<?php

session_start();
session_unset(); 

/* Redirect to a different page in the current directory that was requested */
header_remove() ;
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'login.php';
header("Location: http://$host$uri/$extra");
exit;

?>