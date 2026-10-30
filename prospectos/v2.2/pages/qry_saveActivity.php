<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz
include ("config.php");
include ("lib_functions.php");

try {
	$id_prospecto  = $_POST['id_prospecto'];
	$id_accion     = $_POST['accion'];
	$id_objetivo   = $_POST['objetivo'];
	$observaciones = $_POST['observaciones'];

	$qry = "INSERT INTO dbcomercial.tbactividad 
	(id_prospecto, id_tipo_accion, id_objetivo, observaciones) VALUES ('$id_prospecto', '$id_accion', '$id_objetivo', '$observaciones');";

	if (mysql_query($qry) === true) {
		echo "OK-";
	}else{
		echo "NO-";
	}	
} catch (Exception $e) {
	echo "ERROR-".$e;
}
?>