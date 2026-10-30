<!DOCTYPE html>
<html>
<head>
	<title>TMC EXPO Form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
	<!-- <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css"> -->
	<link rel="stylesheet" href="css/jquery.mobile-1.4.2.min.css"

	<link href="css/alertify/alertify.core.css" rel="stylesheet">
	<link href="css/alertify/alertify.default.css" rel="stylesheet">
	
	<script src="js/alertify/alertify.min.js"></script>
	
	
	<!-- <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script> -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery.mobile-1.4.2.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#resetbtn").click(function() {
				alertify.error("click");
				reset();
			});
			
			$("#submit").click(function() {
				var nombre = document.getElementById('nombre').value;
				var empresa = document.getElementById('empresa').value;
				var cargo = document.getElementById('cargo').value;
				var email = document.getElementById('email').value;
				var detalle = document.getElementById('detalle').value;
				
				if(nombre == ""){
					alertify.error("Nombre es requerido");
					document.getElementById("nombre").focus();
				}else{
				if(empresa==""){
					alertify.error("Empresa es requerido");
					document.getElementById("empresa").focus();
				}else{
				if(email==""){
					alertify.error("Email es requerido");
					document.getElementById("email").focus();
				}else{
				if (validateEmail(email) == false){
					alertify.error("Email no valido");
					document.getElementById("email").focus();
				}else{
				if(detalle==""){
					alertify.error("Detalle es requerido");
					document.getElementById("detalle").focus();
				}else{
					ajax=objetoAjax();
					ajax.open("POST","procedures/qry_insert.php"+"?"+new Date().getTime(),true);
					ajax.onreadystatechange=function() {
						if (ajax.readyState==2){
							alertify.log("Un momento... ");
						}
						if (ajax.readyState==4) {
							if(ajax.status==200){
								response = ajax.responseText;
								if(response=="OK"){
									alertify.success("Guardado correcto");
									reset();
								}
								if(response=="NO"){
									alertify.error("D'Oh! algo sucedió D:")
								}
							}else if(ajax.status==404){
								alertify.error("La direccion AJAX no existe");
							}else{
								alertify.log("Error: ".ajax.status);
							}
						}
					}
					ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					ajax.send("nombre="+nombre+"&empresa="+empresa+"&cargo="+cargo+"&email="+email+"&detalle="+detalle);
				}	}	}	}	}
			});
		});
		
		function validateEmail(email) {
			var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}
		
		function objetoAjax() {
			xmlhttp=false;
			this.AjaxFailedAlert = "Su navegador no soporta las funcionalidades de este sitio y podría experimentarlo de forma diferente a la que fue pensada. Por favor habilite javascript en su navegador para verlo normalmente.\n";
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
		
		function reset() {
			document.getElementById('nombre').value = "";
			document.getElementById('empresa').value = "";
			document.getElementById('cargo').value = "";
			document.getElementById('email').value = "";
			document.getElementById('detalle').value = "";
		}
	</script>
</head>
<body>
<div data-role="page" >
	<div data-role="header" align="center" >
		 <!-- <img id="Logo" src="resources/tmc_logo.png" style="width: 5%;"> -->
		 <img id="Logo" src="resources/tm2.png" style="width: 5%;">
			EXPO HOSPITAL 2015
	</div>
	<div data-role="main" class="ui-content" >
		
		<label for="nombre">* Nombre:</label>
		<input id="nombre" name="nombre" type="text" placeholder="Nombre Cliente">
		
		<label for="empresa">* Empresa:</label>
		<input id="empresa" name="empresa" type="text" placeholder="Empresa Cliente">
		
		<label for="cargo">Cargo:</label>
		<input id="cargo" name="cargo" type="text" placeholder="Cargo">
		
		<label for="email">* Email:</label>
		<input id="email" name="email" type="email" placeholder="name@company.com">
		
		<label for="detalle">* Detalle:</label>
		<textarea id="detalle" name="detalle"></textarea>
		<div id="botones" align="center">
			<input id="resetbtn" type="reset" value="Reset" data-inline="true" data-icon="refresh"/>
			<input id="submit" type="button" value="Enviar" data-inline="true" data-icon="check" data-theme="b"/>
		</div>
	</div>
	<div data-role="footer" align="center">
		<h1>TouchMedia Consulting Dev</h1>
		<a href="index.php" rel="external">Versión completa</a>
		<br>
		Derechos Reservados | 2015 | Marteliuz
	</div>
</div>
</body>
</html>