<?php
//@date:    : 2016/06/01
//@autor:   : Marteliuz

include ("config.php");
include ("lib_functions.php");

try {
	$id_cliente = $_GET['id_cliente'];

	$qry = "SELECT * FROM dbclientes.tbclientes WHERE idtbclientes = '$id_cliente';";
	$result 	= mysql_query($qry);
	$num_rows 	= mysql_num_rows($result);

	if ($num_rows != 0) {
		while($Reg = mysql_fetch_array($result))
		{
			$id_cliente   = $Reg['idtbclientes'];
			$rut 		  = $Reg['rut'];
			$descripcion  = $Reg['descripcion'];
			$id_ejecutivo = $Reg['id_ejecutivo'];
			$activo 	  = $Reg['activo'];
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Modificar al cliente</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Called library lib_ajax.js -->
	<script src="../js/lib_ajax.js"></script>
</head>
<body>
<div class="container">
  	<h2>Modificar clientes</h2>
	<div class="form-group">
		<br>
		<?php
		if ($activo == 0) {
			echo "<label class='radio-inline'><input type='radio' id='optradio' name='optradio' value='1'>Cliente Activo</label>
				  <label class='radio-inline'><input type='radio' id='optradio' checked name='optradio' value='0'>Cliente Inactivo</label>";
		}
		if ($activo == 1) {
			echo "<label class='radio-inline'><input type='radio' id='optradio' checked name='optradio' value='1'>Cliente Activo</label>
				  <label class='radio-inline'><input type='radio' id='optradio' name='optradio' value='0'>Cliente Inactivo</label>";
		}
		?>
		
		<br><br>

	  	<label for="rut">RUT:</label>
	  	<input type="text" class="form-control" id="rut" value="<?php echo $rut; ?> " disabled>

	  	<label for="name">Razon Social:</label>
	  	<input type="text" class="form-control" id="name" value="<?php echo $descripcion; ?>">

	 	<label for="name">Ejecutivo:</label>

	 	<select id="select-ejecutivo" class="form-control">
			<?php
				$qry = "SELECT * FROM dbclientes.tbejecutivos;";
				$result = mysql_query($qry);
				if (mysql_num_rows($result) > 0) {
				    // output data of each row
				    while($row = mysql_fetch_assoc($result)) {
				    	if ($id_ejecutivo == $row['idtbejecutivos']) {
				    		echo "<option selected value='".$row['idtbejecutivos']."'>".$row['descripcion']."</option>";
				    	}else{
				    		echo "<option value='".$row['idtbejecutivos']."'>".$row['descripcion']."</option>";
				    	}
				    }
				} else {
				    echo "<option value=''></option>";
				}
			?>
		</select>
		<br>
	  	<button type="button" class="btn btn-primary" onclick="javascript:updateCliente('<?php echo $id_cliente; ?>');">Actualizar</button>
	</div>
</div>
</body>
</html>
<?php
	} else {
		// ALGO PASO
	}
	
} catch (Exception $e) {
	echo $e;
}
?>