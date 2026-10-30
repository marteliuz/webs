<?php
//@date:    : 2016/05/16
//@autor:   : Marteliuz
include("config.php");
include("lib_functions.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<!-- Metadata -->
		<meta charset="utf-8"> 
		<title>Touch Media</title>
		<link href='../resources/tmc.ico' rel='shortcut icon' type='image/x-icon'>
		<!-- CSS -->
		<!-- Called css metro-boostrap -->
        <link rel="stylesheet" href="../css/metro-bootstrap.css">
        <!-- Called css boostrap.min -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
		<link href="../css/iconFont.css" rel="stylesheet">
		<link href="../css/main.css" rel="stylesheet">	
		<!-- Alertify -->
		<link href="../css/alertify/alertify.core.css" rel="stylesheet">
		<link href="../css/alertify/alertify.default.css" rel="stylesheet">
		<script src="../js/alertify/alertify.min.js"></script>
		<!-- JS -->
        <script src="../js/jquery/jquery.min.js"></script>
        <script src="../js/jquery/jquery.widget.min.js"></script>
        <script src="../js/metro/metro.min.js"></script>
        <!-- Called library lib_ajax.js -->
		<script src="../js/lib_ajax.js"></script>

        <!-- Called Library HighCharts -->
		<script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
        <script src="http://code.highcharts.com/highcharts-more.js"></script>

		<script type="text/javascript">
		<!--
	 
			$(document).ready(function() {
				var defaultTextRutBox    = "Ingrese el RUT";
				var defaultTextNombreBox = "Ingrese el Nombre";


				var rutBox = $('#rutBox');
				var nombreBox = $('#nombreBox');
	 
				//set default text on load
				rutBox.val(defaultTextRutBox);
				nombreBox.val(defaultTextNombreBox);

	 
				//on focus behaviour
				rutBox.focus(function(){
					if ($(this).val() == defaultTextRutBox) {//clear text field
						$(this).val('');
					}
				});

				nombreBox.focus(function(){
					if ($(this).val() == defaultTextNombreBox) {//clear text field
						$(this).val('');
					}
				});
	 
				//on blur behaviour
				rutBox.blur(function(){
					if ($(this).val() == "") {//restore default text
						$(this).val(defaultTextRutBox);
					}
				});

				nombreBox.blur(function(){
					if ($(this).val() == "") {//restore default text
						$(this).val(defaultTextNombreBox);
					}
				});
			});
	 
		//-->
		</script>

    </head>
    <body class="metro">
		<br><br><br><br>
		<div id="header">
			<table style="background-color:transparent;">
				<tr>
					<td><img src="../resources/tm2.png" alt="tm" height="50" width="50" /></td>
					<td width="10"> </td>
					<td><p class="header"><font color="#FFFFFF"> Asignación de Clientes</font></p></td>
					<td width="10"> </td>
					<td><h2><font color="#FFFFFF">Touch Media</font></h2></td>
				</tr>
		</table>
		</div>
		<br><br>
		<div id="container" class="jumbotron" align="center">
			<!-- <form enctype="multipart/form-data"> -->
				<table style="background-color:transparent">
					<tr> 
						<td>
							<input type="text" name="rutBox" id="rutBox" data-transform="input-control">	
						</td>
						<td width="25"></td>
						<td width="400">
							<input type="text" name="nombreBox" id="nombreBox" data-transform="input-control">	
						</td>
						<td width="25"></td>
						<td>
							<select id="select-ejecutivo" class="form-control">
							<option value="0" disabled selected>- - Seleccione Ejecutivo - -</option>
							<?php
								$qry = "SELECT idtbejecutivos, descripcion  FROM dbclientes.tbejecutivos WHERE activo = 1;";
								$result = mysql_query($qry);
								if (mysql_num_rows($result) > 0) {
								    // output data of each row
								    while($row = mysql_fetch_assoc($result)) {
								        echo "<option value='".$row['idtbejecutivos']."'>".$row['descripcion']."</option>";
								    }
								} else {
								    echo "<option value=''></option>";
								}
							?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="5" align="center">
							<input type="button" value="Asignar" onclick="javascript:asignarCliente();">
						</td>
					</tr>
				</table>
			<!-- </form>	-->
			
		</div>
		<div id="response-div"></div>
    </body>
</html>