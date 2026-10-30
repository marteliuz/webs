<?php
//@date:    : 2014/08/23
//@autor:   : Marteliuz


session_start();

//if(isset($_SESSION['username']))
//{ 
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
		<!-- Called function js -->
		<script language="javascript">
			$( document ).ready(function() {
				alertify.success(saluda()+"<?php echo getNameByUsername($_SESSION['username']);?>, <br><b> Bienvenido!</b>");
			});
		</script>	
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
    </head>
    <body class="metro">
		<div id="logout">
			<!-- Called function logout contain in library lib_ajax.php - disconnect user session -->
			<button class="danger" onclick="javascript:logout()" class="form-control"><i class="icon-key-2 on-left"></i>Cerrar Sesión</button>
			<BR>
			<BR>
			<button class="success" onclick="javascript:refresh()"><i class="icon-spin on-left"></i>Refresh</button>
		</div>
		<br><br><br><br>
		<div id="header">
			<table style="background-color:transparent;">
				<tr>
					<td><img src="../resources/tm2.png" alt="tm" height="50" width="50" /></td>
					<td width="10"> </td>
					<td><p class="header"><font color="#FFFFFF"> Procesamiento de Licitaciones</font></p></td>
					<td width="10"> </td>
					<td><h2><font color="#FFFFFF">Touch Media</font></h2></td>
				</tr>
		</table>
		</div>
		<br><br>
		<div id="container" class="jumbotron" align="center">
			<form enctype="multipart/form-data">
				<table style="background-color:transparent">
					<tr> 
						<td width=500>
							<input type="hidden" id="flag" value="0">
							<!-- Called function upload contain in file lib_ajax.js - load file -->
							<input type="file" name="archivo" id="archivo" data-transform="input-control" onChange="javascript:upload();">	
							<BR>
							<BR>		
						<div id="controlsReport" align="left"></div>
						<div id="controls" align="left"></div>
						</td>
					</tr>
					<br>
				</table>
			</form>	
		</div>
		<div id="container_highchart" class="centro" style="width: 26%; height: 220px; margin-right: 6px; margin: 0 auto"></div>
		<div id="container_highchart3" class="centrada" style="width: 26%; height: 220px; margin-right: 6px; margin: 0 auto"></div>
		<div id="container_highchart2" class="centrar" style="width: 26%; height: 220px; margin-right: 6px; margin: 0 auto"></div>
		<div id="table"></div>
		<div id="simple-div"></div>
		<div id="response"></div>
    </body>
</html>
<?php
//}else{
//	header("location:../index.php");
//}
?>