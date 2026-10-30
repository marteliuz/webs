function objetoAjax() {
    xmlhttp=false;
    this.AjaxFailedAlert = "Su navegador no soporta las funciónalidades de este sitio y podria experimentarlo de forma diferente a la que fue pensada. Por favor habilite javascript en su navegador para verlo normalmente.\n";
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

function enviarmsg()
{
    var nombre = document.getElementById("nombre").value;
    // alert(nombre);
    var email = document.getElementById("email").value;
    // alert(email);
    var mensaje = document.getElementById("mensaje").value;
    // alert(mensaje);
    // var divResultado = document.getElementById("divResultado");

    
    if(valida(nombre,3)==true){
        if(validaEmail(email)==true){
            if(valida(mensaje,10)==true){


                ajax=objetoAjax();
                ajax.open("POST","php/lib_mail.php"+"?"+new Date().getTime(),true);
                ajax.onreadystatechange=function() {
                    if (ajax.readyState==1){
                        // divResultado.innerHTML = "<img src='../resources/anim.gif' align='center'> Aguarde por favor...";
                    }
                    if (ajax.readyState==4) {
                        if(ajax.status==200)
                        {
                            response = ajax.responseText;
                            if(response=="OK"){
                                nombre.value = "";
                                email.value = "";
                                mensaje.value = "";
                            }
                        }
                        else if(ajax.status==404)
                        {
                            divResultado.innerHTML = "La direccion AJAX no existe";
                        }else{
                            divResultado.innerHTML = "Error: ".ajax.status;
                        }
                    }
                }
                ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                ajax.send("nombre="+nombre+"&email="+email+"&mensaje="+mensaje);
            }else{
                alert("El campo Nombre es requerido.");
            }
        }else{
            alert("El email debe ser un email valido.");
        }
    }else{
        alert("El campo mensaje debe estar lleno.")
    }    
}


// VALIDACIONES

function valida(string, largo)
{
    string = trim(string);
    if(validaBlanco(string)==true)
    {
        if(validaLargo(string, largo)==true){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function validaBlanco(string)
{
    // Recibe un string y devuleve false si es vacio o blanco, devielve true cumple con la validacion
    if(string==""){return false;}else{return true;}
}

function validaLargo(string, largo)
{
    // Recibe un string y un int que representa el largo, devuelve false si el largo del string no supera int, 
    // devuelve true cumple con la validacion
    if(string.length>=largo){return true;}else{return false;}
}

function trim(myString)
{
    return myString.replace(/^\s+/g,'').replace(/\s+$/g,'')
}

function validaEmail(valor){
    re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/
    if(!re.exec(valor))    {
        return false;
    }else{
        return true;
    }
}

function soloLetras(e)
{
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8,37,39,46];
    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i])
        {
            tecla_especial = true;
            break;
        } 
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}

function soloNumeros(e)
{
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "1234567890 ";
    especiales = [8,37,39,46];
    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i])
        {
            tecla_especial = true;
            break;
        } 
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}