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
		//divResultado = document.getElementById('response');
		username = document.getElementById("username").value;
		password = document.getElementById("password").value;
		if (username && password != ""){
			ajax=objetoAjax();
			ajax.open("POST","procedures/checklogin.php"+"?"+new Date().getTime(),true);
			ajax.onreadystatechange=function() {
				if (ajax.readyState==1){
					//divResultado.innerHTML = '<img src="../cdr_processor/resources/loading.gif">';
				}
				if (ajax.readyState==4) {
					if(ajax.status==200){
						response = ajax.responseText;
						if(response=="YES"){
							window.location = "admin.php";
						}
						if(response=="NO"){
							alert("Lo siento, no reconozco quien eres");
							document.getElementById("username").value="";
							document.getElementById("password").value="";
							document.getElementById("username").focus();
						}
					}else if(ajax.status==404){
						alert("La direccion AJAX no existe");
					}else{
						alert("Error: ".ajax.status);
					}
				}
			}
			ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			ajax.send("username="+username+"&password="+password);
		}else{
			alert("Mmmm... no podrás ingresar si no me dices quien eres");
			document.getElementById("username").value="";
			document.getElementById("password").value="";
			document.getElementById("username").focus();
		}
	}catch (e){
		alert(e);
	}
}

function truncate(){
	var r = confirm("Esta acción borrará todos los registros, ¿esta seguro?");
	if (r == true) {
	    ajax=objetoAjax();
		ajax.open("POST","procedures/qry_truncate.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==1){
				//divResultado
			}
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					if(response=="OK"){
						alert("Se han borrado todas las encuestas.");
					}else{
						alert("Algo sucedio | "+response);
					}
				}else if(ajax.status==404){
					alert("La direccion AJAX no existe");
				}else{
					alert("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send(null);
	} 
}

function exportar(){
  var win = window.open('procedures/export.php', '_blank');
  win.focus();
}

function unaMas(){
	var win = window.open('destroy.php', '_blank'); 
	win.focus();
}

function showStats(){
	var win = window.open('procedures/resultados.php', '_blank'); 
	win.focus();
}
