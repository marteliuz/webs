<?php
include("config.php");

try{
	//Extrac value and save in variable php
	$myusername = $_POST['username']; 
	$mypassword = $_POST['password'];
	$myusername = trim($myusername);
	$mypassword = trim($mypassword);
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	//Exec query sql and save value in variable php		
	$qry 		= "SELECT * FROM dbcomercial.tbusuarios WHERE username='$myusername' and password='$mypassword' and activo ='1'";
	$result 	= mysql_query($qry);
	$Reg   	 	= mysql_fetch_array($result);
	$count  	= mysql_num_rows($result);

	// echo $Reg['perfil'];

	if($count==1){
		session_start();
		if ($Reg['perfil']==1) {
			$_SESSION['username']     = $myusername;
			$_SESSION['id_ejecutivo'] = $Reg['id_ejecutivo'];
			echo "YES";
		}
		if ($Reg['perfil']==2) {
			$_SESSION['username']     = $myusername;
			echo "ADMIN";
		}
	}else{
		echo "NO";
	}
}catch(Exception $e){
	echo "Exception :".$e->getMessage();
}
?>