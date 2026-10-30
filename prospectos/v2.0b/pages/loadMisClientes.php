<?php
//@date:    : 2016/09/29
//@autor:   : Marteliuz

include ("config.php");
include ("lib_functions.php");

// $id_ejecutivo = $_POST['id_ejecutivo'];
$id_ejecutivo = $_GET['id_ejecutivo'];

// $id_ejecutivo = 99;
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

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="side-user hidden-xs" align="center">
                            <br>       
                            <img class="img-circle" src="<?php echo getIMGByEjecutivo($id_ejecutivo); ?>" alt="">
                            <br><br>
                            <span class="pull-center text-muted small"><strong>Ejecutivo: </strong><?php echo getEjecutivoByID($id_ejecutivo); ?></span>

                        </li>
                        <!-- </li> -->
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li selected>
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
                    <!-- <h1 class='page-header'> <i class='fa fa-group fa-fw'></i> Mis Clientes</h1> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<?php
    $qry      = "SELECT * FROM dbcomercial.tbclientes WHERE id_ejecutivo = $id_ejecutivo AND activo = 1";
    $result   = mysql_query($qry);
    $num_rows = mysql_num_rows($result);

    if($num_rows==0){
?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            No hay clientes que mostrar
                        </div>
                    </div>
                </div>
            </div>
<?php
    }else{
?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3><i class='fa fa-group fa-fw'></i> Mis Clientes</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:12px">
                                <thead>
                                    <th>Nombre</th>
                                    <th>RUT</th>
                                    <th class="center"><i class='fa fa-user fa-fw' title='Contactos'></i></th>
                                    <th class="center"><i class='fa fa-tasks fa-fw' title='Prospectos'></i></th>
                                    <th></th>
                                </thead>
                                <tbody>
<?php
    while($Reg = mysql_fetch_array($result))
    {
        $countContactos  = getQtyContactosByCliente($Reg['idtbclientes']);
        $countProspectos = getQtyProspectosByCliente($Reg['idtbclientes']);
        $id_cliente      = $Reg['idtbclientes'];
?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $Reg['descripcion']; ?></td>
                                        <td><?php echo $Reg['rut_cliente']; ?></td>
                                        <td class="center"><?php echo $countContactos; ?></td>
                                        <td class="center"><?php echo $countProspectos; ?></td>
                                        <td class="center">
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

                                                            echo "<li><a href='nuevoProspecto.php?id_cliente=$id_cliente&id_ejecutivo=$id_ejecutivo'>Agregar Prospecto</a></li>";
                                                        }                           
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
<?php
    }
}
?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="../js/lib_ajax.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>
</html>