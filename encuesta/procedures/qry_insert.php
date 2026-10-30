<?php
require("../config/config.php");
$id_cliente = $_POST["id_cliente"];
$question1 = $_POST["question1"];
$question2 = $_POST["question2"];
$question3 = $_POST["question3"];
$question4 = $_POST["question4"];
$question5 = $_POST["question5"];
$question6 = $_POST["question6"];


$qry= "INSERT INTO dbencuesta.tbencuesta (id_cliente, question1, question2, question3, question4, question5, question6) 
		VALUES ('$id_cliente', '$question1', '$question2', '$question3', '$question4','$question5','$question6');";

mysql_query($qry);
$var = mysql_affected_rows();
if ($var==1)
{
	mysql_close();
	echo "OK";
}else{
	echo "NO";
}
?>