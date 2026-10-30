<?php
//@date        : 2014/08/23
//@autor       : Marteliuz
session_start();

// For XLS Read
require_once 'Excel/reader.php';
//require file config.php for connection bd
require('../cnfg/config.php');
//include library lib_functions.php for extrac values
include("lib_functions.php");
//include library lib_log.php for create log
include("lib_log.php");

// $username = $_SESSION['username'];

create_log();
// log_info("Sesion iniciada como: ".$username);
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
	log_info("limpiando tabla temporal con query '".$clearqry."'");
	mysql_query($clearqry);
	
	// ExcelFile($filename, $encoding);
	$data = new Spreadsheet_Excel_Reader();

	// Set output Encoding.
	$data->setOutputEncoding('CP1251');
	
	// READ AND DEFINE THE VERSION OF CSV FILE
	
	define("CSV_PATH",$path);
	$csv_file = CSV_PATH . $fileName;
	
	$path_parts = pathinfo($csv_file);

	log_info("comenzando a leer el archivo");
	
	// READ XLS
	$data->read($csv_file);
	
	error_reporting(E_ALL ^ E_NOTICE);

	// for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
		// for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
	for ($i = 9; $i <= $data->sheets[0]['numRows']; $i++) {
		
		$numero_adq			= $data->sheets[0]['cells'][$i][2];
		$tipo_adq			= $data->sheets[0]['cells'][$i][3];
		$nombre_adq			= $data->sheets[0]['cells'][$i][5];
		$descripcion		= $data->sheets[0]['cells'][$i][6];
		$organismo			= $data->sheets[0]['cells'][$i][7];
		$region_compradora	= $data->sheets[0]['cells'][$i][8];

		// $fecha_publicacion	= $data->sheets[0]['cells'][$i][10];
		// $fecha_cierre		= $data->sheets[0]['cells'][$i][11];
		
		$descripcion_prod	= $data->sheets[0]['cells'][$i][12];
		$codigo_onu			= $data->sheets[0]['cells'][$i][13];
		$unidad_medida		= $data->sheets[0]['cells'][$i][14];
		$cantidad			= $data->sheets[0]['cells'][$i][15];
		$generico			= $data->sheets[0]['cells'][$i][16];
		$nivel1				= $data->sheets[0]['cells'][$i][17];
		$nivel2				= $data->sheets[0]['cells'][$i][18];
		$nivel3				= $data->sheets[0]['cells'][$i][19];

		$query = "INSERT INTO dblicitaciones.tbdata(
				numero_adq, tipo_adq, nombre_adq, descripcion, organismo, region_compradora, fecha_publicacion, fecha_cierre, descripcion_prod, codigo_onu, unidad_medida, cantidad, generico, nivel1, nivel2, nivel3) 
				VALUES ('$numero_adq', '$tipo_adq', '$nombre_adq', '$descripcion', '$organismo', '$region_compradora', '$fecha_publicacion', '$fecha_cierre', '$descripcion_prod', '$codigo_onu', '$unidad_medida', '$cantidad', '$generico', '$nivel1', '$nivel2', '$nivel3')";
		$n=mysql_query($query, $conexion );
	}
	echo "OK";
	
} catch (Exception $e){
    echo $e->getMessage();
	log_error($e->getMessage());
}
?>