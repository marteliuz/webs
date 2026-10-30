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

function getNombreContactoById($id_contacto)
{
	try {
		$qry = "SELECT * FROM dbcomercial.tbcontactos WHERE idtbcontactos = '$id_contacto';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['nombre_contacto'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getCargoContactoById($id_contacto)
{
	try {
		$qry = "SELECT * FROM dbcomercial.tbcontactos WHERE idtbcontactos = '$id_contacto';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['cargo_contacto'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getCorreoContactoById($id_contacto)
{
	try {
		$qry = "SELECT * FROM dbcomercial.tbcontactos WHERE idtbcontactos = '$id_contacto';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['correo_contacto'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getTelefonoContactoById($id_contacto)
{
	try {
		$qry = "SELECT * FROM dbcomercial.tbcontactos WHERE idtbcontactos = '$id_contacto';";
		$result = mysql_query($qry);
		$Reg = mysql_fetch_array($result);

		return $Reg['telefono_contacto'];
		
	} catch (Exception $e) {
		return "error";
	}
}

function getMonedaById($id_moneda)
{
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
?>