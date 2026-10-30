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
						swal({   
							title: "Bienvenido!",   
							text: saluda()+", es bueno verlo por aquí.",
							type: "success",  
							timer: 3000,   
							showConfirmButton: false 
						},
						function(){
							window.location = "index.php";
						});
					}
					if(response=="NO"){
						swal("Nop", "Reingresa tus datos e intentalo nuevamente.", "error");
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

function logout(){
	swal({   
		title: "¿Ya se va?",   
		text: "va a cerrar su sesión, ¿está seguro?",   
		type: "warning",   
		showCancelButton: true,
		cancelButtonText: "Mmm... mejor no",   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Si, sácame de aqui",   
		closeOnConfirm: false }, 

	function(){   
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
	});
}



function loadMisProspectos(){
	try{
		document.getElementById("loadMisProspectos").submit();
	}catch(e){
		console.error(e);
	}
}
function loadMisProspectosActivos(id_ejecutivo){
	try{
		openWindowWithPost("loadMisProspectosActivos.php", "_self", "id_ejecutivo", id_ejecutivo);
	}catch(e){
		console.error(e);
	}
}

function loadMisProspectosCerrados(id_ejecutivo){
	try{
		openWindowWithPost("loadMisProspectosCerrados.php", "_self", "id_ejecutivo", id_ejecutivo);
	}catch(e){
		console.error(e);
	}
}

function loadMisProspectosDescartados(id_ejecutivo){
	try{
		openWindowWithPost("loadMisProspectosDescartados.php", "_self", "id_ejecutivo", id_ejecutivo);
	}catch(e){
		console.error(e);
	}
}

function loadMisClientes(){
	try{
		document.getElementById("loadMisClientes").submit();
	}catch(e){
		console.error(e);
	}
}

function loadNuevoProspecto(id_cliente, id_ejecutivo){
	try{
		var values = new Array(id_ejecutivo, id_cliente) 
		var keys   = new Array("id_ejecutivo","id_cliente");
		var url    = "nuevoProspecto.php"

		var newWindow = window.open(url, "_self");

	    if (!newWindow) return false;

	    var html = "";
	    html += "<html><head></head><body><form id='formid' method='post' action='" + url +"'>";

	    if (keys && values && (keys.length == values.length))
	        for (var i=0; i < keys.length; i++)
	            html += "<input type='hidden' name='" + keys[i] + "' value='" + values[i] + "'/>";

	    html += "</form><script type='text/javascript'>document.getElementById('formid').submit()</sc"+"ript></body></html>";

	    newWindow.document.write(html);
    return newWindow;


	}catch(e){
		console.error(e);
	}
}

function modificarProspecto(id_prospecto){
	try{
		openWindowWithPost('modificarProspecto.php','_self',"id_prospecto",id_prospecto);
	}catch(e){
		console.error(e);
	}
}

function loadContactosByCliente(id_cliente, id_ejecutivo){
	try{
		var values = new Array(id_ejecutivo, id_cliente) 
		var keys   = new Array("id_ejecutivo","id_cliente");
		var url    = "loadContactosByCliente.php"

		var newWindow = window.open(url, "_self");

	    if (!newWindow) return false;

	    var html = "";
	    html += "<html><head></head><body><form id='formid' method='post' action='" + url +"'>";

	    if (keys && values && (keys.length == values.length))
	        for (var i=0; i < keys.length; i++)
	            html += "<input type='hidden' name='" + keys[i] + "' value='" + values[i] + "'/>";

	    html += "</form><script type='text/javascript'>document.getElementById('formid').submit()</sc"+"ript></body></html>";

	    newWindow.document.write(html);
    return newWindow;


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

		if (nombre == "" || nombre.length < 10) {
			swal("Vamos!", "Debe ingresar un nombre válido", "error");
		}else{
			if (cargo == "" || cargo.length < 8) {
				swal("Vamos!", "Debe ingresar un cargo válido", "error");
			}else{
				if (validarEmail(correo)=="NO") {
					swal("Vamos!", "Debe ingresar un email válido", "error");
				}else{
					if (telefono == "" || telefono.length < 8) {
						swal("Vamos!", "Debe ingresar un teléfono válido", "error");
					}else{
						// POST
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
										swal({   
										title: "OK",   
										text: "El contacto se ha agregado",
										type: "success",  
										timer: 2000,   
										showConfirmButton: false 
										},
										function(){
											loadContactosByCliente(id_cliente, id_ejecutivo);
										});
									}
								}else if(ajax.status==404){
									console.log("La direccion AJAX no existe");
								}else{
									console.log("Error: ".ajax.status);
								}
							}
						}
						ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
						ajax.send("id_ejecutivo="+id_ejecutivo+"&id_cliente="+id_cliente+"&nombre="+nombre+"&cargo="+cargo+"&correo="+correo+"&telefono="+telefono);
					}
				}
			}
		}	
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
							window.open("loadMisProspectos.php?id_ejecutivo="+id_ejecutivo)
							// loadMisProspectos(id_ejecutivo);


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

