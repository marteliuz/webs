<?php
//@date        : 2014/08/23
//@autor       : Marteliuz


//Star session
session_start();

//require file config.php for connection bd
require('../cnfg/config.php');
//include library lib_functions.php for extrac values
include("lib_functions.php");
//include library lib_log.php for create log
include("lib_log.php");

$username = $_SESSION['username'];

create_log();
log_info("Sesion iniciada como: ".$username);
log_info("Here we go!");

//control of exception
try{
	if (array_key_exists('HTTP_X_FILE_NAME', $_SERVER) && array_key_exists('CONTENT_LENGTH', $_SERVER)) {
		$fileName = $_SERVER['HTTP_X_FILE_NAME'];
		$contentLength = $_SERVER['CONTENT_LENGTH'];
		$fileType = $_SERVER['CONTENT_TYPE'];
		log_info("Subiendo archivo : ".$fileName);
		log_info("Tipo: " .$fileType);
		log_info("Largo: " .$contentLength." KB");
		
	} else throw new Exception("Error retrieving headers");

	$path = $upload_dir;
	
	if ($fileType != "application/vnd.ms-excel" ){
		log_warning("Tipo de archivo no soportado: ".$fileType);
		throw new Exception('ErrorType');
	}
	
	if (!$contentLength > 0) {
		log_warning("Tamaño de archivo invalido: ".$contentLength);
		throw new Exception('ErrorSize');
	}

	file_put_contents(
		$path . $fileName,
		file_get_contents("php://input")
	);
	log_info("Archivo cargado en: ".$path.$fileName);

	chmod($path.$fileName, 0777);
	
	// CLEAR DATA TABLE 
	
	$clearqry = "TRUNCATE ".$db_name.".".$tb_name.";";
	log_info("limpiando tabla con query '".$clearqry."'");
	mysql_query($clearqry);
	log_info("Clear complete!");
	
	// READ AND DEFINE THE VERSION OF CSV FILE
	
	define("CSV_PATH",$path);
	$csv_file = CSV_PATH . $fileName;
	
	$path_parts = pathinfo($csv_file);

	log_info("Abriendo archivo");
	$csvfile = fopen($csv_file, 'r');
	$theData = fgets($csvfile);
	$titles = explode(",", $theData);
	$i = 0;

	// log_info("Archivo de ".count($titles)." campos");
		while (!feof($csvfile)) 
		{
			$csv_data[] = fgets($csvfile);
			$csv_array = explode(",", $csv_data[$i]);
			$largoLinea = count($csv_array);
			$linea = $i + 1;
			
			log_info("linea ".$linea." de ".$largoLinea." campos");
			
			$numero_adq			= str_replace('"','',$csv_array[0]);
			$tipo_adq			= str_replace('"','',$csv_array[1]);
			$nombre_adq			= str_replace('"','',$csv_array[2]);
			$descripcion		= str_replace('"','',$csv_array[3]);
			$organismo			= str_replace('"','',$csv_array[4]);
			$region_compradora	= str_replace('"','',$csv_array[5]);
			$fecha_publicacion	= str_replace('"','',$csv_array[6]);
			$fecha_cierre		= str_replace('"','',$csv_array[7]);
			$descripcion_prod	= str_replace('"','',$csv_array[8]);
			$codigo_onu			= str_replace('"','',$csv_array[9]);
			$unidad_medida		= str_replace('"','',$csv_array[10]);
			$cantidad			= str_replace('"','',$csv_array[11]);
			$generico			= str_replace('"','',$csv_array[12]);
			$nivel1				= str_replace('"','',$csv_array[13]);
			$nivel2				= str_replace('"','',$csv_array[14]);
			$nivel3				= str_replace('"','',$csv_array[15]);
			
			$query = "INSERT INTO dblicitaciones.tbdata(
					numero_adq, tipo_adq, nombre_adq, descripcion, organismo, region_compradora, fecha_publicacion, fecha_cierre, descripcion_prod, codigo_onu, unidad_medida, cantidad, generico, nivel1, nivel2, nivel3) 
					VALUES ('$numero_adq', '$tipo_adq', '$nombre_adq', '$descripcion', '$organismo', '$region_compradora', '$fecha_publicacion', '$fecha_cierre', '$descripcion_prod', '$codigo_onu', '$unidad_medida', '$cantidad', '$generico', '$nivel1', '$nivel2', '$nivel3')";
			$n=mysql_query($query, $conexion );
			$i++;

		}

	//	INSERT DATA IN TBFILE TABLE
	// log_info("Se van a insertar valores en tbfile");
	// $qry = "INSERT INTO dbpolycom.tbfile (fileName, fileType, fileSize, countItems, sessionUser ) VALUES ('$fileName', '$fileType', '$contentLength', '$i', '$username')";
	// $n = mysql_query($qry, $conexion);
	// if($n == 1){
		// log_info("INSERT correcto...");
	// }else{
		// log_warning("INSERT fallido...");
	// }
	
	log_info("Completo! cerrando archivo.");
	fclose($csvfile);
	
	$count = getCountAllItems();
	log_info("Se insertaron: ".$count." registros en tbdata.");
	
	echo "OK";
	
} catch (Exception $e){
    echo $e->getMessage();
	log_error($e->getMessage());
}
?>