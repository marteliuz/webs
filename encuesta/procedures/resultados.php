<?php
require("../config/config.php");
session_start();
if(isset($_SESSION['username'])){

function getTotales(){
	$qry = "SELECT COUNT(*) as count FROM dbencuesta.tbencuesta";
	$result = mysql_query($qry);
	if (mysql_num_rows($result) > 0) {
	    while($row = mysql_fetch_assoc($result)) {
	    	return $row['count'];
    	}
	} else {
		return "NO";
	}
}
function getAVGq1(){
	$qry = "SELECT AVG(question1) as avg FROM dbencuesta.tbencuesta";
	$result = mysql_query($qry);
	if (mysql_num_rows($result) > 0) {
	    while($row = mysql_fetch_assoc($result)) {
	    	return number_format((float)$row['avg'], 2, '.', '');
    	}
	} else {
		return "NO";
	}
}
function getAVGq2(){
	$qry = "SELECT AVG(question2) as avg FROM dbencuesta.tbencuesta";
	$result = mysql_query($qry);
	if (mysql_num_rows($result) > 0) {
	    while($row = mysql_fetch_assoc($result)) {
	    	return number_format((float)$row['avg'], 2, '.', '');
    	}
	} else {
		return "NO";
	}
}
function getAVGq3(){
	$qry = "SELECT AVG(question3) as avg FROM dbencuesta.tbencuesta";
	$result = mysql_query($qry);
	if (mysql_num_rows($result) > 0) {
	    while($row = mysql_fetch_assoc($result)) {
	    	return number_format((float)$row['avg'], 2, '.', '');
    	}
	} else {
		return "NO";
	}
}
function getAVGq4(){
	$qry = "SELECT AVG(question4) as avg FROM dbencuesta.tbencuesta";
	$result = mysql_query($qry);
	if (mysql_num_rows($result) > 0) {
	    while($row = mysql_fetch_assoc($result)) {
	    	return number_format((float)$row['avg'], 2, '.', '');
    	}
	} else {
		return "NO";
	}
}
function getAVGq5(){
	$qry = "SELECT AVG(question5) as avg FROM dbencuesta.tbencuesta";
	$result = mysql_query($qry);
	if (mysql_num_rows($result) > 0) {
	    while($row = mysql_fetch_assoc($result)) {
	    	return number_format((float)$row['avg'], 2, '.', '');
    	}
	} else {
		return "NO";
	}
}
function getAVGq6(){
	$qry = "SELECT AVG(question6) as avg FROM dbencuesta.tbencuesta";
	$result = mysql_query($qry);
	if (mysql_num_rows($result) > 0) {
	    while($row = mysql_fetch_assoc($result)) {
	    	return number_format((float)$row['avg'], 2, '.', '');
    	}
	} else {
		return "NO";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Resultados</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<script>
		
		function loadDetails(id_cliente) {
			var divResultado = document.getElementById("detalles");

			ajax=objetoAjax();
			ajax.open("POST","showDetails.php"+"?"+new Date().getTime(),true);
			ajax.onreadystatechange=function() {
				if (ajax.readyState==2){
					// alertify.log("Un momento... ");
				}
				if (ajax.readyState==4) {
					if(ajax.status==200){
						response = ajax.responseText;
						divResultado.innerHTML = response;
	
					}else if(ajax.status==404){
						alert("La direccion AJAX no existe");
					}else{
						alert("Error: ".ajax.status);
					}
				}
			
			}
			ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			ajax.send("id_cliente="+id_cliente);
		}

		function objetoAjax() {
			xmlhttp=false;
			this.AjaxFailedAlert = "Su navegador no soporta las funcionalidades de este sitio y podrÌa experimentarlo de forma diferente a la que fue pensada. Por favor habilite javascript en su navegador para verlo normalmente.\n";
			this.encodeURIString = true;
			this.execute = false;
			if (window.XMLHttpRequest) { 
				this.xmlhttp = new XMLHttpRequest();
				if (this.xmlhttp.overrideMimeType) {
					this.xmlhttp.overrideMimeType('text/xml');
				}
			} 
			else if (window.ActiveXObject) { // IE
				try {
					this.xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}catch (e) {
					try {
						this.xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {
						this.xmlhttp = null;
					}
				}
				if (!this.xmlhttp && typeof XMLHttpRequest!='undefined') {
					this.xmlhttp = new XMLHttpRequest();
					if (!this.xmlhttp){
						this.failed = true; 
					}
				} 
			}
			return this.xmlhttp ;
			}
	</script>

	<style type="text/css" media="screen">
		.row:not(:last-child) {
			border-bottom: 1px solid #ccc;
	}
	</style>
</head>
<body>
<?php
	$qry = "SELECT t2.descripcion as cliente, t1.id_cliente, 
					count(t1.id_cliente) as cantidad, 
					AVG(t1.question1) as avg_q1, 
					AVG(t1.question2) as avg_q2, 
					AVG(t1.question3) as avg_q3,
					AVG(t1.question4) as avg_q4,
					AVG(t1.question5) as avg_q5,
					AVG(t1.question6) as avg_q6
			FROM dbencuesta.tbencuesta t1, dbencuesta.tbclientes t2
			WHERE t1.id_cliente = t2.idtbclientes
			group by t1.id_cliente";
	$result = mysql_query($qry);
	if (mysql_num_rows($result) > 0) {
?>
	<label>ESTADISTICAS GENERALES</label>
	<table class="table table-hover">
	<thead>
		<tr>
			<td><strong>Cliente</strong></td>
			<td><strong># Encuestas</strong></td>
			<td><strong>Pregunta 1</strong></td>
			<td><strong>Pregunta 2</strong></td>
			<td><strong>Pregunta 3</strong></td>
			<td><strong>Pregunta 4</strong></td>
			<td><strong>Pregunta 5</strong></td>
			<td><strong>Pregunta 6</strong></td>
		</tr>
	</thead>
	<tbody>
<?php

	    while($row = mysql_fetch_assoc($result)) {
	    	echo "<tr onclick='javascript:loadDetails(".$row['id_cliente'].");'>";
	        echo "<td>".$row['cliente']."</td>";
			echo "<td align='center'>".$row['cantidad']."</td>";
			echo "<td align='center'>".number_format((float)$row['avg_q1'], 2, '.', '')."</td>";
			echo "<td align='center'>".number_format((float)$row['avg_q2'], 2, '.', '')."</td>";
			echo "<td align='center'>".number_format((float)$row['avg_q3'], 2, '.', '')."</td>";
			echo "<td align='center'>".number_format((float)$row['avg_q4'], 2, '.', '')."</td>";
			echo "<td align='center'>".number_format((float)$row['avg_q5'], 2, '.', '')."</td>";
			echo "<td align='center'>".number_format((float)$row['avg_q6'], 2, '.', '')."</td>";
	        echo "</tr>";
	    }
	    echo "<thead>";
	    echo "<td><strong>TOTALES</strong></td>";
	    echo "<td align='center'>".getTotales()."</td>";
	    echo "<td align='center'>".getAVGq1()."</td>";
	    echo "<td align='center'>".getAVGq2()."</td>";
	    echo "<td align='center'>".getAVGq3()."</td>";
	    echo "<td align='center'>".getAVGq4()."</td>";
	    echo "<td align='center'>".getAVGq5()."</td>";
	    echo "<td align='center'>".getAVGq6()."</td>";
	    echo "</thead>";
	    echo "</tbody>";
		echo "</table>";
		echo "<div id='detalles'><label>Seleccione un cliente para ver los detalles</label></div>";
	} else {
	    echo "No hay mucho que ver aún... Tal vez mas tarde.";
	}
?>
</body>
</html>
<?php
}else{
	echo "Solo un administrador puede ver esta seccion.";
}
?>