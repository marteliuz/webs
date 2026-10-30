<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz

include ("config.php");
include ("lib_functions.php");

$id_ejecutivo = $_POST['id_ejecutivo'];

$qry = "SELECT * FROM dbcomercial.tbprospectos WHERE id_ejecutivo = $id_ejecutivo";
$result 	= mysql_query($qry);
$num_rows 	= mysql_num_rows($result);

// echo $num_rows;

if($num_rows==0){
	echo "Aún no tiene prospectos...";
}else{
	echo 
	"<table class='table table-hover'>
		<thead>
			<tr>
				<th><strong>RUT Cliente</strong></th>
				<th><strong>Cliente</strong></th>
				<th><strong>Contactos</strong></th>
				<th><strong>Prospectos</strong></th>
				<th><strong></strong></th>
			</tr>
		</thead>
		<tbody>";
	while($Reg = mysql_fetch_array($result))
	{
		$countContactos  = getQtyContactosByCliente($Reg['idtbclientes']);
		$countProspectos = getQtyProspectosByCliente($Reg['idtbclientes']);
?>
		<tr>
			<td><?php echo $Reg['rut_cliente']; ?></td>
			<td><?php echo $Reg['descripcion']; ?></td>
			<td><?php echo $countContactos; ?></td>
			<td><?php echo $countProspectos; ?></td>
			<td>
				<div class='dropdown'>
				  	<button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Opciones
				  	<span class='caret'></span></button>
				  	<ul class='dropdown-menu'>
				    	<li><a href='#'>Agregar Contacto</a></li>
				    <?php
					    if($countContactos == 0){
					    	echo "<li class='disabled'><a href='#'>Agregar Prospectos</a></li>";
					    }else{
					    	echo "<li><a href='#'>Agregar Prospectos</a></li>";
					    }
				    ?>
				  	</ul>
				</div>
			</td>
		</tr>
<?php
	}
	echo "</tbody></table>";
}
?>