<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz
include ("config.php");
include ("lib_functions.php");

try {
	$id_prospecto = $_POST['id_prospecto'];
	$detalle_prospecto = $_POST['detalle_prospecto'];
	$fecha_esperada_c  = $_POST['fecha_esperada_c'];
	    $fecha_esperada_c = strtotime($fecha_esperada_c);
	    $fecha_esperada_c = date('Y-m-d', $fecha_esperada_c);

	$porcent_cierre    = $_POST['porcent_cierre'];
	$cotizacion        = $_POST['cotizacion'];
	$monto 		       = $_POST['monto'];

	$qry = "UPDATE dbcomercial.tbprospectos SET descripcion='$detalle_prospecto', porcent_cierre='$porcent_cierre', fecha_esp_cierre='$fecha_esperada_c', cotizacion='$cotizacion', monto='$monto' WHERE idtbprospectos=$id_prospecto;";
	if(mysql_query($qry) === true){
		if (crearActividad($id_prospecto, "Información de prospecto actualizada")=="OK") {
			echo "OK-";
		}
	}else{
		echo "NO-";
	}
} catch (Exception $e) {
	echo "ERROR-".$e;
}
?>