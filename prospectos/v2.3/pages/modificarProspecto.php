<?php
include ("config.php");
include ("lib_functions.php");
session_start(); //session start
header("Cache-Control: no-store, no-cache, must-revalidate");
if(isset($_SESSION['username']) && isset($_POST['id_prospecto']))
{
    $username     = $_SESSION['username'];
    $id_prospecto = $_POST['id_prospecto'];

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
    <link href='../resources/tmc.ico' rel='shortcut icon' type='image/x-icon'>

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
    <!-- Sweet Alert Styles -->
    <link href="../css/sweetalert.css" rel="stylesheet">

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
                </button>
                <a class="navbar-brand" href="#">Prospectos App v<?= getAppVersion(); ?></a>
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
                                    Nada que ver por aqui.
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
                        <li><i class="fa fa-terminal fa-fw"></i> <?= $username; ?></li>
                        <li class="divider"></li>
                        <li><a href="javascript:logout();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="side-user hidden-xs" align="center">
                            <br>       
                            <img class="img-circle" src="<?= getIMGByEjecutivo($id_ejecutivo); ?>" alt="">
                            <br><br>
                            <span class="pull-center text-muted small"><strong>Ejecutivo: </strong><?= $ejecutivo; ?></span>

                        </li>
                        <!-- </li> -->
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <form id="loadMisClientes" method="post" action="loadMisClientes.php">
                                <input type='hidden' name='id_ejecutivo' value="<?php echo $id_ejecutivo; ?>"/>
                            </form>
                            <a href="javascript:loadMisClientes()"><i class="fa fa-group fa-fw"></i> Mis Clientes </a>
                        </li>                        
                        <li >
                            <form id="loadMisProspectos" method="post" action="loadMisProspectos.php">
                                <input type='hidden' name='id_ejecutivo' value="<?php echo $id_ejecutivo; ?>"/>
                            </form>
                            <a href="javascript:loadMisProspectos()"><i class="fa fa-tasks fa-fw"></i> Mis Prospectos</a>
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
                                            <label style="font-size:13px">contacto:</label>
                                            <strong><p class="form-control-static"><i class="fa fa-user fa-fw"></i> <?php echo $nombre_contacto; ?></p></strong>
                                            <p class="form-control-static" style="font-size:13px"><i class="fa fa-puzzle-piece fa-fw"></i> <?php echo $cargo_contacto; ?></p>
                                            <p class="form-control-static" style="font-size:13px"><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:<?php echo $correo_contacto; ?>"><?php echo $correo_contacto; ?></a></p>
                                            <p class="form-control-static" style="font-size:13px"><i class="fa fa-phone fa-fw"></i> <?php echo $telefono_contacto; ?></p>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-5">
                                    <form role="form">
                                        <div class="form-group">
                                            <label style="font-size:13px">detalle prospecto: </label>
                                            <textarea class="form-control" rows="6" id="detalle_prospecto"><?php echo $detalle_prospecto; ?></textarea>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-2">
                                    <form role="form">
                                        <div class="form-group">
                                            <label style="font-size:13px">fecha de cierre:</label>
                                            <div class='input-group date' >
                                                <input type='text' class="form-control" id="datetimepicker1" value="<?php echo $fecha_esp_cierre; ?>" style="font-size:13px"/>
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-1">
                                    <form role="form">
                                        <div class="form-group">
                                            <label style="font-size:10px">% </label><label style="font-size:13px">cierre:</label>
                                            <input class="form-control" id="porcent_cierre" value="<?php echo $porcent_cierre; ?>" style="text-align:center;font-size:13px;">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-1">
                                    <form role="form">
                                        <div class="form-group">
                                            <label style="font-size:13px"># cotiz.:</label>
                                            <input class="form-control" id="cotizacion" value="<?php echo $cotizacion; ?>" style="text-align:right;font-size:13px;">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2">
                                    <form role="form">
                                        <div class="form-group">
                                            <label style="font-size:13px">monto (<?php echo $moneda; ?>): </label>
                                            <input class="form-control" id="monto" value="<?php echo $monto; ?>" style="text-align:right;font-size:13px;">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2">
                                    <form role="form">
                                        <div class="form-group">
                                            <label style="font-size:13px">estado: </label>
                                            <select class="form-control" id="estado">
<?php
                                                $qry       = "SELECT * FROM dbcomercial.tbestadoprospecto";
                                                $result    = mysql_query($qry);
                                                while($Reg = mysql_fetch_array($result))
                                                {
                                                    $id_estado   = $Reg['idtbestadoprospecto'];
                                                    $descripcion = $Reg['descripcion'];

                                                    if ($estado == $id_estado) {
                                                        echo "<option selected value='$id_estado'>$descripcion</option>";
                                                    }else{
                                                        echo "<option value='$id_estado'>$descripcion</option>";
                                                    }
                                                }
                                                ?>
?>
                                            </select>
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
                                            <label style="font-size:13px">Historial de Actividades: </label>
                                            <fieldset disabled>
                                                <textarea class="form-control" rows="6" id="historial"><?= getActivityLog($id_prospecto); ?>
                                                </textarea>
                                            </fieldset>
                                        </div>
                                    </form>
                                </div>

                                <!-- NUEVA ACTIVIDAD -->
                                <div class="col-lg-3">
                                    <form role="form">
                                        <div class="form-group">
                                            <label style="font-size:13px">acción: </label>
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
                                            <label style="font-size:13px">objetivo: </label>
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
                                            <label style="font-size:13px">observaciones: </label>
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
    <!-- Sweet Alert Script -->
    <script src="../js/sweetalert.min.js"></script>

    <script>
    $(document).ready(function() {
        // $('#dataTables-example').DataTable({
        //     responsive: true
        // });
        $('#datetimepicker1').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
    </script>

</body>
</html>
<?php
}else{
    header("location:login.html");
}
?>