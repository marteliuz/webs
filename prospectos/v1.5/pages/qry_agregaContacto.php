<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz

include ("config.php");
include ("lib_functions.php");

$id_ejecutivo = $_POST['id_ejecutivo'];
$id_cliente   = $_POST['id_cliente'];
$nombre       = $_POST['nombre'];
$cargo        = $_POST['cargo'];
$correo       = $_POST['correo'];
$telefono     = $_POST['telefono'];


$qry = "INSERT INTO dbcomercial.tbcontactos (id_cliente, nombre_contacto, cargo_contacto, correo_contacto, telefono_contacto, id_ejecutivo) VALUES ('$id_cliente', '$nombre', '$cargo', '$correo', '$telefono', '$id_ejecutivo');";
mysql_query($qry);
$var = mysql_affected_rows();
if ($var==1)
{
	echo "OK";
}else{
	echo "NO";
}	

?>