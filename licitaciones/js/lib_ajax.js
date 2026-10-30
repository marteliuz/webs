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
		divResultado = document.getElementById('response');
		username = document.getElementById("username").value;
		password = document.getElementById("password").value;
		if (username && password != ""){
			ajax=objetoAjax();
			//Called file ckecklogin.php - extract response
			ajax.open("POST","../licitaciones/procedures/checklogin.php"+"?"+new Date().getTime(),true);
			ajax.onreadystatechange=function() {
				if (ajax.readyState==1){
					divResultado.innerHTML = '<img src="../licitaciones/resources/loading.gif">';
				}
				if (ajax.readyState==4) {
					if(ajax.status==200){
						response = ajax.responseText;
						if(response=="YES"){
							//Called file selectafile.php
							window.location = "../licitaciones/procedures/selectafile.php";
						}
						if(response=="NO"){
							alertify.error("Lo siento, no reconozco quien eres");
							document.getElementById("username").value="";
							document.getElementById("password").value="";
							document.getElementById("username").focus();
						}
					}else if(ajax.status==404){
						alertify.log("La direccion AJAX no existe");
					}else{
						alertify.log("Error: ".ajax.status);
					}
				}
			}
			ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			ajax.send("username="+username+"&password="+password);
		}else{
			alertify.error("Mmmm... no podrás ingresar si no me dices quien eres");
			document.getElementById("username").value="";
			document.getElementById("password").value="";
			document.getElementById("username").focus();
		}
	}catch (e){
		alertify.error(e);
	}
}

function clearDivs(){
	document.getElementById('controls').value = "";
	document.getElementById('table').value = "";
}

function welcome(){
        alertify.success("Bienvenido a Procesamiento CDR!"); 
        return false;
}

//MODIFIED
function PromptCliente() {
	alertify.prompt("¿Cual es el nombre del cliente?", function (e, str) {
		if (e) {
			str = str.trim();
			if (str != null && str.length >= 3 && str.length <= 20) {
				//comprobacion de existencia
				ajax=objetoAjax();
				ajax.open("POST","../procedures/qryCheckCliente.php",true);
				ajax.onreadystatechange=function() {
					if (ajax.readyState==4) {
						if(ajax.status==200){
							response = ajax.responseText;
							//alert(response);
							if (response=="YES") {
								//recarga();
                                //showBasicStats();
                                showClienteMinsal();
							} else if (response=="NOT"){
								//recarga();
								//showBasicStats();
								showClienteMinsal();
								Promptlogo();
							}else{
                                  alertify.error(response);
							};
						}else if(ajax.status==404){
							alertify.log("La direccion AJAX no existe");
						}else{
							alertify.log("Error: ".ajax.status);
						}
					}
				}
				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				ajax.send("str="+str);
			} else {
				alertify.error("Ingrese un nombre valido");
				PromptCliente();
			}
		} else {
			alertify.confirm("¿Esta seguro que desea cancelar? <br> Va a perder los datos de este reporte... ", function (e) {
				if (e) {
					// user clicked "ok"
					location.reload();//Recargar la pagina
				} else {
					// user clicked "cancel"
					PromptCliente();
				}
			});
		}
	}, "");
}

//MODIFIED
function Promptlogo(){
	window.open("../procedures/pop.php", " _blank", "toolbar=no, location=no, scrollbars=no, resizable=no, top=150, left=40, width=700, height=450");
    // alertify.log("Cargar imagen corportativa...");
}

//MODIFIED
function goBack(){
	window.close();
}

//MODIFIED
function uploadImg(){
	    alertify.log("Procesando imagen....");
		divResultado = document.getElementById('response');
		upload_input = document.getElementById('archivo');
		file = upload_input.files[0];
		ajax=objetoAjax();
		// Called file uploap.php for load file cvs
		ajax.open("POST","../procedures/uploadImg.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					alert(response);
					if(response=="OK"){
						goBack();
						alertify.log("Ya hice lo que tenía que hacer, continuemos...");
					}
					if(response=="ErrorType"){
						alertify.error("Vamos! Si sabes que archivo necesito...");
					}
					if(response=="ErrorSize"){
						alertify.error("El archivo es muy pequeño para procesarlo...");
					}

					}else if(ajax.status==404){
					alertify.log("La direccion AJAX no existe");
				}else{
					alertify.log("Error: ".ajax.status);
				}
			}
		}
		ajax.setRequestHeader("Cache-Control", "no-cache");
		ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
		ajax.setRequestHeader("X-File-Name", file.name);

		ajax.send(file);
}

