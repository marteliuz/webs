<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz

include ("config.php");
include ("lib_functions.php");

$id_ejecutivo = $_POST['id_ejecutivo'];
// $id_ejecutivo = "99";

$qry = "SELECT * FROM dbcomercial.tbprospectos WHERE id_ejecutivo = $id_ejecutivo";
$result 	= mysql_query($qry);
$num_rows 	= mysql_num_rows($result);

// echo $num_rows;
echo "<div class='row'>
      	<div class='col-lg-12'>
            <h1 class='page-header'> <i class='fa fa-tasks fa-fw'></i> Mis Prospectos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>";

if($num_rows==0){
echo "<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-success'>
                <div class='panel-heading'>
                    No tiene prospectos comerciales.
                </div>";
}else{
	echo 
	"<table class='table table-hover'>
		<thead>
			<tr>
				<th><strong>Cliente</strong></th>
				<th><strong>Prospecto</strong></th>
				<th><strong>Fecha creación</strong></th>
				<th><strong>Ultima actividad</strong></th>
				<th></th>
			</tr>
		</thead>
		<tbody>";
	while($Reg = mysql_fetch_array($result))
	{
		// $countContactos  = getQtyContactosByCliente($Reg['idtbclientes']);
		// $countProspectos = getQtyProspectosByCliente($Reg['idtbclientes']);
		$id_cliente     = $Reg['id_cliente'];
		$nombre_cliente = getNombreClienteById($id_cliente);
		$fecha_creacion = strtotime($Reg['fecha_creacion']);
		$fecha_creacion = date('d-m-y H:i', $fecha_creacion);
		$fecha_last_activ = $Reg['fecha_last_activ'];
		if ($fecha_last_activ=="") {
			$fecha_last_activ = "---";
		}
		
?>
		<tr>
			<td><?php echo $nombre_cliente; ?></td>
			<td><?php echo $Reg['nombre_prospecto']; ?></td>
			<td><?php echo $fecha_creacion; ?></td>
			<td><?php echo $fecha_last_activ; ?></td>
			<td>
				<div class="pull-right">
				    <div class="btn-group">
				        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
				            <i class='fa fa-pencil fa-fw'></i>
				            <span class="caret"></span>
				        </button>
				        <ul class="dropdown-menu pull-right" role="menu">
				            <li><a href='javascript:modificarProspecto(<?php echo $Reg['idtbprospectos']; ?>)'><i class='fa fa-edit fa-fw'></i> Modificar</a></li>
				            <li class="divider"></li>
				           	<li><a href='javascript:eliminarProspecto(<?php echo $Reg['idtbprospectos']; ?>, <?php echo $id_ejecutivo; ?>)'><i class='fa fa-trash-o fa-fw'></i> Eliminar</a></li>
				        </ul>
				    </div>
				</div>
			</td>
		</tr>
<?php
	}
	echo "</tbody></table>";
}
?>