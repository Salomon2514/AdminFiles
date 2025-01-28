<?php 
include("bloqueSeguridad.php");

include("clases/setting.inc.php");
$sql = new mod_db();
include("comunes/libreriaTransparencia.php");
include("comunes/libreriaNoticias.php");
include("comunes/libreriaFechas.php");
include("comunes/libreriabusquedas.php");
include("comunes/stdlib.php");	

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<title>Servicios Web</title>
	
	<!-- Styles -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen"/>
	<link rel="stylesheet" href="css/color-scheme/turquoise.css">
	
	<!-- Base JS -->
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/main.js"></script>
</head>

<body>


<div class="main boxed">

	
    
    <!-- TOP BAR 
	============================================= -->
	<?php include("compartidos/topBarServicios.php"); ?>
	<!-- END TOP BAR 
	============================================= -->



	<!-- HEADER 
	============================================= -->
	<div class="header">
		<div class="layout clearfix">
			<div class="mob-layout wrap-left">
				<!-- Logo -->
				<a href="#" class="logo"><img src="img/logo.png" alt=""></a>
				<!-- Mobile Navigation Button -->
				<div class="btn-menu icon-reorder"></div>
				<!-- Navigation -->
				
			</div>
			
		</div>
		<!-- Mobile Navigation -->
		
		<!-- End Mobile Navigation -->
	</div>

	<!-- END HEADER 
	============================================= -->

		<!-- TITLE BAR
	============================================= -->
	<div class="b-titlebar">
		<div class="layout">
			<!-- Bread Crumbs -->
			<ul class="crumbs">
				<li>You are here:</li>
				<li><a href="portalServicios.php">Home</a></li> 
				<li><a href="noticias.php">Noticias</a></li>
			</ul>
			<!-- Title -->
			<h1>M&oacute;dulo de Transparencia</h1>
		</div>
	</div>
	<!-- END TITLE BAR
	============================================= -->




	<!-- CONTENT 
	============================================= -->
	<div class="content shortcodes">
		<div class="layout">
			<h1 class="centered semibold uppercase">M&oacute;dulos de mensajes</h1>
			<p class="centered p-20 margin-40" style="color: #6e6e73;">SOLICITUD DE INFORMACI&Oacute;N</p>
			
			
			<div class="title">
			  <h3 class="lined">Mensajes...<?PHP echo $Mensaje;?></h3></div>
					
                  
							  
		
            
	  </div>
	</div>
	<!-- END CONTENT 
	============================================= -->

	<!-- FOOTER 
	============================================= -->
	<?php include("compartidos/footerNoticias.php");?>
	<!-- END FOOTER 
	============================================= -->
	
	
</div>
<!-- END MAIN 
============================================= -->
</body>
</html>