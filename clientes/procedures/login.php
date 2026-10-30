<?php
//@date:    : 2016/06/28
//@autor:   : Marteliuz
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
		<style>
			#table {
				width: 500px;
			}
		</style>		
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
				var defaultText = "username";
				var searchBox = $('#username');
	 
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
		<div id="header">
			<br><p class="header"><font color="#FFFFFF"> <h2>Inicie Sesion</h2></font></p>
		</div>
		<br>
		<div id="container" class="jumbotron">

			<label for="username">Usuario:</label>
			<input type="text" name="username" id="username" data-transform="input-control">
			<label for="password">Contraseña:</label>
			<input type="password" name="password" id="password" data-transform="input-control" onKeyDown="if(event.keyCode==13) checklogin();">
			<br>
			<input type="button" value="Buscar" onclick="javascript:checklogin();">

		</div>
    </body>
</html>