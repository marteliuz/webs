<?php
//@date:    : 2016/05/25
//@autor:   : Marteliuz

include ("config.php");
include ("lib_functions.php");

$rut = $_POST['rut'];
$nombre = $_POST['nombre'];
$ejecutivo = $_POST['ejecutivo'];

try {
	$qry = "INSERT INTO dbclientes.tbclientes (rut, descripcion, id_ejecutivo) VALUES ('$rut', '$nombre', '$ejecutivo')";
	mysql_query($qry);
	$var = mysql_affected_rows();
	if ($var==1)
	{
		echo "OK";
	}else{
		echo "NO";
	}	
} catch (Exception $e) {
	echo "Error: ".$e;	
}

?>