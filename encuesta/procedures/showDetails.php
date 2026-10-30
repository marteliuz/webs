<?php
require("../config/config.php");

$id_cliente = $_POST['id_cliente'];

function getNameByID($id_cliente){
	$qry = "SELECT descripcion FROM dbencuesta.tbclientes WHERE idtbclientes = $id_cliente";
	$result = mysql_query($qry);
	while($row = mysql_fetch_assoc($result)) {
		return $row['descripcion'];
	}
}


$qry = "SELECT * FROM dbencuesta.tbencuesta WHERE id_cliente = $id_cliente ORDER BY fecha ASC";
$result = mysql_query($qry);
if (mysql_num_rows($result) > 0) {
	
	echo "<br>";
    echo "<label>DETALLES de ".getNameByID($id_cliente)."</label>";

    while($row = mysql_fetch_assoc($result)) {
    	$fecha = $row['fecha'];
    	$q1    = $row['question1'];
    	$q2    = $row['question2'];
    	$q3    = $row['question3'];
    	$q4    = $row['question4'];
    	$q5    = $row['question5'];
    	$q6    = $row['question6'];
    	$comm  = $row['comments'];
?>
		<div class="row">
			<form class="form-horizontal" role="form">
			  	<div class="form-group">
			    	<label class="control-label col-xs-2" for="fecha">Fecha:</label>
			    	<div class="col-xs-3">
			      		<input type="text" class="form-control" id="fecha" disabled value="<?php echo $fecha; ?>">
			    	</div>
			    </div>
			    <div class="form-group">
			    	<label class="control-label col-xs-2" for="q1">Respuesta 1:</label>
			    	<div class="col-xs-1"> 
			      		<input type="text" class="form-control" id="q1" disabled value="<?php echo $q1; ?>">
			    	</div>
			    </div>
			    <div class="form-group">
			    	<label class="control-label col-xs-2" for="q2">Respuesta 2:</label>
			    	<div class="col-xs-1"> 
			      		<input type="text" class="form-control" id="q2" disabled value="<?php echo $q2; ?>">
			    	</div>
			    </div>
			    <div class="form-group">
			    	<label class="control-label col-xs-2" for="q3">Respuesta 3:</label>
			    	<div class="col-xs-1"> 
			      		<input type="text" class="form-control" id="q3" disabled value="<?php echo $q3; ?>">
			    	</div>
			    </div>

				<div class="form-group">
			    	<label class="control-label col-xs-2" for="q4">Respuesta 4:</label>
			    	<div class="col-xs-1"> 
			      		<input type="text" class="form-control" id="q4" disabled value="<?php echo $q4; ?>">
			    	</div>
			    </div>
			    <div class="form-group">
			    	<label class="control-label col-xs-2" for="q5">Respuesta 5:</label>
			    	<div class="col-xs-1"> 
			      		<input type="text" class="form-control" id="q5" disabled value="<?php echo $q5; ?>">
			    	</div>
			    </div>
			    <div class="form-group">
			    	<label class="control-label col-xs-2" for="q6">Respuesta 6:</label>
			    	<div class="col-xs-1"> 
			      		<input type="text" class="form-control" id="q6" disabled value="<?php echo $q6; ?>">
			    	</div>
			    </div>

			</form>
		</div>

<?php
    }
}else{
	echo "Wow!! esto no deberia haber sucedido.";
}

?>