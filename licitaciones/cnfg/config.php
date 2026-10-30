<?php
//@date        : 2015/10/25
//@autor       : Marteliuz


// Configuracion Global
	$upload_dir   = "../file_storage/";
	$upload_img   = "../file_storage/logos/";
// Configuracion de la Base de Datos.
	$host         = "localhost"; // Host name 
	$username     = "root"; // Mysql username 
	$password     = "secret"; // Mysql password 
	$db_name      = "dblicitaciones"; // Database name 
	$tb_name	  = "tbdata"; // Table name
	$conexion     = mysql_connect($host,$username,$password);
	
	if (!$conexion) 
	{
		die("Could not connect to MySQL: " . mysql_error());
	}
	$cid = mysql_select_db($db_name, $conexion);
	
	mysql_select_db($db_name, $conexion) OR DIE ("No se Puede Conectar");
	mysql_query("SET NAMES 'utf8'"); //seteamos las consultas con charset UTF-8 para acentos o special chars
?>