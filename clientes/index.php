<?php
//@date:    : 2016/05/16
//@autor:   : Marteliuz
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<!-- Metadata -->
		<meta charset="utf-8"> 
		<title>Touch Media</title>
		<link href='resources/tmc.ico' rel='shortcut icon' type='image/x-icon'>
		<!-- CSS -->
		<!-- Called css metro-boostrap -->
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <!-- Called css boostrap.min -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link href="css/iconFont.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<style>
			#table {
				width: 500px;
			}
		</style>		
		<!-- Alertify -->
		<link href="css/alertify/alertify.core.css" rel="stylesheet">
		<link href="css/alertify/alertify.default.css" rel="stylesheet">
		<script src="js/alertify/alertify.min.js"></script>
		<!-- JS -->
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <!-- Called library lib_ajax.js -->
		<script src="js/lib_ajax.js"></script>

        <!-- Called Library HighCharts -->
		<script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
        <script src="http://code.highcharts.com/highcharts-more.js"></script>
        <!-- Centrar div -->
        <style type="text/css">
        .centrada { 
        	    position: absolute;
                left: 37%;
                top: 64%;
                width: 400px;
                height: 225px;
                margin-top: -100px;
                margin-left: -150px;
                overflow: auto;
        }}
        </style>
        <style>
        .centrar {
                position: absolute;
                left: 70%;
                top: 64%;
                width: 400px;
                height: 225px;
                margin-top: -100px;
                margin-left: -150px;
                overflow: auto;
        }
        </style>
        <style>
        .centro {
                position: absolute;
                left: 4%;
                top: 64%;
                width: 400px;
                height: 225px;
                margin-top: -100px;
                margin-left: -150px;
                overflow: auto;
        }
        </style>
		<script type="text/javascript">
		<!--
	 
			$(document).ready(function() {
				var defaultText = "Buscar por RUT o Nombre...";
				var searchBox = $('#search');
	 
				//set default text on load
				searchBox.val(defaultText);
	 
				//on focus behaviour
				searchBox.focus(function(){
					if ($(this).val() == defaultText) {//clear text field
						$(this).val('');
					}
				});
	 
				//on blur behaviour
				searchBox.blur(function(){
					if ($(this).val() == "") {//restore default text
						$(this).val(defaultText);
					}
				});
	 
	 
			});
	 
		//-->
		</script>

    </head>
    <body class="metro">
    	<div id="logout">
			<!-- Called function logout contain in library lib_ajax.php - disconnect user session -->
			<button class="success" onclick="javascript:login()" class="form-control"><i class="icon-key-2 on-left"></i>Iniciar Sesión</button>
			<BR>
			<BR>
		</div>
		<br><br><br><br>
		<div id="header">
			<table style="background-color:transparent;">
				<tr>
					<td><img src="resources/tm2.png" alt="tm" height="50" width="50" /></td>
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
						<td width=500>
							<input type="hidden" id="flag" value="0">
							<!-- Called function upload contain in file lib_ajax.js - load file -->
							<input type="text" name="search" id="search" data-transform="input-control" onKeyDown="if(event.keyCode==13) buscar();">
							<input type="button" value="Buscar" onclick="javascript:buscar();">
							<BR>
							<BR>		
						<div id="controlsReport" align="left"></div>
						<div id="controls" align="left"></div>
						</td>
					</tr>
					<br>
				</table>
			<!-- </form>	-->
			
		</div>
		<div id="response-div"></div>
    </body>
</html>