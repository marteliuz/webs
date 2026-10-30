<?php
session_start(); //session start
$id_ejecutivo = $_SESSION['id_ejecutivo'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<!-- Metadata -->
		<meta charset="utf-8"> 
		<title>Prospectos App</title>
		<link href='../resources/tmc.ico' rel='shortcut icon' type='image/x-icon'>
		<!-- Optional theme -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
		<!-- CSS -->
		<!-- Called css metro-boostrap -->
        <link rel="stylesheet" href="../css/metro-bootstrap.css">
        <!-- Called css boostrap.min -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="../css/iconFont.css" rel="stylesheet">
		<link href="../css/main.css" rel="stylesheet">
		<!-- Alertify 
		<link href="../css/alertify/alertify.core.css" rel="stylesheet">
		<link href="../css/alertify/alertify.default.css" rel="stylesheet">
		<script src="../js/alertify/alertify.min.js"></script> -->
		<!-- JS -->
        <script src="../js/jquery/jquery-3.1.1.js"></script>
        <script src="../js/jquery/jquery-3.1.1.min.js"></script>
        <script src="../js/metro/metro.min.js"></script> -->
        <!-- Called library lib_ajax.js -->
		<script src="../js/lib_ajax.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


        <!-- Latest compiled and minified CSS -->

    </head>
    <body class="metro">
		<br><br><br><br>
		<div id="header">
			<table style="background-color:transparent;">
				<tr>
					<td><img src="../resources/tm2.png" alt="tm" height="50" width="50" /></td>
					<td width="10"> </td>
					<td><p class="header"><font color="#FFFFFF"> Prospectos Comerciales</font></p></td>
					<td width="10"> </td>
					<td><h2><font color="#FFFFFF">Touch Media</font></h2></td>
				</tr>
		</table>
		</div>
		<br><br>
		<div id="container" class="jumbotron">

		<ul class="nav nav-tabs">
		  <li><a href="javascript:loadMisClientes(<?php echo $id_ejecutivo; ?>);">Mis Clientes</a></li>
		  <li><a href="javascript:loadMisProspectos(<?php echo $id_ejecutivo; ?>);">Mis Prospectos</a></li>
		</ul>

		<div id="divResultado"><?php echo $id_ejecutivo; ?></div>
		</div>
    </body>
</html>