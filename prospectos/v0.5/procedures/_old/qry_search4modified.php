<?php
//@date:    : 2016/05/16
//@autor:   : Marteliuz

include ("config.php");
include ("lib_functions.php");

try {
	if (isset($_POST['search'])) {
		// BUSQUEDA POR NOMBRE O RUT
		$search = $_POST['search'];
		$qry = "SELECT idtbclientes, rut, descripcion as cliente, id_ejecutivo as ejecutivo
				FROM dbclientes.tbclientes 
				WHERE rut LIKE '%$search%' OR
					  descripcion LIKE '%$search%';";
		$result 	= mysql_query($qry);
		$num_rows 	= mysql_num_rows($result);

		if($num_rows==0){
			echo "No existen coincidencias para mostrar.";
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
				<tr ondblclick="javascript:modifica(<?php echo $Reg['idtbclientes']?>);">
					<td><?php echo $Reg['rut']; ?></td>
					<td><?php echo $Reg['cliente']; ?></td>
					<td><?php echo getEjecutivoByID($Reg['ejecutivo']); ?></td>
				</tr>
		<?php
			}
			echo "</tbody></table>";
		}		
	}else{
		if (isset($_POST['id_ejecutivo'])) {
			// BUSQUEDA POR EJECUTIVO
			$id_ejecutivo = $_POST['id_ejecutivo'];
			$qry = "SELECT idtbclientes, rut, descripcion as cliente, id_ejecutivo as ejecutivo
				FROM dbclientes.tbclientes 
				WHERE id_ejecutivo = '$id_ejecutivo';";
			$result 	= mysql_query($qry);
			$num_rows 	= mysql_num_rows($result);

			if($num_rows==0){
				echo "No existen coincidencias para mostrar.";
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
					<tr ondblclick="javascript:modifica(<?php echo $Reg['idtbclientes']?>);">
						<td><?php echo $Reg['rut']; ?></td>
						<td><?php echo $Reg['cliente']; ?></td>
						<td><?php echo getEjecutivoByID($Reg['ejecutivo']); ?></td>
					</tr>
			<?php
				}
				echo "</tbody></table>";
			}		
		}else{
			// ERROR - ALGO PASO
			echo "Falla en el motor de busqueda";
		}
	}
} catch (Exception $e) {
	echo "Error: ".$e;	
}
?>