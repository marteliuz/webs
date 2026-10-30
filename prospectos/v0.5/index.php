<?php
// session_start(); //session start
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<!-- Metadata -->
		<meta charset="utf-8"> 
		<title>Prospectos App</title>
		<link href='resources/tmc.ico' rel='shortcut icon' type='image/x-icon'>
		<!-- CSS -->
		<!-- Called css metro-boostrap -->
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <!-- Called css boostrap.min -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link href="css/iconFont.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">	
		<!-- Alertify -->
		<link href="css/alertify/alertify.core.css" rel="stylesheet">
		<link href="css/alertify/alertify.default.css" rel="stylesheet">
		<script src="js/alertify/alertify.min.js"></script>
		<!-- JS -->
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <!-- Called library lib_ajax.js -->
		<script src="js/lib_ajax.js"></script>

        <!-- Called Library HighCharts -->
		<script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
        <script src="http://code.highcharts.com/highcharts-more.js"></script>

    </head>
    <body class="metro">
		<br><br><br><br>
		<div id="header">
			<table style="background-color:transparent;">
				<tr>
					<td><img src="resources/tm2.png" alt="tm" height="50" width="50" /></td>
					<td width="10"> </td>
					<td><p class="header"><font color="#FFFFFF"> Prospectos Comerciales</font></p></td>
					<td width="10"> </td>
					<td><h2><font color="#FFFFFF">Touch Media</font></h2></td>
				</tr>
		</table>
		</div>
		<br><br>
		<div id="container" class="jumbotron">

		 <!-- <div class="container"> -->
		        <div class="card card-container">
		            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
		            <!-- <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" /> -->
		            <p id="profile-name" class="profile-name-card"></p>
		            <!-- <form class="form-signin"> -->
		                <span id="reauth-email" class="reauth-email"></span>
		                <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus> -->
		                <input type="text" id="inputEmail" class="form-control" placeholder="Email address"  autofocus>
		                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
		                <div id="remember" class="checkbox">
		                    <label>
		                        <input type="checkbox" value="remember-me"> Remember me
		                    </label>
		                </div>
		                <button class="btn btn-lg btn-primary btn-block btn-signin" onclick="checklogin()">Sign in</button>
		            <!-- </form><!-- /form --> -->
		            <a href="#" class="forgot-password">
		                Forgot the password?
		            </a>
		        </div><!-- /card-container -->
		    <!-- </div>/container -->




		</div>
    </body>
</html>