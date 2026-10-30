<script type="text/javascript" src="fun_seg.js"></script>
<script type="text/javascript" src="jquery.js" ></script>
<script type='text/javascript' src="jquery.autocomplete.js" ></script>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script>
	
	jQuery(document).ready(function(){
	 jQuery("#nombre_cliente").autocomplete("autocomplete_clientes.php", {
			selectFirst: true
		});
	});
</script>
<script>
	
	jQuery(document).ready(function(){
	 jQuery("#rut_cliente").autocomplete("autocomplete_rut_cliente.php", {
			selectFirst: true
		});
	});
</script>
<style media="print" type="text/css">
#oculto {
visibility:hidden
}
</style>
<?php
$where			= stripslashes($_POST['where']);

$con = mysql_connect("localhost","root","Touchmedia");
mysql_set_charset('utf8');
if (!$con)
    {
		die('Could not conect: ' . mysql_error() );
	}
	
	mysql_select_db("inventario", $con);
	
	$qry = "SELECT * FROM inventario.clientes ".$where; 
 

$result = mysql_query($qry);
$numero = mysql_num_rows($result);

$var = mysql_affected_rows();
	if ($var>0){
	?>
   <div id=clientes>
    <table width="200" cellpadding="3" cellspacing="3">
    <tr>
    <td width="42"><?php echo"<B><font size=5>Clientes</font></B>"?></td>
	<td id= "oculto" width="135"><a href="javascript:imprime_clientes()"><img src="boton-imprimir.jpg" alt="imprimir" width="130" height="38" longdesc="boton-imprimir.jpg" ></img></a></td>
    </tr> 
    </table>
    <form>
    <table width="950" cellpadding="3" cellspacing="3">
    <tr>
    <td id= "oculto2" width="290">Buscar por: Nombre
    <input type="text" name="nombre_cliente" id="nombre_cliente" /></td>
    <td id= "oculto2" width="184">Rut
    <input type="text" name="rut_cliente" id="rut_cliente" /></td>
    <td width="241"> <input type="button" name="Enviar" id="Enviar" value="Enviar" onClick= "javascript:busqueda_cliente()" />&nbsp;&nbsp;&nbsp; <input type="reset" name="Borrar" id="Borrar" value="Borrar" />&nbsp;&nbsp;&nbsp;<input type="button" name="Enviar" id="Enviar" value="Mostrar Todos" onClick="location='ver_clientes.php'"/></td>
    <td width="194" id= "oculto2">TOTAL CLIENTES:&nbsp;<?php echo "<font color=red size=4>$numero</font></B>" ?></td>
    </tr>
    </table>
    </form>
	<div id=imprimir> 
    <?php
	
		echo "<table border=1 cellpadding=3 cellspacing=0>";
		 
echo "<td width=400 align= center><B><font size=3>Clientes</font></B></td>";
echo "<td width=100 align= center><B><font size=3>Rut Clientes</font></B></td>";
echo "<td width=500 align= center><B><font size=3>Dirección</font></B></td>";
echo "<td width=250 align= center><B><font size=3>Teléfono</font></B></td>";
echo "<td width=100 align= center><B><font size=3>Nombre Contacto</font></B></td>";
echo "<td width=100 align= center><B><font size=3>Correo Contacto</font></B></td>";
echo "<td width=100 align= center><B><font size=3>Teléfono Contacto</font></B></td>";
echo "</tr>";
	$reg = mysql_fetch_array($result, MYSQL_BOTH);
	
	{
		 while($reg)
{
echo "<td align= left<font size=1>".$reg["Clientes"]."</font></td>";
echo "<td align= center><font size=3>".$reg["Rut_Clientes"]."</font></td>";
echo "<td align= center><font size=3>".$reg["Direccion"]."</font></td>";
echo "<td align= center><font size=3>".$reg["Telefono"]."</font></td>";
echo "<td align= center><font size=3>".$reg["Contacto"]."</font></td>";
echo "<td align= center><font size=3>".$reg["Correo"]."</font></td>";
echo "<td align= center><font size=3>".$reg["Tcontacto"]."</font></td>";
$reg = mysql_fetch_array($result, MYSQL_BOTH);
	?>
	</div>
</div>
<?php
echo "</tr>";
}
echo "</table>";
	}
	}else{
		echo "<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<B><font size=3 color=#FF0000>Lo sentimos. No se encuentra ningún objeto con las características especificadas</font><B>";
	?><a  id="Atrás" href="ver_clientes.php"><img src="boton_atras1.jpg" width="89" height="34" alt="atras" longdesc="boton_atras1.jpg" /></img></a>
      <?php
	
}
	mysql_close($con);
	?>
    