function crearProspecto(id_cliente, id_ejecutivo){
	try{
		id_contacto       = document.getElementById("contactos").value;
		nombre_prospecto  = document.getElementById("nombre_prospecto").value;
		detalle_prospecto = document.getElementById("detalle_prospecto").value;
		fecha_esperada_c  = document.getElementById("datetimepicker1").value;
		porcent_cierre    = document.getElementById("porcent_cierre").value;
		cotizacion        = document.getElementById("cotizacion").value;
		moneda			  = document.getElementById("moneda").value;
		monto 			  = document.getElementById("monto").value;

		if (nombre_prospecto == "" || nombre_prospecto.length < 10) {
			swal("Vamos!", "Debe ingresar un nombre de prospecto válido", "error");
		}else{
			if (detalle_prospecto == "" || detalle_prospecto.length < 15) {
				swal("Vamos!", "Debe ingresar un detalle de prospecto válido", "error");
			}else{
				// POST
				ajax=objetoAjax();
				ajax.open("POST","qry_crearProspecto.php"+"?"+new Date().getTime(),true);
				ajax.onreadystatechange=function() {
					if (ajax.readyState==1){
						// divResultado.innerHTML = '<img src="resources/loading.gif">';
					}
					if (ajax.readyState==4) {
						if(ajax.status==200){
							response = ajax.responseText;
							res = response.split("-");
							if (res[0]=="OK") {
								id_prospecto = res[1];
								swal({   
									title: "Prospecto creado!",   
									text: "Desea seguir modificando?",   
									type: "success",   
									showCancelButton: true, 
									cancelButtonText: "Ahora no", 
									confirmButtonColor: "#DD6B55",   
									confirmButtonText: "Si, vamos",   
									closeOnConfirm: false },
									function(isConfirm){   
										if (isConfirm) {     
											modificarProspecto(id_prospecto);
										} else {
										    openWindowWithPost('loadMisProspectos.php','_self',"id_ejecutivo",id_ejecutivo);
										} 
									});
							};
							if (res[0]=="NO") {
								console.log("Error en funcion crearProspecto() ".res[1]);
							};
							if (res[0]=="ERROR") {
								console.log("Error en funcion crearProspecto() ".res[1]);
							};
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
			}
		}
	}catch(e){
		console.error(e);
	}
}

function limpiarProspecto() {
	document.getElementById("nombre_prospecto").value = "";
	document.getElementById("detalle_prospecto").value = "";
	document.getElementById("datetimepicker1").value = "";
	document.getElementById("porcent_cierre").value = "";
	document.getElementById("cotizacion").value = "";
	document.getElementById("monto").value = "";
}

function updateInfoProspecto(id_prospecto) {
	try{
		detalle_prospecto = document.getElementById("detalle_prospecto").value;
		fecha_esperada_c  = document.getElementById("datetimepicker1").value;
		porcent_cierre    = document.getElementById("porcent_cierre").value;
		cotizacion        = document.getElementById("cotizacion").value;
		monto 			  = document.getElementById("monto").value;
		estado 			  = document.getElementById("estado").value;

		switch(estado){
			case "4":
				// Cerrado
				swal({   
					title: "Cerrando prospecto...",   
					text: "Debes ingresar la Nota de Venta asociada.",   
					type: "input",   
					showCancelButton: true,   
					closeOnConfirm: false,   
					animation: "slide-from-top",   
					inputPlaceholder: "nota de venta" }, 
					function(inputValue){   
						if (inputValue === false)
							return false;      
						if (inputValue === "") {     
							swal.showInputError("Lo siento, no puedes cerrar el prospecto sin la nota de venta");     
							return false   
						}else{
							ajax=objetoAjax();
							ajax.open("POST","qry_updateProspecto.php"+"?"+new Date().getTime(),true);
							ajax.onreadystatechange=function() {
								if (ajax.readyState==4) {
									if(ajax.status==200){
										response = ajax.responseText;
										res = response.split(">");

										if (res[0]=="OK") {
											swal({   
												title: "Perfecto!",   
												text: "El prospecto ha sido actualizado.",
												type: "success",  
												timer: 2000,   
												showConfirmButton: false 
											},
											function(){
												location.reload();
											});
										}
										if (res[0]=="NO") {
											console.log("Error en funcion updateInfoProspecto() case 4: "+res[1]);
										}
										if (res[0]=="ERROR") {
											console.log("Error en funcion updateInfoProspecto() case 4: "+res[1]);
										}
										if (res[0]=="log") {
											alert(res[1]);
										}
									}else if(ajax.status==404){
										console.log("La direccion AJAX no existe");
									}else{
										console.log("Error: ".ajax.status);
									}
								}
							}
							ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
							ajax.send("id_prospecto="+id_prospecto+"&detalle_prospecto="+detalle_prospecto+"&fecha_esperada_c="+fecha_esperada_c+
									  "&porcent_cierre="+porcent_cierre+"&cotizacion="+cotizacion+"&monto="+monto+"&estado="+estado+"&nota_venta="+inputValue);
						}	
					});
				break;
			case "5":
				// Descartado
				swal({   
					title: "Descartado prospecto...",   
					text: "OK, pero debes ingresar el motivo.",   
					type: "input",   
					showCancelButton: true,   
					closeOnConfirm: false,   
					animation: "slide-from-top",   
					inputPlaceholder: "motivo" }, 
					function(inputValue){   
						if (inputValue === false) 
							return false;      
						if (inputValue === "") {     
							swal.showInputError("Lo siento, no puedes descartar el prospecto sin saber el motivo.");     
							return false;
						}else{
							ajax=objetoAjax();
							ajax.open("POST","qry_updateProspecto.php"+"?"+new Date().getTime(),true);
							ajax.onreadystatechange=function() {
								if (ajax.readyState==4) {
									if(ajax.status==200){
										response = ajax.responseText;
										res = response.split(">");

										if (res[0]=="OK") {
											swal({   
												title: "Perfecto!",   
												text: "El prospecto ha sido actualizado.",
												type: "success",  
												timer: 2000,   
												showConfirmButton: false 
											},
											function(){
												location.reload();
											});
										}
										if (res[0]=="NO") {
											console.log("Error MySQL en funcion updateInfoProspecto() case 5: "+res[1]);
										}
										if (res[0]=="ERROR") {
											console.log("Error MySQL en funcion updateInfoProspecto() case 5: "+res[1]);
										}
										if (res[0]=="log") {
											alert(res[1]);
										}
									}else if(ajax.status==404){
										console.log("La direccion AJAX no existe");
									}else{
										console.log("Error: ".ajax.status);
									}
								}
							}
							ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
							ajax.send("id_prospecto="+id_prospecto+"&detalle_prospecto="+detalle_prospecto+"&fecha_esperada_c="+fecha_esperada_c+
									  "&porcent_cierre="+porcent_cierre+"&cotizacion="+cotizacion+"&monto="+monto+"&estado="+estado+"&motivo="+inputValue);
						}
					});
				break;
			default:
				ajax=objetoAjax();
				ajax.open("POST","qry_updateProspecto.php"+"?"+new Date().getTime(),true);
				ajax.onreadystatechange=function() {
					if (ajax.readyState==4) {
						if(ajax.status==200){
							response = ajax.responseText;
							res = response.split(">");

							if (res[0]=="OK") {
								swal({   
									title: "Perfecto!",   
									text: "El prospecto ha sido actualizado.",
									type: "success",  
									timer: 2000,   
									showConfirmButton: false 
								},
								function(){
									location.reload();
								});
							}
							if (res[0]=="NO") {
								console.log("Error MySQL en funcion updateInfoProspecto() case default: "+res[1]);
							}
							if (res[0]=="ERROR") {
								console.log("Error MySQL en funcion updateInfoProspecto() case default:"+res[1]);
							}
							if (res[0]=="log") {
								alert(res[1]);
							}
						}else if(ajax.status==404){
							console.log("La direccion AJAX no existe");
						}else{
							console.log("Error: ".ajax.status);
						}
					}
				}
				ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				ajax.send("id_prospecto="+id_prospecto+"&detalle_prospecto="+detalle_prospecto+"&fecha_esperada_c="+fecha_esperada_c+
						  "&porcent_cierre="+porcent_cierre+"&cotizacion="+cotizacion+"&monto="+monto+"&estado="+estado);
		}
	}catch(e){
		console.error(e);
	}
}

function guardarActividad(id_prospecto){
	try{
		accion   = document.getElementById("accion").value;
		objetivo = document.getElementById("objetivo").value;
		observac = document.getElementById("observaciones").value;

		if (observac == "" || observac.length < 10) {
			swal("Vamos!", "Debe ingresar algo en el campo de observaciones", "error");
		}else{
			ajax=objetoAjax();
			ajax.open("POST","qry_saveActivity.php"+"?"+new Date().getTime(),true);
			ajax.onreadystatechange=function() {
				if (ajax.readyState==1){
					// divResultado.innerHTML = '<img src="resources/loading.gif">';
				}
				if (ajax.readyState==4) {
					if(ajax.status==200){
						response = ajax.responseText;
						res = response.split("-");

						if (res[0]=="OK") {
							swal({   
								title: "Bien hecho!",   
								text: "Actividad guardada.",
								type: "success",  
								timer: 2000,   
								showConfirmButton: false 
								},
								function(){
									location.reload();
								});
						}
						if (res[0]=="NO"){
							console.log("Error MySQL en funcion guardarActividad() ".res[1]);
						}
						if (res[0]=="ERROR"){
							console.log("Error en funcion guardarActividad() ".res[1]);
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
		}
	}catch(e){
		console.error(e);
	}
}

// VALIDACIONES
function validarEmail( email ) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) )
        return "NO";
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

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

// MISC

function openWindowWithPost(url,name,keys,values){
    var newWindow = window.open(url, name);

    if (!newWindow) return false;

    var html = "";
    html += "<html><head></head><body><form id='formid' method='post' action='" + url +"'>";
    html += "<input type='hidden' name='" + keys + "' value='" + values + "'/>";
    html += "</form><script type='text/javascript'>document.getElementById('formid').submit()</sc"+"ript></body></html>";

    newWindow.document.write(html);
    return newWindow;
}


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
		return "Buenos días"; 
	} 
	if((today.getHours() >=10) && (today.getHours() <=11)){ 
		return "Buenos días"; 
	} 
	if((today.getHours() >=12) && (today.getHours() <=19)){ 
		return "Buenas tardes"; 
	} 
	if((today.getHours() >=20) && (today.getHours() <=23)){ 
		return "Buenas noches"; 
	} 
	if((today.getHours() >=0) && (today.getHours() <=3)){ 
		return "Buenas noches"; 
	} 
	if((today.getHours() >=4) && (today.getHours() <=5)){ 
		return "Buenas noches"; 
	} 
}


