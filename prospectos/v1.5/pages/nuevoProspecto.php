<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz
include ("config.php");
include ("lib_functions.php");

$id_ejecutivo = $_POST['id_ejecutivo'];
$id_cliente   = $_POST['id_cliente'];
$nombre_cliente = getNombreClienteById($id_cliente);

?>
 <div class='row'>
    <div class='col-lg-12'>
        <h1 class='page-header'> <i class='fa fa-tasks fa-fw'></i> Nuevo Prospecto</h1>
        <h3 class='page-header'> Cliente: <?php echo $nombre_cliente; ?></h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                
            </div>
            <!-- /.panel-heading -->
	        <div class='panel-body'>
	        	<div class="row">
                    <div class="col-lg-5">
                        <form role="form">
                            <div class="form-group">
                                <label>Seleccione contacto</label>
                                <select class="form-control" id="contactos">
                                	<?php
                                	$qry    = "SELECT * FROM dbcomercial.tbcontactos WHERE id_cliente = '$id_cliente' AND id_ejecutivo = '$id_ejecutivo'";
                                	// echo "<option>$qry</option>";
                                	$result = mysql_query($qry);
                                	while($Reg = mysql_fetch_array($result))
									{
										$id_contacto     = $Reg['idtbcontactos'];
										$nombre_contacto = $Reg['nombre_contacto'];

										echo "<option value='$id_contacto'>$nombre_contacto</option>";
									}
                                	?>
                                </select>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            <div class="form-group">
                                <label>Nombre Prospecto: </label>
                                <input class="form-control" id="nombre_prospecto">
                            </div>
                            <div class="form-group">
                                <label>Detalle: </label>
                                <textarea class="form-control" rows="4" id="detalle_prospecto"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3">
                    	<form role="form">
                    		<div class="form-group">
                    			<label>Fecha esperada cierre</label>
				                <div class='input-group date' id='datetimepicker1'>
				                    <input type='text' class="form-control" id="fecha_esperada_c"/>
				                    <span class="input-group-addon">
				                        <span class="fa fa-calendar"></span>
				                    </span>
				                </div>
				            </div>				         
				            <div class="form-group">
                    			<label>Posibilidad de cierre: </label>
				                <div class="form-group input-group">
	                                <input type="text" class="form-control" id="porcent_cierre">
	                                <span class="input-group-addon">%</span>
	                            </div>
				            </div>
                    	</form>
                    </div>

                    <div class="col-lg-2">
                    	<form role="form">
                    		<div class="form-group">
                                <label>Cotización: </label>
                                <input class="form-control" id="cotizacion">
                            </div>
                    		
				            <div class="form-group">
                                <label>Monto: </label>
                                <input class="form-control" id="monto">
                            </div>
                    	</form>
                    </div>
                    <div class="col-lg-2">
                    	<form role="form">
                    		<div class="form-group">
                    			<label>Moneda </label>
				                <div class="form-group input-group">
	                                <select class="form-control" id="moneda">
                                	<?php
                                	$qry    = "SELECT * FROM dbcomercial.tbmoneda";
                                	// echo "<option>$qry</option>";
                                	$result = mysql_query($qry);
                                	while($Reg = mysql_fetch_array($result))
									{
										$id_contacto     = $Reg['idtbmoneda'];
										$nombre_contacto = $Reg['descripcion'];

										echo "<option value='$id_contacto'>$nombre_contacto</option>";
									}
                                	?>
                                </select>
	                            </div>
				            </div>
                    	</form>
                    </div>

                    <div class="col-lg-10">
                    	<form role="form">
				            <div class="form-group" align="right">
                                <!-- <label>Botones </label> -->
                                <button type="button" class="btn btn-outline btn-primary" onclick="javascript:limpiar();">Limpiar</button>
                            </div>
                    	</form>
                    </div>
                                        <div class="col-lg-1">
                    	<form role="form">
				            <div class="form-group" align="right">
                                <!-- <label>Botones </label> -->
                                <button type="button" class="btn btn-outline btn-success" onclick="javascript:crearProspecto(<?php echo $id_cliente; ?>, <?php echo $id_ejecutivo; ?>)">Crear</button>
                            </div>
                    	</form>
                    </div>

                </div>
	        </div>
    	</div>
	</div>
</div>