<?php
//@date:    : 2016/05/16
//@autor:   : Marteliuz

include("config.php");

function getQtyProspectosByCliente($id_cliente){
	try {
		$qry ="SELECT COUNT(*) AS count FROM tbprospectos WHERE id_cliente = '$id_cliente';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['count'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getQtyContactosByCliente($id_cliente){
	try {
		$qry ="SELECT COUNT(*) AS count FROM tbcontactos WHERE id_cliente = '$id_cliente';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['count'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getEjecutivoByID($id_ejecutivo){
	$qry = "SELECT * FROM tbejecutivos WHERE idtbejecutivos = '$id_ejecutivo';";
	$result = mysql_query($qry);
	$num_rows = mysql_num_rows($result);
	if($num_rows!=0){
		$Reg = mysql_fetch_array($result);
		$var = $Reg['nombre_ejecutivo'];
		return $var;
	}else{
		return 0;
	}
}

function getNombreClienteById($id_cliente){
	try {
		$qry = "SELECT * FROM tbclientes WHERE idtbclientes = '$id_cliente';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['descripcion'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getNombreContactoById($id_contacto){
	try {
		$qry = "SELECT * FROM dbcomercial.tbcontactos WHERE idtbcontactos = '$id_contacto';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['nombre_contacto'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getCargoContactoById($id_contacto){
	try {
		$qry = "SELECT * FROM dbcomercial.tbcontactos WHERE idtbcontactos = '$id_contacto';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['cargo_contacto'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getCorreoContactoById($id_contacto){
	try {
		$qry = "SELECT * FROM dbcomercial.tbcontactos WHERE idtbcontactos = '$id_contacto';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['correo_contacto'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getTelefonoContactoById($id_contacto){
	try {
		$qry = "SELECT * FROM dbcomercial.tbcontactos WHERE idtbcontactos = '$id_contacto';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['telefono_contacto'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getMonedaById($id_moneda){
	try {
		$qry = "SELECT * FROM dbcomercial.tbmoneda WHERE idtbmoneda = '$id_moneda';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['descripcion'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getQtyClientesByEjecutivo($id_ejecutivo){
	try {
		$qry = "SELECT count(*) AS count FROM tbclientes WHERE id_ejecutivo = '$id_ejecutivo';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['count'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getQtyProspectosByEjecutivo($id_ejecutivo){
	try {
		$qry = "SELECT count(*) AS count FROM tbprospectos WHERE id_ejecutivo = '$id_ejecutivo';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['count'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getIMGByEjecutivo($id_ejecutivo){
	try {
		$qry = "SELECT * FROM dbcomercial.tbejecutivos WHERE idtbejecutivos = '$id_ejecutivo';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['img_url_ejecutivo'];		
	} catch (Exception $e) {
		return "error";
	}
}

function crearActividad($id_prospecto, $detalle){
	try {
		$qry = "INSERT INTO dbcomercial.tbactividad (id_prospecto, id_tipo_accion, observaciones) VALUES ('$id_prospecto', '0', '$detalle');";
		if (mysql_query($qry) === true) {
			return "OK";
		}else{
			return "NO";
		}
	} catch (Exception $e) {
		return "error";		
	}
}

function getLastActivity($id_prospecto){
	try {
		$qry = "SELECT * FROM dbcomercial.tbactividad WHERE id_prospecto = '$id_prospecto' ORDER BY fecha_actividad DESC LIMIT 1;";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['fecha_actividad'];

	} catch (Exception $e) {
		echo $e;
	}
}

function getActivityLog($id_prospecto){
	try {
		$qry = "SELECT * FROM dbcomercial.tbactividad WHERE id_prospecto = $id_prospecto;";
		$result = mysql_query($qry);
		$num_rows = mysql_num_rows($result);
	    if($num_rows==0){
	    	echo "No hay actividad que mostrar.";
	    }else{
			while($Reg = mysql_fetch_array($result))
		    {
		    	$fecha_actividad = strtotime($Reg["fecha_actividad"]);
        		$fecha_actividad = date('d-m-y H:i', $fecha_actividad);




		    	$value = "";
		    	if ($Reg["id_tipo_accion"]=="0" || $Reg["id_tipo_accion"]==0) {
		    		$value = $value.$fecha_actividad." - ".$Reg["observaciones"]."\n";
		    	}else{
		    		$id_tipo_accion = $Reg["id_tipo_accion"];
		    		$tipo_accion    = getTipoAccionById($id_tipo_accion);
		    		$id_objetivo    = $Reg["id_objetivo"];
		    		$objetivo       = getObjetivoById($id_objetivo);
		    		$value = $value.$fecha_actividad." - ".$tipo_accion." - ".$objetivo." - ".$Reg["observaciones"]."\n";
		    	}
		    	echo $value;
		    }	
	    }
	} catch (Exception $e) {
		echo "error";
	}
}

function getObjetivoById($id_objetivo){
	try {
		$qry = "SELECT * FROM dbcomercial.tbojetivos WHERE idtbojetivos = '$id_objetivo';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['descripcion'];		
	} catch (Exception $e) {
		return "error";
	}
}

function getTipoAccionById($id_tipo_accion){
	try {
		$qry = "SELECT * FROM dbcomercial.tbtipoaccion WHERE idtbtipoaccion = '$id_tipo_accion';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['descripcion'];		
	} catch (Exception $e) {
		return "error";
	}
}

function getAppVersion(){
	try {
		$qry = "SELECT * FROM dbcomercial.tbchangelog ORDER BY idtbchangelog DESC LIMIT 1";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['version'];		
	} catch (Exception $e) {
		return "error";
	}	
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

?>