<?php
$nombre = $_POST['nombre']; 
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

// echo $nombre;
// echo "<br>";
// echo $email;
// echo "<br>";
// echo $mensaje;

$from    = "mensajes@rainigen.cl";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From: No-Reply <$from>" . "\r\n";

$to 	 = "info@rainigen.cl";
$subject = "Nuevo mensaje desde la web";
$message = "Se ha recibido un mensaje desde la web con los siguientes datos:\n
Nombre: ".$nombre."\n 
Email: ".$email."\n
Mensaje: ".$mensaje."\n
Favor de tomar contacto a la brevedad.\n \n
El webmaster";


mail($to,$subject,$message,$headers);

echo "OK";

?>