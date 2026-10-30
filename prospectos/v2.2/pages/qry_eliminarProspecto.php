<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz

include ("config.php");
include ("lib_functions.php");

$id_prospecto = $_POST['id_prospecto'];

$qry = "DELETE FROM dbcomercial.tbprospectos WHERE idtbprospectos = $id_prospecto";
if(mysql_query($qry) === true){
	echo "OK";

}else{
	echo "NO";
}
?>