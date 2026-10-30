<?php
//@date        : 2015/03/17
//@autor       : Marteliuz

// Configuracion de la Base de Datos.
$host         = "localhost"; // Host name 
$username     = "root"; // Mysql username 
$password     = "admin.."; // Mysql password 
$db_name      = "dbexpo"; // Database name 
$tb_name	  = "tbclientes"; // Table name
$conexion     = mysql_connect($host,$username,$password);

if (!$conexion) 
{
	die("Could not connect to MySQL: " . mysql_error());
}
$cid = mysql_select_db($db_name, $conexion);

mysql_select_db($db_name, $conexion) OR DIE ("No se Puede Conectar");
mysql_query("SET NAMES 'utf8'"); //seteamos las consultas con charset UTF-8 para acentos o special chars
?>