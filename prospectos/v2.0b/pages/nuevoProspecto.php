<?php
include ("config.php");
include ("lib_functions.php");
session_start(); //session start


$id_ejecutivo = $_GET['id_ejecutivo'];
$id_cliente   = $_GET['id_cliente'];
$nombre_cliente = getNombreClienteById($id_cliente);

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
                             <h3><i class='fa fa-tasks fa-fw'></i> Nuevo Prospecto para <?php echo $nombre_cliente; ?> </h3>
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
                                            <div class='input-group date' >
                                                <input type='text' class="form-control" id="datetimepicker1"/>
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
                                            <button type="button" class="btn btn-outline btn-primary" onclick="javascript:limpiarProspecto();">Limpiar</button>
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
