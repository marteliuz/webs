<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz

include ("config.php");
include ("lib_functions.php");

$id_ejecutivo = $_POST['id_ejecutivo'];

$qry = "SELECT * FROM dbcomercial.tbclientes WHERE id_ejecutivo = $id_ejecutivo AND activo = 1";
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
<div class='btn-group'>
  <button class='btn btn-secondary btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    Small button
  </button>
  <div class='dropdown-menu'>
    <a class='dropdown-item' href='#'>Action</a>
    <a class='dropdown-item' href='#'>Another action</a>
    <a class='dropdown-item' href='#'>Something else here</a>
    <div class='dropdown-divider'></div>
    <a class='dropdown-item' href='#'>Separated link</a>
  </div>
</div>



			</td>
		</tr>
<?php
	}
	echo "</tbody></table>";
}
?>