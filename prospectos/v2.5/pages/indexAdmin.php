<?php
include ("config.php");
include ("lib_functions.php");
session_start(); //session start
header("Cache-Control: no-store, no-cache, must-revalidate");
if(isset($_SESSION['username']))
{
    $username     = $_SESSION['username'];

    $qtyClientes   = getQtyClientes();
    $qtyProspectos = getQtyProspectos();

    $xmlSource = "http://indicadoresdeldia.cl/webservice/indicadores.xml";
    $xml       = simplexml_load_file($xmlSource);
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
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
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
                            <br><br>

                        </li>
                        <li selected>
                            <a href="indexAdmin.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-group fa-fw"></i> Clientes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="javascript:nuevoCliente()">Nuevo Cliente</a>
                                </li>
                                <li>
                                    <a href="javascript:loadClientes()">Gestionar Clientes</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                       
                        <li>
                            <a href="javascript:loadProspectos()"><i class="fa fa-tasks fa-fw"></i> Prospectos</a>
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
                    <h1 class="page-header"><i class="fa fa-dashboard"></i> Dashboard </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?= $qtyClientes; ?>
                                    </div>
                                    <div>Clientes</div>
                                </div>
                            </div>
                        </div>
                            <a href="javascript:loadClientes()">                    
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?= $qtyProspectos; ?>
                                    </div>
                                    <div>Prospectos</div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:loadProspectos()"> 
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2"></div>

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Indicadores
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-dollar fa-fw"></i> Dólar observado
                                    <span class="pull-right text-muted small"><em><?= $xml->moneda->dolar; ?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-euro fa-fw"></i> Euro
                                    <span class="pull-right text-muted small"><em><?= $xml->moneda->euro; ?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Dólar interbancario
                                    <span class="pull-right text-muted small"><em><?= $xml->moneda->dolar_clp; ?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>UF
                                    <span class="pull-right text-muted small"><em><?= $xml->indicador->uf; ?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> UTM
                                    <span class="pull-right text-muted small"><em><?= $xml->indicador->utm; ?></em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Cifras por Ejecutivos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ejecutivo</th>
                                            <th>Clientes</th>
                                            <th>Prospectos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
    $qry      = "SELECT * FROM dbcomercial.tbejecutivos WHERE activo = 1";
    $result   = mysql_query($qry);
    while($Reg = mysql_fetch_array($result))
    {
        $id_ejecutivo  = $Reg['idtbejecutivos'];
        $ejecutivo     = getEjecutivoByID($id_ejecutivo);
        $qtyClientes   = getQtyClientesByEjecutivo($id_ejecutivo);
        $qtyProspectos = getQtyProspectosByEjecutivo($id_ejecutivo);
        
        echo "<tr>
                <td>$ejecutivo</td>
                <td>$qtyClientes</td>
                <td>$qtyProspectos</td>
            </tr>";
    }
?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>           

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Actividad de Ejecutivos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ejecutivo</th>
                                            <th>llamados</th>
                                            <th>visita</th>
                                            <th>correo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
    $qtyLlamados   = 0;
    $qtyVisitas    = 0;
    $qtyCorreos    = 0;

    $qry      = "SELECT * FROM dbcomercial.tbejecutivos WHERE activo = 1";
    $result   = mysql_query($qry);
    while($Reg = mysql_fetch_array($result))
    {
        $id_ejecutivo  = $Reg['idtbejecutivos'];
        $ejecutivo     = getEjecutivoByID($id_ejecutivo);

        $qry2      = "SELECT * FROM dbcomercial.tbprospectos WHERE id_ejecutivo = $id_ejecutivo";
        $result2   = mysql_query($qry2);
        while($Reg2 = mysql_fetch_array($result2))
        {
            $id_prospecto = $Reg2['idtbprospectos'];

            $qry3      = "SELECT * FROM dbcomercial.tbactividad WHERE id_prospecto = $id_prospecto";
            $result3   = mysql_query($qry3);
            while($Reg3 = mysql_fetch_array($result3))
            {
                $tipo_accion = $Reg3['id_tipo_accion'];
                if ($tipo_accion=="1") {
                    $qtyLlamados++;
                }
                if ($tipo_accion=="2") {
                    $qtyVisitas++;
                }
                if ($tipo_accion=="3") {
                    $qtyCorreos++;
                }
            }
        }
        echo "<tr>
                <td>$ejecutivo</td>
                <td>$qtyLlamados</td>
                <td>$qtyVisitas</td>
                <td>$qtyCorreos</td>
            </tr>";
        $qtyLlamados   = 0;
        $qtyVisitas    = 0;
        $qtyCorreos    = 0;
    }
?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Prospectos por Estado
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Estado</th>
                                            <th>Prospectos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Activo</td>
                                            <td><?php echo getQtyProspectosActivos(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>En Proceso</td>
                                            <td><?php echo getQtyProspectosEnProceso(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Stand By</td>
                                            <td><?php echo getQtyProspectosStandBy(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Cerrado</td>
                                            <td><?php echo getQtyProspectosCerrados(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Descartado</td>
                                            <td><?php echo getQtyProspectosDescartados(); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Prospectos por Empresa
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Empresa</th>
                                            <th>Prospectos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>TouchMedia</td>
                                            <td><?php echo getQtyProspectosByIdEmpresa(1); ?></td>
                                        </tr>
                                        <tr>
                                            <td>MediaLogistic</td>
                                            <td><?php echo getQtyProspectosByIdEmpresa(2); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Clientes por Calificación
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Calificación</th>
                                            <th>Clientes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>                      
                                            <td>Gold</td>
                                            <td><?php echo getQtyClientesByQuality(1); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Silver</td>
                                            <td><?php echo getQtyClientesByQuality(2); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bronze</td>
                                            <td><?php echo getQtyClientesByQuality(3); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
            </div>
            <!-- /.row -->
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
    <!-- <script src="../data/morris-data.js"></script> -->

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="../js/lib_ajax.js"></script>

    <!-- Sweet Alert Script -->
    <script src="../js/sweetalert.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
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