<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz

include ("config.php");
include ("lib_functions.php");

$id_ejecutivo = $_POST['id_ejecutivo'];
// $id_ejecutivo = "990";

$qry = "SELECT * FROM dbcomercial.tbclientes WHERE id_ejecutivo = $id_ejecutivo AND activo = 1";
$result 	= mysql_query($qry);
$num_rows 	= mysql_num_rows($result);

// echo $num_rows;
echo "          <div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'> <i class='fa fa-group fa-fw'></i> Mis Clientes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>";

if($num_rows==0){
echo "<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-info'>
                <div class='panel-heading'>
                    No tiene clientes asignados aún.
                </div>";

}else{

echo "<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-info'>
                <div class='panel-heading'>
                    Mostrando mis clientes asignados y activos.
                </div>
                <!-- /.panel-heading -->
                <div class='panel-body'>
                    <table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
                        <thead>
                            <tr>
                                <th>RUT Cliente</th>
                                <th>Cliente</th>
                                <th><i class='fa fa-user fa-fw' title='Contactos'></i></th>
                                <th><i class='fa fa-tasks fa-fw' title='Prospectos'></i></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>";


	while($Reg = mysql_fetch_array($result))
	{
		$countContactos  = getQtyContactosByCliente($Reg['idtbclientes']);
		$countProspectos = getQtyProspectosByCliente($Reg['idtbclientes']);
		$id_cliente      = $Reg['idtbclientes'];
?>
		<tr>
			<td><?php echo $Reg['rut_cliente']; ?></td>
			<td><?php echo $Reg['descripcion']; ?></td>
			<td><?php echo $countContactos; ?></td>
			<td><?php echo $countProspectos; ?></td>
			<td>
				<div class="pull-right">
				    <div class="btn-group">
				        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
				            <i class='fa fa-pencil fa-fw'></i>
				            <span class="caret"></span>
				        </button>
				        <ul class="dropdown-menu pull-right" role="menu">
				            <li class="disabled"><a href="#">Modificar Cliente</a></li>
				            <li><a href="javascript:contactos(<?php echo $id_cliente; ?>, <?php echo $id_ejecutivo; ?>);">Agregar Contacto</a></li>
				            <?php
				            if ($countContactos==0) {
				            	echo "<li class='disabled'><a href='#''>Agregar Prospecto</a></li>";
				            } else {

				            	echo "<li><a href='javascript:nuevoProspecto($id_cliente, $id_ejecutivo)'>Agregar Prospecto</a></li>";
				            }				            
				            ?>
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