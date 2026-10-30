<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz
include ("config.php");
include ("lib_functions.php");

try {
	$id_cliente        = $_POST['id_cliente'];
	$id_ejecutivo      = $_POST['id_ejecutivo'];
	$id_contacto       = $_POST['id_contacto'];
	$nombre_prospecto  = $_POST['nombre_prospecto'];
	$detalle_prospecto = $_POST['detalle_prospecto'];
	$fecha_esperada_c  = $_POST['fecha_esperada_c'];
	    $fecha_esperada_c = strtotime($fecha_esperada_c);
	    $fecha_esperada_c = date('Y-m-d', $fecha_esperada_c);

	$porcent_cierre    = $_POST['porcent_cierre'];
	$cotizacion        = $_POST['cotizacion'];
	$monto 		       = $_POST['monto'];
	$moneda			   = $_POST['moneda'];


	$qry = "INSERT INTO dbcomercial.tbprospectos 
	(id_cliente, id_contacto, id_ejecutivo, nombre_prospecto, descripcion, porcent_cierre, fecha_esp_cierre, cotizacion, monto, id_moneda) 
	VALUES ('$id_cliente', '$id_contacto', '$id_ejecutivo', '$nombre_prospecto', '$detalle_prospecto', '$porcent_cierre', '$fecha_esperada_c', '$cotizacion', '$monto', '$moneda');";
	
	// echo $qry;

	if (mysql_query($qry) === true) {
		// echo "Prospecto creado con  ID ".$id_prospecto;
		$id_prospecto = mysql_insert_id();
		if (crearActividad($id_prospecto, "Creación de Prospecto.")=="OK") {
			echo "OK-".$id_prospecto;
		}
	}else{
		echo "NO-";
	}	
} catch (Exception $e) {
	echo "ERROR-".$e;
}
?>