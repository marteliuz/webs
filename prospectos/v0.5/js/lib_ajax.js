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
		ajax.open("POST","procedures/checklogin.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				// divResultado.innerHTML = '<img src="../resources/loading.gif">';
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){

					response = ajax.responseText;
					// alert(response);
					if (response=="YES"){
						alertify.success("Bienvenido");
						window.location = "procedures/main.php";
						// window.open('', '_self').close();
						// window.open("modificaCliente.php", "_blank");

					}else{
						alertify.error("No se ha podido iniciar sesión");
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
		divResultado = document.getElementById("divResultado");

		ajax=objetoAjax();
		ajax.open("POST","../procedures/qry_loadMisProspectos.php"+"?"+new Date().getTime(),true);
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
		divResultado = document.getElementById("divResultado");

		ajax=objetoAjax();
		ajax.open("POST","../procedures/qry_loadMisClientes.php"+"?"+new Date().getTime(),true);
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


function buscarByEjecutivo() {
	try{
		divResultado = document.getElementById('response-div');
		ejecutivo	 = document.getElementById("select-ejecutivo").value;
		
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
		ajax.send("id_ejecutivo="+ejecutivo);

	}catch (e){
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

function login(){
	//alertify.success("Success");

	window.open("procedures/login.php", "_blank", "toolbar=no,scrollbars=no,resizable=no,top=300,left=300,width=400,height=400");

}



function logout(){
	alertify.confirm("¿Ya se va? :( ", function (e) {
	if (e) {
		ajax=objetoAjax();
		//Called file logout.php
		ajax.open("POST","../procedures/logout.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					if(response=="OK"){
						window.location ="../index.php";
					}
					if(response=="ERROR"){ 	
						alertify.error("D'oh! Algo sucedió...");
					}
				}
			}
		}
			ajax.send(null);
		}
	});
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