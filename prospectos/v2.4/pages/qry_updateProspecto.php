<?php
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
	$estado			   = $_POST['estado'];
	$id_empresa        = $_POST['id_empresa'];
	$convenio_marco    = $_POST['convenio_marco'];

	
	switch ($estado) {
		case '4':
			# Cerrado...
			// $sett = ", nota_venta='".$_POST['nota_venta']."'";
			$now = date("Y-m-d H:i:s");
			$sett = ", nota_venta='".$_POST['nota_venta']."', porcent_cierre='100', fecha_cierre='$now', motivo='' ";
			break;
		case '5':
			# Descartado...
			// $sett = ", motivo='".$_POST['motivo']."'";
			$sett = ", nota_venta='', porcent_cierre='0', motivo='".$_POST['motivo']."'";
			break;
		default:
			$sett = "";
	}

	$qry = "UPDATE dbcomercial.tbprospectos SET descripcion='$detalle_prospecto', 
	fecha_esp_cierre='$fecha_esperada_c', 
	cotizacion='$cotizacion', 
	monto='$monto', 
	id_empresa='$id_empresa', 
	convenio_marco='$convenio_marco',
	estado='$estado' ".$sett." 
	WHERE idtbprospectos=$id_prospecto";
	
	// echo "log>".$qry;

	if(mysql_query($qry) === true){
		switch ($estado) {
			case '4':
				if (crearActividad($id_prospecto, "Prospecto cerrado con nota de venta ".$_POST['nota_venta'])=="OK") {
					echo "OK>";
				}
				break;
			case '5':
				if (crearActividad($id_prospecto, "Prospecto descartado con motivo: ".$_POST['motivo'])=="OK") {
					echo "OK>";
				}
				break;
			default:
				if (crearActividad($id_prospecto, "Información de prospecto actualizada")=="OK") {
					echo "OK>";
				}
				break;
		}

	}else{
		echo "NO>".mysql_error();
	}
} catch (Exception $e) {
	echo "ERROR>".$e;
}
?>