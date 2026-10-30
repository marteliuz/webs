<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz

include ("config.php");
include ("lib_functions.php");

try {
	$id_prospecto = $_POST['id_prospecto'];

	$qry       = "SELECT * FROM dbcomercial.tbactividad WHERE id_prospecto = '$id_prospecto';";
	$result    = mysql_query($qry);
	$num_rows  = mysql_num_rows($result);

	if ($num_rows == 0) {
		# code...
		echo "No hay actividad para este prospecto."
	} else {
		# code...
		while($Reg = mysql_fetch_array($result)){
			$fecha_actividad = $Reg['fecha_actividad'];
			$accion = $Reg['id_tipo_accion'];
			$objetivo = $Reg['id_objetivo'];
			$obs = $Reg['observaciones'];

			echo $fecha_actividad." - ".$accion." - ".$objetivo." - ".$obs; 
		}
	}
} catch (Exception $e) {
	echo $e;
}
?>