//MODIFIED
function upload(){
	alertify.log("Ve por un cafe por mientras, este proceso puede tardar hasta 20 minutos.");	
	
	
	divResultado = document.getElementById('response');
	
	
	
	document.getElementById('controls').innerHTML = "";
	document.getElementById('table').innerHTML = "";
	document.getElementById('container_highchart').innerHTML = "";
	document.getElementById('container_highchart3').innerHTML = "";
	document.getElementById('container_highchart2').innerHTML = "";
	document.getElementById('controlsReport').innerHTML = "";
	document.getElementById('controls').innerHTML = "";
	
	divResultado = document.getElementById('response');
	upload_input = document.getElementById('archivo');
	file = upload_input.files[0];
	ajax=objetoAjax();
	//Called file uploap.php for load file cvs
	// ajax.open("POST","../procedures/upload.php"+"?"+new Date().getTime(),true);
	ajax.open("POST","../procedures/upload_xls.php"+"?"+new Date().getTime(),true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			if(ajax.status==200){
				response = ajax.responseText;
				// alert(response);
				divResultado.innerHTML = response;
				
				if(response=="OK"){
					alertify.log("Ya hice lo que tenía que hacer, continuemos...");
				}
				if(response=="ErrorType"){
					alertify.error("Vamos! Si sabes que archivo necesito...");
				}
				if(response=="ErrorSize"){
					alertify.error("El archivo es muy pequeño para procesarlo...");
				}
				}else if(ajax.status==404){
				alertify.log("La direccion AJAX no existe");
			}else{
				alertify.log("Error: ".ajax.status);
			}
		}
	}
	ajax.setRequestHeader("Cache-Control", "no-cache");
	ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
	ajax.setRequestHeader("X-File-Name", file.name);
	ajax.send(file);
}

//MODIFIED
function cancel2(){
	alertify.confirm("¿Esta seguro, se perderan todos los datos..? :( ", function (e) {
	if (e) {
		ajax=objetoAjax();
		//Called file logout.php
		ajax.open("POST","../procedures/logout.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					if(response=="OK"){
						goBack();
					}
					if(response=="ERROR"){ 	
						alertify.error("D'oh! Algo sucedió...");
					}
				}
			}
		}
			ajax.send(null);
		}else{
			refresh();
		}
	});
}

