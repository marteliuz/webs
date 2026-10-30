<?php
include ("config.php");
include ("lib_functions.php");

$id_ejecutivo = $_POST['id_ejecutivo'];
$id_cliente = $_POST['id_cliente'];

$nombre_cliente = getNombreClienteById($id_cliente);


$qry = "SELECT * FROM dbcomercial.tbcontactos WHERE id_ejecutivo = $id_ejecutivo AND id_cliente = $id_cliente AND activo = 1";
$result 	= mysql_query($qry);
$num_rows 	= mysql_num_rows($result);

// echo $qry;
echo "<div class='row'>
        <div class='col-lg-12'>
            <h1 class='page-header'> <i class='fa fa-user fa-fw'></i> Contactos</h1>
            <h3 class='page-header'> Cliente: $nombre_cliente </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>";

if($num_rows==0){
echo "<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    No hay contactos.
                </div>
            </div>
        </div>";

}else{

echo "<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    Mostrando contactos activos.
                </div>
                <!-- /.panel-heading -->
                <div class='panel-body'>
                    <table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
                        <thead>
                            <tr>
                                <th><i class='fa fa-user fa-fw'></i> Nombre</th>
                                <th><i class='fa fa-briefcase fa-fw'></i> Cargo</th>
                                <th><i class='fa fa-envelope-o fa-fw'></i> Correo</th>
                                <th><i class='fa fa-phone fa-fw'></i> Telefono</th>
                            </tr>
                        </thead>
                        <tbody>";


	while($Reg = mysql_fetch_array($result))
	{
?>
		<tr>
			<td><?php echo $Reg['nombre_contacto']; ?></td>
			<td><?php echo $Reg['cargo_contacto']; ?></td>
			<td><?php echo $Reg['correo_contacto']; ?></td>
			<td><?php echo $Reg['telefono_contacto']; ?></td>
		</tr>
<?php
	}
	echo "</tbody></table>";
}
echo "</div></div>";

echo "<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    Agregar Uno Nuevo.
                </div>
                <!-- /.panel-heading -->
                <div class='panel-body'>
                    <table width='80%' class='table table-striped table-bordered ' id='dataTables-example'>
                        <thead>
                            <tr>
                                <th><i class='fa fa-user fa-fw'></i> <input type='text' class='form-control' id='input_nombre_contacto' placeholder='Nombre'> </th>
                                <th><i class='fa fa-briefcase fa-fw'></i> <input type='text' class='form-control' id='input_cargo_contacto' placeholder='Cargo'> </th>
                                <th><i class='fa fa-envelope-o fa-fw'></i> <input type='text' class='form-control' id='input_correo_contacto' placeholder='Correo'> </th>
                                <th><i class='fa fa-phone fa-fw'></i> <input type='text' class='form-control' id='input_telefono_contacto' placeholder='Telefono'> </th>
                            </tr>
                        </thead>
                        <tbody>
							<tr>
								<td colspan='4' align='right'> <button type='button' class='btn btn-success' onclick='javascript:agregaContacto($id_cliente, $id_ejecutivo)'>Agregar</button></td>
							</tr>
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>";

?>