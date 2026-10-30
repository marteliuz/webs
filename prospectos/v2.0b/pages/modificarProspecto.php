<?php
include ("config.php");
include ("lib_functions.php");
session_start(); //session start

$id_prospecto = $_GET['id_prospecto'];

$qry    = "SELECT * FROM dbcomercial.tbprospectos WHERE idtbprospectos = $id_prospecto;";
$result = mysql_query($qry);
$Reg    = mysql_fetch_array($result);

// Prospecto
$id_ejecutivo      = $Reg['id_ejecutivo'];
$id_cliente        = $Reg['id_cliente'];
$id_contacto       = $Reg['id_contacto'];
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
$monto             = $Reg['monto'];

$ejecutivo         = getEjecutivoByID($id_ejecutivo);
$nombre_cliente    = getNombreClienteById($id_cliente);

$nombre_contacto   = getNombreContactoById($id_contacto);
$cargo_contacto    = getCargoContactoById($id_contacto);
$correo_contacto   = getCorreoContactoById($id_contacto);
$telefono_contacto = getTelefonoContactoById($id_contacto);

$moneda            = getMonedaById($id_moneda);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TMC Prospectos App</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DatePicker CSS -->
    <link href="../vendor/datepicker/css/datepicker.css" rel="stylesheet">
    
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Prospectos App v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><i class="fa fa-terminal fa-fw"></i> <?php echo $_SESSION['username']; ?></li>
                        <li class="divider"></li>
                        <li><a href="javascript:logout();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="side-user hidden-xs" align="center">
                            <br>       
                            <img class="img-circle" src="<?php echo getIMGByEjecutivo($id_ejecutivo); ?>" alt="">
                            <br><br>
                            <span class="pull-center text-muted small"><strong>Ejecutivo: </strong><?php echo getEjecutivoByID($id_ejecutivo); ?></span>

                        </li>
                        <li selected>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="loadMisClientes.php?id_ejecutivo=<?php echo $id_ejecutivo; ?>"><i class="fa fa-group fa-fw"></i> Mis Clientes </a>
                        </li>
                        <li>
                            <a href="loadMisProspectos.php?id_ejecutivo=<?php echo $id_ejecutivo; ?>"><i class="fa fa-tasks fa-fw"></i> Mis Prospectos</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class='row'>
                <div class='col-lg-12'>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-success'>
                        <div class='panel-heading'>
                             <h3><i class='fa fa-tasks fa-fw'></i> Editar Prospecto <?php echo $nombre_prospecto; ?> </h3>
                             <h5>de <?php echo $nombre_cliente; ?></h5>
                        </div>
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
                            <div class="row">
                                <div class="col-lg-3">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Contacto:</label>
                                            <p class="form-control-static"><?php echo $nombre_contacto; ?></p>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-3">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Cargo: </label>
                                            <p class="form-control-static"><?php echo $cargo_contacto; ?></p>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-3">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Email: </label>
                                            <p class="form-control-static"><a href="mailto:<?php echo $correo_contacto; ?>"><?php echo $correo_contacto; ?></a></p>
                                            <!-- <input class="form-control" id="correo_contacto" value="<?php echo $correo_contacto; ?>"> -->
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="col-lg-3">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Telefono: </label>
                                            <p class="form-control-static"><?php echo $telefono_contacto; ?></p>
                                            <!-- <input class="form-control" id="telefono_contacto" value="<?php echo $telefono_contacto; ?>"> -->
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
                                            <label>Fecha esperada cierre:</label>
                                            <div class='input-group date' >
                                                <input type='text' class="form-control" id="datetimepicker1" value="<?php echo $fecha_esp_cierre; ?>" style="font-size:10px"/>
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>
                                            <!-- <label>Fecha de Cierre: </label>
                                            <input class="form-control" id="fecha_esp_cierre" value="<?php echo $fecha_esp_cierre; ?>"> -->
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
                                            <button type="button" class="btn btn-outline btn-success" onclick="javascript:updateInfoProspecto('<?php echo $id_prospecto; ?>');">Actualizar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- HISTORIAL DE ACTIVIDADES -->
                                <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Historial de Actividades: </label>
                                            <fieldset disabled>
                                                <textarea class="form-control" rows="5" id="historial">
<?php
echo getActivityLog($id_prospecto);


?>
                                                </textarea>
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
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="../vendor/datepicker/js/bootstrap-datepicker.js"></script>

    <script src="../js/lib_ajax.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        $('#datetimepicker1').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
    </script>

</body>

</html>
