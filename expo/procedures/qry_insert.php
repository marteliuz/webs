<?php
require("../config/config.php");

$nombre  = $_POST["nombre"];
$empresa = $_POST["empresa"];
$cargo   = $_POST["cargo"];
$email   = $_POST["email"];
$detalle = $_POST["detalle"];

$qry= "INSERT INTO dbexpo.tbclientes (nombre, empresa, cargo, email, detalle) 
		VALUES ('$nombre', '$empresa', '$cargo', '$email', '$detalle');";

mysql_query($qry);
$var = mysql_affected_rows();
if ($var==1)
{
	echo "OK";
}else{
	echo "NO";
}
?>