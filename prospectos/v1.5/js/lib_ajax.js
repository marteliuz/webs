//@date        : 2014/08/23
//@autor       : Marteliuz

// JavaScript Document

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

function checklogin(){
	try{
		username = document.getElementById("inputEmail").value;
		password = document.getElementById("inputPassword").value;

		ajax=objetoAjax();
		ajax.open("POST","checklogin.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				// divResultado.innerHTML = '<img src="../resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){

					response = ajax.responseText;
					if (response=="YES"){
						alert("Bienvenido");
						window.location = "index.php";
					}
					if(response=="NO"){
						alert("La combinación email / contraseña no coincide.")
					}

				}else if(ajax.status==404){
					console.log("La direccion AJAX no existe");
				}else{
					console.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("username="+username+"&password="+password);
	}catch(e){
		console.error(e);
	}
}

function loadMisProspectos(id_ejecutivo){
	try{
		divResultado = document.getElementById("page-wrapper");

		ajax=objetoAjax();
		ajax.open("POST","qry_loadMisProspectos.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				divResultado.innerHTML = '<img src="resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					divResultado.innerHTML = response;
				}else if(ajax.status==404){
					console.log("La direccion AJAX no existe");
				}else{
					console.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id_ejecutivo="+id_ejecutivo);

	}catch(e){
		console.error(e);
	}
}

function loadMisClientes(id_ejecutivo){
	try{
		divResultado = document.getElementById("page-wrapper");

		ajax=objetoAjax();
		ajax.open("POST","qry_loadMisClientes.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				divResultado.innerHTML = '<img src="resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					divResultado.innerHTML = response;
				}else if(ajax.status==404){
					console.log("La direccion AJAX no existe");
				}else{
					console.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id_ejecutivo="+id_ejecutivo);

	}catch(e){
		console.error(e);
	}
}

function logout(){
	ajax=objetoAjax();
	ajax.open("POST","logout.php"+"?"+new Date().getTime(),true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			if(ajax.status==200){
				response = ajax.responseText;
				if(response=="OK"){
					window.location ="login.html";
				}
			}
		}
	}
	ajax.send(null);
}

function contactos(id_cliente, id_ejecutivo) {
	try{
		divResultado = document.getElementById("page-wrapper");

		ajax=objetoAjax();
		ajax.open("POST","contactos.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				divResultado.innerHTML = '<img src="resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					divResultado.innerHTML = response;
				}else if(ajax.status==404){
					console.log("La direccion AJAX no existe");
				}else{
					console.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id_ejecutivo="+id_ejecutivo+"&id_cliente="+id_cliente);

	}catch(e){
		console.error(e);
	}
}

function agregaContacto(id_cliente, id_ejecutivo) {
	try{
		nombre   = document.getElementById("input_nombre_contacto").value;
		cargo    = document.getElementById("input_cargo_contacto").value;
		correo   = document.getElementById("input_correo_contacto").value;
		telefono = document.getElementById("input_telefono_contacto").value;

		// alert(nombre);
		// alert(cargo);
		// alert(correo);
		// alert(telefono);

		ajax=objetoAjax();
		ajax.open("POST","qry_agregaContacto.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				// divResultado.innerHTML = '<img src="resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;

					if(response=="OK") {
						alert("Se ha agregado correctamente.");
						contactos(id_cliente, id_ejecutivo);
					}
					// divResultado.innerHTML = response;
				}else if(ajax.status==404){
					console.log("La direccion AJAX no existe");
				}else{
					console.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id_ejecutivo="+id_ejecutivo+"&id_cliente="+id_cliente+"&nombre="+nombre+"&cargo="+cargo+"&correo="+correo+"&telefono="+telefono);
	}catch(e){
		console.error(e);
	}
}

function nuevoProspecto(id_cliente, id_ejecutivo) {
	try{
		divResultado = document.getElementById("page-wrapper");

		ajax=objetoAjax();
		ajax.open("POST","nuevoProspecto.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				// divResultado.innerHTML = '<img src="resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;

					// if(response=="OK") {
					// 	alert("Se ha agregado correctamente.");
					// 	contactos(id_cliente, id_ejecutivo);
					// }
					divResultado.innerHTML = response;
				}else if(ajax.status==404){
					console.log("La direccion AJAX no existe");
				}else{
					console.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id_ejecutivo="+id_ejecutivo+"&id_cliente="+id_cliente);
	}catch(e){
		console.error(e);
	}
}

function eliminarProspecto(id_prospecto, id_ejecutivo){
	try{
		var r = confirm("Va a eliminar este prospecto, ¿está seguro?");
	    if (r == true) {
	        ajax=objetoAjax();
			ajax.open("POST","qry_eliminarProspecto.php"+"?"+new Date().getTime(),true);
			ajax.onreadystatechange=function() {
				if (ajax.readyState==1){
					// divResultado.innerHTML = '<img src="resources/loading.gif">';
				}
				if (ajax.readyState==4) {
					if(ajax.status==200){
						response = ajax.responseText;
						if (response=="OK") {
							alert("El prospecto ha sido eliminado.");
							loadMisProspectos(id_ejecutivo);

						};
						// divResultado.innerHTML = response;
					}else if(ajax.status==404){
						console.log("La direccion AJAX no existe");
					}else{
						console.log("Error: ".ajax.status);
					}
				}
			}
			ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			ajax.send("id_prospecto="+id_prospecto);
	    }
	}catch(e){
		console.error(e);
	}
}

function modificarProspecto(id_prospecto){
	// alert(id_prospecto);
	try{
		divResultado = document.getElementById("page-wrapper");

		ajax=objetoAjax();
		ajax.open("POST","modificarProspecto.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				// divResultado.innerHTML = '<img src="resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					divResultado.innerHTML = response;
				}else if(ajax.status==404){
					console.log("La direccion AJAX no existe");
				}else{
					console.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id_prospecto="+id_prospecto);
	}catch(e){
		console.error(e);
	}
}

function crearProspecto(id_cliente, id_ejecutivo){
	// alert("cerar nuevo prospecto");
	try{
		id_contacto       = document.getElementById("contactos").value;
		nombre_prospecto  = document.getElementById("nombre_prospecto").value;
		detalle_prospecto = document.getElementById("detalle_prospecto").value;
		fecha_esperada_c  = document.getElementById("fecha_esperada_c").value;
		porcent_cierre    = document.getElementById("porcent_cierre").value;
		cotizacion        = document.getElementById("cotizacion").value;
		moneda			  = document.getElementById("moneda").value;
		monto 			  = document.getElementById("monto").value;



		ajax=objetoAjax();
		ajax.open("POST","qry_crearProspecto.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				// divResultado.innerHTML = '<img src="resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					// alert(response);
					if (response=="OK") {
						alert("El prospecto ha sido creado.");
						loadMisProspectos(id_ejecutivo);

					};
					// divResultado.innerHTML = response;
				}else if(ajax.status==404){
					console.log("La direccion AJAX no existe");
				}else{
					console.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id_contacto="+id_contacto+"&id_cliente="+id_cliente+"&id_ejecutivo="+id_ejecutivo+"&nombre_prospecto="+nombre_prospecto+
			"&detalle_prospecto="+detalle_prospecto+"&fecha_esperada_c="+fecha_esperada_c+"&porcent_cierre="+porcent_cierre+"&cotizacion="+cotizacion+"&monto="+monto+"&moneda="+moneda);
	
	}catch(e){
		console.error(e);
	}
}

function limpiar() {
	document.getElementById("nombre_prospecto").value = "";
	document.getElementById("detalle_prospecto").value = "";
	document.getElementById("fecha_esperada_c").value = "";
	document.getElementById("porcent_cierre").value = "";
	document.getElementById("cotizacion").value = "";
	document.getElementById("monto").value = "";
}

function guardarActividad(id_prospecto){
	try{
		accion   = document.getElementById("accion").value;
		objetivo = document.getElementById("objetivo").value;
		observac = document.getElementById("observaciones").value;

		ajax=objetoAjax();
		ajax.open("POST","qry_saveActivity.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				// divResultado.innerHTML = '<img src="resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					if (response=="OK") {
						alert("Actividad guardada.")
						document.getElementById("accion").value = 1;
						document.getElementById("objetivo").value = "1";
						document.getElementById("observaciones").value = "";

					}else{
						alert("D'oh! Algo pasó...");
					}
				}else if(ajax.status==404){
					console.log("La direccion AJAX no existe");
				}else{
					console.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id_prospecto="+id_prospecto+"&accion="+accion+"&objetivo="+objetivo+"&observaciones="+observac);

	}catch(e){
		console.error(e);
	}
}








// OLD FUNCTIONS 

function buscar(){
	try{
		divResultado = document.getElementById('response-div');
		search = document.getElementById("search").value;
		
		ajax=objetoAjax();
		ajax.open("POST","procedures/qry_search.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				divResultado.innerHTML = '<img src="resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					if (response == "No existen coincidencias para mostrar. Intentelo nuevamente.") {
						alertify.log("No existen coincidencias para mostrar. Intentelo nuevamente.");
						divResultado.innerHTML = response;

					}else{
						alertify.log("Mostrando resultados...");
						divResultado.innerHTML = response;
					}

				}else if(ajax.status==404){
					console.log("La direccion AJAX no existe");
				}else{
					console.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("search="+search);

	}catch (e){
		console.error(e);
	}
}

function buscaModificar(){
	try{
		divResultado = document.getElementById('response-div');
		search = document.getElementById("search").value;
		
		ajax=objetoAjax();
		ajax.open("POST","../procedures/qry_search4modified.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				divResultado.innerHTML = '<img src="../resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){
					// alertify.log("Mostrando resultados...");
					alertify.log("Para modificar un item, debe hacer doble click sobre el.");
					response = ajax.responseText;
					divResultado.innerHTML = response;
				}else if(ajax.status==404){
					console.log("La direccion AJAX no existe");
				}else{
					console.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("search="+search);

	}catch (e){
		console.error(e);
	}
}

function updateCliente(id_cliente){
	try{
		activo    = document.getElementById("optradio").checked;	
		rut       = document.getElementById("rut").value;
		nombre    = document.getElementById("name").value;
		ejecutivo = document.getElementById("select-ejecutivo").value;

		if (activo == true) {
			activo = 1;
		}else{
			activo = 0;
		}

		ajax=objetoAjax();
		ajax.open("POST","../procedures/qry_updateCliente.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				divResultado.innerHTML = '<img src="../resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					if (response == "OK") {
						alertify.Success("Actualizado");
						window.close();
						// refresh();
					}
				}else if(ajax.status==404){
					console.log("La direccion AJAX no existe");
				}else{
					console.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id_ejecutivo="+ejecutivo+"&id_cliente="+id_cliente+"&activo="+activo+"&rut="+rut+"&nombre="+nombre);
	}catch(e){
		console.error(e);
	}	
}


function modifica(id_cliente){
	// alert("Vamos a modificar el cliente ID "+id_cliente);
	window.open("updateCliente.php?id_cliente="+id_cliente, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");

}

function asignarCliente(){
	try{
		divResultado = document.getElementById('response-div');
		rut 		 = document.getElementById("rutBox").value;
		nombre 		 = document.getElementById("nombreBox").value;
		ejecutivo	 = document.getElementById("select-ejecutivo").value;

		if(validaRut(rut) == true){
			if(validaNombre(nombre) == true){
				if(ejecutivo != 0){
					console.log("validacion completa. Insert");
					ajax=objetoAjax();
					ajax.open("POST","qry_asignaCliente.php"+"?"+new Date().getTime(),true);
					ajax.onreadystatechange=function() {
						if (ajax.readyState==1){
							divResultado.innerHTML = '<img src="resources/loading.gif">';
						}
						if (ajax.readyState==4) {
							if(ajax.status==200){
								response = ajax.responseText;
								if (response == "OK") {
									alertify.success("Cliente agregado y asignado satisfactoriamente... ");
									setTimeout(function() {
										// rest of code here
										refresh();
									}, 2000);
								}else{
									alert("Algo sucedió en la rutina de INSERT");
								}
							}else if(ajax.status==404){
								console.log("La direccion AJAX no existe");
							}else{
								console.log("Error: ".ajax.status);
							}
						}
					}
					ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					ajax.send("rut="+rut+"&nombre="+nombre+"&ejecutivo="+ejecutivo);
				}else{
					alert("Debe seleccionar un ejecutivo");
				}
			}else{
				alert("Ingrese un nombre valido");
			}
		}else{
			alert("Ingrese un RUT valido");
		}
	}catch (e){
		console.error(e);
	}
}

function validaRut(rut){

	flag = 1;

	if(isNumeric(rut) == false){
		flag = 0;
	}

	if(rut == "Ingrese el RUT"){
		flag = 0;
	}
	if(rut == " "){
		flag = 0;
	}
	if(rut.length > 10 || rut.length <= 7){
		flag = 0;
	}


	if(flag==1){
		return true;
	}else{
		return false;
	}

}

function validaNombre(nombre){

	if(nombre == "Ingrese el Nombre"){
		flag = 0;
	}
	if(nombre == " "){
		flag = 0;
	}
	if(nombre.length < 5){
		flag = 0;
	}


	if(flag==1){
		return true;
	}else{
		return false;
	}

}

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function clearDivs(){
	document.getElementById('controls').value = "";
	document.getElementById('table').value = "";
}

//MODIFIED
function refresh(){
	location.reload();
}



function saluda(){	
	today = new Date() 
	if(today.getMinutes() < 10){ 
		pad = "0"} 
	else 
		pad = ""; 
	if((today.getHours() >=6) && (today.getHours() <=9)){ 
		return "Buenos días "; 
	} 
	if((today.getHours() >=10) && (today.getHours() <=11)){ 
		return "Buenos días "; 
	} 
	if((today.getHours() >=12) && (today.getHours() <=19)){ 
		return "Buenas tardes "; 
	} 
	if((today.getHours() >=20) && (today.getHours() <=23)){ 
		return "Buenas noches "; 
	} 
	if((today.getHours() >=0) && (today.getHours() <=3)){ 
		return "Buenas noches "; 
	} 
	if((today.getHours() >=4) && (today.getHours() <=5)){ 
		return "Buenas noches "; 
	} 
}