<?php
//@date:    : 2016/05/27
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
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link href="../css/iconFont.css" rel="stylesheet">
		<link href="../css/main.css" rel="stylesheet">

		<!-- Alertify -->
		<link href="../css/alertify/alertify.core.css" rel="stylesheet">
		<link href="../css/alertify/alertify.default.css" rel="stylesheet">
		<script src="../js/alertify/alertify.min.js"></script>
		<!-- JS -->
        <!-- <script src="../js/jquery/jquery.min.js"></script>  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

        <script src="../js/jquery/jquery.widget.min.js"></script>
        <script src="../js/metro/metro.min.js"></script>
        <!-- Called library lib_ajax.js -->
		<script src="../js/lib_ajax.js"></script>

		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
		<!-- <h2>Modificar Cliente</h2> -->
		<div id="container" class="jumbotron" align="center">
					<h2>Modificar Cliente</h2>
			<!-- TABS MENU -->
			<ul class="nav nav-tabs">
  				<li class="active"><a data-toggle="tab" href="#menu1">Buscar por RUT o Nombre</a></li>
  				<li><a data-toggle="tab" href="#menu2">Buscar por Ejecutivo</a></li>
			</ul>
			<!-- TABS CONTENT -->
			<div class="tab-content">
				<!-- TAB 1 -->
  				<div id="menu1" class="tab-pane fade in active">
			    	<table style="background-color:transparent">
						<tr> 
							<td width=500>
								<input type="hidden" id="flag" value="0">
								<input type="text" name="search" id="search" data-transform="input-control" onKeyDown="if(event.keyCode==13) buscaModificar();">
								<input type="button" value="Buscar" onclick="javascript:buscaModificar();">
								<BR>
								<BR>		
							<div id="controlsReport" align="left"></div>
							<div id="controls" align="left"></div>
							</td>
						</tr>
						<br>
					</table>
			  	</div>
			  	<!-- TAB 2 -->
			  	<div id="menu2" class="tab-pane fade">
			  		<br>
			    	<table style="background-color:transparent">
						<tr> 
							<td>
								<select id="select-ejecutivo" class="form-control" onchange='javascript:buscarByEjecutivo();'>
									<option value="0" disabled selected>- - Seleccione Ejecutivo - -</option>
									<?php
										$qry = "SELECT idtbejecutivos, descripcion  FROM dbclientes.tbejecutivos;";
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
					</table>
			  	</div>
			</div>
		</div>
		<div id="response-div"></div>
    </body>
</html>