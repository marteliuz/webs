<?php
include ("config.php");
include ("lib_functions.php");
session_start(); //session start
header("Cache-Control: no-store, no-cache, must-revalidate");
if(isset($_SESSION['username']))
{
    $username       = $_SESSION['username'];
    $id_cliente     = $_POST['id_cliente'];

    $qry    = "SELECT * FROM dbcomercial.tbclientes WHERE idtbclientes = $id_cliente";
    $result = mysql_query($qry);
    $Reg    = mysql_fetch_array($result);

    $rut_cliente  = $Reg['rut_cliente'];
    $descripcion  = $Reg['descripcion'];
    $id_ejecutivo = $Reg['id_ejecutivo'];
    $quality      = $Reg['quality'];


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
                    <div class='panel panel-info'>
                        <div class='panel-heading'>
                             <h3><i class='fa fa-group fa-fw'></i> Editar Cliente</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
                            <div class="row">

                            	<div class="col-lg-3">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>RUT Cliente: </label>
                                            <input class="form-control" id="rut_cliente" value="<?php echo $rut_cliente; ?>">
                                        </div>
                                    </form>
                                </div>

								<div class="col-lg-5">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Razon Social: </label>
                                            <input class="form-control" id="descripcion" value="<?php echo $descripcion; ?>">
                                        </div>
                                    </form>
                                </div>


                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Clasificación</label><br>
 										<select class="form-control" id="clasificacion">
                                            <?php
                                            $qry    = "SELECT * FROM dbcomercial.tbCalidadCliente";
                                            // echo "<option>$qry</option>";
                                            $result = mysql_query($qry);
                                            while($Reg = mysql_fetch_array($result))
                                            {
                                                $id_tb     = $Reg['idtbCalidadCliente'];
                                                $descripcion = $Reg['descripcion'];

                                                if ($quality == $id_tb) {
                                                    echo "<option selected value='$id_tb'>$descripcion</option>";
                                                }else{
                                                    echo "<option value='$id_tb'>$descripcion</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Asignar Ejecutivo:</label>
                                        <select class="form-control" id="contactos">
                                            <?php
                                            $qry    = "SELECT * FROM dbcomercial.tbejecutivos WHERE activo= 1;";
                                            // echo "<option>$qry</option>";
                                            $result = mysql_query($qry);
                                            while($Reg = mysql_fetch_array($result))
                                            {
                                                $idejecutivo     = $Reg['idtbejecutivos'];
                                                $nombre_ejecutivo = $Reg['nombre_ejecutivo'];

                                                if ($id_ejecutivo == $idejecutivo) {
                                                    echo "<option selected value='$idejecutivo'>$nombre_ejecutivo</option>";
                                                }else{
                                                    echo "<option value='$idejecutivo'>$nombre_ejecutivo</option>";
                                                }                                         
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

<br><br>
                            <div class="row">
                                <div class="col-lg-9">
                                </div>
                                <div class="col-lg-1">
                                    <form role="form">
                                        <div class="form-group" align="right">
                                            <!-- <label>Botones </label> -->
                                            <button type="button" class="btn btn-outline btn-success" onclick="javascript:saveInfoCliente()">Guardar</button>

                                            <!-- <button type="button" class="btn btn-outline btn-success" onclick="javascript:alert(<?= $id_cliente; ?>, <?= $id_ejecutivo; ?>)">Crear</button> -->
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