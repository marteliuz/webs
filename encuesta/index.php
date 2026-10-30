<?php
require("config/config.php");
if(!isset($_COOKIE['lg'])) {
    setcookie('lg', 'ro');
    $_COOKIE['lg'] = 'ro';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Encuesta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Jquery -->
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<!-- jRange CSS -->
	<link rel="stylesheet" href="css/jquery.range.css">
	<!-- jRange JS -->
	<script src="js/jquery.range.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<script type="text/javascript">
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

		function getValue(radiosName){
			var radios = document.getElementsByName(radiosName);
				for(var i = 0; i < radios.length; i++) {
				    if(radios[i].checked) var value = radios[i].value;   
				}
			return value;
		}

		function enviar(){
			var id_cliente = document.getElementById("select-choice-1").selectedIndex;

			var value1 = getValue("select2");
			var value2 = getValue("select3");
			var value3 = getValue("select4");
			var value4 = getValue("select5");
			var value5 = getValue("select6");
			var value6 = getValue("select7");

			if(id_cliente!=0){
				if(value1!=undefined){
					if(value2!=undefined){
						if(value3!=undefined){
							if(value4!=undefined){
								if(value5!=undefined){
									if(value6!=undefined){

										ajax=objetoAjax();
										ajax.open("POST","procedures/qry_insert.php"+"?"+new Date().getTime(),true);
										ajax.onreadystatechange=function() {
											if (ajax.readyState==2){
												// alertify.log("Un momento... ");
											}
											if (ajax.readyState==4) {
												if(ajax.status==200){
													response = ajax.responseText;
													if(response=="OK"){
														alert("Muchas gracias por participar.");
														location.reload();
													}
													if(response=="NO"){
														alert("D'Oh! algo sucediÛ :(")
													}
												}else if(ajax.status==404){
													alert("La direccion AJAX no existe");
												}else{
													alert("Error: ".ajax.status);
												}
											}
										}
										ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
										ajax.send("id_cliente="+id_cliente+"&question1="+value1+"&question2="+value2+"&question3="+value3+"&question4="+value4+"&question5="+value5+"&question6="+value6);
						
									}else{alert("Debe calificar el item 6 para fnalizar la encuesta.");}
								}else{alert("Debe calificar el item 5 para fnalizar la encuesta.");}	
							}else{alert("Debe calificar el item 4 para fnalizar la encuesta.");}
						}else{alert("Debe calificar el item 3 para fnalizar la encuesta.");}
					}else{alert("Debe calificar el item 2 para fnalizar la encuesta.");}
				}else{alert("Debe calificar el item 1 para fnalizar la encuesta.");}
			}else{alert("Debe seleccionar una empresa.");}
		}
	</script>
    <style type="text/css">
  		.myBackground {
	  		background-color: rgba(255,255,255, 0.5);
	  		color: inherit;
		}
		legend {
		    font-size: 15px;		    
		    left:18px;
		}​
  	</style>
</head>
<body background="img/background2.jpg">
	<div class="container">
		<div class="header clearfix">
        	<nav>
          		<ul class="nav nav-pills pull-left">
            		<li role="presentation"><img id="logo" src="img/logo.png" style="width: 70%;"></li>
          		</ul>
        	</nav>
        	<h3 class="text-muted">Satisfacci&oacute;n de clientes</h3>
      	</div>
		<div class="jumbotron myBackground">
			<form class="form-horizontal">
				<fieldset>
				<!-- Form Name -->
				<legend>GRACIAS por realizar la encuesta de satisfacci&oacute;n.<br>
						No tardar&aacute; m&aacute;s de dos minutos en completarla y nos ser&aacute; de gran ayuda para mejorar nuestros servicios. <br>
						Los datos que en ella se consignen se tratar&aacute;n de forma an&oacute;nima.
				</legend>

				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="select-choice-1">Seleccione Empresa</label>
					<div class="controls">
						<select id="select-choice-1">
							<option value="0" disabled selected>- - Seleccione - -</option>
				<?php
					$qry = "SELECT * FROM dbencuesta.tbclientes;";
					$result = mysql_query($qry);
					if (mysql_num_rows($result) > 0) {
					    // output data of each row
					    while($row = mysql_fetch_assoc($result)) {
					        echo "<option value='".$row['idtbclientes']."'>".$row['descripcion']."</option>";
					    }
					} else {
					    echo "<option value=''></option>";
					}
					?>
						</select>
					</div>
				</div>

				<!-- Item 1 -->
				<div class="control-group">
					<label class="control-label" for="select2">
						1.-&nbsp;<span style="font-size: 7pt;">&nbsp;</span>&iquest;Con que frecuencia contacta al Help Desk?
					</label>
					<div class="controls">
						<label>Nunca&nbsp;</label>
						<label class="radio-inline">
		                    <input id="select2" name="select2" type="radio" value="1">
		                    1
		                </label>
		                <label class="radio-inline">
		                    <input id="select2" name="select2" type="radio" value="2">
		                    2
		                </label>
		              	<label class="radio-inline">
		                    <input id="select2" name="select2" type="radio" value="3">
		                    3
		                </label>
		                <label class="radio-inline">
		                    <input id="select2" name="select2" type="radio" value="4">
		                    4
		                </label>
		                <label class="radio-inline">
		                    <input id="select2" name="select2" type="radio" value="5">
		                    5
		                </label>
		                <label class="radio-inline">
		                    <input id="select2" name="select2" type="radio" value="6">
		                    6
		                </label>
		                <label class="radio-inline">
		                    <input id="select2" name="select2" type="radio" value="7">
		                    7
		                </label>
		                <label>&nbsp;Siempre</label>
					</div>
				</div>

				<!-- Item 2 -->
				<div class="control-group">
					<label class="control-label" for="select3">
						2.-&nbsp; Cuando realiza un requerimiento, &iquest;Es resuelto apropiadamente?
					</label>
					<div class="controls">
						<label>Insatisfecho&nbsp;</label>
						<label class="radio-inline">
		                    <input id="select3" name="select3" type="radio" value="1">
		                    1
		                </label>
		                <label class="radio-inline">
		                    <input id="select3" name="select3" type="radio" value="2">
		                    2
		                </label>
		              	<label class="radio-inline">
		                    <input id="select3" name="select3" type="radio" value="3">
		                    3
		                </label>
		                <label class="radio-inline">
		                    <input id="select3" name="select3" type="radio" value="4">
		                    4
		                </label>
		                <label class="radio-inline">
		                    <input id="select3" name="select3" type="radio" value="5">
		                    5
		                </label>
		                <label class="radio-inline">
		                    <input id="select3" name="select3" type="radio" value="6">
		                    6
		                </label>
		                <label class="radio-inline">
		                    <input id="select3" name="select3" type="radio" value="7">
		                    7
		                </label>
		                <label>&nbsp;Muy satisfecho</label>
					</div>
				</div>

				<!-- Item 3 -->
				<div class="control-group">
					<label class="control-label" for="select4">
						3.-&nbsp; &iquest;Como eval&uacute;a la rapidez con que son resueltos sus requerimientos?
					</label>
					<div class="controls">
						<label>Insatisfecho&nbsp;</label>
						<label class="radio-inline">
		                    <input id="select4" name="select4" type="radio" value="1">
		                    1
		                </label>
		                <label class="radio-inline">
		                    <input id="select4" name="select4" type="radio" value="2">
		                    2
		                </label>
		              	<label class="radio-inline">
		                    <input id="select4" name="select4" type="radio" value="3">
		                    3
		                </label>
		                <label class="radio-inline">
		                    <input id="select4" name="select4" type="radio" value="4">
		                    4
		                </label>
		                <label class="radio-inline">
		                    <input id="select4" name="select4" type="radio" value="5">
		                    5
		                </label>
		                <label class="radio-inline">
		                    <input id="select4" name="select4" type="radio" value="6">
		                    6
		                </label>
		                <label class="radio-inline">
		                    <input id="select4" name="select4" type="radio" value="7">
		                    7
		                </label>
		                <label>&nbsp;Muy satisfecho</label>
					</div>
				</div>

				<!-- Item 4 -->
				<div class="control-group">
					<label class="control-label" for="select5">
						4.-&nbsp; &iquest;Lo mantienen informado acerca del estado de avance de sus requerimientos?
					</label>
					<div class="controls">
						<label>Insatisfecho&nbsp;</label>
						<label class="radio-inline">
		                    <input id="select5" name="select5" type="radio" value="1">
		                    1
		                </label>
		                <label class="radio-inline">
		                    <input id="select5" name="select5" type="radio" value="2">
		                    2
		                </label>
		              	<label class="radio-inline">
		                    <input id="select5" name="select5" type="radio" value="3">
		                    3
		                </label>
		                <label class="radio-inline">
		                    <input id="select5" name="select5" type="radio" value="4">
		                    4
		                </label>
		                <label class="radio-inline">
		                    <input id="select5" name="select5" type="radio" value="5">
		                    5
		                </label>
		                <label class="radio-inline">
		                    <input id="select5" name="select5" type="radio" value="6">
		                    6
		                </label>
		                <label class="radio-inline">
		                    <input id="select5" name="select5" type="radio" value="7">
		                    7
		                </label>
		                <label>&nbsp;Muy satisfecho</label>
					</div>
				</div>

				<!-- Item 5 -->
				<div class="control-group">
					<label class="control-label" for="select6">
						5.-&nbsp; Por favor, eval&uacute;e la cortes&iacute;a del equipo de Help Desk
					</label>
					<div class="controls">
						<label>Insatisfecho&nbsp;</label>
						<label class="radio-inline">
		                    <input id="select6" name="select6" type="radio" value="1">
		                    1
		                </label>
		                <label class="radio-inline">
		                    <input id="select6" name="select6" type="radio" value="2">
		                    2
		                </label>
		              	<label class="radio-inline">
		                    <input id="select6" name="select6" type="radio" value="3">
		                    3
		                </label>
		                <label class="radio-inline">
		                    <input id="select6" name="select6" type="radio" value="4">
		                    4
		                </label>
		                <label class="radio-inline">
		                    <input id="select6" name="select6" type="radio" value="5">
		                    5
		                </label>
		                <label class="radio-inline">
		                    <input id="select6" name="select6" type="radio" value="6">
		                    6
		                </label>
		                <label class="radio-inline">
		                    <input id="select6" name="select6" type="radio" value="7">
		                    7
		                </label>
		                <label>&nbsp;Muy satisfecho</label>
					</div>
				</div>

				<!-- Item 6 -->
				<div class="control-group">
					<label class="control-label" for="select7">
						6.-&nbsp; &iquest;Como eval&uacute;a la capacidad resolutiva del t&eacute;cnico?
					</label>
					<div class="controls">
						<label>Insatisfecho&nbsp;</label>
						<label class="radio-inline">
		                    <input id="select7" name="select7" type="radio" value="1">
		                    1
		                </label>
		                <label class="radio-inline">
		                    <input id="select7" name="select7" type="radio" value="2">
		                    2
		                </label>
		              	<label class="radio-inline">
		                    <input id="select7" name="select7" type="radio" value="3">
		                    3
		                </label>
		                <label class="radio-inline">
		                    <input id="select7" name="select7" type="radio" value="4">
		                    4
		                </label>
		                <label class="radio-inline">
		                    <input id="select7" name="select7" type="radio" value="5">
		                    5
		                </label>
		                <label class="radio-inline">
		                    <input id="select7" name="select7" type="radio" value="6">
		                    6
		                </label>
		                <label class="radio-inline">
		                    <input id="select7" name="select7" type="radio" value="7">
		                    7
		                </label>
		                <label>&nbsp;Muy satisfecho</label>
					</div>
				</div>

				<div class="control-group" align="center">
					<div class="controls">
						<br><br>
						<button id="submit" type="button" onclick="javascript:enviar();" class="btn btn-lg btn-success">Enviar</button>
					</div>
				</div>

				</fieldset>
			</form>
		</div>
	</div>
</body>
</html>
<?php	
}else{
	echo "Esta encuesta solo se puede responder una vez.";
}
?>