<?php
//@date:    : 2016/05/16
//@autor:   : Marteliuz

include ("config.php");
include ("lib_functions.php");

$search = $_POST['search'];

$qry = "SELECT rut, descripcion as cliente, id_ejecutivo as ejecutivo
		FROM dbclientes.tbclientes 
		WHERE rut LIKE '%$search%' OR
			  descripcion LIKE '%$search%';";
			

// echo $qry;
$result 	= mysql_query($qry);
$num_rows 	= mysql_num_rows($result);

// echo $num_rows;

if($num_rows==0){
	echo "No existen coincidencias para mostrar. Intentelo nuevamente.";
}else{
	echo 
	"<table class='table table-hover'>
		<thead>
			<tr>
				<th><strong>RUT Cliente</strong></th>
				<th><strong>Cliente</strong></th>
				<th><strong>Ejecutivo Asignado</strong></th>
			</tr>
		</thead>
		<tbody>";
	while($Reg = mysql_fetch_array($result))
	{
?>
		<tr>
			<td><?php echo $Reg['rut']; ?></td>
			<td><?php echo $Reg['cliente']; ?></td>
			<td><?php echo getEjecutivoByID($Reg['ejecutivo']); ?></td>
		</tr>
<?php
	}
	echo "</tbody></table>";
}
?>