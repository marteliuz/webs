<?php
include("config.php");
session_start();
try{
	mysql_close();
	session_destroy();
	// header('Location: login.html');
	echo "OK";
}catch(Exception $e){
	echo "Error al cerrar sesión ".$e;
}
?>