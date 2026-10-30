<?php
//@date:    : 2016/06/10
//@autor:   : Marteliuz
// ajax.send("id_ejecutivo="+ejecutivo+"&id_cliente="+id_cliente+"&activo="+activo+"&rut="+rut+"&nombre="+nombre);

//include ("config.php");
include ("lib_functions.php");

$enlace = mysqli_connect("localhost", "root", "", "dbclientes");


$rut 			= $_POST['rut'];
$descripcion 	= $_POST['nombre'];
$id_ejecutivo	= $_POST['id_ejecutivo'];
$id_cliente 	= $_POST['id_cliente'];
$activo 		= $_POST['activo'];

try {
	// $qry = "INSERT INTO dbclientes.tbclientes (rut, descripcion, id_ejecutivo) VALUES ('$rut', '$nombre', '$ejecutivo')";
	$qry = "UPDATE dbclientes.tbclientes SET rut='$rut', descripcion='$descripcion', id_ejecutivo='$id_ejecutivo', activo='$activo' WHERE idtbclientes='$id_cliente'";
	// echo $qry;
	// mysql_query($qry);
	// $var = mysql_affected_rows();
	// $var = mysql_info();

	// mysqli_query($enlace, mysqli_real_escape_string($enlace, $qry));
	mysqli_query($enlace, $qry);

	$var = mysqli_affected_rows($enlace);

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