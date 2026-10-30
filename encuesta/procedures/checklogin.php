<?php
//@date        : 2014/08/23
//@autor       : Marteliuz
include("../config/config.php");
try{
	$myusername = $_POST['username']; 
	$mypassword = $_POST['password'];
	$myusername = trim($myusername);
	$mypassword = trim($mypassword);
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	$qry 		= "SELECT * FROM dbencuesta.tbusuarios WHERE username='$myusername' and password='$mypassword' and activo ='1'";
	// echo $qry;
	$result 	= mysql_query($qry);
	$Reg   	 	= mysql_fetch_array($result);
	$count  	= mysql_num_rows($result);
	if($count==1){
		session_start();
		$_SESSION['username'] = $myusername;
		echo "YES";
	}else{
		echo "NO";
	}
}catch(Exception $e){
	echo "Exception :".$e->getMessage();
}
?>