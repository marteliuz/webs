<?php
require("../config/config.php");
session_start();
if(isset($_SESSION['username'])){
	$qry= "TRUNCATE dbencuesta.tbencuesta;";

	mysql_query($qry);
	mysql_close();
	echo "OK";
}else{
	echo "Debe iniciar sesion para ejecutar este script.";
}
?>