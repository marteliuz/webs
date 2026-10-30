<!-- LOGO DEL SITIO -->
<img style="vertical-align:middle;
			width:60px;
			height:60px;
			position: relative;
			float: left;
			display: inline-block;
			vertical-align: middle;
			margin-top: 5px;
			margin-left: 20px;
			padding: 10px 10px 10px 10px" src="img/logo.png" id="logo_corp">
<div id="header">
	<div id="headerTitles">
		<h1><a href="#!"><?php echo $siteName?></a></h1>
   		<h2><?php echo $siteDesc;?></h2>
    </div>
    <div id="nav">
    	<?php echo $plNav;
		/* Look at this to edit your own titles, the href is from your url bar when you scroll to the corresponding tilegroup, it's the part after the # with the # included. */?>
	    <a id="home" class="navItem"  href="#&App">
	    	<img src="img/icons/home.png"/><br />
		   	APP
	    </a>
	   	<a id="my_images" class="navItem" href="#&Descargas">
		    <img src="img/icons/download_s.png"/><br />
		  	DESCARGAS
	    </a>
	    <a id="slideshows" class="navItem" href="#&Otros">
		    <img src="img/icons/questionmark.png"/><br />
		   	OTROS
	    </a>
	</div>
</div>