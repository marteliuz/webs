<?php
session_start();
if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MGMT</title>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">
    <!-- My files -->
    <script src="js/lib_ajax.js"></script>

    
    <style type="text/css">
  		.myBackground {
  		background-color: rgba(255,255,255, 0.5);
  		color: inherit;
		}
      .mousechange:hover {
        cursor:pointer;
    }
  	</style>
</head>
<body background="img/background.jpg" style="zoom: 1;">
    <div class="container">
    	<div class="header clearfix">
        	<nav>
          		<ul class="nav nav-pills pull-left">
            		<li role="presentation"><img id="logo" src="img/logo.png" style="width: 70%;"></li>
          		</ul>
        	</nav>
        	<h3 class="text-muted">Satisfacci&oacute;n de clientes</h3>
      	</div>
      	<div class="jumbotron myBackground">
      		<a href="procedures/logout.php"><img src="img/logout.png" style="width: 5%;">Cerrar Sesion</a>
      		<br><br><br><br>
      		<table>
      			<tr>
      				<td><img src="img/stats_icon.png" style="width: 50%;" onclick="javascript:showStats();" class="mousechange"></td>
      				<td><img src="img/again_icon.png" style="width: 50%;" onclick="javascript:unaMas();" class="mousechange"></td>
              <td><img src="img/export.png" style="width: 50%;" onclick="javascript:exportar();" class="mousechange"></td>
      				<td><img src="img/truncate_icon.png" style="width: 50%;" onclick="javascript:truncate();" class="mousechange"></td>
      			</tr>
      		</table>
      		<div id="divResultado"></div>
  		</div>

    </div> <!-- /container -->
</body></html>
<?php
}else{
  echo "Debe iniciar sesion para estar aqui.";
}
?>