//MODIFIED
function showClienteMinsal(){
	alertify.log("Comprobacion de existencia...");
	divResultado = document.getElementById('response');
	upload_input = document.getElementById('archivo');
	file = upload_input.files[0];
	ajax = objetoAjax();
	ajax.open("POST","../procedures/qryCheckClienteMinsal.php"+"?"+new Date().getTime(),true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			if(ajax.status==200){
				response = ajax.responseText;
				//alert(response);
				    if (response=="10") 
				    {
				    	showControlsRep();
				    	recarga();
				    	recarga2();
				    	recarga3();
				    } 
				    else if (response=="20")
				    {
						showControls();
						recarga();
						recarga2();
						recarga3();
					}else{
                        alertify.error(response);
                        };
			}else if(ajax.status==404){
				alertify.log("La direccion AJAX no existe");
			}else{
				alertify.log("Error: ".ajax.status);
			}
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send(null);
}

//MODIFIED
function showControls(){
	divResultado = document.getElementById('controls');	
	ajax=objetoAjax();
	//Called file showControls.php 
	ajax.open("POST","../procedures/showControls.php"+"?"+new Date().getTime(),true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			if(ajax.status==200){
				response = ajax.responseText;
				divResultado.innerHTML = response;
			}else if(ajax.status==404){
				alertify.log("La direccion AJAX no existe");
			}else{
				alertify.log("Error: ".ajax.status);
			}
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send(null);
}

//MODIFIED
function showControlsRep(){
	divResultado = document.getElementById('controlsReport');	
	ajax=objetoAjax();
	//Called file showControls.php 
	ajax.open("POST","../procedures/showControlsReport.php"+"?"+new Date().getTime(),true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			if(ajax.status==200){
				response = ajax.responseText;
				divResultado.innerHTML = response;
			}else if(ajax.status==404){
				alertify.log("La direccion AJAX no existe");
			}else{
				alertify.log("Error: ".ajax.status);
			}
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send(null);
}

//MODIFIED
function recarga()
{
    var options = {
        chart: {
            renderTo: 'container_highchart',
            type: 'pie',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
        text: 'Total Incoming Outgoing'
        },
        tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  dataLabels: {
                  enabled: false
                    },
                    showInLegend: true
                 }  
            },
            series: [{
                  type: 'pie',
                  name: 'Total',
                  data: []
              }]
          }
        $.getJSON("data.php", function(json) {
          options.series[0].data = json;
          chart = new Highcharts.Chart(options);
          });
    return false;
}  	

//MODIFIED
function recarga2()
{
    var options = {
        chart: {
            renderTo: 'container_highchart2',
            type: 'pie',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Intentos Fallidos / Llamadas Concretadas'
        },
        tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
        },
        series: [{
                  type: 'pie',
                  name: 'Total',
                  data: []
              }]
          }
          $.getJSON("data3.php", function(json) {
          options.series[0].data = json;
          chart = new Highcharts.Chart(options);
          });
    return false;
}  	

//MODIFIED
function recarga3(){

	var options = {
        chart: {
        	renderTo: 'container_highchart3',
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'Porcentaje de Efectividad'
        },
        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
            }, {
                // default background
            }, {
                backgroundColor: '#DDD',
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
            }]
        },
        // the value axis
        yAxis: {
            min: 0,
            max: 100,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: '%'
            },
            plotBands: [{
                from: 0,
                to: 30,
                color: '#55BF3B' // green
            }, {
                from: 30,
                to: 70,
                color: '#DDDF0D' // yellow
            }, {
                from: 70,
                to: 100,
                color: '#DF5353' // red
            }]
        },
        series: [{
            name: 'Efectividad',
            data: [],
            tooltip: {
                valueSuffix: '%'
            }
        }]
    };
    $.getJSON("data4.php", function(json) {
          options.series[0].data = json;
          chart = new Highcharts.Chart(options);
          });
    return false;
}

//MODIFIED
function showCars(){
	alertify.log("Generando reporte...");
	window.open("reportMinsal.php");
}

//MODIFIED
function refresh(){
	location.reload();
}

//MODIFIED
function showReport(){
	alertify.log("Generando reporte...");
	window.open("report.php");
}

function showLog(){
	window.open("../file_storage/cdr_process.log", "_blank", "toolbar=no, location=no, scrollbars=yes, resizable=no, top=200, left=200, width=900, height=400");
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

//MODIFIED
function cancel(){
	alertify.confirm("¿Esta seguro? :( ", function (e) {
	if (e) {
		ajax=objetoAjax();
		//Called file logout.php
		ajax.open("POST","../procedures/logout.php"+"?"+new Date().getTime(),true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				if(ajax.status==200){
					response = ajax.responseText;
					if(response=="OK"){
						goBack();
					}
					if(response=="ERROR"){ 	
						alertify.error("D'oh! Algo sucedió...");
					}
				}
			}
		}
			ajax.send(null);
		}else{
			refresh();
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

function clearDB(){
	divResultado = document.getElementById('response');
	ajax=objetoAjax();
	//Called file clearBD.php
	ajax.open("POST","../procedures/clearDB.php"+"?"+new Date().getTime(),true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==1){
			divResultado.innerHTML = '<img src="../resources/loading.gif">';
		}
		if (ajax.readyState==4) {
			if(ajax.status==200){
				response = ajax.responseText;
				divResultado.innerHTML = response;
			}else if(ajax.status==404){
				divResultado.innerHTML = "La direccion AJAX no existe";
			}else{
				divResultado.innerHTML = "Error: ".ajax.status;
			}
		}
	}
	ajax.send(null);
}