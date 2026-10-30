<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz
include ("config.php");
include ("lib_functions.php");

$id_prospecto = $_POST['id_prospecto'];

$qry    = "SELECT * FROM dbcomercial.tbprospectos WHERE idtbprospectos = $id_prospecto;";
$result = mysql_query($qry);
$Reg    = mysql_fetch_array($result);

// Prospecto
$id_ejecutivo 	   = $Reg['id_ejecutivo'];
$id_cliente   	   = $Reg['id_cliente'];
$id_contacto	   = $Reg['id_contacto'];
$nombre_prospecto  = $Reg['nombre_prospecto'];
$detalle_prospecto = $Reg['descripcion'];
$fecha_creacion    = $Reg['fecha_creacion'];
$porcent_cierre    = $Reg['porcent_cierre'];
$fecha_esp_cierre  = $Reg['fecha_esp_cierre'];
if ($fecha_esp_cierre == "" || $fecha_esp_cierre == null) {
    $fecha_esp_cierre  = " --- ";
} else {
   $fecha_esp_cierre  = date('d-m-Y', strtotime($fecha_esp_cierre));
}

$estado            = $Reg['estado'];
$cotizacion        = $Reg['cotizacion'];
$id_moneda         = $Reg['id_moneda'];
$monto 			   = $Reg['monto'];

$ejecutivo         = getEjecutivoByID($id_ejecutivo);
$nombre_cliente    = getNombreClienteById($id_cliente);

$nombre_contacto   = getNombreContactoById($id_contacto);
$cargo_contacto	   = getCargoContactoById($id_contacto);
$correo_contacto   = getCorreoContactoById($id_contacto);
$telefono_contacto = getTelefonoContactoById($id_contacto);

$moneda            = getMonedaById($id_moneda);


?>
 <div class='row'>
    <div class='col-lg-12'>
        <h1 class='page-header'> <i class='fa fa-tasks fa-fw'></i> Modificar Prospecto</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-success'>
            <div class='panel-heading'>
                <?php echo $nombre_prospecto." - ".$nombre_cliente; ?>
            </div>
            <!-- /.panel-heading -->
	        <div class='panel-body'>
	        	<div class="row">
                    <div class="col-lg-3">
                        <form role="form">
                            <div class="form-group">
                                <label>Nombre Contacto: </label>
                                <input class="form-control" id="nombre_contacto" value="<?php echo $nombre_contacto; ?>">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3">
                    	<form role="form">
                    		<div class="form-group">
                                <label>Cargo: </label>
                                <input class="form-control" id="cargo_contacto" value="<?php echo $cargo_contacto; ?>">
                            </div>
                    	</form>
                    </div>

                    <div class="col-lg-3">
                    	<form role="form">
                    		<div class="form-group">
                                <label>Email: </label>
                                <input class="form-control" id="correo_contacto" value="<?php echo $correo_contacto; ?>">
                            </div>
                    		
                    	</form>
                    </div>
                    <div class="col-lg-3">
                    	<form role="form">
                    		<div class="form-group">
                                <label>Telefono: </label>
                                <input class="form-control" id="telefono_contacto" value="<?php echo $telefono_contacto; ?>">
                            </div>
                    	</form>
                    </div>

                    <div class="col-lg-6">
                    	<form role="form">
                    		<div class="form-group">
							    <label>Detalle Prospecto: </label>
							    <textarea class="form-control" rows="4" id="detalle_prospecto"><?php echo $detalle_prospecto; ?></textarea>
							</div>
                    	</form>
                    </div>

                    <div class="col-lg-2">
                    	<form role="form">
                    		<div class="form-group">
                                <label>Fecha de Cierre: </label>
                                <input class="form-control" id="fecha_esp_cierre" value="<?php echo $fecha_esp_cierre; ?>">
                            </div>
                    	</form>
                    </div>
                    <div class="col-lg-2">
                    	<form role="form">
                    		<div class="form-group">
                                <label>% Cierre: </label>
                                <input class="form-control" id="porcent_cierre" value="<?php echo $porcent_cierre; ?>">
                            </div>
                    	</form>
                    </div>
                    <div class="col-lg-2">
                    	<form role="form">
                    		<div class="form-group">
                                <label>Cotización: </label>
                                <input class="form-control" id="cotizacion" value="<?php echo $cotizacion; ?>">
                            </div>
                            <div class="form-group">
                                <label>Monto (<?php echo $moneda; ?>): </label>
                                <input class="form-control" id="monto" value="<?php echo $monto; ?>">
                            </div>
                    	</form>
                    </div>

					<!-- BOTONES PROSPECTOS -->
                    <div class="col-lg-12">
                    	<form role="form">
				            <div class="form-group" align="right">
                                <!-- <label>Botones </label> -->
                                <!-- <button type="button" class="btn btn-outline btn-success" onclick="">Actualizar</button> -->
                            </div>
                    	</form>
                    </div>
					<!-- HISTORIAL DE ACTIVIDADES -->
                    <div class="col-lg-12">
                    	<form role="form">
                    		<div class="form-group">
							    <label>Historial de Actividades: </label>
							    <fieldset disabled>
							    	<textarea class="form-control" rows="5" id="historial">Sin actividad aún.</textarea>
							    </fieldset>
							</div>
                    	</form>
                    </div>

					<!-- NUEVA ACTIVIDAD -->
					<div class="col-lg-3">
                    	<form role="form">
				            <div class="form-group">
                                <label>Acción: </label>
                                <select class="form-control" id="accion">
                                	<?php
                                	$qry    = "SELECT * FROM dbcomercial.tbtipoaccion";
                                	// echo "<option>$qry</option>";
                                	$result = mysql_query($qry);
                                	while($Reg = mysql_fetch_array($result))
									{
										$id_accion   = $Reg['idtbtipoaccion'];
										$tipo_accion = $Reg['descripcion'];

										echo "<option value='$id_accion'>$tipo_accion</option>";
									}
                                	?>
                                </select>
                            </div>
                    	</form>
                    </div>
                    <div class="col-lg-3">
                    	<form role="form">
				            <div class="form-group">
                                <label>Objetivo: </label>
                                    <select class="form-control" id="objetivo">
                                	<?php
                                	$qry    = "SELECT * FROM dbcomercial.tbojetivos";
                                	// echo "<option>$qry</option>";
                                	$result = mysql_query($qry);
                                	while($Reg = mysql_fetch_array($result))
									{
										$id_objetivo = $Reg['idtbojetivos'];
										$objetivo    = $Reg['descripcion'];

										echo "<option value='$id_objetivo'>$objetivo</option>";
									}
                                	?>
                                </select>
                            </div>
                    	</form>
                    </div>
                    <div class="col-lg-6">
                    	<form role="form">
				            <div class="form-group">
                                <label>Observaciones: </label>
                                <textarea class="form-control" rows="3" id="observaciones"></textarea>
                            </div>
                    	</form>
                    </div>

                    <div class="col-lg-12">
                    	<form role="form">
				            <div class="form-group" align="right">
                                <!-- <label>Botones </label> -->
                                <button type="button" class="btn btn-outline btn-success" onclick="javascript:guardarActividad('<?php echo $id_prospecto;?>')">Guardar</button>
                            </div>
                    	</form>
                    </div>

                </div>
	        </div>
    	</div>
	</div>
</div>