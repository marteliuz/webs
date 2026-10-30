$tile.scale = 145 // size of tiles to match the full width of the screen LEAVE IT LIKE THIS
$group.spacingMob = new Array(0,5,10); // defines the vertical space between the headers in tiles, each array index is a tilegroup, so you can specify different spaces for the different groups.
tilesMobile = function(){
	/* ADD YOUR TILES FOR MOBILE VERSION HERE!!! The best way to do this is to copy the tiles from your main function, and modify their position.
	 Tile template functions (the part below) from the normal tiles.js works on both version so should'nt be copied. (for example, you can just use tileTitleText() here, without modifications)
	 Also, the pages of your normal website will be used.  */
	
	/* READ THE TUTORIAL AT METRO-WEBDESIGN.INFO */
/*GROUP 1 */
	tileLive     (0,0,0,1,1,"#FF4000",'external:http://10.0.20.30/mesa/',"Mesa de Ayuda ","","","","",2000,["Haz click aquí","para ir a","la plataforma","de Troubleshooting"],['','',''],"");
	tileTitleText(0,1,0,2,1,'#789600','external:http://10.0.20.30/inventario/','Inventario','Plataforma de seguimiento de productos en existencia.',['','',''],'');

	tileTitleText(0,0,1,2,1,'#2E9AFE','external:http://10.0.20.30/TMC/PROD/','Tickets','Aplicación de seguimiento de incidentes de clientes.',['','',''],'');
	tileFlip     (0,2,1,1,1,"#7401DF",'external:http://TMCServer',"img/bridgit.jpg","<h5 class='white'>SMART Bridgit</h5>haz click para ir al servidor",['SMART Bridgit','#F60',''],'');
	
	tileFlip     (0,0,2,1,1,"#151515",'external:http://10.0.20.148/nagiosxi/login.php?redirect=/nagiosxi/index.php%3f&noauth=1',"img/nagios.jpg","<h5 class='white'>NAGIOS</h5>haz click para ir al la interfaz web",['NAGIOS','#F60',''],'');	
	tileTitleText(0,1,2,2,1,'#DF7401','external:http://10.0.20.30/Seguimiento/','Seguimiento de Ventas','Aplicación de seguimiento de cotizaciones, facturas, Ordenes de compra.',['','',''],'');
	
	/*GROUP 2 */
	tileImg(1,0,0,1,1,"#F60","http://localhost/metro/resources/Polycom_m100.zip","img/polycom.jpg",1,1,['Polycom m100','#789600','bottom','version',true],'');
	tileImg(1,1,0,1,1,"#F60","http://localhost/metro/resources/vidyoDesktop.zip","img/vidyo.jpg",1,1,['Vidyo Desktop','#789600','bottom','version',true],'');
	
	/*GROUP 3 */
	/*Fadeslide and fliphorizontal are effects, other options are 'fade','flipvertical'*/
	tileSlideshow(2,0,0,2,2,"","",5000,true,"fadeslide",["img/bg/img1.png","img/bg/img2.jpg","img/bg/img3.jpg"],['Slideshow','#789600','top'],'noClick');
	
	tileToMain(2,0,3,2,1,"#F90","","");
	tileCopyright(2,1,4,1,0.5,"@marteliuz","noClick");
}

tileToMain = function(group,x,y,width,height,bg,optClass){ // makes a tile that redirects to our main site (in case someone needs the main site)
	$page.content += (
	"<a href='index.php' class='tile group"+group+" "+optClass+"' \
	onClick='javascript:if(!confirm(\"Are you sure you want to go to the main site?\")){return false;}else{setCookie(\"desktop\",1,7);}'\
	style=' \
	margin-top:"+((y*$tile.scalespacing)+45)+"px;margin-left:"+(x*$tile.scalespacing+group*$group.spacing)+"px; \
	width: "+(width*$tile.scalespacing-$tile.spacing)+"px; height:"+(height*$tile.scalespacing-$tile.spacing)+"px; \
	background:"+bg+";'>\
	<div class='tileTitle'>Welcome to our mobile site</div>\
	<div class='tileDesc' style='margin-top:10px;'>Click here to go to our desktop site</div>\
	</a>");
}
tileCopyright = function(group,x,y,width,height,text,optClass){ // makes a tile that redirects to our main site (in case someone needs the main site)
	$page.content += (
	"<a class='tile group"+group+" "+optClass+"' \
	style=' \
	margin-top:"+((y*$tile.scalespacing)+45)+"px;margin-left:"+(x*$tile.scalespacing+group*$group.spacing)+"px; \
	width: "+(width*$tile.scalespacing-$tile.spacing)+"px; height:"+(height*$tile.scalespacing-$tile.spacing)+"px;' \>\
	<div id='copyrightTileDesc'>© "+text+"</div>\
	</a>");
}

