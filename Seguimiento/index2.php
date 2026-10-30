<?php @session_start();

if($_SESSION["autentica"] != "SIP"){

header("Location: index.php");
exit();}else { 
    //sino, calculamos el tiempo transcurrido 
    $fechaGuardada = $_SESSION["ultimoAcceso"]; 
    $ahora = date("Y-n-j H:i:s"); 
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

    //comparamos el tiempo transcurrido 
     if($tiempo_transcurrido >= 300) { 
     //si pasaron 10 minutos o más 
      session_destroy(); // destruyo la sesión 
      header("Location: index.php"); //envío al usuario a la pag. de autenticación 
      //sino, actualizo la fecha de la sesión 
    }else { 
    $_SESSION["ultimoAcceso"] = $ahora; 
   } 
} 

 ?><head>
<meta content="300" http-equiv="REFRESH"> </meta>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index</title>
<script type="text/javascript" language='javascript' src="fun_seg.js"></script>
<script type="text/javascript">
       window.onbeforeunload = function Aviso(){
            return "Está saliendo de la página o han caducado sus 5 minutos";
           header("Location: logout.php");
		  
        }
</script>
<script> 
miFecha = new Date() 
document.write(miFecha.getHours() + ":" + miFecha.getMinutes() + ":" + miFecha.getSeconds()) 
</script>
<STYLE> 
A.clase1:link {font-size: 15px;} 
</STYLE> 
<style media="print" type="text/css">
#oculto {
visibility:hidden
}
</style>


 
<style type="text/css">
*{
    font-size: 17px;
}
form.login {
    background: none repeat scroll 0 0 #F1F1F1;
    border: 1px solid #DDDDDD;
    font-family: sans-serif;
    margin: 0 auto;
    padding: 20px;
    width: 278px;
}
form.login div {
    margin-bottom: 30px;
    overflow: hidden;
}
form.login div label {
    display: block;
    float: left;
    line-height: 25px;
}
form.login div input[type="text"], form.login div input[type="password"] {
    border: 1px solid #DCDCDC;
    float: right;
    padding: 4px;
}
form.login div input[type="submit"] {
    background: none repeat scroll 0 0 #DEDEDE;
    border: 1px solid #C6C6C6;
    float: right;
    font-weight: bold;
    padding: 4px 20px;
}
.error{
    color: red;
    font-weight: bold;
    margin: 10px;
    text-align: center;
}
#letra {

position:absolute;
right: 360px;
left: 550px;
top: 630px;
font-size:10px
}
</style>
</head>
<div style="float: right"><a  id="cerrar" href="logout.php"><img src="cerrar sesion.jpg" width="100" height="30" alt="cerrar sesion" longdesc="cerrar sesion.jpg" /></img></a></div>
<br><br><br>
<body onUnload="Aviso" bgcolor="#010404" text="#FFFFFF" link="#33FFFF" alink="#FFFFFF" vlink="#33FFFF">

</body>

       <div align="center" style=" font-size: 40px; line-height: normal;"><img src="t negro.jpg" alt="tm" height="220" width="230" /></div>
       <p align="center" style="font-size: 40px; line-height: normal;">Área Comerciales</p><p id="letra">©Touch Media Consulting Ltda. Todos los Derechos Reservados</p>
         <form>
        <table align="center" width="225" cellspacing="2" cellpadding="2" border="0"> 
<tr> 
<td align="Center"><input name="cotizacion" type="button" id="cotizacion" value="Ingresar Cotización" onclick = "window.open('cotizacion.php', 'Cotización','status = 1, height = 520, width = 720, scrollbars=1, resizable = 0' )"/></td> 
</tr> 
<tr> 
<td align="center"><input name="orden_compra" type="button" id="orden_compra" value="Ingresar Orden de Compra" onclick = "window.open('orden_compra.php', 'Orden de Compra','status = 1, height = 380, width = 880, scrollbars=1, resizable = 0' )"/></td> 
</tr> 
<td align="center"> <input name="seguimiento" type="button" id="seguimiento" value="Seguimiento de Venta" onclick = "location='seguimiento.php'"/></td> 
</tr> 
</table>
</form>