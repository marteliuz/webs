<META HTTP-EQUIV="REFRESH" CONTENT="200;URL=index1.php">
<script type="text/javascript">
       window.onbeforeunload = function Aviso(){
            return "Está saliendo de la página o han caducado sus 5 minutos";
           header("Location: logout.php");
		  
        }
</script>
<body onunload="Aviso">
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

if( isset($_POST['where']) === true ){
$where		= stripslashes($_POST['where']);
	
$con = mysql_connect("localhost","root","Touchmedia");
mysql_set_charset('utf8');
if (!$con)
    {
		die('Could not conect: ' . mysql_error() );
	}
	
	mysql_select_db("inventario", $con);
	
	$qry = "SELECT * FROM facturacion ".$where." AND ID_Facturacion>'0' ORDER BY Fecha_Orden_Compra" ; 

$result = mysql_query($qry);


$var = mysql_affected_rows();
	if ($var>0){
	$numero = mysql_num_rows($result);
	?>
<html>    
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" language='javascript' src="fun_seg.js"></script>
</head>
<div id= "filtro">   
<form>
    <table width="1500" cellpadding="3" cellspacing="3">
    <tr>
    
    <td width="1237"><?php echo"<B><font size=5>Seguimiento de Ventas</font></B>"?></td>
    <td width="240"><a  id="atrás" href="index1.php"><img src="boton_atras1.jpg" width="89" height="34" alt="atras" longdesc="boton_atras1.jpg" /></img></a></td>
    </tr>
    <table width="1500" cellpadding="3" cellspacing="3">
    <tr>
    <td width="65">Filtrar por: </td>
    <td width="501">Nombre Empresa <?php Cliente_Ver_Combo1()?></td>
    <td width="192">Rut Empresa <?php Ver_Rut(); ?></td>
    <td width="701">Rut Vendedor <?php Ver_Vendedor1(); ?></td>
    </tr>
  	<table width="1500" cellpadding="3" cellspacing="3">
    <tr>
    <td width="65"></td>
    <td width="239" widht="">Situación Cotización: <?php Situacion_Cotizacion1() ?></td>
    <td width="308">Situación Orden de Compra: <?php Situacion_Compra1() ?></td>
    <td width="386">Situación Factura: <?php Situacion_Factura1() ?></td>
    <td width="54"><input type="button" name="Enviar" id="Enviar" value="Buscar" onClick="javascript:filtrar()"/></td>
    <td width="52"><input type="reset" value="Borrar"></td>
    <td width="93"><input type="button" name="Enviar" id="Enviar" value="Mostrar Todo" onClick="javascript:mostrar()"/></td>
    <td width="231">Total <?php echo $numero?></td>
	
	</table>
    </form> 

	<form>
		<table width=3000 border=1 cellpadding=3 cellspacing=0>
		 
<td width="18" align= center><B><font size=2>ID</font></B></td>
<td width="18" align= center><B><font size=2></font></B></td>
<td width="56" align= center><B><font size=2>Nombre Empresa</font></B></td>
<td width="80" align= center><B><font size=2>Rut Empresa</font></B></td>
<td width="59" align= center><B><font size=2>Nro Cotización</font></B></td>
<td width="66" align= center><B><font size=2>Fecha Cotización</font></B></td>
<td width="70" align= center><B><font size=2>Situación Cotización</font></B></td>
<td width="72" align= center><B><font size=2>Descargar Cotización</font></B></td>
<td width="55" align= center><B><font size=2>Nro Orden Compra</font></B></td>
<td width="49" align= center><B><font size=2>Fecha Orden Compra</font></B></td>
<td width="72" align= center><B><font size=2>Situación Orden Compra</font></B></td>
<td width="77" align= center><B><font size=2>Descargar Orden Compra</font></B></td>
<td width="46" align= center><B><font size=2>Nro Factura</font></B></td>
<td width="49" align= center><B><font size=2>Fecha Factura</font></B></td>
<td width="63" align= center><B><font size=2>Situación Factura</font></B></td>
<td width="69" align= center><B><font size=2>Descargar Factura</font></B></td>
<td width="69" align= center><B><font size=2>Tipo Moneda</font></B></td>
<td width="34" align= center><B><font size=2>Monto</font></B></td>
<td width="52" align= center><B><font size=2>Vendedor</font></B></td>
<td width="57" align= center><B><font size=2>Nombre Contacto</font></B></td>
<td width="56" align= center><B><font size=2>Correo Contacto</font></B></td>
<td width="59" align= center><B><font size=2>Teléfono Contacto</font></B></td>
<td width="200" align= center><B><font size=2>Dirección Instalación</font></B></td>
<td width="62" align= center><B><font size=2></font></B></td>
<td width="62" align= center><B><font size=2></font></B></td>
<td width="66" align= center><B><font size=2></font></B></td>
</tr>
<?php
	$reg = mysql_fetch_array($result, MYSQL_BOTH);
	
	{
		 while($reg)
{
	$formato_precio  = number_format($reg['Monto'],  2,  ',',  '.');
	
	?> 
<td align= center><font size=2><?php echo $reg["ID_Facturacion"] ?></font></td>
<td> <a href=javascript:poponload(<?php echo $reg["ID_Facturacion"] ?>)>Editar</a></td>
<td align= center><font size=2><?php echo $reg["Nombre_Empresa"] ?></font></td>
<td width="84" align= center><font size=2><?php echo $reg["Rut_Empresa"] ?></font></td>
<td align= center><font size=2><?php echo $reg["Nro_Cotizacion"]?></font></td>
<td align= center><font size=2><?php echo DateConvertB($reg["Fecha_Cotizacion"])?></font></td>
<td align= center><font size=2><?php Situacion_Cotizacion('situacion_cotizacion'.$reg["ID_Facturacion"],$reg["Situacion_Cotizacion"])?></font></td>
<td align= center><font size=2><?php echo leer_archivo($reg["Nro_Cotizacion"])?></font></td>
<td align= center><font size=2><?php echo $reg["Nro_Orden_Compra"]?></font></td>
<td align= center width="80"><font size=2><?php echo DateConvertB($reg["Fecha_Orden_Compra"])?></font></td>
<td align= center><font size=2><?php Situacion_Orden_Compra('situacion_orden_compra'.$reg["ID_Facturacion"],$reg["Situacion_Orden_Compra"])?></font></td>
<td align= center><font size=2><?php echo leer_archivo($reg["Nro_Orden_Compra"])?></font></td>
<td align= center><font size=2><?php echo $reg['Nro_Factura']?></font></td>
<td align= center><font size=2><?php echo DateConvertB($reg["Fecha_Factura"])?></font></td>
<td align= center><font size=2><?php Situacion_Factura('situacion_factura'.$reg["ID_Facturacion"],$reg["Situacion_Factura"])?></font></td>
<td align= center><font size=2><?php echo leer_archivo($reg["Nro_Factura"])?></font></td>
<td align= center><font size=2><?php echo Tipo_Moneda($reg["Tipo_Moneda"]) ?></font></td>
<td align= center><font size=2><?php echo $formato_precio?></font></td>
<td align= center><font size=2><?php echo Seguimiento_Vendedor($reg["Vendedor"])?></font></td>
<td align= center><font size=2><?php echo $reg['Nombre_Contacto']?></font></td>
<td align= center><font size=2><?php echo $reg['Correo_Contacto']?></font></td>
<td align= center><font size=2><?php echo $reg['Telefono_Contacto']?></font></td>
<td align= center width="100"><font size=2><?php echo $reg['Direccion']?></font></td>
<td align= center width="100"><font size=2><input type="button" name="detalle" id="detalle" value ="Detalles" onclick="window.open('rechazado.php?id=<?php echo $reg["ID_Facturacion"] ?>', 'Modificar','status = 1, height = 300, width = 700, scrollbars=1, resizable = 0')"></font></td>
<td><input type="button" name="Enviar" id="Enviar" value="Guardar" onClick="javascript:seguimiento('<?php echo $reg['ID_Facturacion'];?>')"/></td>
<td><input type="reset" value="Borrar"></td>
</tr>
<?php
$reg = mysql_fetch_array($result, MYSQL_BOTH);

	}
mysql_close($con);	
}
?>
</table>
</form>
</div>
</body>
</html>
<?php
}else{echo("<B><font size=4 color=#FF0000>No se han encontrado resultados</font></B>");?><a  id="atrás" href="seguimiento.php"><img src="boton_atras1.jpg" width="89" height="34" alt="atras" longdesc="boton_atras1.jpg" /></img></a> <?php ; }
}
elseif( isset($_POST['where']) === false ){
$con = mysql_connect("localhost","root","Touchmedia");
mysql_set_charset('utf8');
if (!$con)	
    {
		die('Could not conect: ' . mysql_error() );
	}
	
	mysql_select_db("inventario", $con);
	
	$result = mysql_query ("SELECT * FROM facturacion WHERE ID_Facturacion>'0' ORDER BY Fecha_Orden_Compra");
  
  	$numero = mysql_num_rows($result);

	?>
<html>  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" language='javascript' src="fun_seg.js"></script>
</head>
<body>
<div id= "normal">
    <form>
    <table width="1500" cellpadding="3" cellspacing="3">
    <tr>
    
    <td width="1237"><?php echo"<B><font size=5>Seguimiento de Ventas</font></B>"?></td>
    <td width="240"><a  id="atrás" href="index1.php"><img src="boton_atras1.jpg" width="89" height="34" alt="atras" longdesc="boton_atras1.jpg" /></img></a></td>
    </tr>
    </table>
   <table width="1500" cellpadding="3" cellspacing="3">
    <tr>
    <td width="65">Filtrar por: </td>
    <td width="501">Nombre Empresa <?php Cliente_Ver_Combo1()?></td>
    <td width="192">Rut Empresa <?php Ver_Rut(); ?></td>
    <td width="701">Rut Vendedor <?php Ver_Vendedor1(); ?></td>
    </tr>
  	<table width="1500" cellpadding="3" cellspacing="3">
    <tr>
    <td width="65"></td>
    <td width="239" widht="">Situación Cotización: <?php Situacion_Cotizacion1() ?></td>
    <td width="308">Situación Orden de Compra: <?php Situacion_Compra1() ?></td>
    <td width="386">Situación Factura: <?php Situacion_Factura1() ?></td>
    <td width="54"><input type="button" name="Enviar" id="Enviar" value="Buscar" onClick="javascript:filtrar()"/></td>
    <td width="52"><input type="reset" value="Borrar"></td>
    <td width="93"><input type="button" name="Enviar" id="Enviar" value="Mostrar Todo" onClick="javascript:mostrar()"/></td>
    <td width="231">Total <?php echo $numero?></td>
	
    
	</table>
    </form> 

	<form>
		<table width=3000 border=1 cellpadding=3 cellspacing=0>
		 
<td width="18" align= center><B><font size=2>ID</font></B></td>
<td width="18" align= center><B><font size=2></font></B></td>
<td width="56" align= center><B><font size=2>Nombre Empresa</font></B></td>
<td width="80" align= center><B><font size=2>Rut Empresa</font></B></td>
<td width="59" align= center><B><font size=2>Nro Cotización</font></B></td>
<td width="66" align= center><B><font size=2>Fecha Cotización</font></B></td>
<td width="70" align= center><B><font size=2>Situación Cotización</font></B></td>
<td width="72" align= center><B><font size=2>Descargar Cotización</font></B></td>
<td width="55" align= center><B><font size=2>Nro Orden Compra</font></B></td>
<td width="49" align= center><B><font size=2>Fecha Orden Compra</font></B></td>
<td width="72" align= center><B><font size=2>Situación Orden Compra</font></B></td>
<td width="77" align= center><B><font size=2>Descargar Orden Compra</font></B></td>
<td width="46" align= center><B><font size=2>Nro Factura</font></B></td>
<td width="49" align= center><B><font size=2>Fecha Factura</font></B></td>
<td width="63" align= center><B><font size=2>Situación Factura</font></B></td>
<td width="69" align= center><B><font size=2>Descargar Factura</font></B></td>
<td width="69" align= center><B><font size=2>Tipo Moneda</font></B></td>
<td width="34" align= center><B><font size=2>Monto</font></B></td>
<td width="52" align= center><B><font size=2>Vendedor</font></B></td>
<td width="57" align= center><B><font size=2>Nombre Contacto</font></B></td>
<td width="56" align= center><B><font size=2>Correo Contacto</font></B></td>
<td width="59" align= center><B><font size=2>Teléfono Contacto</font></B></td>
<td width="200" align= center><B><font size=2>Dirección Instalación</font></B></td>
<td width="62" align= center><B><font size=2></font></B></td>
<td width="62" align= center><B><font size=2></font></B></td>
<td width="66" align= center><B><font size=2></font></B></td>
</tr>
<?php
	$reg = mysql_fetch_array($result, MYSQL_BOTH);
	
	{
		 while($reg)
{
	$formato_precio  = number_format($reg['Monto'],  2,  ',',  '.');
	?> 
<td align= center><font size=2><?php echo $reg["ID_Facturacion"] ?></font></td>
<td> <a href=javascript:poponload(<?php echo $reg["ID_Facturacion"] ?>)>Editar</a></td>
<td align= center><font size=2><?php echo $reg["Nombre_Empresa"] ?></font></td>
<td width="84" align= center><font size=2><?php echo $reg["Rut_Empresa"] ?></font></td>
<td align= center><font size=2><?php echo $reg["Nro_Cotizacion"]?></font></td>
<td align= center><font size=2><?php echo DateConvertB($reg["Fecha_Cotizacion"])?></font></td>
<td align= center><font size=2><?php Situacion_Cotizacion('situacion_cotizacion'.$reg["ID_Facturacion"],$reg["Situacion_Cotizacion"])?></font></td>
<td align= center><font size=2><?php echo leer_archivo($reg["Nro_Cotizacion"])?></font></td>
<td align= center><font size=2><?php echo $reg["Nro_Orden_Compra"]?></font></td>
<td align= center width="80"><font size=2><?php echo DateConvertB($reg["Fecha_Orden_Compra"])?></font></td>
<td align= center><font size=2><?php Situacion_Orden_Compra('situacion_orden_compra'.$reg["ID_Facturacion"],$reg["Situacion_Orden_Compra"])?></font></td>
<td align= center><font size=2><?php echo leer_archivo($reg["Nro_Orden_Compra"])?></font></td>
<td align= center><font size=2><?php echo $reg['Nro_Factura']?></font></td>
<td align= center><font size=2><?php echo DateConvertB($reg["Fecha_Factura"])?></font></td>
<td align= center><font size=2><?php Situacion_Factura('situacion_factura'.$reg["ID_Facturacion"],$reg["Situacion_Factura"])?></font></td>
<td align= center><font size=2><?php echo leer_archivo($reg["Nro_Factura"])?></font></td>
<td align= center><font size=2><?php echo Tipo_Moneda($reg["Tipo_Moneda"]) ?></font></td>
<td align= center><font size=2><?php echo $formato_precio?></font></td>
<td align= center><font size=2><?php echo Seguimiento_Vendedor($reg["Vendedor"])?></font></td>
<td align= center><font size=2><?php echo $reg['Nombre_Contacto']?></font></td>
<td align= center><font size=2><?php echo $reg['Correo_Contacto']?></font></td>
<td align= center><font size=2><?php echo $reg['Telefono_Contacto']?></font></td>
<td align= center width="100"><font size=2><?php echo $reg['Direccion']?></font></td>
<td align= center width="100"><font size=2><input type="button" name="detalle" id="detalle" value ="Detalles" onclick="window.open('rechazado.php?id=<?php echo $reg["ID_Facturacion"] ?>', 'Modificar','status = 1, height = 300, width = 700, scrollbars=1, resizable = 0')"></font></td>
<td><input type="button" name="Enviar" id="Enviar" value="Guardar" onClick="javascript:seguimiento('<?php echo $reg['ID_Facturacion'];?>')"/></td>
<td><input type="reset" value="Borrar"></td>
</tr>
<?php
$reg = mysql_fetch_array($result, MYSQL_BOTH);
}
	mysql_close($con);
	}
?>
</table>
</form>
</div>
</body>
</html>
<?php
}
?>