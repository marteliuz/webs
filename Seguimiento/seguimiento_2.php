<?php @session_start();

if($_SESSION["autentica"] != "SIP"){

header("Location: index.php");
exit();}else { 
    //sino, calculamos el tiempo transcurrido 
    $fechaGuardada = $_SESSION["ultimoAcceso"]; 
    $ahora = date("Y-n-j H:i:s"); 
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

    //comparamos el tiempo transcurrido 
     if($tiempo_transcurrido >= 300) { 
     //si pasaron 10 minutos o más 
      session_destroy(); // destruyo la sesión 
      header("Location: index.php"); //envío al usuario a la pag. de autenticación 
      //sino, actualizo la fecha de la sesión 
    }else { 
    $_SESSION["ultimoAcceso"] = $ahora; 
   } 
} 
include ("libreria.php");
$id        = $_POST['id'];


	$situacion_cotizacion		 		= $_POST['situacion_cotizacion'];
	$situacion_orden_compra		 		= $_POST['situacion_orden_compra'];
	$situacion_factura					= $_POST['situacion_factura'];  
	
	
	$con = mysql_connect("localhost","root","Touchmedia");
	mysql_set_charset('utf8');
	mysql_select_db("inventario",$con);

if($situacion_orden_compra=="5" && $situacion_factura!="0" && $situacion_cotizacion!="0"){
	$qry="UPDATE facturacion SET Situacion_Cotizacion= '$situacion_cotizacion', Situacion_Orden_Compra='$situacion_orden_compra',Situacion_Factura='$situacion_factura' WHERE ID_Facturacion='$id'";
	
	$result= mysql_query($qry);
	
}

elseif($situacion_orden_compra=="5" && $situacion_factura=="0"){
	$qry = "UPDATE facturacion SET Situacion_Cotizacion= '$situacion_cotizacion', Situacion_Orden_Compra='$situacion_orden_compra', Situacion_Factura='1' WHERE ID_Facturacion='$id'";
	
	$result= mysql_query($qry);
	
}

elseif($situacion_orden_compra=="5" && $situacion_factura!="0" ){
	$qry = "UPDATE facturacion SET Situacion_Cotizacion= '$situacion_cotizacion', Situacion_Orden_Compra='$situacion_orden_compra', Situacion_Factura='$situacion_factura' WHERE ID_Facturacion='$id'";
	
	$result= mysql_query($qry);
	
}
elseif($situacion_orden_compra=="2"){
	$qry="UPDATE facturacion SET Situacion_Cotizacion= '$situacion_cotizacion', Situacion_Orden_Compra='$situacion_orden_compra',Situacion_Factura='$situacion_factura' WHERE ID_Facturacion='$id'";

	$result= mysql_query($qry);
	
	$qry1="SELECT Vendedor FROM facturacion WHERE ID_Facturacion='$id'";
	
	$result1= mysql_query($qry1);
	$reg=mysql_fetch_array($result1);
	$nombre	= 	Seguimiento_Vendedor($reg['Vendedor']);
	$correo	=	Seguimiento_Vendedor1($reg['Vendedor']);
	
	mail("$correo","Su Orden de Compra ha sido ACEPTADA","Estimado $nombre: Su orden de compra ha sido aceptada por el Area de Operaciones, el estado de esta orden de compra esta disponible en el software de seguimiento. Saludos");

}	

elseif($situacion_orden_compra=="3"){
	
	$qry="UPDATE facturacion SET Situacion_Cotizacion= '$situacion_cotizacion', Situacion_Orden_Compra='$situacion_orden_compra',Situacion_Factura='$situacion_factura' WHERE ID_Facturacion='$id'";
	
	$result= mysql_query($qry);
	
	$qry1="SELECT Vendedor FROM facturacion WHERE ID_Facturacion='$id'";
	
	$result1= mysql_query($qry1);
	$reg=mysql_fetch_array($result1);
	$nombre	= 	Seguimiento_Vendedor($reg['Vendedor']);
	$correo	=	Seguimiento_Vendedor1($reg['Vendedor']);
	
	mail("$correo","Su Orden de Compra ha sido RECHAZADA","Estimado $nombre: Su orden de compra ha sido rechazada por el Area de Operaciones, el estado de esta orden de compra y causa de rechazo esta disponible en el software de seguimiento (boton detalles en tabla de seguimiento). Saludos");

}		
elseif($situacion_orden_compra!="5"){
	$qry="UPDATE facturacion SET Situacion_Cotizacion= '$situacion_cotizacion', Situacion_Orden_Compra='$situacion_orden_compra',Situacion_Factura='$situacion_factura' WHERE ID_Facturacion='$id'";

	$result= mysql_query($qry);
	
	
}


	$var = mysql_affected_rows();

	if ($var>0){echo "Se han guardado correctamente los cambios";
	}else{
	echo "Ha ocurrido un problema al guardar los datos";
	}
mysql_close($con);

?>