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
	$qry = "SELECT descripcion FROM tbejecutivos WHERE idtbejecutivos = '$id_ejecutivo';";
	$result = mysql_query($qry);
	$num_rows = mysql_num_rows($result);
	if($num_rows!=0){
		$Reg = mysql_fetch_array($result);
		$var = $Reg['descripcion'];
		return $var;
	}else{
		return 0;
	}
}
?>